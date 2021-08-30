<?php 
/*
Template Name: print-single
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
		$font_text = $get_meta['print_content_font_text'];		
	if (!empty($favicon) ){ ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
	<?php } else{
	echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
	} ?>	
	<script src="https://unpkg.com/ionicons@4.5.9-1/dist/ionicons/ionicons.js"></script>
	<?php wp_head(); 
if ( ! current_user_can( 'manage_options' ) ) { show_admin_bar( false ); } add_filter('show_admin_bar', '__return_false'); 
if( !empty( $font_title) || !empty ($font_subtitle) || !empty ($font_text) || !empty ($site_font_title) || !empty ($site_font_subtitle) ) : ?>
<?php if ($font_title == "select-six" || $font_subtitle == "select-six" || $font_text == "select-six" || $site_font_title == "select-six" || $site_font_subtitle == "select-six") { ?> <link href='https://fonts.googleapis.com/css?family=Arvo:400,700&display=swap' rel='stylesheet' type='text/css'>
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
	<?php  } 
endif;
$def = $get_meta['print_default'];
$print = $get_meta['print_js'];
		gp_the_css_for_custom_colors();
	if (empty($def) ) : 
		gp_the_css_for_print();  ?>
		@media print {
			.set-icons{padding:0!important;}
			#alert,#printbtn{display:none;}
			.entry-content blockquote::before, .map-content blockquote::before, .marker-content blockquote::before{top:20px!important;}
		<?php if (!empty ($print) ) : ?>
			@page {size: A4;margin: 20mm 30mm;bleed: 5mm;marks: crop;}
	<?php endif; ?>
	}
	</style>
		<?php else : ?>
			#alert,#printbtn{display:none;}
			<?php get_template_part('inc/print/custom'); ?>
	
	</style>
<?php endif; 
	if(get_post_meta($post->ID, 'mapbox_mapbox', true) == 'yes') : ?>
		<script src='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js'></script>
		<link href='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css' rel='stylesheet' />
	<?php endif; ?>
</head>
	
 <body <?php body_class(); ?>>
 
	<div id="alert">
		Ceci est une prévisualisation de votre impression. Attention, le rendu que vous obtiendrez à l’écran sera sensiblement différent de celui que vous obtiendrez lors de l’impression (ce qui est logique, la taille d’un écran n’est pas comparable à la taille d’un document imprimé), mais cela vous en donne préalablement une idée. <br/> <span id="masquer">Ne plus afficher ce message</span>
	</div>

<?php 
	$pdf = $get_meta['print_pdf'];
	if (!empty($pdf) ) : ?>
	<div id="printbtn">
		<button class="btn" onclick="window.print()"><?php echo __('Print this page', 'geoformat'); ?></button>
	 </div>
<?php 
	endif; 
	$get_meta = get_option( 'print_settings' );
	$site_title = $get_meta['print_table_site_title'];
	$site_subtitle = $get_meta['print_table_site_subtitle'];
	if (!empty ($site_title) && empty ($site_subtitle)  ) : ?>
		<header id="topheader">
			<h1 id="site_title"><?php bloginfo( 'name' ); ?></h1>
		</header>
	<?php endif;
	if (!empty ($site_subtitle) && empty ($site_title) ) : ?>
		<header id="topheader">
			<h2 id="site_subtitle"><?php bloginfo( 'description' ); ?></h2>
		</header>
	<?php endif;
	if (!empty ($site_subtitle) && !empty ($site_title) ) : ?>
		<header id="topheader">
			<h1 id="site_title"><?php bloginfo( 'name' ); ?></h1>
			<h2 id="site_subtitle"><?php bloginfo( 'description' ); ?></h2>
		</header>
	<?php endif;?>

	<div class="row set-icons">
		<div class="col-lg-12">
			<?php 	
			while ( have_posts() ) : the_post(); ?>
			
			<header class="entry-header">
	
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>

				<div class="entry-meta clearfix">

					<div class="entry-date">
						<div class="date-entry"><ion-icon name="time"></ion-icon><?php the_time('d-m-Y'); ?></div>
						<div id="auteur"><ion-icon name="person"></ion-icon>
						<?php 
							if ( function_exists( 'coauthors_posts_links' ) ) : 
								coauthors_posts_links();
							else: 
								the_author_posts_link();
							endif;
						?></div>
					</div>

				<div class="entry-categories">
					<ion-icon name="folder-open"></ion-icon>
					<span><?php echo get_the_category_list( ', ' ); ?></span>
				
				<?php
				$project_ID = get_post_meta( get_the_ID(), 'gp_project', true );

					if ( $project_ID != 0 ) :
						$project = gp_query_get_project( $project_ID );

						if ( $project != '' ) : ?>
							
								&nbsp; <ion-icon name="pin"></ion-icon>
								<a href="<?php echo get_permalink( $project ); ?>" title="<?php echo esc_attr( $project->post_title ); ?>">
									<?php echo $project->post_title; ?>
								</a>

							<?php
						endif;
					endif;
					?>
				</div>
			</div>
		</header>

		<div class="entry-content">
			<?php the_content(); 
			if ( comments_open() ) : ?>
				<?php comments_template(); ?>
			</div>
			<?php endif;				
			endwhile; ?>
		</div>
	</div>
	
	<script>
	jQuery(document).ready(function($) {
		$('#masquer').click(function(){
			$('#alert').fadeOut();
		});
		$('p > img').unwrap();
		$('figure > img').unwrap();
	});
	</script>	
  </body>
</html>