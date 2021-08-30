<section id="post-<?php the_ID(); ?>">
	
	<header class="entry-header">
		<h1 class="entry-title"><span class="iont"><ion-icon name="cellular"></ion-icon></span><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php get_template_part('networks'); ?>
</section>