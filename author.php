<?php 
//Author page

get_header(); ?>
<div class="container tagpage">
	<div id="page-content">
		<div class="row">
			<div class="col col-lg-3 gris">
				<header id="title-search" class="auteur">
					<h4><?php the_author_meta('first_name'); ?>&nbsp;<?php the_author_meta('last_name'); ?></h4>
					
						<?php $avatar = get_the_author_meta( 'geoformat_custom_avatar');
						if ( !empty($avatar) ) : ?>
							<img id="avatar-img" src="<?php echo $avatar; ?>" />
						<?php endif; ?>
						
						<?php echo get_the_author_meta('description'); ?>
					
					<p> <strong><?php _e('Contact:', 'geoformat');?></strong> <?php echo get_the_author_meta('email'); ?></p>
						
				</header>
			</div>
	
			<div class="col-lg-9 col-12 auteur-content">
				
				<?php get_template_part( 'author-loop' ); ?>
			
			</div>
<?php get_footer(); ?>