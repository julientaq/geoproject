<?php 
/*
Template Name: export-marker
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">
		<?php 
		$gp_options = get_option( 'gp_options' );
		$favicon = $gp_options['favicon']; 
		if (!empty($favicon) ){ ?>
			<link rel="shortcut icon" href="<?php echo $favicon; ?>">
		<?php } else{
			echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
		} ?>
				
		<?php wp_head(); 
		if ( ! current_user_can( 'manage_options' ) ) {
			show_admin_bar( false );
		} 
		add_filter('show_admin_bar', '__return_false'); ?>
		
		<style>body.custom-background { background-image:none!important;}html,body{margin:0!important;}#map { width: 100%; height:100%; position: fixed;}.gp-leaflet-map { width: 100%; height:100%!important; height:100vh!important; position: relative;} 		.leaflet-marker-icon{height:30px!important;width:auto!important;}.leaflet-container .leaflet-marker-pane img{max-height:30px!important;width:auto!important;height:30px!important;}
		</style>	
	</head>
	
	<body>
		<?php if ( have_posts() ) : the_post(); 
		$gp_options = get_option( 'gp_options' );
		$zoom = $gp_options['zoom'];
		$marker_map_ID = get_post_meta( get_the_ID(), 'gp_map', true );
		
			if (!isset($marker_map_ID)) :
				$marker_map_ID = 0;
			endif;
			if (!isset($marker_map)) :
				$marker_map = 0;
			endif;
			if (!isset($marker_map_project_ID)) :
				 $marker_map_project_ID = 0;
			endif;

		if ( $marker_map_ID != 0 ) :
			$marker_map = gp_query_get_map( $marker_map_ID );
		endif;

        if ( $marker_map != '' ) :
            $marker_map_project_ID = get_post_meta( $marker_map->ID, 'gp_project', true );
		endif;
          
        if ( $marker_map_project_ID != '' ) :
            $marker_map_project = gp_query_get_project( $marker_map_project_ID );
		endif;

				$map_tiles_provider = get_post_meta( get_the_ID(), 'gp_tiles_provider', true );
                $overlay = get_post_meta( get_the_ID(), 'custom_image_displaying', true ); 
				if ( $map_tiles_provider == '' ) :
					{ $map_tiles_provider = GP_DEFAULT_TILES_PROVIDER;}
				endif;
				
				
				?>
				<div id="map">
                        <div id="gp-map-marker-<?php echo $marker_map_ID; ?>" class="gp-leaflet-map"
                            data-map-id="<?php echo $marker_map_ID; ?>"
                            <?php if ($overlay != 'replace') : ?>data-map-tiles="<?php echo $map_tiles_provider; ?>"<?php endif; ?>
                            <?php if ($overlay != 'replace') : ?>data-map-zoom="<?php echo $zoom; ?>"<?php endif; ?>
                            data-map-clusterize="0"
                            data-map-markers-index="0"
							data-map-controls="0"
							data-map-popups="0"></div>
                </div>
		
		<?php endif;
		wp_footer(); ?>
	</body>
</html>