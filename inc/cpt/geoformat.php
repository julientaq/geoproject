<?php
/*
Custom Post Type: Geoformat, d'après Simple Long Form
Äuthor: Laurence (at) OhMyBox.info
*/
//CPT Geoformat
function geoformat_create_post_type() {
  register_post_type( 'geoformat',
    array(
      'labels' => array(
        'name' => __( 'Geoformats', 'geoformat' ),
        'singular_name' => __( 'Geoformat', 'geoformat' ),
		'add_new' => __( 'Add New', 'geoformat' ),
        'add_new_item' => __( 'Add geoformat', 'geoformat' ),
        'edit_item' => __( 'Edit geoformat', 'geoformat' ),
        'new_item' => __( 'New geoformat', 'geoformat' ),
        'view_item' => __( 'View geoformat', 'geoformat' ),
        'search_items' => __( 'Search geoformat', 'geoformat' ),
        'not_found' => __( 'No geoformat found', 'geoformat' ),
        'not_found_in_trash' => __( 'No geoformat in trash', 'geoformat' ),
        'parent_item_colon' => __( 'Geoformat (parent) :', 'geoformat' )
      ),
			'public'              	=> true,
			'publicly_queryable'  	=> true,
			'exclude_from_search' 	=> false,
			'show_ui'             	=> true,
			'show_in_menu'        	=> true,
			'show_in_nav_menus'    	=> true,
			'capability_type'     	=> 'post',
			'hierarchical'        	=> false,
			'menu_position' 		=> 20,
			'has_archive'         	=> true,
			'query_var'           	=> true,
			'can_export'          	=> true,
			'menu_icon' 			=> 'dashicons-welcome-write-blog',
			'rewrite' 				=> array('slug' => 'geoformat', 'with_front' => true),
			'taxonomies' 			=> array( 'post_tag', 'category' ),
			'supports' 				=> array( 'title', 'thumbnail', 'revisions', 'tags', 'comments', 'excerpt' )
    )
  );
}
add_action( 'init', 'geoformat_create_post_type' );

//Preview (debug)
add_filter('_wp_post_revision_fields', 'add_geoformat_debug_preview');
function add_geoformat_debug_preview($fields){
   $fields["debug_preview"] = "debug_preview";
   return $fields;
}

add_action( 'edit_form_after_title', 'geoformat_input_debug_preview' );
function geoformat_input_debug_preview() {
   echo '<input type="hidden" name="debug_preview" value="debug_preview">';
}

/**Intros**/
add_filter( 'get_the_excerpt', 'geoformat_excerpt' );
function geoformat_excerpt($excerpt) {
global $post;
	$chapo = get_post_meta( get_the_ID(), '_wp_editor_chapo', true );
	$meta_subline = get_post_meta( get_the_ID(), 'meta-subline', true );
		if( !empty( $chapo )  ) { 
			$excerpt = wp_strip_all_tags($chapo);
			return $excerpt;
		}
			else if( !empty( $meta_subline ) && empty( $chapo )  ) { 
			$excerpt = wp_strip_all_tags($meta_subline);
			return $excerpt;
		}
			else {
				return $excerpt;
			}
}

//Note

function note_add_meta_box() {
	add_meta_box('note-note',__( 'Note', 'geoformat' ),'note_html','geoformat','normal','high' 	);
}
add_action( 'add_meta_boxes', 'note_add_meta_box' );
function note_html( $post) { ?>

	<p>
		<?php _e( 'No field is mandatory: not completed, it will not be displayed. Titles are automatically added to the intrapage menu. To display an image, map or video in full screen, do not fill in the title field. The formatting of titles is taken into account only when it is accompanied by a media (image, card or video).', 'geoformat' ); ?>
	</p>
<?php }

//Metaboxes

include('geoformat_metabox.php');

function geoformat_feed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
	$qv['post_type'] = array('post', 'geoformat');
	return $qv;
}
add_filter('request', 'geoformat_feed_request');

function geoformat_dashboard_view() {

?>

   <ul>

     <?php

          global $post;

		   $args = array( 'numberposts' => 5, 'post_type' => array( 'geoformat' ) );

          $myposts = get_posts( $args );

                foreach( $myposts as $post ) :  setup_postdata($post); ?>
                    <li><span style="padding-right:10px;width:150px;"><?php the_time('d M, G') ?> : <?php the_time('i'); ?></span>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endforeach; ?>
   </ul>
<?php
}
function add_geoformat_dashboard_view() {
       wp_add_dashboard_widget( 'geoformat_dashboard_view', __( 'Published geoformats', 'geoformat' ), 'geoformat_dashboard_view' );
}
add_action('wp_dashboard_setup', 'add_geoformat_dashboard_view' );

/*Widget*/
require_once('geoformat_widget.php');
require_once('geoformat_duplicate.php');

//Dequeue styles and scripts
function unhook_theme_style_geoformat() {
	global $wp_query;
	$post_type = get_query_var('post_type');
	if($post_type == 'geoformat' ) {
		wp_dequeue_style( 'style' );
		wp_deregister_style( 'style' );
		wp_register_style( 'style', false );
	}
}
add_action( 'wp_enqueue_scripts', 'unhook_theme_style_geoformat', 9999 );
flush_rewrite_rules();	

	function de_script_geoformat() {
		global $wp_query;
		$post_type = get_query_var('post_type');
		if($post_type == 'geoformat' && !is_admin() ) {
		   
		   wp_dequeue_script( 'gp_frontend_js' );
		   wp_deregister_script( 'gp_frontend_js' );
		}
	}
	
	add_action('wp_print_scripts', 'de_script_geoformat', 100 );

//Add custom rewrite rule for event post type.

function gp_geoformat_add_event_rewrite_rules() {

    add_rewrite_rule('geoformat/print/([^/]+)/?$', 'index.php?post_type=geoformat&name=$matches[1]&printgf=1', 'top');
}

add_action('init', 'gp_geoformat_add_event_rewrite_rules');


function gp_geoformat_register_event_query_vars( $vars ) {

    $vars[] = 'printgf';

    return $vars;
}

add_filter( 'query_vars', 'gp_geoformat_register_event_query_vars' );

function gp_geoformat_load_performers_or_summary_template( $template ) {
	

    $printgf = (int) get_query_var( 'printgf', 0 );

	if( $printgf === 1 && is_post_type('geoformat') ) {
        $template = locate_template( array( 'print-geoformat.php' ) );
    }
    return $template;
}

add_filter( 'template_include', 'gp_geoformat_load_performers_or_summary_template' );
?>