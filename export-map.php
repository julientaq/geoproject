<?php 
/*
Template Name: export-map
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
		
		<style>body.custom-background { background-image:none!important;}html,body{margin:0!important;}a{text-decoration:none!important;}#map { width: 100%; height:100%; position: fixed;} .map-popup-marker-more{display:none;} 		.gp-leaflet-map { width: 100%; height:100%!important; height:100vh!important; position: relative;} 		 		#export{position:absolute;z-index:999999;background:#000000;color:#FFFFFF;bottom:0;left:0;padding:8px 16px;font-size:14px;} #export a{color:#FFFFFF;} .leaflet-marker-icon{height:60px!important;width:auto!important;}.leaflet-container .leaflet-marker-pane img{max-height:60px!important;width:auto!important;height:60px!important;}</style>	
	</head>
	
	<body id="exportmap">
	<?php if ( have_posts() ) : the_post(); 

    $map_tiles_provider = get_post_meta( get_the_ID(), 'gp_tiles_provider', true );
    $overlay = get_post_meta( get_the_ID(), 'custom_image_displaying', true );
	$image = get_post_meta( get_the_ID(), 'custom_image_download', true );
	?>

	<div class="gp-leaflet-map-container">
        <div class="gp-leaflet-map-wrap">
            <div id="gp-map-<?php the_ID(); ?>" class="gp-leaflet-map"
            	data-map-id="<?php the_ID(); ?>"
            	<?php if ( $overlay != 'replace' ) : ?>data-map-tiles="<?php echo $map_tiles_provider; ?>"<?php endif; ?>
            	<?php if ($overlay != 'replace') : ?>data-map-clusterize="1"<?php endif; ?>
                data-map-markers-index="0"
				data-map-controls="1"
				data-map-drag="1"
				data-map-popups="1"></div>
        </div>
    </div>
	
	<div id="export"><a href="<?php the_permalink(); ?>" target="_blank" rel="noopener"><?php the_title(); ?></a> - <?php bloginfo('name'); ?> </div>
		<?php endif;
		
		wp_footer(); ?>
	</body>
</html>