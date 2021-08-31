<?php
/**
 * Metabox : "Map Preview"
 * Post types : maps
 *
 * @package GeoProjects
 */


//Register Metabox

function gp_mbox_map_preview() {
  		add_meta_box( 'mbox_map_preview', __( 'Map Preview', 'geoformat' ), 'gp_mbox_map_preview_content', 'maps', 'normal', 'core' );
}

add_action( 'add_meta_boxes', 'gp_mbox_map_preview' );

// Content of the Metabox
// @param object $post Post Object

function gp_mbox_map_preview_content( $post ) {
	$gp_options = get_option( 'gp_options' );
	$map_id = ( $post->post_status == 'auto-draft' ) ? 0 : $post->ID;
    $gp_tiles_provider = get_post_meta( $post->ID, 'gp_tiles_provider', true );
	$zoom = $gp_options['zoom'];
    
	$tiles_provider = get_post_meta( $post->ID, 'gp_tiles_provider', true );

        if (  empty ($tiles_provider) ) :
            $tiles_provider = $gp_options['map_tiles_provider'];
        else :
			$tiles_provider = get_post_meta( $post->ID, 'gp_tiles_provider', true );
		endif;
		
	$gp_tiles_zoom = get_post_meta( $post->ID, 'gp_tiles_zoom', true ); 
		if ( empty ($gp_tiles_zoom) ) :
            $gp_tiles_zoom = $zoom;
		else :
			$gp_tiles_zoom = get_post_meta( $post->ID, 'gp_tiles_zoom', true );
        endif;
		
	$overlay = get_post_meta( $post->ID, 'custom_image_displaying', true ); 
	$image = get_post_meta( get_the_ID(), 'custom_image_download', true );

	?>

    <p class="mbox-map-add-markers">
        <?php printf(
            '<a href="%1$s">%2$s</a> <span>(%3$s)</span>',
            admin_url( 'post-new.php?post_type=markers&map=' . $map_id ),
            __( 'Add markers in this map', 'geoformat' ),
            __( 'Save this map before clicking', 'geoformat' )
        ); 
		
?>
    </p>
	<?php if ($image) :?>

		<div><strong><?php _e('Set Map Bounds', 'geoformat'); ?></strong></div>

		<div><?php _e('To display correctly the image as a map, please set manually those 2 points inside the image: North East and South West.<br/>1/ To define the North East, place your mouse at the top right corner of the image and press the right click of your mouse.<br/>2/ To define the South West, place your mouse at the bottom left corner of the image and simply click with your mouse.', 'geoformat'); ?></div>
	<?php endif; ?>
	<div class="gp-leaflet-map-container">
        <div class="gp-leaflet-map-wrap">
            <div id="mbox-map-preview-map" class="gp-leaflet-map"
            	data-map-id="<?php echo $map_id; ?>"
            	<?php if ( $overlay != 'replace' ) : ?>data-map-tiles="<?php echo $tiles_provider; ?>"<?php endif; ?>
            	data-map-admin="1"
				<?php if (empty($image) || $overlay !='replace') : ?>data-map-zoom="<?php echo $gp_tiles_zoom; ?>" <?php endif; ?>	
				>
				</div>
        </div>
    </div>
	
	<h4><?php _e('Shortocde to copy-paste within posts or geoformats', 'geoformat'); ?></h4>
		
		<?php $link = get_permalink(); 
		$link = str_replace('maps','maps/export', $link);
		?>
		
		<h4>[map src="<?php echo $link; ?>" width="100%" height="550px"]</h4>
		
	<?php _e('If necessary, you can change the height of the map (height="XXXpx")', 'geoformat'); ?>
		
	<?php
}
?>