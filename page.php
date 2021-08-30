<?php get_header(); 
get_template_part('project-list'); ?>
<div class="row">
	<div class="col-lg-8 custom-bg">
		<?php 
			while ( have_posts() ) : the_post(); 
				get_template_part( 'content-page' ); 
				comments_template( '', true ); 
			endwhile; ?>
	</div>		
<?php get_sidebar(); ?>
</div>
<?php 
get_template_part('modale'); ?>
</div> <?php /* #container */ ?>
	</div>	<?php /* #page_content */ ?>
		</div> <?php /* #row */ ?>	
			</div> <?php /* #col-lg-9 */ 
get_footer(); ?>