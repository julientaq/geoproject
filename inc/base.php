<?php
/**
 * GeoProjects Base Variables
 *
 * @package GeoProjects
 */
$upload_dir = wp_upload_dir();
$upload_url = $upload_dir['baseurl'];
$upload_path = $upload_dir['path'];
$upload_numbs = $upload_dir['subdir'];
$upload_path = str_replace($upload_numbs, '', $upload_path);
$upload_link = $upload_url . "/markers";
$upload_path_link = $upload_path . "/markers";

/* SOME COOL VARS */

define( 'GP_THEME_VERSION', '4.0' );
define( 'GP_DEFAULT_MARKER_FILE', '000.png' );
define( 'GP_CUSTOM_MARKERS_ICONS_DIRNAME', $upload_link );

define( 'GP_DEFAULT_PROJECTS_DISPLAYED_IN_LIST_MIN', 2 );
define( 'GP_DEFAULT_PROJECTS_DISPLAYED_IN_LIST_MED', 4 );
define( 'GP_DEFAULT_PROJECTS_DISPLAYED_IN_LIST_MAX', 15 );

define( 'GP_DEFAULT_EXCERPT_LENGTH', 60 );
define( 'GP_DEFAULT_EXCERPT_SIDE_POST', 35 );
define( 'GP_DEFAULT_EXCERPT_POST_IN_PROJECT_LIST', 45 );

define( 'GP_NB_OTHER_CONTENTS_IN_SAME_PROJECT_TRIGGER_LAST_MAPS', 2 );
define( 'GP_NB_OTHER_CONTENTS_IN_SAME_PROJECT_TRIGGER_LAST_GEOFORMAT', 2 );
define( 'GP_NB_SIDE_LAST_GEOFORMAT', 2 );
define( 'GP_WIDGET_POSTS_IN_CATEGORY_NB_POSTS', 5 );
define( 'GP_DEFAULT_EXPORT_MAP_HEIGHT', 400 );

/* THEME SETTINGS */

define( 'GP_DEFAULT_PRIMARY_COLOR', '#D91E18' );
define( 'GP_DEFAULT_SECUNDARY_COLOR', '#000000' );
define( 'GP_DEFAULT_ICON_COLOR', '#ffffff' );
define( 'GP_DEFAULT_BURGER_COLOR', '#D91E18' );
define( 'GP_DEFAULT_TITLE_COLOR', '#ffffff' );
define( 'GP_DEFAULT_SUBTITLE_COLOR', '#ffffff' );
define( 'GP_DEFAULT_BACKGROUND_COLOR', '#ffffff' );
define( 'GP_DEFAULT_TEXT_COLOR', '#000000' );
define( 'GP_DEFAULT_BACKGROUND_MENU', '#efefef' );
define( 'GP_DEFAULT_LINK_MENU', '#000000' );
define( 'GP_DEFAULT_EXERGUES', '#f7f7f8' );
define( 'GP_DEFAULT_PROJECTS_LIST', '#787879' );
define( 'GP_DEFAULT_FOOTER_STYLE', '#000000' );
define( 'GP_DEFAULT_BOTTOM_COLOR', '#ffffff' );
define( 'GP_DEFAULT_FOOTER_LINK_COLOR', 'select-one' );
define( 'GP_DEFAULT_SOCIAL_COLOR', 'select-one' );
define( 'GP_DEFAULT_FONT_SIZE', 'select-one' );
define( 'GP_DEFAULT_FONT_TEXT', 'select-seventeen' );
define( 'GP_DEFAULT_FONT_TITLE', 'select-ten' );


	$gp_options = get_option( 'gp_options' );
    $map_tiles_provider = $gp_options['map_tiles_provider'];
    $def_map_tiles_provider = $gp_options['special_map_tiles_provider'];
	
	if (!empty ($map_tiles_provider) ) :
		define( 'GP_DEFAULT_TILES_PROVIDER', $map_tiles_provider );
	else :
		define( 'GP_DEFAULT_TILES_PROVIDER', 'osm' );
	endif;
	
	if (!empty ($def_map_tiles_provider) ) :
		define( 'GP_SPECIAL_TILES_PROVIDER', $def_map_tiles_provider );
	else :
		define( 'GP_SPECIAL_TILES_PROVIDER', 'osm' );
	endif;

