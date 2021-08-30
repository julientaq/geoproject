<?php
/**
 * The template for displaying Search Results pages.
**/

get_header(); ?>
<div class="container tagpage search">
	<div id="page-content">

	<?php if ( have_posts() ) : ?>

		<header id="bigmap-header">
			<h1> <div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php _e('Search results for:', 'geoformat'); ?> "<?php the_search_query(); ?>"</h1>
						
			<h3 id="search-result">Votre recherche a retourné <?php echo $wp_query->found_posts; if ( $wp_query->found_posts == 1 ) : ?> résultat <?php else : ?> résultats <?php endif; ?> </h3>
			
		</header>
			
		<div class="row grid tagpage">
			
			<?php while (have_posts()) : the_post(); 
				$do_not_duplicate = $post->ID;
				get_template_part('content-search'); 
			endwhile; ?>	
		
		</div>
		
		<div class="clear"></div>
				
			<?php get_template_part('next'); ?>
					
		<div class="clear"></div>
		
	<?php else : ?>
		<div class="col col-lg-12 col-md-12 erreur">	
			<h1><?php _e( 'Nothing found for: ', 'geoformat' ); the_search_query(); ?></h1>

				<p>
					<?php _e( 'Sorry, but nothing matched your search terms. <br/> Please try again with some different keywords.', 'geoformat' ); ?></p>
				<p>
					<div id="tag_cloud">
						<?php wp_tag_cloud( 'smallest=8&largest=22' ); ?>
					</div>
		</div>

	<?php endif; ?>

	</div>
</div>
<?php get_footer(); ?>