<?php
//GeoProjects Settings definitions // @package GeoProjects


// Prevent access to this file directly
if ( !defined( 'ABSPATH' ) ) {
	die( __( 'You should not access to this file directly', 'geoformat' ) );
}

//Settings
add_action( 'admin_init', 'gp_register_settings' );
function gp_register_settings() {
	register_setting( 'gp_options', 'gp_options', 'gp_validate_options' );

	//Design
	
	add_settings_section( 'gp_settings_section_design', __( 'Theme customisation settings', 'geoformat' ), 'gp_settings_section_design_text', 'gp_theme_settings_design' );
	add_settings_field( 'gp_settings_field_primary_color', __( 'Primary color', 'geoformat' ), 'gp_settings_field_primary_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_secundary_color', __( 'Secundary color', 'geoformat' ), 'gp_settings_field_secundary_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_icon_color', __( 'Header icon', 'geoformat' ), 'gp_settings_field_icon_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_burger_color', __( 'Burger menu', 'geoformat' ), 'gp_settings_field_burger_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_title_color', __( 'Title', 'geoformat' ), 'gp_settings_field_title_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_subtitle_color', __( 'Subtitle', 'geoformat' ), 'gp_settings_field_subtitle_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_background_color', __( 'Background', 'geoformat' ), 'gp_settings_field_background_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_text_color', __( 'Text', 'geoformat' ), 'gp_settings_field_text_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_background_menu', __( 'Menus', 'geoformat' ), 'gp_settings_field_background_menu_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_link_menu', __( 'Menus links', 'geoformat' ), 'gp_settings_field_link_menu_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_exergues', __( 'Insights (light gray by default)', 'geoformat' ), 'gp_settings_field_exergues_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_bottom_background', __( 'Footer background', 'geoformat' ), 'gp_settings_field_bottom_background_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_bottom_color', __( 'Footer text', 'geoformat' ), 'gp_settings_field_bottom_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_bottom_link_color', __( 'Footer links', 'geoformat' ), 'gp_settings_field_bottom_link_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );	
	add_settings_field( 'gp_settings_field_social_color', __( 'Social links', 'geoformat' ), 'gp_settings_field_social_color_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_font_text', __( 'Font family (main content)', 'geoformat' ), 'gp_settings_field_font_text_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_font_title', __( 'Font family (titles)', 'geoformat' ), 'gp_settings_field_font_title_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_font_size', __( 'Font size', 'geoformat' ), 'gp_settings_field_font_size_content', 'gp_theme_settings_design', 'gp_settings_section_design' );
	add_settings_field( 'gp_settings_field_favicon', __( 'Add your favicon', 'geoformat' ), 'gp_settings_field_favicon_content', 'gp_theme_settings_design', 'gp_settings_section_design' );

	//Maps 
	add_settings_section( 'gp_settings_section_other_settings', __( ' ', 'geoformat' ), 'gp_settings_section_other_settings_text', 'gp_theme_settings' );
	add_settings_field( 'gp_settings_field_front_soundcite', __( 'Activate Soundcite (see Toolbox/Knight Lab)', 'geoformat' ), 'gp_settings_field_front_soundcite_content', 'gp_theme_settings', 'gp_settings_section_other_settings' );
	add_settings_field( 'gp_settings_field_front_nb_maps', __( 'Number of maps on front page', 'geoformat' ), 'gp_settings_field_front_nb_maps_content', 'gp_theme_settings', 'gp_settings_section_other_settings' );
	add_settings_field( 'gp_settings_field_project_trash_keep_contents', __( 'When trashing a project', 'geoformat' ), 'gp_settings_field_project_trash_keep_contents_content', 'gp_theme_settings', 'gp_settings_section_other_settings' );
	add_settings_field( 'gp_settings_field_map_trash_keep_markers', __( 'When trashing a map', 'geoformat' ), 'gp_settings_field_map_trash_keep_markers_content', 'gp_theme_settings', 'gp_settings_section_other_settings' );	
	add_settings_section( 'gp_settings_section_maps', __( 'Maps Options', 'geoformat' ), 'gp_settings_section_maps_text', 'gp_theme_settings' );
	add_settings_field( 'gp_settings_field_map_default_tiles', __( 'Default tiles provider', 'geoformat' ), 'gp_settings_field_map_default_tiles_content', 'gp_theme_settings', 'gp_settings_section_maps' );
	add_settings_field( 'gp_settings_field_special_map_default_tiles', __( 'Big map default tiles provider', 'geoformat' ), 'gp_settings_field_special_map_default_tiles_content', 'gp_theme_settings', 'gp_settings_section_maps' );
	add_settings_field( 'gp_settings_field_maps_default_center_zoom', __( 'Maps default center and zoom', 'geoformat' ), 'gp_settings_field_maps_default_center_zoom_content', 'gp_theme_settings', 'gp_settings_section_maps' );
	add_settings_field( 'gp_settings_field_maps_export', __( 'Export maps', 'geoformat' ), 'gp_settings_field_maps_export_content', 'gp_theme_settings', 'gp_settings_section_maps' );
	add_settings_field( 'gp_settings_field_mapbox_token', __( 'Mapbox Access Token', 'geoformat' ), 'gp_settings_field_mapbox_token_content', 'gp_theme_settings', 'gp_settings_section_maps' );	
	add_settings_field( 'gp_settings_field_mapbox_style', __( 'Mapbox Style', 'geoformat' ), 'gp_settings_field_mapbox_style_content', 'gp_theme_settings', 'gp_settings_section_maps' );	

	//Networks
	add_settings_section( 'gp_settings_section_social_settings', __( 'My social networks', 'geoformat' ), 'gp_settings_section_social_settings_text', 'gp_theme_settings_social' );
	add_settings_field( 'gp_settings_field_url_twitter', __( 'Twitter URL', 'geoformat' ), 'gp_settings_field_url_twitter_content', 'gp_theme_settings_social', 'gp_settings_section_social_settings' );
	add_settings_field( 'gp_settings_field_twitter_id', __( 'Twitter ID (@MyName)', 'geoformat' ), 'gp_settings_field_twitter_id_content', 'gp_theme_settings_social', 'gp_settings_section_social_settings' );
	add_settings_field( 'gp_settings_field_url_facebook', __( 'Facebook URL', 'geoformat' ), 'gp_settings_field_url_facebook_content', 'gp_theme_settings_social', 'gp_settings_section_social_settings' );
	add_settings_field( 'gp_settings_field_url_youtube', __( 'YouTube URL', 'geoformat' ), 'gp_settings_field_url_youtube_content', 'gp_theme_settings_social', 'gp_settings_section_social_settings' );
	add_settings_field( 'gp_settings_field_url_instagram', __( 'Instagram URL', 'geoformat' ), 'gp_settings_field_url_instagram_content', 'gp_theme_settings_social', 'gp_settings_section_social_settings' );
	add_settings_field( 'gp_settings_field_url_soundcloud', __( 'Soundcloud URL', 'geoformat' ), 'gp_settings_field_url_soundcloud_content', 'gp_theme_settings_social', 'gp_settings_section_social_settings' );
	add_settings_field( 'gp_settings_field_url_medium', __( 'Medium URL', 'geoformat' ), 'gp_settings_field_url_medium_content', 'gp_theme_settings_social', 'gp_settings_section_social_settings' );
	add_settings_section( 'gp_settings_section_socials_settings', __( 'My shared links', 'geoformat' ), 'gp_settings_section_socials_settings_text', 'gp_theme_settings_socials' );
	add_settings_field( 'gp_settings_field_share', __( 'Chose the social networks links', 'geoformat' ), 'gp_settings_field_share_content', 'gp_theme_settings_socials', 'gp_settings_section_socials_settings' );
	
	//Twitter card
	add_settings_section( 'gp_settings_section_card_settings', __( 'Additional data for sharing', 'geoformat' ), 'gp_settings_section_card_settings_text', 'gp_theme_settings_card' );
	add_settings_field( 'gp_settings_field_twitter_card', __( 'Twitter card type', 'geoformat' ), 'gp_settings_section_card_settings_content', 'gp_theme_settings_card', 'gp_settings_section_card_settings' );
	add_settings_field( 'gp_settings_field_default_image', __( 'Default image', 'geoformat' ), 'gp_settings_section_default_settings_content', 'gp_theme_settings_card', 'gp_settings_section_card_settings' );
	
	// Section : Google Analytics script
	add_settings_section( 'gp_settings_section_analytics_settings', __( 'Audience measurements', 'geoformat' ), 'gp_settings_section_analytics_settings_text', 'gp_theme_settings_analytics' );
	add_settings_field( 'gp_settings_field_google_analytics', __( 'Google Analytics code', 'geoformat' ), 'gp_settings_field_google_analytics_content', 'gp_theme_settings_analytics', 'gp_settings_section_analytics_settings' );

	//HTML Metadata
	add_settings_section( 'gp_settings_section_metadata_settings', __( 'Additional data for sharing', 'geoformat' ), 'gp_settings_section_metadata_settings_text', 'gp_theme_settings_metadata' );
	add_settings_field( 'gp_settings_field_description', __( 'Meta description of the website', 'geoformat' ), 'gp_settings_field_description_content', 'gp_theme_settings_metadata', 'gp_settings_section_metadata_settings' );
	add_settings_field( 'gp_settings_field_keywords', __( 'Meta keywords', 'geoformat' ), 'gp_settings_field_keywords_content', 'gp_theme_settings_metadata', 'gp_settings_section_metadata_settings' );
	
	//Geoformat
	add_settings_section( 'gp_settings_section_geoformat', __( '', 'geoformat' ), 'gp_settings_section_geoformat_text', 'gp_theme_settings_geoformat' );
	add_settings_field( 'gp_settings_field_nextp', __( 'Next-previous Geoformat', 'geoformat' ), 'gp_settings_field_nextp_content', 'gp_theme_settings_geoformat', 'gp_settings_section_geoformat' );
	
	//Footer
	add_settings_section( 'gp_settings_section_footer', __( '', 'geoformat' ), 'gp_settings_section_footer_text', 'gp_theme_settings_footer' );
	add_settings_field( 'gp_settings_field_mentions', __( 'Mentions', 'geoformat' ), 'gp_settings_field_mentions_content', 'gp_theme_settings_footer', 'gp_settings_section_footer' );
	add_settings_field( 'gp_settings_field_custom_text', __( 'Custom text', 'geoformat' ), 'gp_settings_field_custom_text_content', 'gp_theme_settings_footer', 'gp_settings_section_footer' );
	add_settings_field( 'gp_settings_field_logo_footer', __( 'Add logo', 'geoformat' ), 'gp_settings_field_logo_footer_content', 'gp_theme_settings_footer', 'gp_settings_section_footer' );


	//Homepage
	add_settings_section( 'gp_settings_section_homepage', __( 'Homepage', 'geoformat' ), 'gp_settings_section_homepage_text', 'gp_theme_settings_homepage' );
	add_settings_field( 'gp_settings_field_bigmap', __( 'Big Map', 'geoformat' ), 'gp_settings_field_bigmap_content', 'gp_theme_settings_homepage', 'gp_settings_section_homepage' );

}

//Display fields

function gp_settings_field_nextp_content() {
	$options = get_option( 'gp_options' );
	$nextp = $options['nextp'];
	$nextp = ( $nextp == '' ) ? GP_DEFAULT_NEXTP : $nextp;
	?>
	
	<p>
		<input type="checkbox" name="gp_options[nextp]" id="nextp" value="<?php echo GP_DEFAULT_NEXTP; ?>" <?php if ( $nextp == GP_DEFAULT_NEXTP ) { echo 'checked="checked"'; } ?>>
	</p>
	
	<?php
}

//Activate Soundcite
function gp_settings_field_front_soundcite_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['soundcite']) ) :
		$soundcite = $options['soundcite']; 
		else : $soundcite = "";
	endif;
	?>
	
	<p>
		<input type="checkbox" name="gp_options[soundcite]" id="nextp" value="<?php echo GP_DEFAULT_SOUNDCITE; ?>" <?php if ( $soundcite == GP_DEFAULT_SOUNDCITE ) { echo 'checked="checked"'; } ?>>
	</p>
	
	<?php
}


