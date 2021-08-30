<?php
		global $post_type;
		$options = get_option( 'gp_options' );
		if ( $options['mapbox_style'] == true ) :
			$style = $options['mapbox_style'];
		else :
			$style = '';
		endif;
		
		if ( $options['mapbox_token'] == true ) :
			$token = $options['mapbox_token'];
		else :
			$token = '';
		endif;
		if ( $options['center_lat'] == true ) :
			$center_lat = $options['center_lat'];
		else :
			$center_lat = GP_DEFAULT_MAP_CENTER_LAT;
		endif;
		
		if ( $options['center_lng'] == true ) :
			$center_lng = $options['center_lng'];
		else :
			$center_lng = GP_DEFAULT_MAP_CENTER_LNG;
		endif;
		
		if ( $options['zoom'] == true ) :
			$zoom = $options['zoom'];
		else :
			$zoom = GP_DEFAULT_MAP_ZOOM;
		endif;
		
		if ( $post_type == 'maps' ) :
			$download =	get_post_meta( get_the_ID(), 'custom_image_download', true );
		else :
			$download = '';
		endif;
		
		if ( $post_type == 'markers' ) :
			$downloadmap =	get_post_meta( get_the_ID(), 'gp-custombg-map', true );
		else :
			$downloadmap = '';
		endif;
		
		if ( $post_type == 'maps' ) :
			$displaying = get_post_meta( get_the_ID(), 'custom_image_displaying', true );
		else : 
			$displaying = 'overlay';
		endif;
		
		if ( $post_type == 'markers' ) :
			$displayingmap = get_post_meta(  get_the_ID(), 'gp-overlay-map', true );
		else : 
			$displayingmap = 'overlay';
		endif;
		
		if ( $post_type == 'maps' ) :
			$lat1 =	get_post_meta( get_the_ID(), 'custom_image_lat1', true );;
		else :
			$lat1 = '';
		endif;
		
		if ( $post_type == 'maps' ) :
			$long1 =	get_post_meta( get_the_ID(), 'custom_image_long1', true );
		else :
			$long1 = '';
		endif;
		
		if ( $post_type == 'maps' ) :
			$lat2 =	get_post_meta( get_the_ID(), 'custom_image_lat2', true );
		else :
			$lat2 = '';
		endif;
		
		if ( $post_type == 'maps' ) :
			$long2 = get_post_meta( get_the_ID(), 'custom_image_long2', true );
		else :
			$long2 = '';
		endif;
		
		if ( $post_type == 'maps' ) :
			$opacity =	get_post_meta( get_the_ID(), 'custom_image_opacity', true );
		else :
			$opacity = '';
		endif;
		
		if ( $post_type == 'maps' ) :
			$zindex =	get_post_meta( get_the_ID(), 'custom_image_zindex', true );
		else :
			$zindex = '';
		endif;
		
		if ( $post_type == 'maps' ) :
			$copyright = get_post_meta( get_the_ID(), 'custom_image_copyright', true );
		else :
			$copyright = '';
		endif;
		
		
		if ( $post_type == 'maps' ) {
			$minzoom = get_post_meta( get_the_ID(), 'custom_image_minzoom', true );
		} elseif ( $post_type == 'markers' ) {
			$minzoom = get_post_meta( get_the_ID(), 'gp-custombg-minzoom', true );
		} else {
			$minzoom = "0";
		} 
		
		
		$scriptData = array(
			'token' 					=> $token,
			'style' 					=> $style,
			'ajaxurl'                   => admin_url( 'admin-ajax.php' ),
			'defaultMapCenterLat'       => $center_lat,
			'defaultMapCenterLng'       => $center_lng,
			'defaultMapZoom'            => $zoom,
			'defaultMarkerIconFilename' => GP_DEFAULT_MARKER_FILE,
			'urlToDefaultMarkersIcons'  => GP_URL_DEFAULT_MARKERS_ICONS,
			'urlToCustomMarkersIcons'   => GP_URL_CUSTOM_MARKERS_ICONS,
			'urlToLoadingImg'           => GP_URL_IMAGE_LOADING,
			'urlMediaelementLib'        => GP_URL_MEDIAELEMENT . '/mediaelement-and-player.min.js',
			'defaultExportMapHeight'    => GP_DEFAULT_EXPORT_MAP_HEIGHT,
			'customBG' 					=> $download,
			'customBGMap' 				=> $downloadmap,
			'customLat1' 				=> $lat1,
			'customLong1' 				=> $long1,
			'customLat2' 				=> $lat2,
			'customLong2' 				=> $long2,
			'customOpacity' 			=> $opacity,
			'customZindex' 				=> $zindex,
			'customCopyright' 			=> $copyright,
			'customDisplaying' 			=> $displaying,
			'customDisplayingMap' 		=> $displayingmap,
			'customMinZoom' 			=> $minzoom,
		);
?>