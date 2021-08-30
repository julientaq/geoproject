<?php function geoproject_dashboard_widget_function() {
?>
	<div id="lab" style="font-size:20px!important;">
		<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/geoproject.png" alt="Processus Géoformat" style="max-width:100%!important;height:auto;">
		<p>L'apparence de ce thème est personnalisable via l'onglet "Réglages GP" du menu de cette console d'administration.</p>
		<p>Plusieurs types de réglages sont proposés : design, cartes et réseaux sociaux. Les réglages relatifs au design 
		des Géoformats sont à effectuer lors de la création d'un Géoformat. Les options relatives aux différents éléments 
		de la page en long format se trouvent dans un panneau latéral, sur la droite en tête de colonne.</p>
		<p><strong>Des questions sur la manière de procéder pour vos récit cartographiques ?</strong> 
		<a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=faq_help">Rendez-vous sur la page "FAQ-Aide"</a>, 
		également accessible depuis l'onglet "Réglages GP" du menu de cette console d'administration.</p>
		
		<p>
		<strong>Ordonner la liste des projets dans le menu :</strong> les projets s'affichent en fonction de leur date de publication, du plus récent au plus ancien.
		</p>
		
		<p>
		<strong>URL pour l'ajout d'index dans le menu (lien personnalisé, menu "apparence / menu") :</strong>
		<br/>
		- cartes : <a href="<?php echo get_site_url(); ?>/maps/" target="_blank" rel="noopener"><?php echo get_site_url(); ?>/maps/</a>
		<br/>
		- projets : <a href="<?php echo get_site_url(); ?>/<?php _e('projects','geoformat'); ?>/" target="_blank" rel="noopener"><?php echo get_site_url(); ?>/<?php _e('projects','geoformat'); ?>/</a>
		<br/>
		- marqueurs : <a href="<?php echo get_site_url(); ?>/markers/" target="_blank" rel="noopener"><?php echo get_site_url(); ?>/markers/</a>	
		<br/>
		- géoformats : <a href="<?php echo get_site_url(); ?>/geoformat/" target="_blank" rel="noopener"><?php echo get_site_url(); ?>/geoformat/</a>
		<br/>
		- archives par années : <a href="<?php echo get_site_url(); ?>/2019/" target="_blank" rel="noopener"><?php echo get_site_url(); ?>/2019/</a> 
		<br/> (par exemple, pour 2019)	
		</p>
		
		<p>
		<strong>Réglages pour l'URL des catégories et des mots-clés (changement du slug du lien) :</strong> menu "réglages / permaliens"
		</p>
		
		<p>
		<strong>Ressources et documentation :</strong> <a href="https://www.geoproject.fr" target="_blank" rel="noopener">geoproject.fr</a>
		</p>
	</div>
<?php
}
function example_add_geoproject_dashboard_widgets() {
	wp_add_dashboard_widget('geoproject_dashboard_widget', __( 'About the theme Geoproject-Geoformat', 'geoformat' ), 'geoproject_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'example_add_geoproject_dashboard_widgets' );








// "Field Notes" Widget

function gp_add_dashboard_widgets() {
    wp_add_dashboard_widget( 
        'dashboard_field_notes', 
        esc_html__( 'Field Notes', 'geoformat' ), 
        'dashboard_field_notes'
    );
     
    // Globalize the metaboxes array, this holds all the widgets for wp-admin.
    global $wp_meta_boxes;
     
    // Get the regular dashboard widgets array 
    // (which already has our new widget but appended at the end).
    $default_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
     
    // Backup and delete our new dashboard widget from the end of the array.
    $dashboard_field_notes = array( 'dashboard_field_notes' => $default_dashboard['dashboard_field_notes'] );
    unset( $default_dashboard['dashboard_field_notes'] );
  
    // Merge the two arrays together so our widget is at the beginning.
    $sorted_dashboard = array_merge( $dashboard_field_notes, $default_dashboard );
  
    // Save the sorted array back into the original metaboxes. 
    $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'gp_add_dashboard_widgets' );



function dashboard_field_notes() {
?>

 <div id="mapid" style="height:220px;"></div>
<?php
    global $post_ID ;
    if ( ! current_user_can( 'edit_posts' ) ) {
        return;
    }
    /* Check if a new auto-draft (= no new post_ID) is needed or if the old can be used */
    $last_post_id = (int) get_user_option( 'dashboard_quick_press_last_post_id' ); // Get the last post_ID.
    if ( $last_post_id ) {
        $post = get_post( $last_post_id );
        if ( empty( $post ) || 'auto-draft' !== $post->post_status ) { // auto-draft doesn't exist anymore.
            $post = get_default_post_to_edit( 'post', true );
            update_user_option( get_current_user_id(), 'dashboard_quick_press_last_post_id', (int) $post->ID ); // Save post_ID.
        } else {
            $post->post_title = ''; // Remove the auto draft title.
        }
    } else {
        $post    = get_default_post_to_edit( 'post', true );
        $user_id = get_current_user_id();
        // Don't create an option if this is a super admin who does not belong to this site.
        if ( in_array( get_current_blog_id(), array_keys( get_blogs_of_user( $user_id ) ), true ) ) {
            update_user_option( $user_id, 'dashboard_quick_press_last_post_id', (int) $post->ID ); // Save post_ID.
        }
    }
 
    $post_ID = (int) $post->ID;
?>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script>



var map = L.map('mapid');
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
			maxZoom: 18
}).addTo(map);

	
var marker;

this.map.locate({
  setView: true,
  maxZoom: 120
}).on("locationfound", e => {
    if (!marker) {
        marker = new L.marker(e.latlng).addTo(this.map);


    } else {
        marker.setLatLng(e.latlng);
    }
       lat = e.latlng.lat;
       lng = e.latlng.lng;

	document.getElementById("lat").value = lat;
	document.getElementById("lng").value = lng;


}).on("locationerror", error => {
    if (marker) {
        map.removeLayer(marker);
        marker = undefined;
    }



});



 </script>

<?php



    // Get maps list
    $all_maps = gp_query_get_maps();


    // Display Mbox content
    ?>
 <form name="post_entry" enctype="multipart/form-data" action="<?php echo esc_url( admin_url( '/' ) ); ?>" method="post" id="quick-note" class="initial-form hide-if-no-js">
		<?php if ( count( $all_maps ) > 0 ) : ?>
                        
             <p id="map_select">
    			<select name="map" id="map">
    				<option>Sélectionnez une carte</option>
    				<?php foreach ( $all_maps as $map ) : ?>
    					<option value="<?php echo $map->ID; ?>"><?php echo $map->post_title; ?></option>
    				<?php endforeach; ?>
    			</select>
    		</p>
    	<?php endif;
?>

        <div class="input-text-wrap" id="title-wrap">
            <label for="title"> <?php _e( 'Marker\'s name','geoformat' ); ?></label>
            <input type="text" name="post_title" id="title" autocomplete="off" />
        </div>
 
        <div class="textarea-wrap" id="description-wrap">
            <label for="content"><?php _e( 'Content' ); ?></label>
            <textarea name="post_desc" id="post_desc" class="mceEditor" placeholder="<?php _e( 'Quick Description','geoformat' ); ?>" rows="3" cols="15" autocomplete="off"></textarea>
        </div>

        <div class="d-flex mt-1 mb-2">
		    <label class="mr-1"><?php _e( 'Image' ); ?></label>
		    <input type="file" name="image">
		</div>
 
        <p class="submit">
		    <input type="hidden" name="post_action" id="post_action" value="post_action" />
            <input type="hidden" name="post_ID" value="<?php echo $post_ID; ?>" />
            <input type="hidden" name="lng" id="lng" value="" />
            <input type="hidden" name="lat" id="lat" value="" />
            <input type="hidden" name="post_ID" value="<?php echo $post_ID; ?>" />
            <input type="submit" name="post_submit"  id="quicknote-action" class="button button-primary" value="Enregistrer cette position" />
            <?php wp_nonce_field( 'add-post' ); ?>

            <br class="clear" />
        </p>
 
    </form>
    <?php

     

    if(isset($_POST['post_submit']) && $_POST['post_submit']=='Enregistrer cette position')
	{	
	 	$id = wp_insert_post(array(
	 		'post_title'=>$_POST['post_title'], 
	 		'post_type'=>'markers', 
	 		'post_content'=>$_POST['post_desc'],
	 		'post_status' => 'draft',
	 		'meta_input' => array(
			    'gp_map' => $_POST['map'],
			    'gp_lat' => $_POST['lat'],
			    'gp_lng' => $_POST['lng'],
			),
	 	));

			$upload = wp_upload_bits($_FILES["image"]["name"], null, file_get_contents($_FILES["image"]["tmp_name"]));
 
            $filename = $upload['file'];
            $wp_filetype = wp_check_filetype($filename, null);

			$wp_upload_dir = wp_upload_dir();

            $attachment = array(
			    'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                'post_mime_type' => $wp_filetype['type'],
                'post_title' => sanitize_file_name($_FILES["image"]["name"]),
                'post_content' => '',
                'post_status' => 'inherit'
            );
 
            $attachment_id = wp_insert_attachment( $attachment, $filename, $id );
 
            if ( ! is_wp_error( $attachment_id ) ) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
 
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
                wp_update_attachment_metadata( $attachment_id, $attachment_data );
                set_post_thumbnail( $id, $attachment_id );
            }
	 }
   dashboard_recent_drafts_markers();
}



