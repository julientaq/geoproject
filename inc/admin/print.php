<?php

// Prevent access to this file directly
if ( !defined( 'ABSPATH' ) ) {
	die( __( 'You should not access to this file directly', 'geoformat' ) );
}

add_action( 'admin_menu', 'print_add_admin_menu' );
add_action( 'admin_init', 'print_global_fields' );

add_action( 'admin_menu', 'print_add_admin_menu' );

function print_add_admin_menu(){
	$page_title = __('Print', 'geoformat'); 
	$menu_title = __('Print', 'geoformat'); 
	$capability = 'manage_options'; 
	$menu_slug= 'print-settings'; 
	$function = 'print_options_page';
	$icon_url = 'dashicons-editor-rtl'; 
	$position = 36;
	 add_menu_page( 
		 $page_title,
		 $menu_title,
		 $capability,
		 $menu_slug,
		 $function,
		 $icon_url,
		 $position 
	 ); 
} 

//Fields

function print_global_fields() { 

	register_setting( 'print_global_options', 'print_settings' );

	add_settings_section( 'print_global_each_section', __( 'Default printing', 'geoformat' ), 'print_settings_call', 'print_global_options' );
	add_settings_field( 'print_default', __( 'Enable custom printing', 'geoformat' ), 'print_default_function', 'print_global_options', 'print_global_each_section' );
	add_settings_field( 'print_pdf', __( 'Add print button to pages', 'geoformat' ), 'print_pdf_function', 'print_global_options', 'print_global_each_section' );
	add_settings_field( 'print_preview', __( 'Add preview button to pages', 'geoformat' ), 'print_preview_function', 'print_global_options', 'print_global_each_section' );
	add_settings_field( 'print_js', __( 'Activate Paged.js ', 'geoformat'), 'print_printedjs_function', 'print_global_options', 'print_global_each_section' );
	
	add_settings_section( 'print_global_each_section', __( 'Customize the header', 'geoformat' ), 'print_settings_call7', 'print_global_options7' );	
	add_settings_field( 'print_table_site_header', __( 'Common settings', 'geoformat' ), 'print_table_site_header_function', 'print_global_options7', 'print_global_each_section' );
	add_settings_field( 'print_header_css', __( 'Custom CSS', 'geoformat' ), 'print_header_css_function', 'print_global_options7', 'print_global_each_section' );
		
	add_settings_section( 'print_global_each_section', __( 'Set up the cover page', 'geoformat' ), 'print_settings_call4', 'print_global_options4' );
	add_settings_field( 'print_cover_size', __( 'Print format', 'geoformat' ), 'print_cover_size_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_custom_size_activate', __( 'Activate custom print format', 'geoformat' ), 'print_custom_size_activate_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_crop_marks', __( 'Show crop marks', 'geoformat' ), 'print_crop_marks_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_margins', __( 'Margins', 'geoformat' ), 'print_margins_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_content_content_width', __( 'Content width', 'geoformat' ), 'print_content_width_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_content_vertical_align', __( 'Content vertical alignment', 'geoformat' ), 'print_content_vertical_align_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_color_background', __( 'Background color', 'geoformat' ), 'print_color_background_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_image_background', __( 'Background image', 'geoformat' ), 'print_image_background_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_title', __( 'Font family (title)', 'geoformat' ), 'print_title_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_title_size', __( 'Title font size', 'geoformat' ), 'print_title_font_size_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_color_title', __( 'Title color', 'geoformat' ), 'print_color_title_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_title_options', __( 'Attributes of the title', 'geoformat' ), 'print_title_options_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_no_subtitle', __( 'Do not display the subtitle', 'geoformat' ), 'print_no_subtitle_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_subtitle', __( 'Font family (subtitle)', 'geoformat' ), 'print_subtitle_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_subtitle_size', __( 'Subitle font size', 'geoformat' ), 'print_subtitle_font_size_function', 'print_global_options4', 'print_global_each_section' ); 
	add_settings_field( 'print_color_subtitle', __( 'Subitle color', 'geoformat' ), 'print_color_subtitle_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_subtitle_options', __( 'Attributes of the subtitle', 'geoformat' ), 'print_subtitle_options_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_text', __( 'Additionnal text (optional)', 'geoformat' ), 'print_text_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_font_text', __( 'Font family (additionnal text)', 'geoformat' ), 'print_font_text_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_text_size', __( 'Text font size', 'geoformat' ), 'print_text_size_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_color_text', __( 'Text color', 'geoformat' ), 'print_color_text_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_text_options', __( 'Text attributes', 'geoformat' ), 'print_text_options_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_text_position', __( 'Text position', 'geoformat' ), 'print_text_position_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_image', __( 'Add an image (optional)', 'geoformat' ), 'print_image_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_image_size', __( 'Image width', 'geoformat' ), 'print_image_size_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_image_options', __( 'Image options', 'geoformat' ), 'print_image_options_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_image_position', __( 'Image position', 'geoformat' ), 'print_image_position_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_border', __( 'Frame border', 'geoformat' ), 'print_border_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_border_style', __( 'Border style', 'geoformat' ), 'print_border_style_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_border_width', __( 'Border width', 'geoformat' ), 'print_border_width_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_border_color', __( 'Border color', 'geoformat' ), 'print_border_color_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_border_padding', __( 'Border padding', 'geoformat' ), 'print_border_padding_function', 'print_global_options4', 'print_global_each_section' );
	add_settings_field( 'print_cover_css', __( 'Custom CSS', 'geoformat' ), 'print_cover_css_function', 'print_global_options4', 'print_global_each_section' );

	add_settings_section( 'print_global_each_section', __( 'Customize the table of contents', 'geoformat' ), 'print_settings_call5', 'print_global_options5' );	
	add_settings_field( 'print_table_size', __( 'Print format', 'geoformat' ), 'print_table_size_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_custom_size_activate', __( 'Activate custom print format', 'geoformat' ), 'print_table_custom_size_activate_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_crop_marks', __( 'Show crop marks', 'geoformat' ), 'print_table_crop_marks_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_margins', __( 'Margins', 'geoformat' ), 'print_table_margins_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_recto', __( 'Recto verso printing', 'geoformat' ), 'print_table_recto_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_break', __( 'Page break before chapter title', 'geoformat' ), 'print_table_break_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_content_width', __( 'Content width', 'geoformat' ), 'print_table_content_width_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_content_column', __( 'Content columns', 'geoformat' ), 'print_table_content_column_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_color_background', __( 'Background color', 'geoformat' ), 'print_table_color_background_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_title_page', __( 'Page title', 'geoformat' ), 'print_table_title_page_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_title', __( 'Font family (title)', 'geoformat' ), 'print_table_title_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_title_size', __( 'Title font size', 'geoformat' ), 'print_table_title_font_size_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_color_title', __( 'Title color', 'geoformat' ), 'print_table_color_title_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_title_options', __( 'Attributes of the title', 'geoformat' ), 'print_table_title_options_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_subtitle', __( 'Font family (all subtitles)', 'geoformat' ), 'print_table_subtitle_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_subtitle_size', __( 'Subtitles font size', 'geoformat' ), 'print_table_subtitle_font_size_function', 'print_global_options5', 'print_global_each_section' ); 
	add_settings_field( 'print_table_color_subtitle', __( 'Subtitles color', 'geoformat' ), 'print_table_color_subtitle_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_subtitle_options', __( 'Attributes of the subtitles', 'geoformat' ), 'print_table_subtitle_options_function', 'print_global_options5', 'print_global_each_section' );	
	add_settings_field( 'print_table_font_text', __( 'Font family (posts list)', 'geoformat' ), 'print_table_font_text_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_text_size', __( 'List font size', 'geoformat' ), 'print_table_text_size_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_color_text', __( 'List color', 'geoformat' ), 'print_table_color_text_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_text_options', __( 'List attributes', 'geoformat' ), 'print_table_text_options_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'project_list', __( 'Projects list', 'geoformat' ), 'print_project_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'map_list', __( 'Maps list', 'geoformat' ), 'print_map_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'cape_list', __( 'Capes list', 'geoformat' ), 'print_cap_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'marker_list', __( 'Markers list', 'geoformat' ), 'print_marker_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'gf_list', __( 'Geoformats list', 'geoformat' ), 'print_gf_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'post_list', __( 'Posts list', 'geoformat' ), 'print_post_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'page_list', __( 'Pages list', 'geoformat' ), 'print_page_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'category_list', __( 'Display posts by category', 'geoformat' ), 'print_category_list_function', 'print_global_options5', 'print_global_each_section' );
	add_settings_field( 'print_table_css', __( 'Custom CSS', 'geoformat' ), 'print_table_css_function', 'print_global_options5', 'print_global_each_section' );
	
	add_settings_section( 'print_global_each_section', __( 'About the printing options', 'geoformat' ), 'print_settings_call3', 'print_global_options3' );
	add_settings_field( 'print_help', __( 'To read before printing', 'geoformat' ), 'print_help_function', 'print_global_options3', 'print_global_each_section' );
	
	add_settings_section( 'print_global_each_section', __( 'Adjust your settings for printing contents', 'geoformat' ), 'print_settings_call2', 'print_global_options2' );
	add_settings_field( 'print_content_size', __( 'Print format', 'geoformat' ), 'print_content_size_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_custom_size_activate', __( 'Activate custom print format', 'geoformat' ), 'print_content_custom_size_activate_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_crop_marks', __( 'Show crop marks', 'geoformat' ), 'print_content_crop_marks_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_margins', __( 'Margins', 'geoformat' ), 'print_content_margins_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_color_background', __( 'Background color', 'geoformat' ), 'print_content_color_background_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_recto', __( 'Recto verso printing', 'geoformat' ), 'print_content_recto_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_comments', __( 'Print comments', 'geoformat' ), 'print_content_comments_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_title_options', __( 'Attributes of the title', 'geoformat' ), 'print_content_title_options_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_metadata', __( 'Metadata printing', 'geoformat' ), 'print_content_metadata_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_options', __( 'Attributes of the content', 'geoformat' ), 'print_content_options_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_images', __( 'Images', 'geoformat' ), 'print_content_images_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_maps', __( 'Maps', 'geoformat' ), 'print_content_maps_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_embed', __( 'Embedded contents', 'geoformat' ), 'print_content_embed_function', 'print_global_options2', 'print_global_each_section' );
	add_settings_field( 'print_content_number', __( 'Page numbering', 'geoformat' ), 'print_content_number_function', 'print_global_options2', 'print_global_each_section' );	
	add_settings_field( 'print_content_css', __( 'Custom CSS', 'geoformat' ), 'print_content_css_function', 'print_global_options2', 'print_global_each_section' );
	
	add_settings_section( 'print_global_each_section', __( 'Adjust your settings for printing Geoformats', 'geoformat' ), 'print_settings_call6', 'print_global_options6' );	
	add_settings_field( 'print_geoformat_size', __( 'Print format', 'geoformat' ), 'print_geoformat_size_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_custom_size_activate', __( 'Activate custom print format', 'geoformat' ), 'print_geoformat_custom_size_activate_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_crop_marks', __( 'Show crop marks', 'geoformat' ), 'print_geoformat_crop_marks_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_margins', __( 'Margins', 'geoformat' ), 'print_geoformat_margins_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_color_background', __( 'Background color', 'geoformat' ), 'print_geoformat_color_background_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_recto', __( 'Recto verso printing', 'geoformat' ), 'print_geoformat_recto_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_comments', __( 'Print comments', 'geoformat' ), 'print_geoformat_comments_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_title', __( 'Titles font family', 'geoformat' ), 'print_geoformat_titles_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_subtitle', __( 'Subtitles font family', 'geoformat' ), 'print_geoformat_subtitles_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_cover', __( 'Cover', 'geoformat' ), 'print_geoformat_cover_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_introduction', __( 'Headline', 'geoformat' ), 'print_geoformat_introduction_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_introtext', __( 'Introduction', 'geoformat' ), 'print_geoformat_introtext_function', 'print_global_options6', 'print_global_each_section' );
	
	add_settings_field( 'print_geoformat_section_title', __( 'Section titles', 'geoformat' ), 'print_geoformat_section_title_function', 'print_global_options6', 'print_global_each_section' );	
	add_settings_field( 'print_geoformat_options', __( 'Section contents', 'geoformat' ), 'print_geoformat_options_function', 'print_global_options6', 'print_global_each_section' );	
	add_settings_field( 'print_geoformat_images', __( 'Images', 'geoformat' ), 'print_geoformat_images_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_embed', __( 'Embedded contents', 'geoformat' ), 'print_geoformat_embed_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_number', __( 'Page numbering', 'geoformat' ), 'print_geoformat_number_function', 'print_global_options6', 'print_global_each_section' );
	add_settings_field( 'print_geoformat_css', __( 'Custom CSS', 'geoformat' ), 'print_geoformat_css_function', 'print_global_options6', 'print_global_each_section' );}
	
//General

function print_default_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_default'] ) ) : 
			$default = ''; 
		else : 
			$default = $get_meta['print_default'];
		endif;
?>
	<input name='print_settings[print_default]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_default]' <?php checked( $default, 1 ); ?> value='1'>
	<p style="font-size:1.1em;width:80%;"><?php echo __('Default printing does not include maps or images to save your printer ink. <br/>
	All settings of your theme are kept.
	<br/>	
	Check this box if you wish personalized settings for the contents or Geoformats (in this cas, you will have to print from the preview page. Please, active the preview button too.', 'geoformat'); ?></p>
<?php }

function print_pdf_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_pdf'] ) ) : 
			$pdf = ''; 
		else : 
			$pdf = $get_meta['print_pdf'];
		endif;
?>
	<input name='print_settings[print_pdf]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_pdf]' <?php checked( $pdf, 1 ); ?> value='1'>
	<p style="font-size:1.1em;width:80%;"><?php echo __('Check this box if you wish to add to each page a shortcut button to print in PDF without leaving the interface.', 'geoformat'); ?>
<?php }

function print_no_subtitle_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_no_subtitle'] ) ) : 
			$no_subtitle = ''; 
		else : 
			$no_subtitle = $get_meta['print_no_subtitle'];
		endif;
?>
	<input name='print_settings[print_no_subtitle]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_no_subtitle]' <?php checked( $no_subtitle, 1 ); ?> value='1'>
<?php }
	
function print_preview_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_preview'] ) ) : 
			$preview = ''; 
		else : 
			$preview = $get_meta['print_preview'];
		endif;
?>
	<input name='print_settings[print_preview]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_preview]' <?php checked( $preview, 1 ); ?> value='1'>
	<p style="font-size:1.1em;width:80%;"><?php echo __('Check this box if you wish to add to each page a shortcut button to view the printing customize settings of the document before its printing. This function is required if you wish to print your page for publishing.', 'geoformat'); ?>
<?php }

function print_printedjs_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_js'] ) ) : 
			$print_js = ''; 
		else : 
			$print_js = $get_meta['print_js'];
		endif;
?>
	<input name='print_settings[print_js]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_js]' <?php checked( $print_js, 1 ); ?> value='1'>
	<p style="font-size:1.1em;width:80%;"><?php echo __('This JavaScript library enables an optimization for PDF printing. The preview page will look slightly different, the notice as well as the print button will not be displayed. To print, please push Ctrl+P on your keyboard. In addition, all of the custom settings could not be taken into account.', 'geoformat'); ?>
<?php }

//Headers

function print_table_site_header_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_table_site_title'] ) ) : 
			$table_site_title = ''; 
		else : 
			$table_site_title = $get_meta['print_table_site_title'];
		endif;		
		if ( empty ( $get_meta['print_table_site_subtitle'] ) ) : 
			$table_site_subtitle = ''; 
		else : 
			$table_site_subtitle = $get_meta['print_table_site_subtitle'];
		endif;
		if ( empty ( $get_meta['print_table_nomargin'] ) ) : 
			$table_nomargin = ''; 
		else : 
			$table_nomargin = $get_meta['print_table_nomargin'];
		endif;
		$options = get_option( 'gp_options' );
		$header_title = $options['font_title'];
		$header_subtitle = $options['font_title'];
		if ( empty ( $get_meta['print_header_title'] ) ) : 
			$print_header_title = $header_title; 
		else : 
			$print_header_title = $get_meta['print_header_title'];
		endif;
		
		if ( empty ( $get_meta['print_header_subtitle'] ) ) : 
			$print_header_subtitle = $header_subtitle; 
		else : 
				$print_header_subtitle = $get_meta['print_header_subtitle'];
		endif;
		if ( empty ( $get_meta['print_table_header_align'] ) ) : 
			$table_header_align = ''; 
		else : 
			$table_header_align = $get_meta['print_table_header_align'];
		endif;
		if (!empty ($get_meta['print_table_header_color']) ) :
			$table_header_color = $get_meta['print_table_header_color']; 
		else : 
			$table_header_color = GP_DEFAULT_TEXT_COLOR;
		endif;
		if ( empty ( $get_meta['print_table_header_border'] ) ) : 
			$table_header_border = ''; 
		else : 
			$table_header_border = $get_meta['print_table_header_border'];
		endif;
		if ( empty ( $get_meta['print_table_header_bottom_border'] ) ) : 
			$table_header_bottom_border_style = ''; 
		else : 
			$table_header_bottom_border_style = $get_meta['print_table_header_bottom_border'];
		endif;
		if (!empty ($get_meta['print_table_header_border_color']) ) :
			$table_header_border_color = $get_meta['print_table_header_border_color']; 
		else : 
			$table_header_border_color = GP_DEFAULT_TEXT_COLOR;
		endif;
		if ( empty ( $get_meta['print_table_header_border_padding'] ) ) : 
			$table_header_border_padding = '5'; 
		else : 
			$table_header_border_padding = $get_meta['print_table_header_border_padding'];
		endif;
		if ( empty ( $get_meta['print_table_header_border_width'] ) ) : 
			$table_header_border_width = '1'; 
		else : 
			$table_header_border_width = $get_meta['print_table_header_border_width'];
		endif;
		if ( empty ( $get_meta['print_table_header_border_bottom_width'] ) ) : 
			$table_header_border_bottom_width = '1'; 
		else : 
			$table_header_border_bottom_width = $get_meta['print_table_header_border_bottom_width'];
		endif;
		if ( empty ( $get_meta['print_table_header_border_style'] ) ) : 
			$table_header_border_style = ''; 
		else : 
			$table_header_border_style = $get_meta['print_table_header_border_style'];
		endif;
		if ( empty ( $get_meta['print_table_header_bottom_border_style'] ) ) : 
			$table_header_bottom_border_style = ''; 
		else : 
			$table_header_bottom_border_style = $get_meta['print_table_header_bottom_border_style'];
		endif;
		if ( empty ( $get_meta['print_table_header_title_size'] ) ) : 
			$print_table_header_title_size = '28'; 
		else : 
			$print_table_header_title_size = $get_meta['print_table_header_title_size'];
		endif;
		if ( empty ( $get_meta['print_table_header_subtitle_size'] ) ) : 
			$print_table_header_subtitle_size = '24'; 
		else : 
			$print_table_header_subtitle_size = $get_meta['print_table_header_subtitle_size'];
		endif;
		
		if ( empty ( $get_meta['print_table_header_margin_title'] ) ) : 
			$table_header_title_bottom_margin = '5'; 
		else : 
			$table_header_title_bottom_margin = $get_meta['print_table_header_margin_title'];
		endif;
		
		if ( empty ( $get_meta['print_table_header_top'] ) ) : 
			$table_header_top_margin = '0'; 
		else : 
			$table_header_top_margin = $get_meta['print_table_header_top'];
		endif;
		
		if ( empty ( $get_meta['print_table_header_bottom'] ) ) : 
			$table_header_bottom = '0'; 
		else : 
			$table_header_bottom = $get_meta['print_table_header_bottom'];
		endif;
