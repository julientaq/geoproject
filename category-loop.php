<?php
//Loop for tags and categories
?>

<div class="row grid">
	
	<?php 
	
	if ( have_posts()) : while ( have_posts()) : the_post();  
			
		 $post_ids[] = get_the_ID();
		 
		 $cpt = get_post_type(); 


		 ?>

	<?php //Switched by CPT
		switch ($cpt) {
			 
			case "post" : ?>

				<div class="col col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
					<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the post', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>
					<?php	
							if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php _e( 'See the post', 'geoformat' ); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
							<?php else: ?>
							<a href="<?php the_permalink(); ?>" title="<?php _e( 'See the post', 'geoformat' ); ?>">								
								<div class="abstract">
									<?php the_title(); ?>
								</div>
							</a>
							<?php endif; ?>
					<div class="mentions home-mentions">
						<span class="iontt"><?php if( has_tag() ) : geoproject_first_post_tag_link(); endif; ?></span>
						<div class="type"><ion-icon name="document"></ion-icon></div>
					</div>
				</div>
<?php break;
			
			// Maps
			case "maps" :  
			
		
		 		?>
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
					<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>
							
						<?php 
						$link = get_the_permalink();
						$map = str_replace('maps', 'maps/home', $link);		
						?>
						<div class="map-container">
							<?php if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : ?>
								<a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>">
										<?php the_post_thumbnail(); ?>
								</a>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>">
										<iframe src="<?php echo $map; ?>" width="100%" height="400"></iframe>
								</a>
							<?php endif; ?>
						</div>
						
						 <div class="mentions home-mentions">
							<span class="iontt"><?php if( has_tag() ) : geoproject_first_post_tag_link(); endif; ?></span>
							<div class="type"><ion-icon name="map"></ion-icon></div>
						</div>
				</div>
			
<?php break;

			// Maps
			case "waymark_map" :   ?>
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
					<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>
						<?php 
						$link = get_the_permalink();
						?>
						<div class="map-container">
								<a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>">
										<?php the_post_thumbnail(); ?>
								</a>
						</div>
						
						 <div class="mentions home-mentions">
							<span class="iontt"><?php if( has_tag() ) : geoproject_first_post_tag_link(); endif; ?></span>
							<div class="type"><ion-icon name="map"></ion-icon></div>
						</div>
				</div>
<?php break;


			// Markers
			case "markers" :  	
		 		?>
				<div class="col col-lg-4 col-md-6 col-sm-12 col- mb-5">
					<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the marker', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>
							
						<?php 
						$link = get_the_permalink();
						$marker = str_replace('markers', 'markers/export', $link);		
						?>
					
						<?php if ( has_post_thumbnail() ) : ?>
							<div><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>">
										<?php the_post_thumbnail(); ?>
								</a></div>
						<?php else: ?>
							<div class="map-container"><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>">
										<iframe src="<?php echo $marker; ?>" width="100%" height="400"></iframe>
							</a></div>
						<?php endif; ?>
						
						
					<div class="mentions home-mentions">
						<span class="iontt"><?php if( has_tag() ) : geoproject_first_post_tag_link(); endif; ?></span>
						<div class="type"><ion-icon name="pin"></ion-icon></div>
					</div>
				</div>
			
<?php break;

		
		//Geoformat
		case "geoformat" : 
		?>			
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
				<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'View geoformat', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>
					<?php 
					$meta_map = html_entity_decode(get_post_meta( get_the_ID(), 'meta-map',true ));
					$meta_map = str_replace('export','home', $meta_map);
					
					if(!empty($meta_map) ) {
						echo do_shortcode($meta_map);
					} elseif ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php _e( 'View geoformat', 'geoformat' ); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php } else { ?>
						<a href="<?php the_permalink(); ?>" title="<?php _e( 'View geoformat', 'geoformat' ); ?>">
							<div class="abstract">
								<?php the_title(); ?>
							</div>	
						</a>
					<?php } ?>
					<div class="mentions home-mentions">
						<span class="iontt"><?php if( has_tag() ) : geoproject_first_post_tag_link(); endif; ?></span>
						<div class="type"><ion-icon name="paper"></ion-icon></div>
					</div>
			</div>



<?php break;
		
	//Projects		
		case "projects" : 
?>						
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
				<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'View project', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>
					<?php 
					if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php _e( 'View project', 'geoformat' ); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php } else { ?>
						<a href="<?php the_permalink(); ?>" title="<?php _e( 'View project', 'geoformat' ); ?>">
							<div class="abstract">
								<?php the_title(); ?>
							</div>	
						</a>
					<?php } ?>
					<div class="mentions home-mentions">
						<span class="iontt"><?php if( has_tag() ) : geoproject_first_post_tag_link(); endif; ?></span>
						<div class="type"><ion-icon name="paper"></ion-icon></div>
					</div>
			</div>


<?php break;
		
		}
									
		 endwhile; ?>
		</div>
		<div class="clear"></div>
				
				<?php get_template_part('next'); ?>
					
				<?php endif;  ?>
		
		<div class="clear"></div>