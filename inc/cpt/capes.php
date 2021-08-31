<?php

/**
 * CUSTOM POST TYPE : Capes
 */

 
/**
 * Class definition of the CPT "Capes"
 */
class gp_cpt_capes {

	var $type   = 'capes';


	/**
	 * Constructor
	 */
	function __construct() {
		$this->single = __( 'Cape', 'geoformat' );
		$this->plural = __( 'Capes', 'geoformat' );
	}


	/**
	* Define and register the post type
	*/  
	function add_post_type(){

		$labels = array(
			'name'                	=> __( 'Capes', 'geoformat' ),
			'singular_name'       	=> __( 'Cape', 'geoformat' ),
			'add_new'             	=> __( 'Add', 'geoformat' ),
			'add_new_item'        	=> __( 'Add cape', 'geoformat' ),
			'edit_item'           	=> __( 'Edit this cape', 'geoformat' ),
			'new_item'            	=> __( 'New cape', 'geoformat' ),
			'view_item'           	=> __( 'See the cape', 'geoformat' ),
			'search_items'        	=> __( 'Search capes', 'geoformat' ),
			'not_found'           	=> __( 'No capes found', 'geoformat' ),
			'not_found_in_trash'  	=> __( 'No capes found in trash', 'geoformat' ),
			'parent_item_colon'   	=> __( 'My capes', 'geoformat' )
		);

		$options = array(
			'labels'              	=> $labels,
			'public'              	=> true,
			'publicly_queryable'  	=> true,
			'exclude_from_search' 	=> false,
			'show_ui'             	=> true,
			'show_in_menu'        	=> true,
			'has_archive'			=> true,
			'capability_type'     	=> 'post',
			'menu_position'     	=> 21,
			'menu_icon'				=> 'dashicons-airplane',
			'hierarchical'        	=> false,
			'supports'          	=> array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
			'rewrite' 				=> array('slug' => 'capes', 'with_front' => true),
			'query_var'           	=> true,
			'taxonomies' 			=> array( 'post_tag'),
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
function gp_init_cpt_capes() {
	// Create class instance
	$cptCapes = new gp_cpt_capes;

	// Register CPT
	$cptCapes->add_post_type();

	// Register Messages
	add_filter( 'post_updated_messages', array( &$cptCapes, 'add_messages' ) );

}

add_action( 'init', 'gp_init_cpt_capes' );
flush_rewrite_rules();


flush_rewrite_rules();

/**
 * Add custom rewrite rule for event post type.
 *
 * Remember to flush rewrite rules to apply changes.
 */
function gp_capes_add_event_rewrite_rules() {

    /**
     * Custom rewrite rules for one post type.
     * 
     * We wil know on which url we are by $_GET parameters 'performers' and 'summary'. Which we will add to
     * public query vars to obtain them in convinient way.
     */
    add_rewrite_rule('capes/export/([^/]+)/?$', 'index.php?post_type=capes&name=$matches[1]&export=1', 'top');
    add_rewrite_rule('capes/home/([^/]+)/?$', 'index.php?post_type=capes&name=$matches[1]&home=1', 'top');
    add_rewrite_rule('capes/print/([^/]+)/?$', 'index.php?post_type=capes&name=$matches[1]&print=1', 'top');
}

add_action('init', 'gp_capes_add_event_rewrite_rules');

/**
 *  Add custom event query vars.
 */
function gp_capes_register_event_query_vars( $vars ) {

    $vars[] = 'export';
    $vars[] = 'home';
    $vars[] = 'print';

    return $vars;
}

add_filter( 'query_vars', 'gp_capes_register_event_query_vars' );

/**
 * Decide which template to load
 */
function gp_capes_load_performers_or_summary_template( $template ) {

    // Get public query vars
    $export = (int) get_query_var( 'export', 0 );
    $home = (int) get_query_var( 'home', 0 );
    $print = (int) get_query_var( 'print', 0 );
	

    // If performer = 1 then we are on event/performers link
    if( $export === 1 && is_post_type('capes') ) {
        $template = locate_template( array( 'export-cape.php' ) );
    }
	if( $home === 1 && is_post_type('capes') ) {
        $template = locate_template( array( 'home-cape.php' ) );
    }
	
	if( $print === 1 && is_post_type('capes') ) {
        $template = locate_template( array( 'print-cape.php' ) );
    }
	

    return $template;
}

add_filter( 'template_include', 'gp_capes_load_performers_or_summary_template' );
?>