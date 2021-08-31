<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package GeoProjects
 */


/**
 * Print the custom css colors in a <style> tag
 * @return HTML
 */
function gp_the_css_for_custom_colors() {

	$gp_options = get_option( 'gp_options' );
	$primary = $gp_options['primary_color'];
	$secundary = $gp_options['secundary_color'];
	$icon = $gp_options['icon_color'];
	$burger_color = $gp_options['burger_color']; 
	$title = $gp_options['title_color'];	
	$subtitle = $gp_options['subtitle_color']; 
	$background = $gp_options['background_color'];
	$text = $gp_options['text_color'];
	$background_menu = $gp_options['background_menu'];	
	$link_menu = $gp_options['link_menu'];		
	$exergues = $gp_options['exergues']; 
	$footer_background = $gp_options['footer_style'];
	$footer_color = $gp_options['bottom_color'];
	$footer_link_color = $gp_options['footer_link_color'];
	$meta_font = $gp_options['font_text'];
	$meta_font_title = $gp_options['font_title'];
	$social_color = $gp_options['social_color'];  
	$font_size = $gp_options['font_size']; 
	
	require_once(get_template_directory() . '/inc/tpl-custom-css-colors.php' );
}

function gp_the_css_for_print() {	
	require_once(get_template_directory() . '/inc/tpl-custom-css-print.php' );
}

function gp_the_css_gf_for_print() {	
	require_once(get_template_directory() . '/inc/tpl-custom-css-gf-print.php' );
}

if ( ! function_exists( 'gp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function gp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'geoformat' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'geoformat' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 50 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'geoformat' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="awaiting-mod"><?php _e( 'Your comment is awaiting moderation.', 'geoformat' ); ?></p>
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'geoformat' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'geoformat' ), ' ' );
					?>
				</div>
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</article>

	<?php
			break;
	endswitch;
}
endif; // ends check for gp_comment()

/**
 * Returns true if a blog has more than 1 category
 *
 */
function gp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so gp_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so gp_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in gp_categorized_blog
 *
 */
function gp_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'gp_category_transient_flusher' );
add_action( 'save_post', 'gp_category_transient_flusher' );





/**
 * Prints HTML of the categories List sidebar
 */
function gp_the_categories_list_nav() {
					$args = array(
					'show_option_all'    => '',
					'show_option_none'   => __('No categories'),
					'orderby'            => 'name',
					'order'              => 'ASC',
					'style'              => 'list',
					'show_count'         => 0,
					'hide_empty'         => 1,
					'use_desc_for_title' => 1,
					'child_of'           => 0,
					'feed'               => '',
					'feed_type'          => '',
					'feed_image'         => '',
					'exclude'            => '',
					'exclude_tree'       => '',
					'include'            => '',
					'hierarchical'       => true,
					'title_li'           => false,
					'number'             => NULL,
					'echo'               => 1,
					'depth'              => 0,
					'current_category'   => 0,
					'pad_counts'         => 0,
					'taxonomy'           => 'category',
					'separator'          => '<br />',
				);
				?>
				<div> 
					<ul class="nav-list">
						<li class="nav-title"><?php _e( 'Categories', 'geoformat' ); ?></li>
						<?php wp_list_categories( $args ); ?>
					</ul>
				</div>
				<?php

}






/**
 * Prints HTML of the projects List sidebar
 */
