<?php get_header(); 
get_template_part('project-list'); ?>
<div class="row type-projects">
	<div class="col col-lg-4 col-md-5 col-sm-6 col-12 projects-contents">
		<section class="top-project">
			<?php while ( have_posts() ) : the_post(); 
				
					get_template_part( 'content-single-project' ); 
				
					
			endwhile; 
			wp_reset_query(); ?>
		</section>
	</div>
		
	<div class="col col-lg-8 col-md-7 col-sm-6 col-12 projects-sidebar">
		
		<h3 id="projectlistprint">Dans ce projet</h3>
		
		<?php get_template_part( 'project-loop' ); ?>
		
	</div>

</div>
</div>
</div>
</div>
<?php get_footer(); ?>