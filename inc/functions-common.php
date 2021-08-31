<?php
// GeoProjects Common functions

define( 'DISALLOW_FILE_EDIT', true );

function gp_setup() {
	load_theme_textdomain('geoformat', get_template_directory() . '/languages');
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "custom-header" );
	add_theme_support(
		'custom-background',
		array( 'default-color' => 'FFFFFF' )
	);
	
	load_theme_textdomain('geoformat');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	
	//Gutenberg support
		add_theme_support( "custom-header" );
		add_theme_support( "custom-background" );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => __( 'small', 'geoformat' ),
				'shortName' => __( 'S', 'geoformat' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => __( 'regular', 'geoformat' ),
				'shortName' => __( 'M', 'geoformat' ),
				'size' => 16,
				'slug' => 'regular'
			),
			array(
				'name' => __( 'large', 'geoformat' ),
				'shortName' => __( 'L', 'geoformat' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => __( 'larger', 'geoformat' ),
				'shortName' => __( 'XL', 'geoformat' ),
				'size' => 50,
				'slug' => 'larger'
			)
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'css/admin/style-editor.css' );
	
	// Create/update theme options
	gp_manage_theme_options();
	
}
add_action( 'after_setup_theme', 'gp_setup' );

// Thumbnails

	add_theme_support( 'post-thumbnails', array( 'post','projects', 'maps', 'geoformat', 'capes' ) );
	set_post_thumbnail_size (800, 533, array( 'center', 'center' ));

if ( ! isset ( $content_width) )
    $content_width = 1000;

add_filter( 'http_request_host_is_external', function() { return true; });

require_once(get_template_directory() . '/inc/mbox/format.php' );
require_once(get_template_directory() . '/inc/template-tags.php' );
require_once(get_template_directory() . '/inc/admin/extras.php' );
require_once(get_template_directory() . '/inc/functions-queries.php' );
require_once(get_template_directory() . '/inc/functions-common-utils.php' );
require_once(get_template_directory() . '/inc/functions-ajax.php' );
require_once(get_template_directory() . '/inc/cpt/projects.php' );
require_once(get_template_directory() . '/inc/cpt/maps.php' );
require_once(get_template_directory() . '/inc/cpt/capes.php' );
require_once(get_template_directory() . '/inc/cpt/markers.php' );
require_once(get_template_directory() . '/inc/cpt/geoformat.php' );
require_once(get_template_directory() . '/inc/admin/widget-posts-in-category.php' );



function add_category_to_waymark_map() {
    register_taxonomy_for_object_type( 'category', 'waymark_map' );
    unregister_taxonomy_for_object_type( 'waymark_collection', 'waymark_map' );
}
add_action( 'init', 'add_category_to_waymark_map' );




//Flush Rewrite Rules on theme switching
function gp_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'gp_flush_rewrite_rules' );

//Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'geoformat' ),
		'footer' => __( 'Custom menu for the footer', 'geoformat' ),
	) );
	
//Custom Login
function gp_loginCSS() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/admin/login.css"/>';
}
add_action('login_head', 'gp_loginCSS');

//Favicon in back-end
function add_favicon() {
  	$gp_options = get_option( 'gp_options' );
	$favicon = $gp_options['favicon'];
	if (!empty ($favicon)){
	echo '<link rel="shortcut icon" href="' . $favicon . '" />';
	} else{
	echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
	}
}
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
    return 'geoformat';
}
add_filter( 'login_headertext', 'login_logo_url_title' );

//Disconnect
add_action('wp_logout','gp_home');
	function gp_home(){
		wp_redirect( home_url() );
		exit();
	}

	function gp_login_logo_url() {
		return home_url();
	}
add_filter( 'login_headerurl', 'gp_login_logo_url' );

