<?php get_header(); 
get_template_part('project-list'); ?>
<div class="row">
	<div class="col-lg-8 custom-bg">
		<?php if ( have_posts() ) :
				the_post();
			get_template_part( 'content-single' ); 
				
			if ( comments_open() ) :
				comments_template();
			endif;
			
		endif; ?>
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