/**
 * GeoProjects Plugin wrapper for leaflet
 * Plugin pattern from https://coding.smashingmagazine.com/2011/10/11/essential-jquery-plugin-patterns/
 * 
 * @package GeoProjects
 */

// Force Leaflet to not use CSS 3D Transforms
// Firefox has some bugs when using them and having a video embed in a popup's marker
L_DISABLE_3D = true;
var token = my_options.token;
var style = my_options.style;
var ajaxurl = my_options.ajaxurl;
var defaultMapCenterLat = my_options.defaultMapCenterLat;
var defaultMapCenterLng = my_options.defaultMapCenterLng;
var defaultMapZoom = my_options.defaultMapZoom;
var defaultMarkerIconFilename = defaultMarkerIconFilename;
var urlToDefaultMarkersIcons = my_options.urlToDefaultMarkersIcons;
var urlToCustomMarkersIcons = my_options.urlToCustomMarkersIcons;
var urlToLoadingImg = my_options.urlToLoadingImg;
var urlMediaelementLib = my_options.urlMediaelementLib;
var defaultExportMapHeight = my_options.defaultExportMapHeight;	
var customBG = my_options.customBG;
var customBGMap = my_options.customBGMap;
var customLat1 = my_options.customLat1;	
var customLong1 = my_options.customLong1;	
var customLat2 = my_options.customLat2;	
var customLong2 = my_options.customLong2;
var customOpacity = my_options.customOpacity;
var customZindex = my_options.customZindex;
var customCopyright = my_options.customCopyright;
var customDisplaying = my_options.customDisplaying;
var customDisplayingMap = my_options.customDisplayingMap;
var customTilesPath = my_options.customTilesPath;
var customImageNorthEast = my_options.customImageNorthEast;
var customImageSouthWest = my_options.customImageSouthWest;


if (style == "") {
	style = 'mapbox/streets-v11';
}

