<?php 
/*
Template Name: Archive for projects
*/
get_header(); ?>

<div class="container archive-projects archives tagpage">
	 <div id="page-content">
		
		<header id="bigmap-header">
			<h1><div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php _e('Projects', 'geoformat'); ?></h1>
		</header>
		
		<div class="row grid">
			<?php if ( have_posts() ) : 
			$n = 0;
			while ( have_posts() ) : the_post(); 
			$n++; ?>
				<div class="col col-lg-3 col-md-4 col-sm-6 col-12 loop-projet grid-item">
					<div class="card">
					<?php if( has_tag() ) : ?>
						<div class="cat-tag">
							<?php geoproject_first_post_tag_link(); ?>
						</div>
					<?php endif;
						  if (has_post_thumbnail() ) : ?>
							<div id="thumbhome">
								<?php the_post_thumbnail(); ?>
							</div>	
						  <?php endif; ?>
							<div class="card-text">
								<h5 class="card-title"><?php the_title(); ?></h5>
									<?php echo excerpt(10); ?>
							</div>
								<a href="<?php the_permalink(); ?>" class="btn">Voir le projet</a>
								<div class="share"><a href="#modal<?php echo $n; ?>" data-toggle="modal"><ion-icon name="share"></ion-icon></a></div>
					</div>
				</div> 
					
				<div class="modal" id="modal<?php echo $n; ?>">
					<div class="modal-dialog modal-lg modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-body">
						 <a href="#" data-dismiss="modal" class="close-modal"><ion-icon name="close"></ion-icon></a>
						 
						<div class="ion-modal"><ion-icon name="share"></ion-icon></div>
						
						<h4>Partager ce projet</h4>
						
						<h3><?php the_title(); ?></h3>
						
							<div class="networks-modal">
								<?php get_template_part('networks'); ?>
							</div>
						
						<div class="link"> <ion-icon name="link"></ion-icon> <br/> <?php the_permalink(); ?></div> 
						
						</div>
					  </div>
					</div>
				</div>
		<?php endwhile; ?>
		</div>
					
		<div class="clear"></div>
				
				<?php get_template_part('next'); ?>
					
				<?php endif; ?>
		
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>