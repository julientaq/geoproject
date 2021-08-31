<?php 
/*
Template Name: export-cap
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">
		<?php 
		$gp_options = get_option( 'gp_options' );
		$favicon = $gp_options['favicon']; 
		if (!empty($favicon) ){ ?>
			<link rel="shortcut icon" href="<?php echo $favicon; ?>">
		<?php } else{
			echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
		} ?>
				
		<?php wp_head(); 
		if ( ! current_user_can( 'manage_options' ) ) {
			show_admin_bar( false );
		} 
		add_filter('show_admin_bar', '__return_false'); ?>
		
		<style>body.custom-background { background-image:none!important;}html,body{margin:0!important;}a{text-decoration:none!important;}#cap { width: 100%; height:100%; position: fixed;} .cap-popup-marker-more{display:none;} 		.gp-leaflet-cap { width: 100%; height:100%!important; height:100vh!important; position: relative;} 		 		#export{position:absolute;z-index:999999;background:#000000;color:#FFFFFF;bottom:0;left:0;padding:8px 16px;font-size:14px;} #export a{color:#FFFFFF;} .leaflet-marker-icon{height:60px!important;width:auto!important;}.leaflet-container .leaflet-marker-pane img{max-height:60px!important;width:auto!important;height:60px!important;}</style>	
	</head>
	
	<body id="exportcape">
	<?php if ( have_posts() ) : the_post(); 


	$gp_options = get_option( 'gp_options' );

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
            <div id="gp-map-<?php the_ID(); ?>" class="gp-leaflet-cape"></div>
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

    var map = new L.Map (id_map).addLayer(layerProvider);
           

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
	
	<div id="export"><a href="<?php the_permalink(); ?>" target="_blank" rel="noopener"><?php the_title(); ?></a> - <?php bloginfo('name'); ?> </div>
		<?php endif;
		
		wp_footer(); ?>
	</body>
</html>