//Field display/fill : gp_settings_field_background_color
function gp_settings_field_background_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['background_color']) ) :
		$background_color = $options['background_color']; 
		else : $background_color = GP_DEFAULT_BACKGROUND_COLOR;
	endif;

	?>

	<input type="text" class="meta-color" id="setting-secondary-color" class="regular-text" name="gp_options[background_color]" value="<?php echo $background_color; ?>" data-default-color="<?php echo GP_DEFAULT_BACKGROUND_COLOR; ?>">

	<?php
}

//Field display/fill : gp_settings_field_text_color

function gp_settings_field_text_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['text_color']) ) :
		$text_color = $options['text_color']; 
		else : $text_color = GP_DEFAULT_TEXT_COLOR;
	endif;
	?>

	<input type="text" class="meta-color" id="setting-tagline-color" class="regular-text" name="gp_options[text_color]" value="<?php echo $text_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<?php
}

//Field display/fill : gp_settings_field_secundary_color
function gp_settings_field_secundary_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['secundary_color']) ) :
		$secundary_color = $options['secundary_color']; 
		else : $secundary_color = GP_DEFAULT_SECUNDARY_COLOR;
	endif;
	?>

	<input type="text" class="meta-color" id="setting-title-color" class="regular-text" name="gp_options[secundary_color]" value="<?php echo $secundary_color; ?>" data-default-color="<?php echo GP_DEFAULT_SECUNDARY_COLOR; ?>">

	<?php
}

// Field display/fill : gp_settings_field_icon_color
function gp_settings_field_icon_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['icon_color']) ) :
		$icon_color = $options['icon_color']; 
		else : $icon_color = GP_DEFAULT_ICON_COLOR;
	endif;
	?>
	<input type="text" class="meta-color" id="setting-title-color" class="regular-text" name="gp_options[icon_color]" value="<?php echo $icon_color; ?>" data-default-color="<?php echo GP_DEFAULT_ICON_COLOR; ?>">

	<?php
}

//Field display/fill : gp_settings_field_primary_color
function gp_settings_field_primary_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['primary_color']) ) :
		$primary_color = $options['primary_color']; 
		else : $primary_color = GP_DEFAULT_PRIMARY_COLOR;
	endif;
?>

	<input type="text" class="meta-color" id="setting-primary-color" class="regular-text" name="gp_options[primary_color]" value="<?php echo $primary_color; ?>" data-default-color="<?php echo GP_DEFAULT_PRIMARY_COLOR; ?>">

	<?php
}

//Field display/fill : gp_settings_field_background_menu
function gp_settings_field_background_menu_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['background_menu']) ) :
		$background_menu = $options['background_menu']; 
		else : $background_menu = GP_DEFAULT_BACKGROUND_MENU;
	endif;
	?>

	<input type="text" class="meta-color" id="navbar-color" class="regular-text" name="gp_options[background_menu]" value="<?php echo $background_menu; ?>" data-default-color="<?php echo GP_DEFAULT_BACKGROUND_MENU; ?>">

	<?php
}

//Field display/fill : gp_settings_field_link_menu
function gp_settings_field_link_menu_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['link_menu']) ) :
		$link_menu = $options['link_menu']; 
		else : $link_menu = GP_DEFAULT_LINK_MENU;
	endif;
	?>

	<input type="text" class="meta-color" id="navbar-color" class="regular-text" name="gp_options[link_menu]" value="<?php echo $link_menu; ?>" data-default-color="<?php echo GP_DEFAULT_LINK_MENU; ?>">

	<?php
}

//Field display/fill : gp_settings_field_projects_list
function gp_settings_field_projects_list_content() {
	$options = get_option( 'gp_options' );
	
	if (!empty ($options['projects_list']) ) :
		$projects_list = $options['projects_list']; 
		else : $projects_list = GP_DEFAULT_PROJECTS_LIST;
	endif;

?>

	<input type="text" class="meta-color" id="navbar-color" class="regular-text" name="gp_options[projects_list]" value="<?php echo $projects_list; ?>" data-default-color="<?php echo GP_DEFAULT_PROJECTS_LIST; ?>">

	<?php
}

