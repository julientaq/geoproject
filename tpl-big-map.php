<?php
/**
 * Template Name: Big Map
**/

get_template_part('header'); ?>

<div class="container" id="big-map-page">
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



			<div class="gp-leaflet-map-container">
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

				<div id="bigmap-footer">
						<?php the_content(); 					
						
						get_template_part('networks'); ?>
				</div>
	<?php endwhile; ?>
	
	</div>
</div>
<?php get_footer(); ?>

<script>		

   
</script>