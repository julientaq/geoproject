<?php 
/*
Template Name: Archive for geoformats
*/
get_header(); ?>

<div class="container tagpage">
	 <div id="page-content">
		
		<header id="bigmap-header">
			<h1><div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php _e('Geoformats', 'geoformat'); ?></h1>
		</header>
		
			<div class="row grid">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="col col-lg-3 col-md-4 col-sm-6 col-12 grid-item col-loop">
					
				<figure class="effeckt-caption" data-effeckt-type="cover-fade">
				
				<?php if( has_tag() ) : ?>
					<div class="cat-tag">
						<?php geoproject_first_post_tag_link(); ?>
					</div>
				<?php endif;
				
					$meta_map = html_entity_decode(get_post_meta( get_the_ID(), 'meta-map',true ));
					$meta_map = str_replace('export','home', $meta_map);
					
					if(!empty($meta_map) ) {
						echo do_shortcode($meta_map);
					} elseif ( has_post_thumbnail() ) { 
						the_post_thumbnail();	
					} else { ?>
						<div class="abstract">
							<?php the_title(); ?>
						</div>	
					<?php } ?>
					
					<figcaption>
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
							<div class="effeckt-figcaption-wrap">
								<?php if ( has_post_thumbnail() ) : ?>
									<h3><?php the_title(); ?></h3>
								<?php endif; ?>
									<?php echo excerpt(10); ?>
							</div>
						</a>
					</figcaption>
				</figure>
						
					<div class="mentions">
						<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
						<div class="type"><ion-icon name="paper"></ion-icon></div>
					</div>
				
				</div>
				<?php endwhile; ?>
			</div>
				
				<div class="clear"></div>
				
				<?php $next_post = get_next_posts_link(); if (!empty( $next_post )): ?>
					<div id="loader">
						<nav class="wp-prev-next btn">
							<?php next_posts_link (_e('+ See more', 'geoformat'));  ?>
						</nav>
					</div>
				<?php endif;
					
				endif; ?>
		
		<div class="clear"></div>	
	</div>
</div>
<?php get_footer(); ?>