?>
	<p>
	<?php echo __('Display website title', 'geoformat'); ?> &nbsp;
	<input name='print_settings[print_table_site_title]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_site_title]' <?php checked( $table_site_title, 1 ); ?> value='1'>
	</p>
	<p>
	<?php echo __('Display website subtitle', 'geoformat'); ?> &nbsp;
	<input name='print_settings[print_table_site_subtitle]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_site_subtitle]' <?php checked( $table_site_subtitle, 1 ); ?> value='1'>
	</p>	
	<p>
	<?php echo __('Do not apply document margins', 'geoformat'); ?> &nbsp;
	<input name='print_settings[print_table_nomargin]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_nomargin]' <?php checked( $table_nomargin, 1 ); ?> value='1'>
	</p>
	<hr/>
	<p><?php echo __('Title font family', 'geoformat'); ?></p>
	<select name="print_settings[print_header_title]" id="print_header_title">
		<option value="select-seventeen" <?php selected($print_header_title, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($print_header_title, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($print_header_title, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($print_header_title, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($print_header_title, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($print_header_title, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($print_header_title, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($print_header_title, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($print_header_title, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($print_header_title, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($print_header_title, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($print_header_title, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($print_header_title, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($print_header_title, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($print_header_title, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($print_header_title, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($print_header_title, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($print_header_title, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($print_header_title, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($print_header_title, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($print_header_title, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($print_header_title, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($print_header_title, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($print_header_title, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($print_header_title, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($print_header_title, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($print_header_title, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($print_header_title, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($print_header_title, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($print_header_title, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($print_header_title, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($print_header_title, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>

	<p><?php echo __('Subtitle font family', 'geoformat'); ?></p>
	<select name="print_settings[print_header_subtitle]" id="print_header_subtitle">
		<option value="select-seventeen" <?php selected($print_header_subtitle, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($print_header_subtitle, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($print_header_subtitle, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($print_header_subtitle, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($print_header_subtitle, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($print_header_subtitle, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($print_header_subtitle, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($print_header_subtitle, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($print_header_subtitle, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($print_header_subtitle, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($print_header_subtitle, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($print_header_subtitle, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($print_header_subtitle, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($print_header_subtitle, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($print_header_subtitle, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($print_header_subtitle, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($print_header_subtitle, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($print_header_subtitle, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($print_header_subtitle, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($print_header_subtitle, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($print_header_subtitle, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($print_header_subtitle, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($print_header_subtitle, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($print_header_subtitle, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($print_header_subtitle, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($print_header_subtitle, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($print_header_subtitle, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($print_header_subtitle, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($print_header_subtitle, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($print_header_subtitle, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($print_header_subtitle, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($print_header_subtitle, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	
	<p><?php echo __('Title font size', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_title_size]' value='<?php echo $print_table_header_title_size; ?>'> points

	<p><?php echo __('Subtitle font size', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_subtitle_size]' value='<?php echo $print_table_header_subtitle_size; ?>'> points

	<p><?php echo __('Header text align', 'geoformat'); ?></p>
	<select name='print_settings[print_table_header_align]'>
		<option value='1' <?php selected($table_header_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($table_header_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($table_header_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Header text color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_table_header_color" class="regular-text" name="print_settings[print_table_header_color]" value="<?php echo $table_header_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Header border', 'geoformat'); ?></p>
	<select name='print_settings[print_table_header_border]'>
		<option value='1' <?php selected($table_header_border, "1"); ?>><?php echo __('No border','geoformat');?></option>
		<option value='2' <?php selected($table_header_border, "2"); ?>><?php echo __('Framed','geoformat');?></option>
		<option value='3' <?php selected($table_header_border, "3"); ?>><?php echo __('Border top and bottom','geoformat');?></option>
		<option value='4' <?php selected($table_header_border, "4"); ?>><?php echo __('Border bottom','geoformat');?></option>
	</select>
	
	<p><?php echo __('Header border color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_table_header_border_color" class="regular-text" name="print_settings[print_table_header_border_color]" value="<?php echo $table_header_border_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Header border padding', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_border_padding]' value='<?php echo $table_header_border_padding; ?>'> mm
	
	<p><?php echo __('Header border width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_border_width]' value='<?php echo $table_header_border_width; ?>'> mm
	
	<p><?php echo __('Header bottom border width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_border_bottom_width]' value='<?php echo $table_header_border_bottom_width; ?>'> mm
	
	<p><?php echo __('Header border style', 'geoformat'); ?></p>
	<select name='print_settings[print_table_header_border_style]'>
		<option value='1' <?php selected($table_header_border_style, "1"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='2' <?php selected($table_header_border_style, "2"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='3' <?php selected($table_header_border_style, "3"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='4' <?php selected($table_header_border_style, "4"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Bottom border style', 'geoformat'); ?></p>
	<select name='print_settings[print_table_header_bottom_border_style]'>
		<option value='1' <?php selected($table_header_bottom_border_style, "1"); ?>><?php echo __('Do not change','geoformat') ?></option>
		<option value='2' <?php selected($table_header_bottom_border_style, "2"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='3' <?php selected($table_header_bottom_border_style, "3"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='4' <?php selected($table_header_bottom_border_style, "4"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='5' <?php selected($table_header_bottom_border_style, "5"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Margin after the main title', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_margin_title]' value='<?php echo $table_header_title_bottom_margin; ?>'> mm
	
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_top]' value='<?php echo $table_header_top_margin; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_header_bottom]' value='<?php echo $table_header_bottom; ?>'> mm

<?php }

function print_header_css_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_header_css'] ) ) : 
			$header_css = ''; 
		else : 
			$header_css = $get_meta['print_header_css'];
		endif;
?>
	<textarea class='bdn' type='cover_css' name='print_settings[print_header_css]'><?php echo $header_css; ?></textarea>
<?php }

//Content 

function print_content_size_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_content_size'] ) ) : 
			$content_size = ''; 
		else : 
			$content_size = $get_meta['print_content_size'];
		endif;
		
		if ( empty ( $get_meta['print_content_paper_size'] ) ) : 
			$content_paper_size = ''; 
		else : 
			$content_paper_size = $get_meta['print_content_paper_size'];
		endif;	
?>
	<select name='print_settings[print_content_size]'>
		<option value='1' <?php selected($content_size, "1"); ?>>A4</option>
		<option value='2' <?php selected($content_size, "2"); ?>>A3</option>
		<option value='3' <?php selected($content_size, "3"); ?>>B5</option>
		<option value='4' <?php selected($content_size, "4"); ?>>Tabloid</option>
	</select>
	
	<p><?php echo __('Paper size', 'geoformat'); ?></p>
	<select name='print_settings[print_content_paper_size]'>
		<option value='1' <?php selected($content_paper_size, "1"); ?>><?php echo __('Portrait','geoformat');?></option>
		<option value='2' <?php selected($content_paper_size, "2"); ?>><?php echo __('Landscape','geoformat');?></option>
	</select>
<?php }

function print_content_custom_size_activate_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_content_custom_size_activate'] ) ) : 
			$content_activate_custom = ''; 
		else : 
			$content_activate_custom = $get_meta['print_content_custom_size_activate'];
		endif;
		if ( empty ( $get_meta['print_content_custom_width'] ) ) : 
			$content_custom_width = ''; 
		else : 
			$content_custom_width = $get_meta['print_content_custom_width'];
		endif;
		if ( empty ( $get_meta['print_content_custom_height'] ) ) : 
			$content_custom_height = ''; 
		else : 
			$content_custom_height = $get_meta['print_content_custom_height'];
		endif;
?>
	<input name='print_settings[print_content_custom_size_activate]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_custom_size_activate]' <?php checked( $content_activate_custom, 1 ); ?> value='1'>
	<br/>
	<br/>
	<?php echo __('Width:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_content_custom_width]' value='<?php echo $content_custom_width; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Height:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_content_custom_height]' value='<?php echo $content_custom_height; ?>'> mm

<?php }

function print_content_crop_marks_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_content_crop_marks'] ) ) : 
			$content_crop_marks = ''; 
		else : 
			$content_crop_marks = $get_meta['print_content_crop_marks'];
		endif;
?>
	<input name='print_settings[print_content_crop_marks]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_crop_marks]' <?php checked( $content_crop_marks, 1 ); ?> value='1'>
<?php }

function print_content_margins_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_content_margin_top'] ) ) : 
			$content_margin_top = '15'; 
		else : 
			$content_margin_top = $get_meta['print_content_margin_top'];
		endif;
		if ( empty ( $get_meta['print_content_margin_left'] ) ) : 
			$content_margin_left = '10'; 
		else : 
			$content_margin_left = $get_meta['print_content_margin_left'];
		endif;
?>
	<?php echo __('Top & bottom:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_content_margin_top]' value='<?php echo $content_margin_top; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Left & right:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_content_margin_left]' value='<?php echo $content_margin_left; ?>'> mm

<?php }

function print_content_recto_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_content_recto'] ) ) : 
			$content_recto = ''; 
		else : 
			$content_recto = $get_meta['print_content_recto'];
		endif;
?>
	<input name='print_settings[print_content_recto]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_recto]' <?php checked( $content_recto, 1 ); ?> value='1'>
<?php }

function print_content_comments_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_content_comments'] ) ) : 
			$content_comments = ''; 
		else : 
			$content_comments = $get_meta['print_content_comments'];
		endif;
?>
	<input name='print_settings[print_content_comments]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_comments]' <?php checked( $content_comments, 1 ); ?> value='1'>
<?php }

function print_content_color_background_function() {
	$get_meta = get_option( 'print_settings' );
	if (!empty ($get_meta['print_content_color_background']) ) :
		$content_color_background = $get_meta['print_content_color_background']; 
		else : $content_color_background = GP_DEFAULT_TITLE_COLOR;
	endif;

	?>

	<input type="background" class="meta-color" id="print_content_color_background" class="regular-background" name="print_settings[print_content_color_background]" value="<?php echo $content_color_background; ?>" data-default-color="<?php echo GP_DEFAULT_TITLE_COLOR; ?>">
	<p class="ita">
		<?php _e('To be printed, you must activate "Print background and image" in the settings of your browser.', 'geoformat'); ?> 
	</p>
	<?php
}

function print_content_title_options_function() { 	
	$get_meta = get_option( 'print_settings' );
	$content_options = get_option( 'gp_options' );
	$content_font_title = $content_options['font_title'];
	if ( empty ( $get_meta['print_content_title'] ) ) : 
			$content_title = $content_font_title; 
	else : 
		$content_title = $get_meta['print_content_title'];
	endif;
	if ( empty ( $get_meta['print_content_subtitle'] ) ) : 
			$content_subtitle = $content_font_title; 
	else : 
		$content_subtitle = $get_meta['print_content_subtitle'];
	endif;
	if ( empty ( $get_meta['print_content_title_size'] ) ) : 
		$content_title_size = '26'; 
	else : 
		$content_title_size = $get_meta['print_content_title_size'];
	endif;
	if (!empty ($get_meta['print_content_color_title']) ) :
		$content_color_title = $get_meta['print_content_color_title']; 
	else : 
		$content_color_title = GP_DEFAULT_TEXT_COLOR;
	endif;
	if ( empty ( $get_meta['print_content_title_align'] ) ) : 
		$content_title_align = ''; 
	else : 
		$content_title_align = $get_meta['print_content_title_align'];
	endif;
	if ( empty ( $get_meta['print_content_subtitle_align'] ) ) : 
		$content_subtitle_align = ''; 
	else : 
		$content_subtitle_align = $get_meta['print_content_subtitle_align'];
	endif;		
	if ( empty ( $get_meta['print_content_title_margin_top'] ) ) : 
		$content_title_margin_top = '0'; 
	else : 
		$content_title_margin_top = $get_meta['print_content_title_margin_top'];
	endif;
	if ( empty ( $get_meta['print_content_title_margin_bottom'] ) ) : 
		$content_title_margin_bottom = '20'; 
	else : 
		$content_title_margin_bottom = $get_meta['print_content_title_margin_bottom'];
	endif;
?>
	<p><?php echo __('Typography', 'geoformat'); ?></p>
	<select name="print_settings[print_content_title]" id="print_content_title">
		<option value="select-seventeen" <?php selected($content_title, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($content_title, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($content_title, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($content_title, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($content_title, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($content_title, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($content_title, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($content_title, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($content_title, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($content_title, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($content_title, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($content_title, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($content_title, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($content_title, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($content_title, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($content_title, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($content_title, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($content_title, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($content_title, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($content_title, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($content_title, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($content_title, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($content_title, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($content_title, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($content_title, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($content_title, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($content_title, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($content_title, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($content_title, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($content_title, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($content_title, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($content_title, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	
	<p><?php echo __('Title font size', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_title_size]' value='<?php echo $content_title_size; ?>'> points

	<p><?php echo __('Title color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_content_color_title" class="regular-text" name="print_settings[print_content_color_title]" value="<?php echo $content_color_title; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<p><?php echo __('Title alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_content_title_align]'>
		<option value='1' <?php selected($content_title_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($content_title_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($content_title_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_title_margin_top]' value='<?php echo $content_title_margin_top; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_title_margin_bottom]' value='<?php echo $content_title_margin_bottom; ?>'> mm
	
	<p><?php echo __('Subtitles typography', 'geoformat'); ?></p>
	<select name="print_settings[print_content_subtitle]" id="print_content_subtitle">
		<option value="select-seventeen" <?php selected($content_subtitle, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($content_subtitle, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($content_subtitle, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($content_subtitle, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($content_subtitle, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($content_subtitle, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($content_subtitle, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($content_subtitle, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($content_subtitle, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($content_subtitle, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($content_subtitle, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($content_subtitle, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($content_subtitle, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($content_subtitle, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($content_subtitle, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($content_subtitle, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($content_subtitle, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($content_subtitle, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($content_subtitle, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($content_subtitle, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($content_subtitle, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($content_subtitle, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($content_subtitle, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($content_subtitle, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($content_subtitle, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($content_subtitle, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($content_subtitle, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($content_subtitle, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($content_subtitle, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($content_subtitle, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($content_subtitle, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($content_subtitle, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	
	<p><?php echo __('Subitle alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_content_subtitle_align]'>
		<option value='1' <?php selected($content_subtitle_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($content_subtitle_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($content_subtitle_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
<?php }

function print_content_metadata_function() { 
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_content_metadata'] ) ) : 
		$content_metadata = ''; 
	else : 
		$content_metadata = $get_meta['print_content_metadata'];
	endif;
	if ( empty ( $get_meta['print_content_metadata_icons'] ) ) : 
		$content_metadata_icons = ''; 
	else : 
		$content_metadata_icons = $get_meta['print_content_metadata_icons'];
	endif;
	if ( empty ( $get_meta['print_content_metadata_bottom'] ) ) : 
		$content_metadata_bottom = '5'; 
	else : 
		$content_metadata_bottom = $get_meta['print_content_metadata_bottom'];
	endif;
		if ( empty ( $get_meta['print_content_metadata_align'] ) ) : 
		$content_metadata_align = ''; 
	else : 
		$content_metadata_align = $get_meta['print_content_metadata_align'];
	endif;
	
	if ( empty ( $get_meta['content_metadata_border'] ) ) : 
		$content_metadata_border = ''; 
	else : 
		$content_metadata_border = $get_meta['content_metadata_border'];
	endif;
		
	if ( empty ( $get_meta['print_content_metadata_border_style'] ) ) : 
		$content_metadata_border_style = ''; 
	else : 
		$content_metadata_border_style = $get_meta['print_content_metadata_border_style'];
	endif;
	
	if (!empty ($get_meta['print_metadata_border_color']) ) :
		$content_metadata_border_color = $get_meta['print_metadata_border_color']; 
	else : 
		$content_metadata_border_color = GP_DEFAULT_TEXT_COLOR;
	endif;	
		
	if ( empty ( $get_meta['print_metadata_border_padding'] ) ) : 
		$content_metadata_border_padding = '5'; 
	else : 
		$content_metadata_border_padding = $get_meta['print_metadata_border_padding'];
	endif;
	
	if ( empty ( $get_meta['print_metadata_border_width'] ) ) : 
			$content_metadata_border_width = '1'; 
	else : 
		$content_metadata_border_width = $get_meta['print_metadata_border_width'];
	endif;
?>
		
	<select name='print_settings[print_content_metadata]'>
		<option value='1' <?php selected($content_metadata, "1"); ?>><?php echo __('Display all','geoformat') ?></option>
		<option value='2' <?php selected($content_metadata, "2"); ?>><?php echo __('Display author name','geoformat') ?></option>
		<option value='3' <?php selected($content_metadata, "3"); ?>><?php echo __('Display date and author name','geoformat') ?></option>
		<option value='4' <?php selected($content_metadata, "4"); ?>><?php echo __('Hide','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Do not print metadata icons', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_content_metadata_icons]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_metadata_icons]' <?php checked( $content_metadata_icons, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_content_metadata_align]'>
		<option value='1' <?php selected($content_metadata_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($content_metadata_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($content_metadata_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border', 'geoformat'); ?></p>
	<select name='print_settings[content_metadata_border]'>
		<option value='1' <?php selected($content_metadata_border, "1"); ?>><?php echo __('No border','geoformat');?></option>
		<option value='2' <?php selected($content_metadata_border, "2"); ?>><?php echo __('Framed','geoformat');?></option>
		<option value='3' <?php selected($content_metadata_border, "3"); ?>><?php echo __('Border top and bottom','geoformat');?></option>
		<option value='4' <?php selected($content_metadata_border, "4"); ?>><?php echo __('Border bottom','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border style', 'geoformat'); ?></p>
	<select name='print_settings[print_content_metadata_border_style]'>
		<option value='1' <?php selected($content_metadata_border_style, "1"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='2' <?php selected($content_metadata_border_style, "2"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='3' <?php selected($content_metadata_border_style, "3"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='4' <?php selected($content_metadata_border_style, "4"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Border color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_metadata_border_color" class="regular-text" name="print_settings[print_metadata_border_color]" value="<?php echo $content_metadata_border_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Border padding', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_metadata_border_padding]' value='<?php echo $content_metadata_border_padding; ?>'> mm
	
	<p><?php echo __('Border width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_metadata_border_width]' value='<?php echo $content_metadata_border_width; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_metadata_bottom]' value='<?php echo $content_metadata_bottom; ?>'> mm

<?php }

function print_content_options_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_content_page_width'] ) ) : 
			$content_page_width = '100'; 
		else : 
			$content_page_width = $get_meta['print_content_page_width'];
		endif;
		if ( empty ( $get_meta['print_content_content_columns'] ) ) : 
			$content_content_columns = '1'; 
		else : 
			$content_content_columns = $get_meta['print_content_content_columns'];
		endif;
		if ( empty ( $get_meta['print_content_columns_fill'] ) ) : 
			$content_columns_fill = ''; 
		else : 
			$content_columns_fill = $get_meta['print_content_columns_fill'];
		endif;
		if ( empty ( $get_meta['print_content_content_columns_gutter'] ) ) : 
			$content_content_columns_gutter = '5'; 
		else : 
			$content_content_columns_gutter = $get_meta['print_content_content_columns_gutter'];
		endif;
		if ( empty ( $get_meta['print_content_columns_filet'] ) ) : 
			$content_columns_filet = ''; 
		else : 
			$content_columns_filet = $get_meta['print_content_columns_filet'];
		endif;
		$content_options = get_option( 'gp_options' );
		$content_font_text = $content_options['font_text'];
		if ( empty ( $get_meta['print_content_font_text'] ) ) : 
			$content_font_text = $content_font_text; 
		else : 
			$content_font_text = $get_meta['print_content_font_text'];
		endif;
		
		if ( empty ( $get_meta['print_content_text_font_size'] ) ) : 
			$content_text_size = '13';
		else : 
			$content_text_size = $get_meta['print_content_text_font_size'];
		endif;
		
		if ( empty ( $get_meta['print_content_text_line_height'] ) ) : 
			$content_line_height = '19';
		else : 
			$content_line_height = $get_meta['print_content_text_line_height'];
		endif;
		
		if ( empty ($get_meta['print_content_color_text']) ) :
			$content_text_font_color = GP_DEFAULT_TEXT_COLOR;
		else : 
			$content_text_font_color = $get_meta['print_content_color_text']; 
		endif;
		if ( empty ( $get_meta['print_content_text_alignment'] ) ) : 
			$content_text_align = ''; 
		else : 
			$content_text_align = $get_meta['print_content_text_alignment'];
		endif;
		if ( empty ( $get_meta['print_project_list'] ) ) : 
			$project_list = ''; 
		else : 
			$project_list = $get_meta['print_project_list'];
		endif;
?>
	<p><?php echo __('Content width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_page_width]' value='<?php echo $content_page_width; ?>'> %
	
	<p><?php echo __('Content columns ', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_content_columns]' value='<?php echo $content_content_columns; ?>'>
	
	<p><?php echo __('Columns gutter ', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_content_columns_gutter]' value='<?php echo $content_content_columns_gutter; ?>'> mm
	
	<p><?php echo __('Add a net between columns', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_content_columns_filet]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_columns_filet]' <?php checked( $content_columns_filet, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Fill column', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_content_columns_fill]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_columns_fill]' <?php checked( $content_columns_fill, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Typography', 'geoformat'); ?></p>
	<select name="print_settings[print_content_font_text]" id="print_content_font_text">
		<option value="select-seventeen" <?php selected($content_font_text, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($content_font_text, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($content_font_text, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($content_font_text, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($content_font_text, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($content_font_text, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($content_font_text, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($content_font_text, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($content_font_text, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($content_font_text, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($content_font_text, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($content_font_text, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($content_font_text, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($content_font_text, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($content_font_text, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($content_font_text, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($content_font_text, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($content_font_text, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($content_font_text, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($content_font_text, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($content_font_text, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($content_font_text, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($content_font_text, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($content_font_text, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($content_font_text, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($content_font_text, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($content_font_text, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($content_font_text, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($content_font_text, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($content_font_text, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($content_font_text, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($content_font_text, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	
	<p><?php echo __('Font size', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_text_font_size]' value='<?php echo $content_text_size; ?>'> points
	
	<p><?php echo __('Line-height', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_text_line_height]' value='<?php echo $content_line_height; ?>'> points

	<p><?php echo __('Font color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_content_color_text" class="regular-text" name="print_settings[print_content_color_text]" value="<?php echo $content_text_font_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Text alignment ', 'geoformat'); ?></p>
	<select name='print_settings[print_content_text_alignment]'>
		<option value='1' <?php selected($content_text_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($content_text_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($content_text_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		<option value='4' <?php selected($content_text_align, "4"); ?>><?php echo __('Justify','geoformat');?></option>
	</select>
	<p><?php echo __('Do not print project list', 'geoformat'); ?>
		<input name='print_settings[print_project_list]' value='0' type='hidden'>
		<input type='checkbox' name='print_settings[print_project_list]' <?php checked( $project_list, 1 ); ?> value='1'>
	</p>
<?php }

function print_content_images_function() { 

	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_content_images'] ) ) : 
		$print_content_images = ''; 
	else : 
		$print_content_images = $get_meta['print_content_images'];
	endif;
	
	if ( empty ( $get_meta['print_content_image_width'] ) ) : 
		$content_image_width = '100'; 
	else : 
		$content_image_width = $get_meta['print_content_image_width'];
	endif;
	
	if ( empty ( $get_meta['print_content_images_margin_top'] ) ) : 
		$content_images_margin_top = '0'; 
	else : 
		$content_images_margin_top = $get_meta['print_content_images_margin_top'];
	endif;
	if ( empty ( $get_meta['print_content_images_margin_bottom'] ) ) : 
		$content_images_margin_bottom = '20'; 
	else : 
		$content_images_margin_bottom = $get_meta['print_content_images_margin_bottom'];
	endif;
	
	if ( empty ( $get_meta['print_content_images_align'] ) ) : 
		$content_images_align = ''; 
	else : 
		$content_images_align = $get_meta['print_content_images_align'];
	endif;	
?>
	<p><?php echo __('Do not print images', 'geoformat'); ?> &nbsp;&nbsp;
	<input name='print_settings[print_content_images]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_images]' <?php checked( $print_content_images, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Images width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_image_width]' value='<?php echo $content_image_width; ?>'> %
		
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_images_margin_top]' value='<?php echo $content_images_margin_top; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_images_margin_bottom]' value='<?php echo $content_images_margin_bottom; ?>'> mm
		
	<p><?php echo __('Alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_content_images_align]'>
		<option value='1' <?php selected($content_images_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($content_images_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($content_images_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>		
<?php }

function print_content_maps_function() { 

	$get_meta = get_option( 'print_settings' );
	
	if ( empty ( $get_meta['print_content_maps'] ) ) : 
		$print_content_maps = ''; 
	else : 
		$print_content_maps = $get_meta['print_content_maps'];
	endif;
	if ( empty ( $get_meta['print_content_maps_width'] ) ) : 
		$content_maps_width = '400'; 
	else : 
		$content_maps_width = $get_meta['print_content_maps_width'];
	endif;
	if ( empty ( $get_meta['print_content_maps_margin_top'] ) ) : 
		$content_maps_margin_top = '0'; 
	else : 
		$content_maps_margin_top = $get_meta['print_content_maps_margin_top'];
	endif;
	if ( empty ( $get_meta['print_content_maps_margin_bottom'] ) ) : 
		$content_maps_margin_bottom = '20'; 
	else : 
		$content_maps_margin_bottom = $get_meta['print_content_maps_margin_bottom'];
	endif;
	
	if ( empty ( $get_meta['print_content_maps_align'] ) ) : 
		$content_maps_align = ''; 
	else : 
		$content_maps_align = $get_meta['print_content_maps_align'];
	endif;	
?>

	<p><?php echo __('Do not print maps', 'geoformat'); ?> &nbsp;&nbsp;
	<input name='print_settings[print_content_maps]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_maps]' <?php checked( $print_content_maps, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Maps height', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_content_maps_width]' value='<?php echo $content_maps_width; ?>'> pixels
		
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_maps_margin_top]' value='<?php echo $content_maps_margin_top; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_maps_margin_bottom]' value='<?php echo $content_maps_margin_bottom; ?>'> mm
		
	<p><?php echo __('Border', 'geoformat'); ?></p>
	<select name='print_settings[print_content_maps_align]'>
		<option value='1' <?php selected($content_maps_align, "1"); ?>><?php echo __('No border','geoformat');?></option>
		<option value='2' <?php selected($content_maps_align, "2"); ?>><?php echo __('Thin','geoformat');?></option>
		<option value='3' <?php selected($content_maps_align, "3"); ?>><?php echo __('Regular','geoformat');?></option>
		<option value='4' <?php selected($content_maps_align, "4"); ?>><?php echo __('Bold','geoformat');?></option>
	</select>		
<?php }

function print_content_embed_function() { 

	$get_meta = get_option( 'print_settings' );
	
	if ( empty ( $get_meta['print_content_embed'] ) ) : 
		$print_content_embed = ''; 
	else : 
		$print_content_embed = $get_meta['print_content_embed'];
	endif;
	
	if ( empty ( $get_meta['print_content_embed_margin_top'] ) ) : 
		$content_embed_margin_top = '0'; 
	else : 
		$content_embed_margin_top = $get_meta['print_content_embed_margin_top'];
	endif;
	if ( empty ( $get_meta['print_content_embed_margin_bottom'] ) ) : 
		$content_embed_margin_bottom = '20'; 
	else : 
		$content_embed_margin_bottom = $get_meta['print_content_embed_margin_bottom'];
	endif;

?>

	<p><?php echo __('Do not print embed content', 'geoformat'); ?> &nbsp;&nbsp;
	<input name='print_settings[print_content_embed]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_content_embed]' <?php checked( $print_content_embed, 1 ); ?> value='1'>
	</p>
		
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_embed_margin_top]' value='<?php echo $content_embed_margin_top; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_content_embed_margin_bottom]' value='<?php echo $content_embed_margin_bottom; ?>'> mm
			
<?php }

function print_content_css_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_content_css'] ) ) : 
			$content_css = ''; 
		else : 
			$content_css = $get_meta['print_content_css'];
		endif;
?>
	<textarea class='bdn' type='content_css' name='print_settings[print_content_css]'><?php echo $content_css; ?></textarea>
<?php }

function print_content_number_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['content_page_number'] ) ) : 
			$content_page_number = ''; 
		else : 
			$content_page_number = $get_meta['content_page_number'];
		endif;
		
	if ( empty ( $get_meta['content_page_number_position'] ) ) : 
			$content_page_number_position = ''; 
		else : 
			$content_page_number_position = $get_meta['content_page_number_position'];
		endif;
	
	if ( empty ( $get_meta['content_page_number_start'] ) ) : 
			$content_page_number_start = '1'; 
		else : 
			$content_page_number_start = $get_meta['content_page_number_start'];
		endif;
?>
	<p><?php echo __('Activate page numbering', 'geoformat'); ?></p>
	<input name='print_settings[content_page_number]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[content_page_number]' <?php checked( $content_page_number, 1 ); ?> value='1'>

	<p><?php echo __('Position', 'geoformat'); ?></p>
	<select name='print_settings[content_page_number_position]'>
		<option value='1' <?php selected($content_page_number_position, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($content_page_number_position, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($content_page_number_position, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Start numbering from', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[content_page_number_start]' value='<?php echo $content_page_number_start; ?>'>
	<p><em><?php echo __('This function is experimental and does not work in all cases.','geoformat'); ?></em></p>
	
<?php }

//Geoformat

function print_geoformat_size_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_geoformat_size'] ) ) : 
			$geoformat_size = ''; 
		else : 
			$geoformat_size = $get_meta['print_geoformat_size'];
		endif;
		
		if ( empty ( $get_meta['print_geoformat_paper_size'] ) ) : 
			$geoformat_paper_size = ''; 
		else : 
			$geoformat_paper_size = $get_meta['print_geoformat_paper_size'];
		endif;	
?>
	<select name='print_settings[print_geoformat_size]'>
		<option value='1' <?php selected($geoformat_size, "1"); ?>>A4</option>
		<option value='2' <?php selected($geoformat_size, "2"); ?>>A3</option>
		<option value='3' <?php selected($geoformat_size, "3"); ?>>B5</option>
		<option value='4' <?php selected($geoformat_size, "4"); ?>>Tabloid</option>
	</select>
	
	<p><?php echo __('Paper size', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_paper_size]'>
		<option value='1' <?php selected($geoformat_paper_size, "1"); ?>><?php echo __('Portrait','geoformat');?></option>
		<option value='2' <?php selected($geoformat_paper_size, "2"); ?>><?php echo __('Landscape','geoformat');?></option>
	</select>
<?php }

function print_geoformat_custom_size_activate_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_geoformat_custom_size_activate'] ) ) : 
			$geoformat_activate_custom = ''; 
		else : 
			$geoformat_activate_custom = $get_meta['print_geoformat_custom_size_activate'];
		endif;
		if ( empty ( $get_meta['print_geoformat_custom_width'] ) ) : 
			$geoformat_custom_width = ''; 
		else : 
			$geoformat_custom_width = $get_meta['print_geoformat_custom_width'];
		endif;
		if ( empty ( $get_meta['print_geoformat_custom_height'] ) ) : 
			$geoformat_custom_height = ''; 
		else : 
			$geoformat_custom_height = $get_meta['print_geoformat_custom_height'];
		endif;
?>
	<input name='print_settings[print_geoformat_custom_size_activate]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_custom_size_activate]' <?php checked( $geoformat_activate_custom, 1 ); ?> value='1'>
	<br/>
	<br/>
	<?php echo __('Width:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_geoformat_custom_width]' value='<?php echo $geoformat_custom_width; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Height:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_geoformat_custom_height]' value='<?php echo $geoformat_custom_height; ?>'> mm

<?php }

function print_geoformat_crop_marks_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_geoformat_crop_marks'] ) ) : 
			$geoformat_crop_marks = ''; 
		else : 
			$geoformat_crop_marks = $get_meta['print_geoformat_crop_marks'];
		endif;
?>
	<input name='print_settings[print_geoformat_crop_marks]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_crop_marks]' <?php checked( $geoformat_crop_marks, 1 ); ?> value='1'>
<?php }

function print_geoformat_margins_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_geoformat_margin_top'] ) ) : 
			$geoformat_margin_top = '15'; 
		else : 
			$geoformat_margin_top = $get_meta['print_geoformat_margin_top'];
		endif;
		if ( empty ( $get_meta['print_geoformat_margin_left'] ) ) : 
			$geoformat_margin_left = '10'; 
		else : 
			$geoformat_margin_left = $get_meta['print_geoformat_margin_left'];
		endif;
?>
	<?php echo __('Top & bottom:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_geoformat_margin_top]' value='<?php echo $geoformat_margin_top; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Left & right:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_geoformat_margin_left]' value='<?php echo $geoformat_margin_left; ?>'> mm

<?php }

function print_geoformat_recto_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_geoformat_recto'] ) ) : 
			$geoformat_recto = ''; 
		else : 
			$geoformat_recto = $get_meta['print_geoformat_recto'];
		endif;
?>
	<input name='print_settings[print_geoformat_recto]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_recto]' <?php checked( $geoformat_recto, 1 ); ?> value='1'>
<?php }

function print_geoformat_comments_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_geoformat_comments'] ) ) : 
			$geoformat_comments = ''; 
		else : 
			$geoformat_comments = $get_meta['print_geoformat_comments'];
		endif;
?>
	<input name='print_settings[print_geoformat_comments]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_comments]' <?php checked( $geoformat_comments, 1 ); ?> value='1'>
<?php }

function print_geoformat_color_background_function() {
	$get_meta = get_option( 'print_settings' );
	if (!empty ($get_meta['print_geoformat_color_background']) ) :
		$geoformat_color_background = $get_meta['print_geoformat_color_background']; 
		else : $geoformat_color_background = GP_DEFAULT_TITLE_COLOR;
	endif;

	?>

	<input type="background" class="meta-color" id="print_geoformat_color_background" class="regular-background" name="print_settings[print_geoformat_color_background]" value="<?php echo $geoformat_color_background; ?>" data-default-color="<?php echo GP_DEFAULT_TITLE_COLOR; ?>">
	<?php
}

function print_geoformat_titles_function() {
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_geoformat_title'] ) ) : 
		$print_geoformat_title = ''; 
	else : 
		$print_geoformat_title = $get_meta['print_geoformat_title'];
	endif; 
?>
	<select name="print_settings[print_geoformat_title]" id="print_geoformat_title">
		<option value="select-seventeen" <?php selected($print_geoformat_title, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($print_geoformat_title, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($print_geoformat_title, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($print_geoformat_title, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($print_geoformat_title, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($print_geoformat_title, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($print_geoformat_title, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($print_geoformat_title, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($print_geoformat_title, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($print_geoformat_title, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($print_geoformat_title, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($print_geoformat_title, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($print_geoformat_title, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($print_geoformat_title, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($print_geoformat_title, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($print_geoformat_title, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($print_geoformat_title, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($print_geoformat_title, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($print_geoformat_title, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($print_geoformat_title, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($print_geoformat_title, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($print_geoformat_title, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($print_geoformat_title, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($print_geoformat_title, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($print_geoformat_title, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($print_geoformat_title, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($print_geoformat_title, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($print_geoformat_title, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($print_geoformat_title, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($print_geoformat_title, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($print_geoformat_title, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($print_geoformat_title, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
<?php }
function print_geoformat_subtitles_function() {
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_geoformat_subtitle'] ) ) : 
		$print_geoformat_subtitle = ''; 
	else : 
		$print_geoformat_subtitle = $get_meta['print_geoformat_subtitle'];
	endif;
?>
<select name="print_settings[print_geoformat_subtitle]" id="print_geoformat_subtitle">
		<option value="select-seventeen" <?php selected($print_geoformat_subtitle, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($print_geoformat_subtitle, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($print_geoformat_subtitle, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($print_geoformat_subtitle, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($print_geoformat_subtitle, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($print_geoformat_subtitle, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($print_geoformat_subtitle, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($print_geoformat_subtitle, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($print_geoformat_subtitle, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($print_geoformat_subtitle, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($print_geoformat_subtitle, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($print_geoformat_subtitle, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($print_geoformat_subtitle, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($print_geoformat_subtitle, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($print_geoformat_subtitle, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($print_geoformat_subtitle, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($print_geoformat_subtitle, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($print_geoformat_subtitle, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($print_geoformat_subtitle, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($print_geoformat_subtitle, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($print_geoformat_subtitle, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($print_geoformat_subtitle, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($print_geoformat_subtitle, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($print_geoformat_subtitle, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($print_geoformat_subtitle, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($print_geoformat_subtitle, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($print_geoformat_subtitle, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($print_geoformat_subtitle, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($print_geoformat_subtitle, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($print_geoformat_subtitle, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($print_geoformat_subtitle, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($print_geoformat_subtitle, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
<?php }
function print_geoformat_cover_function() {
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_geoformat_cover'] ) ) : 
		$geoformat_cover = ''; 
	else : 
		$geoformat_cover = $get_meta['print_geoformat_cover'];
	endif;	
	if ( empty ( $get_meta['print_geoformat_cover_font_size'] ) ) : 
		$geoformat_cover_font_size = '42'; 
	else : 
		$geoformat_cover_font_size = $get_meta['print_geoformat_cover_font_size'];
	endif;
	if ( empty ( $get_meta['print_geoformat_cover_line_height'] ) ) : 
		$geoformat_cover_line_height = '60'; 
	else : 
		$geoformat_cover_line_height = $get_meta['print_geoformat_cover_line_height'];
	endif;
	if ( empty ( $get_meta['print_geoformat_color_cover'] ) ) : 
		$geoformat_cover_font_color = GP_DEFAULT_TEXT_COLOR;
	else : 
		$geoformat_cover_font_color = $get_meta['print_geoformat_color_cover'];
	endif;
	if ( empty ( $get_meta['print_geoformat_cover_alignment'] ) ) : 
		$geoformat_cover_align = '';
	else : 
		$geoformat_cover_align = $get_meta['print_geoformat_cover_alignment'];
	endif;
	if ( empty ( $get_meta['print_geoformat_cover_top_margin'] ) ) : 
		$geoformat_cover_top_margin = '100';
	else : 
		$geoformat_cover_top_margin = $get_meta['print_geoformat_cover_top_margin'];
	endif;
	
	if ( empty ( $get_meta['print_geoformat_cover_padding'] ) ) : 
		$geoformat_cover_padding = '20';
	else : 
		$geoformat_cover_padding = $get_meta['print_geoformat_cover_padding'];
	endif;
?>

	<p><?php echo __('Activate cover printing', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
		<input name='print_settings[print_geoformat_cover]' value='0' type='hidden'>
		<input type='checkbox' name='print_settings[print_geoformat_cover]' <?php checked( $geoformat_cover, 1 ); ?> value='1'>
		</p>
		<p><em><?php echo __('Printing the cover disables printing of the contents. To print the content of the geformat, deactivate this option.','geoformat'); ?></em></p>
		
	<p><?php echo __('Font size', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_cover_font_size]' value='<?php echo $geoformat_cover_font_size; ?>'> points
	
	<p><?php echo __('Line-height', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_cover_line_height]' value='<?php echo $geoformat_cover_line_height; ?>'> points
	<p><?php echo __('Font color', 'geoformat'); ?></p>
	<input type="cover" class="meta-color" id="print_geoformat_color_cover" class="regular-cover" name="print_settings[print_geoformat_color_cover]" value="<?php echo $geoformat_cover_font_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Title alignment ', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_cover_alignment]'>
		<option value='1' <?php selected($geoformat_cover_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_cover_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_cover_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_cover_top_margin]' value='<?php echo $geoformat_cover_top_margin; ?>'> mm
	
	<p><?php echo __('Padding', 'geoformat'); ?></p>
	<input type='cover' class='small' name='print_settings[print_geoformat_cover_padding]' value='<?php echo $geoformat_cover_padding; ?>'> mm
	
	<?php if ( empty ( $get_meta['print_cover_background_vertical_align'] ) ) : 
			$cover_background_vertical_align = ''; 
		else : 
			$cover_background_vertical_align = $get_meta['print_cover_background_vertical_align'];
		endif;
	?>
	<p><?php echo __('Vertical positioning of the image','geoformat'); ?></p>
	<select name='print_settings[print_cover_background_vertical_align]'>
		<option value='1' <?php selected($cover_background_vertical_align, "1"); ?>><?php echo __('Top','geoformat');?></option>
		<option value='2' <?php selected($cover_background_vertical_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($cover_background_vertical_align, "3"); ?>><?php echo __('Bottom','geoformat');?></option>
	</select>
	<?php if ( empty ( $get_meta['print_cover_background_horizontal_align'] ) ) : 
			$cover_background_horizontal_align = ''; 
		else : 
			$cover_background_horizontal_align = $get_meta['print_cover_background_horizontal_align'];
		endif;
	?>
	<p><?php echo __('Horizontal positioning of the image','geoformat'); ?></p>
	<select name='print_settings[print_cover_background_horizontal_align]'>
		<option value='1' <?php selected($cover_background_horizontal_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($cover_background_horizontal_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($cover_background_horizontal_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
<?php }

function print_geoformat_introduction_function() {
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_geoformat_maintitle_font_size'] ) ) : 
		$geoformat_maintitle_font_size = '32'; 
	else : 
		$geoformat_maintitle_font_size = $get_meta['print_geoformat_maintitle_font_size'];
	endif;
	if ( empty ( $get_meta['print_geoformat_maintitle_color'] ) ) : 
		$geoformat_maintitle_font_color = GP_DEFAULT_TEXT_COLOR;
	else : 
		$geoformat_maintitle_font_color = $get_meta['print_geoformat_maintitle_color'];
	endif;
	if ( empty ( $get_meta['print_geoformat_maintitle_alignment'] ) ) : 
		$geoformat_maintitle_alignment = '';
	else : 
		$geoformat_maintitle_alignment = $get_meta['print_geoformat_maintitle_alignment'];
	endif;
	if ( empty ( $get_meta['print_geoformat_title_top_margin'] ) ) : 
		$gf_maintitle_top_margin = '0';
	else : 
		$gf_maintitle_top_margin = $get_meta['print_geoformat_title_top_margin'];
	endif;
	if ( empty ( $get_meta['print_geoformat_title_bottom_margin'] ) ) : 
		$gf_maintitle_bottom_margin = '10';
	else : 
		$gf_maintitle_bottom_margin = $get_meta['print_geoformat_title_bottom_margin'];
	endif;
	if ( empty ( $get_meta['print_geoformat_maintitle_break'] ) ) : 
		$geoformat_maintitle_break = ''; 
	else : 
		$geoformat_maintitle_break = $get_meta['print_geoformat_maintitle_break'];
	endif;
	if ( empty ( $get_meta['print_geoformat_maintitle_image_width'] ) ) : 
		$geoformat_maintitle_image_width = '100'; 
	else : 
		$geoformat_maintitle_image_width = $get_meta['print_geoformat_maintitle_image_width'];
	endif;	
	if ( empty ( $get_meta['print_geoformat_maintitle_image_top_margin'] ) ) : 
		$geoformat_maintitle_image_top_margin = '10';
	else : 
		$geoformat_maintitle_image_top_margin = $get_meta['print_geoformat_maintitle_image_top_margin'];
	endif;
	if ( empty ( $get_meta['print_geoformat_maintitle_image_bottom_margin'] ) ) : 
		$geoformat_maintitle_image_bottom_margin = '10';
	else : 
		$geoformat_maintitle_image_bottom_margin = $get_meta['print_geoformat_maintitle_image_bottom_margin'];
	endif;
	if ( empty ( $get_meta['print_maintitle_image_border_style'] ) ) : 
		$maintitle_image_border_style = ''; 
	else : 
		$maintitle_image_border_style = $get_meta['print_maintitle_image_border_style'];
	endif;
	if ( empty ( $get_meta['print_maintitle_image_border_width'] ) ) : 
		$maintitle_image_border_width = '0.5'; 
	else : 
		$maintitle_image_border_width = $get_meta['print_maintitle_image_border_width'];
	endif;
	if ( empty ( $get_meta['print_geoformat_maintitle_image_color'] ) ) : 
		$maintitle_image_color = GP_DEFAULT_TEXT_COLOR;
	else : 
		$maintitle_image_color = $get_meta['print_geoformat_maintitle_image_color'];
	endif;
	if ( empty ( $get_meta['print_maintitle_image_border_padding'] ) ) : 
		$maintitle_image_border_padding = '5'; 
	else : 
		$maintitle_image_border_padding = $get_meta['print_maintitle_image_border_padding'];
	endif;
	if ( empty ( $get_meta['print_geoformat_display_maintitle_image'] ) ) : 
		$geoformat_display_maintitle_image = '';
	else : 
		$geoformat_display_maintitle_image = $get_meta['print_geoformat_display_maintitle_image'];
	endif;
	if ( empty ( $get_meta['print_geoformat_maintitle_image_alignment'] ) ) : 
		$geoformat_maintitle_image_alignment = '';
	else : 
		$geoformat_maintitle_image_alignment = $get_meta['print_geoformat_maintitle_image_alignment'];
	endif;
	
	if ( empty ( $get_meta['print_geoformat_maintitle_image_break'] ) ) : 
		$geoformat_maintitle_image_break = ''; 
	else : 
		$geoformat_maintitle_image_break = $get_meta['print_geoformat_maintitle_image_break'];
	endif;
	if ( empty ( $get_meta['print_geoformat_metadata_author'] ) ) : 
		$geoformat_metadata_author = ''; 
	else : 
		$geoformat_metadata_author = $get_meta['print_geoformat_metadata_author'];
	endif;
	if ( empty ( $get_meta['print_geoformat_metadata_image'] ) ) : 
		$geoformat_metadata_image = ''; 
	else : 
		$geoformat_metadata_image = $get_meta['print_geoformat_metadata_image'];
	endif;
	if ( empty ( $get_meta['print_geoformat_metadata_date'] ) ) : 
		$geoformat_metadata_date = ''; 
	else : 
		$geoformat_metadata_date = $get_meta['print_geoformat_metadata_date'];
	endif;
	if ( empty ( $get_meta['print_geoformat_metadata_bottom'] ) ) : 
		$geoformat_metadata_bottom = '5'; 
	else : 
		$geoformat_metadata_bottom = $get_meta['print_geoformat_metadata_bottom'];
	endif;
		if ( empty ( $get_meta['print_geoformat_metadata_align'] ) ) : 
		$geoformat_metadata_align = ''; 
	else : 
		$geoformat_metadata_align = $get_meta['print_geoformat_metadata_align'];
	endif;
	if ( empty ( $get_meta['geoformat_metadata_border'] ) ) : 
		$geoformat_metadata_border = ''; 
	else : 
		$geoformat_metadata_border = $get_meta['geoformat_metadata_border'];
	endif;
	if ( empty ( $get_meta['print_geoformat_metadata_border_style'] ) ) : 
		$geoformat_metadata_border_style = ''; 
	else : 
		$geoformat_metadata_border_style = $get_meta['print_geoformat_metadata_border_style'];
	endif;
	if (!empty ($get_meta['print_metadata_border_color']) ) :
		$geoformat_metadata_border_color = $get_meta['print_metadata_border_color']; 
	else : 
		$geoformat_metadata_border_color = GP_DEFAULT_TEXT_COLOR;
	endif;	
	if ( empty ( $get_meta['print_metadata_border_padding'] ) ) : 
		$geoformat_metadata_border_padding = '5'; 
	else : 
		$geoformat_metadata_border_padding = $get_meta['print_metadata_border_padding'];
	endif;
	if ( empty ( $get_meta['print_metadata_border_width'] ) ) : 
			$geoformat_metadata_border_width = '0.5'; 
	else : 
		$geoformat_metadata_border_width = $get_meta['print_metadata_border_width'];
	endif;
	if ( empty ( $get_meta['print_geoformat_metadata_break'] ) ) : 
		$geoformat_metadata_break = ''; 
	else : 
		$geoformat_metadata_break = $get_meta['print_geoformat_metadata_break'];
	endif;
?>
	<p><?php echo __('Main title alignment ', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_maintitle_alignment]'>
		<option value='1' <?php selected($geoformat_maintitle_alignment, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_maintitle_alignment, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_maintitle_alignment, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Main title font size', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_maintitle_font_size]' value='<?php echo $geoformat_maintitle_font_size; ?>'> points
	
	<p><?php echo __('Main title font color', 'geoformat'); ?></p>
	<input type="cover" class="meta-color" id="print_geoformat_maintitle_font_color" class="regular-cover" name="print_settings[print_geoformat_maintitle_font_color]" value="<?php echo $geoformat_maintitle_font_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Margin top', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_title_top_margin]' value='<?php echo $gf_maintitle_top_margin; ?>'> mm
	
	<p><?php echo __('Margin bottom', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_title_bottom_margin]' value='<?php echo $gf_maintitle_bottom_margin; ?>'> mm
	
	<p><?php echo __('Break page after maintitle', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_maintitle_break]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_maintitle_break]' <?php checked( $geoformat_maintitle_break, 1 ); ?> value='1'>
	<br/>
	<br/>
	</p> 	
	<hr style="boder:none!important;border-top:1px dotted grey!important;padding:0!important;width:66%;float:left;">
	<br/>
	<p><?php echo __('Main title multimedia alignment (image, map or video)', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_maintitle_image_alignment]'>
		<option value='1' <?php selected($geoformat_maintitle_image_alignment, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_maintitle_image_alignment, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_maintitle_image_alignment, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	<p><?php echo __('Multimedia element width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_maintitle_image_width]' value='<?php echo $geoformat_maintitle_image_width; ?>'> %
	
	<p><?php echo __('Margin top', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_maintitle_image_top_margin]' value='<?php echo $geoformat_maintitle_image_top_margin; ?>'> mm
	
	<p><?php echo __('Margin bottom', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_maintitle_image_bottom_margin]' value='<?php echo $geoformat_maintitle_image_bottom_margin; ?>'> mm
		
	<p><?php echo __('Multimedia element border', 'geoformat'); ?></p>
	<select name='print_settings[print_maintitle_image_border_style]'>
		<option value='1' <?php selected($maintitle_image_border_style, "1"); ?>><?php echo __('No border','geoformat') ?></option>
		<option value='2' <?php selected($maintitle_image_border_style, "2"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='3' <?php selected($maintitle_image_border_style, "3"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='4' <?php selected($maintitle_image_border_style, "4"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='5' <?php selected($maintitle_image_border_style, "5"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Border color', 'geoformat'); ?></p>
	<input type="cover" class="meta-color" id="print_geoformat_maintitle_image_color" class="regular-cover" name="print_settings[print_geoformat_maintitle_image_color]" value="<?php echo $maintitle_image_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Border width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_maintitle_image_border_width]' value='<?php echo $maintitle_image_border_width; ?>'> mm
	
	<p><?php echo __('Border padding', 'geoformat'); ?></p> 
	<input type='text' class='small' name='print_settings[print_maintitle_image_border_padding]' value='<?php echo $maintitle_image_border_padding; ?>'> mm
		
	<p><?php echo __('Do not display the multimedia element', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
		<input name='print_settings[print_geoformat_display_maintitle_image]' value='0' type='hidden'>
		<input type='checkbox' name='print_settings[print_geoformat_display_maintitle_image]' <?php checked( $geoformat_display_maintitle_image, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Break page after the multimedia element', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_maintitle_image_break]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_maintitle_image_break]' <?php checked( $geoformat_maintitle_image_break, 1 ); ?> value='1'>
	<br/>
	<br/>
	</p> 
	
	<hr style="boder:none!important;border-top:1px dotted grey!important;padding:0!important;width:66%;float:left;">
	<br/>
	<p><?php echo __('Do not display the author', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_metadata_author]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_metadata_author]' <?php checked( $geoformat_metadata_author, 1 ); ?> value='1'>
	</p> 

	<p><?php echo __('Do not display the author of the images', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_metadata_image]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_metadata_image]' <?php checked( $geoformat_metadata_image, 1 ); ?> value='1'>
	</p> 

	<p><?php echo __('Do not display date', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_metadata_date]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_metadata_date]' <?php checked( $geoformat_metadata_date, 1 ); ?> value='1'>
	</p> 
	
	<p><?php echo __('Metadata alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_metadata_align]'>
		<option value='1' <?php selected($geoformat_metadata_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_metadata_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_metadata_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border', 'geoformat'); ?></p>
	<select name='print_settings[geoformat_metadata_border]'>
		<option value='1' <?php selected($geoformat_metadata_border, "1"); ?>><?php echo __('No border','geoformat');?></option>
		<option value='2' <?php selected($geoformat_metadata_border, "2"); ?>><?php echo __('Framed','geoformat');?></option>
		<option value='3' <?php selected($geoformat_metadata_border, "3"); ?>><?php echo __('Border top and bottom','geoformat');?></option>
		<option value='4' <?php selected($geoformat_metadata_border, "4"); ?>><?php echo __('Border bottom','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border style', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_metadata_border_style]'>
		<option value='1' <?php selected($geoformat_metadata_border_style, "1"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='2' <?php selected($geoformat_metadata_border_style, "2"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='3' <?php selected($geoformat_metadata_border_style, "3"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='4' <?php selected($geoformat_metadata_border_style, "4"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Border color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_metadata_border_color" class="regular-text" name="print_settings[print_metadata_border_color]" value="<?php echo $geoformat_metadata_border_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Border padding', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_metadata_border_padding]' value='<?php echo $geoformat_metadata_border_padding; ?>'> mm
	
	<p><?php echo __('Border width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_metadata_border_width]' value='<?php echo $geoformat_metadata_border_width; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_metadata_bottom]' value='<?php echo $geoformat_metadata_bottom; ?>'> mm
	
	<p><?php echo __('Break page after the metadata block', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_metadata_break]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_metadata_break]' <?php checked( $geoformat_metadata_break, 1 ); ?> value='1'>
	</p>
<?php }

function print_geoformat_introtext_function() {
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_geoformat_subtitle_font_size'] ) ) : 
		$geoformat_subtitle_font_size = '18'; 
	else : 
		$geoformat_subtitle_font_size = $get_meta['print_geoformat_subtitle_font_size'];
	endif;	
	if ( empty ( $get_meta['print_geoformat_subtitle_weight'] ) ) : 
		$geoformat_subtitle_weight = ''; 
	else : 
		$geoformat_subtitle_weight = $get_meta['print_geoformat_subtitle_weight'];
	endif;	
	if ( empty ( $get_meta['print_geoformat_subtitle_align'] ) ) : 
		$geoformat_subtitle_align = ''; 
	else : 
		$geoformat_subtitle_align = $get_meta['print_geoformat_subtitle_align'];
	endif;
	if ( empty ( $get_meta['print_geoformat_subtitle_border'] ) ) : 
		$geoformat_subtitle_border = ''; 
	else : 
		$geoformat_subtitle_border = $get_meta['print_geoformat_subtitle_border'];
	endif;
	if ( empty ( $get_meta['print_geoformat_subtitle_border_style'] ) ) : 
		$geoformat_subtitle_border_style = ''; 
	else : 
		$geoformat_subtitle_border_style = $get_meta['print_geoformat_subtitle_border_style'];
	endif;
	if (!empty ($get_meta['print_geoformat_subtitle_border_color']) ) :
		$geoformat_subtitle_border_color = $get_meta['print_geoformat_subtitle_border_color']; 
	else : 
		$geoformat_subtitle_border_color = GP_DEFAULT_TEXT_COLOR;
	endif;	
	if ( empty ( $get_meta['print_geoformat_subtitle_border_padding'] ) ) : 
		$geoformat_subtitle_border_padding = '5'; 
	else : 
		$geoformat_subtitle_border_padding = $get_meta['print_geoformat_subtitle_border_padding'];
	endif;
	if ( empty ( $get_meta['print_geoformat_subtitle_border_width'] ) ) : 
			$geoformat_subtitle_border_width = '0.5'; 
	else : 
		$geoformat_subtitle_border_width = $get_meta['print_geoformat_subtitle_border_width'];
	endif;
	if ( empty ( $get_meta['print_geoformat_subtitle_bottom'] ) ) : 
		$geoformat_subtitle_bottom = '5'; 
	else : 
		$geoformat_subtitle_bottom = $get_meta['print_geoformat_subtitle_bottom'];
	endif;
	if ( empty ( $get_meta['print_geoformat_subtitle_break'] ) ) : 
		$geoformat_subtitle_break = ''; 
	else : 
		$geoformat_subtitle_break = $get_meta['print_geoformat_subtitle_break'];
	endif;
	if ( empty ( $get_meta['print_geoformat_hat_font_size'] ) ) : 
		$geoformat_hat_font_size = '15'; 
	else : 
		$geoformat_hat_font_size = $get_meta['print_geoformat_hat_font_size'];
	endif;	
	if ( empty ( $get_meta['print_geoformat_hat_weight'] ) ) : 
		$geoformat_hat_weight = ''; 
	else :
		$geoformat_hat_weight = $get_meta['print_geoformat_hat_weight'];
	endif;	
	if ( empty ( $get_meta['print_geoformat_hat_align'] ) ) : 
		$geoformat_hat_align = ''; 
	else : 
		$geoformat_hat_align = $get_meta['print_geoformat_hat_align'];
	endif;
	if ( empty ( $get_meta['print_geoformat_hat_border'] ) ) : 
		$geoformat_hat_border = ''; 
	else : 
		$geoformat_hat_border = $get_meta['print_geoformat_hat_border'];
	endif;
	if (!empty ($get_meta['print_geoformat_hat_border_color']) ) :
		$geoformat_hat_border_color = $get_meta['print_geoformat_hat_border_color']; 
	else : 
		$geoformat_hat_border_color = GP_DEFAULT_TEXT_COLOR;
	endif;	
	if ( empty ( $get_meta['print_geoformat_hat_border_padding'] ) ) : 
		$geoformat_hat_border_padding = '5'; 
	else : 
		$geoformat_hat_border_padding = $get_meta['print_geoformat_hat_border_padding'];
	endif;
	if ( empty ( $get_meta['print_geoformat_hat_bottom'] ) ) : 
		$geoformat_hat_bottom = '5'; 
	else : 
		$geoformat_hat_bottom = $get_meta['print_geoformat_hat_bottom'];
	endif;
	if ( empty ( $get_meta['print_geoformat_introbloc_bottom'] ) ) : 
		$geoformat_introbloc_bottom = '10'; 
	else : 
		$geoformat_introbloc_bottom = $get_meta['print_geoformat_introbloc_bottom'];
	endif;
?>
	
	<p><?php echo __('Font-size', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_subtitle_font_size]' value='<?php echo $geoformat_subtitle_font_size; ?>'> points
	
	<p><?php echo __('Font weight', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_subtitle_weight]'>
		<option value='1' <?php selected($geoformat_subtitle_weight, "1"); ?>><?php echo __('Bold','geoformat');?></option>
		<option value='2' <?php selected($geoformat_subtitle_weight, "2"); ?>><?php echo __('Normal','geoformat');?></option>
	</select>
	
	<p><?php echo __('Subtitle alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_subtitle_align]'>
		<option value='1' <?php selected($geoformat_subtitle_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_subtitle_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_subtitle_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_subtitle_border]'>
		<option value='1' <?php selected($geoformat_subtitle_border, "1"); ?>><?php echo __('No border','geoformat');?></option>
		<option value='2' <?php selected($geoformat_subtitle_border, "2"); ?>><?php echo __('Framed','geoformat');?></option>
		<option value='3' <?php selected($geoformat_subtitle_border, "3"); ?>><?php echo __('Border top and bottom','geoformat');?></option>
		<option value='4' <?php selected($geoformat_subtitle_border, "4"); ?>><?php echo __('Border bottom','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border style', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_subtitle_border_style]'>
		<option value='1' <?php selected($geoformat_subtitle_border_style, "1"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='2' <?php selected($geoformat_subtitle_border_style, "2"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='3' <?php selected($geoformat_subtitle_border_style, "3"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='4' <?php selected($geoformat_subtitle_border_style, "4"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Border color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_geoformat_subtitle_border_color" class="regular-text" name="print_settings[print_geoformat_subtitle_border_color]" value="<?php echo $geoformat_subtitle_border_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Border padding', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_subtitle_border_padding]' value='<?php echo $geoformat_subtitle_border_padding; ?>'> mm
	
	<p><?php echo __('Border width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_subtitle_border_width]' value='<?php echo $geoformat_subtitle_border_width; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_subtitle_bottom]' value='<?php echo $geoformat_subtitle_bottom; ?>'> mm
	
	<p><?php echo __('Break page after the subtitle block', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_subtitle_break]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_subtitle_break]' <?php checked( $geoformat_subtitle_break, 1 ); ?> value='1'>
	<br/>
	<br/>
	</p> 
	
	<hr style="boder:none!important;border-top:1px dotted grey!important;padding:0!important;width:66%;float:left;">
	<br/>

	<p><?php echo __('Font-size of the hat', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_hat_font_size]' value='<?php echo $geoformat_hat_font_size; ?>'> points
	
	<p><?php echo __('Font weight of the hat', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_hat_weight]'>
		<option value='1' <?php selected($geoformat_hat_weight, "1"); ?>><?php echo __('Bold','geoformat');?></option>
		<option value='2' <?php selected($geoformat_hat_weight, "2"); ?>><?php echo __('Normal','geoformat');?></option>
	</select>
	
	<p><?php echo __('Hat alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_hat_align]'>
		<option value='1' <?php selected($geoformat_hat_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_hat_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_hat_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		<option value='4' <?php selected($geoformat_hat_align, "4"); ?>><?php echo __('Justify','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border under the hat', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_hat_border]'>
		<option value='1' <?php selected($geoformat_hat_border, "1"); ?>><?php echo __('No border','geoformat');?></option>
		<option value='2' <?php selected($geoformat_hat_border, "2"); ?>><?php echo __('Thin','geoformat');?></option>
		<option value='3' <?php selected($geoformat_hat_border, "3"); ?>><?php echo __('Regular','geoformat');?></option>
		<option value='4' <?php selected($geoformat_hat_border, "4"); ?>><?php echo __('Bold','geoformat');?></option>
	</select>
	
	<p><?php echo __('Border color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_geoformat_hat_border_color" class="regular-text" name="print_settings[print_geoformat_hat_border_color]" value="<?php echo $geoformat_hat_border_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Border bottom padding', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_hat_border_padding]' value='<?php echo $geoformat_hat_border_padding; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_hat_bottom]' value='<?php echo $geoformat_hat_bottom; ?>'> mm
	
	<p><?php echo __('Bottom margin under the introduction block', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_introbloc_bottom]' value='<?php echo $geoformat_introbloc_bottom; ?>'> mm

<?php
}

function print_geoformat_section_title_function() {
	$get_meta = get_option( 'print_settings' );
	
	if ( empty ( $get_meta['print_geoformat_section_title_font_size'] ) ) : 
		$geoformat_section_title_font_size = '38'; 
	else : 
		$geoformat_section_title_font_size = $get_meta['print_geoformat_section_title_font_size'];
	endif;
	
	if ( empty ( $get_meta['print_geoformat_section_title_line_height'] ) ) : 
		$geoformat_section_title_line_height = '48'; 
	else : 
		$geoformat_section_title_line_height = $get_meta['print_geoformat_section_title_line_height'];
	endif;
	if ( empty ( $get_meta['print_geoformat_section_title_color'] ) ) : 
		$geoformat_section_title_font_color = GP_DEFAULT_TEXT_COLOR;
	else : 
		$geoformat_section_title_font_color = $get_meta['print_geoformat_section_title_color'];
	endif;
	if ( empty ( $get_meta['print_geoformat_section_title_alignment'] ) ) : 
		$geoformat_section_title_align = '';
	else : 
		$geoformat_section_title_align = $get_meta['print_geoformat_section_title_alignment'];
	endif;
	if ( empty ( $get_meta['print_geoformat_section_title_top_margin'] ) ) : 
		$geoformat_section_title_top_margin = '10';
	else : 
		$geoformat_section_title_top_margin = $get_meta['print_geoformat_section_title_top_margin'];
	endif;
	if ( empty ( $get_meta['print_geoformat_section_title_bottom_margin'] ) ) : 
		$geoformat_section_title_bottom_margin = '10';
	else : 
		$geoformat_section_title_bottom_margin = $get_meta['print_geoformat_section_title_bottom_margin'];
	endif;
	if ( empty ( $get_meta['print_geoformat_section_multimedia_element'] ) ) : 
		$geoformat_multimedia_element = '';
	else : 
		$geoformat_multimedia_element = $get_meta['print_geoformat_section_multimedia_element'];
	endif;
	if ( empty ( $get_meta['print_geoformat_multimedia_width'] ) ) : 
		$geoformat_multimedia_width = '100'; 
	else : 
		$geoformat_multimedia_width = $get_meta['print_geoformat_multimedia_width'];
	endif;	
	if ( empty ( $get_meta['print_geoformat_multimedia_top_margin'] ) ) : 
		$geoformat_multimedia_top_margin = '10';
	else : 
		$geoformat_multimedia_top_margin = $get_meta['print_geoformat_multimedia_top_margin'];
	endif;
	if ( empty ( $get_meta['print_geoformat_multimedia_bottom_margin'] ) ) : 
		$geoformat_multimedia_bottom_margin = '10';
	else : 
		$geoformat_multimedia_bottom_margin = $get_meta['print_geoformat_multimedia_bottom_margin'];
	endif;
	if ( empty ( $get_meta['print_multimedia_border_style'] ) ) : 
		$multimedia_border_style = ''; 
	else : 
		$multimedia_border_style = $get_meta['print_multimedia_border_style'];
	endif;	
	if ( empty ( $get_meta['print_multimedia_border_width'] ) ) : 
		$multimedia_border_width = '0.5'; 
	else : 
		$multimedia_border_width = $get_meta['print_multimedia_border_width'];
	endif;	
	if ( empty ( $get_meta['print_multimedia_border_padding'] ) ) : 
		$multimedia_border_padding = '5'; 
	else : 
		$multimedia_border_padding = $get_meta['print_multimedia_border_padding'];
	endif;
	if ( empty ( $get_meta['print_geoformat_multimedia_color'] ) ) : 
		$geoformat_section_multimedia_color = GP_DEFAULT_TEXT_COLOR;
	else : 
		$geoformat_section_multimedia_color = $get_meta['print_geoformat_multimedia_color'];
	endif;
	if ( empty ( $get_meta['print_geoformat_display_caption'] ) ) : 
		$geoformat_display_caption = '';
	else : 
		$geoformat_display_caption = $get_meta['print_geoformat_display_caption'];
	endif;
	if ( empty ( $get_meta['print_geoformat_caption_font_size'] ) ) : 
		$geoformat_caption_font_size = '10'; 
	else : 
		$geoformat_caption_font_size = $get_meta['print_geoformat_caption_font_size'];
	endif;
	if ( empty ( $get_meta['print_geoformat_caption_style'] ) ) : 
		$geoformat_caption_style = ''; 
	else : 
		$geoformat_caption_style = $get_meta['print_geoformat_caption_style'];
	endif;
	if ( empty ( $get_meta['print_geoformat_caption_color'] ) ) : 
		$geoformat_caption_font_color = GP_DEFAULT_TEXT_COLOR;
	else : 
		$geoformat_caption_font_color = $get_meta['print_geoformat_caption_color'];
	endif;
	if ( empty ( $get_meta['print_geoformat_caption_alignment'] ) ) : 
		$geoformat_caption_alignment = '';
	else : 
		$geoformat_caption_alignment = $get_meta['print_geoformat_caption_alignment'];
	endif;
	if ( empty ( $get_meta['print_geoformat_caption_bottom_margin'] ) ) : 
		$geoformat_caption_bottom_margin = '10';
	else : 
		$geoformat_caption_bottom_margin = $get_meta['print_geoformat_caption_bottom_margin'];
	endif;
	if ( empty ( $get_meta['print_geoformat_section_break'] ) ) : 
		$geoformat_section_break = ''; 
	else : 
		$geoformat_section_break = $get_meta['print_geoformat_section_break'];
	endif;
?>
	<p><?php echo __('Section title alignment ', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_section_title_alignment]'>
		<option value='1' <?php selected($geoformat_section_title_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_section_title_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_section_title_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Font size', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_section_title_font_size]' value='<?php echo $geoformat_section_title_font_size; ?>'> points
	
	<p><?php echo __('Line-height', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_section_title_line_height]' value='<?php echo $geoformat_section_title_line_height; ?>'> points
	
	<p><?php echo __('Font color', 'geoformat'); ?></p>
	<input type="cover" class="meta-color" id="print_geoformat_section_title_color" class="regular-cover" name="print_settings[print_geoformat_section_title_color]" value="<?php echo $geoformat_section_title_font_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Margin top', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_section_title_top_margin]' value='<?php echo $geoformat_section_title_top_margin; ?>'> mm
	
	<p><?php echo __('Margin bottom', 'geoformat'); ?><br/>
		<input type='cover' class='small' name='print_settings[print_geoformat_section_title_bottom_margin]' value='<?php echo $geoformat_section_title_bottom_margin; ?>'> mm
	<br/>
	<br/>
	</p> 
	
	<hr style="boder:none!important;border-top:1px dotted grey!important;padding:0!important;width:66%;float:left;">
	<br/>
	<p><?php echo __('Multimedia element (image, map or video)', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_section_multimedia_element]'>
		<option value='1' <?php selected($geoformat_multimedia_element, "1"); ?>><?php echo __('Display after title','geoformat');?></option>
		<option value='2' <?php selected($geoformat_multimedia_element, "2"); ?>><?php echo __('Display before title','geoformat');?></option>
		<option value='3' <?php selected($geoformat_multimedia_element, "3"); ?>><?php echo __('Do not display','geoformat');?></option>
	</select>
	
	<p><?php echo __('Multimedia content width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_multimedia_width]' value='<?php echo $geoformat_multimedia_width; ?>'> %
	
	<p><?php echo __('Margin top', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_multimedia_top_margin]' value='<?php echo $geoformat_multimedia_top_margin; ?>'> mm
	
	<p><?php echo __('Margin bottom', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_multimedia_bottom_margin]' value='<?php echo $geoformat_multimedia_bottom_margin; ?>'> mm
		
	<p><?php echo __('Multimedia content border', 'geoformat'); ?></p>
	<select name='print_settings[print_multimedia_border_style]'>
		<option value='1' <?php selected($multimedia_border_style, "1"); ?>><?php echo __('No multimedia border','geoformat') ?></option>
		<option value='2' <?php selected($multimedia_border_style, "2"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='3' <?php selected($multimedia_border_style, "3"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='4' <?php selected($multimedia_border_style, "4"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='5' <?php selected($multimedia_border_style, "5"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
	
	<p><?php echo __('Border color', 'geoformat'); ?></p>
	<input type="cover" class="meta-color" id="print_geoformat_multimedia_color" class="regular-cover" name="print_settings[print_geoformat_multimedia_color]" value="<?php echo $geoformat_section_multimedia_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Multimedia border width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_multimedia_border_width]' value='<?php echo $multimedia_border_width; ?>'> mm
	
	<p><?php echo __('Multimedia border padding', 'geoformat'); ?><br/>
	<input type='text' class='small' name='print_settings[print_multimedia_border_padding]' value='<?php echo $multimedia_border_padding; ?>'> mm
	<br/>
	<br/>
	</p> 
	
	<hr style="boder:none!important;border-top:1px dotted grey!important;padding:0!important;width:66%;float:left;">
	<br/>
	<p><?php echo __('Do not display caption', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
		<input name='print_settings[print_geoformat_display_caption]' value='0' type='hidden'>
		<input type='checkbox' name='print_settings[print_geoformat_display_caption]' <?php checked( $geoformat_display_caption, 1 ); ?> value='1'>
		</p>
	
	<p><?php echo __('Caption font size', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_caption_font_size]' value='<?php echo $geoformat_caption_font_size; ?>'> points
	
	<p><?php echo __('Caption style', 'geoformat'); ?></p>
		<select name='print_settings[print_geoformat_caption_style]'>
		<option value='1' <?php selected($geoformat_caption_style, "1"); ?>><?php echo __('Normal','geoformat');?></option>
		<option value='2' <?php selected($geoformat_caption_style, "2"); ?>><?php echo __('Italic','geoformat');?></option>
	</select>
	
	<p><?php echo __('Font color', 'geoformat'); ?></p>
	<input type="cover" class="meta-color" id="print_geoformat_caption_color" class="regular-cover" name="print_settings[print_geoformat_caption_color]" value="<?php echo $geoformat_caption_font_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Caption alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_caption_alignment]'>
		<option value='1' <?php selected($geoformat_caption_alignment, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_caption_alignment, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_caption_alignment, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Margin bottom', 'geoformat'); ?></p>
		<input type='cover' class='small' name='print_settings[print_geoformat_caption_bottom_margin]' value='<?php echo $geoformat_caption_bottom_margin; ?>'> mm
	
	<p><?php echo __('Break page after section title', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_section_break]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_section_break]' <?php checked( $geoformat_section_break, 1 ); ?> value='1'>
	</p>
<?php }

function print_geoformat_options_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_geoformat_page_width'] ) ) : 
			$geoformat_page_width = '100'; 
		else : 
			$geoformat_page_width = $get_meta['print_geoformat_page_width'];
		endif;
		if ( empty ( $get_meta['print_geoformat_geoformat_columns'] ) ) : 
			$geoformat_geoformat_columns = '1'; 
		else : 
			$geoformat_geoformat_columns = $get_meta['print_geoformat_geoformat_columns'];
		endif;
		if ( empty ( $get_meta['print_geoformat_columns_fill'] ) ) : 
			$geoformat_columns_fill = ''; 
		else : 
			$geoformat_columns_fill = $get_meta['print_geoformat_columns_fill'];
		endif;
		if ( empty ( $get_meta['print_geoformat_geoformat_columns_gutter'] ) ) : 
			$geoformat_geoformat_columns_gutter = '5'; 
		else : 
			$geoformat_geoformat_columns_gutter = $get_meta['print_geoformat_geoformat_columns_gutter'];
		endif;
		if ( empty ( $get_meta['print_geoformat_columns_filet'] ) ) : 
			$geoformat_columns_filet = ''; 
		else : 
			$geoformat_columns_filet = $get_meta['print_geoformat_columns_filet'];
		endif;
		$geoformat_options = get_option( 'gp_options' );
		$geoformat_font_text = $geoformat_options['font_text'];
		if ( empty ( $get_meta['print_geoformat_font_text'] ) ) : 
			$geoformat_font_text = $geoformat_font_text; 
		else : 
			$geoformat_font_text = $get_meta['print_geoformat_font_text'];
		endif;
		
		if ( empty ( $get_meta['print_geoformat_text_font_size'] ) ) : 
			$geoformat_text_size = '13';
		else : 
			$geoformat_text_size = $get_meta['print_geoformat_text_font_size'];
		endif;
		
		if ( empty ( $get_meta['print_geoformat_text_line_height'] ) ) : 
			$geoformat_line_height = '19';
		else : 
			$geoformat_line_height = $get_meta['print_geoformat_text_line_height'];
		endif;
		
		if ( empty ($get_meta['print_geoformat_color_text']) ) :
			$geoformat_text_font_color = GP_DEFAULT_TEXT_COLOR;
		else : 
			$geoformat_text_font_color = $get_meta['print_geoformat_color_text']; 
		endif;
		if ( empty ( $get_meta['print_geoformat_text_alignment'] ) ) : 
			$geoformat_text_align = ''; 
		else : 
			$geoformat_text_align = $get_meta['print_geoformat_text_alignment'];
		endif;
		if ( empty ( $get_meta['print_geoformat_text_subtitles_alignment'] ) ) : 
			$geoformat_text_subtitles_align = ''; 
		else : 
			$geoformat_text_subtitles_align = $get_meta['print_geoformat_text_subtitles_alignment'];
		endif;
		if ( empty ( $get_meta['print_geoformat_dropcap'] ) ) : 
			$geoformat_dropcap = ''; 
		else : 
			$geoformat_dropcap = $get_meta['print_geoformat_dropcap'];
		endif;
		if ( empty ( $get_meta['print_geoformat_break'] ) ) : 
			$geoformat_break = ''; 
		else : 
			$geoformat_break = $get_meta['print_geoformat_break'];
		endif;
?>
	<p><?php echo __('Content width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_page_width]' value='<?php echo $geoformat_page_width; ?>'> %
	
	<p><?php echo __('Content columns ', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_geoformat_columns]' value='<?php echo $geoformat_geoformat_columns; ?>'>
	
	<p><?php echo __('Columns gutter ', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_geoformat_columns_gutter]' value='<?php echo $geoformat_geoformat_columns_gutter; ?>'> mm
	
	<p><?php echo __('Add a net between columns', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_columns_filet]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_columns_filet]' <?php checked( $geoformat_columns_filet, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Fill column', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_columns_fill]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_columns_fill]' <?php checked( $geoformat_columns_fill, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Typography', 'geoformat'); ?></p>
	<select name="print_settings[print_geoformat_font_text]" id="print_geoformat_font_text">
		<option value="select-seventeen" <?php selected($geoformat_font_text, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($geoformat_font_text, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($geoformat_font_text, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($geoformat_font_text, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($geoformat_font_text, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($geoformat_font_text, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($geoformat_font_text, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($geoformat_font_text, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($geoformat_font_text, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($geoformat_font_text, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($geoformat_font_text, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($geoformat_font_text, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($geoformat_font_text, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($geoformat_font_text, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($geoformat_font_text, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($geoformat_font_text, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($geoformat_font_text, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($geoformat_font_text, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($geoformat_font_text, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($geoformat_font_text, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($geoformat_font_text, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($geoformat_font_text, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($geoformat_font_text, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($geoformat_font_text, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($geoformat_font_text, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($geoformat_font_text, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($geoformat_font_text, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($geoformat_font_text, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($geoformat_font_text, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($geoformat_font_text, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($geoformat_font_text, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($geoformat_font_text, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	
	<p><?php echo __('Font size', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_text_font_size]' value='<?php echo $geoformat_text_size; ?>'> points
	
	<p><?php echo __('Line-height', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_text_line_height]' value='<?php echo $geoformat_line_height; ?>'> points

	<p><?php echo __('Font color', 'geoformat'); ?></p>
	<input type="text" class="meta-color" id="print_geoformat_color_text" class="regular-text" name="print_settings[print_geoformat_color_text]" value="<?php echo $geoformat_text_font_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">
	
	<p><?php echo __('Text alignment ', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_text_alignment]'>
		<option value='1' <?php selected($geoformat_text_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_text_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_text_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		<option value='4' <?php selected($geoformat_text_align, "4"); ?>><?php echo __('Justify','geoformat');?></option>
	</select>
	
	<p><?php echo __('Subtitles alignment ', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_text_subtitles_alignment]'>
		<option value='1' <?php selected($geoformat_text_subtitles_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_text_subtitles_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_text_subtitles_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Do not display dropcap', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_dropcap]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_dropcap]' <?php checked( $geoformat_dropcap, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Break page after each section', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_geoformat_break]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_break]' <?php checked( $geoformat_break, 1 ); ?> value='1'>
	</p>

<?php }

function print_geoformat_images_function() { 

	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_geoformat_images'] ) ) : 
		$print_geoformat_images = ''; 
	else : 
		$print_geoformat_images = $get_meta['print_geoformat_images'];
	endif;
	
	if ( empty ( $get_meta['print_geoformat_image_width'] ) ) : 
		$geoformat_image_width = '100'; 
	else : 
		$geoformat_image_width = $get_meta['print_geoformat_image_width'];
	endif;
	
	if ( empty ( $get_meta['print_geoformat_images_margin_top'] ) ) : 
		$geoformat_images_margin_top = '0'; 
	else : 
		$geoformat_images_margin_top = $get_meta['print_geoformat_images_margin_top'];
	endif;
	if ( empty ( $get_meta['print_geoformat_images_margin_bottom'] ) ) : 
		$geoformat_images_margin_bottom = '20'; 
	else : 
		$geoformat_images_margin_bottom = $get_meta['print_geoformat_images_margin_bottom'];
	endif;
	
	if ( empty ( $get_meta['print_geoformat_images_align'] ) ) : 
		$geoformat_images_align = ''; 
	else : 
		$geoformat_images_align = $get_meta['print_geoformat_images_align'];
	endif;	
?>
	<p><?php echo __('Do not print images', 'geoformat'); ?> &nbsp;&nbsp;
	<input name='print_settings[print_geoformat_images]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_images]' <?php checked( $print_geoformat_images, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Images width', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_geoformat_image_width]' value='<?php echo $geoformat_image_width; ?>'> %
		
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_images_margin_top]' value='<?php echo $geoformat_images_margin_top; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_images_margin_bottom]' value='<?php echo $geoformat_images_margin_bottom; ?>'> mm
		
	<p><?php echo __('Alignment', 'geoformat'); ?></p>
	<select name='print_settings[print_geoformat_images_align]'>
		<option value='1' <?php selected($geoformat_images_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_images_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_images_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>		
<?php }

function print_geoformat_embed_function() { 

	$get_meta = get_option( 'print_settings' );
	
	if ( empty ( $get_meta['print_geoformat_embed'] ) ) : 
		$print_geoformat_embed = ''; 
	else : 
		$print_geoformat_embed = $get_meta['print_geoformat_embed'];
	endif;
	
	if ( empty ( $get_meta['print_geoformat_embed_margin_top'] ) ) : 
		$geoformat_embed_margin_top = '0'; 
	else : 
		$geoformat_embed_margin_top = $get_meta['print_geoformat_embed_margin_top'];
	endif;
	if ( empty ( $get_meta['print_geoformat_embed_margin_bottom'] ) ) : 
		$geoformat_embed_margin_bottom = '20'; 
	else : 
		$geoformat_embed_margin_bottom = $get_meta['print_geoformat_embed_margin_bottom'];
	endif;

?>
	<p><?php echo __('Do not print embed content', 'geoformat'); ?> &nbsp;&nbsp;
	<input name='print_settings[print_geoformat_embed]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_geoformat_embed]' <?php checked( $print_geoformat_embed, 1 ); ?> value='1'>
	</p>
		
	<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_embed_margin_top]' value='<?php echo $geoformat_embed_margin_top; ?>'> mm
	
	<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_geoformat_embed_margin_bottom]' value='<?php echo $geoformat_embed_margin_bottom; ?>'> mm
			
<?php }

function print_geoformat_number_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['geoformat_page_number'] ) ) : 
			$geoformat_page_number = ''; 
		else : 
			$geoformat_page_number = $get_meta['geoformat_page_number'];
		endif;
		
	if ( empty ( $get_meta['geoformat_page_number_position'] ) ) : 
			$geoformat_page_number_position = ''; 
		else : 
			$geoformat_page_number_position = $get_meta['geoformat_page_number_position'];
		endif;
	
	if ( empty ( $get_meta['geoformat_page_number_start'] ) ) : 
			$geoformat_page_number_start = '1'; 
		else : 
			$geoformat_page_number_start = $get_meta['geoformat_page_number_start'];
		endif;
?>
	<p><?php echo __('Activate page numbering', 'geoformat'); ?></p>
	<input name='print_settings[geoformat_page_number]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[geoformat_page_number]' <?php checked( $geoformat_page_number, 1 ); ?> value='1'>

	<p><?php echo __('Position', 'geoformat'); ?></p>
	<select name='print_settings[geoformat_page_number_position]'>
		<option value='1' <?php selected($geoformat_page_number_position, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($geoformat_page_number_position, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($geoformat_page_number_position, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
	
	<p><?php echo __('Start numbering from', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[geoformat_page_number_start]' value='<?php echo $geoformat_page_number_start; ?>'>
	<p><em><?php echo __('This function is experimental and does not work in all cases.','geoformat'); ?></em></p>
	
<?php }

function print_geoformat_css_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_geoformat_css'] ) ) : 
			$geoformat_css = ''; 
		else : 
			$geoformat_css = $get_meta['print_geoformat_css'];
		endif;
?>
	<textarea class='bdn' type='geoformat_css' name='print_settings[print_geoformat_css]'><?php echo $geoformat_css; ?></textarea>
<?php }

//Cover

function print_cover_size_function() { 
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_cover_size'] ) ) : 
		$print_cover_size = ''; 
	else : 
		$print_cover_size = $get_meta['print_cover_size'];
	endif;
	if ( empty ( $get_meta['print_cover_paper_size'] ) ) : 
		$cover_paper_size = ''; 
	else : 
		$cover_paper_size = $get_meta['print_cover_paper_size'];
	endif;	
?>
	<select name='print_settings[print_cover_size]'>
		<option value='1' <?php selected($print_cover_size, "1"); ?>>A4</option>
		<option value='2' <?php selected($print_cover_size, "2"); ?>>A3</option>
		<option value='3' <?php selected($print_cover_size, "3"); ?>>B5</option>
		<option value='4' <?php selected($print_cover_size, "4"); ?>>Tabloid</option>
	</select>
	
	<p><?php echo __('Paper size', 'geoformat'); ?></p>
	<select name='print_settings[print_cover_paper_size]'>
		<option value='1' <?php selected($cover_paper_size, "1"); ?>><?php echo __('Portrait','geoformat');?></option>
		<option value='2' <?php selected($cover_paper_size, "2"); ?>><?php echo __('Landscape','geoformat');?></option>
	</select>
<?php }

function print_custom_size_activate_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_custom_size_activate'] ) ) : 
			$activate_custom = ''; 
		else : 
			$activate_custom = $get_meta['print_custom_size_activate'];
		endif;
		if ( empty ( $get_meta['print_custom_width'] ) ) : 
			$custom_width = ''; 
		else : 
			$custom_width = $get_meta['print_custom_width'];
		endif;
		if ( empty ( $get_meta['print_custom_height'] ) ) : 
			$custom_height = ''; 
		else : 
			$custom_height = $get_meta['print_custom_height'];
		endif;
?>
	<input name='print_settings[print_custom_size_activate]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_custom_size_activate]' <?php checked( $activate_custom, 1 ); ?> value='1'>
	<br/>
	<br/>
	<?php echo __('Width:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_custom_width]' value='<?php echo $custom_width; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Height:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_custom_height]' value='<?php echo $custom_height; ?>'> mm

<?php }

function print_crop_marks_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_crop_marks'] ) ) : 
			$crop_marks = ''; 
		else : 
			$crop_marks = $get_meta['print_crop_marks'];
		endif;
?>
	<input name='print_settings[print_crop_marks]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_crop_marks]' <?php checked( $crop_marks, 1 ); ?> value='1'>
<?php }

function print_margins_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_margin_top'] ) ) : 
			$margin_top = '15'; 
		else : 
			$margin_top = $get_meta['print_margin_top'];
		endif;
		if ( empty ( $get_meta['print_margin_left'] ) ) : 
			$margin_left = '10'; 
		else : 
			$margin_left = $get_meta['print_margin_left'];
		endif;
?>
	<?php echo __('Top & bottom:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_margin_top]' value='<?php echo $margin_top; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Left & right:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_margin_left]' value='<?php echo $margin_left; ?>'> mm

<?php }

function print_content_width_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_content_content_width'] ) ) : 
			$content_width = '100'; 
		else : 
			$content_width = $get_meta['print_content_content_width'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_content_content_width]' value='<?php echo $content_width; ?>'> %

<?php }

function print_content_vertical_align_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_content_vertical_align'] ) ) : 
			$vertical_align = ''; 
		else : 
			$vertical_align = $get_meta['print_content_vertical_align'];
		endif;
?>
	<select name='print_settings[print_content_vertical_align]'>
		<option value='1' <?php selected($vertical_align, "1"); ?>><?php echo __('Top','geoformat');?></option>
		<option value='2' <?php selected($vertical_align, "2"); ?>><?php echo __('Middle','geoformat');?></option>
		<option value='3' <?php selected($vertical_align, "3"); ?>><?php echo __('Bottom','geoformat');?></option>
	</select>
	
<?php }

function print_title_function() {
	$get_meta = get_option( 'print_settings' );
	$options = get_option( 'gp_options' );
	$font_title = $options['font_title'];
	if ( empty ( $get_meta['print_title'] ) ) : 
			$print_title = $font_title; 
		else : 
			$print_title = $get_meta['print_title'];
		endif;
?>

	<select name="print_settings[print_title]" id="print_title">
		<option value="select-seventeen" <?php selected($print_title, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($print_title, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($print_title, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($print_title, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($print_title, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($print_title, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($print_title, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($print_title, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($print_title, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($print_title, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($print_title, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($print_title, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($print_title, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($print_title, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($print_title, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($print_title, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($print_title, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($print_title, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($print_title, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($print_title, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($print_title, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($print_title, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($print_title, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($print_title, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($print_title, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($print_title, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($print_title, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($print_title, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($print_title, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($print_title, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($print_title, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($print_title, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<?php
}

function print_subtitle_function() {
	$get_meta = get_option( 'print_settings' );
	$options = get_option( 'gp_options' );
	$font_title = $options['font_title'];
	if ( empty ( $get_meta['print_subtitle'] ) ) : 
			$print_subtitle = $font_title; 
		else : 
			$print_subtitle = $get_meta['print_subtitle'];
		endif;
?>

	<select name="print_settings[print_subtitle]" id="print_subtitle">
		<option value="select-seventeen" <?php selected($print_subtitle, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($print_subtitle, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($print_subtitle, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($print_subtitle, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($print_subtitle, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($print_subtitle, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($print_subtitle, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($print_subtitle, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($print_subtitle, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($print_subtitle, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($print_subtitle, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($print_subtitle, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($print_subtitle, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($print_subtitle, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($print_subtitle, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($print_subtitle, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($print_subtitle, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($print_subtitle, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($print_subtitle, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($print_subtitle, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($print_subtitle, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($print_subtitle, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($print_subtitle, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($print_subtitle, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($print_subtitle, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($print_subtitle, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($print_subtitle, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($print_subtitle, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($print_subtitle, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($print_subtitle, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($print_subtitle, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($print_subtitle, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<?php
}

function print_title_font_size_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_title_size'] ) ) : 
			$print_title_size = '36'; 
		else : 
			$print_title_size = $get_meta['print_title_size'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_title_size]' value='<?php echo $print_title_size; ?>'> points

<?php }

function print_subtitle_font_size_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_subtitle_size'] ) ) : 
			$print_subtitle_size = '26'; 
		else : 
			$print_subtitle_size = $get_meta['print_subtitle_size'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_subtitle_size]' value='<?php echo $print_subtitle_size; ?>'> points

<?php }

function print_color_title_function() {
	$get_meta = get_option( 'print_settings' );
	if (!empty ($get_meta['print_color_title']) ) :
		$print_color_title = $get_meta['print_color_title']; 
		else : $print_color_title = GP_DEFAULT_TEXT_COLOR;
	endif;

	?>

	<input type="text" class="meta-color" id="print_color_title" class="regular-text" name="print_settings[print_color_title]" value="<?php echo $print_color_title; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<?php
}

function print_color_subtitle_function() {
	$get_meta = get_option( 'print_settings' );
	if (!empty ($get_meta['print_color_subtitle']) ) :
		$print_color_subtitle = $get_meta['print_color_subtitle']; 
		else : $print_color_subtitle = GP_DEFAULT_TEXT_COLOR;
	endif;

	?>

	<input type="text" class="meta-color" id="print_color_subtitle" class="regular-text" name="print_settings[print_color_subtitle]" value="<?php echo $print_color_subtitle; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<?php
}

function print_font_text_function() {
	$get_meta = get_option( 'print_settings' );
	$options = get_option( 'gp_options' );
	$font_text = $options['font_text'];
	if ( empty ( $get_meta['font_text'] ) ) : 
			$font_text = $font_text; 
		else : 
			$font_text = $get_meta['print_font_text'];
		endif;
?>

	<select name="print_settings[print_font_text]" id="print_font_text">
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
		<option value="select-eleven" <?php selected($font_text, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($font_text, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($font_text, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($font_text, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($font_text, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($font_text, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
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
		<option value="select-twenty-nine" <?php selected($font_text, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($font_text, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($font_text, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($font_text, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<?php
}

function print_color_text_function() {
	$get_meta = get_option( 'print_settings' );
	if (!empty ($get_meta['print_color_text']) ) :
		$print_color_text = $get_meta['print_color_text']; 
		else : $print_color_text = GP_DEFAULT_TEXT_COLOR;
	endif;

	?>

	<input type="text" class="meta-color" id="print_color_text" class="regular-text" name="print_settings[print_color_text]" value="<?php echo $print_color_text; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<?php
}

function print_color_background_function() {
	$get_meta = get_option( 'print_settings' );
	if (!empty ($get_meta['print_color_background']) ) :
		$print_color_background = $get_meta['print_color_background']; 
		else : $print_color_background = GP_DEFAULT_TITLE_COLOR;
	endif;

	?>

	<input type="background" class="meta-color" id="print_color_background" class="regular-background" name="print_settings[print_color_background]" value="<?php echo $print_color_background; ?>" data-default-color="<?php echo GP_DEFAULT_TITLE_COLOR; ?>">
	<p class="ita">
		<?php _e('To be printed, you must activate "Print background and image" in the settings of your browser.', 'geoformat'); ?> 
	</p>
	<?php
}

function print_image_background_function() { 
	$get_meta = get_option( 'print_settings' );
		if (empty ($get_meta['print_image_background'])) : 
			$background_image = ''; 
		else : 
			$background_image = $get_meta['print_image_background'];
		endif;
	?>
	<input class='bdn' type='text' id='print-background' name='print_settings[print_image_background]' value='<?php echo $background_image; ?>'>
	<input class='btn' type='button' id='print-background-button' value='<?php _e( 'Charger', 'geoformat' )?>' />
	<p class="ita">
		<?php _e('72 DPI for digital printing, 300 DPI for offset printing. To be printed, you must activate "Print background and image" in the settings of your browser.', 'geoformat'); ?> 
	</p>	
					
				<div id="print-background-display">
					<img src="<?php echo $background_image; ?>" id="print-background-default" class="img" />			
					<div class="clear"></div>
					<button class="btn" id="delete"><?php _e('Supprimer l\'image', 'geoformat'); ?></button>
				</div>
	<?php if ( empty ( $get_meta['print_background_vertical_align'] ) ) : 
			$background_vertical_align = ''; 
		else : 
			$background_vertical_align = $get_meta['print_background_vertical_align'];
		endif;
	?>
	<p><?php echo __('Vertical positioning of the image','geoformat'); ?></p>
	<select name='print_settings[print_background_vertical_align]'>
		<option value='1' <?php selected($background_vertical_align, "1"); ?>><?php echo __('Top','geoformat');?></option>
		<option value='2' <?php selected($background_vertical_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($background_vertical_align, "3"); ?>><?php echo __('Bottom','geoformat');?></option>
	</select>
	<?php if ( empty ( $get_meta['print_background_horizontal_align'] ) ) : 
			$background_horizontal_align = ''; 
		else : 
			$background_horizontal_align = $get_meta['print_background_horizontal_align'];
		endif;
	?>
	<p><?php echo __('Horizontal positioning of the image','geoformat'); ?></p>
	<select name='print_settings[print_background_horizontal_align]'>
		<option value='1' <?php selected($background_horizontal_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($background_horizontal_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($background_horizontal_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
	</select>
<?php 
}

function print_title_options_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_title_align'] ) ) : 
			$print_title_align = ''; 
		else : 
			$print_title_align = $get_meta['print_title_align'];
		endif;
		
		if ( empty ( $get_meta['print_title_margin_top'] ) ) : 
			$title_margin_top = '0'; 
		else : 
			$title_margin_top = $get_meta['print_title_margin_top'];
		endif;
		if ( empty ( $get_meta['print_title_margin_bottom'] ) ) : 
			$title_margin_bottom = '20'; 
		else : 
			$title_margin_bottom = $get_meta['print_title_margin_bottom'];
		endif;
?>
		<p><?php echo __('Title alignment', 'geoformat'); ?></p>
		<select name='print_settings[print_title_align]'>
		<option value='1' <?php selected($print_title_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($print_title_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($print_title_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		</select>
		<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_title_margin_top]' value='<?php echo $title_margin_top; ?>'> mm
		<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_title_margin_bottom]' value='<?php echo $title_margin_bottom; ?>'> mm
<?php }

function print_subtitle_options_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_subtitle_align'] ) ) : 
			$print_subtitle_align = ''; 
		else : 
			$print_subtitle_align = $get_meta['print_subtitle_align'];
		endif;
		if ( empty ( $get_meta['print_subtitle_margin_top'] ) ) : 
			$subtitle_margin_top = '0'; 
		else : 
			$subtitle_margin_top = $get_meta['print_subtitle_margin_top'];
		endif;
		if ( empty ( $get_meta['print_subtitle_margin_bottom'] ) ) : 
			$subtitle_margin_bottom = '0'; 
		else : 
			$subtitle_margin_bottom = $get_meta['print_subtitle_margin_bottom'];
		endif;
?>
		<p><?php echo __('Subtitle alignment', 'geoformat'); ?></p>
		<select name='print_settings[print_subtitle_align]'>
		<option value='1' <?php selected($print_subtitle_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($print_subtitle_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($print_subtitle_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		</select>
		<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_subtitle_margin_top]' value='<?php echo $subtitle_margin_top; ?>'> mm
		<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_subtitle_margin_bottom]' value='<?php echo $subtitle_margin_bottom; ?>'> mm
<?php }


function print_text_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_text'] ) ) : 
			$text = ''; 
		else : 
			$text = $get_meta['print_text'];
		endif;
?>
	<textarea class='bdn' type='text' name='print_settings[print_text]'><?php echo $text; ?></textarea>
<?php }

function print_text_size_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_text_size'] ) ) : 
			$print_text_size = '16'; 
		else : 
			$print_text_size = $get_meta['print_text_size'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_text_size]' value='<?php echo $print_text_size; ?>'> points

<?php }

function print_text_options_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_text_align'] ) ) : 
			$print_text_align = ''; 
		else : 
			$print_text_align = $get_meta['print_text_align'];
		endif;
		
		if ( empty ( $get_meta['print_text_margin_top'] ) ) : 
			$text_margin_top = '0'; 
		else : 
			$text_margin_top = $get_meta['print_text_margin_top'];
		endif;
		if ( empty ( $get_meta['print_text_margin_bottom'] ) ) : 
			$text_margin_bottom = '0'; 
		else : 
			$text_margin_bottom = $get_meta['print_text_margin_bottom'];
		endif;
?>
		<p><?php echo __('Text alignment', 'geoformat'); ?></p>
		<select name='print_settings[print_text_align]'>
		<option value='1' <?php selected($print_text_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($print_text_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($print_text_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		</select>
		<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_text_margin_top]' value='<?php echo $text_margin_top; ?>'> mm
		<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_text_margin_bottom]' value='<?php echo $text_margin_bottom; ?>'> mm
<?php }

function print_text_position_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_text_position'] ) ) : 
			$text_position = '1'; 
		else : 
			$text_position = $get_meta['print_text_position'];
		endif;
?>
	<select name='print_settings[print_text_position]'>
		<option value='1' <?php selected($text_position, "1"); ?>><?php echo __('Before the title','geoformat') ?></option>
		<option value='2' <?php selected($text_position, "2"); ?>><?php echo __('After the title','geoformat') ?></option>
		<option value='3' <?php selected($text_position, "3"); ?>><?php echo __('After the subtitle','geoformat') ?></option>
	</select>
<?php }

function print_image_function() { 
	$get_meta = get_option( 'print_settings' );
		if (empty ($get_meta['print_image'])) : 
			$image = ''; 
		else : 
			$image = $get_meta['print_image'];
		endif;
	?>
	<input class='bdn' type='text' id='print-image' name='print_settings[print_image]' value='<?php echo $image; ?>'>
	<input class='btn' type='button' id='print-image-button' value='<?php _e( 'Charger', 'geoformat' )?>' />
	<p class="ita">
		<?php _e('72 DPI for digital printing, 300 DPI for offset printing.', 'geoformat'); ?> 
	</p>	
					
	<div id="print-image-display">
		<img src="<?php echo $image; ?>" id="print-image-default" class="img" />			
		<div class="clear"></div>
			<button class="btn" id="delete_image"><?php _e('Supprimer l\'image', 'geoformat'); ?></button>
	</div>
<?php }

function print_image_size_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_image_size'] ) ) : 
			$print_image_size = '100'; 
		else : 
			$print_image_size = $get_meta['print_image_size'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_image_size]' value='<?php echo $print_image_size; ?>'> mm

<?php }

function print_image_options_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_image_align'] ) ) : 
			$print_image_align = ''; 
		else : 
			$print_image_align = $get_meta['print_image_align'];
		endif;
		
		if ( empty ( $get_meta['print_image_margin_top'] ) ) : 
			$image_margin_top = '0'; 
		else : 
			$image_margin_top = $get_meta['print_image_margin_top'];
		endif;
		if ( empty ( $get_meta['print_image_margin_bottom'] ) ) : 
			$image_margin_bottom = '0'; 
		else : 
			$image_margin_bottom = $get_meta['print_image_margin_bottom'];
		endif;
?>
		<p><?php echo __('Image alignment', 'geoformat'); ?></p>
		<select name='print_settings[print_image_align]'>
		<option value='1' <?php selected($print_image_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($print_image_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($print_image_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		</select>
		<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_image_margin_top]' value='<?php echo $image_margin_top; ?>'> mm
		<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_image_margin_bottom]' value='<?php echo $image_margin_bottom; ?>'> mm
<?php }

function print_image_position_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_image_position'] ) ) : 
			$image_position = ''; 
		else : 
			$image_position = $get_meta['print_image_position'];
		endif;
?>
	<select name='print_settings[print_image_position]'>
		<option value='1' <?php selected($image_position, "1"); ?>><?php echo __('Before the title','geoformat') ?></option>
		<option value='2' <?php selected($image_position, "2"); ?>><?php echo __('After the title','geoformat') ?></option>
		<option value='3' <?php selected($image_position, "3"); ?>><?php echo __('After the subtitle','geoformat') ?></option>
		<option value='4' <?php selected($image_position, "4"); ?>><?php echo __('After the text','geoformat') ?></option>
	</select>
<?php }


function print_border_function() {
	$get_meta = get_option( 'print_settings' );
	
	if (!empty ($get_meta['border_elements']) ) :
		$elements = $get_meta['border_elements']; 
		else : $elements = "";
	endif;
	if (!empty ($get_meta['border_title']) ) :
		$border_title = $get_meta['border_title']; 
		else : $border_title = "";
	endif;
	if (!empty ($get_meta['border_subtitle']) ) :
		$border_subtitle = $get_meta['border_subtitle']; 
		else: $border_subtitle = "";
	endif;

	if (!empty ($get_meta['border_image']) ) :
		$border_image = $get_meta['border_image'];
		else: $border_image = "";
	endif;
	if (!empty ($get_meta['border_text']) ) :
		$border_text = $get_meta['border_text'];
		else: $border_text = "";
	endif;
	?>
	
	<input name='print_settings[print_border]' value='0' type='hidden'>
	<p>
		<input type="checkbox" name="print_settings[border_elements]" <?php checked( $elements, 1 ); ?> value='1'>
		<?php _e('Page elements', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="print_settings[border_title]" <?php checked( $border_title, 1 ); ?> value='1'>
		<?php _e('Title', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="print_settings[border_subtitle]" <?php checked( $border_subtitle, 1 ); ?> value='1'>
		<?php _e('Subtitle', 'geoformat'); ?>
	</p>
	
	
	<p>
		<input type="checkbox" name="print_settings[border_text]" <?php checked( $border_text, 1 ); ?> value='1'>
		<?php _e('Text', 'geoformat'); ?>
	</p>
	
	<p>
		<input type="checkbox" name="print_settings[border_image]" <?php checked( $border_image, 1 ); ?> value='1'>
		<?php _e('Image', 'geoformat'); ?>
	</p>	
	<?php
}

function print_border_style_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_border_style'] ) ) : 
			$border_style = ''; 
		else : 
			$border_style = $get_meta['print_border_style'];
		endif;
?>
	<select name='print_settings[print_border_style]'>
		<option value='1' <?php selected($border_style, "1"); ?>><?php echo __('Solid','geoformat') ?></option>
		<option value='2' <?php selected($border_style, "2"); ?>><?php echo __('Dotted','geoformat') ?></option>
		<option value='3' <?php selected($border_style, "3"); ?>><?php echo __('Dashed','geoformat') ?></option>
		<option value='4' <?php selected($border_style, "4"); ?>><?php echo __('Double','geoformat') ?></option>
	</select>
<?php }

function print_border_width_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_border_width'] ) ) : 
			$border_width = '1'; 
		else : 
			$border_width = $get_meta['print_border_width'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_border_width]' value='<?php echo $border_width; ?>'> mm

<?php }

function print_border_padding_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_border_padding'] ) ) : 
			$border_padding = '5'; 
		else : 
			$border_padding = $get_meta['print_border_padding'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_border_padding]' value='<?php echo $border_padding; ?>'> mm

<?php }

function print_border_color_function() {
	$get_meta = get_option( 'print_settings' );
	if (!empty ($get_meta['print_border_color']) ) :
		$border_color = $get_meta['print_border_color']; 
		else : $border_color = GP_DEFAULT_TEXT_COLOR;
	endif;

	?>

	<input type="text" class="meta-color" id="print_border_color" class="regular-text" name="print_settings[print_border_color]" value="<?php echo $border_color; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<?php
}

function print_cover_css_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_cover_css'] ) ) : 
			$cover_css = ''; 
		else : 
			$cover_css = $get_meta['print_cover_css'];
		endif;
?>
	<textarea class='bdn' type='cover_css' name='print_settings[print_cover_css]'><?php echo $cover_css; ?></textarea>
<?php }

//Table of contents
	
function print_table_recto_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_table_recto'] ) ) : 
			$table_recto = ''; 
		else : 
			$table_recto = $get_meta['print_table_recto'];
		endif;
?>
	<input name='print_settings[print_table_recto]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_recto]' <?php checked( $table_recto, 1 ); ?> value='1'>
<?php }

function print_table_break_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_table_break'] ) ) : 
			$table_break = ''; 
		else : 
			$table_break = $get_meta['print_table_break'];
		endif;
?>
	<input name='print_settings[print_table_break]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_break]' <?php checked( $table_break, 1 ); ?> value='1'>
<?php }

function print_table_title_page_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_table_title_page'] ) ) : 
			$page_title = 'Table des matières'; 
		else : 
			$page_title = $get_meta['print_table_title_page'];
		endif;
?>
	<input type='text' class="bdn" name='print_settings[print_table_title_page]' value='<?php echo $page_title; ?>'>

<?php }

function print_table_size_function() { 
	$get_meta = get_option( 'print_settings' );
	if ( empty ( $get_meta['print_table_size'] ) ) : 
		$table_size = ''; 
	else : 
		$table_size = $get_meta['print_table_size'];
	endif;
	if ( empty ( $get_meta['print_table_paper_size'] ) ) : 
		$table_paper_size = ''; 
	else : 
		$table_paper_size = $get_meta['print_table_paper_size'];
	endif;	
?>
	<select name='print_settings[print_table_size]'>
		<option value='1' <?php selected($table_size, "1"); ?>>A4</option>
		<option value='2' <?php selected($table_size, "2"); ?>>A3</option>
		<option value='3' <?php selected($table_size, "3"); ?>>B5</option>
		<option value='4' <?php selected($table_size, "4"); ?>>Tabloid</option>
	</select>
	
	<p><?php echo __('Paper size', 'geoformat'); ?></p>
	<select name='print_settings[print_table_paper_size]'>
		<option value='1' <?php selected($table_paper_size, "1"); ?>><?php echo __('Portrait','geoformat');?></option>
		<option value='2' <?php selected($table_paper_size, "2"); ?>><?php echo __('Landscape','geoformat');?></option>
	</select>
<?php }

function print_table_custom_size_activate_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_table_custom_size_activate'] ) ) : 
			$table_activate_custom = ''; 
		else : 
			$table_activate_custom = $get_meta['print_table_custom_size_activate'];
		endif;
		if ( empty ( $get_meta['print_table_custom_width'] ) ) : 
			$table_custom_width = ''; 
		else : 
			$table_custom_width = $get_meta['print_table_custom_width'];
		endif;
		if ( empty ( $get_meta['print_table_custom_height'] ) ) : 
			$table_custom_height = ''; 
		else : 
			$table_custom_height = $get_meta['print_table_custom_height'];
		endif;
?>
	<input name='print_settings[print_table_custom_size_activate]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_custom_size_activate]' <?php checked( $table_activate_custom, 1 ); ?> value='1'>
	<br/>
	<br/>
	<?php echo __('Width:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_table_custom_width]' value='<?php echo $table_custom_width; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Height:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_table_custom_height]' value='<?php echo $table_custom_height; ?>'> mm

<?php }

function print_table_crop_marks_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_table_crop_marks'] ) ) : 
			$table_crop_marks = ''; 
		else : 
			$table_crop_marks = $get_meta['print_table_crop_marks'];
		endif;
?>
	<input name='print_settings[print_table_crop_marks]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_crop_marks]' <?php checked( $table_crop_marks, 1 ); ?> value='1'>
<?php }

function print_table_margins_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_table_margin_top'] ) ) : 
			$table_margin_top = '15'; 
		else : 
			$table_margin_top = $get_meta['print_table_margin_top'];
		endif;
		if ( empty ( $get_meta['print_table_margin_left'] ) ) : 
			$table_margin_left = '10'; 
		else : 
			$table_margin_left = $get_meta['print_table_margin_left'];
		endif;
?>
	<?php echo __('Top & bottom:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_table_margin_top]' value='<?php echo $table_margin_top; ?>'> mm
	<br/>
	<br/>
	<?php echo  __('Left & right:', 'geoformat'); ?> <input type='text' class='small' name='print_settings[print_table_margin_left]' value='<?php echo $table_margin_left; ?>'> mm

<?php }

function print_table_content_width_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_table_content_width'] ) ) : 
			$table_content_width = '100'; 
		else : 
			$table_content_width = $get_meta['print_table_content_width'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_table_content_width]' value='<?php echo $table_content_width; ?>'> %

<?php }

function print_table_content_column_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['print_table_content_columns'] ) ) : 
			$table_content_columns = '1'; 
		else : 
			$table_content_columns = $get_meta['print_table_content_columns'];
		endif;
		if ( empty ( $get_meta['print_table_columns_gutter'] ) ) : 
			$table_columns_gutter = '5'; 
		else : 
			$table_columns_gutter = $get_meta['print_table_columns_gutter'];
		endif;
		if ( empty ( $get_meta['print_table_columns_fill'] ) ) : 
			$table_columns_fill = ''; 
		else : 
			$table_columns_fill = $get_meta['print_table_columns_fill'];
		endif;
		if ( empty ( $get_meta['print_table_columns_filet'] ) ) : 
			$table_columns_filet = ''; 
		else : 
			$table_columns_filet = $get_meta['print_table_columns_filet'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_table_content_columns]' value='<?php echo $table_content_columns; ?>'>
	
	<p><?php echo __('Gutter ', 'geoformat'); ?></p>
	<input type='text' class='small' name='print_settings[print_table_columns_gutter]' value='<?php echo $table_columns_gutter ; ?>'> mm
	
	<p><?php echo __('Fill column', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_table_columns_fill]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_columns_fill]' <?php checked( $table_columns_fill, 1 ); ?> value='1'>
	</p>
	
	<p><?php echo __('Add a net between columns', 'geoformat'); ?> &nbsp; &nbsp; &nbsp;
	<input name='print_settings[print_table_columns_filet]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[print_table_columns_filet]' <?php checked( $table_columns_filet, 1 ); ?> value='1'>
	</p>
<?php }

function print_table_color_background_function() {
	$table_get_meta = get_option( 'print_settings' );
	if (!empty ($table_get_meta['print_table_color_background']) ) :
		$table_color_background = $table_get_meta['print_table_color_background']; 
		else : $table_color_background = GP_DEFAULT_TITLE_COLOR;
	endif;

	?>

	<input type="background" class="meta-color" id="print_table_color_background" class="regular-background" name="print_settings[print_table_color_background]" value="<?php echo $table_color_background; ?>" data-default-color="<?php echo GP_DEFAULT_TITLE_COLOR; ?>">
	<p class="ita">
		<?php _e('To be printed, you must activate "Print background and image" in the settings of your browser.', 'geoformat'); ?> 
	</p>
	<?php
}

function print_table_title_function() {
	$table_get_meta = get_option( 'print_settings' );
	$table_options = get_option( 'gp_options' );
	$table_font_title = $table_options['font_title'];
	if ( empty ( $table_get_meta['print_table_title'] ) ) : 
			$table_title = $table_font_title; 
		else : 
			$table_title = $table_get_meta['print_table_title'];
		endif;
?>

	<select name="print_settings[print_table_title]" id="print_table_title">
		<option value="select-seventeen" <?php selected($table_title, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($table_title, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($table_title, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($table_title, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($table_title, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($table_title, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($table_title, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($table_title, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($table_title, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($table_title, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($table_title, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($table_title, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($table_title, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($table_title, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($table_title, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($table_title, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($table_title, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($table_title, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($table_title, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($table_title, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($table_title, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($table_title, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($table_title, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($table_title, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($table_title, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($table_title, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($table_title, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($table_title, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($table_title, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($table_title, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($table_title, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($table_title, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<?php
}

function print_table_title_font_size_function() { 
	$table_get_meta = get_option( 'print_settings' );
		if ( empty ( $table_get_meta['print_table_title_size'] ) ) : 
			$table_title_size = '26'; 
		else : 
			$table_title_size = $table_get_meta['print_table_title_size'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_table_title_size]' value='<?php echo $table_title_size; ?>'> points

<?php }

function print_table_color_title_function() {
	$table_get_meta = get_option( 'print_settings' );
	if (!empty ($table_get_meta['print_table_color_title']) ) :
		$table_color_title = $table_get_meta['print_table_color_title']; 
		else : $table_color_title = GP_DEFAULT_TEXT_COLOR;
	endif;

	?>

	<input type="text" class="meta-color" id="print_table_color_title" class="regular-text" name="print_settings[print_table_color_title]" value="<?php echo $table_color_title; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<?php
}

function print_table_title_options_function() { 
	$table_get_meta = get_option( 'print_settings' );
		if ( empty ( $table_get_meta['print_table_title_align'] ) ) : 
			$table_title_align = ''; 
		else : 
			$table_title_align = $table_get_meta['print_table_title_align'];
		endif;
		
		if ( empty ( $table_get_meta['print_table_title_margin_top'] ) ) : 
			$table_title_margin_top = '0'; 
		else : 
			$table_title_margin_top = $table_get_meta['print_table_title_margin_top'];
		endif;
		if ( empty ( $table_get_meta['print_table_title_margin_bottom'] ) ) : 
			$table_title_margin_bottom = '20'; 
		else : 
			$table_title_margin_bottom = $table_get_meta['print_table_title_margin_bottom'];
		endif;
?>
		<p><?php echo __('Title alignment', 'geoformat'); ?></p>
		<select name='print_settings[print_table_title_align]'>
		<option value='1' <?php selected($table_title_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($table_title_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($table_title_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		</select>
		<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_title_margin_top]' value='<?php echo $table_title_margin_top; ?>'> mm
		<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_title_margin_bottom]' value='<?php echo $table_title_margin_bottom; ?>'> mm
<?php }

function print_table_subtitle_function() {
	$table_get_meta = get_option( 'print_settings' );
	$table_options = get_option( 'gp_options' );
	$table_font_title = $table_options['font_title'];
	if ( empty ( $table_get_meta['print_table_subtitle'] ) ) : 
			$table_subtitle = $table_font_title; 
		else : 
			$table_subtitle = $table_get_meta['print_table_subtitle'];
		endif;
?>

	<select name="print_settings[print_table_subtitle]" id="print_table_subtitle">
		<option value="select-seventeen" <?php selected($table_subtitle, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($table_subtitle, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($table_subtitle, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($table_subtitle, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($table_subtitle, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($table_subtitle, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($table_subtitle, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($table_subtitle, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($table_subtitle, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($table_subtitle, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($table_subtitle, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($table_subtitle, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($table_subtitle, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($table_subtitle, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($table_subtitle, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($table_subtitle, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($table_subtitle, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($table_subtitle, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($table_subtitle, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($table_subtitle, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($table_subtitle, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($table_subtitle, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($table_subtitle, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($table_subtitle, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($table_subtitle, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($table_subtitle, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($table_subtitle, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($table_subtitle, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($table_subtitle, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($table_subtitle, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($table_subtitle, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($table_subtitle, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<?php
}

function print_table_subtitle_font_size_function() { 
	$table_get_meta = get_option( 'print_settings' );
		if ( empty ( $table_get_meta['print_table_subtitle_size'] ) ) : 
			$table_subtitle_size = '26'; 
		else : 
			$table_subtitle_size = $table_get_meta['print_table_subtitle_size'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_table_subtitle_size]' value='<?php echo $table_subtitle_size; ?>'> points

<?php }

function print_table_color_subtitle_function() {
	$table_get_meta = get_option( 'print_settings' );
	if (!empty ($table_get_meta['print_table_color_subtitle']) ) :
		$table_color_subtitle = $table_get_meta['print_table_color_subtitle']; 
		else : $table_color_subtitle = GP_DEFAULT_TEXT_COLOR;
	endif;
?>

	<input type="text" class="meta-color" id="print_table_color_subtitle" class="regular-text" name="print_settings[print_table_color_subtitle]" value="<?php echo $table_color_subtitle; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

<?php
}

function print_table_subtitle_options_function() { 
	$table_get_meta = get_option( 'print_settings' );
		if ( empty ( $table_get_meta['print_table_subtitle_align'] ) ) : 
			$table_subtitle_align = ''; 
		else : 
			$table_subtitle_align = $table_get_meta['print_table_subtitle_align'];
		endif;
		if ( empty ( $table_get_meta['print_table_subtitle_margin_top'] ) ) : 
			$table_subtitle_margin_top = '0'; 
		else : 
			$table_subtitle_margin_top = $table_get_meta['print_table_subtitle_margin_top'];
		endif;
		if ( empty ( $table_get_meta['print_table_subtitle_margin_bottom'] ) ) : 
			$table_subtitle_margin_bottom = '0'; 
		else : 
			$table_subtitle_margin_bottom = $table_get_meta['print_table_subtitle_margin_bottom'];
		endif;
?>
		<p><?php echo __('Subtitle alignment', 'geoformat'); ?></p>
		<select name='print_settings[print_table_subtitle_align]'>
		<option value='1' <?php selected($table_subtitle_align, "1"); ?>><?php echo __('Left','geoformat');?></option>
		<option value='2' <?php selected($table_subtitle_align, "2"); ?>><?php echo __('Center','geoformat');?></option>
		<option value='3' <?php selected($table_subtitle_align, "3"); ?>><?php echo __('Right','geoformat');?></option>
		</select>
		<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_subtitle_margin_top]' value='<?php echo $table_subtitle_margin_top; ?>'> mm
		<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_subtitle_margin_bottom]' value='<?php echo $table_subtitle_margin_bottom; ?>'> mm
<?php }

function print_table_font_text_function() {
	$table_get_meta = get_option( 'print_settings' );
	$table_options = get_option( 'gp_options' );
	$table_font_text = $table_options['font_text'];
	if ( empty ( $table_get_meta['print_table_font_text'] ) ) : 
			$table_font_text = $table_font_text; 
		else : 
			$table_font_text = $table_get_meta['print_table_font_text'];
		endif;
?>

	<select name="print_settings[print_table_font_text]" id="print_table_font_text">
		<option value="select-seventeen" <?php selected($table_font_text, "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php selected($table_font_text, "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php selected($table_font_text, "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php selected($table_font_text, "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php selected($table_font_text, "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php selected($table_font_text, "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php selected($table_font_text, "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php selected($table_font_text, "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php selected($table_font_text, "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php selected($table_font_text, "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php selected($table_font_text, "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php selected($table_font_text, "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php selected($table_font_text, "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php selected($table_font_text, "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php selected($table_font_text, "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php selected($table_font_text, "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php selected($table_font_text, "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php selected($table_font_text, "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php selected($table_font_text, "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php selected($table_font_text, "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php selected($table_font_text, "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php selected($table_font_text, "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php selected($table_font_text, "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php selected($table_font_text, "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php selected($table_font_text, "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php selected($table_font_text, "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php selected($table_font_text, "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php selected($table_font_text, "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php selected($table_font_text, "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php selected($table_font_text, "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php selected($table_font_text, "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php selected($table_font_text, "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	<?php
}

function print_table_text_size_function() { 
	$table_get_meta = get_option( 'print_settings' );
		if ( empty ( $table_get_meta['print_table_text_size'] ) ) : 
			$table_text_size = '16'; 
		else : 
			$table_text_size = $table_get_meta['print_table_text_size'];
		endif;
?>
	<input type='text' class='small' name='print_settings[print_table_text_size]' value='<?php echo $table_text_size; ?>'> points

<?php }

function print_table_color_text_function() {
	$table_get_meta = get_option( 'print_settings' );
	if (!empty ($table_get_meta['print_table_color_text']) ) :
		$table_color_text = $table_get_meta['print_table_color_text']; 
		else : $table_color_text = GP_DEFAULT_TEXT_COLOR;
	endif;

	?>

	<input type="text" class="meta-color" id="print_table_color_text" class="regular-text" name="print_settings[print_table_color_text]" value="<?php echo $table_color_text; ?>" data-default-color="<?php echo GP_DEFAULT_TEXT_COLOR; ?>">

	<?php
}

function print_table_text_options_function() { 
	$table_get_meta = get_option( 'print_settings' );
		
		if ( empty ( $table_get_meta['print_list_style'] ) ) : 
			$list_style = ''; 
		else : 
			$list_style = $table_get_meta['print_list_style'];
		endif;
		
		if ( empty ( $table_get_meta['print_list_sorted'] ) ) : 
			$list_sorted = '1'; 
		else : 
			$list_sorted = $table_get_meta['print_list_sorted'];
		endif;
		
		if ( empty ( $table_get_meta['print_table_list_padding'] ) ) : 
			$table_list_padding = '0'; 
		else : 
			$table_list_padding = $table_get_meta['print_table_list_padding'];
		endif;
		
		if ( empty ( $table_get_meta['print_table_list_margin_top'] ) ) : 
			$table_list_margin_top = '0'; 
		else : 
			$table_list_margin_top = $table_get_meta['print_table_list_margin_top'];
		endif;
		
		if ( empty ( $table_get_meta['print_table_list_margin_bottom'] ) ) : 
			$table_list_margin_bottom = '0'; 
		else : 
			$table_list_margin_bottom = $table_get_meta['print_table_list_margin_bottom'];
		endif;
		
		if ( empty ( $table_get_meta['print_table_list_li_margin_bottom'] ) ) : 
			$table_list_li_margin_bottom = '3'; 
		else : 
			$table_list_li_margin_bottom = $table_get_meta['print_table_list_li_margin_bottom'];
		endif;
			
?>
		<p><?php echo __('Sorted by', 'geoformat'); ?></p>
		<select name='print_settings[print_list_sorted]' id="print_list_sorted">
			<option value='1' <?php selected($list_sorted, "1"); ?>><?php echo __('From recent to oldest','geoformat');?></option>
			<option value='2' <?php selected($list_sorted, "2"); ?>><?php echo __('From oldest to recent','geoformat');?></option>
		</select>
		<p><?php echo __('List style', 'geoformat'); ?></p>
		<select name='print_settings[print_list_style]' id="print_list_style">
			<option value='1' <?php selected($list_style, "1"); ?>><?php echo __('No style','geoformat');?></option>
			<option value='2' <?php selected($list_style, "2"); ?>><?php echo __('Bullet','geoformat');?></option>
			<option value='3' <?php selected($list_style, "3"); ?>><?php echo __('Square','geoformat');?></option>
			<option value='4' <?php selected($list_style, "4"); ?>><?php echo __('Numbers','geoformat');?></option>
		</select>
		<p><?php echo __('Padding left', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_list_padding]' value='<?php echo $table_list_padding; ?>'> mm
		
		<p><?php echo __('Top margin ', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_list_margin_top]' value='<?php echo $table_list_margin_top; ?>'> mm
		
		<p><?php echo __('Bottom margin', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_list_margin_bottom]' value='<?php echo $table_list_margin_bottom; ?>'> mm
		
		<p><?php echo __('Bottom margin under each element of the list', 'geoformat'); ?></p>
		<input type='text' class='small' name='print_settings[print_table_list_li_margin_bottom]' value='<?php echo $table_list_li_margin_bottom; ?>'> mm
		
<?php }

function print_project_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_title_project'] ) ) : 
			$nodisplay_title_project = ''; 
		else : 
			$nodisplay_title_project = $get_meta['nodisplay_title_project'];
		endif;
		
		if ( empty ( $get_meta['nodisplay_project'] ) ) : 
			$nodisplay_project = ''; 
		else : 
			$nodisplay_project = $get_meta['nodisplay_project'];
		endif;
		
		if ( empty ( $get_meta['project_list'] ) ) : 
			$project_title = 'I. Projets'; 
		else : 
			$project_title = $get_meta['project_list'];
		endif;
		
		if ( empty ( $get_meta['project_id'] ) ) : 
			$project_id = ' '; 
		else : 
			$project_id = $get_meta['project_id'];
		endif;
?>
	<p>
	<?php echo __('Do not display the projects', 'geoformat'); ?>
	<input name='print_settings[nodisplay_project]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_project]' <?php checked( $nodisplay_project, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Title', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[project_list]' value='<?php echo $project_title; ?>'>	
	<p>
	<?php echo __('Do not display the title', 'geoformat'); ?>
	<input name='print_settings[nodisplay_title_project]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_title_project]' <?php checked( $nodisplay_title_project, 1 ); ?> value='1'>
	</p>
	<br/>
	<p><?php echo __('ID to exclude (separated with a comma)', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[project_id]' value='<?php echo $project_id; ?>'>
	<p><?php echo __('ID can be found on the admin projects page', 'geoformat'); ?></p>
<?php }

function print_map_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_title_map'] ) ) : 
			$nodisplay_title_map = ''; 
		else : 
			$nodisplay_title_map = $get_meta['nodisplay_title_map'];
		endif;
		
		if ( empty ( $get_meta['nodisplay_map'] ) ) : 
			$nodisplay_map = ''; 
		else : 
			$nodisplay_map = $get_meta['nodisplay_map'];
		endif;
		
		if ( empty ( $get_meta['map_list'] ) ) : 
			$map_title = 'II. Cartes'; 
		else : 
			$map_title = $get_meta['map_list'];
		endif;
		
		if ( empty ( $get_meta['map_id'] ) ) : 
			$map_id = ' '; 
		else : 
			$map_id = $get_meta['map_id'];
		endif;
?>
	<p>
	<?php echo __('Do not display the maps', 'geoformat'); ?>
	<input name='print_settings[nodisplay_map]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_map]' <?php checked( $nodisplay_map, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Title', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[map_list]' value='<?php echo $map_title; ?>'>	
	<p>
	<?php echo __('Do not display the title', 'geoformat'); ?>
	<input name='print_settings[nodisplay_title_map]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_title_map]' <?php checked( $nodisplay_title_map, 1 ); ?> value='1'>
	</p>
	<br/>
	<p><?php echo __('ID to exclude (separated with a comma)', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[map_id]' value='<?php echo $map_id; ?>'>
	<p><?php echo __('ID can be found on the admin maps page', 'geoformat'); ?></p>
<?php }


function print_cape_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_title_cape'] ) ) : 
			$nodisplay_title_cape = ''; 
		else : 
			$nodisplay_title_cape = $get_meta['nodisplay_title_cape'];
		endif;
		
		if ( empty ( $get_meta['nodisplay_cape'] ) ) : 
			$nodisplay_cape = ''; 
		else : 
			$nodisplay_cape = $get_meta['nodisplay_cape'];
		endif;
		
		if ( empty ( $get_meta['cape_list'] ) ) : 
			$cap_title = 'II. Cartes'; 
		else : 
			$cap_title = $get_meta['cape_list'];
		endif;
		
		if ( empty ( $get_meta['cape_id'] ) ) : 
			$cape_id = ' '; 
		else : 
			$cape_id = $get_meta['cape_id'];
		endif;
?>
	<p>
	<?php echo __('Do not display the capes', 'geoformat'); ?>
	<input name='print_settings[nodisplay_cape]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_capee]' <?php checked( $nodisplay_cape, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Title', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[cape_list]' value='<?php echo $cape_title; ?>'>	
	<p>
	<?php echo __('Do not display the title', 'geoformat'); ?>
	<input name='print_settings[nodisplay_title_cape]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_title_cape]' <?php checked( $nodisplay_title_cape, 1 ); ?> value='1'>
	</p>
	<br/>
	<p><?php echo __('ID to exclude (separated with a comma)', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[cape_id]' value='<?php echo $cape_id; ?>'>
	<p><?php echo __('ID can be found on the admin capes page', 'geoformat'); ?></p>
<?php }



function print_marker_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_title_marker'] ) ) : 
			$nodisplay_title_marker = ''; 
		else : 
			$nodisplay_title_marker = $get_meta['nodisplay_title_marker'];
		endif;
		
		if ( empty ( $get_meta['nodisplay_marker'] ) ) : 
			$nodisplay_marker = ''; 
		else : 
			$nodisplay_marker = $get_meta['nodisplay_marker'];
		endif;
		
		if ( empty ( $get_meta['marker_list'] ) ) : 
			$marker_title = 'III. Marqueurs'; 
		else : 
			$marker_title = $get_meta['marker_list'];
		endif;
		
		if ( empty ( $get_meta['marker_id'] ) ) : 
			$marker_id = ' '; 
		else : 
			$marker_id = $get_meta['marker_id'];
		endif;
?>
	<p>
	<?php echo __('Do not display the markers', 'geoformat'); ?>
	<input name='print_settings[nodisplay_marker]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_marker]' <?php checked( $nodisplay_marker, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Title', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[marker_list]' value='<?php echo $marker_title; ?>'>	
	<p>
	<?php echo __('Do not display the title', 'geoformat'); ?>
	<input name='print_settings[nodisplay_title_marker]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_title_marker]' <?php checked( $nodisplay_title_marker, 1 ); ?> value='1'>
	</p>
	<br/>
	<p><?php echo __('ID to exclude (separated with a comma)', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[marker_id]' value='<?php echo $marker_id; ?>'>
	<p><?php echo __('ID can be found on the admin markers marker', 'geoformat'); ?></p>
<?php }

function print_gf_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_title_gf'] ) ) : 
			$nodisplay_title_gf = ''; 
		else : 
			$nodisplay_title_gf = $get_meta['nodisplay_title_gf'];
		endif;
		
		if ( empty ( $get_meta['nodisplay_gf'] ) ) : 
			$nodisplay_gf = ''; 
		else : 
			$nodisplay_gf = $get_meta['nodisplay_gf'];
		endif;
		
		if ( empty ( $get_meta['gf_list'] ) ) : 
			$gf_title = 'IV. Géoformats'; 
		else : 
			$gf_title = $get_meta['gf_list'];
		endif;
		
		if ( empty ( $get_meta['gf_id'] ) ) : 
			$gf_id = ' '; 
		else : 
			$gf_id = $get_meta['gf_id'];
		endif;
?>
	<p>
	<?php echo __('Do not display the geoformats', 'geoformat'); ?>
	<input name='print_settings[nodisplay_gf]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_gf]' <?php checked( $nodisplay_gf, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Title', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[gf_list]' value='<?php echo $gf_title; ?>'>	
	<p>
	<?php echo __('Do not display the title', 'geoformat'); ?>
	<input name='print_settings[nodisplay_title_gf]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_title_gf]' <?php checked( $nodisplay_title_gf, 1 ); ?> value='1'>
	</p>
	<br/>
	<p><?php echo __('ID to exclude (separated with a comma)', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[gf_id]' value='<?php echo $gf_id; ?>'>
	<p><?php echo __('ID can be found on the admin Geoformats page', 'geoformat'); ?></p>
<?php }

function print_post_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_title_post'] ) ) : 
			$nodisplay_title_post = ''; 
		else : 
			$nodisplay_title_post = $get_meta['nodisplay_title_post'];
		endif;
		
		if ( empty ( $get_meta['nodisplay_post'] ) ) : 
			$nodisplay_post = ''; 
		else : 
			$nodisplay_post = $get_meta['nodisplay_post'];
		endif;
		
		if ( empty ( $get_meta['post_list'] ) ) : 
			$post_title = 'V. Articles'; 
		else : 
			$post_title = $get_meta['post_list'];
		endif;
		
		if ( empty ( $get_meta['post_id'] ) ) : 
			$post_id = ' '; 
		else : 
			$post_id = $get_meta['post_id'];
		endif;
?>
	<p>
	<?php echo __('Do not display the posts', 'geoformat'); ?>
	<input name='print_settings[nodisplay_post]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_post]' <?php checked( $nodisplay_post, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Title', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[post_list]' value='<?php echo $post_title; ?>'>	
	<p>
	<?php echo __('Do not display the title', 'geoformat'); ?>
	<input name='print_settings[nodisplay_title_post]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_title_post]' <?php checked( $nodisplay_title_post, 1 ); ?> value='1'>
	</p>
	<br/>
	<p><?php echo __('ID to exclude (separated with a comma)', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[post_id]' value='<?php echo $post_id; ?>'>
	<p><?php echo __('ID can be found on the admin posts page', 'geoformat'); ?></p>
<?php }

function print_page_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_title_page'] ) ) : 
			$nodisplay_title_page = ''; 
		else : 
			$nodisplay_title_page = $get_meta['nodisplay_title_page'];
		endif;
		
		if ( empty ( $get_meta['nodisplay_page'] ) ) : 
			$nodisplay_page = ''; 
		else : 
			$nodisplay_page = $get_meta['nodisplay_page'];
		endif;
		
		if ( empty ( $get_meta['page_list'] ) ) : 
			$page_title = 'VI. Pages'; 
		else : 
			$page_title = $get_meta['page_list'];
		endif;
		
		if ( empty ( $get_meta['page_id'] ) ) : 
			$page_id = ' '; 
		else : 
			$page_id = $get_meta['page_id'];
		endif;
?>
	<p>
	<?php echo __('Do not display the pages', 'geoformat'); ?>
	<input name='print_settings[nodisplay_page]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_page]' <?php checked( $nodisplay_page, 1 ); ?> value='1'>
	</p>
	<p><?php echo __('Title', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[page_list]' value='<?php echo $page_title; ?>'>	
	<p>
	<?php echo __('Do not display the title', 'geoformat'); ?>
	<input name='print_settings[nodisplay_title_page]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_title_page]' <?php checked( $nodisplay_title_page, 1 ); ?> value='1'>
	</p>
	<br/>
	<p><?php echo __('ID to exclude (separated with a comma)', 'geoformat'); ?></p>
	<input type='text' class="bdn" name='print_settings[page_id]' value='<?php echo $page_id; ?>'>
	<p><?php echo __('ID can be found on the admin pages page', 'geoformat'); ?></p>
<?php }

function print_category_list_function() { 
	$get_meta = get_option( 'print_settings' );
		
		if ( empty ( $get_meta['nodisplay_category'] ) ) : 
			$nodisplay_category = ''; 
		else : 
			$nodisplay_category = $get_meta['nodisplay_category'];
		endif;
?>
	<p>
	<?php echo __('Do not display the categorys', 'geoformat'); ?>
	<input name='print_settings[nodisplay_category]' value='0' type='hidden'>
	<input type='checkbox' name='print_settings[nodisplay_category]' <?php checked( $nodisplay_category, 1 ); ?> value='1'>
	</p>
<?php }

function print_table_css_function() { 
	$get_meta = get_option( 'print_settings' );
		if ( empty ( $get_meta['print_table_css'] ) ) : 
			$table_css = ''; 
		else : 
			$table_css = $get_meta['print_table_css'];
		endif;
?>
	<textarea class='bdn' type='table_css' name='print_settings[print_table_css]'><?php echo $table_css; ?></textarea>
<?php }

//Helpers

function print_help_function() { 
?>
	<p style="width:600px;font-size:15px;float:left;">
		Les réglages d’impression proposés dans cette section concernent exclusivement la mise en forme de vos pages, dès lors que chaque navigateur propose également ses propres options d’impression (et celles-ci vont varier d’un navigateur à l’autre, les options proposées par Chrome étant sans doute les plus intuitives). 
		Pour une impression personnalisée, il faut activer le bouton « Vue pour impression » qui s'affichera automatiquement sur chaque page de contenu. 
		<br/>
	<br/>
	<strong>Pourquoi la prévisualisation d'impression retourne une erreur (page non trouvée) lorsque je souhaite l'afficher ?</strong>
	<br/>
		Rendez-vous dans le menu "Réglages / Permaliens", sélectionnez "Titre de la publication" et enregistrez.
	<br/>
	<br/>
	<strong>Pourquoi les pages de couverture et de table des matières ne s'affichent pas correctement ?</strong>
	<br/>
		Lors de l'installation du thème, WordPress crée automatiquement ces deux pages. Leur slug est "sommaire" et 
		"sommaire". Il est important de ne pas supprimer ces pages ! Par ailleurs, via le menu "Page", vous 
		pouvez contrôler que ces deux pages pointent bien vers les modèles suivant "List all contents" (table des matières) 
		et "Couverture" (page de couverture).
	<br/>
	<br/>
	<strong>Pourquoi le format d'impression et les marges ne sont-ils pas pris en compte par mon imprimante ?</strong>
	<br/>
		Dans certains cas, vous devrez régler le format d'impression directement sur votre imprimante. 
		Dans certains cas également, vous devrez régler les marges d'impression via les options d'impression de votre navigateur ou de votre imprimante.
	<br/>
	<br/>
	<strong>Pourquoi les fonds de couleurs ou images en fond d'écran ne s'impriment pas ?</strong>
	<br/>
		Le navigateur ne rendra pas possible l'impression de fonds de couleur ou de page si le paramètre d'impression d'arrière-plan est désactivé. Pour activer cette fonction, il faut nécessairement passer par les paramètres d'impression de votre navigateur (impression PDF) ou de votre imprimante.
	<br/>
	<br/>
	<strong>Comment ajuster le style d'impression de ma page et les espaces entre les blocs ?</strong>
	<br/>
		En ce qui concerne le style, il est possible d'ajouter un style personnalisé dans les options d'impression. Si vous souhaitez obtenir plus d'espace entre les blocs des contenus (articles, pages, cartes, marqueurs, projets, géoformats), il vous suffit d'éditer votre publication et d'ajouter des espaces où vous le souhaitez.
	<br/>
	<br/>
	<strong>Comment supprimer les en-têtes par défaut de mon navigateur ?</strong>
	<br/>
		Il suffit de désactiver les en-têtes dans les options d'impression de votre 
		navigateur. Toutefois, si vous activez le script Printed.js, ces en-têtes disparaîtront d'elles-mêmes.
	<br/>
	<br/>
	<strong>Pourquoi certaines options d'impression ne sont pas prises en compte ?</strong>
	<br/>
		Tous les navigateurs n'interprètent pas le style CSS de la même manière et certains styles ne sont pas compatibles avec tous les navigateurs.
	<br/>
	<br/>
	<strong>Pourquoi mon style personnalisé (CSS) ne fonctionne pas ?</strong>
	<br/>
		Certains attributs de CSS nécessitent le hack !important pour être pris en compte.<br/> Exemple : #mondiv{margin:0!important;}
		<br/>
		 Par ailleurs, l'activation de la librairie Printed.js peut également donner lieu à une non prise en compte de certains styles.
	<br/>
	<br/>
	<strong>Pourquoi ma carte Mapbox ne s'imprime pas ?</strong>
	<br/>
		Il n'est pas possible d'imprimer une carte réalisée depuis Mapbox. Si vous souhaitez l'imprimer, 
		la solution est de la convertir dans un format image <a href="https://docs.mapbox.com/help/how-mapbox-works/static-maps/" 
		target="_blank">via l'API Image de Mapbox</a> et, ensuite, l'intégrer dans votre
		 publication en lieu et place de votre carte dynamique.
	<br/>
	<br/>
	<strong>Pourquoi la page s'affiche-t-elle différemment si j'active le script Printed.js ?</strong>
	<br/>
		Cette librairie Javscript a pour objet d'optimiser un document pour une impression PDF ou papier. Elle est susceptible de 
		réécrire certaines options de style (et ne les prendra donc pas en compte). Il est recommandé 
		de l'utiliser pour une impression optimisée. Attention, des problèmes de compatibilité peuvent être constatés 
		en fonction du navigateur utilisé : <a href="https://www.pagedjs.org/documentation/03-w3c-specs/#which-browser-to-use" target="_blank">voir la documentation de Printed.js à ce propos</a>.
	<br/>
	<br/>
	<strong>Pourquoi les traits de coupe ne s'affichent pas à l'impression alors qu'ils s'affichent à l'écran ?</strong>
	<br/>
		Les traits de coupe ajoutent un bord perdu de 5mm à chaque côté de la page. Par exemple, si on imprime en A4, 
		le format sera de 10mmm plus haut et de 10mm plus bas, ce qui va donc dépasser de la page.
	<br/>
	<br/>
	<strong>Quelle est la différence entre une impression offset et une impression numérique ?</strong>
	<br/>
		Cela se joue à deux niveaux : d'une part, les couleurs puisque les couleurs numériques sont en RVB alors que les 
		couleurs destinées à l'impression ofset doivent être en quadricromie (CMJN) ; d'autre part, la résolution numérique est peu
		 élevée (72 DPI) à l'inverse des exigences d'une impression offset (300 DPI). Pour une impression offset optimisée, 
		 vos images doivent donc présenter le bon format final d'impression, être converties en CMJN et avoir une résolution 
		 minimale de 300 DPI.
	</p>
<?php }

//Callback
function print_settings_call() { 
	echo __( ' ', 'geoformat' );
}
function print_settings_call2() { 
	echo __( 'To view settings, the preview button must be activated in the general settings ("General" menu tab).', 'geoformat' );
}
function print_settings_call3() { 
	echo __( '', 'geoformat' );
}
function print_settings_call4() { 
	echo __( 'Complete this form to configure your cover page for printing.','geoformat'); 
	echo '<br/><a href="' . get_site_url() . '/couverture" target="_blank">'; 
	echo __('You can preview this page here</a>. Refresh the page (F5) to see the changes.', 'geoformat' );
}
function print_settings_call5() { 
	echo __( 'Complete this form to configure your table of contents page for printing.','geoformat'); 
	echo '<br/><a href="' . get_site_url() . '/sommaire" target="_blank">'; 
	echo __('You can preview this page here</a>. Refresh the page (F5) to see the changes.', 'geoformat' );
}
function print_settings_call6() { 
	echo __( 'To view settings, the preview button must be activated in the general settings ("General" menu tab).', 'geoformat' );
}
function print_settings_call7() { 
	echo __( 'Only fill this section if you wish to add a customized header with the title or/and subtitle of your website at the top of each post (table of contents included).<br/>
	To view settings, the preview button must be activated in the general settings ("General" menu tab).', 'geoformat' );
}

//Generate
function print_options_page() { ?>
		
		<?php settings_errors(); ?>
			
		<h1 style="font-weight:normal!important;"><?php _e('Print settings','geoformat'); ?></h1>
		
		<h2 class="nav-tab-wrapper">
			 <a href="#" class="nav-tab navtab1 active1"><?php _e( 'General', 'geoformat' ); ?></a>	 
			 <a href="#" class="nav-tab navtab7 active7"><?php _e( 'Headers', 'geoformat' ); ?></a> 	 
			 <a href="#" class="nav-tab navtab2 active2"><?php _e( 'Contents', 'geoformat' ); ?></a> 	 
			 <a href="#" class="nav-tab navtab6 active6"><?php _e( 'Geoformats', 'geoformat' ); ?></a> 	 			
			 <a href="#" class="nav-tab navtab4 active4"><?php _e( 'Table of contents', 'geoformat' ); ?></a> 	
			 <a href="#" class="nav-tab navtab3 active3"><?php _e( 'Cover', 'geoformat' ); ?></a> 	 			 
			 <a href="#" class="nav-tab navtab5 active5"><?php _e( 'About', 'geoformat' ); ?></a>
		</h2>
	
	<form action='options.php' method='post'>

		<div id="tab1" class="ui-sortable meta-box-sortables">
				<?php
				settings_fields( 'print_global_options' );
				do_settings_sections( 'print_global_options' );
				?>
		</div>
		
		<div id="tab2" class="ui-sortable meta-box-sortables">
				<?php
				settings_fields( 'print_global_options' );
				do_settings_sections( 'print_global_options2' );
				?>
		</div>
		
		<div id="tab3" class="ui-sortable meta-box-sortables">
				<?php
				settings_fields( 'print_global_options' );
				do_settings_sections( 'print_global_options4' );
				?>
		</div>
		
		<div id="tab4" class="ui-sortable meta-box-sortables">
				<?php
				settings_fields( 'print_global_options' );
				do_settings_sections( 'print_global_options5' );
				?>
		</div>
		
		<div id="tab5" class="ui-sortable meta-box-sortables">
				<?php
				settings_fields( 'print_global_options' );
				do_settings_sections( 'print_global_options3' );
				?>
		</div>
		
		<div id="tab6" class="ui-sortable meta-box-sortables">
				<?php
				settings_fields( 'print_global_options' );
				do_settings_sections( 'print_global_options6' );
				?>
		</div>
		
		<div id="tab7" class="ui-sortable meta-box-sortables">
				<?php
				settings_fields( 'print_global_options' );
				do_settings_sections( 'print_global_options7' );
				?>
		</div>
		
		
		<?php
		submit_button();
		?>

	</form>
<?php }

//Validate
function print_validate_options( $user_input ) {

	$get_meta = get_option( 'print_settings' );
	$valid = array();
	
	$valid['print_default'] = $user_input['print_default'];
	$valid['print_pdf'] = $user_input['print_pdf'];
	$valid['print_no_subtitle'] = $user_input['print_no_subtitle'];
	$valid['print_preview'] = $user_input['print_preview'];
	$valid['print_js'] = $user_input['print_js'];
	$valid['print_table_size'] = $user_input['print_table_size'];
	$valid['print_table_custom_size_activate'] = $user_input['print_table_custom_size_activate'];
	$valid['print_table_custom_width'] = $user_input['print_table_custom_width'];
	$valid['print_table_custom_height'] = $user_input['print_table_custom_height'];
	$valid['print_table_crop_marks'] = $user_input['print_table_crop_marks'];
	$valid['print_table_margin_top'] = $user_input['print_table_margin_top'];
	$valid['print_table_margin_left'] = $user_input['print_table_margin_left'];
	$valid['print_table_break'] = $user_input['print_table_break'];
	$valid['print_table_recto'] = $user_input['print_table_recto'];
	$valid['print_table_content_width'] = $user_input['print_table_content_width'];
	$valid['print_table_color_background'] = $user_input['print_table_color_background'];
	$valid['print_table_content_columns'] = $user_input['print_table_content_columns'];
	$valid['print_table_columns_gutter'] = $user_input['print_table_columns_gutter'];
	$valid['print_table_site_title'] = $user_input['print_table_site_title'];
	$valid['print_table_site_subtitle'] = $user_input['print_table_site_subtitle'];
	$valid['print_table_header_title_size'] = $user_input['print_table_header_title_size'];
	$valid['print_table_header_subtitle_size'] = $user_input['print_table_header_subtitle_size'];
	$valid['print_table_header_align'] = $user_input['print_table_header_align'];
	$valid['print_table_header_color'] = $user_input['print_table_header_color'];
	$valid['print_table_header_border'] = $user_input['print_table_header_border'];
	$valid['print_table_header_border_color'] = $user_input['print_table_header_border_color'];
	$valid['print_table_header_border_padding'] = $user_input['print_table_header_border_padding'];
	$valid['print_table_header_border_width'] = $user_input['print_table_header_border_width'];
	$valid['print_table_header_border_style'] = $user_input['print_table_header_border_style'];
	$valid['print_table_header_top'] = $user_input['print_table_header_top'];
	$valid['print_table_header_bottom'] = $user_input['print_table_header_bottom'];
	$valid['print_table_header_margin_title'] = $user_input['print_table_header_margin_title'];
	$valid['print_table_title_page'] = $user_input['print_table_title_page'];
	$valid['print_table_title'] = $user_input['print_table_title'];
	$valid['print_table_color_title'] = $user_input['print_table_color_title'];
	$valid['print_table_title_align'] = $user_input['print_table_title_align'];
	$valid['print_table_title_margin_top'] = $user_input['print_table_title_margin_top'];
	$valid['print_table_title_margin_bottom'] = $user_input['print_table_title_margin_bottom'];
	$valid['print_table_title_size'] = $user_input['print_table_title_size'];
	$valid['print_table_subtitle'] = $user_input['print_table_subtitle'];
	$valid['print_table_subtitle_size'] = $user_input['print_table_subtitle_size'];
	$valid['print_table_color_subtitle'] = $user_input['print_table_color_subtitle'];
	$valid['print_table_subtitle_align'] = $user_input['print_table_subtitle_align'];
	$valid['print_table_subtitle_margin_top'] = $user_input['print_table_subtitle_margin_top'];
	$valid['print_table_subtitle_margin_bottom'] = $user_input['print_table_subtitle_margin_bottom'];
	$valid['print_table_font_text'] = $user_input['print_table_font_text'];
	$valid['print_table_color_text'] = $user_input['print_table_color_text'];
	$valid['print_table_text_size'] = $user_input['print_table_text_size'];
	$valid['print_list_style'] = $user_input['print_list_style'];
	$valid['print_list_sorted'] = $user_input['print_list_sorted'];
	$valid['print_table_list_padding'] = $user_input['print_table_list_padding'];
	$valid['print_table_list_margin_top'] = $user_input['print_table_list_margin_top'];
	$valid['print_table_list_margin_bottom'] = $user_input['print_table_list_margin_bottom'];
	$valid['print_table_list_li_margin_bottom'] = $user_input['print_table_list_li_margin_bottom'];
	$valid['print_table_css'] = $user_input['print_table_css'];
	$valid['nodisplay_project'] = $user_input['nodisplay_project'];
	$valid['nodisplay_title_project'] = $user_input['nodisplay_title_project'];
	$valid['project_list'] = $user_input['project_list'];
	$valid['project_id'] = $user_input['project_id'];
	$valid['nodisplay_map'] = $user_input['nodisplay_map'];
	$valid['nodisplay_title_map'] = $user_input['nodisplay_title_map'];
	$valid['map_list'] = $user_input['map_list'];
	$valid['map_id'] = $user_input['map_id'];
	$valid['nodisplay_marker'] = $user_input['nodisplay_marker'];
	$valid['nodisplay_title_marker'] = $user_input['nodisplay_title_marker'];
	$valid['marker_list'] = $user_input['marker_list'];
	$valid['marker_id'] = $user_input['marker_id'];
	$valid['nodisplay_gf'] = $user_input['nodisplay_gf'];
	$valid['nodisplay_title_gf'] = $user_input['nodisplay_title_gf'];
	$valid['gf_list'] = $user_input['gf_list'];
	$valid['gf_id'] = $user_input['gf_id'];
	$valid['nodisplay_post'] = $user_input['nodisplay_post'];
	$valid['nodisplay_title_post'] = $user_input['nodisplay_title_post'];
	$valid['post_list'] = $user_input['post_list'];
	$valid['post_id'] = $user_input['post_id'];
	$valid['nodisplay_page'] = $user_input['nodisplay_page'];
	$valid['nodisplay_title_page'] = $user_input['nodisplay_title_page'];
	$valid['page_list'] = $user_input['page_list'];
	$valid['page_id'] = $user_input['page_id'];
	$valid['nodisplay_category'] = $user_input['nodisplay_category'];
	$valid['print_cover_size'] = $user_input['print_cover_size'];
	$valid['print_custom_size_activate'] = $user_input['print_custom_size_activate'];
	$valid['print_custom_width'] = $user_input['print_custom_width'];
	$valid['print_custom_height'] = $user_input['print_custom_height'];
	$valid['print_crop_marks'] = $user_input['print_crop_marks'];
	$valid['print_margin_top'] = $user_input['print_margin_top'];
	$valid['print_margin_left'] = $user_input['print_margin_left'];
	$valid['print_content_page_width'] = $user_input['print_content_page_width'];
	$valid['print_content_columns_fill'] = $user_input['print_content_columns_fill'];
	$valid['print_content_vertical_align'] = $user_input['print_content_vertical_align'];
	$valid['print_title'] = $user_input['print_title'];
	$valid['print_subtitle'] = $user_input['print_subtitle'];
	$valid['print_title_size'] = $user_input['print_title_size'];
	$valid['print_subtitle_size'] = $user_input['print_subtitle_size'];
	$valid['print_color_title'] = $user_input['print_color_title'];
	$valid['print_color_subtitle'] = $user_input['print_color_subtitle'];
	$valid['font_text'] = $user_input['font_text'];
	$valid['print_color_text'] = $user_input['print_color_text'];
	$valid['print_color_background'] = $user_input['print_color_background'];
	$valid['print_image_background'] = $user_input['print_image_background'];
	$valid['print_background_vertical_align'] = $user_input['print_background_vertical_align'];
	$valid['print_background_horizontal_align'] = $user_input['print_background_horizontal_align'];
	$valid['print_title_align'] = $user_input['print_title_align'];
	$valid['print_title_margin_top'] = $user_input['print_title_margin_top'];
	$valid['print_title_margin_bottom'] = $user_input['print_title_margin_bottom'];
	$valid['print_subtitle_align'] = $user_input['print_subtitle_align'];
	$valid['print_subtitle_margin_top'] = $user_input['print_subtitle_margin_top'];
	$valid['print_subtitle_margin_bottom'] = $user_input['print_subtitle_margin_bottom'];
	$valid['print_text'] = $user_input['print_text'];
	$valid['print_text_size'] = $user_input['print_text_size'];
	$valid['print_text_align'] = $user_input['print_text_align'];
	$valid['print_text_margin_top'] = $user_input['print_text_margin_top'];
	$valid['print_text_margin_bottom'] = $user_input['print_text_margin_bottom'];
	$valid['print_text_position'] = $user_input['print_text_position'];
	$valid['print_image'] = $user_input['print_image'];
	$valid['print_image_size'] = $user_input['print_image_size'];
	$valid['print_image_align'] = $user_input['print_image_align'];
	$valid['print_image_margin_top'] = $user_input['print_image_margin_top'];
	$valid['print_image_margin_bottom'] = $user_input['print_image_margin_bottom'];
	$valid['print_image_position'] = $user_input['print_image_position'];
	$valid['border_elements'] = $user_input['border_elements'];
	$valid['border_title'] = $user_input['border_title'];
	$valid['border_subtitle'] = $user_input['border_subtitle'];
	$valid['border_image'] = $user_input['border_image'];
	$valid['border_text'] = $user_input['border_text'];
	$valid['print_border_style'] = $user_input['print_border_style'];
	$valid['print_border_width'] = $user_input['print_border_width'];
	$valid['print_border_padding'] = $user_input['print_border_padding'];
	$valid['print_border_color'] = $user_input['print_border_color'];
	$valid['print_cover_css'] = $user_input['print_cover_css'];	
	$valid['print_content_size'] = $user_input['print_content_size'];
	$valid['print_content_custom_size_activate'] = $user_input['print_content_custom_size_activate'];
	$valid['print_content_custom_width'] = $user_input['print_content_custom_width'];
	$valid['print_content_custom_height'] = $user_input['print_content_custom_height'];
	$valid['print_content_crop_marks'] = $user_input['print_content_crop_marks'];
	$valid['print_content_margin_top'] = $user_input['print_content_margin_top'];
	$valid['print_content_margin_left'] = $user_input['print_content_margin_left'];
	$valid['print_content_recto'] = $user_input['print_content_recto'];
	$valid['print_content_comments'] = $user_input['print_content_comments'];
	$valid['print_content_color_background'] = $user_input['print_content_color_background'];
	$valid['print_content_title'] = $user_input['print_content_title'];
	$valid['print_content_title_size'] = $user_input['print_content_title_size'];
	$valid['print_content_color_title'] = $user_input['print_content_color_title'];
	$valid['print_content_title_align'] = $user_input['print_content_title_align'];
	$valid['print_content_title_margin_top'] = $user_input['print_content_title_margin_top'];
	$valid['print_content_title_margin_bottom'] = $user_input['print_content_title_margin_bottom'];
	$valid['print_content_content_width'] = $user_input['print_content_content_width'];
	$valid['print_content_content_columns'] = $user_input['print_content_content_columns'];
	$valid['print_content_content_columns_gutter'] = $user_input['print_content_content_columns_gutter'];
	$valid['print_content_font_text'] = $user_input['print_content_font_text'];
	$valid['print_content_text_font_size'] = $user_input['print_content_text_font_size'];
	$valid['print_content_color_text'] = $user_input['print_content_color_text'];
	$valid['print_content_text_alignment'] = $user_input['print_content_text_alignment'];
	$valid['print_content_metadata'] = $user_input['print_content_metadata'];
	$valid['print_content_icons'] = $user_input['print_content_icons'];	
	$valid['print_content_images'] = $user_input['print_content_images'];
	$valid['print_content_image_width'] = $user_input['print_content_image_width'];
	$valid['print_content_images_margin_top'] = $user_input['print_content_images_margin_top'];
	$valid['print_content_images_margin_bottom'] = $user_input['print_content_images_margin_bottom'];
	$valid['print_content_images_align'] = $user_input['print_content_images_align'];
	$valid['print_content_maps'] = $user_input['print_content_maps'];
	$valid['print_content_image_width'] = $user_input['print_content_image_width'];
	$valid['print_content_maps_margin_top'] = $user_input['print_content_maps_margin_top'];
	$valid['print_content_maps_margin_bottom'] = $user_input['print_content_maps_margin_bottom'];
	$valid['print_content_maps_align'] = $user_input['print_content_maps_align'];
	$valid['print_content_embed'] = $user_input['print_content_embed'];
	$valid['print_content_image_width'] = $user_input['print_content_image_width'];
	$valid['print_content_embed_margin_top'] = $user_input['print_content_embed_margin_top'];
	$valid['print_content_embed_margin_bottom'] = $user_input['print_content_embed_margin_bottom'];
	$valid['print_content_embed_align'] = $user_input['print_content_embed_align'];
	$valid['print_content_css'] = $user_input['print_content_css'];
	$valid['print_geoformat_size'] = $user_input['print_geoformat_size'];
	$valid['print_geoformat_custom_size_activate'] = $user_input['print_geoformat_custom_size_activate'];
	$valid['print_geoformat_custom_width'] = $user_input['print_geoformat_custom_width'];
	$valid['print_geoformat_custom_height'] = $user_input['print_geoformat_custom_height'];
	$valid['print_geoformat_crop_marks'] = $user_input['print_geoformat_crop_marks'];
	$valid['print_geoformat_margin_top'] = $user_input['print_geoformat_margin_top'];
	$valid['print_geoformat_margin_left'] = $user_input['print_geoformat_margin_left'];
	$valid['print_geoformat_recto'] = $user_input['print_geoformat_recto'];
	$valid['print_geoformat_comments'] = $user_input['print_geoformat_comments'];
	$valid['print_geoformat_color_background'] = $user_input['print_geoformat_color_background'];
	$valid['print_geoformat_title'] = $user_input['print_geoformat_title'];
	$valid['print_geoformat_title_size'] = $user_input['print_geoformat_title_size'];
	$valid['print_geoformat_color_title'] = $user_input['print_geoformat_color_title'];
	$valid['print_geoformat_title_align'] = $user_input['print_geoformat_title_align'];
	$valid['print_geoformat_title_margin_top'] = $user_input['print_geoformat_title_margin_top'];
	$valid['print_geoformat_title_margin_bottom'] = $user_input['print_geoformat_title_margin_bottom'];
	$valid['print_geoformat_geoformat_width'] = $user_input['print_geoformat_geoformat_width'];
	$valid['print_geoformat_geoformat_columns'] = $user_input['print_geoformat_geoformat_columns'];
	$valid['print_geoformat_geoformat_columns_gutter'] = $user_input['print_geoformat_geoformat_columns_gutter'];
	$valid['print_geoformat_font_text'] = $user_input['print_geoformat_font_text'];
	$valid['print_geoformat_text_size'] = $user_input['print_geoformat_text_size'];
	$valid['print_geoformat_color_text'] = $user_input['print_geoformat_color_text'];
	$valid['print_geoformat_text_align'] = $user_input['print_geoformat_text_align'];
	$valid['print_geoformat_metadata'] = $user_input['print_geoformat_metadata'];
	$valid['print_geoformat_icons'] = $user_input['print_geoformat_icons'];	
	$valid['print_geoformat_images'] = $user_input['print_geoformat_images'];
	$valid['print_geoformat_image_width'] = $user_input['print_geoformat_image_width'];
	$valid['print_geoformat_images_margin_top'] = $user_input['print_geoformat_images_margin_top'];
	$valid['print_geoformat_images_margin_bottom'] = $user_input['print_geoformat_images_margin_bottom'];
	$valid['print_geoformat_images_align'] = $user_input['print_geoformat_images_align'];
	$valid['print_geoformat_maps'] = $user_input['print_geoformat_maps'];
	$valid['print_geoformat_image_width'] = $user_input['print_geoformat_image_width'];
	$valid['print_geoformat_maps_margin_top'] = $user_input['print_geoformat_maps_margin_top'];
	$valid['print_geoformat_maps_margin_bottom'] = $user_input['print_geoformat_maps_margin_bottom'];
	$valid['print_geoformat_maps_align'] = $user_input['print_geoformat_maps_align'];
	$valid['print_geoformat_embed'] = $user_input['print_geoformat_embed'];
	$valid['print_geoformat_image_width'] = $user_input['print_geoformat_image_width'];
	$valid['print_geoformat_embed_margin_top'] = $user_input['print_geoformat_embed_margin_top'];
	$valid['print_geoformat_embed_margin_bottom'] = $user_input['print_geoformat_embed_margin_bottom'];
	$valid['print_geoformat_embed_align'] = $user_input['print_geoformat_embed_align'];
	$valid['print_geoformat_css'] = $user_input['print_geoformat_css'];
	$valid['print_header_title'] = $user_input['print_header_title'];
	$valid['print_header_subtitle'] = $user_input['print_header_subtitle'];
	$valid['print_table_nomargin'] = $user_input['print_table_nomargin'];
	$valid['print_table_header_bottom_border_style'] = $user_input['print_table_header_bottom_border_style'];
	$valid['print_content_metadata_bottom'] = $user_input['print_content_metadata_bottom'];
	$valid['print_content_metadata_icons'] = $user_input['print_content_metadata_icons'];
}

//Enqueue image
add_action( 'admin_enqueue_scripts', 'geoproject_image_enqueue' );
function geoproject_image_enqueue() {

	global $pagenow;

	$plugin_dir_uri = get_template_directory_uri();

    if($pagenow == 'admin.php') :
        wp_enqueue_media();
        wp_register_script( 'print-image',  get_template_directory_uri() . '/inc/print/print-image.js', array( 'jquery' ) );
        wp_localize_script( 'print-image', 'meta_image',
            array(
                'title' => __( 'Choose an image', 'geoformat' ),
                'button' => __( 'Use this image', 'geoformat' ),
            )
        );
        wp_enqueue_script( 'print-image' );
    endif;
}

//Create pages to print

add_action( 'admin_init', 'geoformat_admin_init_print_cover' );
function geoformat_admin_init_print_cover() {
    if ( ! get_option( 'geoformat_installed_print_cover' ) ) {
        $new_page_id = wp_insert_post( array(
            'post_title'     => 'Page de couverture',
            'post_type'      => 'page',
            'post_name'      => 'couverture',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_content'   => 'Modèle de page de couverture pour l\'impression. Il ne faut ajouter aucun contenu dans cette zone : cette page est déjà prête à l\'emploi. Il vous suffit de la visualiser et de l\'imprimer telle quelle.',
            'post_status'    => 'publish',
            'post_author'    => get_user_by( 'id', 1 )->user_id,
            'menu_order'     => 0
        ) );

        if ( $new_page_id && ! is_wp_error( $new_page_id ) ){
            update_post_meta( $new_page_id, '_wp_page_template', 'tpl-contenus.php' );
        }

        update_option( 'geoformat_installed_print_cover', true );
    }
}

add_action( 'admin_init', 'geoformat_admin_init_all_contents' );
function geoformat_admin_init_all_contents() {
    if ( ! get_option( 'geoformat_installed_all_contents' ) ) {
        $new_page_id = wp_insert_post( array(
            'post_title'     => 'Contenus du site (sommaire)',
            'post_type'      => 'page',
            'post_name'      => 'sommaire',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
            'post_content'   => 'Modèle de page listant tous les contenus du site, pour l\'impression. Il ne faut ajouter aucun contenu dans cette zone : cette page est déjà prête à l\'emploi. Il vous suffit de la visualiser et de l\'imprimer telle quelle. Vous pouvez éventuellement l\'éditer dans un logiciel d\'édition PDF (PDF Architect, Adobe Acrobat...) pour ajouter des numéros de page ou tout autre contenu (textes ou images, selon les fonctionnalités du logiciel utilisé).',
            'post_status'    => 'publish',
            'post_author'    => get_user_by( 'id', 1 )->user_id,
            'menu_order'     => 0
        ) );

        if ( $new_page_id && ! is_wp_error( $new_page_id ) ){
            update_post_meta( $new_page_id, '_wp_page_template', 'tpl-contenus.php' );
        }

        update_option( 'geoformat_installed_all_contents', true );
    }
}
?>