//Define the default theme options (settings)
function gp_manage_theme_options() {

	$default_options = array(
		'primary_color'					=> GP_DEFAULT_PRIMARY_COLOR,
		'secundary_color' 				=> GP_DEFAULT_SECUNDARY_COLOR,
		'icon_color'					=> GP_DEFAULT_ICON_COLOR,
		'burger_color'					=> GP_DEFAULT_BURGER_COLOR,
		'title_color'					=> GP_DEFAULT_TITLE_COLOR,
		'subtitle_color'				=> GP_DEFAULT_SUBTITLE_COLOR,
		'background_color'				=> GP_DEFAULT_BACKGROUND_COLOR,
		'text_color'					=> GP_DEFAULT_TEXT_COLOR,
		'background_menu' 				=> GP_DEFAULT_BACKGROUND_MENU,
		'link_menu'						=> GP_DEFAULT_LINK_MENU,
		'exergues'						=> GP_DEFAULT_EXERGUES,
		'projects_list'					=> GP_DEFAULT_PROJECTS_LIST,
		'footer_style' 					=> GP_DEFAULT_FOOTER_STYLE,
		'bottom_color' 					=> GP_DEFAULT_BOTTOM_COLOR,
		'footer_link_color' 			=> GP_DEFAULT_FOOTER_LINK_COLOR,
		'social_color' 					=> GP_DEFAULT_SOCIAL_COLOR,
		'font_size' 					=> GP_DEFAULT_FONT_SIZE,
		'font_title' 					=> GP_DEFAULT_FONT_TITLE,
		'font_text' 					=> GP_DEFAULT_FONT_TEXT,
		'front_nb_maps'					=> GP_DEFAULT_FRONT_NB_MAPS,
		'gp_tiles_provider'             => GP_DEFAULT_TILES_PROVIDER,
		'special_map_tiles_provider'    => GP_DEFAULT_TILES_PROVIDER,
		'center_lat' 					=> GP_DEFAULT_MAP_CENTER_LAT,
		'center_lng' 					=> GP_DEFAULT_MAP_CENTER_LNG,
		'zoom'							=> GP_DEFAULT_MAP_ZOOM,
		'export_maps'					=> GP_DEFAULT_EXPORT_MAPS,
		'url_twitter' 					=> GP_DEFAULT_URL_TWITTER,
		'url_facebook' 					=> GP_DEFAULT_URL_FACEBOOK,
		'url_youtube' 					=> GP_DEFAULT_URL_YOUTUBE,
		'url_medium' 					=> GP_DEFAULT_URL_MEDIUM,
		'url_instagram' 				=> GP_DEFAULT_URL_INSTAGRAM,
		'url_soundcloud' 				=> GP_DEFAULT_URL_SOUNDCLOUD,
		'twitter_id' 					=> GP_DEFAULT_TWITTER_ID,
		'email_share'   				=> GP_DEFAULT_EMAIL_SHARE,
		'twitter_share'   				=> GP_DEFAULT_TWITTER_SHARE,
		'facebook_share'   				=> GP_DEFAULT_FACEBOOK_SHARE,
		'linkedin_share'   				=> GP_DEFAULT_LINKEDIN_SHARE,
		'pinterest_share'   			=> GP_DEFAULT_PINTEREST_SHARE,
		'whatsapp_share'   				=> GP_DEFAULT_WHATSAPP_SHARE,
		'nextp'   						=> GP_DEFAULT_NEXTP,
		'font_text'   				    => GP_DEFAULT_FONT_TEXT,
		'font_title'   				    => GP_DEFAULT_FONT_TITLE,
		'favicon'   				    => GP_DEFAULT_FAVICON,
		'google_analytics'   			=> GP_DEFAULT_GOOGLE_ANALYTICS,
		'project_trash_keep_contents' 	=> GP_DEFAULT_PROJECT_TRASH_KEEP_CONTENTS,
		'map_trash_keep_markers'		=> GP_DEFAULT_MAP_TRASH_KEEP_MARKERS,
		'blog_title'   					=> GP_DEFAULT_BLOG_TITLE,
		'copyright'   					=> GP_DEFAULT_COPYRIGHT,
		'year'   						=> GP_DEFAULT_YEAR,
		'bigmap_on_hp'   				=> GP_DEFAULT_BIGMAP_ON_HP

	);

	// Get current options if any
	$current_options = get_option( 'gp_options' );
	$current_gp_theme_version = get_option( 'gp_theme_version' );

	// Options already exists
	if ( $current_options !== false ) {

		// Test if no version was set
		if ( $current_gp_theme_version === false ) {

			update_option( 'gp_theme_version', '0.1.0' );
			$current_gp_theme_version = '0.1.0';

		}

		// Need options update ?
		if ( version_compare( $current_gp_theme_version, GP_THEME_VERSION, '<' ) === true ) {

			// Update for 0.1.1
			if ( GP_THEME_VERSION == '0.1.1' ) {
				$current_options['title_color'] = GP_DEFAULT_TITLE_COLOR;
				$current_options['text_color'] = GP_DEFAULT_TEXT_COLOR;
				$current_options['background_color'] = GP_DEFAULT_BACKGROUND_COLOR;

				update_option( 'gp_options', $current_options );
				update_option( 'gp_theme_version', GP_THEME_VERSION );
			}
		}
	
	}
	// Create options
	else {

		add_option( 'gp_options', $default_options );
		add_option( 'gp_theme_version', GP_THEME_VERSION );
	}
}

