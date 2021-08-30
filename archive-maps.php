<?php 
/*
Template Name: Archive for maps
*/
get_header(); ?>

<div class="container tagpage">
	 <div id="page-content">
		
		<header id="bigmap-header">
			<h1><div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php _e('Maps', 'geoformat'); ?></h1>
		</header>
		
			<div class="row grid">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="col col-lg-3 col-md-4 col-sm-6 col-12 grid-item col-loop">
					<figure class="effeckt-caption" data-effeckt-type="cover-fade">	
					<?php if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : ?>
					<div class="gp-leaflet-map-container">
					<?php if( has_tag() ) : ?>
						<div class="cat-tag">
							<?php geoproject_first_post_tag_link(); ?>
						</div>
					<?php endif; 
						the_post_thumbnail(); ?>
					</div>
					<?php else:
					$link = get_the_permalink();
					$map = str_replace('maps', 'maps/home', $link);		
					?>
					<div class="gp-leaflet-map-container">
					<?php if( has_tag() ) : ?>
						<div class="cat-tag">
							<?php geoproject_first_post_tag_link(); ?>
						</div>
					<?php endif; ?>
						<iframe src="<?php echo $map; ?>" width="100%" height="400"></iframe>
					</div>
					<?php endif; ?>
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