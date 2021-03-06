<?php
/**
 * Widget "Field Notes"
 * 
 * Display a widget on the dashboard to create markers on the field
 *
 * @package GeoProjects
 */


class gp_widget_field_notes extends WP_Widget {

	function __construct() {
			parent::__construct(
				'gp_wdg_field_notes', // Base ID
				__( 'Field Notes', 'geoformat' ), // Widget name that appears in UI
				array(
					'description' => __( 'Creates markers on the field', 'geoformat' )
				) // Widget description 
			);
	}


	public function widget( $args, $instance ) {
		?>

		 <div id="mapid" style="height:220px;"></div>
		<?php

		    global $post_ID;
		 
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
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
		    maxZoom: 16,
		    id: 'mapbox/streets-v11',
		    tileSize: 512,
		    zoomOffset: -1,
		    accessToken: 'pk.eyJ1Ijoidmxlc3RlciIsImEiOiJja215cGRjNG0wMnk4MnBxdXZmN2VrZW41In0.1jgxrziFbq_cbBXaRiWNFQ'
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
		<form name="post_entry" action="<?php echo esc_url( admin_url( '/' ) ); ?>" method="post" id="quick-note" class="initial-form hide-if-no-js">
			<?php if ( count( $all_maps ) > 0 ) : ?>
	                        
	             <p id="map_select">
	    			<select "name="map" id="map">
	    				<option>S??lectionnez une carte</option>
	    				<?php foreach ( $all_maps as $map ) : ?>
	    					<option value="<?php echo $map->ID; ?>"><?php echo $map->post_title; ?></option>
	    				<?php endforeach; ?>
	    			</select>
	    		</p>
	    	<?php endif;
			
			if ( $error_msg ) : ?>
	        <div class="error"><?php echo $error_msg; ?></div>
	        <?php endif; ?>


	        <div class="input-text-wrap" id="title-wrap">
	            <label for="title">
	                <?php
	                /** This filter is documented in wp-admin/edit-form-advanced.php */
	                echo apply_filters( 'enter_title_here', __( 'Nom du marqueur' ), $post );
	                ?>
	            </label>
	            <input type="text" name="post_title" id="title" autocomplete="off" />
	        </div>
	 
	        <div class="textarea-wrap" id="description-wrap">
	            <label for="content"><?php _e( 'Quick description' ); ?></label>
	            <textarea name="post_desc" id="post_desc" class="mceEditor" rows="3" cols="15" autocomplete="off"></textarea>
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
	    if($_POST['post_submit']=='Enregistrer cette position')
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
		echo '<h2 class="hide-if-no-js">' . __( 'Your Recent Field Notes' ) . "</h2>\n<ul>";

		/* translators: Maximum number of words used in a preview of a draft on the dashboard. */
		$draft_length = (int) _x( '10', 'draft_length' );

		$drafts = array_slice( $drafts, 0, 3 );
		foreach ( $drafts as $draft ) {
			$url   = get_edit_post_link( $draft->ID );
			$title = _draft_or_post_title( $draft->ID );
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
			$the_content = wp_trim_words( $draft->post_content, $draft_length );
			if ( $the_content ) {
				echo '<p>' . $the_content . '</p>';
			}
			echo "</li>\n";
		}
		echo "</ul>\n</div>";
		}
	}

	
}
?>