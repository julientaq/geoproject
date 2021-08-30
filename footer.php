<?php
// The template for displaying the footer : Contains the closing of the id=main div and all content after

if (!is_post_type('geoformat') ) : 

$aut =  get_the_author_meta('ID');?>
	
	<div class="clear"></div>

<?php endif; ?>

<div id="up">
	<ion-icon name="arrow-round-up"></ion-icon>
</div>

<footer id="footer">
	<div class="container container-lf">
		<div class="col-12" style="padding:0;">
			<div class="row">	
				<?php
				// Footer Widgets
				if ( is_active_sidebar( 'footer-widgets' ) ) :
					// Count widgets
					$the_sidebars = wp_get_sidebars_widgets();
					$nb_widgets = count( $the_sidebars['footer-widgets'] );
					dynamic_sidebar( 'footer-widgets' ); 
				endif; ?>
			</div>
			
			<div class="clear"></div>
			
			<div id="footer-bottom" class="row">
				
				<?php 
				$gp_options = get_option( 'gp_options' ); 
				$blog_title = $gp_options['blog_title']; 
				$copyright = $gp_options['copyright']; 
				$year = $gp_options['year']; 
				
				if (!empty($gp_options['logo'])):
					$logo = $gp_options['logo']; 
				else :
					$logo = " ";
				endif;
				
				if (!empty($gp_options['custom_text'])):
					$mentions = $gp_options['custom_text']; 
				else :
					$mentions = " ";
				endif;
				
				?>
				<div class="col-lg-6 col-12">
				<?php if ($logo != " ") : ?>
					<img src="<?php echo $logo; ?>" alt="Logo" id="logo" />
				<?php endif; 
				if ($mentions!= " ") : 
					echo $mentions;
				endif; ?>
					<div class="mt-3">
						<?php
						if( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( admin_url( '/index.php/#dashboard_field_notes') ); ?>"><?php _e( 'Field Notes', 'geoformat' );?></a>
						<?php 
						else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>login"><?php _e( 'Field Notes', 'geoformat' );?></a>

						<?php endif;
						?>
					</div>
				</div>
				<div class="col-lg-6  col-12 p-0 p-md-3 copy">
				<?php if ( $blog_title == 1 ) : ?>	
						<a href="<?php echo get_site_url(); ?>"><?php bloginfo( 'title' ); ?></a>
					<?php endif;
					if ( $copyright == 1 ) : ?>
						Géoproject-Géoformat &copy;
				<?php endif; 
					if ( $year == 1 ) :
						echo date('Y'); 
				endif; ?>
					<div><small><?php echo sprintf( __( 'This site is licensed under a <a target="_blank" href="%s">Creative Commons Attribution BY-NC-ND.</a>' , 'geoformat' ), 
						    esc_url( 'https://creativecommons.org/licenses/by-nc-nd/3.0/') 
						); ;?></small>
					</div>
					<div><small>
					<?php 
					$carre_d_art_url = esc_url("https://www.nimes.fr/bibliotheque/nos-bibliotheques/bibliotheque-carre-dart-jean-bousquet.html");
					$labo2 = esc_url("https://www.nimes.fr/bibliotheque/labo2-laboratoire-des-usages.html");


					echo sprintf( __( 'Proudly edited by <a target="_blank" href="%1$s">Bibliothèque Carré d\'Art</a> and its <a target="_blank" href="%2$s">laboratoire des usages Labo<sup>2</sup></a>', 'geoformat'), $carre_d_art_url, $labo2); ?>
					</small>
					</div>
				</div>
				<div class="clear"></div>
				
		</div>
	</div>
</footer>
	
<?php if (is_post_type('geoformat') ) :
	$meta_loader_animate = get_post_meta( get_the_ID(), 'meta-loader-animate', true );
	if ( $meta_loader_animate == 'select-one' ) : ?>
		<script type="text/javascript">
			jQuery(window).load(function() {$(".page_loader").fadeOut("slow").animate({top:-1600},1200);})
		</script> <?php else : ?>
		<script type="text/javascript">
			jQuery(window).load(function() {$(".page_loader").animate({top:-1600},1200);})
		</script>
	<?php endif; 
	

	$options = get_option('google_analytics', array() ); if( !empty( $options ) ) : 
		echo $options; 
	endif; 	
endif; 
    
	$gp_options = get_option( 'gp_options' ); $google_anaytics = $gp_options['google_analytics'];
		if (!empty($google_anaytics) ){
			echo $google_anaytics;
		}
	
	wp_footer(); ?>
	
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
  </body>
</html>