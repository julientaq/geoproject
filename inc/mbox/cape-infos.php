<?php
/**
 * Metabox : "Infos"
 * Post types : capes
 *
 * @package GeoProjects
 */


//Register Metabox

function gp_mbox_cape_infos() {

    add_meta_box( 'mbox_cape_map', __( 'Tracé du cap', 'geoformat' ), 'gp_mbox_cape_map', 'capes', 'normal', 'core' );

}

add_action( 'add_meta_boxes', 'gp_mbox_cape_infos' );



/**
 * Content of the Metabox
 * @param object $post Post Object
 */
function gp_mbox_cape_map( $post ) {

    // Nonce Field
    wp_nonce_field( plugin_basename( __FILE__ ), 'mbox_cape_infos_nonce' );


    $gp_options = get_option( 'gp_options' );

    $center_lat = GP_DEFAULT_MAP_CENTER_LAT;
    $center_lng = GP_DEFAULT_MAP_CENTER_LNG;
        
    // Get Tiles provider
    $gp_tiles_provider = get_post_meta( $post->ID, 'gp_tiles_provider', true );
    if (  empty ($gp_tiles_provider) ) :
            $gp_tiles_provider = $gp_options['map_tiles_provider'];
    else :
            $gp_tiles_provider = get_post_meta( $post->ID, 'gp_tiles_provider', true );
    endif;

    if ( $gp_tiles_provider == '' ) {
        $gp_tiles_provider = GP_DEFAULT_TILES_PROVIDER;
    }

    $cape_id = ( $post->post_status == 'auto-draft' ) ? 0 : $post->ID;


    ?>


    <div>
        <h3><?php _e( 'Tiles Provider', 'geoformat' ); ?></h3>
        <div class="d-flex pb-2" id="tilesProvider">
            <label class="align-self-center mr-2"><?php _e( 'Choose a tiles provider :', 'geoformat' ); ?></label>
            <select class="align-self-center" name="gp-tiles-provider" id="gp-tiles-provider">
                    <option value="osm" <?php selected($gp_tiles_provider, "osm"); ?>>OpenStreetMap</option>
                    <option value="cyclosm" <?php selected($gp_tiles_provider, "cyclosm"); ?>>CyclOSM</option>
                    <option value="esrigrey" <?php selected($gp_tiles_provider, "esrigrey"); ?>>Esri WorldGrayCanvas</option>
                    <option value="esristreet" <?php selected($gp_tiles_provider, "esristreet"); ?>>Esri WorldStreetMap</option>
                    <option value="esriworld" <?php selected($gp_tiles_provider, "esriworld"); ?>>Esri WorldImagery</option>
                    <option value="opentopo" <?php selected($gp_tiles_provider, "opentopo"); ?>> OpenTopoMap</option>
                    <option value="osmhot" <?php selected($gp_tiles_provider, "osmhot"); ?>>OpenStreetMap.HOT</option>
                    <option value="hydda" <?php selected($gp_tiles_provider, "hydda"); ?>>Hydda Full</option>
                    <option value="worldimagery" <?php selected($gp_tiles_provider, "worldimagery"); ?>>Esri.Shaded.Relief</option>
                    <option value="delorme" <?php selected($gp_tiles_provider, "delorme"); ?>>Esri.DeLorme</option>
                    <option value="stadia_alida" <?php selected($gp_tiles_provider, "stadia_alida"); ?>>Stadia Alida</option>
                    <option value="stadia_outdoors" <?php selected($gp_tiles_provider, "stadia_outdoors"); ?>>Stadia Outdoors</option>
                    <option value="stadia_osmbright" <?php selected($gp_tiles_provider, "stadia_osmbright"); ?>>Stadia OSM Bright</option>
                    <option value="stadia_dark" <?php selected($gp_tiles_provider, "stadia_dark"); ?>>Stadia Dark</option>
                    <option value="mtmap" <?php selected($gp_tiles_provider, "mtmap"); ?>>MT Map</option>
                    <option value="stamentoner" <?php selected($gp_tiles_provider, "stamentoner"); ?>>Stamen Toner</option>
                    <option value="stamentonerlight" <?php selected($gp_tiles_provider, "stamentonerlight"); ?>>Stamen Toner Light</option>
                    <option value="stamenwater" <?php selected($gp_tiles_provider, "stamenwater"); ?>>Stamen Watercolor</option>
                    <option value="stamenterrain" <?php selected($gp_tiles_provider, "stamenterrain"); ?>>Stamen Terrain</option>
                    <option value="geoportail" <?php selected($gp_tiles_provider, "geoportail"); ?>>Geoportail FR</option>
                    <option value="geoportailimg" <?php selected($gp_tiles_provider, "geoportailimg"); ?>>Geoportail IMG</option>
                    <option value="geoportailorthos" <?php selected($gp_tiles_provider, "geoportailorthos"); ?>>Geoportail Orthos</option>
                    <option value="mapbox" <?php selected($gp_tiles_provider, "mapbox"); ?>>MapBox*</option>
             </select>
        </div>
        <div class="help-notice">
        <?php _e('Select the background with which you want to preview. Please, save it to view the change. It will only affect the markers\' preview, not the original map. To do so, you have to edit the original map that you have created.','geoformat'); ?>
        </div>
        <div><small><?php _e( '*To use MapBox, don\'t forget to complete the field "MapBox access token" within the setting page.', 'geoformat' ); ?></small>
         </div>
   
         <hr class="mt-3"/>
    </div>



    <div class="mbox-cape-geo-wrap">
        <div class="gp-leaflet-map-wrap">
            <div class="gp-leaflet-map">
                <div id="map" class="gp-leaflet-map"></div>
            </div>
        </div> 
      <?php
            $hasPolyline = false;        
            $constantes_list = "";
            $nbPolyline=0;
            $concat_polylines="";


            // we add a hidden field for each polyline found in the database
            $postmetas = get_post_meta($post->ID);
            $inputNames = array();
            $inputValues = array();
            foreach($postmetas as $meta_key=>$meta_values)
            {
                if ( strpos($meta_key, 'gp_polyline') === 0 && !empty($meta_key) )
                {

                    foreach($meta_values as $meta_value)
                    {
                        $nbPolyline++;

                        $inputName = str_replace('gp_','gp-',$meta_key);
                        $inputNames[] = str_replace('gp_','',$meta_key);
                        $meta_value = str_replace('"','',$meta_value);
                        $inputValues[] = str_replace('gp_','',$meta_value);
                    ?>
                    <input type="hidden" name="<?php echo $inputName;?>" id="<?php echo $inputName;?>" data="polyline" value='<?php echo $meta_value;?>'>
                    <script>const <?php echo str_replace('gp_','',$meta_key);?> =<?php echo $meta_value;?> </script>
                    <?php
                    }
                }
            }
            if($nbPolyline != 0)
            {
                $hasPolyline = true;
                $constantes_list = implode(',', $inputNames);
                $concat_polylines = implode(',', $inputValues);
                $search = array('{', '}', 'lat:', 'lng:');
                $replace = array('[', ']', '', '');

                $concat_polylines = str_replace($search, $replace, $concat_polylines);
                ?>
                <input type="hidden" name="concat_polylines" id="concat_polylines" value='<?php echo $concat_polylines;?>'>
            <?php }
            else{?>
                <input type="hidden" name="center_lat"  value='<?php echo $center_lat;?>'> 
                <input type="hidden" name="center_lng"  value='<?php echo $center_lng;?>'> 
            <?php }?>
    </div>

    <script type="text/javascript">
    var hasPolyline = false;
    if(jQuery( "input[name^='gp-polyline']" ).val() ){
        var hasPolyline = true;
    }
    var providerNameSelected = jQuery('#gp-tiles-provider').val();

    var maxZoom = [],
    providerUrl = []
    attribution = [];

    jQuery.map(tilesProviders, function(n,i){
        if(providerNameSelected == [[i]])
        {
          maxZoom = n.maxZoom;
          attribution = n.attribution;
          providerUrl= n.url;
        }
    });

    var layerProvider = new L.TileLayer (providerUrl, {maxZoom:maxZoom,noWrap:false, attribution:attribution });
           
    var map = new L.Map ('map').addLayer(layerProvider);
           
    L.control.scale ({maxWidth:240, metric:true, imperial:false, position: 'bottomleft'}).addTo(map);

    let polylineMeasure = L.control.polylineMeasure(
                {
                    position:'topleft', 
                    unit:'metres', 
                    showBearings:true, 
                    showClearControl: true, 
                    showSaveControl: true, 
                    showUnitControl: true,
                    unitControlTitle: {  // Title texts to show on the Unit Control button
                        text: 'Changer unité',
                        metres: 'mètres',
                        landmiles: 'land miles',
                        nauticalmiles: 'noeuds marins'
                    },
                    clearMeasurementsOnStop: false,
                    clearControlTitle: 'Effacer le tracé', // Title text to show on the clear measurements control button
                    tooltipTextFinish: 'Cliquer pour marquer la fin d\'une <b>ligne</b><br>',
                    tooltipTextDelete: 'Presser la touche SHIFT et cliquer pour <b>supprimer un point</b>',
                    tooltipTextMove: 'Cliquer et déplacer pour <b>déplacer un point</b><br>',
                    tooltipTextResume: '<br>Pressez la touche CTRL et cliquer pour <b>continuer une ligne</b>',
                    tooltipTextAdd: 'Pressez la touche CTRL et cliquer pour <b>ajouter un point</b>',
                });

                polylineMeasure.addTo(map);

/*  map.on("polylinemeasure:toogle", (e) => {console.log(e);});
                map.on("polylinemeasure:start", (currentLine) => {console.log(currentLine);});
                map.on("polylinemeasure:resume", (currentLine) => {console.log(currentLine);});*/

                map.on("polylinemeasure:finish", (currentLine) => {
                    if (jQuery("input[name='gp-polyline_"+currentLine.id+"']").length === 0) {
                        jQuery('<input>').attr({
                            type: 'hidden',
                            data: 'polyline',
                            id: 'gp-polyline_' + JSON.stringify(currentLine.id),
                            name: 'gp-polyline_' + JSON.stringify(currentLine.id)
                        }).appendTo('.mbox-cape-geo-wrap').val(JSON.stringify(currentLine.circleCoords));
                        console.log(currentLine);
                    }
                    else{
                        jQuery('<input>').attr({
                            type: 'hidden',
                            data: 'polyline',
                            id: 'gp-polyline_' + JSON.stringify(currentLine.id),
                            name: 'gp-polyline_' + JSON.stringify(currentLine.id)
                        }).val(JSON.stringify(currentLine.circleCoords));
                    }
                });

                map.on("polylinemeasure:change", (currentLine) => {
                     jQuery("input[name='gp-polyline_"+ JSON.stringify(currentLine.id)).val(JSON.stringify(currentLine.circleCoords));
                });

                map.on("polylinemeasure:clear", (e) => {
                    jQuery( "input[name^='gp-polyline_'" ).remove();
                    //console.log(e);
                });

/*  map.on("polylinemeasure:add",    (e) => {console.log(e);});
                map.on("polylinemeasure:insert", (e) => {console.log(e);});
                map.on("polylinemeasure:move",   (e) => {console.log(e); });*/
                
                map.on("polylinemeasure:remove", (e) => {
                    var LineID = e.sourceTarget.cntLine;
                    var LineInput = jQuery("input[name='gp-polyline_"+LineID+"']");
                    //console.log(e);
                    if(LineInput.val())
                    {
                        var LineValue = LineInput.val();
                        if ( ( LineValue.split('lat').length - 1) == 2 )
                        {
                            LineInput.remove();
                        }
                    }
                });
            
    if(hasPolyline){
        var concat_polylines = [<?php echo $concat_polylines;?>];
        var polyline = L.polyline(concat_polylines);
        map.fitBounds(polyline.getBounds());
        polylineMeasure.seed([<?php echo $constantes_list;?>])
    }
    else{
        var center_lat = jQuery( "input[name='center_lat']" ).val();
        var center_lng = jQuery( "input[name='center_lng']" ).val();
        map.setView([center_lat,center_lng], 1 );
    }

    </script>

    <?php
    // Export Cape
    $meta_export_cape = get_post_meta( $post->ID, 'gp_export', true );
    $meta_export_cape = ( $meta_export_cape == '' ) ? $gp_options['export_maps'] : $meta_export_cape;
    ?>
    <p class="mbox-label"><?php _e( 'Export', 'geoformat' ); ?></p>
    <p>
        <label for="gp-export">
            <input type="checkbox" id="gp-export" name="gp-export" value="<?php echo GP_DEFAULT_EXPORT_MAPS; ?>" <?php if ( $meta_export_cape == GP_DEFAULT_EXPORT_MAPS ) { echo 'checked="checked"'; } ?>>
            <?php _e( 'Allow sharing this cape (iframe)', 'geoformat' ); ?>
        </label>
    </p>
    <?php
}



