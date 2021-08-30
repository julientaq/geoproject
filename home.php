<?php get_header(); 
get_template_part('project-list'); ?>
<div class="row home-row">
	
	<?php 
	$gp_options = get_option( 'gp_options' );
	$nbre = get_post_meta( get_the_ID(), 'gp_settings_field_front_nb_maps', true );
	
	$the_query = new WP_Query( 
		array (
			'post_type' => array('post','maps','geoformat'),
			'posts_per_page' => $nbre
		)
	);
	
	if ( $the_query->have_posts()) : while ( $the_query->have_posts()) : $the_query->the_post();  
		
		if(get_post_meta($post->ID, 'alaune_une', true) == 'yes') :
		
		 $post_ids[] = get_the_ID();
		 
		 $cpt = get_post_type(); ?>

	<?php //Switched by CPT
		switch ($cpt) {
			 
			case "post" : ?>

				<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
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
							<div class="type"><?php get_template_part('format'); ?></div>
						</div>
				</div>
			
<?php break;
			
			// Maps
			
			case "maps" : ?>
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
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
						<div class="type"><ion-icon name="pin"></ion-icon></div>
					</div>
				</div>
<?php break;
		
		//Geoformat
			
		case "geoformat" : 
		?>			
			
			<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
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
			<?php 
			break;
			}
									
		 endif; endwhile;  endif; ?>


<?php
	// Get featured markers list in this project
        $markers_args = array(
					'post_type' 	=> 'markers',
					'post_status' => 'publish',
					'meta_query'  => array( 
							array(
							'key' 	=> 'alaune_une',
							'value'=> 'yes',
							 ),
					)
				);
		$markers_query = new WP_Query();
	    $markers_query->query( $markers_args );
		if($markers_query->have_posts()):
		?>
			<?php while ( $markers_query->have_posts()) : $markers_query->the_post();  
			add_image_size( 'marker-thumb', 99999, 400 ); //300 pixels wide (and unlimited height)
		?>
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
				<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the marker', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>

				<?php 
						$link = get_the_permalink();
						$marker = str_replace('markers', 'markers/export', $link);		
						?>
						<div class="map-container">	
							<?php if ( has_post_thumbnail() ) : ?>
								<a class="marker_thumbnail" href="<?php the_permalink(); ?>" title="<?php _e( 'See the marker', 'geoformat' ); ?>">
									<?php the_post_thumbnail('marker-thumb'); ?>
								</a>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>" title="<?php _e( 'See the marker', 'geoformat' ); ?>">
									<iframe src="<?php echo $marker; ?>" width="100%" height="400"></iframe>
								</a>
							<?php endif; ?>
						</div>
					<div class="mentions home-mentions">
						<span class="iontt"><?php if( has_tag() ) : geoproject_first_post_tag_link(); endif; ?></span>
						<div class="type"><ion-icon name="pin"></ion-icon></div>
					</div>

				</div>
			<?php endwhile;
		wp_reset_postdata();
		endif;
?>





</div>
<div class="clear"></div>	
</div> <?php /* #container */ ?>
	</div>	<?php /* #page_content */ ?>
		</div> <?php /* #row */ ?>	
			</div> <?php /* #col-lg-9 */ 
get_footer(); ?>