//Field display/fill : gp_settings_field_burger_color
function gp_settings_field_burger_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['burger_color']) ) :
		$burger_color = $options['burger_color']; 
		else : $burger_color = GP_DEFAULT_BURGER_COLOR;
	endif;
	?>

	<input type="text" class="meta-color" id="navbar-color" class="regular-text" name="gp_options[burger_color]" value="<?php echo $burger_color; ?>" data-default-color="<?php echo GP_DEFAULT_BURGER_COLOR; ?>">

	<?php
}

//Field display/fill : gp_settings_field_title_color
function gp_settings_field_title_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['title_color']) ) :
		$title_color = $options['title_color']; 
		else : $title_color = GP_DEFAULT_TITLE_COLOR;
	endif;
	?>

	<input type="text" class="meta-color" id="navbar-color" class="regular-text" name="gp_options[title_color]" value="<?php echo $title_color; ?>" data-default-color="<?php echo GP_DEFAULT_TITLE_COLOR; ?>">

	<?php
}

//Field display/fill : gp_settings_field_subtitle_color
function gp_settings_field_subtitle_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['subtitle_color']) ) :
		$subtitle_color = $options['subtitle_color']; 
		else : $subtitle_color = GP_DEFAULT_SUBTITLE_COLOR;
	endif;
	?>

	<input type="text" class="meta-color" id="navbar-color" class="regular-text" name="gp_options[subtitle_color]" value="<?php echo $subtitle_color; ?>" data-default-color="<?php echo GP_DEFAULT_SUBTITLE_COLOR; ?>">

	<?php
}

//Field display/fill : gp_settings_field_exergues
function gp_settings_field_exergues_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['exergues']) ) :
		$exergues = $options['exergues']; 
		else : $exergues = GP_DEFAULT_EXERGUES;
	endif;
	?>

	<input type="text" class="meta-color" id="navbar-color" class="regular-text" name="gp_options[exergues]" value="<?php echo $exergues; ?>" data-default-color="<?php echo GP_DEFAULT_EXERGUES; ?>">

	<?php
}

//Field display/fill : gp_settings_field_bottom_background
function gp_settings_field_bottom_background_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['footer_style']) ) :
		$footer_style = $options['footer_style']; 
	else : 
		$footer_style = GP_DEFAULT_FOOTER_STYLE;
	endif;
	?>

	<input type="text" class="meta-color" id="setting-title-color" class="regular-text" name="gp_options[footer_style]" value="<?php echo $footer_style; ?>" data-default-color="<?php echo GP_DEFAULT_FOOTER_STYLE; ?>">

	<?php
}

//Field display/fill : gp_settings_field_bottom_color
function gp_settings_field_bottom_color_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['bottom_color']) ) :
		$bottom_color = $options['bottom_color']; 
	else : 
		$bottom_color = GP_DEFAULT_BOTTOM_COLOR;
	endif;
	?>

	<input type="text" class="meta-color" id="navbottom-color" class="regular-text" name="gp_options[bottom_color]" value="<?php echo $bottom_color; ?>" data-default-color="<?php echo GP_DEFAULT_BOTTOM_COLOR; ?>">

	<?php
}

//Section Maps header text
function gp_settings_section_design_text() {
	// Nothing usefull to display for now
}

//Field display/fill : gp_settings_field_footer_link_color
function gp_settings_field_bottom_link_color_content() {
	$options = get_option( 'gp_options' ); 
	if (!empty ($options['footer_link_color']) ) :
		$footer_link_color = $options['footer_link_color'];
	else : 
		$footer_link_color = GP_DEFAULT_FOOTER_LINK_COLOR;
	endif;
	?>

	<select name="gp_options[footer_link_color]" id="footer_link_color">
		<option value="select-one" <?php selected($footer_link_color, "select-one" ); ?>><?php _e('Footer text color', 'geoformat');?></option>';
		<option value="select-two" <?php selected($footer_link_color, "select-two" ); ?>><?php _e('Primary color', 'geoformat');?></option>';
		<option value="select-three" <?php selected($footer_link_color, "select-three" ); ?>><?php _e('White', 'geoformat');?></option>';
		<option value="select-four" <?php selected($footer_link_color, "select-four" ); ?>><?php _e('Black', 'geoformat');?></option>';
	</select>
	<?php
}

//Field display/fill : gp_settings_field_social_color
function gp_settings_field_social_color_content() {
	$options = get_option( 'gp_options' ); 
	$social_color = $options['social_color'];
	$social_color = ( $social_color == '' ) ? GP_DEFAULT_SOCIAL_COLOR : $social_color;
	?>

	<select name="gp_options[social_color]" id="social_color">
		<option value="select-one" <?php selected($social_color, "select-one" ); ?>><?php _e('Primary color', 'geoformat');?></option>';
		<option value="select-two" <?php selected($social_color, "select-two" ); ?>><?php _e('Original colors', 'geoformat');?></option>';
		<option value="select-three" <?php selected($social_color, "select-three" ); ?>><?php _e('Secundary color', 'geoformat');?></option>';
	</select>
	<?php
}

//Field display/fill : gp_settings_field_font_size
function gp_settings_field_font_size_content() {
	$options = get_option( 'gp_options' ); 
	$font_size = $options['font_size'];
	$font_size = ( $font_size == '' ) ? GP_DEFAULT_FONT_SIZE : $font_size;
	?>

	<select name="gp_options[font_size]" id="font_size">
		<option value="select-one" <?php selected($font_size, "select-one" ); ?>><?php _e('Medium', 'geoformat');?></option>';
		<option value="select-two" <?php selected($font_size, "select-two" ); ?>><?php _e('Small', 'geoformat');?></option>';
		<option value="select-three" <?php selected($font_size, "select-three" ); ?>><?php _e('Large', 'geoformat');?></option>';
	</select>
	<?php
}

