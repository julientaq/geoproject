<?php 
/**
 * EDITOR STYLE TINYMCE
 */
 
if ( ! function_exists( 'geoformat_style_select' ) ) {
	function geoformat_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}
}
add_filter( 'mce_buttons', 'geoformat_style_select' );
if ( ! function_exists( 'geoformat_styles_dropdown' ) ) {
	function geoformat_styles_dropdown( $settings ) {
		$new_styles = array(
					array(
					'title'		=> __('Dropcap','geoformat'),
					'inline'	=> 'span',
					'classes'	=> 'lettrine',
					),
					array(
						'title'		=> __('Framed (grey background)','geoformat'),
						'block'	=> 'div',
						'classes'	=> 'panel',
					),
					array(
						'title'		=> __('Framed (white background)','geoformat'),
						'block'	=> 'div',
						'classes'	=> 'well',
					),
					array(
						'title'		=> __('Framed (main color background)','geoformat'),
						'block'	=> 'div',
						'classes'	=> 'jumbotron',
					),
					array(
						'title'		=> __('Button','geoformat'),
						'inline'	=> 'button',
						'classes'	=> 'btn'
					)
		);
		$settings['style_formats_merge'] = false;
		$settings['style_formats'] = json_encode( $new_styles );
		return $settings;
	}
}
add_filter( 'tiny_mce_before_init', 'geoformat_styles_dropdown' );
add_filter( 'mce_css', 'geoproject_editor_style' );
	function geoproject_editor_style( $mce_css ){   
		$mce_css =  get_template_directory_uri() .'/css/admin/editor-style.css';
		return $mce_css;
	}
?>