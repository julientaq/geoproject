<?php
//GeoProjects Frontend funtions

if ( ! isset ( $content_width) )
    $content_width = 1000;
	
function is_post_type($type){
	if ( !is_404() && !is_front_page() ) : 
		global $wp_query;
		if($type == get_post_type($wp_query->post->ID)) 
			return true;
		return false;
	endif;
}

//STYLES geoproject
function geoformat_styles() {
	global $template;
	
	wp_register_style('ionicons', 'https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css',  array(), ' ', 'all' );
	wp_enqueue_style('ionicons');
	
	$gp_options = get_option( 'gp_options' );
		if (!empty ($gp_options['soundcite'])  ) :
			$soundcite = $gp_options['soundcite'];
		endif;
	
	if ( basename( $template ) == 'home-map.php' ) {
	} elseif ( basename( $template ) == 'export-map.php'  ) {
	} elseif ( basename( $template ) == 'export-marker.php'  ) {
	} elseif ( basename( $template ) == 'print-map.php'  ) {
	} elseif ( basename( $template ) == 'print-marker.php'  ) {
	} elseif ( basename( $template ) == 'print-project.php'  ) {
	} elseif ( basename( $template ) == 'print-page.php'  ) {
	} elseif ( basename( $template ) == 'print-single.php'  ) {
	} elseif ( basename( $template ) == 'print-geoformat.php'  ) {		
	} else {
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.min.css',  array(), ' ', 'screen' );
		wp_enqueue_style( 'bootstrap');
		wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css',  array(), ' ', 'screen' );
		wp_enqueue_style( 'normalize');
		wp_register_style( 'scrollbar', get_template_directory_uri() . '/css/scrollbar.css',  array(), ' ', 'screen' );
		wp_enqueue_style( 'scrollbar');
		if (!empty($soundcite)  )  :
			wp_register_style('soundcite', 'https://cdn.knightlab.com/libs/soundcite/latest/css/player.css',  array(), ' ', 'all' );
			wp_enqueue_style('soundcite');
			wp_register_script('soundjs', 'https://cdn.knightlab.com/libs/soundcite/latest/js/soundcite.min.js','','',false);
			wp_enqueue_script( 'soundjs' );
		endif;
	}
	
	if (is_tag() || is_category() || is_archive() || is_page('archives') || is_archive('geoformat') || is_archive('maps') || is_archive('markers') ) :
		wp_register_style( 'effekt', get_template_directory_uri() . '/css/effekt.css' );
		wp_enqueue_style( 'effekt');
	endif;
	
	wp_enqueue_script ('jquery');
	
	
	if (is_post_type('maps') || is_post_type('markers') || is_page_template('tpl-big-map.php') || is_page_template('print-page')  ) :
		wp_register_style('gp_leaflet_css', get_template_directory_uri() . '/libs/leaflet/leaflet.css',  array(), ' ', 'all' );
		wp_enqueue_style('gp_leaflet_css');
		wp_register_style('gp_leaflet_markercluster', get_template_directory_uri() . '/libs/leaflet/markercluster.css',  array(), ' ', 'all' );
		wp_enqueue_style('gp_leaflet_markercluster');
		wp_register_style('gp_leaflet_markercluster_def', get_template_directory_uri() . '/libs/leaflet/markercluster.defaut.css',  array(), ' ', 'all' );
		wp_enqueue_style('gp_leaflet_markercluster_def');
		wp_enqueue_style( 'mediaelement' );
	    wp_enqueue_style( 'wp-mediaelement' );	
		wp_register_style('leaflet_fullscreen', get_template_directory_uri() . '/libs/leaflet/leaflet.fullscreen.css',  array(), ' ', 'all' );
		wp_enqueue_style('leaflet_fullscreen');
	endif;
	
	if( is_singular('geoformat')  ) : 
		wp_register_style( 'style_geoformat', get_template_directory_uri() . '/css/geoformat/geoformat.min.css');
		wp_enqueue_style( 'style_geoformat');
	else :
		wp_register_style( 'style-css', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'style-css');
	endif;
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'geoformat_styles',7 );


