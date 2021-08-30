<?php
/**
 * GeoProjects Admin funtions
 *
 * @package GeoProjects
 */

require_once(get_template_directory() . '/inc/functions-admin-utils.php' );

//Register Metaboxes
require_once(get_template_directory() . '/inc/mbox/projects-list.php' );
require_once(get_template_directory() . '/inc/mbox/project-infos.php' );
require_once(get_template_directory() . '/inc/mbox/custom-image.php' );
require_once(get_template_directory() . '/inc/mbox/map-preview.php' );
require_once(get_template_directory() . '/inc/mbox/map-infos.php' );
require_once(get_template_directory() . '/inc/mbox/marker-infos.php' );
require_once(get_template_directory() . '/inc/mbox/admin-avatar.php' );

//Add custom colums and filters in listings
require_once(get_template_directory() . '/inc/admin/custom-listing-columns.php' );
require_once(get_template_directory() . '/inc/admin/custom-listing-filters.php' );

//Add Theme Settings page
require_once(get_template_directory() . '/inc/admin/admin-menus.php' );

//Guidelines on dashboard
require_once(get_template_directory() . '/inc/admin/dashboard.php' );


/**
 * Admin Init
 * - Register settings fields
 */
function gp_admin_init() {
    // Register settings
    if ( current_user_can( 'delete_others_posts' ) ) {
        require_once(get_template_directory() . '/inc/admin/settings.php' );
		gp_register_settings();
    }   
}
add_action( 'admin_init', 'gp_admin_init' );

function gp_admin_enqueue_scripts( $hook ) {
    global $post_type, $pagenow;
    $gp_options = get_option( 'gp_options' );
	
	if (!empty ($gp_options['soundcite']) ) :
		$soundcite = $gp_options['soundcite'];
	endif; 

	// Admin CSS
	wp_enqueue_style( 'gp_admin_css', get_template_directory_uri() . '/css/admin/admin.css', array(), GP_THEME_VERSION, 'all' );
	
	wp_register_style('ionicons', 'https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css',  array(), ' ', 'all' );
	wp_enqueue_style('ionicons');
	
		if (!empty($soundcite)  )  :
			wp_register_style('soundcite', 'https://cdn.knightlab.com/libs/soundcite/latest/css/player.css',  array(), ' ', 'all' );
			wp_enqueue_style('soundcite');
			wp_register_script('soundjs', 'https://cdn.knightlab.com/libs/soundcite/latest/js/soundcite.min.js','','',false);
			wp_enqueue_script( 'soundjs' );
		endif;
		
    // For Map / Marker Forms and settings page
    if ( $post_type == 'geoformat' || $post_type == 'markers' || $post_type == 'maps' || ( $pagenow == 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] == 'gp_geoprojects_page' ) ) {
		
        // Leaflet CSS
        wp_enqueue_style( 'gp_leaflet_css', get_template_directory_uri() . '/libs/leaflet/leaflet.css', array(), GP_THEME_VERSION, 'all' );

        
		//Marker cluster
		
		wp_register_style('gp_leaflet_markercluster', get_template_directory_uri() . '/libs/leaflet/markercluster.css',  array(), ' ', 'all' );
		wp_enqueue_style('gp_leaflet_markercluster');
		
		// Leaflet JS
        wp_register_script( 'gp_leaflet_js', get_template_directory_uri() . '/libs/leaflet/leaflet.js', array( 'jquery' ), GP_THEME_VERSION, true );
		wp_enqueue_script( 'gp_leaflet_js' );
		
        //Marker JS
		wp_register_script('gp_leaflet_marker', get_template_directory_uri() . '/libs/leaflet/markercluster.js','','1.0',true);
		wp_enqueue_script( 'gp_leaflet_marker' );
		
		wp_register_style('gp_leaflet_markercluster_def', get_template_directory_uri() . '/libs/leaflet/markercluster.defaut.css',  array(), ' ', 'all' );
		wp_enqueue_style('gp_leaflet_markercluster_def');
		
		// Admin JS
		wp_enqueue_script( 'gp_admin_js', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ), GP_THEME_VERSION, true );
  
		// Custom Leaflet JS
        $overlay = get_post_meta( get_the_ID(), 'custom_image_displaying', true );
		$overlaymap = get_post_meta( get_the_ID(), 'gp-overlay-map', true );
		
		if ( $overlay != "replace" || $overlaymap != "replace" ) : 
		wp_register_script('gp_leaflet_wrapper_js', get_template_directory_uri() . '/js/leaflet-wrapper.js', '','1.0', true);
		wp_enqueue_script( 'gp_leaflet_wrapper_js' );
		
		else :
		
		wp_register_script('gp_leaflet_wrapper_js-image', get_template_directory_uri() . '/js/leaflet-wrapper-image.js', '','1.0', true);
		wp_enqueue_script( 'gp_leaflet_wrapper_js-image' );
		
		endif;
		
		include(get_template_directory() . '/inc/data_map_js.php' );
		
		wp_localize_script('gp_leaflet_wrapper_js', 'my_options', $scriptData);
		wp_localize_script('gp_admin_js', 'my_options', $scriptData);
    }

    // For Settings page
    if ( $pagenow == 'admin.php') {
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_register_script( 'geo', get_template_directory_uri() . '/js/geo.js', array( 'jquery' ) );
        wp_enqueue_script( 'geo');
    }

    // Medigeoformatlement CSS for Map / Marker Forms
    if ( $post_type == 'markers' || $post_type == 'maps' || $post_type == 'geoformat'  ) {

        // Medigeoformatlement CSS
        wp_enqueue_style( 'medigeoformatlement' );
        wp_enqueue_style( 'wp-medigeoformatlement' );

    }
	
	if ( $post_type == 'geoformat' ) {
		wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_register_script( 'geo', get_template_directory_uri() . '/js/geo.js', array( 'jquery' ) );
        wp_enqueue_script( 'geo');
	}

}

