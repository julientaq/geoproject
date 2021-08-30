<?php 
/*
Template Name: Template for index (general, not used)
*/
get_header();  
get_template_part('project-list'); ?>
<div class="row">
	
	<?php $the_query = new WP_Query( 
		array (
			'post_type' => array('post','maps','geoformat'),
			'posts_per_page' => 12
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
					  
					<figure class="effeckt-caption" data-effeckt-type="cover-fade">
					<?php if( has_tag() ) : ?>
						<div class="cat-tag">
							<?php geoproject_first_post_tag_link(); ?>
						</div>
					<?php endif;	
							if ( has_post_thumbnail() ) : 
								the_post_thumbnail();
							else: ?>
									
								<div class="abstract">
									<?php the_title(); ?>
								</div>
							
							<?php endif; ?>
							
							<figcaption>
							  <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
								<div class="effeckt-figcaption-wrap">
									<?php if ( has_post_thumbnail() ) : ?>
										<h3><?php the_title(); ?></h3>
									<?php endif; ?>
										<?php echo excerpt(15); ?>
								</div>
							  </a>
							</figcaption>
						</figure>
						
						<div class="mentions">
							<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
							<div class="type"><?php get_template_part('format'); ?></div>
						</div>
				</div>
			
<?php break;
			
			// Maps
			
			case "maps" :  ?>
				<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
					<?php 
					$link = get_the_permalink();
					$map = str_replace('maps', 'maps/home', $link);		
					?>
					<div class="gp-leaflet-map-container">
						<?php if( has_tag() ) : ?>
							<div class="cat-tag">
								<?php geoproject_first_post_tag_link(); ?>
							</div>
						<?php endif; ?>
						<?php if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : 
							the_post_thumbnail();
						else: ?>
							<iframe src="<?php echo $map; ?>" width="100%" height="400"></iframe>
						<?php endif; ?>
					</div>
						
					<figure class="show-fig">	
						<figcaption>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="wrap">
									<h3><?php the_title(); ?></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
								</div>
							</a>
						</figcaption>
					</figure>
					 
					 <div class="mentions">
						<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
						<div class="type"><ion-icon name="pin"></ion-icon></div>
					</div>
					
				</div>
			
<?php break;
		
		//Geoformat
			
		case "geoformat" : 
		?>			
			
			<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
					
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
									<?php echo excerpt(15); ?>
							</div>
						</a>
					</figcaption>
				</figure>
						
					<div class="mentions">
						<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
						<div class="type"><ion-icon name="paper"></ion-icon></div>
					</div>
				
				</div>
			<?php 
			break;
			}
									
		 endif; endwhile;  endif; ?>
</div>
<div class="clear"></div>	
<?php get_footer(); ?>