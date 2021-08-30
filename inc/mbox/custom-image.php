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
		__( 'Add a custom image', 'geoformat' ),
		'custom_image_html',
		'maps',
		'normal',
		'low'
	);
}
add_action( 'add_meta_boxes', 'custom_image_add_meta_box' );

function custom_image_html( $post) {
	wp_nonce_field( '_custom_image_nonce', 'custom_image_nonce' ); ?>
	
	<div class="framed">
		<?php _e('If your map uses a custom image, first save it to preview it. Like for any other map, you can add a marker. <strong>For images that replace a map:</strong> if the background image appears pixelated, it is a resolution issue (the map is too small) or a zoom issue (you will heave to decrease it).','geoformat'); ?>
	</div>
	
	<p>
		<label for="custom_image_download"><?php _e( 'Choose your image', 'geoformat' ); ?></label><br>
		<input type="text" class="widefat" name="custom_image_download" id="meta-image" value="<?php echo custom_image_get_meta( 'custom_image_download' ); ?>">
		
		<input type="button" id="meta-image-button" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
			
			<div class="img-gp" id="img-slf" <?php if (custom_image_get_meta( 'custom_image_download' ) == true ) : ?>style="display:block!important;"<?php endif; ?>>
				<img src="<?php if (custom_image_get_meta( 'custom_image_download' ) == true ) : echo custom_image_get_meta( 'custom_image_download' ); endif; ?>" id="imgtop" />
					<p class="remove_img" id="remove_img_intro">
						<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
					</p>			
			</div>
	</p>
	
	<p>
		<label for="custom_image_displaying"><?php _e( 'Displaying', 'geoformat' ); ?></label>
		<br>
		<select name="custom_image_displaying" id="custom_image_displaying">
			<option value="overlay" <?php echo (custom_image_get_meta( 'custom_image_displaying' ) === 'overlay' ) ? 'selected' : '' ?>><?php _e('Overlay','geoformat'); ?></option>
			<option value="replace" <?php echo (custom_image_get_meta( 'custom_image_displaying' ) === 'replace' ) ? 'selected' : '' ?>><?php _e('Replace','geoformat'); ?></option>
			
		</select>
	</p>
	
	<p>
		<label for="custom_image_copyright"><?php _e( 'Image copyright', 'geoformat' ); ?></label><br>
		<input type="text" name="custom_image_copyright" id="custom_image_copyright" value="<?php echo custom_image_get_meta( 'custom_image_copyright' ); ?>">
	</p>

	<p>
		<label for="custom_image_minzoom"><?php _e( 'Minimum zoom (only if the image replace the map, it can be a negative value : the object is to find the perfect zoom size to preview the map)', 'geoformat' ); ?></label><br>
		<input type="text" name="custom_image_minzoom" id="custom_image_minzoom" value="<?php if ( empty (custom_image_get_meta( 'custom_image_minzoom') ) ) :  echo '0'; else : echo custom_image_get_meta( 'custom_image_minzoom' ); endif; ?>">
	</p>
	
	<div id="overlay">
		<div class="framed">
			<strong><?php _e('Do not change these fields if your image replaces the map. However, they are ALL mandatory if you want to embed an image on a map.', 'geoformat'); ?></strong>
		</div>
		
		<p>
			<label for="custom_image_lat1"><?php _e( 'Lat 1', 'geoformat' ); ?></label>
			<input type="text" name="custom_image_lat1" id="custom_image_lat1" value="<?php if ( empty (custom_image_get_meta( 'custom_image_lat1') ) ) : echo '0'; else : echo custom_image_get_meta( 'custom_image_lat1' ); endif; ?>">
		&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="custom_image_long1"><?php _e( 'Long 1', 'geoformat' ); ?></label>
			<input type="text" name="custom_image_long1" id="custom_image_long1" value="<?php if ( empty (custom_image_get_meta( 'custom_image_long1') ) ) : echo '0'; else : echo custom_image_get_meta( 'custom_image_long1' ); endif;  ?>">
		</p>	
		<p>
			<label for="custom_image_lat2"><?php _e( 'Lat 2', 'geoformat' ); ?></label>
			<input type="text" name="custom_image_lat2" id="custom_image_lat2" value="<?php if ( empty(custom_image_get_meta( 'custom_image_lat2' ) ) ) : echo '1000'; else : echo custom_image_get_meta( 'custom_image_lat2' ); endif; ?>">
		&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="custom_image_long2"><?php _e( 'Long 2', 'geoformat' ); ?></label>
			<input type="text" name="custom_image_long2" id="custom_image_long2" value="<?php if ( empty (custom_image_get_meta( 'custom_image_long2' ) ) ) : echo '1000'; else: echo custom_image_get_meta( 'custom_image_long2' ); endif; ?>">
		</p>	
		<p>
			<label for="custom_image_opacity"><?php _e( 'Opacity (range: from 0 to 1)', 'geoformat' ); ?></label><br>
			<input type="text" name="custom_image_opacity" id="custom_image_opacity" value="<?php if ( empty (custom_image_get_meta( 'custom_image_opacity') ) ) : echo '1';  else : echo custom_image_get_meta( 'custom_image_opacity' ); endif;?>">
		</p>	
		<p>
			<label for="custom_image_zindex"><?php _e( 'Z-index (for the layer position, start from 1)', 'geoformat' ); ?></label><br>
			<input type="text" name="custom_image_zindex" id="custom_image_zindex" value="<?php if ( empty (custom_image_get_meta( 'custom_image_opacity') ) ) : echo '1';  else : echo custom_image_get_meta( 'custom_image_zindex' ); endif; ?>">
		</p>
		
	</div>
<?php
}