define( 'GP_DEFAULT_MAP_CENTER_LAT', '43.836699' );
define( 'GP_DEFAULT_MAP_CENTER_LNG', '4.360054' );
define( 'GP_DEFAULT_MAP_ZOOM', 14 );
define( 'GP_DEFAULT_EXPORT_MAPS', 1 );
define( 'GP_DEFAULT_URL_TWITTER', '' );
define( 'GP_DEFAULT_URL_FACEBOOK', '' );
define( 'GP_DEFAULT_URL_YOUTUBE', '' );
define( 'GP_DEFAULT_URL_MEDIUM', '' );
define( 'GP_DEFAULT_URL_INSTAGRAM', '' );
define( 'GP_DEFAULT_URL_SOUNDCLOUD', '' );
define( 'GP_DEFAULT_TWITTER_ID', '' );
define( 'GP_DEFAULT_RSS_SHARE', 1 );
define( 'GP_DEFAULT_EMAIL_SHARE', 1 );
define( 'GP_DEFAULT_TWITTER_SHARE', 1 );
define( 'GP_DEFAULT_FACEBOOK_SHARE', 1 );
define( 'GP_DEFAULT_LINKEDIN_SHARE', 1 );
define( 'GP_DEFAULT_PINTEREST_SHARE', 1 );
define( 'GP_DEFAULT_NEXTP', 1 );
define( 'GP_DEFAULT_SOUNDCITE', 1 );
define( 'GP_DEFAULT_WHATSAPP_SHARE', 1 );
define( 'GP_DEFAULT_GOOGLE_ANALYTICS', '' );
define( 'GP_DEFAULT_FAVICON', '' );
define( 'GP_DEFAULT_FRONT_NB_MAPS', 12 );
define( 'GP_DEFAULT_PROJECT_TRASH_KEEP_CONTENTS', 1 );
define( 'GP_DEFAULT_MAP_TRASH_KEEP_MARKERS', 1 );
define( 'GP_DEFAULT_BLOG_TITLE', 1 );
define( 'GP_DEFAULT_COPYRIGHT', 1 );
define( 'GP_DEFAULT_YEAR', 1 );
define( 'GP_DEFAULT_BIGMAP_ON_HP', '1' );


/* PATHS */

define( 'GP_PATH_IMAGES', get_template_directory() . '/img' );
define( 'GP_PATH_DEFAULT_MARKERS_ICONS', GP_PATH_IMAGES . '/markers-icons' );
define( 'GP_PATH_DEFAULT_MARKERS_SHADOWS', GP_PATH_DEFAULT_MARKERS_ICONS . '/shadows' );
define( 'GP_PATH_CUSTOM_MARKERS_ICONS', $upload_path_link );
define( 'GP_PATH_CUSTOM_MARKERS_SHADOWS', GP_PATH_DEFAULT_MARKERS_ICONS . '/shadows' );

/* URLS */

define( 'GP_URL_IMAGES', get_template_directory_uri() . '/img' );
define( 'GP_URL_JS', get_template_directory_uri() . '/js' );
define( 'GP_URL_LIBS', get_template_directory_uri() . '/libs' );
define( 'GP_URL_LEAFLET', GP_URL_LIBS . '/leaflet' );

define( 'GP_URL_DEFAULT_MARKERS_ICONS', GP_URL_IMAGES . '/markers-icons' );
define( 'GP_URL_DEFAULT_MARKERS_SHADOWS', GP_URL_DEFAULT_MARKERS_ICONS . '/shadows' );
define( 'GP_URL_CUSTOM_MARKERS_ICONS', GP_CUSTOM_MARKERS_ICONS_DIRNAME );
define( 'GP_URL_CUSTOM_MARKERS_SHADOWS', GP_PATH_DEFAULT_MARKERS_ICONS . '/shadows' );

define( 'GP_URL_IMAGE_LOADING', GP_URL_IMAGES . '/loading.gif' );

define( 'GP_URL_MEDIAELEMENT', includes_url() . 'js/mediaelement' );