<?php get_header(); 
get_template_part('project-list'); ?>
<div class="row set-icons">
	<div class="col-lg-8 custom-bg">
		<?php while ( have_posts() ) : the_post(); 
		
			get_template_part( 'content-single-marker' ); 
		
			if ( comments_open() ) :
				comments_template();
			endif;;
		
		endwhile; ?>
	</div>
	<?php get_sidebar('single-marker'); ?>
</div>
<?php 
get_template_part('modale'); ?>
</div> <?php /* #container */ ?>
	</div>	<?php /* #page_content */ ?>
		</div> <?php /* #row */ ?>	
			</div> <?php /* #col-lg-9 */ 
get_footer(); ?>