function gp_the_projects_list_nav() {
	global $post;

	// Get Projects list
	$projects_list = gp_query_get_projects(
		array(
			'orderby'	=> 'date',
			'order' 	=> 'DESC',
		)
	);

	$cpt = 0;
	$total_projects = count( $projects_list );

	if ( $total_projects > 0 ) : ?>
		
				<ul class="nav-list">
					<li class="nav-title"><ion-icon name="pin"></ion-icon> <?php _e( 'Projects list', 'geoformat' ); ?></li>	
					
					<?php
					// Loop through projects
					foreach ( $projects_list as $p ) : ?>

						<?php
						$liClass = ( $cpt >= GP_DEFAULT_PROJECTS_DISPLAYED_IN_LIST_MIN ) ? ' project-hide-for-min' : '';
						$liClass .= ( $cpt >= GP_DEFAULT_PROJECTS_DISPLAYED_IN_LIST_MED ) ? ' project-hide-for-med' : '';
						$liClass .= ( $cpt >= GP_DEFAULT_PROJECTS_DISPLAYED_IN_LIST_MAX ) ? ' project-hide-for-max' : '';
						$liClass .= ( isset($post->ID) && $post->ID == $p->ID ) ? ' current-project-page' : '';
						$liClass = 'class="' . $liClass . '"';
						?>

						<li <?php echo $liClass; ?>>
							<a href="<?php echo get_permalink( $p ); ?>" title="<?php echo esc_attr( $p->post_title ); ?>">
							<?php echo $p->post_title; ?>
							</a>
						</li>

					<?php $cpt++; endforeach; ?>

				</ul>
				
	<?php endif;

}


//Last maps
function gp_the_side_last_maps( $params = array() ) {
	global $post;

	// Merge params
	$defaults_params = array(
		'excluded_maps'	=> array()
	);

	$params = array_merge( $defaults_params, $params );

	// Get last maps list
	$last_maps = gp_query_get_maps( array(
		'post_type'			=> 'maps',
		'order'				=> 'date',
		'orderby'			=> 'DESC',
		'posts_per_page'	=> 2,
		'post__not_in' 		=> $params['excluded_maps']
	));

	if ( count( $last_maps ) > 0 ) : ?>
		
	<h2 class="side-title-map txt-on-bg"><span class="iont"><ion-icon name="cellular"></ion-icon></span>  <?php _e( 'Last Maps', 'geoformat' ); ?></h2>
		
		<?php foreach ( $last_maps as $post ) : setup_postdata( $post ); ?>

			<aside class="side">
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h3>

				<?php 
				if(get_post_meta($post->ID, 'display_image_une', true) == 'yes') : 
					the_post_thumbnail(); 
				else:
					$link = get_the_permalink();
					$map = str_replace('maps', 'maps/home', $link);		
				?>
					<div class="gp-leaflet-map-container">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><iframe src="<?php echo $map; ?>" width="100%" height="400"></iframe></a>
					</div>
					<?php endif; ?>
				</aside>
	
		<?php endforeach; wp_reset_postdata();
	endif;
}

//Last markers
function gp_the_side_last_markers( $params = array() ) {
	global $post;
	
	// Get last markers list
	$the_query = new WP_Query( 
		array (
		'post_type'			=> 'markers',
		'order'				=> 'date',
		'orderby'			=> 'DESC',
		'posts_per_page'	=> 2,
		'post__not_in' => array($post->ID)
	)); 

	if($the_query->have_posts())
	{
	?>
		<h2 class="side-title-marker txt-on-bg">
			<span class="iont"><ion-icon name="cellular"></ion-icon></span>  <?php _e( 'Last Markers', 'geoformat' ); ?>
		</h2>
		
		<?php while ( $the_query->have_posts()) : $the_query->the_post();  
		 ?>
			
			<aside class="side">		
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h3>

				<?php 
						$link = get_the_permalink();
						$marker = str_replace('markers', 'markers/export', $link);		
						?>
						<div class="gp-leaflet-map-container">	
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
									<iframe src="<?php echo $marker; ?>" width="100%" height="400"></iframe>
								</a>
							<?php endif; ?>
						</div>
			</aside>
			<?php endwhile;
			wp_reset_postdata();
	}

}



