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
		

		$download = '';
		$displaying = '';
		$custom_tiles_path = '';
		$custom_image_northeast = '';
		$custom_image_southwest = '';
		$downloadmap   = '';
		$displayingmap = '';	
		$downloadmap = '';	

		if ( $post_type == 'maps') :

			$download =	get_post_meta( get_the_ID(), 'custom_image_download', true );
			$displaying = get_post_meta( get_the_ID(), 'custom_image_displaying', true );
			if ( $download != "" && $displaying == "replace" ) :
				$custom_tiles_path = wp_get_upload_dir()['baseurl'].'/maps/'.get_the_ID().'/tiles';
				$custom_image_northeast = json_decode(get_post_meta( get_the_ID(), 'custom_image_northeast', true ));
				$custom_image_southwest = json_decode(get_post_meta( get_the_ID(), 'custom_image_southwest', true ));
				$copyright = get_post_meta( get_the_ID(), 'custom_image_copyright', true );
			else :
				$displaying = 'overlay';

			endif;
		

		elseif ( $post_type == 'markers') :
			$mapID = get_post_meta( get_the_ID(), 'gp_map', true );	
			$downloadmap =	get_post_meta( $mapID, 'custom_image_download', true );
			$displayingmap = get_post_meta( $mapID, 'custom_image_displaying', true );

			if($downloadmap != "" && $displayingmap == "replace"):
				
				$custom_tiles_path = wp_get_upload_dir()['baseurl'].'/maps/'.$mapID.'/tiles';
			else:
				$displayingmap = 'overlay';
			endif;
		endif;
		

		
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
			'customTilesPath'			=> $custom_tiles_path,
			'customCopyright' 			=> $copyright,
			'customDisplaying' 			=> $displaying,
			'customDisplayingMap' 		=> $displayingmap,
			'customImageNorthEast' 		=> $custom_image_northeast,
			'customImageSouthWest' 		=> $custom_image_southwest,



		);
?>