function custom_image_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['custom_image_nonce'] ) || ! wp_verify_nonce( $_POST['custom_image_nonce'], '_custom_image_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['custom_image_download'] ) )
		update_post_meta( $post_id, 'custom_image_download', esc_attr( $_POST['custom_image_download'] ) );
	if ( isset( $_POST['custom_image_lat1'] ) )
		update_post_meta( $post_id, 'custom_image_lat1', esc_attr( $_POST['custom_image_lat1'] ) );
	if ( isset( $_POST['custom_image_long1'] ) )
		update_post_meta( $post_id, 'custom_image_long1', esc_attr( $_POST['custom_image_long1'] ) );
	if ( isset( $_POST['custom_image_lat2'] ) )
		update_post_meta( $post_id, 'custom_image_lat2', esc_attr( $_POST['custom_image_lat2'] ) );
	if ( isset( $_POST['custom_image_long2'] ) )
		update_post_meta( $post_id, 'custom_image_long2', esc_attr( $_POST['custom_image_long2'] ) );
	if ( isset( $_POST['custom_image_opacity'] ) )
		update_post_meta( $post_id, 'custom_image_opacity', esc_attr( $_POST['custom_image_opacity'] ) );
	if ( isset( $_POST['custom_image_zindex'] ) )
		update_post_meta( $post_id, 'custom_image_zindex', esc_attr( $_POST['custom_image_zindex'] ) );
	if ( isset( $_POST['custom_image_copyright'] ) )
		update_post_meta( $post_id, 'custom_image_copyright', esc_attr( $_POST['custom_image_copyright'] ) );
	if ( isset( $_POST['custom_image_displaying'] ) )
		update_post_meta( $post_id, 'custom_image_displaying', esc_attr( $_POST['custom_image_displaying'] ) );
	if ( isset( $_POST['custom_image_minzoom'] ) )
		update_post_meta( $post_id, 'custom_image_minzoom', esc_attr( $_POST['custom_image_minzoom'] ) );
}
add_action( 'save_post', 'custom_image_save' );
?>