//Enqueue scripts and styles and remove unused
function gp_enqueue_scripts() {
	
	global $template;
		
	if (is_singular('geoformat') ) {
		wp_register_script('bootstrap_js', get_template_directory_uri() . '/libs/bootstrap/js/bootstrap.min.js','','4.0',true);
		wp_enqueue_script( 'bootstrap_js' );
		wp_register_script('classie', get_template_directory_uri() . '/js/geoformat/classie.js','','1.0',true);
		wp_enqueue_script( 'classie' );
		wp_register_script('loader', get_template_directory_uri() . '/js/geoformat/jquery.classyloader.min.js','','1.0',true);
		wp_enqueue_script( 'loader' );
		wp_register_script('geoformatjs', get_template_directory_uri() . '/js/geoformat/geoformat.js','','1.0',true);
		wp_enqueue_script( 'geoformatjs' );
    } else {
		wp_register_script('bootstrap_js', get_template_directory_uri() . '/libs/bootstrap/js/bootstrap.min.js','','4.0',true);
		wp_enqueue_script( 'bootstrap_js' );
		wp_register_script('modernizr-custom', get_template_directory_uri() . '/js/modernizr.custom.js','','2.6.2',true);
		wp_enqueue_script( 'modernizr-custom' );
		wp_register_script('classie', get_template_directory_uri() . '/js/classie.js','','1.0',true);
		wp_enqueue_script( 'classie' );
		wp_register_script('uisearch', get_template_directory_uri() . '/js/uisearch.js','','1.0',true);
		wp_enqueue_script( 'uisearch' );
		wp_register_script('gp_frontend_js', get_template_directory_uri() . '/js/frontend.js','','1.0',true);
		wp_enqueue_script( 'gp_frontend_js' );
		wp_register_script( 'scrollbar-js', get_template_directory_uri() . '/js/scrollbar.js', '1.0', true);
		wp_enqueue_script( 'scrollbar-js');	
	}
	
	if ( is_category() || is_archive() || is_author() || is_tag() || is_post_type('projects') || is_archive('geoformat') ) {
		wp_register_script('loop', get_template_directory_uri() . '/js/scroll.js','','2.0.2',true);
		wp_enqueue_script( 'loop' );
		wp_register_script('scroll', get_template_directory_uri() . '/js/scroll_action.js','','',true);
		wp_enqueue_script( 'scroll' );
	}
	
	else if ( is_search() ) {
		wp_enqueue_script('jquery-masonry');
		wp_register_script('loop', get_template_directory_uri() . '/js/scroll.js','','1.0',true);
		wp_enqueue_script( 'loop' );
		wp_register_script('scrollmas', get_template_directory_uri() . '/js/scroll_masonry.js','','1.0',true);
		wp_enqueue_script( 'scrollmas' );
	}
	
	if ( is_singular('maps') || is_single() || is_singular('geoformat') || is_singular('markers') || is_singular('projects')  ) :
		wp_register_script('ajaxify', get_template_directory_uri() . '/js/ajaxify.js','','1.0',true);
		wp_enqueue_script( 'ajaxify' );
	endif;
	
		
	if (is_post_type('maps') || is_post_type('markers') || is_page_template('tpl-big-map.php') || is_page_template('print-page')  ) : 
		wp_register_script('gp_leaflet_js', get_template_directory_uri() . '/libs/leaflet/leaflet.js','','1.0',false);
		wp_enqueue_script( 'gp_leaflet_js' );
		wp_register_script('gp_leaflet_wrapper_js', get_template_directory_uri() . '/js/leaflet-wrapper.js', '','1.0', true);
		wp_enqueue_script( 'gp_leaflet_wrapper_js' );
		include(get_template_directory() . '/inc/data_map_js.php' );
		wp_localize_script('gp_leaflet_wrapper_js', 'my_options', $scriptData);
		wp_register_script('gp_leaflet_marker', get_template_directory_uri() . '/libs/leaflet/markercluster.js','','1.0',false);
		wp_enqueue_script( 'gp_leaflet_marker' );		
		wp_register_script('gp_leaflet_fullscreen_js', get_template_directory_uri() . '/libs/leaflet/leaflet.fullscreen.min.js', '','1.0', false);
		wp_enqueue_script( 'gp_leaflet_fullscreen_js' );
	endif;
	
	if (is_post_type_archive('geoformat') || is_archive('geoformat') ) :
		wp_register_script('frontend_js', get_template_directory_uri() . '/js/frontend.js','','1.0',true);
		wp_enqueue_script( 'frontend_js' );
	endif;
	
	if(is_singular('markers') || is_singular ('maps') || is_single() || is_page() ) :
		wp_register_script('modal', get_template_directory_uri() . '/js/geoformat/modal.js','','1.0',true);
		wp_enqueue_script( 'modal' );
	endif;
	
	$get_meta = get_option( 'print_settings' );	
	$printjs = $get_meta['print_js'];
	
	if (!empty($printjs) && ( basename( $template ) == 'print-map.php'  ||  basename( $template ) == 'print-marker.php' ||  basename( $template ) == 'print-project.php' ||  basename( $template ) == 'print-geoformat.php' ||	  basename( $template ) == 'print-page.php' ||  basename( $template ) == 'print-single.php' ) ) :
		wp_register_script('printjs', get_template_directory_uri() . '/js/paged.polyfill.js','','1.0',false);
		wp_enqueue_script( 'printjs' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'gp_enqueue_scripts' );

/**
 * Add necessary Leaflet JS for displaying a map
 */
function gp_load_frontend_leaflet() {

}

//Suppress Emojo & infos WP 
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('wp_head', 'wp_dlmp_l10n_style' );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

function gp_remove_version() {
	return '<!--GEOPROJECT with GEOFORMAT-->';
}
add_filter('the_generator', 'gp_remove_version');
	
//Suppression IPTAGS
	function gp_remove_img_ptags($content){
		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	add_filter('the_content', 'gp_remove_img_ptags');

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function gp_theme_slug_render_title() {
	?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
	}
	add_action( 'wp_head', 'gp_theme_slug_render_title' );
}

add_theme_support( 'title-tag' );

//Si IE 9

function gp_IEhtml5_shim () {
	global $is_IE;
	if ($is_IE)
	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'gp_IEhtml5_shim');

//Customize title and url of login page
function gp_login_headerurl() {
	return home_url();
}

function gp_login_headertext() {
	return get_option( 'blogname' );
}

add_filter( 'login_headerurl', 'gp_login_headerurl' );
add_filter( 'login_headertext', 'gp_login_headertext' );


/**
 * Get a custom Excerpt regarding the given type
 * @param  string $type Type of the excerpt.
 */
function gp_get_custom_excerpt( $type = 'default', $with_more_link = true ) {
	global $post;
	$excerpt_more_link = ( $with_more_link ) ? ' <a href="' . get_permalink( $post ) . '" class="entry-more">' . __( 'more', 'geoformat' ) . '...</a>' : '...';

	switch( $type ) {
		case 'post-in-project-list':
			$excerpt_length = GP_DEFAULT_EXCERPT_POST_IN_PROJECT_LIST;
			break;
		case 'side-map':
			$excerpt_length = GP_DEFAULT_EXCERPT_SIDE_POST;
			break;
		default:
			$excerpt_length = GP_DEFAULT_EXCERPT_LENGTH;
			break;
	}

	// Has already a manual excerpt
	if ( has_excerpt() ) {
		$output_excerpt = $post->post_excerpt . $excerpt_more_link;
	}
	// Generate an excerpt
	else {
		$output_excerpt = get_the_content( '' );
		$output_excerpt = strip_shortcodes( $output_excerpt );
		$output_excerpt = apply_filters( 'the_content', $output_excerpt );
		$output_excerpt = str_replace( ']]>', ']]&gt;', $output_excerpt );
		$output_excerpt = wp_trim_words( $output_excerpt, $excerpt_length, $excerpt_more_link );
	}

	echo $output_excerpt;
}


//Add Geoformat to categories and search loops

	add_action( 'pre_get_posts', 'add_geoformat_tagcat');
	function add_geoformat_tagcat ( $query ) {
		if ( !is_admin() ) {
		
			if   ( is_category() || is_tag() || is_search() && $query->is_main_query() ) {
				$query->set( 'post_type', array( 'post', 'nav_menu_item', 'geoformat', 'markers', 'maps', 'projects') );
			return $query; }
			if( is_author() && $query->is_main_query() ) {
				$query->set( 'post_type', array(
				 'post', 'geoformat', 'markers', 'maps', 'projects'
					));
				  return $query;
					}
		}
	}
	add_action( 'pre_get_posts', 'add_geoformat_query');
	function add_geoformat_query ( $query ) {
		if ( !is_admin() && is_search() && $query->is_main_query() ) {
			$query->set( 'post_type', array( 'post', 'page', 'geoformat', 'markers', 'maps', 'projects') );
		return $query; }		
	}
	
	require_once(get_template_directory() . '/inc/metadata.php' );
	require_once(get_template_directory() . '/inc/walker.php' );




// add menu to the admin bar
function admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu( array(
        'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
        'id' => 'field-notes-menu', // link ID, defaults to a sanitized title value
        'title' => '<span class="ab-icon"></span><span class="ab-label">'.esc_html__( 'Field Notes', 'geoformat' ).'</span>', // link title
        'href' => admin_url( '/index.php/#dashboard_field_notes'), // name of file
        'meta' => array( 'class' => 'menupop d-block'),
    ));
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_render' );

?>