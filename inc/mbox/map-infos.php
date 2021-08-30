<?php
/**
 * Metabox : "Infos"
 * Post types : maps
 *
 * @package GeoProjects
 */


//Register Metabox

function gp_mbox_map_infos() {
    add_meta_box( 'mbox_map_infos', __( 'Infos', 'geoformat' ), 'gp_mbox_map_infos_content', 'maps', 'side', 'core' );
}

add_action( 'add_meta_boxes', 'gp_mbox_map_infos' );


/**
 * Content of the Metabox
 * @param object $post Post Object
 */
function gp_mbox_map_infos_content( $post ) {
    $gp_options = get_option( 'gp_options' );

    // Nonce Field
    wp_nonce_field( plugin_basename( __FILE__ ), 'mbox_map_infos_nonce' );

        // Get fields values
        $gp_tiles_provider = get_post_meta( $post->ID, 'gp_tiles_provider', true );

        if ( $gp_tiles_provider == '' ) {
            $gp_tiles_provider = GP_DEFAULT_TILES_PROVIDER;
        }
    	?>

        <p class="mbox-label">
            <?php _e( 'Choose a tiles provider :', 'geoformat' ); ?>
        </p>

        <p class="gp-tiles-provider-elt">
            <label title="OpenStreetMap">
                <input type="radio" name="gp-tiles-provider" value="osm" <?php echo ( $gp_tiles_provider == 'osm' ) ? 'checked="checked"' : ''; ?>>
                OpenStreetMap
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
            <label title="cyclosm">
                <input type="radio" name="gp-tiles-provider" value="cyclosm" <?php echo ( $gp_tiles_provider == 'cyclosm' ) ? 'checked="checked"' : ''; ?>>
                CyclOSM
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
			<label title="esrigrey">
                <input type="radio" name="gp-tiles-provider" value="esrigrey" <?php echo ( $gp_tiles_provider == 'esrigrey' ) ? 'checked="checked"' : ''; ?>>
                 Esri WorldGrayCanvas
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
            <label title="esristreet">
                <input type="radio" name="gp-tiles-provider" value="esristreet" <?php echo ( $gp_tiles_provider == 'esristreet' ) ? 'checked="checked"' : ''; ?>>
                Esri WorldStreetMap
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
            <label title="esriworld">
                <input type="radio" name="gp-tiles-provider" value="esriworld" <?php echo ( $gp_tiles_provider == 'esriworld' ) ? 'checked="checked"' : ''; ?>>
                Esri WorldImagery
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="opentopo">
                <input type="radio" name="gp-tiles-provider" value="opentopo" <?php echo ( $gp_tiles_provider == 'opentopo' ) ? 'checked="checked"' : ''; ?>>
                 OpenTopoMap
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
            <label title="osmhot">
                <input type="radio" name="gp-tiles-provider" value="osmhot" <?php echo ( $gp_tiles_provider == 'osmhot' ) ? 'checked="checked"' : ''; ?>>
                 OpenStreetMap.HOT
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
            <label title="hydda">
                <input type="radio" name="gp-tiles-provider" value="hydda" <?php echo ( $gp_tiles_provider == 'hydda' ) ? 'checked="checked"' : ''; ?>>
                 Hydda Full
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
            <label title="hydda">
                <input type="radio" name="gp-tiles-provider" value="worldimagery" <?php echo ( $gp_tiles_provider == 'worldimagery' ) ? 'checked="checked"' : ''; ?>>
                 Esri.Shaded.Relief
            </label>
        </p>

        <p class="gp-tiles-provider-elt">
            <label title="Esri.DeLorme">
                <input type="radio" name="gp-tiles-provider" value="delorme" <?php echo ( $gp_tiles_provider == 'delorme' ) ? 'checked="checked"' : ''; ?>>
                Esri.DeLorme
            </label>
        </p>
		
		<p class="gp-tiles-provider-elt">
            <label title="stadia_alida">
                <input type="radio" name="gp-tiles-provider" value="stadia_alida" <?php echo ( $gp_tiles_provider == 'stadia_alida' ) ? 'checked="checked"' : ''; ?>>
                Stadia Alida
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="stadia_outdoors">
                <input type="radio" name="gp-tiles-provider" value="stadia_outdoors" <?php echo ( $gp_tiles_provider == 'stadia_outdoors' ) ? 'checked="checked"' : ''; ?>>
                Stadia Outdoors
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="stadia_osmbright">
                <input type="radio" name="gp-tiles-provider" value="stadia_osmbright" <?php echo ( $gp_tiles_provider == 'stadia_osmbright' ) ? 'checked="checked"' : ''; ?>>
                Stadia OSM Bright
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="stadia_dark">
                <input type="radio" name="gp-tiles-provider" value="stadia_dark" <?php echo ( $gp_tiles_provider == 'stadia_dark' ) ? 'checked="checked"' : ''; ?>>
                Stadia Dark
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="mtmap">
                <input type="radio" name="gp-tiles-provider" value="mtmap" <?php echo ( $gp_tiles_provider == 'mtmap' ) ? 'checked="checked"' : ''; ?>>
                MT Map
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="stamentoner">
                <input type="radio" name="gp-tiles-provider" value="stamentoner" <?php echo ( $gp_tiles_provider == 'stamentoner' ) ? 'checked="checked"' : ''; ?>>
                Stamen Toner
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="stamentonerlight">
                <input type="radio" name="gp-tiles-provider" value="stamentonerlight" <?php echo ( $gp_tiles_provider == 'stamentonerlight' ) ? 'checked="checked"' : ''; ?>>
                Stamen Toner Light
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="stamenwater">
                <input type="radio" name="gp-tiles-provider" value="stamenwater" <?php echo ( $gp_tiles_provider == 'stamenwater' ) ? 'checked="checked"' : ''; ?>>
                Stamen Watercolor
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="stamenterrain">
                <input type="radio" name="gp-tiles-provider" value="stamenterrain" <?php echo ( $gp_tiles_provider == 'stamenterrain' ) ? 'checked="checked"' : ''; ?>>
                Stamen Terrain
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="geoportail">
                <input type="radio" name="gp-tiles-provider" value="geoportail" <?php echo ( $gp_tiles_provider == 'geoportail' ) ? 'checked="checked"' : ''; ?>>
               Géoportail FR
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="geoportailimg">
                <input type="radio" name="gp-tiles-provider" value="geoportailimg" <?php echo ( $gp_tiles_provider == 'geoportailimg' ) ? 'checked="checked"' : ''; ?>>
               Géoportail IMG
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="geoportail">
                <input type="radio" name="gp-tiles-provider" value="geoportailorthos" <?php echo ( $gp_tiles_provider == 'geoportailorthos' ) ? 'checked="checked"' : ''; ?>>
               Géoportail Orthos
            </label>
        </p>
		<p class="gp-tiles-provider-elt">
            <label title="mapbox">
                <input type="radio" name="gp-tiles-provider" value="mapbox" <?php echo ( $gp_tiles_provider == 'mapbox' ) ? 'checked="checked"' : ''; ?>>
                MapBox*
            </label>
        </p>

        <p class="description">
            <?php _e( '(Save this map to update the preview.)', 'geoformat' ); ?>
            <br/>
			<?php _e( '*To use MapBox, don\'t forget to complete the field "MapBox access token" within the setting page.', 'geoformat' ); ?>
        </p>

    	<?php

    // Export Map
    $meta_export_map = get_post_meta( $post->ID, 'gp_export', true );
    $meta_export_map = ( $meta_export_map == '' ) ? $gp_options['export_maps'] : $meta_export_map;
    ?>

    <p class="mbox-label">
        <?php _e( 'Export', 'geoformat' ); ?>
    </p>

    <p>
        <label for="gp-export">
            <input type="checkbox" id="gp-export" name="gp-export" value="<?php echo GP_DEFAULT_EXPORT_MAPS; ?>" <?php if ( $meta_export_map == GP_DEFAULT_EXPORT_MAPS ) { echo 'checked="checked"'; } ?>>
            <?php _e( 'Allow sharing this map (iframe)', 'geoformat' ); ?>
        </label>
    </p>
	
	<?php 
		$gp_tiles_zoom = get_post_meta( $post->ID, 'gp_tiles_zoom', true );
		
        if ( empty ($gp_tiles_zoom) ) :
            $gp_tiles_zoom = GP_DEFAULT_MAP_ZOOM;
		else :
			 $gp_tiles_zoom = get_post_meta( $post->ID, 'gp_tiles_zoom', true );
        endif;
	?>
	
	<p><?php _e('Zoom (the value will depend on the map tiles provider)', 'geoformat'); ?></p>
	
	<input style="max-width:100%;" type="text" id="gp_tiles_zoom" class="regular-text" name="gp_tiles_zoom" value="<?php echo $gp_tiles_zoom; ?>">
	

    <?php

}


