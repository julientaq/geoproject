<div class="col-lg-4 sidebar">

		
<?php
		$project_contents_total = 0;
		$cap_project_ID = get_post_meta( get_the_ID(), 'gp_project', true );
		$caps_in_this_project = array();

		if ( $cap_project_ID != 0 ) :
			
			if ( gp_query_exists_project( $cap_project_ID ) ) :

				$project_contents = gp_query_get_project_contents(
					$cap_project_ID,
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
									'capes' 		=> 'cape',
									'geoformat' => 'geoformat'
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
	

	
// Content type Capes
	if ( $post->post_type == 'caps' ) : 
		$caps_in_this_project[] = get_the_ID(); ?>
		<aside class="side">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			
				<?php 
				if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : 
					the_post_thumbnail();
				else :
					$link = get_the_permalink();
					$cap = str_replace('caps', 'caps/home', $link);		
				?>
					<div class="gp-leaflet-cap-container">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><iframe src="<?php echo $cap; ?>" width="100%" height="400"></iframe></a>
					</div>
				<?php endif; ?>
		</aside>
	<?php endif; 
	
// Content type Geoformat
	if ( $post->post_type == 'geoformat' ) : 
		$caps_in_this_project[] = get_the_ID(); ?>
		<aside class="side">		
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>

			<?php 
				$meta_cap = html_entity_decode(get_post_meta( get_the_ID(), 'meta-cap',true ));
				$meta_cap = str_replace('export','home', $meta_cap);	
					if(!empty($meta_cap) ) {
						echo do_shortcode($meta_cap);
					} elseif ( has_post_thumbnail() ) { 
						the_post_thumbnail();	
					} ?>
		</aside>
	<?php endif; 

// Content type POST
	if ( $post->post_type == 'post' ) : 
	$caps_in_this_project[] = get_the_ID(); ?>
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