;(function ( $, window, document, undefined ) {

	// Create the defaults once
	var pluginName = 'gpLeafletMap';
	var	tilesProviders = {
		osm: {
			providerName: 'osm',
			url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
			attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
			maxZoom: 18
		},
		cyclosm: {
			providerName: 'osm',
			url: 'https://dev.{s}.tile.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png',
			attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
			maxZoom: 20
		},
		esrigrey: {
			providerName: 'esri',
			url: 'https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}',
			attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ',
			maxZoom: 16
		},
		esristreet: {
			providerName: 'esri',
			url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}',
			attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Delorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012',
			maxZoom: 18
		},
		esriworld: {
			providerName: 'esri',
			url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>, Tiles courtesy of <a href="https://hot.openstreetmap.org/" target="_blank">Humanitarian OpenStreetMap Team</a>',
			maxZoom: 18
		},
		osmhot: {
			providerName: 'osm',
			url: 'https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png',
			attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
			maxZoom: 18
		},
		hydda: {
			providerName: 'osm',
			url: 'https://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png',
			attribution: 'Tiles courtesy of <a href="https://openstreetmap.se/" target="_blank">OpenStreetMap Sweden</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
			maxZoom: 18
		},
		opentopo: {	
			providerName: 'osm',
			url: 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
			attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
			maxZoom: 18
		},
		worldimagery: {
			providerName: 'arcgis',
			url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Shaded_Relief/MapServer/tile/{z}/{y}/{x}',
			attribution: 'Tiles &copy; Esri &mdash; Source: Esri',
			maxZoom: 13
		},
		delorme: {
			providerName: 'esri',
			url: 'https://server.arcgisonline.com/ArcGIS/rest/services/Specialty/DeLorme_World_Base_Map/MapServer/tile/{z}/{y}/{x}',
			attribution: 'Tiles &copy; Esri &mdash; Copyright: &copy;2012 Delorme',
			maxZoom: 11
		},
		stadia_alida: {
			providerName: 'stadia',
			url: 'https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png',
			attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
			maxZoom: 20
		},
		stadia_osmbright: {
			providerName: 'stadia',
			url: 'https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png',
			maxZoom: 20,
			attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
		},
		stadia_outdoors: {
			providerName: 'stadia',
			url: 'https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png',
			attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
			maxZoom: 20
		},
		stadia_dark: {
			providerName: 'stadia',
			url: 'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png',
			attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
			maxZoom: 20
		},
		mtmap: {
			providerName: 'mtmap',
			url: 'https://tile.mtbmap.cz/mtbmap_tiles/{z}/{x}/{y}.png',
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &amp; USGS'
		},
		stamentoner: {
			providerName: 'stamen',
			url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.png',
			attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
			subdomains: 'abcd',
			minZoom: 0,
			maxZoom: 20,
			ext: 'png'
		},
		stamentonerlight: {
			providerName: 'stamen',
			url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}{r}.png',
			attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
			subdomains: 'abcd',
			minZoom: 0,
			maxZoom: 20,
			ext: 'png'
		},
		stamenwater: {
			providerName: 'stamen',
			url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.png',
			attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
			subdomains: 'abcd',
			minZoom: 0,
			maxZoom: 20,
			ext: 'png'
		},
		stamenterrain: {
			providerName: 'stamen',
			url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.png',
			attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
			subdomains: 'abcd',
			minZoom: 0,
			maxZoom: 20,
			ext: 'png'
		},
		geoportail: {
			providerName: 'geoportail',
			url: 'https://wxs.ign.fr/choisirgeoportail/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE=normal&TILEMATRIXSET=PM&FORMAT=image/jpeg&LAYER=GEOGRAPHICALGRIDSYSTEMS.MAPS.SCAN-EXPRESS.STANDARD&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}',
			attribution: '<a target="_blank" href="https://www.geoportail.gouv.fr/">Geoportail France</a>',
			bounds: [[-75, -180], [81, 180]],
			minZoom: 2,
			maxZoom: 18,
			apikey: 'choisirgeoportail',
			format: 'image/jpeg',
			style: 'normal'
		},
		geoportailimg: {
			providerName: 'geoportail',
			url: 'https://wxs.ign.fr/choisirgeoportail/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE=normal&TILEMATRIXSET=PM&FORMAT=image/jpeg&LAYER=GEOGRAPHICALGRIDSYSTEMS.MAPS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}',
			attribution: '<a target="_blank" href="https://www.geoportail.gouv.fr/">Geoportail France</a>',
			bounds: [[-75, -180], [81, 180]],
			minZoom: 2,
			maxZoom: 18,
			apikey: 'choisirgeoportail',
			format: 'image/jpeg',
			style: 'normal'
		},
		geoportailorthos: {
			providerName: 'geoportail',
			url: 'https://wxs.ign.fr/choisirgeoportail/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE=normal&TILEMATRIXSET=PM&FORMAT=image/jpeg&LAYER=ORTHOIMAGERY.ORTHOPHOTOS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}',
			bounds: [[-75, -180], [81, 180]],
			minZoom: 2,
			maxZoom: 18,
			apikey: 'choisirgeoportail',
			format: 'image/jpeg',
			style: 'normal'
		},
		mapbox: {
			providerName: 'mapbox',
			url: 'https://api.mapbox.com/styles/v1/' + style + '/tiles/{z}/{x}/{y}?access_token=' + token,
			attribution: '© <a href="https://apps.mapbox.com/feedback/">Mapbox</a> © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
			maxZoom: 15,
			tileSize: 512,
			zoomOffset: -1
		}
	};

	// The actual plugin constructor
	function Plugin( element, options ) {
		this.domMap = element;
		this.jqMap = $( this.domMap );
		this.jqMapWrapper = this.jqMap.parent( '.gp-leaflet-map-wrap' );
		this.jqMapContainer = this.jqMapWrapper.parent( '.gp-leaflet-map-container' );

		this._name = pluginName;

		this._markersInOrder = [];
		this._markersByID = [];
		this._markersJSON = '';
		this._featureGroup = '';
		this._clusterMarkers = '';

		// Init Parameters
		this.initParameters();		

		// Create Map
		this.createMap();

		// Add drag marker ?
		if ( this._hasDragMarker ) {

			// Create Drag Marker
			this.addDragMarker();

			// Add button "center here" ?
			if ( this._hasCenterHereButton ) {
				this.addCenterHereButton();
			}

		}

		// Add Search Box ? (and drag marker)
		if ( this._hasSearchBox ) {
			this.initSearchBox();
		}
		this.initLngatSearchBox();
		this.initLocateMeBox();
		this.setBoundsNonGeographicalMap();
	}


	/**
	 * Init Parameters
	 */
	Plugin.prototype.initParameters = function() {

		// Map ID
		var mapID = this.jqMap.data( 'map-id' );
		this._mapID = ( mapID != undefined ) ? mapID : 0;

		// Map tiles
		var mapTiles = this.jqMap.data( 'map-tiles' );
		this._tiles = ( mapTiles != undefined && tilesProviders.hasOwnProperty( mapTiles ) ) ? tilesProviders[mapTiles] : tilesProviders['osm'];
		
		// Map default center
		var mapCenterLat = this.jqMap.data( 'map-center-lat' );
		var mapCenterLng = this.jqMap.data( 'map-center-lng' );
		this._centerLat = ( mapCenterLat == undefined ) ? defaultMapCenterLat : mapCenterLat;
		this._centerLng = ( mapCenterLng == undefined ) ? defaultMapCenterLng : mapCenterLng;

		// Map Zoom
		var mapZoom = this.jqMap.data( 'map-zoom' );
		this._zoom = ( mapZoom == undefined ) ? defaultMapZoom : mapZoom;

		// Map Controls (zoom and fullscreen) - Default : true
		var hasControls = this.jqMap.data( 'map-controls' );
		this._hasControls = ( hasControls != undefined && hasControls == 0 ) ? false : true;

		// Map dragging - Default : true
		var hasDrag = this.jqMap.data( 'map-drag' );
		this._hasDrag = ( hasDrag != undefined && hasDrag == 0 ) ? false : true;

		// Allow popups - Default : true
		var hasPopups = this.jqMap.data( 'map-popups' );
		this._hasPopups = ( hasPopups != undefined && hasPopups == 0 ) ? false : true;

		// Map is a permalink - Default : ''
		var mapPermalink = this.jqMap.data( 'map-permalink' );
		this._permalink = ( mapPermalink != undefined && mapPermalink != '' ) ? mapPermalink : '';

		// Open a marker on load - Default : 0
		var openMarker = this.jqMap.data( 'map-open-marker' )
		this._openMarker = ( openMarker != undefined && openMarker != '' ) ? openMarker : 0;

		// Drag Marker - Default : ''
		this._dragMarker = '';
		var hasDragMarker = this.jqMap.data( 'map-drag-marker' );
		this._hasDragMarker = ( hasDragMarker != undefined && hasDragMarker == 1 ) ? true : false;
		var dragMarkerIconType = this.jqMap.data( 'map-drag-marker-icon-type' );
		this._dragMarkerIconType = ( dragMarkerIconType != undefined && ( jQuery.inArray( dragMarkerIconType, ['default', 'custom'] ) != -1 ) ) ? dragMarkerIconType : 'default';
		var dragMarkerIconFilename = this.jqMap.data( 'map-drag-marker-icon-filename' );
		this._dragMarkerIconFilename = ( dragMarkerIconFilename != undefined && dragMarkerIconFilename != '' ) ? dragMarkerIconFilename : defaultMarkerIconFilename;


		// Fields for saving Lat, Lng and Zoom - Default : ''
		var latFieldID = this.jqMap.data( 'map-lat-field' );
		var lngFieldID = this.jqMap.data( 'map-lng-field' );
		var zoomFieldID = this.jqMap.data( 'map-zoom-field' );
		this._latField = '';
		this._lngField = '';
		this._zoomField = '';

		if ( latFieldID != undefined ) {
			var latField = jQuery( '#' + latFieldID );
			this._latField = ( latField.length != 0 ) ? latField : '';
		}

		if ( lngFieldID != undefined ) {
			var lngField = jQuery( '#' + lngFieldID );
			this._lngField = ( lngField.length != 0 ) ? lngField : '';
		}

		if ( zoomFieldID != undefined ) {
			var zoomField = jQuery( '#' + zoomFieldID );
			this._zoomField = ( zoomField.length != 0 ) ? zoomField : '';
		}


		// Is admin page
		var isAdmin = this.jqMap.data( 'map-admin' );
		this._isAdmin = ( isAdmin != undefined && isAdmin == 1  ) ? true : false;


		// Embed map - Default : false
		var isEmbed = this.jqMap.data( 'map-embed' );
		this._isEmbed = ( isEmbed != undefined && isEmbed == 1 ) ? true : false;

		// Map Title (for embed) - Default : ''
		var mapTitle = this.jqMap.data( 'map-title' );
		this._mapTitle = ( mapTitle != undefined && mapTitle != '' && this._isEmbed ) ? mapTitle : '';

		// Map original url (for embed) - Default : ''
		var mapOriginalUrl = this.jqMap.data( 'map-original-url' );
		this._mapOriginalUrl = ( mapOriginalUrl != undefined && mapOriginalUrl != '' && this._isEmbed ) ? mapOriginalUrl : '';

		// Button "Center here" - default : false
		var hasCenterHereButton = this.jqMap.data( 'map-center-here' );
		this._hasCenterHereButton = ( hasCenterHereButton != undefined && hasCenterHereButton == 1 && this._permalink == ''  ) ? true : false;

		// Search Box - Default : false
		var hasSearchBox = this.jqMap.data( 'map-search-box' );
		this._hasSearchBox = ( hasSearchBox != undefined && hasSearchBox == 1 && this._permalink == '' ) ? true : false;

		// Clusterize markers - Default : false
		var clusterizeMarkers = this.jqMap.data( 'map-clusterize' );
		this._clusterizeMarkers = ( clusterizeMarkers != undefined && clusterizeMarkers == 1 ) ? true : false;

		// Show markers Index - Default : false
		var hasMarkersIndex = this.jqMap.data( 'map-markers-index' );
		this._hasMarkersIndex = ( hasMarkersIndex != undefined && hasMarkersIndex == 1 && this._permalink == '' ) ? true : false;

		// Show markers Filter - Default : false
		var hasMarkersFilters = this.jqMap.data( 'map-markers-filters' );
		this._hasMarkersFilters = ( hasMarkersFilters != undefined && hasMarkersFilters == 1  ) ? true : false;

		// Show Map export - Default : false
		var hasExport = this.jqMap.data( 'map-export' );
		this._hasExport = ( hasExport != undefined && hasExport == 1 && this._permalink == '' ) ? true : false;
		
		// Custom BG
		if ( customBG != undefined ) {
			this._customBG = ( customBG.length != 0 ) ? customBG : '';
		}
		if ( customBGMap != undefined ) {
			this._customBGMap = ( customBGMap.length != 0 ) ? customBGMap : '';
		}
		
		if ( customImageSouthWest != undefined ) {
			this._customImageSouthWest = ( customImageSouthWest.length != 0 ) ? customImageSouthWest : '';
		}
		if ( customImageNorthEast != undefined ) {
			this._customImageNorthEast = ( customImageNorthEast.length != 0 ) ? customImageNorthEast : '';
		}		

		//Type of displaying (replace or overlay)
		if ( customDisplayingMap == 'replace' ) {
			this._customDisplayingMap = 'replace';
		}
		else {
			this._customDisplayingMap = 'overlay';
		}
		if ( customDisplaying == 'replace' ) {
			this._customDisplaying = 'replace';
		}
		else {
			this._customDisplaying = 'overlay';
		}

		//Map image options
		if ( customLat1 != undefined ) {
			this._customLat1 = ( customLat1 != 0 ) ? customLat1 : '';
		}
		if ( customLong1 != undefined ) {
			this._customLong1 = ( customLong1 != 0 ) ? customLong1 : '';
		}
		if ( customLat2 != undefined ) {
			this._customLat2 = ( customLat2 != 0 ) ? customLat2 : '';
		}
		if ( customLong2 != undefined ) {
			this._customLong2 = ( customLong2 != 0 ) ? customLong2 : '';
		}
		if ( customOpacity != undefined ) {
			this._customOpacity = ( customOpacity != 0 ) ? customOpacity : '';
		}
		if ( customZindex != undefined ) {
			this._customZindex = ( customZindex != 0 ) ? customZindex : '';
		}
		if ( customCopyright != undefined ) {
			this._customCopyright = ( customCopyright != 0 ) ? customCopyright : '';
		}
		
	};


	/**
	 * Create Map
	 */
	Plugin.prototype.createMap = function () {
		var _this = this;
		
		if ( this._customDisplaying == 'replace' || this._customDisplayingMap == 'replace'  ) {
		//Create Map CRS
			this._llMap = L.map(
				this.jqMap.attr( 'id' ),
				{
					fullscreenControl: this._hasControls,
					touchZoom: this._hasControls,
					dragging: this._hasDrag,
					scrollWheelZoom: false,
					boxZoom: this._hasControls,
					zoomControl: this._hasControls,
				}
			);
		
		} 
		else {
		// Create Map
			this._llMap = L.map(
				this.jqMap.attr( 'id' ),
				{
					fullscreenControl: this._hasControls,
					dragging: this._hasDrag,
					touchZoom: this._hasControls,
					scrollWheelZoom: false,
					doubleClickZoom: this._hasControls,
					boxZoom: this._hasControls,
					zoomControl: this._hasControls
				}
			);
			
		}
		if(!this._isAdmin && this._hasExport)
		{
			var comp = new L.Control.Compass({autoActive: true, showDigit:true});
			this._llMap.addControl(comp);
		}

	


		// Add tiles layer

		// Non geographical Map (custom image replace map)
		if ( this._customDisplaying == 'replace' || this._customDisplayingMap == 'replace'  ) {

			var tilesUrl = customTilesPath;

			//if NorthWest and SouthPoint have been entered by administrator
			if ( this._customImageSouthWest  &&  this._customImageNorthEast  ) 
			{
				var southWest = L.latLng(JSON.parse("[" + customImageSouthWest + "]"));
				var northEast = L.latLng(JSON.parse("[" + customImageNorthEast + "]"));
				var customBounds = L.latLngBounds(southWest, northEast);	
				
				L.tileLayer(tilesUrl+'/{z}_{x}_{y}.png', {
						minZoom: 0,
						maxZoom: 5,
						noWrap: true, 
						reuseTiles : true,				
						bounds: customBounds,
						attribution: this._tiles.attribution,
				}).addTo(this._llMap);	
			}
			else{
				L.tileLayer(tilesUrl+'/{z}_{x}_{y}.png', {
						minZoom: 0,
						maxZoom: 5,
						noWrap: true, 
						reuseTiles : true,				
						attribution: this._tiles.attribution,
				}).addTo(this._llMap);	

			}		

		}
		// Regular map
		else {
			var tilesUrl = this._tiles.url;
			L.tileLayer(
				tilesUrl,
				{
					attribution: this._tiles.attribution,
					maxZoom: this._tiles.maxZoom
				}
			).addTo( this._llMap );
		}

	
		// Map acts as a permalink ?
		if ( this._permalink != '' ) {
			
			this._llMap.on( 'click', function(e){
				window.location.href = _this._permalink;
			});

			this.jqMap.css( 'cursor', 'pointer' );

		}

		// Map is embed ?
		if ( this._isEmbed ) {
			this.showEmbedMapPermalink();
		}

		// Has markers to load ?
		if ( this._mapID != 0 ) {
			this.loadMapMarkers();

			// Add Export map feature ?
			if ( this._hasExport ) {
				this.addExportMap();
			}
		}
		else {
			// Center and Zoom map by default
			this._llMap.setView( [this._centerLat, this._centerLng], this._zoom );
		}

		// On Popup open
		if ( this._hasPopups ) {
			this.onPopupOpen();
		}

		// If Lat, Lng or Zoom fields are provided, and there is no drag marker, save position and zoom on map dragging/zooming changes
		if ( !this._hasDragMarker && ( this._latField != '' || this._lngField != '' || this._zoomField != '' ) ) {

			this._llMap.on( 'dragend zoomend', function(e){
				var mapCenter = _this._llMap.getCenter();

				if ( _this._latField != '' ) {
					_this._latField.val( mapCenter.lat );
				}
				if ( _this._lngField != '' ) {
					_this._lngField.val( mapCenter.lng );
				}
				if ( _this._zoomField != '' ) {
					_this._zoomField.val( _this._llMap.getZoom() );
				}

			});

		}
		
		//BG Image Maps
		
		if ( this._customBG.length > 5 ) 
		{  
			
			var background = this._customBG;
				
			if ( this._customDisplaying == 'replace' )
			{
			/*	var imageUrl =  background;
				var imageBounds = [[0,0], [1000,1000]];
				var overlay =  L.imageOverlay(imageUrl, imageBounds, {
					interactive: true,
					attribution: this._customCopyright,
				}).addTo( this._llMap );
				this._llMap.fitBounds(imageBounds);*/
			}
			else
			{  
				var center = [this._customLat1, this._customLong1];		
				var imageUrl = this._customBG;
				var imageBounds = [center, [this._customLat2, this._customLong2]];	
				this._llMap.fitBounds(imageBounds);
				var overlay = L.imageOverlay(imageUrl, imageBounds, {
					opacity: this._customOpacity,
					interactive: true,
					zIndex: this._customZindex,
					attribution: this._customCopyright,
				}).addTo( this._llMap );	
			}
		}

		//BG Image Markers
		
		if ( this._customBGMap.length > 5 ) 
		{  
			
			var background = this._customBGMap;
				
			if ( this._customDisplayingMap == 'replace' )
			{
				var tilesUrl = customTilesPath;

				if ( this._customImageSouthWest &&  this._customImageNorthEast ) 
				{
					var southWest = L.latLng(JSON.parse("[" + customImageSouthWest + "]"));
					var northEast = L.latLng(JSON.parse("[" + customImageNorthEast + "]"));
					var customBounds = L.latLngBounds(southWest, northEast);	
					L.tileLayer(tilesUrl+'/{z}_{x}_{y}.png', {
						minZoom: 0,
						maxZoom: 5,
						noWrap: true,           
						reuseTiles : true,          
						attribution: this._customCopyright,
					}).addTo(this._llMap);
				}
				else{
					L.tileLayer(tilesUrl+'/{z}_{x}_{y}.png', {
							minZoom: 0,
							maxZoom: 5,
							noWrap: true, 
							reuseTiles : true,				
							attribution: this._tiles.attribution,
					}).addTo(this._llMap);	
				}		
			}
			else
			{  
				var center = [this._customLat1, this._customLong1];		
				var imageUrl = this._customBG;
				var imageBounds = [center, [this._customLat2, this._customLong2]];	
				this._llMap.fitBounds(imageBounds);
				var overlay = L.imageOverlay(imageUrl, imageBounds, {
					opacity: this._customOpacity,
					interactive: true,
					zIndex: this._customZindex,
					attribution: this._customCopyright,
				}).addTo( this._llMap );	
			}
		}
	};


	/**
	 * On Popup Open event
	 * - Init (and load MediaElement if necessary) any audio player
	 * - Set videos responsives
	 */
	Plugin.prototype.onPopupOpen = function() {
		var _this = this;

		_this._llMap.on( 'popupopen', function(e){
			var ppPan = jQuery( _this._llMap.getPanes().popupPane );
			var audioWrapper = ppPan.find( '.map-popup-marker-content-audio' );
			var videoWrapper = ppPan.find( '.map-popup-marker-content-video' );

			// If Text content, add target="_parent" to all links
			var links = ppPan.find( '.map-popup-marker-content-text a' );

			if ( links.length > 0 ) {
				links.attr( 'target', '_parent' );
			}

			// Init audio player ?
			if ( audioWrapper.length > 0 ) {

				// Mediaelement lib loaded ?
				if ( typeof mejs != 'undefined' ) {

					// Set audio player settings
					var meSettings = {};

					if ( typeof _wpmejsSettings !== 'undefined' ) {
						meSettings.pluginPath = _wpmejsSettings.pluginPath;
					}

					// Init audio player
					audioWrapper.find( '.wp-audio-shortcode' ).mediaelementplayer( meSettings );

				}
				// Not loaded
				else {

					// Load Mediaelement lib
					jQuery.getScript( urlMediaelementLib, function( data, textStatus, jqxhr ){

						// Set audio player settings
						mejs.plugins.silverlight[0].types.push('video/x-ms-wmv');
						mejs.plugins.silverlight[0].types.push('audio/x-ms-wma');

						var meSettings = {};

						if ( typeof _wpmejsSettings !== 'undefined' ) {
							meSettings.pluginPath = _wpmejsSettings.pluginPath;
						}

						// Init audio player
						audioWrapper.find( '.wp-audio-shortcode' ).mediaelementplayer( meSettings );

					});

				}

			}

			// Apply fitVids on video player
			videoWrapper.fitVids({ customSelector: "iframe[src^='https://www.dailymotion.com']" });

		});

	};
	


	/**
	 * Load Map Markers (ajax)
	 */
	Plugin.prototype.loadMapMarkers = function() {

		if ( this._mapID != 0 ) {

			var ajaxAction = ( this._mapID == 'all' ) ? 'gp-get-all-markers' : 'gp-get-map-markers';
	

			jQuery.ajax({
				url: ajaxurl,
				context: this,
				data: { action: ajaxAction, id: this._mapID },
				success: function( resp ) {

					if ( resp.length != 0 ) {
						var bounds;

						// Save markers JSON list
						this._markersJSON = resp;

						// Loop through markers
						for ( var key in resp ) {
							var currentMarker = this.createMarker( resp[key], this._hasPopups );

							// Add to lists of markers
							this._markersInOrder.push( currentMarker );
							this._markersByID[resp[key].id] = currentMarker;
						}
				

						// Add to Cluster OR FeatureGroup and then to the map
/*						if ( this._clusterizeMarkers ) {
							this._clusterMarkers = new L.MarkerClusterGroup();
							this._clusterMarkers.addLayers( this._markersInOrder );
							this._clusterMarkers.addTo( this._llMap );
							bounds = this._clusterMarkers.getBounds();
						}
						else {*/
							this._featureGroup = L.featureGroup( this._markersInOrder );
							this._featureGroup.addTo( this._llMap );
							bounds = this._featureGroup.getBounds();
						/*}*/

								
						if ( this._hasMarkersFilters && this._markersJSON != '' ) 
						{

							jQuery('div#fltr_projects input[type="radio"]').on('change', function() {   
							        var radio = jQuery(this);

							        var ProjectValue = radio.parent().attr("data-project");


							        var CatActiveValue = jQuery( "label[class*=active]").attr("data-cat");

							        if(ProjectValue === "prjct_all" && CatActiveValue === "cat_all" ){
							        	jQuery( ".leaflet-marker-icon" ).show();
							        }
							        else if(ProjectValue === "prjct_all"){
							        	jQuery( ".leaflet-marker-icon" ).hide();
							        	jQuery( "img[class*="+CatActiveValue+"][class*=prjct_]" ).show();
							        }
							        else if(CatActiveValue === "cat_all"){
							        	jQuery( ".leaflet-marker-icon" ).hide();
							        	jQuery( "img[class*="+ProjectValue+"][class*=cat_]" ).show();
							        }						        
							        else{
							        	jQuery( ".leaflet-marker-icon" ).hide();
							        	jQuery("."+ProjectValue+"."+CatActiveValue).show();
							        }
							 })

							jQuery('div#fltr_cats input[type="radio"]').on('change', function() {   
							        var radio = jQuery(this);

							        var CatValue = radio.parent().attr("data-cat");

							        var ProjectActiveValue = jQuery( "label[class*=active]").attr("data-project");
							      

							        if(CatValue === "cat_all" && ProjectActiveValue === "prjct_all" ){
							        	jQuery( ".leaflet-marker-icon" ).show();
							        }
							        else if(ProjectActiveValue === "prjct_all"){
							        	jQuery( ".leaflet-marker-icon" ).hide();
							        	jQuery( "img[class*="+CatValue+"][class*=prjct_]" ).show();
							        }
							        else if(CatValue === "cat_all"){
							        	jQuery( ".leaflet-marker-icon" ).hide();
							        	jQuery( "img[class*="+ProjectActiveValue+"][class*=cat_]" ).show();
							        }						        
							        else{
							        	jQuery( ".leaflet-marker-icon" ).hide();
							        	jQuery("."+CatValue+"."+ProjectActiveValue).show();
							        }					    
							 })
						
						}

						// has more than 1 marker
						if ( this._markersInOrder.length > 1 ) {
								this._llMap.fitBounds( bounds , {padding: [50,50]});
						}
						// has only 1 marker
						else if ( this._markersInOrder.length == 1 ) {
								var onlyMarkerLatLng = this._markersInOrder[0].getLatLng();
								this._llMap.setView( [onlyMarkerLatLng.lat, onlyMarkerLatLng.lng], this._zoom );
						}
							
						
						// Show the markers index ?
						if ( this._hasMarkersIndex ) {
							this.addMarkersIndex();
						}



						// Open Marker on load ?
						if ( this._openMarker != 0 ) {

							if ( this._featureGroup != '' ) {
								this._markersByID[this._openMarker].fire( 'click' );
							}
							else {
								var _this = this;
								_this._clusterMarkers.zoomToShowLayer( _this._markersByID[_this._openMarker], function(e){
									_this._markersByID[_this._openMarker].fire( 'click' );
								});
							}

						}
						

					}
					// Map error or map without markers
					else {
						// Non geographical map without markers but bounds entered by administrator
						if ( this._customImageSouthWest  &&  this._customImageNorthEast  ) 
						{
							var southWest = L.latLng(JSON.parse("[" + customImageSouthWest + "]"));
							var northEast = L.latLng(JSON.parse("[" + customImageNorthEast + "]"));
							var customBounds = L.latLngBounds(southWest, northEast);
							this._llMap.setView(customBounds.getCenter(), 1);
						}
						else{
							this._llMap.setView( [this._centerLat, this._centerLng], 0 );      
						}	

					}
					
				},
				dataType: 'json'
			});

		}

	};


	/**
	 * Create a marker from an array of marker infos
	 * @param {object} 	markerInfos 	Marker Infos object 
	 * @param {boolean} withPopup		Bind a Popup to the marker ? 
	 */
	Plugin.prototype.createMarker = function( markerInfos, withPopup ) {

		var withPopup = ( typeof withPopup === 'boolean' ) ? withPopup : false;

		// Marker infos ?
		if ( typeof markerInfos === 'object' ) {

			// Marker Icon
			var markerIcon = {
				iconUrl: markerInfos.icon.icon_url,
				iconSize: [markerInfos.icon.icon_size.x, markerInfos.icon.icon_size.y],
				iconAnchor: [Math.floor( markerInfos.icon.icon_size.x / 2 ), markerInfos.icon.icon_size.y - 1],
				popupAnchor: [0, -( markerInfos.icon.icon_size.y )],
				className: markerInfos.classsname,
			};

			// Create marker
			var marker = L.marker( L.latLng( markerInfos.lat, markerInfos.lng ), { icon: L.icon( markerIcon ) } );

			//Redirect Read More link ?
			if (markerInfos.readmorelnk !== '') 
			{
				markerInfos.pmlnk = markerInfos.readmorelnk;
			}

			// Bind popup ?
			if ( withPopup ) {

				var editLink = ( markerInfos.editlnk != '' ) ? ' - <a href="' + markerInfos.editlnk + '" ' + ( ( this._isEmbed ) ? ' target="_parent"' : '' ) + '>' + 'Editer' + '</a>' : '';
				var markerTitle = '<p class="map-popup-marker-title">' + markerInfos.title + editLink + '</p>';
				var markerContent = markerTitle + '<div class="map-popup-marker-content">';

				// Loop through marker contents
				for ( var contentType in markerInfos.contt ) {

					switch ( contentType ) {

						case 'text':
							markerContent += '<p class="map-popup-marker-content-' + contentType + '">' + markerInfos.contt[contentType] + '</p>';
							break;

						case 'image':
							markerContent += '<p class="map-popup-marker-content-' + contentType + '">';
							markerContent +=   '<a href="' + markerInfos.pmlnk + '" title="' + markerInfos.title + '"' + ( ( this._isEmbed ) ? ' target="_parent"' : '' ) + '>';
							markerContent += 	 '<img src="' + markerInfos.contt[contentType].src + '" width="' + markerInfos.contt[contentType].w + '" height="' + markerInfos.contt[contentType].h + '">'
							markerContent +=   '</a>';
							markerContent += '</p>';
							break;

						case 'video':
							markerContent += '<div class="map-popup-marker-content-' + contentType + '">' + markerInfos.contt[contentType] + '</div>';
							break;

						case 'audio':
							markerContent += '<div class="map-popup-marker-content-' + contentType + '">' + markerInfos.contt[contentType] + '</div>';
							break;

					}

				}

				markerContent += '</div>';

				markerContent += '<p class="map-popup-marker-more gp-clearfix"><a href="' + markerInfos.pmlnk + '"' + ( ( this._isEmbed ) ? ' target="_parent"' : '' ) + '>' + 'En savoir +' + '</a></p>';

				marker.bindPopup(
					markerContent,
					{
						minWidth: 200,
						maxWidth: 250
					}
				);

			}

			// If map acts as a permalink, markers too
			if ( this._permalink != '' ) {
				var _this = this;
				marker.on( 'click', function(e){
					window.location.href = _this._permalink;
				});
			}

		}

		return marker;

	};


	/**
	 * Add a draggable marker
	 */
	Plugin.prototype.addDragMarker = function() {

		var _this = this;

		// Create and save draggable marker
		this._dragMarker = L.marker( L.latLng( this._centerLat, this._centerLng ), { draggable: true } ).addTo( this._llMap );

		// Set icon ?
		if ( !( this._dragMarkerIconType == 'default' && this._dragMarkerIconFilename == defaultMarkerIconFilename ) ) {
			this.changeDragMarkerIcon();
		}

		// Save Lat/Lng values in fields ?
		if ( this._latField != '' || this._lngField != '' || this._zoomField != '' ) {

			this._dragMarker.on( 'dragend', function(){
				var currentCoords = this.getLatLng();

				if ( _this._latField != '' ) {
					_this._latField.val( currentCoords.lat );
				}
				if ( _this._lngField != '' ) {
					_this._lngField.val( currentCoords.lng );
				}
				if ( _this._zoomField != '' ) {
					_this._zoomField.val( _this._llMap.getZoom() );
				}
			});

		}

	};


	/**
	 * Change the draggable marker icon
	 */
	Plugin.prototype.changeDragMarkerIcon = function() {
		jQuery.ajax({
			url: ajaxurl,
			context: this,
			data: { action: 'gp-get-all-icon-infos', icontype: this._dragMarkerIconType, iconfilename: this._dragMarkerIconFilename },
			success: function( resp ) {
				if ( resp.icon != undefined ) {

					// Marker icon
					var markerIcon = {
						iconUrl: resp.icon_url,
						iconSize: [resp.icon_size.x, resp.icon_size.y],
						iconAnchor: [Math.floor( resp.icon_size.x/2 ), resp.icon_size.y - 1],
						popupAnchor: [0, -( resp.icon_size.y )],
					};

					// Marker shadow ?
					// if ( typeof( resp.icon_infos.icon_shadow_url ) != "undefined" ) {
					// 	markerIcon.shadowUrl = resp.icon_infos.icon_shadow_url;
					// 	markerIcon.shadowSize = [resp.icon_infos.icon_shadow_size.x, resp.icon_infos.icon_shadow_size.y];
					// 	markerIcon.shadowAnchor = [Math.floor( resp.icon_infos.icon_shadow_size.x/2 ), resp.icon_infos.icon_shadow_size.y];
					// }

					// Change marker's icon
					this._dragMarker.setIcon( L.icon( markerIcon ) );

				}
				else {
					// Reset icon type and filename
					this._dragMarkerIconType = 'default';
					this._dragMarkerIconFilename = defaultMarkerIconFilename;
				}
			},
			dataType: 'json'
		});
	};


	/**
	 * Set draggable marker icon
	 */
	Plugin.prototype.setDragMarkerIcon = function( iconType, iconFilename ) {

		if ( iconType != this._dragMarkerIconType || iconFilename != this._dragMarkerIconFilename ) {

			if ( iconType != undefined && ( jQuery.inArray( iconType, ['default', 'custom'] ) != -1 ) && iconFilename != undefined && iconFilename != '' ) {

				this._dragMarkerIconType = iconType;
				this._dragMarkerIconFilename = iconFilename;

				this.changeDragMarkerIcon();

			}

		}

	};


	/**
	 * Add "Center Here" button
	 */
	Plugin.prototype.addCenterHereButton = function() {

		if ( this._dragMarker != '' ) {
			var _this = this;
			var centerButton = jQuery( '<a href="" class="ml-2 mt-1 mb-5 map-center-here button button-secondary">' + 'Centrez le marqueur ici' + '</a>' );

			// Click on button
			centerButton.on( 'click', function(e){
				e.preventDefault();
				var mapCenter = _this._llMap.getCenter();

				_this._dragMarker.setLatLng( mapCenter );

				// Save Lat and Lng ?
				if ( _this._latField != '' ) {
					_this._latField.val( mapCenter.lat );
				}
				if ( _this._lngField != '' ) {
					_this._lngField.val( mapCenter.lng );
				}
			});

			this.jqMapWrapper.prepend( centerButton );

		}

	};


	/**
	 * Init Search Box
	 */
	Plugin.prototype.initSearchBox = function() {
		var _this = this;
		
		// Add search box to DOM
		_this.jqMapContainer.prepend(
			jQuery( '<div class="map-geo-search">' )
				.append(
					jQuery( '<div>' )
						.append( '<input type="text" class="d-block d-lg-inline-block ml-3 mb-1 mr-2 map-search-field" placeholder="' + "Entrez une adresse" + '" name="map-search-field" value="">' )
						.append(
							jQuery( '<a href="" class="mb-1 map-search-button button button-secondary">' )
								.text( 'Rechercher l\'adresse' )
						)
				)
				.append(
					jQuery( '<div class="map-search-results" class="visuallyhidden">' )
						.append( '<img src="' + urlToLoadingImg + '" class="loading">' )
				)
        );

		// Init vars
        var searchBox = jQuery( '.map-geo-search' );
        var searchField = searchBox.find( 'input[name=map-search-field]' );
        var searchButton = searchBox.find( '.map-search-button' );
		var searchResults = searchBox.find( '.map-search-results' );

		// Click on search button
		searchButton.on('click', function(e){
			e.preventDefault();

			// If field is not empty
			if (searchField.val() != '') {

				// If same address searched
				if ( searchResults.data( 's' ) == searchField.val() ) {
					searchResults.slideDown();
				}
				// New address searched
				else {

					// Show loading img
					searchResults
						.html( jQuery( '<img />' ).attr( 'src', urlToLoadingImg ).addClass( 'loading' ) )
						.show();

					// Save current address searched
					searchResults.data( 's', searchField.val() );

					// Launch request on Nominatim
					jQuery.ajax({
						url: 'https://nominatim.openstreetmap.org/search/' + searchField.val() + '?format=json&limit=10',
						context: _this,
						success: function( res ){

							// If there is results
							if ( res.length > 0 ) {
								var _this = this;
								var resultsHtml = jQuery( '<ul></ul>' );

								// Loop results
								jQuery.each( res, function( k, v ) {
									resultsHtml.append(
										jQuery( '<li></li>' )
											.append(
												jQuery( '<a></a>' )
													.attr( 'href', '' )
													.text( v.display_name )
													.data( 'lat', v.lat )
													.data( 'lng', v.lon )
											)
									);
								});

								// Add results to DOM
								searchResults
									.html( '<p>' + 'Résultats de votre recherche' + '</p>' )
									.append( resultsHtml );

								// Click on an address
								searchResults.on( 'click', 'a', function(e){
									e.preventDefault();
									var curLink = jQuery( this );
									var centerMap = L.latLng( curLink.data( 'lat' ), curLink.data( 'lng' ) );

									// Center map
									_this._llMap.setView( centerMap, _this._llMap.getZoom() );

									// If drag Marker, center it here
									if ( _this._dragMarker != '' ) {
										_this._dragMarker.setLatLng( centerMap );
									}

									// Fields for saving Lat / Lng ?
									if ( _this._latField != '' ) {
										_this._latField.val( curLink.data( 'lat' ) );
									}
									if ( _this._lngField != '' ) {
										_this._lngField.val( curLink.data( 'lng' ) );
									}

									// Hide search results
									searchResults.slideUp();
									
								});

							}
							// No results found
							else {
								searchResults.html( '<p>' + 'Aucun résultat' + '</p>' );
							}

						},
						dataType: 'json'
					});

				}

			}
		});

		// "Enter" key in the address search field
		searchField.on( 'keypress', function(e){
			if ( e.keyCode == 13 ) {
				searchButton.trigger( 'click' );
				return false;
			}
		});

	};


	/**
	 * Init Longitude and Lattitude Search Box
	 */
	Plugin.prototype.initLngatSearchBox = function() {
		var _this = this;
		
		// Init vars
		var searchBox = jQuery( '.mbox-marker-geo-wrap' );
        var searchLat = searchBox.find( 'input[name=gp-lat]' );
        var searchLng = searchBox.find( 'input[name=gp-lng]' );
        var searchField = searchBox.find( 'input[name=map-search-field]' );
        var searchButtonLngLat = searchBox.find( '.map-search-lng-lat-button' );

		searchButtonLngLat.on('click', function(e){
			e.preventDefault();
			// If field is not empty
			if (searchLat.val() != '' && searchLng.val() != '') 
			{
					// Launch request on Nominatim
					jQuery.ajax({
						url: 'https://nominatim.openstreetmap.org/search/' + searchField.val() + '?format=json&limit=10',
						context: _this,
						success: function( res )
						{
									var centerMap = L.latLng( searchLat.val(), searchLng.val() );

									// Center map
									_this._llMap.setView( centerMap, _this._llMap.getZoom() );
									
									// If drag Marker, center it here
									if ( _this._dragMarker != '' ) {
										_this._dragMarker.setLatLng( centerMap );
									}

									// Fields for saving Lat / Lng ?
									if ( _this._latField != '' ) {
										_this._latField.val(searchLat.val() );
									}
									if ( _this._lngField != '' ) {
										_this._lngField.val( searchLng.val() );
									}
									
						},
						dataType: 'json'
					});
			}
		});
	};




	/**
	 *  in admin, get bounds of Non geographical maps (custom image)
	 */
	Plugin.prototype.setBoundsNonGeographicalMap = function() {

		if ( this._isAdmin != ''  && this._customDisplaying == 'replace'  )  {
			var _this = this;
			
			// Init vars
			var mboxMapPreview = jQuery( '#mbox_map_preview' );
			var customImageBox = jQuery( '#custom_image-custom-image' );
	        var northEast = customImageBox.find( 'input[name=custom_image_northeast]' );
	        var southWest = customImageBox.find( 'input[name=custom_image_southwest]' );

			_this._llMap.on('contextmenu',function(e) {
			    	var latlng = _this._llMap.mouseEventToLatLng(e.originalEvent);
		       		northEast.val(latlng.lat + ', ' + latlng.lng);
		       		alert('Coordonnées Nord Est sauvegardées :' + latlng.lat + ', ' + latlng.lng);

	  			return false;

		  	});


			_this._llMap.on('click',function(k) {
						var latlng2 = _this._llMap.mouseEventToLatLng(k.originalEvent);
			       		southWest.val(latlng2.lat + ', ' + latlng2.lng);
			       		alert('Coordonnées Sud Ouest sauvegardées : '+ latlng2.lat + ', ' + latlng2.lng);
		  				return false;
		  	});

		 }


	};







	/**
	 * Init Locate Me Box
	 */
	Plugin.prototype.initLocateMeBox = function() {
		var _this = this;
		
		
		// Init vars
		var searchBox = jQuery( '.mbox-marker-geo-wrap' );
        var searchField = searchBox.find( 'input[name=map-search-field]' );
        var searchLat = searchBox.find( 'input[name=gp-lat]' );
        var searchLng = searchBox.find( 'input[name=gp-lng]' );        
        var locateMeButton = searchBox.find( '.locate-me-button' );

        var marker;

		locateMeButton.on('click', function(e){
			e.preventDefault();


			// Launch request on Nominatim
			jQuery.ajax({
						url: 'https://nominatim.openstreetmap.org/search/' + searchField.val() + '?format=json&limit=10',
						context: _this,
						success: function( res )
						{
									jQuery('.loading').hide(); //hide progress bar

									_this._llMap.locate({
									  setView: true
									}).on("locationfound", e => {

									    lat = e.latlng.lat;
	       								lng = e.latlng.lng;

										var centerMap = L.latLng(lat, lng );

										// Center map
										_this._llMap.setView( centerMap, _this._llMap.getZoom() );		

										// If drag Marker, center it here
										if ( _this._dragMarker != '' ) {
											_this._dragMarker.setLatLng( centerMap );
										}			

										
									    

	       								// Fields for saving Lat / Lng ?
										if ( _this._latField != '' ) {
											_this._latField.val(lat);
										}
										if ( _this._lngField != '' ) {
											_this._lngField.val(lng);
										}
			
									});







						},
						dataType: 'json'
			});
		});
	};



	/**
	 * Add the markers Index below the map
	 */
	Plugin.prototype.addMarkersIndex = function() {

		if ( this._hasMarkersIndex && this._markersJSON != '' ) {

			var _this = this;
			var markersIndexContainer = jQuery( '<div class="gp-map-markers-index gp-map-action-pan">' );
	   		var markersIndexUL = jQuery( '<ul class="gp-clearfix">' );

    		// Loop through markers
    		for ( var markerIndex in this._markersJSON ) {
				if ( this._markersJSON.hasOwnProperty( markerIndex ) ) {

					// Add Marker to the markers list UL DOM element
					markersIndexUL.append(
						jQuery( '<li class="gp-map-marker" data-marker-id="' + this._markersJSON[markerIndex].id + '">' )
							.append(
								jQuery( '<a href="" class="d-flex gp-clearfix" title="' + 'Cliquez pour ouvrir dans la carte' + '">' )
									.append(
										jQuery( '<p class="gp-map-marker-icon">' )
											.append( '<img src="' + this._markersJSON[markerIndex].icon.icon_url + '" alt="' + 'Icône du marqueur' + '">' )
									)
									.append(
										jQuery( '<p class="gp-map-marker-title">' )
											.append( '<span>' + this._markersJSON[markerIndex].title + '</span>' )
									)
							)
					);

				}
			}

			// Add list to DOM and events on elements
			if ( markersIndexUL.find( 'li' ).length > 0 ) {

				// Append Index Toggle to DOM
				// Create the actions toggles container if necessary
				var mapActionsToggles = this.jqMapContainer.find( '.gp-map-actions-toggles' );
				var markersIndexToggle = jQuery( '<a href="" class="gp-map-markers-index-toggle" title="' + 'Index des marqueurs' + '">' ).html( 'Index des marqueurs' );

				if ( mapActionsToggles.length > 0 ) {
					mapActionsToggles.prepend( markersIndexToggle );
				}
				else {
					mapActionsToggles = jQuery( '<div class="gp-map-actions-toggles gp-clearfix">' );
					mapActionsToggles.prepend( markersIndexToggle );
					this.jqMapWrapper.after( mapActionsToggles );
				}

				// Append the marker's list in DOM
				this.jqMapContainer.append( 
						markersIndexContainer.append( markersIndexUL )
				);

				// Click on Markers Index Toggle
				mapActionsToggles.on( 'click', '.gp-map-markers-index-toggle', function(e){
					e.preventDefault();

					var toggleButton = jQuery( this );
					var currentOpenedPan = _this.jqMapContainer.find( '.gp-map-action-pan.active' );
					var mapIndexPan = _this.jqMapContainer.find( '.gp-map-markers-index' );

					if ( !mapIndexPan.is( ':visible' ) ) {

						if ( currentOpenedPan.length > 0 ) {
							currentOpenedPan.slideUp( 'fast', function(){
								currentOpenedPan.removeClass( 'active' );
								mapActionsToggles.find( '.active' ).removeClass( 'active' );
								toggleButton.addClass( 'active' );
								mapIndexPan.slideDown( 'fast' );
								mapIndexPan.addClass( 'active' );
							});
						}
						else {
							toggleButton.addClass( 'active' );
							mapIndexPan.slideDown( 'fast' );
							mapIndexPan.addClass( 'active' );
						}

					}
					else {
						toggleButton.removeClass( 'active' );
						mapIndexPan.slideUp( 'fast' );
						mapIndexPan.removeClass( 'active' );
					}
				});

				// Click on markers in the list
				markersIndexContainer.on( 'click', '.gp-map-marker a', function(e){
					e.preventDefault();
					var curMarkerID = jQuery( this ).parent( 'li' ).data( 'marker-id' );
					
					if ( jQuery( 'body' ).scrollTop() > _this.jqMap.offset().top - 30 ) {
						jQuery( 'html, body' ).animate({
							scrollTop: _this.jqMap.offset().top - 30
						});
					}

					// Open Marker popup
					if ( _this._featureGroup != '' ) {
						_this._markersByID[curMarkerID].fire( 'click' );
					}
					else {
						_this._clusterMarkers.zoomToShowLayer( _this._markersByID[curMarkerID], function(e){
							_this._markersByID[curMarkerID].openPopup();
						});
					}
					
				});

			}

		}

	};







	/**
	 * Add the export map feature
	 */
	Plugin.prototype.addExportMap = function() {
		var _this = this;

		// Append Index Toggle to DOM
		// Create the actions toggles container if necessary
		var mapActionsToggles = this.jqMapContainer.find( '.gp-map-actions-toggles' );
		var exportMapToggle = jQuery( '<a href="" class="gp-map-export-map-toggle" title="' + 'Partager' + '">' ).html( 'Partager' );
		var url = document.URL;
		
		var exporturl = url.replace('maps', 'maps/export');
		var mapIframeCode = '<iframe src="' + exporturl + '" width="100%" height="####"></iframe>';

		if ( mapActionsToggles.length > 0 ) {
			mapActionsToggles.append( exportMapToggle );
		}
		else {
			mapActionsToggles = jQuery( '<div class="gp-map-actions-toggles gp-clearfix">' );
			mapActionsToggles.append( exportMapToggle );
			this.jqMapWrapper.after( mapActionsToggles );
		}

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

		this.jqMapContainer.append( exportPan );

		// Click on Export Map Toggle
		mapActionsToggles.on( 'click', '.gp-map-export-map-toggle', function(e){
			e.preventDefault();

			var toggleButton = jQuery( this );
			var currentOpenedPan = _this.jqMapContainer.find( '.gp-map-action-pan.active' );
			var mapExportPan = _this.jqMapContainer.find( '.gp-map-export' );

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
		var mapHeightField = this.jqMapContainer.find( '#gp-map-export-height' );
		var mapExportCodeField = this.jqMapContainer.find( '#gp-map-export-code' );

		mapHeightField.val( defaultExportMapHeight );
		mapExportCodeField.val( mapIframeCode.replace( /####/g, defaultExportMapHeight ) );

		// Click on the export code field
		mapExportCodeField.on( 'focus', function(e){
			var curElt = jQuery( this );
			curElt.val( mapIframeCode.replace( /####/g, mapHeightField.val() ) );
			e.preventDefault();
		});

	};


	Plugin.prototype.showEmbedMapPermalink = function() {

		

	};


	/**
	 * Prevent multiple plugin instantiations on the same element
	 * @param  {object} 		options 	Options passed to the plugin
	 * @return {jQuery Object}         		Element with plugin instance attached to it
	 */
    $.fn[pluginName] = function ( options ) {
        return this.each( function () {
            if ( !$.data( this, 'plugin_' + pluginName ) ) {
                $.data( this, 'plugin_' + pluginName, new Plugin( this, options ) );
            }
        });
    }

})( jQuery, window, document );