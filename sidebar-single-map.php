<div class="col-lg-4 sidebar">

		
<?php
		$project_contents_total = 0;
		$map_project_ID = get_post_meta( get_the_ID(), 'gp_project', true );
		$maps_in_this_project = array();

		if ( $map_project_ID != 0 ) :
			
			if ( gp_query_exists_project( $map_project_ID ) ) :

				$project_contents = gp_query_get_project_contents(
					$map_project_ID,
					array(
						'post__not_in' => array( get_the_ID() )
					) 
				);

				$project_contents_total = count( $project_contents );

				if ( $project_contents_total > 0 ) : 

					?>
					<h2 class="side-title-project txt-on-bg"><span class="iont"><ion-icon name="cellular"></ion-icon></span>  <?php _e( 'In the same project', 'geoformat' ); ?></h2>

					<?php
					// Loop through project contents
						foreach ( $project_contents as $post ) : setup_postdata( $post ); 
								$post_types = array(
									'post' 		=> 'post',
									'maps' 		=> 'map',
									'capes' 	=> 'cape',
									'geoformat' => 'geoformat',
									'waymark_map' => 'waymark_map'
								);

								$content_permalink = get_permalink( $post );

// Content type Maps
	if ( $post->post_type == 'maps' ) : 
		$maps_in_this_project[] = get_the_ID(); ?>
		<aside class="side">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			
				<?php 
				if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : 
					the_post_thumbnail();
				else :
					$link = get_the_permalink();
					$map = str_replace('maps', 'maps/home', $link);		
				?>
					<div class="gp-leaflet-map-container">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><iframe src="<?php echo $map; ?>" width="100%" height="400"></iframe></a>
					</div>
				<?php endif; ?>
		</aside>
	<?php endif; 

	
// Content type Waymark Map
	if ( $post->post_type == 'waymark_map' && get_post_meta($post->ID, 'display_image_une', true) == 'yes' ) : 
		$maps_in_this_project[] = get_the_ID(); ?>
		<aside class="side">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php the_post_thumbnail(); ?>
		</aside>
	<?php endif; 


// Content type Capes
	if ( $post->post_type == 'capes' ) : 
		$maps_in_this_project[] = get_the_ID(); ?>
		<aside class="side">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			
				<?php 
				if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : 
					the_post_thumbnail();
				else :
					$link = get_the_permalink();
					$cape = str_replace('capes', 'capes/home', $link);		
				?>
					<div class="gp-leaflet-map-container">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><iframe src="<?php echo $cape; ?>" width="100%" height="400"></iframe></a>
					</div>
				<?php endif; ?>
		</aside>
	<?php endif; 
	


// Content type Geoformat
	if ( $post->post_type == 'geoformat' ) : 
		$maps_in_this_project[] = get_the_ID(); ?>
		<aside class="side">		
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>

			<?php 
				$meta_map = html_entity_decode(get_post_meta( get_the_ID(), 'meta-map',true ));
				$meta_map = str_replace('export','home', $meta_map);	
					if(!empty($meta_map) ) {
						echo do_shortcode($meta_map);
					} elseif ( has_post_thumbnail() ) { 
						the_post_thumbnail();	
					} ?>
		</aside>
	<?php endif; 

// Content type POST
	if ( $post->post_type == 'post' ) : 
	$maps_in_this_project[] = get_the_ID(); ?>
		<aside class="side">		
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>

			<?php 
					if ( has_post_thumbnail() ) :
						the_post_thumbnail();	
					else : ?>
					<div class="text-post">
					<?php echo excerpt(15); ?>
					</div>
			<?php endif; ?>
		</aside>
		<?php endif; ?>
		
		<div class="clearfix"></div>
			<?php endforeach; wp_reset_postdata();
				endif;
			endif;
		endif; ?>
</div>