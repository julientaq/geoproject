<?php
/**
 * GeoProjects functions and definitions
 *
 * @package GeoProjects
 */

//Base Variables
require_once( get_template_directory() . '/inc/base.php' );

//COMMON functions
require_once( get_template_directory() . '/inc/functions-common.php' );

//Functions for ADMIN only
if ( is_admin() ) {
	require_once( get_template_directory() . '/inc/functions-admin.php' );
}

//Functions for FRONTEND only
else {
	require_once( get_template_directory() . '/inc/functions-frontend.php' );
}




?>