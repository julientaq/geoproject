<?php
function custom_image_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function custom_image_add_meta_box() {
	add_meta_box(
		'custom_image-custom-image',
		__( 'Replace map by a custom image', 'geoformat' ),
		'custom_image_html',
		'maps',
		'normal',
		'low'
	);
}
add_action( 'add_meta_boxes', 'custom_image_add_meta_box' );

function custom_image_html( $post) {
	wp_nonce_field( '_custom_image_nonce', 'custom_image_nonce' ); 

	$custom_image_displaying = get_post_meta( $post->ID, 'custom_image_displaying', true);

	$custom_image_northeast = get_post_meta( $post->ID, 'custom_image_northeast', true);

	$custom_image_southwest = get_post_meta( $post->ID, 'custom_image_southwest', true);
?>
	

	<div class="framed">
		<p>1/ <?php _e('Upload your image','geoformat'); ?>
			<br/><?php _e('High resolution required! Make sure your image height or width is <b>at least 3000 pixels</b> and in <strong>300dpi</strong>.','geoformat'); ?></p>
		<p>2/ <?php _e('Once the image is uploaded, save the map to preview it. When saving the map, custom tiles will be generated. Please be patient, as the processus can take up to several minutes if your image resolution is important.','geoformat'); ?></p>
		<p>3/ <?php _e('In the Preview Map box above, <a href="#mbox_map_preview">define</a> the bounds of the image','geoformat'); ?></p>
	</div>

	<p>
		<input type="hidden" name="custom_image_download" id="meta-image" value="<?php echo custom_image_get_meta( 'custom_image_download' ); ?>">
		
		<input type="button" id="meta-image-button" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />

			<div class="img-gp" id="img-slf" <?php if (custom_image_get_meta( 'custom_image_download' ) == true ) : ?>style="display:block!important;"<?php endif; ?>>
				<img src="<?php if (custom_image_get_meta( 'custom_image_download' ) == true ) : echo custom_image_get_meta( 'custom_image_download' ); endif; ?>" id="imgtop" />
					<p class="remove_img" id="remove_img_intro">
						<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
					</p>			
			</div>
	</p>
		
	<p>
		<label for="custom_image_copyright"><?php _e( 'Image copyright', 'geoformat' ); ?></label><br>
		<input type="text" name="custom_image_copyright" id="custom_image_copyright" value="<?php echo custom_image_get_meta( 'custom_image_copyright' ); ?>">
	</p>
	<p>
		<label for="custom_image_northeast"><?php _e( 'North East', 'geoformat' ); ?></label><br>
		<input type="text" name="custom_image_northeast" value="<?php if( $custom_image_northeast != '' ): echo json_decode($custom_image_northeast); endif; ?>">
	</p>
	<p>
		<label for="custom_image_southwest"><?php _e( 'South West', 'geoformat' ); ?></label><br>
		<input type="text" name="custom_image_southwest" value="<?php if( $custom_image_southwest != '' ): echo json_decode($custom_image_southwest); endif; ?>"/>
	</p>

	<input type="hidden" name="custom_image_displaying" value="<?php echo $custom_image_displaying;?>"/>

<?php
}

