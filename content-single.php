<section id="post-<?php the_ID(); ?>">
	
	<header class="entry-header">
	
		<h1>
			<?php the_title(); ?>
		</h1>

		<div class="entry-meta clearfix">
			<?php if(get_post_type(get_the_ID()) != "waymark_map"): ?>
				<div class="entry-date">
					<span class="date-entry"><ion-icon name="time"></ion-icon><?php the_time('d-m-Y'); ?></span>
					<span id="auteur"><ion-icon name="person"></ion-icon>
					<?php 
						if ( function_exists( 'coauthors_posts_links' ) ) : 
							coauthors_posts_links();
						else: 
							the_author_posts_link();
						endif;
					?></span>
				</div>

				<div class="entry-categories">
					<ion-icon name="folder-open"></ion-icon>
					<span><?php echo get_the_category_list( ', ' ); ?></span>
				</div>
			<?php endif; ?>

			<div class="entry-categories">
			<?php
			$project_ID = get_post_meta( get_the_ID(), 'gp_project', true );

				if ( $project_ID != 0 ) :
					$project = gp_query_get_project( $project_ID );

					if ( $project != '' ) : ?>
						<p class="map-project"><strong>Projet : </strong><a href="<?php echo get_permalink( $project ); ?>" title="<?php echo esc_attr( $project->post_title ); ?>"><?php echo $project->post_title; ?></a></p>
						<?php
					endif;
				endif;
				?>
			</div>

		</div>
	
	</header>

	<div class="entry-content">
		<?php the_content(); ?>	
	</div>
	<?php 
		if (has_tag()) : ?>
			<div id="geotagp"><?php the_tags( '#', ' #', ' ' ); ?></div>
		<?php endif;
		get_template_part('networks'); ?>
</section>