add_action( 'admin_enqueue_scripts', 'gp_admin_enqueue_scripts' );




//Add custom posts types counts to Dashboard widget
function gp_add_cpt_counts_to_dashboard_glance_items() {

  $post_types = get_post_types( array( '_builtin' => false ), 'objects' );

  foreach ( $post_types as $post_type ) {

    if($post_type->show_in_menu==false) {
      continue;
    }

    $num_posts = wp_count_posts( $post_type->name );
    $num = number_format_i18n( $num_posts->publish );
    $text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
    if ( current_user_can( 'edit_posts' ) ) {
        $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
    }
    echo '<li class="page-count-geo ' . $post_type->name . '-count">' . $output . '</td>';
  }
}
add_filter( 'dashboard_glance_items', 'gp_add_cpt_counts_to_dashboard_glance_items' );



//Hide Wordpress Update notice for all but admin
function gp_hide_update_notice_to_all_but_admin_users() 
{
    if ( !current_user_can( 'update_core' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}

add_action( 'admin_notices', 'gp_hide_update_notice_to_all_but_admin_users', 1 );



//Modify the admin footer text
function gp_admin_footer_text () {
    bloginfo( 'description' );
}

add_filter( 'admin_footer_text', 'gp_admin_footer_text' );

//CPT ARchives menu
add_action('admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive');

function wpclean_add_metabox_menu_posttype_archive() {
add_meta_box('wpclean-metabox-nav-menu-posttype', 'Archives', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default');
}

function wpclean_metabox_menu_posttype_archive() {
$post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');

if ($post_types) :
    $items = array();
    $loop_index = 999999;

    foreach ($post_types as $post_type) {
        $item = new stdClass();
        $loop_index++;

        $item->object_id = $loop_index;
        $item->db_id = 0;
        $item->object = 'post_type_' . $post_type->query_var;
        $item->menu_item_parent = 0;
        $item->type = 'custom';
        $item->title = $post_type->labels->name;
        $item->url = get_post_type_archive_link($post_type->query_var);
        $item->target = '';
        $item->attr_title = '';
        $item->classes = array();
        $item->xfn = '';

        $items[] = $item;
    }

    $walker = new Walker_Nav_Menu_Checklist(array());

    echo '<div id="posttype-archive" class="posttypediv">';
    echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
    echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
    echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
    echo '</ul>';
    echo '</div>';
    echo '</div>';

    echo '<p class="button-controls">';
    echo '<span class="add-to-menu">';
    echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'geoformat') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
    echo '<span class="spinner"></span>';
    echo '</span>';
    echo '</p>';

endif;
}

//CALLING THE META IMAGE BOX FOR GEOFORMAT & AVATAR

add_action( 'admin_enqueue_scripts', 'geoformat_image_enqueue' );
function geoformat_image_enqueue() {
	global $typenow;
	global $pagenow;
    if( $typenow == 'geoformat' || $pagenow == 'profile.php' ) {
        wp_enqueue_media();
        wp_register_script( 'meta-box-image',  get_template_directory_uri() . '/js/geoformat/geoformat-img-box.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose your image', 'geoformat' ),
                'button' => __( 'Use this image', 'geoformat' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}

//CALLING THE META IMAGE BOX FOR MARKER LOADING

add_action( 'admin_enqueue_scripts', 'marker_image_enqueue' );
function marker_image_enqueue() {
	global $typenow;
	global $pagenow;
    if( $typenow == 'markers' ) {
        wp_enqueue_media();
        wp_register_script( 'meta-box-marker',  get_template_directory_uri() . '/js/marker-img-box.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-marker', 'meta_image',
            array(
                'title' => __( 'Add new image', 'geoformat' ),
                'button' => __( 'Back to marker options', 'geoformat' ),
            )
        );
        wp_enqueue_script( 'meta-box-marker' );
    }
}

//CALLING THE META IMAGE BOX FOR CUSTOM IMAGE LOADING

add_action( 'admin_enqueue_scripts', 'maps_image_enqueue' );
function maps_image_enqueue() {
	global $typenow;
	global $pagenow;
    if( $typenow == 'maps' ) {
        wp_enqueue_media();
        wp_register_script( 'meta-box-custom_img',  get_template_directory_uri() . '/js/custom-img-box.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-custom_img', 'meta_image',
            array(
                'title' => __( 'Add new image', 'geoformat' ),
                'button' => __( 'Back to the edition of the maps', 'geoformat' ),
            )
        );
        wp_enqueue_script( 'meta-box-custom_img' );
    }
}

//Rename "Tags"
function change_tax_object_label() {
      global $wp_taxonomies;
      $labels = &$wp_taxonomies['post_tag']->labels;
      $labels->name = __('Mots-clés', 'geoformat');
      $labels->singular_name = __('Mots-clés', 'geoformat');
      $labels->search_items = __('Recherche de mots-clés', 'geoformat');
      $labels->all_items = __('Mots-clés', 'geoformat');
      $labels->separate_items_with_commas = __('Séparer les mots-clés par une virgule', 'geoformat');
      $labels->choose_from_most_used = __('Choisir parmi les mots-clés les plus utilisés', 'geoformat');
      $labels->popular_items = __('Mots-clés populaires', 'geoformat');
      $labels->edit_item = __('Editer le mot-clé', 'geoformat');
      $labels->view_item = __('Voir le mot-clé', 'geoformat');
      $labels->update_item = __('Mettre à jour le mot-clé', 'geoformat');
      $labels->add_new_item = __('Ajouter un mot-clé', 'geoformat');
      $labels->new_item_name = __('Nom des nouveaux mots-clés', 'geoformat');
	  
	}
    add_action( 'init', 'change_tax_object_label' );

add_action('init', 'renameTags');
function renameTags() {
    global $wp_taxonomies;
    $tag = $wp_taxonomies['post_tag'];
    $tag->label = 'Mots-clés';
    $tag->labels->singular_name = 'Mots-clés';
    $tag->labels->name = $tag->label;
    $tag->labels->menu_name = $tag->label;
}

//Filters for displaying authors
add_action( 'restrict_manage_posts', 'geoformat_authors_manage_posts' );
function geoformat_authors_manage_posts() {
	global $wp_roles;
	$roles = $wp_roles->roles;
	if ( ! empty( $roles ) ) {
		echo '<select name="author"><option value="">Tous les auteurs</option>';
		foreach ( $roles as $role => $data ) {
			$users = get_users('orderby=display_name&role=' . $role);
			if ( ! empty( $users ) ) {
				echo '<optgroup label="' . esc_attr( ucfirst( $role ) ) . 's">';
				foreach ( $users as $user ) {
					echo '<option value="' . $user->ID . '"' . ( isset( $_GET['author'] ) && $user->ID == $_GET['author'] ? ' selected' : '' ) . '>' . $user->data->display_name . '</option>';
				}
				echo '</optgroup>';
			}
		}
		echo '</select>';
	}
}

//Create Upload Folder for custom markers

$uploads_dir = trailingslashit( wp_upload_dir()['basedir'] ) . 'markers';
wp_mkdir_p( $uploads_dir );

//Change Dashboard Title
add_action( 'admin_title' , 'change_dashboard_title' );

function change_dashboard_title( $admin_title ) {
	
	global $current_screen;
	global $title;
	
	if( $current_screen->id != 'dashboard' ) {
		
		return $admin_title;

	}
	
	$change_title = 'Tableau de bord';
	$change2_title = 'Bienvenue sur Geoproject-Geoformat';

	$admin_title = str_replace( __( 'Dashboard' ) , $change_title , $admin_title );
	$title = $change2_title;

	return $admin_title;
	
}

//Display on homepage
function alaune_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function alaune_add_meta_box() {
	$types = array('post', 'geoformat', 'maps', 'markers');
	
	foreach( $types as $type )
    {
		add_meta_box(
			'alaune-alaune',
			__( 'Display on homepage?', 'geoformat' ),
			'alaune_html',
			$type,
			'side',
			'default'
		);
	}
}
add_action( 'add_meta_boxes', 'alaune_add_meta_box' );

function alaune_html( $post) {
	wp_nonce_field( '_alaune_nonce', 'alaune_nonce' ); 
	
	$checkboxMeta = get_post_meta( $post->ID ); ?>

	<p>

		<input type="checkbox" name="alaune_une" id="alaune_une" value="yes" <?php if ( isset ( $checkboxMeta['alaune_une'] ) ) checked( $checkboxMeta['alaune_une'][0], 'yes' ); ?> />
		<label><?php _e( 'Yes', 'geoformat' ); ?></label>
	</p>
		<?php
}

function alaune_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['alaune_nonce'] ) || ! wp_verify_nonce( $_POST['alaune_nonce'], '_alaune_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	 if( isset( $_POST[ 'alaune_une' ] ) ) {
        update_post_meta( $post_id, 'alaune_une', 'yes' );
    } else {
        update_post_meta( $post_id, 'alaune_une', 'no' );
    }
}
add_action( 'save_post', 'alaune_save' );


//Redirect after setting
global $pagenow;
if ( isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	wp_redirect( admin_url( 'admin.php?page=gp_geoprojects_page' ) );
    exit;
}

//Admin notice
function geoformat_plugin_notice() {
	
	global $current_user;
	$user_id = $current_user->ID;
	
	global $pagenow;
    if ( $pagenow == 'admin.php' && ( 'gp_geoprojects_page' === $_GET['page'] )  ) {
		if (!get_user_meta($user_id, 'geoformat_plugin_notice_ignore')) {
			
			echo '<div id="geonotice" class="notice notice-info is-dismissible"><p>'. __('Welcome on Geoproject-Geoformat! Add your settings and save the page','geoformat') .' <a href="?page=gp_geoprojects_page">' .'</a></p></div>';
			
		}
	}
}
add_action('admin_notices', 'geoformat_plugin_notice');

function geoformat_plugin_notice_ignore() {
	
	global $current_user;
	$user_id = $current_user->ID;
	
	if (isset($_GET['page=gp_geoprojects_page'])) {
		
		add_user_meta($user_id, 'geoformat_plugin_notice_ignore', 'true', true);
		
	}	
}
add_action('admin_init', 'geoformat_plugin_notice_ignore');

//ID Column to all post types
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);

function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}
function posts_custom_id_columns($column_name, $id){
	if($column_name === 'wps_post_id'){
        	echo $id;
    }
}

//Delete default image size
update_option('small_large_size_w', '0');
update_option('small_large_size_h', '0');
update_option('medium_large_size_w', '0');
update_option('medium_large_size_h', '0');
update_option('large_large_size_w', '0');
update_option('large_large_size_h', '0');

?>