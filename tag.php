<?php 
/*
Template Name: Template for tags
*/
get_header(); ?>

<div class="container tagpage">
	 <div id="page-content">
		
		<header id="bigmap-header">
			<h1><div class="iont">#</div><?php echo single_tag_title( '', false ); ?></h1>
		</header>
		
		<?php get_template_part( 'category-loop' ); ?>
		
	</div>
</div>
<?php get_footer(); ?>