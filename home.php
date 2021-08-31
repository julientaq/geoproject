<?php get_header(); 
get_template_part('project-list'); 
$gp_options = get_option( 'gp_options' );
$show_bigmap = $gp_options['bigmap_on_hp'];



if($show_bigmap != 0):
	// Load Leaflet
	gp_load_frontend_leaflet();
	$map_tiles_provider = $gp_options['special_map_tiles_provider'];
 	?>
 	<div class="row home-row big-map-page">
 		<div class="col col-12" id="big-map-page">
			<div class="gp-leaflet-big-map-container">
			        <div class="gp-leaflet-map-wrap">
			            <div id="gp-big-map" class="gp-leaflet-map"
			            	data-map-id="all"
			            	data-map-markers-filters="1"
			            	data-map-tiles="<?php echo $map_tiles_provider; ?>"
			            	data-map-clusterize="0"></div>
			        </div>
			    </div>

	<div id="filters">
							<?php 
							if ( !empty(gp_query_get_projects() ) ):

								$projects = gp_query_get_projects();
								

								if ( count( $projects ) > 1 ):

								?>
									<div id="fltr_projects" class="btn-group btn-group-toggle mt-4 mb-2" data-toggle="buttons">
									
										<label class="btn btn-primary active" data-project="prjct_all">
										<input type="radio" class="btn-check">
										<?php echo _e('All Projects', 'geoformat'); ?></label>
										
										<?php

										foreach($projects as $p)
										{
											$hasMarkers = false;

											$getMapsInGivenProject = get_posts( array(
												'post_type'			=> 'maps' ,
												'meta_query'		=> array(
																		array(
																			'key' 		=> 'gp_project',
																			'value' 	=> $p->ID,
																			'compare' 	=> '='
																		)
												),
											));
											foreach($getMapsInGivenProject as $m)
											{
												if ( gp_query_count_markers_in_map($m->ID) > 0 )
												{
												$hasMarkers = true;	
												break;
												}
											}


												if($hasMarkers)
												{

												$id_project = $p->ID;
												$name_project = $p->post_title;
												?>
												<label class="btn btn-primary prjct_<?php echo $id_project;?>" data-project="prjct_<?php echo $id_project;?>">
													<input type="radio" class="btn-check " name="prjct_<?php echo $id_project;?>">
													<?php echo $name_project;?></label>
												<?php
												}
										}

									echo '</div><br/>';
								endif;
							else: ?>
								<label class="active" data-project="prjct_all">

							<?php endif; ?>
							
						<?php 

						if ( markers_in_categories()  ): ?>

							<div id="fltr_cats" class="btn-group btn-group-toggle my-2" data-toggle="buttons">

								<label class="btn btn-primary active" data-cat="cat_all">
								<input type="radio" class="btn-check" name="cat_all">
								 <?php echo _e('All Categories', 'geoformat');?></label>
						   		<?php 
								foreach ( get_categories() as $c) 
								{
							    	$args = array(
								    'post_type' => 'markers',
								    'post_status' => 'publish',
								   	'category' => $c->term_id
								   	);
										$postslist = get_posts( $args );
										
							      	if( !empty($postslist) ):
													$id_cat = $c->term_id;
													$name_cat = $c->name;
													?>
											<label class="btn btn-secondary" data-cat="cat_<?php echo $id_cat;?>">
												<input type="radio" class="btn-check" name="cat_<?php echo $id_cat;?>">
												<?php echo $name_cat;?></label>
										<?php
									endif;
								}
								echo '</div>';
								?>		
							</div>

						<?php else: ?>
							<label class="active" data-cat="cat_all">

						<?php endif; ?>
					</div>
				</div>
	</div>

<?php else: ?>
	<div class="row home-row">
	
	<?php 
	$nbre = $gp_options['front_nb_maps'];
	
	$the_query = new WP_Query( 
		array (
			'post_type' => array('post','maps','geoformat'),
			'posts_per_page' => $nbre,
			 'meta_query' => array(
           			array(
               				'key' => 'alaune_une',
               				'value' => 'yes',
					'compare' => '='
    				)
			)
		)
	);
	
	if ( $the_query->have_posts()) : while ( $the_query->have_posts()) : $the_query->the_post();  
		
		
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
							<div class="type"><ion-icon name="map"></ion-icon></div>
						</div>
					</div>
	<?php break;


			// Waymark Maps
				
				case "waymark_map" : ?>
					<?php if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : ?>
						<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
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
					<?php endif; ?>
	<?php break;

				
				// Capes
				
				case "capes" : ?>
					<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
						<h3 class="home-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'See the map', 'geoformat' ); ?>"><?php the_title(); ?> </a></h3>
						<?php 
						$link = get_the_permalink();
						$map = str_replace('capes', 'capes/home', $link);		
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
							<div class="type"><ion-icon name="airplane"></ion-icon></div>
						</div>
					</div>
	<?php break;



			
			//Geoformat
				
			case "geoformat" : ?>			
				
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
										
			endwhile;  endif; ?>
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
<?php endif; ?>

<div class="clear"></div>	
</div> <?php /* #container */ ?>
	</div>	<?php /* #page_content */ ?>
		</div> <?php /* #row */ ?>	
			</div> <?php /* #col-lg-9 */ 
get_footer(); ?>