//Widgets
function gp_widgets_init() {

	// Register widgetized area
	register_sidebar( array(
		'name' => __( 'Footer Widgets (8 blocks maximum)', 'geoformat' ),
		'id' => 'footer-widgets',
		'before_widget' => '<div class="col col-lg-3 col-md-6 col-12">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	// Register custom widgets
	register_widget( 'gp_widget_posts_in_category' );

}

add_action( 'widgets_init', 'gp_widgets_init' );
wp_cache_delete ( 'alloptions', 'gp_options' );

function update_adminbar($wp_adminbar) {
  $wp_adminbar->remove_node('wp-logo');
  $wp_adminbar->remove_node('customize');
}
add_action('admin_bar_menu', 'update_adminbar', 999);

function updateitem_adminbar($wp_adminbar) {

  $wp_adminbar->add_node([
    'id' => 'geophelp',
    'title' => 'FAQ-Aide',
    'href' => esc_url( admin_url( 'admin.php?page=faq_help' ) ),
	'meta' => false
  ]);

}
add_action('admin_bar_menu', 'updateitem_adminbar', 60);

//Author custom URL
add_filter( 'request', 'geoformat_auteur_request' );
function geoformat_auteur_request( $query_vars )
{
    if ( array_key_exists( 'author_name', $query_vars ) ) {
        global $wpdb;
        $author_id = $wpdb->get_var( $wpdb->prepare( "SELECT user_id FROM {$wpdb->usermeta} WHERE meta_key='nickname' AND meta_value = %s", $query_vars['author_name'] ) );
        if ( $author_id ) {
            $query_vars['author'] = $author_id;
            unset( $query_vars['author_name'] );    
        }
    }
    return $query_vars;
}

add_filter( 'author_link', 'geoformat_author_link', 10, 3 );
function geoformat_author_link( $link, $author_id, $author_nicename )
{
    $author_nickname = get_user_meta( $author_id, 'nickname', true );
    if ( $author_nickname ) {
        $link = str_replace( $author_nicename, $author_nickname, $link );
    }
    return $link;
}

add_action( 'user_profile_update_errors', 'geoformat_set_user_nicename_to_nickname', 10, 3 );
function geoformat_set_user_nicename_to_nickname( &$errors, $update, &$user )
{
    if ( ! empty( $user->nickname ) ) {
        $user->user_nicename = sanitize_title( $user->nickname, $user->display_name );
    }
}

//Slug author
    add_action('init', 'geoformat_author_base');
function geoformat_author_base() {
    global $wp_rewrite;
    $author_slug = 'auteur';
    $wp_rewrite->author_base = $author_slug;
}

// JS admin avatar
function geoformat_admin_js_avatar() {
	global $pagenow;

	$plugin_dir_uri = get_template_directory_uri();

    if($pagenow == 'users.php') :
		wp_enqueue_media();
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
			
		wp_register_script('geoformat-media-upload', get_template_directory_uri() . '/admin/box-image.js', array('jquery'));
		wp_localize_script( 'geoformat-media-upload', 'meta_image',
				array(
					'title' => __( 'Charger une image', 'geoformat' ),
					'button' => __( 'Utiliser cette image', 'geoformat' ),
				)
			);
		
	wp_enqueue_script('geoformat-media-upload');
	endif;
}
add_action('admin_enqueue_scripts','geoformat_admin_js_avatar', 999);

//Change tag label
function geoformat_change_tax_object_label() {
      global $wp_taxonomies;
      $labels = &$wp_taxonomies['post_tag']->labels;
      $labels->name = __('Keywords', 'geoformat');
      $labels->singular_name = __('Keywords', 'geoformat');
      $labels->search_items = __('Search keywords', 'geoformat');
      $labels->all_items = __('Keywords', 'geoformat');
      $labels->separate_items_with_commas = __('Separate keywords with a coma', 'geoformat');
      $labels->choose_from_most_used = __('Chose among the most used keywords', 'geoformat');
      $labels->popular_items = __('Popular keywords', 'geoformat');
      $labels->edit_item = __('Edit keyword', 'geoformat');
      $labels->view_item = __('View keyword', 'geoformat');
      $labels->update_item = __('Update keyword', 'geoformat');
      $labels->add_new_item = __('Add keyword', 'geoformat');
      $labels->new_item_name = __('New keyowrds\'name', 'geoformat');
	}
    add_action( 'init', 'geoformat_change_tax_object_label' );

add_action('init', 'geoformat_renameTags');
function geoformat_renameTags() {
    global $wp_taxonomies;
    $tag = $wp_taxonomies['post_tag'];
    $tag->label = 'Keywords';
    $tag->labels->singular_name = 'Keywords';
    $tag->labels->name = $tag->label;
    $tag->labels->menu_name = $tag->label;
}

// Obscure login screen error messages
function geoformat_login_obscure(){ return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';}
add_filter( 'login_errors', 'geoformat_login_obscure' );

//DELETE Really Simple Discovery
remove_action('wp_head', 'rsd_link');

//Desable embed
function gp_stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}
add_action('init', 'gp_stop_loading_wp_embed_and_jquery');

//ID
function get_post_id( $post_type, $post_slug )
{
     
    $query = new WP_Query(
        array(
                'post_type'         => $post_type,
                'name'              => $post_slug,
                'suppress_filters'  => true,
            )
    );  
 
    $query->the_post();
 
    //$icl_post_id = icl_object_id(get_the_ID(), $post_type, false );
    return get_the_ID(); // Returns the ID of the current custom post
}

//Shortcode
add_shortcode('map', 'ag_iframe');
function ag_iframe($atts, $content) {
	if (!$atts['width']) { $atts['width'] = 630; }
	if (!$atts['height']) { $atts['height'] = 1500; }
	return '<iframe border="0" class="shortcode_iframe" src="' . $atts['src'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '"></iframe>';
}

//Custom upload
function gp__upload_dir( $args ) {

    // Get the current post_id
    $id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );

    if( $id ) {    
       // Set the new path depends on current post_type
       $newdir = '/' . get_post_type( $id );

       $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
       $args['url']     = str_replace( $args['subdir'], '', $args['url'] );      
       $args['subdir']  = $newdir;
       $args['path']   .= $newdir; 
       $args['url']    .= $newdir; 
    }
    return $args;
}
add_filter( 'upload_dir', 'gp__upload_dir' );

//Excerpt size
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]>', $content);
  return $content;
}