function dashboard_recent_drafts_markers( $drafts = false ) {
	if ( ! $drafts ) {
		$query_args = array(
			'post_type'      => 'markers',
			'post_status'    => 'draft',
			'author'         => get_current_user_id(),
			'posts_per_page' => 4,
			'orderby'        => 'modified',
			'order'          => 'DESC',
		);

		/**
		 * Filters the post query arguments for the 'Recent Drafts' dashboard widget.
		 *
		 * @since 4.4.0
		 *
		 * @param array $query_args The query arguments for the 'Recent Drafts' dashboard widget.
		 */
		$query_args = apply_filters( 'dashboard_recent_drafts_query_args', $query_args );

		$drafts = get_posts( $query_args );
		if ( ! $drafts ) {
			return;
		}
	}

	echo '<div class="drafts">';
	if ( count( $drafts ) > 3 ) {
		printf(
			'<p class="view-all"><a href="%s">%s</a></p>' . "\n",
			esc_url( admin_url( 'edit.php?post_status=draft&post_type=markers' ) ),
			__( 'View all drafts' )
		);
	}
	echo '<h2 class="hide-if-no-js">' . __( 'Your Recent Field Notes', 'geoformat') . "</h2>\n<ul>";

	/* translators: Maximum number of words used in a preview of a draft on the dashboard. */
	$draft_length = (int) _x( '10', 'draft_length' );

	$drafts = array_slice( $drafts, 0, 3 );
	foreach ( $drafts as $draft ) {
		$url   = get_edit_post_link( $draft->ID );
		$title = _draft_or_post_title( $draft->ID )."&nbsp;&nbsp;";
		echo "<li>\n";
		printf(
			'<div class="draft-title"><a href="%s" aria-label="%s">%s</a><time datetime="%s">%s</time></div>',
			esc_url( $url ),
			/* translators: %s: Post title. */
			esc_attr( sprintf( __( 'Edit &#8220;%s&#8221;' ), $title ) ),
			esc_html( $title ),
			get_the_time( 'c', $draft ),
			get_the_time( __( 'F j, Y' ), $draft )
		);
		
		echo "</li>\n";
	}
	echo "</ul>\n</div>";
}



?>