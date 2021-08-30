<?php
//Loop project content list
?>
<div class="row grid main-project">
<?php
	
	$project_ID = get_the_ID();
	
	$args = array( 
		'post_type'   	=> array('post', 'geoformat', 'maps'),
		'meta_key' 	=> 'gp_project',
		'meta_value' => $project_ID,
		'meta_value_type' 	=> 'numeric',
		'posts_per_page' => -1
    );
	
	$wp_query = new WP_Query();
    $wp_query->query( $args );

    if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) : $wp_query->the_post();
	
	$cpt = get_post_type();  ?>

	<?php if ($cpt == 'post') : ?>
			<div class="col col-lg-6 col-md-6 col-sm-12 col-12 grid-item">
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
	<?php endif; 

	if ($cpt == 'maps') :

	 	//on regroupe les IDs dans un array pour chercher ensuite les marqueurs.
	 	$mapsIDs[]=get_the_ID();

	  ?>			
		<div class="col col-lg-6 col-md-6 col-sm-12 col-12 grid-item">
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
	<?php endif;

	if ($cpt == 'geoformat') : ?>		
		<div class="col col-lg-6 col-md-6 col-sm-12 col-12 grid-item">
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
	<?php endif;
		
	endwhile;?>
		
	<?php
	// Get last markers list in this project
	if (!empty($mapsIDs)):  

        $markers_args = array(
					'post_type' 	=> 'markers',
					'post_status' => 'publish',
					'meta_query'  => array( 
							array(
							'key' 	=> 'alaune_une',
							'value'=> 'yes',
							 ),
							array(
							'key' => 'gp_map',
	           				 'compare' => 'IN',
							'value'	=> $mapsIDs,
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
				<div class="col col-lg-6 col-md-6 col-sm-12 col-12 grid-item">
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
	endif;?>


	</div>


	<div class="clear"></div>
			
	<?php get_template_part('next'); ?>
					
	<?php endif; 
	wp_reset_postdata(); ?>
</div>		
<div class="clear"></div>