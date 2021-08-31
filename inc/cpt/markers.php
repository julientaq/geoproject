<?php

/**
 * CUSTOM POST TYPE : Markers
 */

 
/**
 * Class definition of the CPT "Markers"
 */
class gp_cpt_markers {

	var $type   = 'markers';


	/**
	 * Constructor
	 */
	function __construct() {
		$this->single = __( 'Marker', 'geoformat' );
		$this->plural = __( 'Markers', 'geoformat' );
	}


	/**
	* Define and register the post type
	*/  
	function add_post_type(){

		$labels = array(
			'name'                	=> __( 'Markers', 'geoformat' ),
			'singular_name'       	=> __( 'Marker', 'geoformat' ),
			'add_new'             	=> __( 'Add', 'geoformat' ),
			'add_new_item'        	=> __( 'Add a new marker', 'geoformat' ),
			'edit_item'           	=> __( 'Edit this marker', 'geoformat' ),
			'new_item'            	=> __( 'New marker', 'geoformat' ),
			'view_item'           	=> __( 'See the marker', 'geoformat' ),
			'search_items'        	=> __( 'Search markers', 'geoformat' ),
			'not_found'           	=> __( 'No markers found', 'geoformat' ),
			'not_found_in_trash'  	=> __( 'No markers found in trash', 'geoformat' ),
			'parent_item_colon'   	=> __( 'My markers', 'geoformat' )
		);

		$options = array(
			'labels'              	=> $labels,
			'public'              	=> true,
			'publicly_queryable'  	=> true,
			'exclude_from_search' 	=> false,
			'show_ui'             	=> true,
			'show_in_menu'        	=> true,
			'has_archive'			=> true,
			'menu_position'       	=> 22,
			'menu_icon'				=> 'dashicons-location',
			'capability_type'     	=> 'post',
			'hierarchical'        	=> false,
			'supports'            	=> array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
			'rewrite' 				=> true,
			'query_var'           	=> true,
			'taxonomies' 			=> array( 'post_tag', 'category' ),
			'can_export'          	=> true
		);

		// Register the Post Type
		register_post_type( $this->type, $options );

	}


	/**
	* CPT Infos Messages
	*/  
	function add_messages ( $messages ) {

		global $post;
		$post_ID = $post->ID;      

		$messages[$this->type] = array(
			0 => '', 
			1 => sprintf( __( '%1$s updated. <a href="%2$s">See the %1$s</a>', 'geoformat' ), $this->single, esc_url( get_permalink( $post_ID ) ) ),
			2 => __( 'Custom field updated.', 'geoformat' ),
			3 => __( 'Custom field deleted.', 'geoformat' ),
			4 => sprintf( __( '%s updated.', 'geoformat' ), $this->single ),
			5 => isset($_GET['revision']) ? sprintf( __( '%1$s restored at revision %2$s', 'geoformat' ), $this->single, wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __( '%1$s published. <a href="%2$s">See the %1$s</a>', 'geoformat' ), $this->single, esc_url( get_permalink( $post_ID ) ) ),
			7 => sprintf( __( '%s saved', 'geoformat' ), $this->single ),
			8 => sprintf( __('%1$s saved. <a target="_blank" href="%2$s">Preview the %1$s</a>', 'geoformat'), $this->single, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
			9 => sprintf( __('%1$s planned for the : <strong>%2$s</strong>. <a target="_blank" href="%3$s">Preview the %1$s</a>', 'geoformat'), $this->single, date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
			10 => sprintf( __('Draft of %1$s updates. <a target="_blank" href="%2$s">Preview the %1$s</a>', 'geoformat'), $this->single, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		);

		return $messages;
	}
}


/**
 * Init action for registering this CPT
 */
function gp_init_cpt_markers() {
	// Create class instance
	$cptMarkers = new gp_cpt_markers;

	// Register CPT
	$cptMarkers->add_post_type();

	// Register Messages
	add_filter( 'post_updated_messages', array( &$cptMarkers, 'add_messages' ) );
}

add_action( 'init', 'gp_init_cpt_markers' );
flush_rewrite_rules();

/**
 * Add custom rewrite rule for event post type.
 *
 * Remember to flush rewrite rules to apply changes.
 */
function gp_markers_add_event_rewrite_rules() {

    /**
     * Custom rewrite rules for one post type.
     * 
     * We wil know on which url we are by $_GET parameters 'performers' and 'summary'. Which we will add to
     * public query vars to obtain them in convinient way.
     */
    add_rewrite_rule('markers/export/([^/]+)/?$', 'index.php?post_type=markers&name=$matches[1]&export=1', 'top');
    add_rewrite_rule('markers/print/([^/]+)/?$', 'index.php?post_type=markers&name=$matches[1]&print=1', 'top');
}

add_action('init', 'gp_markers_add_event_rewrite_rules');

/**
 * Add custom event query vars.
 */
function gp_markers_register_event_query_vars( $vars ) {

    $vars[] = 'export';
    $vars[] = 'print';

    return $vars;
}

add_filter( 'query_vars', 'gp_markers_register_event_query_vars' );

/**
 * Decide which template to load
 */
function gp_markers_load_performers_or_summary_template( $template ) {
	
    // Get public query vars
    $export = (int) get_query_var( 'export', 0 );
    $print = (int) get_query_var( 'print', 0 );

    // If performer = 1 then we are on event/performers link
    if( $export === 1 && is_post_type('markers') ) {
        $template = locate_template( array( 'export-marker.php' ) );
    }
	if( $print === 1 && is_post_type('markers') ) {
        $template = locate_template( array( 'print-marker.php' ) );
    }
    return $template;
}

add_filter( 'template_include', 'gp_markers_load_performers_or_summary_template' );
?>