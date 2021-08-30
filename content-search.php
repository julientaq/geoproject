<?php
//Display search list

$post_ids[] = get_the_ID();
$cpt = get_post_type(); 

	//Switched by CPT
		switch ($cpt) {
		 
		case "post" : ?>

			<div class="col col-lg-3 col-md-6 col-sm-12 col-12 grid-item">
				<div class="card">
					<?php if( has_tag() ) : ?>
						<div class="cat-tag">
							<?php geoproject_first_post_tag_link(); ?>
						</div>
					<?php endif;
					if ( has_post_thumbnail() ) : ?>
						<div id="thumbhome">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>
					
					<div class="card-text">
						<h5 class="card-title">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> 							<?php the_title(); ?></a>
						</h5>
						<?php echo excerpt(10); ?>
					</div>
				</div>
				<div class="mentions">
					<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
					<div class="type"><?php get_template_part('format'); ?></div>
				</div>
			</div>
		
<?php break;
	// Maps	
		case "maps" :  ?>
			<div class="col col-lg-3 col-md-6 col-sm-12 col-12 grid-item">
				<div class="card">
					<?php if( has_tag() ) : ?>
						<div class="cat-tag">
							<?php geoproject_first_post_tag_link(); ?>
						</div>
					<?php endif;
					$link = get_the_permalink();
					$map = str_replace('maps', 'maps/home', $link);
					?>
						
					<iframe class="mappy" src="<?php echo $map; ?>" width="100%" height="400"></iframe>
				
					<div class="card-text">
						<h5 class="card-title">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> 							<?php the_title(); ?></a>
						</h5>
						<?php echo excerpt(10); ?>
					</div>
				</div>
				
				 <div class="mentions">
					<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
					<div class="type"><ion-icon name="pin"></ion-icon></div>
				</div>
			</div>
		
<?php break;

// Markers
		case "markers" :  ?>
			<div class="col col-lg-3 col-md-6 col-sm-12 col-12 grid-item">
				<div class="card">
					<?php if( has_tag() ) : ?>
						<div class="cat-tag">
							<?php geoproject_first_post_tag_link(); ?>
						</div>
					<?php endif;
					$link = get_the_permalink();
					$map = str_replace('markers', 'markers/export', $link);		
					?>
						
					<iframe class="mappy" src="<?php echo $map; ?>" width="100%" height="400"></iframe>
					<div class="card-text">
						<h5 class="card-title">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> 							<?php the_title(); ?></a>
						</h5>
						<?php echo excerpt(10); ?>
					</div>
				</div>
				 
				<div class="mentions">
					<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
					<div class="type"><ion-icon name="pin"></ion-icon></div>
				</div>
			</div>
<?php break;
	//Geoformat	
		case "geoformat" : ?>			
		<div class="col col-lg-3 col-md-6 col-sm-12 col-12 grid-item">
			<div class="card">
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
				
				<div class="card-text">
					<h5 class="card-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> 							<?php the_title(); ?></a>
					</h5>
					<?php echo excerpt(10); ?>
				</div>
			</div>
				
				<div class="mentions">
					<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
					<div class="type"><ion-icon name="paper"></ion-icon></div>
				</div>
		</div>
<?php break;
		
	//Projects		
		case "projects" : 
?>				
		<div class="col col-lg-3 col-md-6 col-sm-12 col-12 grid-item">
			<div class="card">
			<?php if( has_tag() ) : ?>
				<div class="cat-tag">
					<?php geoproject_first_post_tag_link(); ?>
				</div>
			<?php endif;	
				if ( has_post_thumbnail() ) : 
					the_post_thumbnail();
				else: ?>
						
				<div class="abstract">
					<h3><?php the_title(); ?></h3>
				</div>
					
				<?php endif; ?>
					
				<div class="card-text">
						<h5 class="card-title">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> 							<?php the_title(); ?></a>
						</h5>
						<?php echo excerpt(10); ?>
					</div>
				</div>
				
				<div class="mentions">
					<div class="ion"><ion-icon name="timer"></ion-icon></div> <?php the_time('d-m-Y'); ?>
					<div class="type"><ion-icon name="folder"></ion-icon></div>
				</div>
			
			</div>
<?php break;
	}
?>