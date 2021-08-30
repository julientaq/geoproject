<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php 
		$gp_options = get_option( 'gp_options' );
		$favicon = $gp_options['favicon']; 
		if (!empty($favicon) ){ ?>
			<link rel="shortcut icon" href="<?php echo $favicon; ?>">
		<?php } else{
			echo '<link rel="shortcut icon" href="'. get_template_directory_uri().'/img/favicon.ico" />';
		} ?>
				
		<?php wp_head(); ?>
		
		<script src="https://unpkg.com/ionicons@4.5.9-1/dist/ionicons/ionicons.js"></script>
		
		<?php 
		$get_meta = get_option( 'print_settings' );	
		$def = $get_meta['print_default'];
		$print = $get_meta['print_js'];
		
		if (is_singular('geoformat') ) :
			get_template_part('inc/tpl-custom-css-geoformat'); 
		
		if (empty($def) ) : ?>
			<style>
				@media print {
					<?php get_template_part('inc/tpl-custom-css-gf-print'); ?>
					.container-fluid,header,.header,.col-md-7 ,.col-sm-7,.col-sm-5,.content,.wp-caption,.caption_img_slf,.content,section,article .container,#content,#container, #slf_comments,.col-md-6,.col-sm-6,.col-sm-8,header,.header {width:100%!important;float:none!important;text-align:left;clear:both;display:block;}.chapitre,#section_un,#section_deux,#section_trois,#section_quatre,#section_cinq,#section_six,#section_sept{background:none;width:100%!important;}body,html {font-size: 1em;line-height: 1.4;}.title {margin-top:50px;}
					<?php if (!empty ($print) ) : ?>
						@page {size: A4;margin: 20mm 30mm;bleed: 5mm;marks: crop;}
					<?php endif; ?>
				}
			</style>
		<?php endif;
		endif; 
		
		if ( is_admin_bar_showing() ) : ?> 
				<style>.logged-in .navbar{top:32px!important;} .logged-in #menu {top: 88px!important;}.logged-in #side_nav {top:86px;}.logged-in #show.open {margin-top: 4px !important;}</style> 
		<?php endif;
		
		if ( is_singular() ) :
			if(get_post_meta($post->ID, 'mapbox_mapbox', true) == 'yes') : ?>
				<script src='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js'></script>
				<link href='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css' rel='stylesheet' />
		<?php endif; 
		endif;
	
if ( !is_singular('geoformat') ) : 
	gp_the_css_for_custom_colors(); ?>					
@media print {
	<?php get_template_part('inc/print/default');			
if (!empty ($print) ) : ?>
	@page {size: A4;margin: 20mm 30mm;bleed: 5mm;marks: crop;}
<?php endif; ?>
}
</style>
<?php endif;?>
	
</head>

	<body <?php body_class(); ?>>

		<!--[if lt IE 8]><p class=chromeframe>Votre navigateur est <em>vieux !</em> <a href="http://browsehappy.com/">Installez un navigateur moderne</a> pour profiter pleinement de ce site.</p><![endif]-->
		
		<?php if (!is_singular('geoformat') ) :
			get_template_part('navtop'); 
		endif; ?>