function custom_image_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['custom_image_nonce'] ) || ! wp_verify_nonce( $_POST['custom_image_nonce'], '_custom_image_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	$mapID = get_the_ID() ;


	// if image to replace map is uploaded
	if ( !empty( $_POST['custom_image_download'] )  ) {

		update_post_meta($post_id, 'custom_image_displaying', 'replace');

		if ( isset($_POST['custom_image_northeast']) && strlen($_POST['custom_image_northeast']) > 5 ) 
			update_post_meta( $post_id, 'custom_image_northeast',  json_encode( $_POST['custom_image_northeast'] ) );
		else
		{
		    delete_post_meta($post_id, 'custom_image_northeast');
		}

		if ( isset( $_POST['custom_image_southwest'] ) && strlen($_POST['custom_image_southwest']) > 5 )
			update_post_meta( $post_id, 'custom_image_southwest',  json_encode( $_POST['custom_image_southwest'] )  );
		else
		{
		    delete_post_meta($post_id, 'custom_image_southwest');
		}

		if ( isset( $_POST['custom_image_copyright'] ) ){
			update_post_meta( $post_id, 'custom_image_copyright', esc_attr( $_POST['custom_image_copyright'] ) );
		}
		else
		{
		    delete_post_meta($post_id, 'custom_image_copyright');
		}


		// Generate tiles only if new image has been uploaded
		$new_image_path =  $_POST['custom_image_download'];
		$old_image_path = custom_image_get_meta( 'custom_image_download' );
		if ( $new_image_path != $old_image_path && $mapID)
		{
			update_post_meta( $post_id, 'custom_image_download', esc_attr( $new_image_path ) );

			// Generate Tiles with ImageMacick for heavy image

				//Get original filename


				
				$uploaded_path = explode('maps/', $new_image_path);
				$filename_uploaded = $uploaded_path[1];
				$filename = str_replace('-scaled', '', $filename_uploaded);

				$upload_dir = wp_upload_dir()['basedir'];
				$upload_dir_path = explode ('uploads/', $upload_dir ) ;
				// Get the site number
				$upload_dir_path_site = "../wp-content/uploads/".$upload_dir_path[1];


				//Delete images previously generated
				exec('rm -r '.$upload_dir_path_site.'/maps/'.$mapID );

				//create repertories for tiles and main images
				exec('mkdir -p '.$upload_dir_path_site.'/maps/'.$mapID .'/main');
				exec('mkdir -p '.$upload_dir_path_site.'/maps/'.$mapID .'/tiles');

				// Generate main images (level zoom : 5)
				exec('convert '.$upload_dir_path_site.'/maps/'.$filename.'  -resize   x256  '.$upload_dir_path_site.'/maps/'.$mapID .'/main/0.png');
				exec('convert '.$upload_dir_path_site.'/maps/'.$filename.'  -resize   x512  '.$upload_dir_path_site.'/maps/'.$mapID .'/main/1.png');
				exec('convert '.$upload_dir_path_site.'/maps/'.$filename.'  -resize   x1024 '.$upload_dir_path_site.'/maps/'.$mapID .'/main/2.png');
				exec('convert '.$upload_dir_path_site.'/maps/'.$filename.'  -resize   x2048 '.$upload_dir_path_site.'/maps/'.$mapID .'/main/3.png');
				exec('convert '.$upload_dir_path_site.'/maps/'.$filename.'  -resize   x4096 '.$upload_dir_path_site.'/maps/'.$mapID .'/main/4.png');
				exec('convert '.$upload_dir_path_site.'/maps/'.$filename.'  -resize   x8192 '.$upload_dir_path_site.'/maps/'.$mapID .'/main/5.png');


				// Generate tiles

				$generate_tiles_0 = "convert -verbose  ".$upload_dir_path_site."/maps/".$mapID."/main/0.png -set option:distort:viewport '%[fx:w-(w%256)+256]x%[fx:h-(h%256)+256]'  -virtual-pixel none -distort SRT 0  -crop 256x256 +adjoin -background transparent  -extent 256x256 -set filename:tile '%[fx:floor(page.x/256)]_%[fx:floor(page.y/256)]' +repage ".$upload_dir_path_site."/maps/".$mapID."/tiles/0_%[filename:tile].png";

				$generate_tiles_1 = "convert -verbose  ".$upload_dir_path_site."/maps/".$mapID."/main/1.png -set option:distort:viewport '%[fx:w-(w%256)+256]x%[fx:h-(h%256)+256]'  -virtual-pixel none -distort SRT 0  -crop 256x256 +adjoin -background transparent  -extent 256x256 -set filename:tile '%[fx:floor(page.x/256)]_%[fx:floor(page.y/256)]' +repage ".$upload_dir_path_site."/maps/".$mapID."/tiles/1_%[filename:tile].png";

				$generate_tiles_2 = "convert -verbose  ".$upload_dir_path_site."/maps/".$mapID."/main/2.png -set option:distort:viewport '%[fx:w-(w%256)+256]x%[fx:h-(h%256)+256]'  -virtual-pixel none -distort SRT 0  -crop 256x256 +adjoin -background transparent  -extent 256x256 -set filename:tile '%[fx:floor(page.x/256)]_%[fx:floor(page.y/256)]' +repage ".$upload_dir_path_site."/maps/".$mapID."/tiles/2_%[filename:tile].png";

				$generate_tiles_3 = "convert -verbose  ".$upload_dir_path_site."/maps/".$mapID."/main/3.png -set option:distort:viewport '%[fx:w-(w%256)+256]x%[fx:h-(h%256)+256]'  -virtual-pixel none -distort SRT 0  -crop 256x256 +adjoin -background transparent  -extent 256x256 -set filename:tile '%[fx:floor(page.x/256)]_%[fx:floor(page.y/256)]' +repage ".$upload_dir_path_site."/maps/".$mapID."/tiles/3_%[filename:tile].png";

				$generate_tiles_4 = "convert -verbose  ".$upload_dir_path_site."/maps/".$mapID."/main/4.png -set option:distort:viewport '%[fx:w-(w%256)+256]x%[fx:h-(h%256)+256]'  -virtual-pixel none -distort SRT 0  -crop 256x256 +adjoin -background transparent  -extent 256x256 -set filename:tile '%[fx:floor(page.x/256)]_%[fx:floor(page.y/256)]' +repage ".$upload_dir_path_site."/maps/".$mapID."/tiles/4_%[filename:tile].png";

				$generate_tiles_5 = "convert -verbose  ".$upload_dir_path_site."/maps/".$mapID."/main/5.png -set option:distort:viewport '%[fx:w-(w%256)+256]x%[fx:h-(h%256)+256]'  -virtual-pixel none -distort SRT 0  -crop 256x256 +adjoin -background transparent  -extent 256x256 -set filename:tile '%[fx:floor(page.x/256)]_%[fx:floor(page.y/256)]' +repage ".$upload_dir_path_site."/maps/".$mapID."/tiles/5_%[filename:tile].png";


				
				exec($generate_tiles_0);
				exec($generate_tiles_1);
				exec($generate_tiles_2);
				exec($generate_tiles_3);
				exec($generate_tiles_4);
				exec($generate_tiles_5);
		}
			
	}

	else
	{
	    delete_post_meta($post_id, 'custom_image_displaying');
	    delete_post_meta($post_id, 'custom_image_download');
	    delete_post_meta($post_id, 'custom_image_southwest');
	    delete_post_meta($post_id, 'custom_image_northeast');
	}


}
add_action( 'save_post', 'custom_image_save' );
?>