/**
 * Save the Metaboxes data
 * @param  Int $post_id ID of the post
 */
function gp_save_mbox_cape( $post_id ) {
  
    // Don't do anything for auto-save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return $post_id;

    // No nonce ?
    if( !isset( $_POST['mbox_cape_infos_nonce'] ) )
        return $post_id;

    // Check nonce
    if ( !wp_verify_nonce( $_POST['mbox_cape_infos_nonce'], plugin_basename( __FILE__ ) ) )
        return;


    // Check permissions
    if ( !current_user_can( 'edit_posts', $post_id ) )
        return;


    // Save polylines

    // First delete existant polylines
    $postmetas = get_post_meta($post_id);
        foreach($postmetas as $meta_key=>$meta_values)
        {
             if ( strpos($meta_key, 'gp_polyline') === 0 && !empty($meta_key) )
             {
                delete_post_meta( $post_id, $meta_key);
             }
         }

    // then save
    foreach($_POST as $key => $value) 
    {
        if (strpos($key, 'gp-polyline') === 0 && !empty($key) )
        {
            update_post_meta($post_id, str_replace('-','_',$key), trim(stripslashes($value)));
        }
    }
 
    // Export cape
    $gp_export = ( isset( $_POST['gp-export'] ) && $_POST['gp-export'] == GP_DEFAULT_EXPORT_MAPS ) ? GP_DEFAULT_EXPORT_MAPS : 0;
    update_post_meta( $post_id, 'gp_export', sanitize_text_field($gp_export) );

    // If tiles provider choice is displayed
    if ( isset( $_POST['gp-tiles-provider'] ) ) {
        update_post_meta( $post_id, 'gp_tiles_provider', sanitize_text_field($_POST['gp-tiles-provider'] ));
    }


}

add_action( 'save_post', 'gp_save_mbox_cape' );
?>