/**
 * Save the Metaboxes data
 * @param  Int $post_id ID of the post
 */
function gp_save_mbox_map_infos( $post_id ) {
  
    // Don't do anything for auto-save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return $post_id;

    // No nonce ?
    if( !isset( $_POST['mbox_map_infos_nonce'] ) )
        return $post_id;

    // Check nonce
    if ( !wp_verify_nonce( $_POST['mbox_map_infos_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    // Check permissions
    if ( !current_user_can( 'edit_posts', $post_id ) )
        return;

    // Export map
    $gp_export = ( isset( $_POST['gp-export'] ) && $_POST['gp-export'] == GP_DEFAULT_EXPORT_MAPS ) ? GP_DEFAULT_EXPORT_MAPS : 0;
    update_post_meta( $post_id, 'gp_export', sanitize_text_field($gp_export) );

    // If tiles provider choice is displayed
    if ( isset( $_POST['gp-tiles-provider'] ) ) {
        update_post_meta( $post_id, 'gp_tiles_provider', sanitize_text_field($_POST['gp-tiles-provider'] ));
    }
	
	 if ( isset( $_POST['gp_tiles_zoom'] ) ) {
        update_post_meta( $post_id, 'gp_tiles_zoom', sanitize_text_field($_POST['gp_tiles_zoom'] ));
    }

}

add_action( 'save_post', 'gp_save_mbox_map_infos' );
?>