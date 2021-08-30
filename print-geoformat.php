<?php 
/*
Template Name: print-geoformat
*/ ?>
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
		$get_meta = get_option( 'print_settings' );
		$font_title = $get_meta['print_content_title'];
		$font_subtitle = $get_meta['print_content_title'];
		$site_font_title = $get_meta['print_header_title'];
		$site_font_subtitle = $get_meta['print_header_subtitle'];
		$font_text = $get_meta['print_geoformat_font_text'];
		$multimedia_element = $get_meta['print_geoformat_section_multimedia_element'];		
		if (!empty($favicon) ){ ?>
			<link rel="shortcut icon" href="<?php echo $favicon; ?>">
		<?php } else{
			echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
		} ?>
		
		<script src="https://unpkg.com/ionicons@4.5.9-1/dist/ionicons/ionicons.js"></script>
<?php if( !empty( $font_title) || !empty ($font_subtitle) || !empty ($font_text) || !empty ($site_font_title) || !empty ($site_font_subtitle) ) : 
	if ($font_title == "select-six" || $font_subtitle == "select-six" || $font_text == "select-six" || $site_font_title == "select-six" || $site_font_subtitle == "select-six") { ?> <link href='https://fonts.googleapis.com/css?family=Arvo:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-seven" || $font_subtitle == "select-seven" || $font_text == "select-seven" || $site_font_title == "select-seven" || $site_font_subtitle == "select-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-height" || $font_subtitle == "select-eight" || $font_text == "select-height" || $site_font_title == "select-height" || $site_font_subtitle == "select-height") { ?> <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-nine" || $font_subtitle == "select-nine" || $font_text == "select-nine" || $site_font_title == "select-nine" || $site_font_subtitle == "select-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-ten" || $font_subtitle == "select-ten" || $font_text == "select-ten" || $site_font_title == "select-ten" || $site_font_subtitle == "select-ten") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-eleven" || $font_subtitle == "select-eleven" || $font_text == "select-eleven" || $site_font_title == "select-eleven" || $site_font_subtitle == "select-eleven") { ?> <link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twelve" || $font_subtitle == "select-twelve" || $font_text == "select-twelve" || $site_font_title == "select-twelve" || $site_font_subtitle == "select-twelve") { ?> <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirteen" || $font_subtitle == "select-thirteen" || $font_text == "select-thirteen" || $site_font_title == "select-thirteen" || $site_font_subtitle == "select-thirteen") { ?> <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-fourteen" || $font_subtitle == "select-fourteen" || $font_text == "select-fourteen" || $site_font_title == "select-fourteen" || $site_font_subtitle == "select-fourteen") { ?> <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-fifteen" || $font_subtitle == "select-fifteen" || $font_text == "select-fifteen" || $site_font_title == "select-fifteen" || $site_font_subtitle == "select-fifteen") { ?> <link href='https://fonts.googleapis.com/css?family=Coming+Soon&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-sixteen" || $font_subtitle == "select-sixteen" || $font_text == "select-sixteen" || $site_font_title == "select-sixteen" || $site_font_subtitle == "select-sixteen") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-seventeen" || $font_subtitle == "select-seventeen" || $font_text == "select-seventeen" || $site_font_title == "select-seventeen" || $site_font_subtitle == "select-seventeen") { ?> <link href='https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-eighteen" || $font_subtitle == "select-eighteen" || $font_text == "select-eighteen" || $site_font_title == "select-eighteen" || $site_font_subtitle == "select-eighteen") { ?> <link href='https://fonts.googleapis.com/css?family=Bree+Serif&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-nineteen" || $font_subtitle == "select-nineteen" || $font_text == "select-nineteen" || $site_font_title == "select-nineteen" || $site_font_subtitle == "select-nineteen") { ?> <link href='"https://fonts.googleapis.com/css?family=Montserrat&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty" || $font_subtitle == "select-twenty" || $font_text == "select-twenty" || $site_font_title == "select-twenty" || $site_font_subtitle == "select-twenty") { ?> <link href='https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-one" || $font_subtitle == "select-twenty-one" || $font_text == "select-twenty-one" || $site_font_title == "select-twenty-one" || $site_font_subtitle == "select-twenty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-two" || $font_subtitle == "select-twenty-two" || $font_text == "select-twenty-two" || $site_font_title == "select-twenty-two" || $site_font_subtitle == "select-twenty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-three" || $font_subtitle == "select-twenty-three" || $font_text == "select-twenty-three" || $site_font_title == "select-twenty-three" || $site_font_subtitle == "select-twenty-three") { ?> <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-four" || $font_subtitle == "select-twenty-four" || $font_text == "select-twenty-four" || $site_font_title == "select-twenty-four" || $site_font_subtitle == "select-twenty-four") { ?> <link href='https://fonts.googleapis.com/css?family=EB+Garamond:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-five" || $font_subtitle == "select-twenty-five" || $font_text == "select-twenty-five" || $site_font_title == "select-twenty-five" || $site_font_subtitle == "select-twenty-five") { ?> <link href='http://www.cnap.graphismeenfrance.fr/faune/styles/faune-fontes.css' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-six" || $font_subtitle == "select-twenty-six" || $font_text == "select-twenty-six" || $site_font_title == "select-twenty-six" || $site_font_subtitle == "select-twenty-six") { ?> <link href='https://fonts.googleapis.com/css?family=Play:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-seven" || $font_subtitle == "select-twenty-seven" || $font_text == "select-twenty-seven" || $site_font_title == "select-twenty-seven" || $site_font_subtitle == "select-twenty-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-eight" || $font_subtitle == "select-twenty-eight" || $font_text == "select-twenty-height" || $site_font_title == "select-twenty-height" || $site_font_subtitle == "select-twenty-height") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-nine" || $font_subtitle == "select-twenty-nine" || $font_text == "select-twenty-nine" || $site_font_title == "select-twenty-nine" || $site_font_subtitle == "select-twenty-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Special+Elite&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty" || $font_subtitle == "select-thirty" || $font_text == "select-thirty" || $site_font_title == "select-thirty" || $site_font_subtitle == "select-thirty") { ?> <link href='https://fonts.googleapis.com/css?family=Karma:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty-one" || $font_subtitle == "select-thirty-one" || $font_text == "select-thirty-one" || $site_font_title == "select-thirty-one" || $site_font_subtitle == "select-thirty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty-two" || $font_subtitle == "select-thirty-two" || $font_text == "select-thirty-two" || $site_font_title == "select-thirty-two" || $site_font_subtitle == "select-thirty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Overpass+Mono:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } 
endif;
	wp_head(); 
		if ( ! current_user_can( 'manage_options' ) ) {
			show_admin_bar( false );
		} 
		add_filter('show_admin_bar', '__return_false'); 
		
		$def = $get_meta['print_default'];
		$print = $get_meta['print_js'];
	
	if (empty($def) ) : ?>
	<style>
	<?php 
	get_template_part('inc/tpl-custom-css-geoformat'); 
	get_template_part('inc/tpl-custom-css-gf-print'); ?>
	body,html {font-size: 1em;line-height: 1.4;}
	@media print {
		.set-icons{padding:0!important;}#alert,#printbtnlf{display:none;}.entry-content blockquote::before, .map-content blockquote::before, .marker-content blockquote::before{top:20px!important;}.container-fluid,header,.header,.col-md-7 ,.col-sm-7,.col-sm-5,.content,.wp-caption,.caption_img_slf,.content,section,article .container,#content,#container, #slf_comments,.col-md-6,.col-sm-6,.col-sm-8,header,.header{width:100%!important;float:none!important;text-align:left;clear:both;display:block;}.chapitre,#section_un,#section_deux,#section_trois,#section_quatre,#section_cinq,#section_six,#section_sept{background:none;width:100%!important;}
		<?php if (!empty ($print) ) : ?>
			@page {size: A4;margin: 20mm 30mm;bleed: 5mm;marks: crop cross;}
		<?php endif; ?>
	}
	</style>
	<?php else : ?>
	<style>
	<?php get_template_part('inc/tpl-custom-css-gf-printed'); ?>
	#alert,#printbtn{display:none;}
	@media print {
		.set-icons{padding:0!important;}#alert,#printbtnlf{display:none;}.entry-content blockquote::before, .map-content blockquote::before, .marker-content blockquote::before{top:20px!important;}.container-fluid,header,.header,.col-md-7 ,.col-sm-7,.col-sm-5,.content,.wp-caption,.caption_img_slf,.content,section,article .container,#content,#container, #slf_comments,.col-md-6,.col-sm-6,.col-sm-8,header,.header{width:100%!important;float:none!important;text-align:left;clear:both;display:block;}.chapitre,#section_un,#section_deux,#section_trois,#section_quatre,#section_cinq,#section_six,#section_sept{background:none;width:100%!important;}
	}
	</style>
	<?php endif; ?>
  </head>
	
 <body <?php body_class(); ?>>
	
	<div id="alert">
		Ceci est une prévisualisation de votre impression. Attention, le rendu que vous obtiendrez à l’écran sera sensiblement différent de celui que vous obtiendrez lors de l’impression (ce qui est logique, la taille d’un écran n’est pas comparable à la taille d’un document imprimé), mais cela vous en donne préalablement une idée. <br/> <span id="masquer">Ne plus afficher ce message</span>
	</div>

<?php 
	$pdf = $get_meta['print_pdf'];
	if (!empty($pdf) ) : ?>
	<div id="printbtnlf">
		<button class="btn" onclick="window.print()"><?php echo __('Print this page', 'geoformat'); ?></button>
	 </div>
<?php 
	endif; 

 $gp_options = get_option( 'gp_options' ); 
 $meta_date = get_post_meta( get_the_ID(), 'meta-date', true ); 
 $meta_font_title = get_post_meta( get_the_ID(), 'meta-font_title', true );
 $sec_title_align = get_post_meta( get_the_ID(), 'section_title_align', true ); 
 $section_un = get_post_meta( get_the_ID(), '_wp_editor_section_1', true );
 $section_deux = get_post_meta( get_the_ID(), '_wp_editor_section_2', true ); 
 $section_trois = get_post_meta( get_the_ID(), '_wp_editor_section_3', true ); 
 $section_quatre = get_post_meta( get_the_ID(), '_wp_editor_section_4', true ); 
 $section_cinq = get_post_meta( get_the_ID(), '_wp_editor_section_5', true ); 
 $section_six = get_post_meta( get_the_ID(), '_wp_editor_section_6', true ); 
 $section_sept = get_post_meta( get_the_ID(), '_wp_editor_section_7', true ); 
 $section_img_1 = get_post_meta( get_the_ID(), 'meta-image_1', true ); 
 $section_img_2 = get_post_meta( get_the_ID(), 'meta-image_2', true ); 
 $section_img_3 = get_post_meta( get_the_ID(), 'meta-image_3', true ); 
 $section_img_4 = get_post_meta( get_the_ID(), 'meta-image_4', true ); 
 $section_img_5 = get_post_meta( get_the_ID(), 'meta-image_5', true ); 
 $section_img_6 = get_post_meta( get_the_ID(), 'meta-image_6', true ); 
 $section_img_7 = get_post_meta( get_the_ID(), 'meta-image_7', true ); 
 $section1_caption = get_post_meta( get_the_ID(), 'section1_caption', true ); 
 $section2_caption = get_post_meta( get_the_ID(), 'section2_caption', true ); 
 $section3_caption = get_post_meta( get_the_ID(), 'section3_caption', true ); 
 $section4_caption = get_post_meta( get_the_ID(), 'section4_caption', true ); 
 $section5_caption = get_post_meta( get_the_ID(), 'section5_caption', true ); 
 $section6_caption = get_post_meta( get_the_ID(), 'section6_caption', true ); 
 $section7_caption = get_post_meta( get_the_ID(), 'section7_caption', true ); 
 $meta_video = get_post_meta( get_the_ID(), 'meta-video',true );
 $section_video_1 = get_post_meta( get_the_ID(), 'meta-video_1', true ); 
 $section_video_2 = get_post_meta( get_the_ID(), 'meta-video_2', true );  
 $section_video_3 = get_post_meta( get_the_ID(), 'meta-video_3', true ); 
 $section_video_4 = get_post_meta( get_the_ID(), 'meta-video_4', true ); 
 $section_video_5 = get_post_meta( get_the_ID(), 'meta-video_5', true ); 
 $section_video_6 = get_post_meta( get_the_ID(), 'meta-video_6', true ); 
 $section_video_7 = get_post_meta( get_the_ID(), 'meta-video_7', true );
 $meta_map_1 = get_post_meta( get_the_ID(), 'meta-map_1',true );
 $meta_map_2 = get_post_meta( get_the_ID(), 'meta-map_2',true );
 $meta_map_3 = get_post_meta( get_the_ID(), 'meta-map_3',true );
 $meta_map_4 = get_post_meta( get_the_ID(), 'meta-map_4',true );
 $meta_map_5 = get_post_meta( get_the_ID(), 'meta-map_5',true );
 $meta_map_6 = get_post_meta( get_the_ID(), 'meta-map_6',true );
 $meta_map_7 = get_post_meta( get_the_ID(), 'meta-map_7',true );
 $section_title_un = get_post_meta( get_the_ID(), 'meta-title_1', true ); 
 $section_title_deux = get_post_meta( get_the_ID(), 'meta-title_2', true ); 
 $section_title_trois = get_post_meta( get_the_ID(), 'meta-title_3', true ); 
 $section_title_quatre = get_post_meta( get_the_ID(), 'meta-title_4', true ); 
 $section_title_cinq = get_post_meta( get_the_ID(), 'meta-title_5', true ); 
 $section_title_six = get_post_meta( get_the_ID(), 'meta-title_6', true ); 
 $section_title_sept = get_post_meta( get_the_ID(), 'meta-title_7', true ); 
 $top_title = get_post_meta( get_the_ID(), 'section_title_color', true ); 
 $sec1_title = get_post_meta( get_the_ID(), 'section1_title_color', true ); 
 $sec1_title_align = get_post_meta( get_the_ID(), 'section1_title_align', true ); 
 $sec2_title = get_post_meta( get_the_ID(), 'section2_title_color', true ); 
 $sec2_title_align = get_post_meta( get_the_ID(), 'section2_title_align', true ); 
 $sec3_title = get_post_meta( get_the_ID(), 'section3_title_color', true ); 
 $sec3_title_align = get_post_meta( get_the_ID(), 'section3_title_align', true ); 
 $sec4_title = get_post_meta( get_the_ID(), 'section4_title_color', true ); 
 $sec4_title_align = get_post_meta( get_the_ID(), 'section4_title_align', true ); 
 $sec5_title = get_post_meta( get_the_ID(), 'section5_title_color', true ); 
 $sec5_title_align = get_post_meta( get_the_ID(), 'section5_title_align', true ); 
 $sec6_title = get_post_meta( get_the_ID(), 'section6_title_color', true ); 
 $sec6_title_align = get_post_meta( get_the_ID(), 'section6_title_align', true ); 
 $sec7_title = get_post_meta( get_the_ID(), 'section7_title_color', true ); 
 $sec7_title_align = get_post_meta( get_the_ID(), 'section7_title_align', true );
 $meta_auteur = get_post_meta( get_the_ID(), 'meta-auteur', true ); 
 $load_auteur = get_post_meta( get_the_ID(), 'load-auteur', true ); 
 $meta_photos = get_post_meta( get_the_ID(), 'meta-photos', true ); 
 $meta_top = get_post_meta( get_the_ID(), 'meta-image', true ); 
 $subline = get_post_meta( get_the_ID(), 'meta-subline', true ); 
 $chapo = get_post_meta( get_the_ID(), '_wp_editor_chapo', true ); 
 $txt = get_post_meta( get_the_ID(), '_wp_editor_text', true ); 
 $meta_quote = get_post_meta( get_the_ID(), 'quote-design', true );
 $meta_quote_design = get_post_meta( get_the_ID(), 'quote', true ); 

//Content ?>

<div id="cover" >
	<h1 id="cover-title"><span><?php the_title(); ?></span></h1> 
</div>

<?php 
	$get_meta = get_option( 'print_settings' );
	$site_title = $get_meta['print_table_site_title'];
	$site_subtitle = $get_meta['print_table_site_subtitle'];
	if (!empty ($site_title) && empty ($site_subtitle)  ) : ?>
		<div id="topheader">
			<h1 id="site_title"><?php bloginfo( 'name' ); ?></h1>
		</div>
	<?php endif;
	if (!empty ($site_subtitle) && empty ($site_title) ) : ?>
		<div id="topheader">
			<h2 id="site_subtitle"><?php bloginfo( 'description' ); ?></h2>
		</div>
	<?php endif;
	if (!empty ($site_subtitle) && !empty ($site_title) ) : ?>
		<div id="topheader">
			<h1 id="site_title"><?php bloginfo( 'name' ); ?></h1>
			<h2 id="site_subtitle"><?php bloginfo( 'description' ); ?></h2>
		</div>
	<?php endif; ?>

<div id="gf-meta" >
	<h1 id="topscroll"><?php the_title(); ?></h1> 	
	<div id="image">
		<img src="<?php echo $meta_top; ?>" />
	</div>
</div>
	
<?php if (!empty($meta_auteur) || !empty($meta_photos) || !empty ($meta_date) ) : ?>
<div id="metadata">
<?php if( !empty( $meta_auteur ) ) : ?>
	<div id="author">
		<strong><?php echo $meta_auteur; ?></strong>
	</div>	
<?php endif; 
if( !empty( $meta_photos ) ) : ?> 
	<div id="photos"> 
		<?php _e('Photos: ', 'geoformat'); ?> <strong><?php echo $meta_photos; ?> </strong> 
	</div> 
<?php endif;  	
if (!empty ($meta_date) ) : ?>
	<div id="date">
		<?php the_time(__('j F Y','geoformat')); ?>
	</div>	
<?php endif; ?>
</div>	
<?php endif; ?>

<div class="clear"></div>
	
<?php if( !empty( $subline ) ) : ?> 		
	<div id="subline-print"> 
		<?php echo $subline; ?> 
	</div> 
<?php endif; ?>

<div class="clear"></div>

<?php if (!empty( $chapo ) || !empty  ($txt ) ) :  ?>
<div class="entry-content" id="bloc-intro">
<?php if( !empty( $chapo ) ) :  ?>
	<div id="hat"> 
		<?php echo apply_filters('the_content', $chapo); ?> 
	</div> <?php endif; 
	
	if( !empty( $txt ) ) : ?> 
		<?php echo apply_filters('the_content', $txt); ?> 
	<?php endif; ?>
</div> 
<?php endif; ?>

<?php //Section 1 
if (!empty ($section_title_un) || !empty ($section_img_1) || !empty ($section_video_1) || !empty ($meta_map_1) ) : ?>
	<div class="header-entry">
	<?php 
	if ($multimedia_element == 1) {
		if (!empty ($section_title_un) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_un; ?></span></h2>
		<?php endif;
		if (!empty ($section_img_1) ) { ?>
			<img src="<?php echo  $section_img_1; ?>" />
		<?php } elseif (!empty ($section_video_1) ) { 
			echo html_entity_decode($section_video_1); ?>
		<?php } elseif (!empty ($meta_map_1) ) { 
		$meta_map_1 = html_entity_decode($meta_map_1);	
			echo do_shortcode($meta_map_1); ?>		
		<?php } 
		if (!empty ($section1_caption ) ) : ?>
			<div class="caption"><?php echo $section1_caption; ?></div>
		<?php endif; ?>
	<?php } 
	elseif ($multimedia_element == 2) { 
		if (!empty ($section_img_1) ) { ?>
			<img src="<?php echo  $section_img_1; ?>" />
		<?php } elseif (!empty ($section_video_1) ) { 
			echo html_entity_decode($section_video_1); ?>
		<?php } elseif (!empty ($meta_map_1) ) { 
		$meta_map_1 = html_entity_decode($meta_map_1);	
			echo do_shortcode($meta_map_1); ?>		
		<?php } 
		if (!empty ($section1_caption ) ) : ?>
			<div class="caption"><?php echo $section1_caption; ?></div>
		<?php endif; 
		if (!empty ($section_title_un) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_un; ?></span></h2>
		<?php endif;
		} else { 
		if (!empty ($section_title_un) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_un; ?></span></h2>
		<?php endif;
	} ?>
	</div>	
<?php endif; 

if( !empty( $section_un ) ) : ?> 
	<section class="entry-content" id="section1"> 
		<?php echo apply_filters('the_content', $section_un); ?>
	</section>
<?php endif; 

//Section 2 
if (!empty ($section_title_deux) || !empty ($section_img_2) || !empty ($section_video_2) || !empty ($meta_map_2) ) : ?>
	<div class="header-entry">
	<?php 
	if ($multimedia_element == 1) {
		if (!empty ($section_title_deux) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_deux; ?></span></h2>
		<?php endif;
		if (!empty ($section_img_2) ) { ?>
			<img src="<?php echo  $section_img_2; ?>" />
		<?php } elseif (!empty ($section_video_2) ) { 
			echo html_entity_decode($section_video_2); ?>
		<?php } elseif (!empty ($meta_map_2) ) { 
		$meta_map_2 = html_entity_decode($meta_map_2);	
			echo do_shortcode($meta_map_2); ?>		
		<?php } 
		if (!empty ($section2_caption ) ) : ?>
			<div class="caption"><?php echo $section2_caption; ?></div>
		<?php endif; ?>
	<?php } 
	elseif ($multimedia_element == 2) { 
		if (!empty ($section_img_2) ) { ?>
			<img src="<?php echo  $section_img_2; ?>" />
		<?php } elseif (!empty ($section_video_2) ) { 
			echo html_entity_decode($section_video_2); ?>
		<?php } elseif (!empty ($meta_map_2) ) { 
		$meta_map_2 = html_entity_decode($meta_map_2);	
			echo do_shortcode($meta_map_2); ?>		
		<?php } 
		if (!empty ($section2_caption ) ) : ?>
			<div class="caption"><?php echo $section2_caption; ?></div>
		<?php endif; 
		if (!empty ($section_title_deux) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_deux; ?></span></h2>
		<?php endif;
		} else { 
		if (!empty ($section_title_deux) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_deux; ?></span></h2>
		<?php endif;
	} ?>
	</div>	
<?php endif; 

if( !empty( $section_deux ) ) : ?> 
	<section class="entry-content" id="section2"> 
		<?php echo apply_filters('the_content', $section_deux); ?>
	</section>
<?php endif; 

//Section 3 
if (!empty ($section_title_trois) || !empty ($section_img_3) || !empty ($section_video_3) || !empty ($meta_map_3) ) : ?>
	<div class="header-entry">
	<?php 
	if ($multimedia_element == 1) {
		if (!empty ($section_title_trois) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_trois; ?></span></h2>
		<?php endif;
		if (!empty ($section_img_3) ) { ?>
			<img src="<?php echo  $section_img_3; ?>" />
		<?php } elseif (!empty ($section_video_3) ) { 
			echo html_entity_decode($section_video_3); ?>
		<?php } elseif (!empty ($meta_map_3) ) { 
		$meta_map_3 = html_entity_decode($meta_map_3);	
			echo do_shortcode($meta_map_3); ?>		
		<?php } 
		if (!empty ($section3_caption ) ) : ?>
			<div class="caption"><?php echo $section3_caption; ?></div>
		<?php endif; ?>
	<?php } 
	elseif ($multimedia_element == 2) { 
		if (!empty ($section_img_3) ) { ?>
			<img src="<?php echo  $section_img_3; ?>" />
		<?php } elseif (!empty ($section_video_3) ) { 
			echo html_entity_decode($section_video_3); ?>
		<?php } elseif (!empty ($meta_map_3) ) { 
		$meta_map_3 = html_entity_decode($meta_map_3);	
			echo do_shortcode($meta_map_3); ?>		
		<?php } 
		if (!empty ($section3_caption ) ) : ?>
			<div class="caption"><?php echo $section3_caption; ?></div>
		<?php endif; 
		if (!empty ($section_title_trois) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_trois; ?></span></h2>
		<?php endif;
		} else { 
		if (!empty ($section_title_trois) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_trois; ?></span></h2>
		<?php endif;
	} ?>
	</div>	
<?php endif; 

if( !empty( $section_trois ) ) : ?> 
	<section class="entry-content" id="section3"> 
		<?php echo apply_filters('the_content', $section_trois); ?>
	</section>
<?php endif;

//Section 4 
if (!empty ($section_title_quatre) || !empty ($section_img_4) || !empty ($section_video_4) || !empty ($meta_map_4) ) : ?>
	<div class="header-entry">
	<?php 
	if ($multimedia_element == 1) {
		if (!empty ($section_title_quatre) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_quatre; ?></span></h2>
		<?php endif;
		if (!empty ($section_img_4) ) { ?>
			<img src="<?php echo  $section_img_4; ?>" />
		<?php } elseif (!empty ($section_video_4) ) { 
			echo html_entity_decode($section_video_4); ?>
		<?php } elseif (!empty ($meta_map_4) ) { 
		$meta_map_4 = html_entity_decode($meta_map_4);	
			echo do_shortcode($meta_map_4); ?>		
		<?php } 
		if (!empty ($section4_caption ) ) : ?>
			<div class="caption"><?php echo $section4_caption; ?></div>
		<?php endif; ?>
	<?php } 
	elseif ($multimedia_element == 2) { 
		if (!empty ($section_img_4) ) { ?>
			<img src="<?php echo  $section_img_4; ?>" />
		<?php } elseif (!empty ($section_video_4) ) { 
			echo html_entity_decode($section_video_4); ?>
		<?php } elseif (!empty ($meta_map_4) ) { 
		$meta_map_4 = html_entity_decode($meta_map_4);	
			echo do_shortcode($meta_map_4); ?>		
		<?php } 
		if (!empty ($section4_caption ) ) : ?>
			<div class="caption"><?php echo $section4_caption; ?></div>
		<?php endif; 
		if (!empty ($section_title_quatre) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_quatre; ?></span></h2>
		<?php endif;
		} else { 
		if (!empty ($section_title_quatre) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_quatre; ?></span></h2>
		<?php endif;
	} ?>
	</div>	
<?php endif; 

if( !empty( $section_quatre ) ) : ?> 
	<section class="entry-content" id="section4"> 
		<?php echo apply_filters('the_content', $section_quatre); ?>
	</section>
<?php endif; 

//Section 5 
if (!empty ($section_title_cinq) || !empty ($section_img_5) || !empty ($section_video_5) || !empty ($meta_map_5) ) : ?>
	<div class="header-entry">
	<?php 
	if ($multimedia_element == 1) {
		if (!empty ($section_title_cinq) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_cinq; ?></span></h2>
		<?php endif;
		if (!empty ($section_img_5) ) { ?>
			<img src="<?php echo  $section_img_5; ?>" />
		<?php } elseif (!empty ($section_video_5) ) { 
			echo html_entity_decode($section_video_5); ?>
		<?php } elseif (!empty ($meta_map_5) ) { 
		$meta_map_5 = html_entity_decode($meta_map_5);	
			echo do_shortcode($meta_map_5); ?>		
		<?php } 
		if (!empty ($section5_caption ) ) : ?>
			<div class="caption"><?php echo $section5_caption; ?></div>
		<?php endif; ?>
	<?php } 
	elseif ($multimedia_element == 2) { 
		if (!empty ($section_img_5) ) { ?>
			<img src="<?php echo  $section_img_5; ?>" />
		<?php } elseif (!empty ($section_video_5) ) { 
			echo html_entity_decode($section_video_5); ?>
		<?php } elseif (!empty ($meta_map_5) ) { 
		$meta_map_5 = html_entity_decode($meta_map_5);	
			echo do_shortcode($meta_map_5); ?>		
		<?php } 
		if (!empty ($section5_caption ) ) : ?>
			<div class="caption"><?php echo $section5_caption; ?></div>
		<?php endif; 
		if (!empty ($section_title_cinq) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_cinq; ?></span></h2>
		<?php endif;
		} else { 
		if (!empty ($section_title_cinq) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_cinq; ?></span></h2>
		<?php endif;
	} ?>
	</div>	
<?php endif; 

if( !empty( $section_cinq ) ) : ?> 
	<section class="entry-content" id="section5"> 
		<?php echo apply_filters('the_content', $section_cinq); ?>
	</section>
<?php endif; 

//Section 6

if (!empty ($section_title_six) || !empty ($section_img_6) || !empty ($section_video_6) || !empty ($meta_map_6) ) : ?>
	<div class="header-entry">
	<?php 
	if ($multimedia_element == 1) {
		if (!empty ($section_title_six) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_six; ?></span></h2>
		<?php endif;
		if (!empty ($section_img_6) ) { ?>
			<img src="<?php echo  $section_img_6; ?>" />
		<?php } elseif (!empty ($section_video_6) ) { 
			echo html_entity_decode($section_video_6); ?>
		<?php } elseif (!empty ($meta_map_6) ) { 
		$meta_map_6 = html_entity_decode($meta_map_6);	
			echo do_shortcode($meta_map_6); ?>		
		<?php } 
		if (!empty ($section6_caption ) ) : ?>
			<div class="caption"><?php echo $section6_caption; ?></div>
		<?php endif; ?>
	<?php } 
	elseif ($multimedia_element == 2) { 
		if (!empty ($section_img_6) ) { ?>
			<img src="<?php echo  $section_img_6; ?>" />
		<?php } elseif (!empty ($section_video_6) ) { 
			echo html_entity_decode($section_video_6); ?>
		<?php } elseif (!empty ($meta_map_6) ) { 
		$meta_map_6 = html_entity_decode($meta_map_6);	
			echo do_shortcode($meta_map_6); ?>		
		<?php } 
		if (!empty ($section6_caption ) ) : ?>
			<div class="caption"><?php echo $section6_caption; ?></div>
		<?php endif; 
		if (!empty ($section_title_six) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_six; ?></span></h2>
		<?php endif;
		} else { 
		if (!empty ($section_title_six) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_six; ?></span></h2>
		<?php endif;
	} ?>
	</div>	
<?php endif; 

if( !empty( $section_six ) ) : ?> 
	<section class="entry-content" id="section6"> 
		<?php echo apply_filters('the_content', $section_six); ?>
	</section>
<?php endif; 

//Section 7 
if (!empty ($section_title_sept) || !empty ($section_img_7) || !empty ($section_video_7) || !empty ($meta_map_7) ) : ?>
	<div class="header-entry">
	<?php 
	if ($multimedia_element == 1) {
		if (!empty ($section_title_sept) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_sept; ?></span></h2>
		<?php endif;
		if (!empty ($section_img_7) ) { ?>
			<img src="<?php echo  $section_img_7; ?>" />
		<?php } elseif (!empty ($section_video_7) ) { 
			echo html_entity_decode($section_video_7); ?>
		<?php } elseif (!empty ($meta_map_7) ) { 
		$meta_map_7 = html_entity_decode($meta_map_7);	
			echo do_shortcode($meta_map_7); ?>		
		<?php } 
		if (!empty ($section7_caption ) ) : ?>
			<div class="caption"><?php echo $section7_caption; ?></div>
		<?php endif; ?>
	<?php } 
	elseif ($multimedia_element == 2) { 
		if (!empty ($section_img_7) ) { ?>
			<img src="<?php echo  $section_img_7; ?>" />
		<?php } elseif (!empty ($section_video_7) ) { 
			echo html_entity_decode($section_video_7); ?>
		<?php } elseif (!empty ($meta_map_7) ) { 
		$meta_map_7 = html_entity_decode($meta_map_7);	
			echo do_shortcode($meta_map_7); ?>		
		<?php } 
		if (!empty ($section7_caption ) ) : ?>
			<div class="caption"><?php echo $section7_caption; ?></div>
		<?php endif; 
		if (!empty ($section_title_sept) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_sept; ?></span></h2>
		<?php endif;
		} else { 
		if (!empty ($section_title_sept) ) :?>
			<h2 class="section-title"><span><?php echo $section_title_sept; ?></span></h2>
		<?php endif;
	} ?>
	</div>	
<?php endif; 

if( !empty( $section_sept ) ) : ?> 
	<section class="entry-content" id="section7"> 
		<?php echo apply_filters('the_content', $section_sept); ?>
	</section>
<?php endif; 

if( !empty( $footer ) ) : ?> 
		<footer>
			<div id="footer_lf" class="container col-md-12"> 
				<?php echo apply_filters('the_content', $footer); ?> 
			</div> 
		</footer> 
<?php endif; ?>
	<script>
	jQuery(document).ready(function($) {
		$('#masquer').click(function(){
			$('#alert').fadeOut();
		});
	});
	</script>	
  </body>
</html>