<article class="type-capes">
	
	<header class="cape-header">
	
		<h1 class="cape-title"><?php the_title(); ?></h1>

        <?php



        $cape_project_ID = get_post_meta( get_the_ID(), 'gp_project', true );

        if ( $cape_project_ID != 0 ) :
            $cape_project = gp_query_get_project( $cape_project_ID );

            if ( $cape_project != '' ) : ?>
                
                <p class="cape-project">
                    <strong><?php _e( 'Project', 'geoformat' ); ?> :</strong>
                    <a href="<?php echo get_permalink( $cape_project ); ?>" title="<?php echo esc_attr( $cape_project->post_title ); ?>">
                        <?php echo $cape_project->post_title; ?>
                    </a>
                </p>
				
                <?php
            endif;
        endif;
        ?>

	</header>

	<?php
	// Load Leaflet
	
	$gp_options = get_option( 'gp_options' );
	
	$cape_export = get_post_meta( get_the_ID(), 'gp_export', true );
	if ( $cape_export == '' ) :
		$cape_export = $gp_options['export_capes']; 
	endif;

    $cape_tiles_provider = get_post_meta( get_the_ID(), 'gp_tiles_provider', true );
    if ( $cape_tiles_provider == '' ) :
		$cape_tiles_provider = GP_DEFAULT_TILES_PROVIDER;
	endif;

    $center_lat = GP_DEFAULT_MAP_CENTER_LAT;
    $center_lng = GP_DEFAULT_MAP_CENTER_LNG;	

	?>

	<div class="clearfix"></div>
	

	<div class="gp-leaflet-map-container">
        <div class="gp-leaflet-map-wrap">
            <div id="gp-map-<?php the_ID(); ?>" class="gp-leaflet-cape"
             <?php if ( $cape_export ) : ?>
                    data-map-export="1"
                <?php endif;?>>
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
                <input type="hidden" name="gp_tiles_provider"  value='<?php echo $cape_tiles_provider;?>'> 
    </div>

    <script type="text/javascript">
    var hasPolyline = false;
    if(jQuery( "input[name^='gp-polyline']" ).val() ){
        var hasPolyline = true;
    }
    var providerNameSelected = jQuery("input[name='gp_tiles_provider']").val();

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
    
    var id_map = jQuery('.gp-leaflet-cape').attr('id');

    var map = new L.Map (id_map, {
    fullscreenControl: true}
    ).addLayer(layerProvider);
           
	L.latlngGraticule({showLabel: true}).addTo(map);

    L.control.scale ({maxWidth:240, metric:true, imperial:false, position: 'bottomleft'}).addTo(map);

    let polylineMeasure = L.control.polylineMeasure(
                {
                    position:'topleft', 
                    unit:'metres', 
                    showBearings:true, 
                    showClearControl: false, 
                    showUnitControl: true,
                    unitControlTitle: {  // Title texts to show on the Unit Control button
                        text: 'Changer unité',
                        metres: 'mètres',
                        landmiles: 'land miles',
                        nauticalmiles: 'noeuds marins'
                    },
                    clearMeasurementsOnStop: false,
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
                    console.log(e);
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

    <?php if ( $cape_export ): ?>
	   <div class="gp-map-actions-toggles gp-clearfix"><a href="" class="gp-map-export-map-toggle" title="Partager">Partager</a></div>
        <div class="cape-export"></div>
    <?php endif; ?>

	<div class="clearfix"></div>
	
	<div class="cape-content"><?php the_content(); ?></div>

    <?php if (has_tag()) : ?><div id="geotagp"><?php the_tags( '#', ' #', '' ); ?> </div><?php endif; 
	
    get_template_part('networks'); ?>

</article>

<?php if ( $cape_export ): ?>
<script>
	// Click on Export Map Toggle
	var _this = this;

		// Append Index Toggle to DOM
		// Create the actions toggles container if necessary
		var mapActionsToggles = jQuery( '.gp-map-actions-toggles' );
		var url = document.URL;
		
		var exporturl = url.replace('capes', 'capes/export');
		var mapIframeCode = '<iframe src="' + exporturl + '" width="100%" height="####"></iframe>';
		var url = document.URL;
		
		// Create Export Pan
		var exportPan = jQuery( '<div class="gp-map-export gp-map-action-pan gp-clearfix">' )
			.append( '<h3>' + 'Intégrer la carte (iframe)' + '</h3>' )
			.append(
				jQuery( '<p class="gp-map-export-height">' )
					.append( '<label>' + 'Hauteur de la carte (pixels)' + '</label>' )
					.append( '<input type="text" id="gp-map-export-height" name="gp-map-export-height" value="">' )
			)
			.append(
				jQuery( '<p class="gp-map-export-code">' )
					.append( '<label>' + 'Copier-coller ce code HTML' + '</label>' )
					.append( '<textarea id="gp-map-export-code" readonly="readonly" name="gp-map-export-code" cols="10" rows="3"></textarea>' )
			);

		jQuery('.cape-export').append( exportPan );

		// Click on Export Map Toggle
		jQuery('.gp-map-export-map-toggle').click(function(e){
			e.preventDefault();

			var toggleButton = jQuery( this );
			var currentOpenedPan = jQuery( '.gp-map-action-pan.active' );
			var mapExportPan = jQuery( '.gp-map-export' );

			if ( !mapExportPan.is( ':visible' ) ) {

				if ( currentOpenedPan.length > 0 ) {
					currentOpenedPan.slideUp( 'fast', function(){
						currentOpenedPan.removeClass( 'active' );
						mapActionsToggles.find( '.active' ).removeClass( 'active' );
						toggleButton.addClass( 'active' );
						mapExportPan.slideDown( 'fast' );
						mapExportPan.addClass( 'active' );
					});
				}
				else {
					toggleButton.addClass( 'active' );
					mapExportPan.slideDown( 'fast' );
					mapExportPan.addClass( 'active' );
				}

			}
			else {
				toggleButton.removeClass( 'active' );
				mapExportPan.slideUp( 'fast' );
				mapExportPan.removeClass( 'active' );
			}
		});
				// Export fields
		var mapHeightField = jQuery( '#gp-map-export-height' );
		var mapExportCodeField = jQuery( '#gp-map-export-code' );

		mapHeightField.val( defaultExportMapHeight );
		mapExportCodeField.val( mapIframeCode.replace( /####/g, defaultExportMapHeight ) );

		// Click on the export code field
		mapExportCodeField.on( 'focus', function(e){
			var curElt = jQuery( this );
			curElt.val( mapIframeCode.replace( /####/g, mapHeightField.val() ) );
			e.preventDefault();
		});
</script>
<?php endif; ?>