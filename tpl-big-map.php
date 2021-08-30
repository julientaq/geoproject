<?php
/**
 * Template Name: Big Map
**/

get_template_part('header'); ?>

<div class="container">
	 <div id="page-content">

		<?php while ( have_posts() ) : the_post(); ?>
				
				<header id="bigmap-header">
					<h1><div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php the_title(); ?></h1>
				</header>

				<?php
				
				$content = get_the_content();
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);

				// Load Leaflet
				 gp_load_frontend_leaflet();
				 $gp_options = get_option( 'gp_options' );
			     $map_tiles_provider = $gp_options['special_map_tiles_provider'];
				?>

				<div class="gp-leaflet-map-container-big">
			        <div class="gp-leaflet-map-wrap">
			            <div id="gp-big-map" class="gp-leaflet-map"
			            	data-map-id="all"
			            	data-map-tiles="<?php echo $map_tiles_provider; ?>"
			            	data-map-clusterize="1"></div>
			        </div>
			    </div>
				
				<div id="bigmap-footer">
						<?php the_content(); 					
						
						get_template_part('networks'); ?>
				</div>
	<?php endwhile; ?>
	
	</div>
</div>
<?php get_footer(); ?>