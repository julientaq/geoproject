<?php 
	$next_post = get_next_posts_link(); 
	if (!empty( $next_post )): ?>
		<div id="loader">
			<nav class="wp-prev-next btn">
				<?php next_posts_link( esc_html__( '+ See more' , 'geoformat' )  );  ?>
			</nav>
		</div>
<?php 
	endif; 
?>