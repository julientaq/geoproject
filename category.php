<?php 
/*
Template Name: Template for categories
*/
get_header(); ?>

<div class="container tagpage">
	 <div id="page-content">
		
		<header id="bigmap-header">
			<h1><div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php echo single_cat_title( '', false ); ?></h1>
		</header>


		<div class="row">
			<div class="col col-lg-2 mb-5">
				<?php gp_the_categories_list_nav(); ?>
			</div>
			
			<div class="col-lg-10">		
				<?php get_template_part( 'category-loop' ); ?>
			</div>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>