<?php 
/*
Template Name: Archive for markers
*/
get_header(); ?>

<div class="container tagpage">
	 <div id="page-content">
		
		<header id="bigmap-header">
			<h1><div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php _e('Markers', 'geoformat'); ?></h1>
		</header>
		
			<div class="row grid">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="col col-lg-3 col-md-4 col-sm-6 col-12 grid-item col-loop">	
					<figure class="effeckt-caption" data-effeckt-type="cover-fade">	
					<?php 
					$link = get_the_permalink();
					$map = str_replace('markers', 'markers/export', $link);	?>
					<div class="gp-leaflet-map-container">	
					
						<?php if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : ?>
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						<?php else: ?>
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
								<iframe src="<?php echo $map; ?>" width="100%" height="400"></iframe>
							</a>
						<?php endif; ?>
				
					</div>
						<figcaption>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="wrap">
									<h3><?php the_title(); ?></h3>
									<?php echo excerpt(10); ?>
								</div>
							</a>
						</figcaption>
					</figure>
					 
					 <div class="mentions">
						<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
						<div class="type"><ion-icon name="pin"></ion-icon></div>
					</div>
					
				</div>
				<?php endwhile; ?>
			</div>
				
				<div class="clear"></div>
				
				<?php get_template_part('next'); ?>
					
				<?php endif; ?>
		
		<div class="clear"></div>	
	</div>
</div>
<?php get_footer(); ?>