//First Tag
function geoproject_first_post_tag_link()
{
    if ( $posttags = get_the_tags() ) 
    {
        $tag = current( $posttags );
        printf(
            '#<a href="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a>',
            get_tag_link( $tag->term_id ),
            esc_html( $tag->name )
         );
    }
}

//Add custom rewrite rule for single

function prefix_news_rewrite_rule() {
    add_rewrite_rule( 'print/([^/]+)', 'index.php?&name=$matches[1]&print=1', 'top');
}
 
add_action( 'init', 'prefix_news_rewrite_rule' );

function prefix_register_query_var( $vars ) {
    $vars[] = 'print';
    return $vars;
}
add_filter( 'query_vars', 'prefix_register_query_var' );

function prefix_url_rewrite_templates() {
    
	$print = (int) get_query_var( 'print', 0 );
	
	if ( is_singular('post') ) :	
		if ( get_query_var( 'print' ) ) {
			add_filter( 'template_include', function() {
				return get_template_directory() . '/print-single.php';
			});
		}
	endif;
}
add_action( 'template_redirect', 'prefix_url_rewrite_templates' );

//Add custom rewrite rule for page

function page_news_rewrite_rule() {
    add_rewrite_rule( 'printp/([^/]+)', 'index.php?&pagename=$matches[1]&printpage=1', 'top');
}
 
add_action( 'init', 'page_news_rewrite_rule' );

function page_register_query_var( $vars ) {
    $vars[] = 'printpage';
    return $vars;
}
add_filter( 'query_vars', 'page_register_query_var' );

function page_url_rewrite_templates() {
    
	$printpage = (int) get_query_var( 'printpage', 0 );
	
	if ( is_page() ) :
		if ( get_query_var( 'printpage' ) ) {
			add_filter( 'template_include', function() {
				return get_template_directory() . '/print-page.php';
			});
		}
	endif;
}
add_action( 'template_redirect', 'page_url_rewrite_templates' );

//Additional plugins
//require_once(get_template_directory() . '/libs/typo/french-typo.php' );
remove_filter('the_content','wptexturize');
require_once(get_template_directory() . '/inc/mbox/editor-style.php' );
require_once(get_template_directory() . '/inc/mbox/shortcodes.php' );
require_once(get_template_directory() . '/inc/mbox/alaune.php' );
require_once(get_template_directory() . '/inc/mbox/mapbox.php' );
require_once(get_template_directory() . '/inc/admin/print.php' );
?>