//Field display/fill : gp_settings_field_font_text
function gp_settings_field_font_text_content() {
	$options = get_option( 'gp_options' );
	$font_text = $options['font_text'];
	$font_text = ( $font_text == '' ) ? GP_DEFAULT_FONT_TEXT : $font_text;
	?>

	<select name="gp_options[font_text]" id="font_text">
		<option value="select-seventeen" <?php selected($font_text, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($font_text, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($font_text, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($font_text, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($font_text, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($font_text, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($font_text, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($font_text, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($font_text, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($font_text, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($font_text, "select-ten"); ?>>Roboto Slab, serif</option>';	
		<option value="select-sixteen" <?php selected($font_text, "select-sixteen"); ?>>Roboto Condensed, sans-serif</option>';
		<option value="select-eleven" <?php selected($font_text, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($font_text, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($font_text, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($font_text, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($font_text, "select-fifteen"); ?>>Coming Soon, cursive</option>';	
		<option value="select-eighteen" <?php selected($font_text, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($font_text, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($font_text, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($font_text, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($font_text, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($font_text, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($font_text, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($font_text, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($font_text, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($font_text, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($font_text, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($font_text, "select-twenty-nine"); ?>>Special Elite, curisve</option>';
		<option value="select-thirty" <?php selected($font_text, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($font_text, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($font_text, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<p>
	<em><?php _e('You can view samples of those different fonts on <a href="https://fonts.google.com/" rel="noopener" target="_blank">fonts.google.com</a>. "Faune" is available <a href="http://www.cnap.graphismeenfrance.fr/faune/" rel="noopener" target="_blank">on this page</a>','geoformat'); ?> </em>
	</p>
	<?php
}
//Field display/fill : gp_settings_field_font_title
function gp_settings_field_font_title_content() {
	$options = get_option( 'gp_options' );
	$font_title = $options['font_title'];
	$font_title = ( $font_title == '' ) ? GP_DEFAULT_FONT_TITLE : $font_title;
	?>

	<select name="gp_options[font_title]" id="font_title">
		<option value="select-seventeen" <?php selected($font_title, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($font_title, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($font_title, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($font_title, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($font_title, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($font_title, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($font_title, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($font_title, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($font_title, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($font_title, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($font_title, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($font_title, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($font_title, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($font_title, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($font_title, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($font_title, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($font_title, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($font_title, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($font_title, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($font_title, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($font_title, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($font_title, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($font_title, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($font_title, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($font_title, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($font_title, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($font_title, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($font_title, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($font_title, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($font_title, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($font_title, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($font_title, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<?php
}
//Field display/fill : gp_settings_field_favicon
function gp_settings_field_favicon_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['favicon']) ) :
		$favicon = $options['favicon']; 
		else: $favicon = "";
	endif;
	?>
	
	<input type="text" class="bdn" name="gp_options[favicon]" id="favicon" value="<?php echo $favicon; ?>" />
	<input type="button" id="upload_image" class="button-secondary upload_image_button" value="<?php _e( 'Select your favicon', 'geoformat'); ?>" />
	<p>
		<em><?php _e('You can convert your favicon to the right format, .ico, with using a free online generator for jpg or png images. <br/> This one is great: <a href="http://realfavicongenerator.net/" target="_blank">realfavicongenerator.net</a>','geoformat'); ?>
		</em>
	</p>
		
		<div class="imgset">
			<img id="favicon-img" class="loaded-image" src="<?php echo $favicon; ?>" />
		</div>
		<?php if(!empty($favicon)) { ?>
			<div id="js-remove">
				<a class="remove_img" href="javascript:;"><?php _e('Remove image','geoformat'); ?></a>
			</div>
	
				<script type="text/javascript">
				var $ =jQuery.noConflict();
				$(document).ready(function() {
						$('.remove_img').click(function() {
							$('#favicon-img').hide();
							$('.remove_img').hide();
							$('#favicon').removeAttr('value');
						});
				});
				</script>
		<?php } 
	}

//Field display/fill : gp_settings_logo_footer
function gp_settings_field_logo_footer_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['logo']) ) :
		$logo = $options['logo']; 
		else: $logo = "";
	endif;
	?>
	
	<input type="text" class="bdn" name="gp_options[logo]" id="logo" value="<?php echo $logo; ?>" />
	<input type="button" id="upload_image2" class="button-secondary upload_image_button" value="<?php _e( 'Select your logo', 'geoformat'); ?>" />

		<div class="imgset">
			<img id="logo-img" class="loaded-image" src="<?php echo $logo; ?>" />
		</div>
		<?php if(!empty($logo)) { ?>
			<div id="js-remove">
				<a class="remove_img2" href="javascript:;"><?php _e('Remove image','geoformat'); ?></a>
			</div>
	
				<script type="text/javascript">
				var $ =jQuery.noConflict();
				$(document).ready(function() {
						$('.remove_img2').click(function() {
							$('#logo-img').hide();
							$('.remove_img2').hide();
							$('#logo').removeAttr('value');
						});
				});
				</script>
		<?php } 
	}
	
//Section Maps header text
function gp_settings_section_maps_text() {
	// Nothing usefull to display for now
}
//Field display/fill : gp_settings_field_map_default_tiles
function gp_settings_field_map_default_tiles_content() {
	$options = get_option( 'gp_options' );
	$map_default_tiles_provider = $options['map_tiles_provider'];
	$map_default_tiles_provider = ( $map_default_tiles_provider == '' ) ? GP_DEFAULT_TILES_PROVIDER : $map_default_tiles_provider;
	?>

	<p>
		<select name="gp_options[map_tiles_provider]" id="map_tiles_provider">
			<option value="osm" <?php selected($map_default_tiles_provider, "osm"); ?>>OpenStreetMap</option>
			<option value="cyclosm" <?php selected($map_default_tiles_provider, "cyclosm"); ?>>CyclOSM</option>
			<option value="esrigrey" <?php selected($map_default_tiles_provider, "esrigrey"); ?>>OpenMapSurfer.Grayscale</option>
			<option value="esristreet" <?php selected($map_default_tiles_provider, "esristreet"); ?>>Esri WorldStreetMap</option>
			<option value="esriworld" <?php selected($map_default_tiles_provider, "esriworld"); ?>>Esri WorldImagery</option>
			<option value="opentopo" <?php selected($map_default_tiles_provider, "opentopo"); ?>> OpenTopoMap</option>
			<option value="osmhot" <?php selected($map_default_tiles_provider, "osmhot"); ?>>OpenStreetMap.HOT</option>
			<option value="hydda" <?php selected($map_default_tiles_provider, "hydda"); ?>>Hydda Full</option>
			<option value="worldimagery" <?php selected($map_default_tiles_provider, "worldimagery"); ?>>Esri.Shaded.Relief</option>
			<option value="delorme" <?php selected($map_default_tiles_provider, "delorme"); ?>>Esri.DeLorme</option>
			<option value="stadia_alida" <?php selected($map_default_tiles_provider, "stadia_alida"); ?>>Stadia Alida</option>
			<option value="stadia_outdoors" <?php selected($map_default_tiles_provider, "stadia_outdoors"); ?>>Stadia Outdoors</option>
			<option value="stadia_osmbright" <?php selected($map_default_tiles_provider, "stadia_osmbright"); ?>>Stadia OSM Bright</option>
			<option value="stadia_dark" <?php selected($map_default_tiles_provider, "stadia_dark"); ?>>Stadia Dark</option>
			<option value="mtmap" <?php selected($map_default_tiles_provider, "mtmap"); ?>>MT Map</option>
			<option value="stamentoner" <?php selected($map_default_tiles_provider, "stamentoner"); ?>>Stamen Toner</option>
			<option value="stamentonerlight" <?php selected($map_default_tiles_provider, "stamentonerlight"); ?>>Stamen Toner Light</option>
			<option value="stamenwater" <?php selected($map_default_tiles_provider, "stamenwater"); ?>>Stamen Watercolor</option>
			<option value="stamenterrain" <?php selected($map_default_tiles_provider, "stamenterrain"); ?>>Stamen Terrain</option>
			<option value="geoportail" <?php selected($map_default_tiles_provider, "geoportail"); ?>>Geoportail FR</option>
			<option value="geoportailimg" <?php selected($map_default_tiles_provider, "geoportailimg"); ?>>Geoportail IMG</option>
			<option value="geoportailorthos" <?php selected($map_default_tiles_provider, "geoportailorthos"); ?>>Geoportail Orthos</option>
			<option value="mapbox" <?php selected($map_default_tiles_provider, "mapbox"); ?>>MapBox*</option>
		</select>
	</p>
	<p>
	<em>
	<?php echo __('*If you wish to chose MapBox, don\'t forget to add your access token below, otherwise it won\'t works', 'geoformat'); ?>
	</em>
	</p>

	<?php
}

//Field display/fill : gp_settings_field_special_map_default_tiles
function gp_settings_field_special_map_default_tiles_content() {
	$options = get_option( 'gp_options' );
	$special_map_tiles_provider = $options['special_map_tiles_provider'];
	$special_map_tiles_provider = ( $special_map_tiles_provider == '' ) ? GP_SPECIAL_TILES_PROVIDER : $special_map_tiles_provider;
	?>

	<p>
		<select name="gp_options[special_map_tiles_provider]" id="special_map_tiles_provider">
			<option value="osm" <?php selected($special_map_tiles_provider, "osm"); ?>>OpenStreetMap</option>
			<option value="cyclosm" <?php selected($special_map_tiles_provider, "cyclosm"); ?>>CyclOSM</option>
			<option value="esrigrey" <?php selected($special_map_tiles_provider, "esrigrey"); ?>>OpenMapSurfer.Grayscale</option>
			<option value="esristreet" <?php selected($special_map_tiles_provider, "esristreet"); ?>>Esri WorldStreetMap</option>
			<option value="esriworld" <?php selected($special_map_tiles_provider, "esriworld"); ?>>Esri WorldImagery</option>
			<option value="opentopo" <?php selected($special_map_tiles_provider, "opentopo"); ?>> OpenTopoMap</option>
			<option value="osmhot" <?php selected($special_map_tiles_provider, "osmhot"); ?>>OpenStreetMap.HOT</option>
			<option value="hydda" <?php selected($special_map_tiles_provider, "hydda"); ?>>Hydda Full</option>
			<option value="worldimagery" <?php selected($special_map_tiles_provider, "worldimagery"); ?>>Esri.Shaded.Relief</option>
			<option value="delorme" <?php selected($special_map_tiles_provider, "delorme"); ?>>Esri.DeLorme</option>
			<option value="stadia_alida" <?php selected($special_map_tiles_provider, "stadia_alida"); ?>>Stadia Alida</option>
			<option value="stadia_outdoors" <?php selected($special_map_tiles_provider, "stadia_outdoors"); ?>>Stadia Outdoors</option>
			<option value="stadia_osmbright" <?php selected($special_map_tiles_provider, "stadia_osmbright"); ?>>Stadia OSM Bright</option>
			<option value="stadia_dark" <?php selected($special_map_tiles_provider, "stadia_dark"); ?>>Stadia Dark</option>
			<option value="mtmap" <?php selected($special_map_tiles_provider, "mtmap"); ?>>MT Map</option>
			<option value="stamentoner" <?php selected($special_map_tiles_provider, "stamentoner"); ?>>Stamen Toner</option>
			<option value="stamentonerlight" <?php selected($special_map_tiles_provider, "stamentonerlight"); ?>>Stamen Toner Light</option>
			<option value="stamenwater" <?php selected($special_map_tiles_provider, "stamenwater"); ?>>Stamen Watercolor</option>
			<option value="stamenterrain" <?php selected($special_map_tiles_provider, "stamenterrain"); ?>>Stamen Terrain</option>
			<option value="geoportail" <?php selected($special_map_tiles_provider, "geoportail"); ?>>Geoportail FR</option>
			<option value="geoportailimg" <?php selected($special_map_tiles_provider, "geoportailimg"); ?>>Geoportail IMG</option>
			<option value="geoportailorthos" <?php selected($special_map_tiles_provider, "geoportailorthos"); ?>>Geoportail Orthos</option>
			<option value="mapbox" <?php selected($special_map_tiles_provider, "mapbox"); ?>>MapBox*</option>
		</select>
	</p>
	<p>
	<em>
	<?php echo __('*If you wish to chose MapBox, don\'t forget to add your access token below, otherwise it won\'t works', 'geoformat'); ?>
	</em>
	</p>

	<?php
}

//Field display/fill : gp_settings_field_maps_default_center_zoom
function gp_settings_field_maps_default_center_zoom_content() {
	$options = get_option( 'gp_options' );	
	if ( empty ( $options['center_lat'] ) ) : 
        $lat = GP_DEFAULT_MAP_CENTER_LAT;
    else : 
		$lat = $options['center_lat']; 
	endif;
	if ( empty ( $options['center_lng'] ) ) : 
        $lng = GP_DEFAULT_MAP_CENTER_LNG;
    else : 
		$lng = $options['center_lng']; 
	endif;
	if ( empty ( $options['map_tiles_provider'] ) ) : 
        $map_tiles_provider = GP_DEFAULT_TILES_PROVIDER;
    else : 
		$map_tiles_provider =  $options['map_tiles_provider'];
	endif;
	if ( empty ( $options['zoom'] ) ) :
        $zoom = GP_DEFAULT_MAP_ZOOM;
    else : 
		$zoom = $options['zoom'];
	endif;
	?>

	<input type="hidden" id="gp-settings-map-lat" class="regular-text" name="gp_options[center_lat]" value="<?php echo $lat; ?>">
	<input type="hidden" id="gp-settings-map-lng" class="regular-text" name="gp_options[center_lng]" value="<?php echo $lng; ?>">
	<input type="hidden" id="gp-settings-map-zoom" class="regular-text" name="gp_options[zoom]" value="<?php echo $zoom; ?>">
	<p class="description"><?php _e( 'Déplacez le curseur à la position souhaitée, aidez-vous du zoom pour vous déplacer dans la carte. Si la carte ne se charge pas complètement, merci de redimensionner manuellement la fenêtre de votre navigateur.', 'geoformat' ); ?></p>
	<p class="description"><?php _e( 'This is the default center and zoom when creating a marker or when a map has no markers.', 'geoformat' ); ?></p>

	<div class="gp-leaflet-map-container">
        <div class="gp-leaflet-map-wrap">
            <div id="settings-map" class="gp-leaflet-map"
                data-map-tiles= "<?php echo $map_tiles_provider; ?>"
				data-map-center-lat="<?php echo $lat; ?>"
                data-map-center-lng="<?php echo $lng; ?>"
                data-map-zoom="<?php echo $zoom; ?>"
                data-map-lat-field="gp-settings-map-lat"
                data-map-lng-field="gp-settings-map-lng"
                data-map-zoom-field="gp-settings-map-zoom"></div>
        </div>
    </div>

	<?php
}

//Field display/fill : gp_settings_field_maps_export
function gp_settings_field_maps_export_content() {
	$options = get_option( 'gp_options' );
	$export_maps = $options['export_maps'];
	?>

	<label for="gp-settings-maps-export">
		<input type="checkbox" id="gp-settings-maps-export" name="gp_options[export_maps]" value="<?php echo GP_DEFAULT_EXPORT_MAPS; ?>" <?php if ( $export_maps == GP_DEFAULT_EXPORT_MAPS ) { echo 'checked="checked"'; } ?>>
		<?php _e( 'Maps are shareable by default', 'geoformat' ); ?>
	</label>

	<p class="description"><?php _e( 'If you change this setting, it will only be applied to new maps. You can change this setting in each map\'s form.', 'geoformat' ); ?></p>

	<?php
}

//Section Social settings header text
function gp_settings_section_social_settings_text() {
	// Nothing usefull to display for now
}

//Field display/fill : gp_settings_field_url_twitter
function gp_settings_field_url_twitter_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['url_twitter']) ) :
		$url_twitter = $options['url_twitter']; 
		else : $url_twitter = "";
	endif;
	?>
	
	<input type="text" class="bdn" name="gp_options[url_twitter]" value="<?php echo $url_twitter; ?>">

	<?php
}

/**
 * Field display/fill : gp_settings_field_mapbox_token
 */
function gp_settings_field_mapbox_token_content() {
	$options = get_option( 'gp_options' );
	
	if (!empty ($options['mapbox_token']) ) :
		$mapbox_token = $options['mapbox_token']; 
		else : $mapbox_token = "";
	endif;

	?>

	<input type="text" class="regular-text" name="gp_options[mapbox_token]" value="<?php echo $mapbox_token; ?>">
	
	<?php
}

/**
 * Field display/fill : gp_settings_field_mapbox_style
 */
function gp_settings_field_mapbox_style_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['mapbox_style']) ) :
		$mapbox_style = $options['mapbox_style']; 
		else : $mapbox_style = "";
	endif;
	?>

	<input type="text" class="regular-text" name="gp_options[mapbox_style]" value="<?php echo $mapbox_style; ?>">
	<p class="description"><?php _e( '*If you want to use MapBox as a tiles provider, you need to login <a href="http://mapbox.com" target="_blank">Mapbox</a> and retrieve your access key and style (style is not mandatoy, the default map will be used). <br/> Ex.: volvac/ck9ypkmf22lwi1ippsq6aec9z', 'geoformat' ); ?></p>

	<?php
}

//Field display/fill : gp_settings_field_url_facebook
function gp_settings_field_url_facebook_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['url_facebook']) ) :
		$url_facebook = $options['url_facebook']; 
		else : $url_facebook = "";
	endif;
	?>

	<input type="text" class="bdn" name="gp_options[url_facebook]" value="<?php echo $url_facebook; ?>">

	<?php
}

//Field display/fill : gp_settings_field_url_youtube
function gp_settings_field_url_youtube_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['url_youtube']) ) :
		$url_youtube = $options['url_youtube']; 
		else : $url_youtube = "";
	endif;
	?>

	<input type="text" class="bdn" name="gp_options[url_youtube]" value="<?php echo $url_youtube; ?>">

	<?php
}

function gp_settings_field_url_instagram_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['url_instagram']) ) :
		$url_instagram = $options['url_instagram']; 
		else : $url_instagram = "";
	endif;
	?>

	<input type="text" class="bdn" name="gp_options[url_instagram]" value="<?php echo $url_instagram; ?>">

	<?php
}

function gp_settings_field_url_soundcloud_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['url_soundcloud']) ) :
		$url_soundcloud = $options['url_soundcloud']; 
		else : $url_soundcloud = "";
	endif;
	?>

	<input type="text" class="bdn" name="gp_options[url_soundcloud]" value="<?php echo $url_soundcloud; ?>">

	<?php
}

function gp_settings_field_url_medium_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['url_medium']) ) :
		$url_medium = $options['url_medium']; 
		else : $url_medium = "";
	endif;
	?>

	<input type="text" class="bdn" name="gp_options[url_medium]" value="<?php echo $url_medium; ?>">

	<?php
}

//Field display/fill : gp_settings_field_twitter_id
function gp_settings_field_twitter_id_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['twitter_id']) ) :
		$twitter_id = $options['twitter_id']; 
		else : $twitter_id = "";
	endif; 
	?>
		
		<input type="text" class="bdn" name="gp_options[twitter_id]" id="twitter_id" value="<?php echo $twitter_id; ?>" />
	<?php
}

//Default image
//Field display/fill : gp_settings_field_default_image
function gp_settings_section_default_settings_content() {
	$options = get_option( 'gp_options' );
	
		if (empty ($options['default'])) : 
			$default = ''; 
		else : 
			$default = $options['default'];
		endif;
		$options = get_option( 'gp_options' );
		
	?>
	
	<input type="text" class="bdn" name="gp_options[default]" id="default2" value="<?php echo $default; ?>" />
	<input type="button" id="upload_image" class="button-secondary upload_image_button" value="<?php _e( 'Select your default image', 'geoformat'); ?>" />

		
		<div class="imgset">
			<img id="default-img2" class="loaded-image2" src="<?php echo $default; ?>" />
		</div>
		
		<?php if(!empty($default)) : ?>
			<div id="js-remove2">
				<a class="remove_img2" href="javascript:;"><?php _e('Remove image','geoformat'); ?></a>
			</div>
	
				<script type="text/javascript">
				var $ =jQuery.noConflict();
				$(document).ready(function() {
						$('.remove_img2').click(function() {
							$('#default-img2').hide();
							$('.remove_img2').hide();
							$('#default2').removeAttr('value');
						});
				});
				</script>
		<?php else: endif; 
	}
	
//Twitter Card: gp_settings_section_card_settings
function gp_settings_section_card_settings_content() { 
	$options = get_option( 'gp_options' );	
?>
	<select name='gp_options[card]'>
		<option value='1' <?php selected( $options['card'], 1 ); ?>>Summary</option>
		<option value='2' <?php selected( $options['card'], 2 ); ?>>Summary large image</option>
	</select>
	<p>
		<em>
			<?php _e('Type of presentation: abstract (small image) or abstract with a large image.', 'geoformat'); ?> 
		</em>
	</p>
<?php }

//Field display/fill : gp_settings_field_share
function gp_settings_field_share_content() {
	$options = get_option( 'gp_options' );
	
	if (!empty ($options['rss_share']) ) :
		$rss = $options['rss_share']; 
		else : $rss = "";
	endif;
	if (!empty ($options['email_share']) ) :
		$email = $options['email_share']; 
		else : $email = "";
	endif;
	if (!empty ($options['twitter_share']) ) :
		$twitter = $options['twitter_share']; 
		else: $twitter = "";
	endif;
	if (!empty ($options['facebook_share']) ) :
		$facebook = $options['facebook_share']; 
		else: $facebook = "";
	endif;
	if (!empty ($options['linkedin_share']) ) :
		$linkedin = $options['linkedin_share'];
		else: $linkedin = "";
	endif;
	if (!empty ($options['pinterest_share']) ) :
		$pinterest = $options['pinterest_share'];
		else: $pinterest = "";
	endif;
	if (!empty ($options['whatsapp_share']) ) :
		$whatsapp = $options['whatsapp_share']; 
		else: $whatsapp = "";
	endif;
	?>
	
	<p>
		<input type="checkbox" name="gp_options[rss_share]" id="rss" value="<?php echo GP_DEFAULT_RSS_SHARE; ?>" <?php if ( $rss == GP_DEFAULT_RSS_SHARE ) { echo 'checked="checked"'; } ?>>
		<?php _e('RSS', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="gp_options[email_share]" id="email" value="<?php echo GP_DEFAULT_EMAIL_SHARE; ?>" <?php if ( $email == GP_DEFAULT_EMAIL_SHARE ) { echo 'checked="checked"'; } ?>>
		<?php _e('E-mail', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="gp_options[twitter_share]" id="twitter" value="<?php echo GP_DEFAULT_TWITTER_SHARE; ?>" <?php if ( $twitter == GP_DEFAULT_TWITTER_SHARE ) { echo 'checked="checked"'; } ?>>
		<?php _e('Twitter', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="gp_options[facebook_share]" id="facebook" value="<?php echo GP_DEFAULT_FACEBOOK_SHARE; ?>" <?php if ( $facebook == GP_DEFAULT_FACEBOOK_SHARE ) { echo 'checked="checked"'; } ?>>
		<?php _e('Facebook', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="gp_options[linkedin_share]" id="linkedin" value="<?php echo GP_DEFAULT_LINKEDIN_SHARE; ?>" <?php if ( $linkedin == GP_DEFAULT_LINKEDIN_SHARE ) { echo 'checked="checked"'; } ?>>
		<?php _e('LinkedIn', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="gp_options[pinterest_share]" id="pinterest" value="<?php echo GP_DEFAULT_PINTEREST_SHARE; ?>" <?php if ( $pinterest == GP_DEFAULT_PINTEREST_SHARE ) { echo 'checked="checked"'; } ?>>
		<?php _e('Pinterest', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="gp_options[whatsapp_share]" id="whatsapp" value="<?php echo GP_DEFAULT_WHATSAPP_SHARE; ?>" <?php if ( $whatsapp == GP_DEFAULT_WHATSAPP_SHARE ) { echo 'checked="checked"'; } ?>>
		<?php _e('WhatsApp', 'geoformat'); ?>
	</p>		
	<?php
}

//Field display/fill : gp_settings_field_google_analytics
function gp_settings_section_analytics_settings_text() {
	// Nothing usefull to display for now
}

function gp_settings_field_google_analytics_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['google_analytics']) ) :
		$google_analytics = $options['google_analytics']; 
		else: $google_analytics = "";
	endif; ?>
	
	<textarea cols='40' rows='5' class="bdn" name="gp_options[google_analytics]" id="google_analytics"/><?php echo $google_analytics; ?></textarea>
	
	<p> 
		<em> 
			<?php _e('Add your Google Analytics code ( <\script>...<\/script> )','geoformat'); ?>
		</em>
	<p>
	<?php
}

//HTML Metadata: gp_settings_field_description / gp_settings_field_keywords
	
function gp_settings_field_description_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['description']) ) :
		$description = $options['description']; 
		else: $description = "";
	endif; ?>
	
	<textarea cols='40' rows='5' class="bdn" name="gp_options[description]" id="description"/><?php echo $description; ?></textarea>
	
	<p> 
		<em> 
			<?php _e('The description must be no longer than 200 characters','geoformat'); ?>
		</em>
	<p>
	<?php
}

function gp_settings_field_keywords_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['keywords']) ) :
		$keywords = $options['keywords']; 
		else: $keywords = "";
	endif; ?>
	
	<textarea cols='40' rows='5' class="bdn" name="gp_options[keywords]" id="keywords"/><?php echo $keywords; ?></textarea>
	
	<p> 
		<em> 
			<?php _e('Maximum: 20 keywords','geoformat'); ?>
		</em>
	<p>
	<?php
}

function gp_settings_field_custom_text_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['custom_text']) ) :
		$custom_text = $options['custom_text']; 
		else: $custom_text = "";
	endif; ?>
	
	<textarea cols='40' rows='5' class="bdn" name="gp_options[custom_text]" id="custom_text"/><?php echo $custom_text; ?></textarea>
	
	<p> 
		<em> 
			<?php _e('Short text at the bottom of the page','geoformat'); ?>
		</em>
	<p>
	<?php
}

//Field display/fill : gp_settings_mentions
function gp_settings_field_mentions_content() {
	$options = get_option( 'gp_options' );
	
	if (!empty ($options['blog_title']) ) :
		$blog_title = $options['blog_title']; 
		else : $blog_title = "";
	endif;
	if (!empty ($options['copyright']) ) :
		$copyright = $options['copyright']; 
		else: $copyright = "";
	endif;
	if (!empty ($options['year']) ) :
		$year = $options['year']; 
		else: $year = "";
	endif;
	?>
	
	<p>
		<input type="checkbox" class="bdn" name="gp_options[blog_title]" id="blog_title" value="<?php echo GP_DEFAULT_BLOG_TITLE; ?>" <?php if ( $blog_title == GP_DEFAULT_BLOG_TITLE ) { echo 'checked="checked"'; } ?>>
		<?php _e('E-mail', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" class="bdn" name="gp_options[copyright]" id="copyright" value="<?php echo GP_DEFAULT_COPYRIGHT; ?>" <?php if ( $copyright == GP_DEFAULT_COPYRIGHT ) { echo 'checked="checked"'; } ?>>
		<?php _e('Copyright', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" class="bdn" name="gp_options[year]" id="year" value="<?php echo GP_DEFAULT_YEAR; ?>" <?php if ( $year == GP_DEFAULT_YEAR ) { echo 'checked="checked"'; } ?>>
		<?php _e('Year', 'geoformat'); ?>
	</p>
	<?php
}

//Section General settings header text
function gp_settings_section_other_settings_text() {
	// Nothing usefull to display for now
}

//Field display/fill : gp_settings_field_cnbmap_key
function gp_settings_field_front_nb_maps_content() {
	$options = get_option( 'gp_options' );
	if (!empty ($options['front_nb_maps']) ) :
		$front_nb_maps = $options['front_nb_maps']; 
		else: $front_nb_maps = "";
	endif;
	
	?>

	<input type="text" class="small-text" name="gp_options[front_nb_maps]" value="<?php echo $front_nb_maps; ?>">
	<?php
}

//Field display/fill : gp_settings_field_project_trash_keep_contents

function gp_settings_field_project_trash_keep_contents_content() {
	$options = get_option( 'gp_options' );
	$project_trash_keep_contents = $options['project_trash_keep_contents'];
	?>

	<p>
		<label title="Keep contents">
			<input type="radio" name="gp_options[project_trash_keep_contents]" value="1" <?php echo ( $project_trash_keep_contents == 1 ) ? 'checked="checked"' : ''; ?>>
			<?php _e( 'Keep maps and posts (they won\'t belong to any project until you edit them)', 'geoformat' ); ?>
		</label>
	</p>

	<p>
		<label title="Trash contents">
			<input type="radio" name="gp_options[project_trash_keep_contents]" value="0" <?php echo ( $project_trash_keep_contents == 0 ) ? 'checked="checked"' : ''; ?>>
			<?php _e( 'Send maps, markers and posts to trash', 'geoformat' ); ?>
		</label>
	</p>

	<p class="description"><?php _e( 'Note that if you choose to send contents to trash, and want to restore them : the maps and posts won\'t belong to any project, and the markers won\'t belong to any map.', 'geoformat' ); ?></p>

	<?php
}

//Field display/fill : gp_settings_field_map_trash_keep_markers
function gp_settings_field_map_trash_keep_markers_content() {
	$options = get_option( 'gp_options' );
	$special_map_trash_keep_markers = $options['map_trash_keep_markers'];
	?>

	<p>
		<label title="Keep markers">
			<input type="radio" name="gp_options[map_trash_keep_markers]" value="1" <?php echo ( $special_map_trash_keep_markers == 1 ) ? 'checked="checked"' : ''; ?>>
			<?php _e( 'Keep markers (they won\'t belong to any map until you edit them)', 'geoformat' ); ?>
		</label>
	</p>

	<p>
		<label title="Trash markers">
			<input type="radio" name="gp_options[map_trash_keep_markers]" value="0" <?php echo ( $special_map_trash_keep_markers == 0 ) ? 'checked="checked"' : ''; ?>>
			<?php _e( 'Send map\'s markers to trash', 'geoformat' ); ?>
		</label>
	</p>

	<p class="description"><?php _e( 'Note that if you choose to send markers to trash, they won\'t belong to any map if you restore them.', 'geoformat' ); ?></p>

	<?php
}






//Field display : gp_settings_bigmap
function gp_settings_field_bigmap_content() {
	$options = get_option( 'gp_options' );
	
	if (!empty ($options['bigmap_on_hp']) ) :
		$bigmap_on_hp = $options['bigmap_on_hp']; 
		else : $bigmap_on_hp = "";
	endif;
	?>
	
	<p>

		<input type="checkbox" class="bdn"  name="gp_options[bigmap_on_hp]" id="bigmap_on_hp" value="<?php echo GP_DEFAULT_BIGMAP_ON_HP; ?>" <?php if ( $bigmap_on_hp == GP_DEFAULT_BIGMAP_ON_HP ) { echo 'checked="checked"'; } ?>>
		<?php _e('Display Big Map on the Website\'s Homepage', 'geoformat'); ?>
	</p>

	<?php
}






// Nothing usefull to display for now but do not delete as it is required.
function gp_settings_section_metadata_settings_text() {
}
function gp_settings_section_socials_settings_text() {
}
function  gp_settings_section_geoformat_text() {
}
function  gp_settings_section_card_settings_text() {
}
function  gp_settings_section_footer_text() {
}
function  gp_settings_section_homepage_text() {
}
//Validate User inputs
//@param  array $user_input  Input data submitted by the user ($_POST)
//@return array Sanitized user input data

function gp_validate_options( $user_input ) {

	$gp_options = get_option( 'gp_options' );
	$valid = array();


	//DESIGN DEFAULT
	
	$valid['background_color'] = $user_input['background_color'];
	if ( $valid['background_color'] == '' ) {
		$valid['background_color'] = GP_DEFAULT_BACKGROUND_COLOR;
	}
	
	$valid['icon_color'] = $user_input['icon_color'];
	if ( $valid['icon_color'] == '' ) {
		$valid['icon_color'] = GP_DEFAULT_ICON_COLOR;
	}

	$valid['text_color'] = $user_input['text_color'];
	if ( $valid['text_color'] == '' ) {
		$valid['text_color'] = GP_DEFAULT_TEXT_COLOR;
	}
	
	$valid['secundary_color'] = $user_input['secundary_color'];
	if ( $valid['secundary_color'] == '' ) {
		$valid['secundary_color'] = GP_DEFAULT_SECUNDARY_COLOR;
	}
	
	$valid['primary_color'] = $user_input['primary_color'];
	if ( $valid['primary_color'] == '' ) {
		$valid['primary_color'] = GP_DEFAULT_PRIMARY_COLOR;
	}

	$valid['background_menu'] = $user_input['background_menu'];
	if ( $valid['background_menu'] == '' ) {
		$valid['background_menu'] = GP_DEFAULT_BACKGROUND_MENU;
	}
	
	$valid['link_menu'] = $user_input['link_menu'];
	if ( $valid['link_menu'] == '' ) {
		$valid['link_menu'] = GP_DEFAULT_LINK_MENU;
	}
	
	
	$valid['footer_style'] = $user_input['footer_style'];
	if ( $valid['footer_style'] == '' ) {
		$valid['footer_style'] = GP_DEFAULT_FOOTER_STYLE;
	}
	
	$valid['bottom_color'] = $user_input['bottom_color'];
	if ( $valid['bottom_color'] == '' ) {
		$valid['bottom_color'] = GP_DEFAULT_BOTTOM_COLOR;
	}
	
	$valid['burger_color'] = $user_input['burger_color'];
	if ( $valid['burger_color'] == '' ) {
		$valid['burger_color'] = GP_DEFAULT_BURGER_COLOR;
	}
	
	$valid['exergues'] = $user_input['exergues'];
	if ( $valid['exergues'] == '' ) {
		$valid['exergues'] = GP_DEFAULT_EXERGUES;
	}

	$valid['title_color'] = $user_input['title_color'];
	if ( $valid['title_color'] == '' ) {
		$valid['title_color'] = GP_DEFAULT_TITLE_COLOR;
	}

	$valid['subtitle_color'] = $user_input['subtitle_color'];
	if ( $valid['subtitle_color'] == '' ) {
		$valid['subtitle_color'] = GP_DEFAULT_SUBTITLE_COLOR;
	}
	
	$valid['footer_link_color'] = $user_input['footer_link_color'];
	if ( $valid['footer_link_color'] == '' ) {
		$valid['footer_link_color'] = GP_DEFAULT_FOOTER_LINK_COLOR;
	}
	

	$valid['font_text'] = $user_input['font_text'];
	
	// if empty, set to default
	if ( $valid['font_text'] == '' ) {
		$valid['font_text'] = GP_DEFAULT_FONT_TEXT;
	}
	
	$valid['font_title'] = $user_input['font_title'];
	if ( $valid['font_title'] == '' ) {
		$valid['font_title'] = GP_DEFAULT_FONT_TITLE;
	}
	
	$valid['favicon'] = $user_input['favicon'];
	if ( $valid['favicon'] == '' ) {
		$valid['favicon'] = GP_DEFAULT_FAVICON;
	}
	
	$valid['logo'] = $user_input['logo'];
	
	
	$valid['social_color'] = $user_input['social_color'];
	if ( $valid['social_color'] == '' ) {
		$valid['social_color'] = GP_DEFAULT_SOCIAL_COLOR;
	}
	$valid['font_size'] = $user_input['font_size'];
	if ( $valid['font_size'] == '' ) {
		$valid['font_size'] = GP_DEFAULT_FONT_SIZE;
	}

//Maps
	
	//Maps default tiles provider
	$valid['map_tiles_provider'] = $user_input['map_tiles_provider'];

	if ( $valid['map_tiles_provider'] == '' ) {
		$valid['map_tiles_provider'] = GP_DEFAULT_TILES_PROVIDER;
	}

	//Special map default tiles provider
	$valid['special_map_tiles_provider'] = $user_input['special_map_tiles_provider'];

	if ( $valid['special_map_tiles_provider'] == '' ) {
		$valid['special_map_tiles_provider'] = GP_SPECIAL_TILES_PROVIDER;
	}

	//Map Position and Zoom
	$valid['center_lat'] = ( $user_input['center_lat'] != '' ) ? $user_input['center_lat'] : GP_DEFAULT_MAP_CENTER_LAT;
	$valid['center_lng'] = ( $user_input['center_lng'] != '' ) ? $user_input['center_lng'] : GP_DEFAULT_MAP_CENTER_LNG;
	$valid['zoom'] = ( $user_input['zoom'] != '' ) ? $user_input['zoom'] : GP_DEFAULT_MAP_ZOOM;


	//Export Maps
	$valid['export_maps'] = ( $user_input['export_maps'] == GP_DEFAULT_EXPORT_MAPS ) ? GP_DEFAULT_EXPORT_MAPS : 0;

//Social
	
	$valid['url_twitter'] = $user_input['url_twitter'];
	$valid['url_facebook'] = $user_input['url_facebook'];
	$valid['url_youtube'] = $user_input['url_youtube'];
	$valid['url_instagram'] = $user_input['url_instagram'];
	$valid['url_soundcloud'] = $user_input['url_soundcloud'];
	$valid['url_medium'] = $user_input['url_medium'];
	$valid['twitter_id'] = $user_input['twitter_id'];
	$valid['default'] = $user_input['default'];
	$valid['card'] = $user_input['card'];
	$valid['description'] = $user_input['description'];
	$valid['keywords'] = $user_input['keywords'];
	$valid['custom_text'] = $user_input['custom_text'];
	$valid['blog_title'] = $user_input['blog_title'];
	$valid['copyright'] = $user_input['copyright'];
	$valid['year'] = $user_input['year'];
	
	$valid['rss_share'] = $user_input['rss_share'];
	if ( $valid['rss_share'] != 0 ) {
		$valid['rss_share'] = GP_DEFAULT_RSS_SHARE;
	}
	
	$valid['email_share'] = $user_input['email_share'];
	if ( $valid['email_share'] != 0 ) {
		$valid['email_share'] = GP_DEFAULT_EMAIL_SHARE;
	}
	
	$valid['twitter_share'] = $user_input['twitter_share'];

	if ( $valid['twitter_share'] != 0 ) {
		$valid['twitter_share'] = GP_DEFAULT_TWITTER_SHARE;
	}
	
	$valid['facebook_share'] = $user_input['facebook_share'];
	
	if ( $valid['facebook_share'] != 0 ) {
		$valid['facebook_share'] = GP_DEFAULT_FACEBOOK_SHARE;
	}
	
	$valid['linkedin_share'] = $user_input['linkedin_share'];
	
	if ( $valid['linkedin_share'] != 0 ) {
		$valid['linkedin_share'] = GP_DEFAULT_LINKEDIN_SHARE;
	}
	
	$valid['pinterest_share'] = $user_input['pinterest_share'];
	
	if ( $valid['pinterest_share'] != 0 ) {
		$valid['pinterest_share'] = GP_DEFAULT_PINTEREST_SHARE;
	}
	
	$valid['whatsapp_share'] = $user_input['whatsapp_share'];
	
	if ( $valid['whatsapp_share'] != 0 ) {
		$valid['whatsapp_share'] = GP_DEFAULT_WHATSAPP_SHARE;
	}
	
	$valid['google_analytics'] = $user_input['google_analytics'];
	
	$valid['nextp'] = $user_input['nextp'];
	
	if ( $valid['nextp'] != 0 ) {
		$valid['nextp'] = GP_DEFAULT_NEXTP;
	}
	
	$valid['soundcite'] = $user_input['soundcite'];
	
	if ( $valid['soundcite'] != 0 ) {
		$valid['soundcite'] = GP_DEFAULT_SOUNDCITE;
	}


//General

	//Display Big Map on frontpage
	$valid['bigmap_on_hp'] = $user_input['bigmap_on_hp'];


	//Number of maps on front page

	$valid['front_nb_maps'] = $user_input['front_nb_maps'];

	if ( $valid['front_nb_maps'] != '' && preg_match( '/[^0-9]+/', $valid['front_nb_maps'] ) ) {
		// Register error
		add_settings_error( 'front_nb_maps', 'front_nb_maps_error',
			  __( 'The number of maps on front must be an integer. It has been reset to the default value.', 'geoformat' ),
			  'error'
		);
		// Set the field value to default one
		$valid['front_nb_maps'] = GP_DEFAULT_FRONT_NB_MAPS;
	}

	// if empty, set to default
	if ( $valid['front_nb_maps'] == '' || $valid['front_nb_maps'] == 0 ) {
		$valid['front_nb_maps'] = GP_DEFAULT_FRONT_NB_MAPS;
	}

	//When trashning a project
	$valid['project_trash_keep_contents'] = $user_input['project_trash_keep_contents'];

	if ( $valid['project_trash_keep_contents'] != 0 ) {
		$valid['project_trash_keep_contents'] = GP_DEFAULT_PROJECT_TRASH_KEEP_CONTENTS;
	}

	//When trashning a map
	$valid['map_trash_keep_markers'] = $user_input['map_trash_keep_markers'];

	if ( $valid['map_trash_keep_markers'] != 0 ) {
		$valid['map_trash_keep_markers'] = GP_DEFAULT_MAP_TRASH_KEEP_MARKERS;
	}
	
	$valid['mapbox_token'] = $user_input['mapbox_token'];
	$valid['mapbox_style'] = $user_input['mapbox_style'];

	return $valid;
}
?>