//Last capes
function gp_the_side_last_capes( $params = array() ) {
	global $post;
	
	// Get last capes list
	$lastCapes = new WP_Query( 
		array (
		'post_type'			=> 'capes',
		'order'				=> 'date',
		'orderby'			=> 'DESC',
		'posts_per_page'	=> 2,
		'post__not_in' => array($post->ID)
	)); 

	if($lastCapes->have_posts())
	{
	?>
		<h2 class="side-title-marker txt-on-bg">
			<span class="iont"><ion-icon name="airplane"></ion-icon></span>  <?php _e( 'Last Capes', 'geoformat' ); ?>
		</h2>
		
		<?php while ( $lastCapes->have_posts()) : $lastCapes->the_post();  
		 ?>
			
			<aside class="side">		
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h3>

				<?php 
						$link = get_the_permalink();
						$cape = str_replace('capes', 'capes/home', $link);		
						?>
						<div class="gp-leaflet-map-container">	
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
									<iframe src="<?php echo $cape; ?>" width="100%" height="400"></iframe>
								</a>
							<?php endif; ?>
						</div>
			</aside>
			<?php endwhile;
			wp_reset_postdata();
	}

}

//Last capes
function gp_the_side_last_itineraries( $params = array() ) {
	global $post;
	
	// Get last capes list
	$lastItineraries = new WP_Query( 
		array (
		'post_type'			=> 'waymark_map',
		'order'				=> 'date',
		'orderby'			=> 'DESC',
		'posts_per_page'	=> 2,
		'post__not_in' => array($post->ID)
	)); 

	if($lastItineraries->have_posts())
	{
	?>
		<?php 
		$i=0;
			while ( $lastItineraries->have_posts()) : $lastItineraries->the_post();  
		 ?>
			<?php if ( has_post_thumbnail() ) :  $i++;  ?>
				<?php  if ( $i<2 ): ?>
					<h2 class="side-title-marker txt-on-bg">
						<span class="iont"><ion-icon name="map"></ion-icon></span>  <?php _e( 'Last Itineraries', 'geoformat' ); ?>
					</h2>
				<?php endif; ?>
				<aside class="side">		
					<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h3>
					<?php 
						$link = get_the_permalink();
					?>
						<div class="gp-leaflet-map-container">	
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
				</aside>
			<?php endif; ?>
			<?php endwhile;
			wp_reset_postdata();
	}

}




//Two last Geoformats
function gp_the_side_last_geoformat( $params = array() ) {
	global $post;
	
	// Get last markers list
	$the_query = new WP_Query( 
		array (
		'post_type'			=> 'geoformat',
		'order'				=> 'date',
		'orderby'			=> 'DESC',
		'posts_per_page'	=> 2
	)); ?>
	
	<?php 
	if($the_query->have_posts())
	{
	?>
	<h2 class="side-title-geo txt-on-bg">
		<span class="iont"><ion-icon name="cellular"></ion-icon></span>  <?php _e( 'Last Geoformats', 'geoformat' ); ?>
	</h2>
	<?php 
	while ( $the_query->have_posts()) : $the_query->the_post();  
	 ?>
		
		<aside class="side">		
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>

			<?php 
				$meta_map = html_entity_decode(get_post_meta( get_the_ID(), 'meta-map',true ));
				$meta_map = str_replace('export','home', $meta_map);	
					if(!empty($meta_map) ) {
						echo do_shortcode($meta_map);
					} elseif ( has_post_thumbnail() ) { 
						the_post_thumbnail();	
					} ?>
		</aside>
		<?php endwhile;
		wp_reset_postdata();
	}
}

//Two last posts
function gp_the_side_last_post( $params = array() ) {
	global $post;
	
	// Get last markers list
	$the_query = new WP_Query( 
		array (
		'post_type'			=> 'post',
		'order'				=> 'date',
		'orderby'			=> 'DESC',
		'posts_per_page'	=> 2,
		'post__not_in' => array($post->ID)
	)); 

	if($the_query->have_posts())
	{
	?>
		<h2 class="side-title-post txt-on-bg">
			<span class="iont"><ion-icon name="cellular"></ion-icon></span>  <?php _e( 'Last posts', 'geoformat' ); ?>
		</h2>
		
		<?php while ( $the_query->have_posts()) : $the_query->the_post();  
		?>
		<aside class="side">		
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php 
					if ( has_post_thumbnail() ) :
						the_post_thumbnail();	
					else : ?>
					<div class="text-post">
					<?php echo excerpt(15); ?>
					</div>
			<?php endif; ?>
		</aside>
		<?php endwhile;
		wp_reset_postdata();
	}
}
?>