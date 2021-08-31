<?php

/**
 * CUSTOM POST TYPE : Maps
 */

 
/**
 * Class definition of the CPT "Maps"
 */
class gp_cpt_maps {

	var $type   = 'maps';


	/**
	 * Constructor
	 */
	function __construct() {
		$this->single = __( 'Map', 'geoformat' );
		$this->plural = __( 'Maps', 'geoformat' );
	}


	/**
	* Define and register the post type
	*/  
	function add_post_type(){

		$labels = array(
			'name'                	=> __( 'Maps', 'geoformat' ),
			'singular_name'       	=> __( 'Map', 'geoformat' ),
			'add_new'             	=> __( 'Add', 'geoformat' ),
			'add_new_item'        	=> __( 'Add map', 'geoformat' ),
			'edit_item'           	=> __( 'Edit this map', 'geoformat' ),
			'new_item'            	=> __( 'New map', 'geoformat' ),
			'view_item'           	=> __( 'See the map', 'geoformat' ),
			'search_items'        	=> __( 'Search maps', 'geoformat' ),
			'not_found'           	=> __( 'No maps found', 'geoformat' ),
			'not_found_in_trash'  	=> __( 'No maps found in trash', 'geoformat' ),
			'parent_item_colon'   	=> __( 'My maps', 'geoformat' )
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
			'menu_icon'				=> 'dashicons-location-alt',
			'hierarchical'        	=> false,
			'supports'          	=> array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
			'rewrite' 				=> array('slug' => 'maps', 'with_front' => true),
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
function gp_init_cpt_maps() {
	// Create class instance
	$cptMaps = new gp_cpt_maps;

	// Register CPT
	$cptMaps->add_post_type();

	// Register Messages
	add_filter( 'post_updated_messages', array( &$cptMaps, 'add_messages' ) );

}

add_action( 'init', 'gp_init_cpt_maps' );
flush_rewrite_rules();

/**
 * Action when sending a Map to trash
 */
function gp_wp_trashed_map( $map_ID ) {
	global $post_type;

	if ( $post_type == 'maps' ) {
		$gp_options = get_option( 'gp_options' );

		$map_markers = gp_query_get_map_markers(
			$map_ID,
			array(
				'post_status' 		=> 'any'
			)
		);

		if ( count( $map_markers ) > 0 ) {
			foreach ( $map_markers as $mm ) {

				// Unlink marker from map
				update_post_meta( $mm->ID, 'gp_map', 0 );

				// Send marker to trash ?
				if ( $gp_options['map_trash_keep_markers'] == 0 ) {
					wp_trash_post( $mm->ID );
				}
			}
		}

	}

}

add_action( 'trashed_post', 'gp_wp_trashed_map', 11 );
flush_rewrite_rules();

/**
 * Add custom rewrite rule for event post type.
 *
 * Remember to flush rewrite rules to apply changes.
 */
function gp_maps_add_event_rewrite_rules() {

    /**
     * Custom rewrite rules for one post type.
     * 
     * We wil know on which url we are by $_GET parameters 'performers' and 'summary'. Which we will add to
     * public query vars to obtain them in convinient way.
     */
    add_rewrite_rule('maps/export/([^/]+)/?$', 'index.php?post_type=maps&name=$matches[1]&export=1', 'top');
    add_rewrite_rule('maps/home/([^/]+)/?$', 'index.php?post_type=maps&name=$matches[1]&home=1', 'top');
    add_rewrite_rule('maps/print/([^/]+)/?$', 'index.php?post_type=maps&name=$matches[1]&print=1', 'top');
}

add_action('init', 'gp_maps_add_event_rewrite_rules');

/**
 *  Add custom event query vars.
 */
function gp_maps_register_event_query_vars( $vars ) {

    $vars[] = 'export';
    $vars[] = 'home';
    $vars[] = 'print';

    return $vars;
}

add_filter( 'query_vars', 'gp_maps_register_event_query_vars' );

/**
 * Decide which template to load
 */
function gp_maps_load_performers_or_summary_template( $template ) {

    // Get public query vars
    $export = (int) get_query_var( 'export', 0 );
    $home = (int) get_query_var( 'home', 0 );
    $print = (int) get_query_var( 'print', 0 );
	

    // If performer = 1 then we are on event/performers link
    if( $export === 1 && is_post_type('maps') ) {
        $template = locate_template( array( 'export-map.php' ) );
    }
	if( $home === 1 && is_post_type('maps') ) {
        $template = locate_template( array( 'home-map.php' ) );
    }
	
	if( $print === 1 && is_post_type('maps') ) {
        $template = locate_template( array( 'print-map.php' ) );
    }
	

    return $template;
}

add_filter( 'template_include', 'gp_maps_load_performers_or_summary_template' );
?>