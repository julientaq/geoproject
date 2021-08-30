<?php
/**
 * Template Name: List all contents
**/
?>
<!DOCTYPE html>
<html>
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
} 
$get_meta = get_option( 'print_settings' );
$printed = $get_meta['print_js'];
if (!empty ($printed) ) : ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/paged.polyfill.js"></script>
<?php endif;
$table_size = $get_meta['print_table_size'];
$paper_size = $get_meta['print_table_paper_size'];
$custom_size = $get_meta['print_table_custom_size_activate'];
$custom_width = $get_meta['print_table_custom_width'];
$custom_height = $get_meta['print_table_custom_height'];
$crop_marks = $get_meta['print_table_crop_marks'];
$margin_top = $get_meta['print_table_margin_top'];
$margin_left = $get_meta['print_table_margin_left'];
$break = $get_meta['print_table_break'];
$recto = $get_meta['print_table_recto'];
$content_width = $get_meta['print_table_content_width'];
$background = $get_meta['print_table_color_background'];
$table_content_columns = $get_meta['print_table_content_columns'];
$table_columns_gutter = $get_meta['print_table_columns_gutter'];
$filet = $get_meta['print_table_columns_filet'];
$fill = $get_meta['print_table_columns_fill'];

//Headers
$site_title = $get_meta['print_table_site_title'];
$site_subtitle = $get_meta['print_table_site_subtitle'];
$site_font_title = $get_meta['print_header_title'];
$site_font_subtitle = $get_meta['print_header_subtitle'];
$nomargin = $get_meta['print_table_nomargin'];
$bottomborder = $get_meta['print_table_header_bottom_border_style'];
$header_title_size = $get_meta['print_table_header_title_size'];
$header_subtitle_size = $get_meta['print_table_header_subtitle_size'];
$header_align = $get_meta['print_table_header_align'];
$header_color = $get_meta['print_table_header_color']; 
$header_border = $get_meta['print_table_header_border'];
$header_border_color = $get_meta['print_table_header_border_color'];
$header_border_padding = $get_meta['print_table_header_border_padding'];
$header_border_width = $get_meta['print_table_header_border_width'];
$header_border_bottom_width = $get_meta['print_table_header_border_bottom_width'];
$header_border_style = $get_meta['print_table_header_border_style'];
$table_header_top = $get_meta['print_table_header_top'];
$table_header_bottom = $get_meta['print_table_header_bottom'];
$table_header_margin_title = $get_meta['print_table_header_margin_title'];
if ($header_border_style == 1) { 
	$header_border_style = "solid";
} elseif ($header_border_style == 2) { 
	$header_border_style = "dotted";
} elseif ($header_border_style == 3) { 
	$header_border_style = "dashed";
} else {
	$header_border_style = "double";
}
if ($bottomborder == 2) { 
	$bottomborder = "solid";
} elseif ($bottomborder == 3) { 
	$bottomborder = "dotted";
} elseif ($bottomborder == 4) { 
	$bottomborder = "dashed";
} elseif ($bottomborder == 5) {
	$bottomborder = "double";
} else {
	$bottomborder = "none";
}
//Titre de la page
$page_title = $get_meta['print_table_title_page'];
$font_title = $get_meta['print_table_title'];
$color_title = $get_meta['print_table_color_title'];
$title_align = $get_meta['print_table_title_align'];
$title_margin_top = $get_meta['print_table_title_margin_top'];
$title_margin_bottom = $get_meta['print_table_title_margin_bottom'];
$title_size = $get_meta['print_table_title_size'];
//Sous-titres
$font_subtitle = $get_meta['print_table_subtitle'];
$subtitle_size = $get_meta['print_table_subtitle_size'];
$color_subtitle = $get_meta['print_table_color_subtitle'];
$subtitle_align = $get_meta['print_table_subtitle_align'];
$subtitle_margin_top = $get_meta['print_table_subtitle_margin_top'];
$subtitle_margin_bottom = $get_meta['print_table_subtitle_margin_bottom'];
//Listes
$font_text = $get_meta['print_table_font_text'];
$color_text = $get_meta['print_table_color_text'];
$text_size = $get_meta['print_table_text_size'];
$text_style = $get_meta['print_list_style'];
$tri = $get_meta['print_list_sorted'];
$text_padding = $get_meta['print_table_list_padding'];
$text_margin_top = $get_meta['print_table_list_margin_top'];
$text_margin_bottom = $get_meta['print_table_list_margin_bottom'];
$li_margin_bottom = $get_meta['print_table_list_li_margin_bottom'];
//Posts type
$nodisplay_project = $get_meta['nodisplay_project'];
$nodisplay_title_project = $get_meta['nodisplay_title_project'];
$project_title = $get_meta['project_list'];
$project_id = $get_meta['project_id'];
$nodisplay_map = $get_meta['nodisplay_map'];
$nodisplay_title_map = $get_meta['nodisplay_title_map'];
$map_title = $get_meta['map_list'];
$map_id = $get_meta['map_id'];
$nodisplay_marker = $get_meta['nodisplay_marker'];
$nodisplay_title_marker = $get_meta['nodisplay_title_marker'];
$marker_title = $get_meta['marker_list'];
$marker_id = $get_meta['marker_id'];
$nodisplay_gf = $get_meta['nodisplay_gf'];
$nodisplay_title_gf = $get_meta['nodisplay_title_gf'];
$gf_title = $get_meta['gf_list'];
$gf_id = $get_meta['gf_id'];
$nodisplay_post = $get_meta['nodisplay_post'];
$nodisplay_title_post = $get_meta['nodisplay_title_post'];
$post_title = $get_meta['post_list'];
$post_id = $get_meta['post_id'];
$nodisplay_page = $get_meta['nodisplay_page'];
$nodisplay_title_page = $get_meta['nodisplay_title_page'];
$page_page_title = $get_meta['page_list'];
$page_id = $get_meta['page_id'];
$nodisplay_category = $get_meta['nodisplay_category'];
$header_css = $get_meta['print_header_css'];
$custom_css = $get_meta['print_table_css'];

if( !empty( $font_title) || !empty ($font_subtitle) || !empty ($font_text) || !empty ($site_font_title) || !empty ($site_font_subtitle) ) : ?>
	<?php if ($font_title == "select-six" || $font_subtitle == "select-six" || $font_text == "select-six" || $site_font_title == "select-six" || $site_font_subtitle == "select-six") { ?> <link href='https://fonts.googleapis.com/css?family=Arvo:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-seven" || $font_subtitle == "select-seven" || $font_text == "select-seven" || $site_font_title == "select-seven" || $site_font_subtitle == "select-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-height" || $font_subtitle == "select-eight" || $font_text == "select-height" || $site_font_title == "select-height" || $site_font_subtitle == "select-height") { ?> <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-nine" || $font_subtitle == "select-nine" || $font_text == "select-nine" || $site_font_title == "select-nine" || $site_font_subtitle == "select-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-ten" || $font_subtitle == "select-ten" || $font_text == "select-ten" || $site_font_title == "select-ten" || $site_font_subtitle == "select-ten") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-eleven" || $font_subtitle == "select-eleven" || $font_text == "select-eleven" || $site_font_title == "select-eleven" || $site_font_subtitle == "select-eleven") { ?> <link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twelve" || $font_subtitle == "select-twelve" || $font_text == "select-twelve" || $site_font_title == "select-twelve" || $site_font_subtitle == "select-twelve") { ?> <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirteen" || $font_subtitle == "select-thirteen" || $font_text == "select-thirteen" || $site_font_title == "select-thirteen" || $site_font_subtitle == "select-thirteen") { ?> <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-fourteen" || $font_subtitle == "select-fourteen" || $font_text == "select-fourteen" || $site_font_title == "select-fourteen" || $site_font_subtitle == "select-fourteen") { ?> <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-fifteen" || $font_subtitle == "select-fifteen" || $font_text == "select-fifteen" || $site_font_title == "select-fifteen" || $site_font_subtitle == "select-fifteen") { ?> <link href='https://fonts.googleapis.com/css?family=Coming+Soon&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-sixteen" || $font_subtitle == "select-sixteen" || $font_text == "select-sixteen" || $site_font_title == "select-sixteen" || $site_font_subtitle == "select-sixteen") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-seventeen" || $font_subtitle == "select-seventeen" || $font_text == "select-seventeen" || $site_font_title == "select-seventeen" || $site_font_subtitle == "select-seventeen") { ?> <link href='https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-eighteen" || $font_subtitle == "select-eighteen" || $font_text == "select-eighteen" || $site_font_title == "select-eighteen" || $site_font_subtitle == "select-eighteen") { ?> <link href='https://fonts.googleapis.com/css?family=Bree+Serif&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-nineteen" || $font_subtitle == "select-nineteen" || $font_text == "select-nineteen" || $site_font_title == "select-nineteen" || $site_font_subtitle == "select-nineteen") { ?> <link href='"https://fonts.googleapis.com/css?family=Montserrat&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty" || $font_subtitle == "select-twenty" || $font_text == "select-twenty" || $site_font_title == "select-twenty" || $site_font_subtitle == "select-twenty") { ?> <link href='https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-one" || $font_subtitle == "select-twenty-one" || $font_text == "select-twenty-one" || $site_font_title == "select-twenty-one" || $site_font_subtitle == "select-twenty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-two" || $font_subtitle == "select-twenty-two" || $font_text == "select-twenty-two" || $site_font_title == "select-twenty-two" || $site_font_subtitle == "select-twenty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-three" || $font_subtitle == "select-twenty-three" || $font_text == "select-twenty-three" || $site_font_title == "select-twenty-three" || $site_font_subtitle == "select-twenty-three") { ?> <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-four" || $font_subtitle == "select-twenty-four" || $font_text == "select-twenty-four" || $site_font_title == "select-twenty-four" || $site_font_subtitle == "select-twenty-four") { ?> <link href='https://fonts.googleapis.com/css?family=EB+Garamond:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-five" || $font_subtitle == "select-twenty-five" || $font_text == "select-twenty-five" || $site_font_title == "select-twenty-five" || $site_font_subtitle == "select-twenty-five") { ?> <link href='http://www.cnap.graphismeenfrance.fr/faune/styles/faune-fontes.css' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-six" || $font_subtitle == "select-twenty-six" || $font_text == "select-twenty-six" || $site_font_title == "select-twenty-six" || $site_font_subtitle == "select-twenty-six") { ?> <link href='https://fonts.googleapis.com/css?family=Play:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-seven" || $font_subtitle == "select-twenty-seven" || $font_text == "select-twenty-seven" || $site_font_title == "select-twenty-seven" || $site_font_subtitle == "select-twenty-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-eight" || $font_subtitle == "select-twenty-eight" || $font_text == "select-twenty-height" || $site_font_title == "select-twenty-height" || $site_font_subtitle == "select-twenty-height") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-nine" || $font_subtitle == "select-twenty-nine" || $font_text == "select-twenty-nine" || $site_font_title == "select-twenty-nine" || $site_font_subtitle == "select-twenty-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Special+Elite&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty" || $font_subtitle == "select-thirty" || $font_text == "select-thirty" || $site_font_title == "select-thirty" || $site_font_subtitle == "select-thirty") { ?> <link href='https://fonts.googleapis.com/css?family=Karma:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty-one" || $font_subtitle == "select-thirty-one" || $font_text == "select-thirty-one" || $site_font_title == "select-thirty-one" || $site_font_subtitle == "select-thirty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty-two" || $font_subtitle == "select-thirty-two" || $font_text == "select-thirty-two" || $site_font_title == "select-thirty-two" || $site_font_subtitle == "select-thirty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Overpass+Mono:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php  } 
endif; ?> 
	<style>
	<?php
	if( !empty( $font_title ) ) : 
	if ($font_title == "select-one") { ?> h1{font-family:Arial,Helvetica,sans-serif!important}
	<?php } 
	elseif ($font_title == "select-two") { ?> h1{font-family:Georgia,serif!important;}
	<?php }
	elseif ($font_title == "select-three") { ?> h1{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_title == "select-four") { ?> h1{font-family:Times New Roman, Times, serif!important;}
	<?php }
	elseif ($font_title == "select-five") { ?> h1{font-family:Verdana, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_title == "select-six") { ?> h1{font-family:'Arvo',serif!important;}
	<?php }
	elseif ($font_title == "select-seven") { ?> h1{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-height") { ?> h1{font-family:'Open Sans',sans-serif!important;}
	<?php }
	elseif ($font_title == "select-nine") { ?> h1{font-family: 'Roboto', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-ten") { ?> h1{font-family: 'Roboto Slab', serif!important;}
	<?php }
	elseif ($font_title == "select-eleven") { ?> h1{font-family: 'Lato', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-twelve") { ?> h1{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-thirteen") { ?> h1{font-family: 'Inconsolata', monospace!important;}
	<?php }
	elseif ($font_title == "select-fourteen") { ?> h1{font-family:'Playfair Display', serif!important;}
	<?php }
	elseif ($font_title == "select-fifteen") { ?> h1{font-family: 'Coming Soon', cursive!important}
	<?php }
	elseif ($font_title == "select-sixteen") { ?> h1{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-seventeen") { ?> h1{font-family: 'Raleway', sans-serif!important}
	<?php }
	elseif ($font_title == "select-eighteen") { ?> h1{font-family: 'Bree Serif', serif!important;}
	<?php }
	elseif ($font_title == "select-nineteen") { ?> h1{font-family: 'Montserrat', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-twenty") { ?> h1{font-family: 'Oswald', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-twenty-one") { ?> h1{font-family: 'Lobster',cursive!important;}
	<?php }
	elseif ($font_title == "select-twenty-two") { ?> h1{font-family:'Lobster Two',cursive!important;}
	<?php }
	elseif ($font_title == "select-twenty-three") { ?> h1{font-family:'Libre Baskerville', serif!important;}
	<?php }
	elseif ($font_title == "select-twenty-four") { ?> h1{font-family: 'EB Garamond', serif!important;}
	<?php }
	elseif ($font_title == "select-twenty-five") { ?> h1{font-family:'Faune', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-twenty-six") { ?> h1{font-family: 'Play', sans-serifimportant;}
	<?php }
	elseif ($font_title == "select-twenty-seven") { ?> h1{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php }
	elseif ($font_title == "select-twenty-eight") { ?> h1{font-family: 'Quattrocento', serif!important;}
	<?php }
	elseif ($font_title == "select-twenty-nine") { ?> h1{font-family: 'Special Elite', cursive!important;}
	<?php }
	elseif ($font_title == "select-thirty") { ?> h1{font-family: 'Karma', serif!important;}
	<?php }
	elseif ($font_title == "select-thirty-one") { ?> h1{font-family: 'Arbutus Slab', serif!important;}
	<?php }
	elseif ($font_title == "select-thirty-two") { ?> h1{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> h1{font-family:'Raleway',sans-serif!important} 
	<?php }
	endif; 

	if( !empty( $font_subtitle ) ) : 
	if ($font_subtitle == "select-one") { ?> h2{font-family:Arial,Helvetica,sans-serif!important}
	<?php } 
	elseif ($font_subtitle == "select-two") { ?> h2{font-family:Georgia,serif!important;}
	<?php }
	elseif ($font_subtitle == "select-three") { ?> h2{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-four") { ?> h2{font-family:Times New Roman, Times, serif!important;}
	<?php }
	elseif ($font_subtitle == "select-five") { ?> h2{font-family:Verdana, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-six") { ?> h2{font-family:'Arvo',serif!important;}
	<?php }
	elseif ($font_subtitle == "select-seven") { ?> h2{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-height") { ?> h2{font-family:'Open Sans',sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-nine") { ?> h2{font-family: 'Roboto', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-ten") { ?> h2{font-family: 'Roboto Slab', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-eleven") { ?> h2{font-family: 'Lato', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twelve") { ?> h2{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-thirteen") { ?> h2{font-family: 'Inconsolata', monospace!important;}
	<?php }
	elseif ($font_subtitle == "select-fourteen") { ?> h2{font-family:'Playfair Display', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-fifteen") { ?> h2{font-family: 'Coming Soon', cursive!important}
	<?php }
	elseif ($font_subtitle == "select-sixteen") { ?> h2{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-seventeen") { ?> h2{font-family: 'Raleway', sans-serif!important}
	<?php }
	elseif ($font_subtitle == "select-eighteen") { ?> h2{font-family: 'Bree Serif', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-nineteen") { ?> h2{font-family: 'Montserrat', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty") { ?> h2{font-family: 'Oswald', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-one") { ?> h2{font-family: 'Lobster',cursive!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-two") { ?> h2{font-family:'Lobster Two',cursive!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-three") { ?> h2{font-family:'Libre Baskerville', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-four") { ?> h2{font-family: 'EB Garamond', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-five") { ?> h2{font-family:'Faune', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-six") { ?> h2{font-family: 'Play', sans-serifimportant;}
	<?php }
	elseif ($font_subtitle == "select-twenty-seven") { ?> h2{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-eight") { ?> h2{font-family: 'Quattrocento', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-twenty-nine") { ?> h2{font-family: 'Special Elite', cursive!important;}
	<?php }
	elseif ($font_subtitle == "select-thirty") { ?> h2{font-family: 'Karma', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-thirty-one") { ?> h2{font-family: 'Arbutus Slab', serif!important;}
	<?php }
	elseif ($font_subtitle == "select-thirty-two") { ?> h2{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> h2{font-family:'Raleway',sans-serif!important} 
	<?php }
	endif; 
	
	if( !empty( $site_font_title ) ) : 
	if ($site_font_title == "select-one") { ?> #topheader h1{font-family:Arial,Helvetica,sans-serif!important}
	<?php } 
	elseif ($site_font_title == "select-two") { ?> #topheader h1{font-family:Georgia,serif!important;}
	<?php }
	elseif ($site_font_title == "select-three") { ?> #topheader h1{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-four") { ?> #topheader h1{font-family:Times New Roman, Times, serif!important;}
	<?php }
	elseif ($site_font_title == "select-five") { ?> #topheader h1{font-family:Verdana, Geneva, sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-six") { ?> #topheader h1{font-family:'Arvo',serif!important;}
	<?php }
	elseif ($site_font_title == "select-seven") { ?> #topheader h1{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-height") { ?> #topheader h1{font-family:'Open Sans',sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-nine") { ?> #topheader h1{font-family: 'Roboto', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-ten") { ?> #topheader h1{font-family: 'Roboto Slab', serif!important;}
	<?php }
	elseif ($site_font_title == "select-eleven") { ?> #topheader h1{font-family: 'Lato', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-twelve") { ?> #topheader h1{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-thirteen") { ?> #topheader h1{font-family: 'Inconsolata', monospace!important;}
	<?php }
	elseif ($site_font_title == "select-fourteen") { ?> #topheader h1{font-family:'Playfair Display', serif!important;}
	<?php }
	elseif ($site_font_title == "select-fifteen") { ?> #topheader h1{font-family: 'Coming Soon', cursive!important}
	<?php }
	elseif ($site_font_title == "select-sixteen") { ?> #topheader h1{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-seventeen") { ?> #topheader h1{font-family: 'Raleway', sans-serif!important}
	<?php }
	elseif ($site_font_title == "select-eighteen") { ?> #topheader h1{font-family: 'Bree Serif', serif!important;}
	<?php }
	elseif ($site_font_title == "select-nineteen") { ?> #topheader h1{font-family: 'Montserrat', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-twenty") { ?> #topheader h1{font-family: 'Oswald', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-one") { ?> #topheader h1{font-family: 'Lobster',cursive!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-two") { ?> #topheader h1{font-family:'Lobster Two',cursive!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-three") { ?> #topheader h1{font-family:'Libre Baskerville', serif!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-four") { ?> #topheader h1{font-family: 'EB Garamond', serif!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-five") { ?> #topheader h1{font-family:'Faune', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-six") { ?> #topheader h1{font-family: 'Play', sans-serifimportant;}
	<?php }
	elseif ($site_font_title == "select-twenty-seven") { ?> #topheader h1{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-eight") { ?> #topheader h1{font-family: 'Quattrocento', serif!important;}
	<?php }
	elseif ($site_font_title == "select-twenty-nine") { ?> #topheader h1{font-family: 'Special Elite', cursive!important;}
	<?php }
	elseif ($site_font_title == "select-thirty") { ?> #topheader h1{font-family: 'Karma', serif!important;}
	<?php }
	elseif ($site_font_title == "select-thirty-one") { ?> #topheader h1{font-family: 'Arbutus Slab', serif!important;}
	<?php }
	elseif ($site_font_title == "select-thirty-two") { ?> #topheader h1{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> #topheader h1{font-family:'Raleway',sans-serif!important} 
	<?php }
	endif; 
	
	if( !empty( $site_font_subtitle ) ) : 
	if ($site_font_subtitle == "select-one") { ?> #topheader h2{font-family:Arial,Helvetica,sans-serif!important}
	<?php } 
	elseif ($site_font_subtitle == "select-two") { ?> #topheader h2{font-family:Georgia,serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-three") { ?> #topheader h2{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-four") { ?> #topheader h2{font-family:Times New Roman, Times, serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-five") { ?> #topheader h2{font-family:Verdana, Geneva, sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-six") { ?> #topheader h2{font-family:'Arvo',serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-seven") { ?> #topheader h2{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-height") { ?> #topheader h2{font-family:'Open Sans',sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-nine") { ?> #topheader h2{font-family: 'Roboto', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-ten") { ?> #topheader h2{font-family: 'Roboto Slab', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-eleven") { ?> #topheader h2{font-family: 'Lato', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twelve") { ?> #topheader h2{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-thirteen") { ?> #topheader h2{font-family: 'Inconsolata', monospace!important;}
	<?php }
	elseif ($site_font_subtitle == "select-fourteen") { ?> #topheader h2{font-family:'Playfair Display', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-fifteen") { ?> #topheader h2{font-family: 'Coming Soon', cursive!important}
	<?php }
	elseif ($site_font_subtitle == "select-sixteen") { ?> #topheader h2{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-seventeen") { ?> #topheader h2{font-family: 'Raleway', sans-serif!important}
	<?php }
	elseif ($site_font_subtitle == "select-eighteen") { ?> #topheader h2{font-family: 'Bree Serif', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-nineteen") { ?> #topheader h2{font-family: 'Montserrat', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty") { ?> #topheader h2{font-family: 'Oswald', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-one") { ?> #topheader h2{font-family: 'Lobster',cursive!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-two") { ?> #topheader h2{font-family:'Lobster Two',cursive!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-three") { ?> #topheader h2{font-family:'Libre Baskerville', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-four") { ?> #topheader h2{font-family: 'EB Garamond', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-five") { ?> #topheader h2{font-family:'Faune', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-six") { ?> #topheader h2{font-family: 'Play', sans-serifimportant;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-seven") { ?> #topheader h2{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-eight") { ?> #topheader h2{font-family: 'Quattrocento', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-twenty-nine") { ?> #topheader h2{font-family: 'Special Elite', cursive!important;}
	<?php }
	elseif ($site_font_subtitle == "select-thirty") { ?> #topheader h2{font-family: 'Karma', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-thirty-one") { ?> #topheader h2{font-family: 'Arbutus Slab', serif!important;}
	<?php }
	elseif ($site_font_subtitle == "select-thirty-two") { ?> #topheader h2{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> #topheader h2{font-family:'Raleway',sans-serif!important} 
	<?php }
	endif; 
	
	if( !empty( $font_text ) ) : 
	if ($font_text == "select-one") { ?> body,html{font-family:Arial,Helvetica,sans-serif!important}
	<?php } 
	elseif ($font_text == "select-two") { ?> body,html{font-family:Georgia,serif!important;}
	<?php }
	elseif ($font_text == "select-three") { ?> body,html{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_text == "select-four") { ?> body,html{font-family:Times New Roman, Times, serif!important;}
	<?php }
	elseif ($font_text == "select-five") { ?> body,html{font-family:Verdana, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_text == "select-six") { ?> body,html{font-family:'Arvo',serif!important;}
	<?php }
	elseif ($font_text == "select-seven") { ?> body,html{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-height") { ?> body,html{font-family:'Open Sans',sans-serif!important;}
	<?php }
	elseif ($font_text == "select-nine") { ?> body,html{font-family: 'Roboto', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-ten") { ?> body,html{font-family: 'Roboto Slab', serif!important;}
	<?php }
	elseif ($font_text == "select-eleven") { ?> body,html{font-family: 'Lato', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twelve") { ?> body,html{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-thirteen") { ?> body,html{font-family: 'Inconsolata', monospace!important;}
	<?php }
	elseif ($font_text == "select-fourteen") { ?> body,html{font-family:'Playfair Display', serif!important;}
	<?php }
	elseif ($font_text == "select-fifteen") { ?> body,html{font-family: 'Coming Soon', cursive!important}
	<?php }
	elseif ($font_text == "select-sixteen") { ?> body,html{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-seventeen") { ?> body,html{font-family: 'Raleway', sans-serif!important}
	<?php }
	elseif ($font_text == "select-eighteen") { ?> body,html{font-family: 'Bree Serif', serif!important;}
	<?php }
	elseif ($font_text == "select-nineteen") { ?> body,html{font-family: 'Montserrat', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty") { ?> body,html{font-family: 'Oswald', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-one") { ?> body,html{font-family: 'Lobster',cursive!important;}
	<?php }
	elseif ($font_text == "select-twenty-two") { ?> body,html{font-family:'Lobster Two',cursive!important;}
	<?php }
	elseif ($font_text == "select-twenty-three") { ?> body,html{font-family:'Libre Baskerville', serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-four") { ?> body,html{font-family: 'EB Garamond', serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-five") { ?> body,html{font-family:'Faune', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-six") { ?> body,html{font-family: 'Play', sans-serifimportant;}
	<?php }
	elseif ($font_text == "select-twenty-seven") { ?> body,html{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-eight") { ?> body,html{font-family: 'Quattrocento', serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-nine") { ?> body,html{font-family: 'Special Elite', cursive!important;}
	<?php }
	elseif ($font_text == "select-thirty") { ?> body,html{font-family: 'Karma', serif!important;}
	<?php }
	elseif ($font_text == "select-thirty-one") { ?> body,html{font-family: 'Arbutus Slab', serif!important;}
	<?php }
	elseif ($font_text == "select-thirty-two") { ?> body,html{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> body,html{font-family:'Raleway',sans-serif!important} 
	<?php }
	endif; ?> <?php if ( !empty ($background) ) : ?>
body,html{background:<?php echo $background;?>;}
	<?php endif; ?>
body,html{margin:0;}
	.container{width: <?php echo $content_width; ?>%;margin:0 auto!important;display:block;}
	#content{ <?php if ( !empty($fill) ) : ?>column-fill: auto;<?php endif; ?> -webkit-column-count: <?php echo $table_content_columns; ?>; -moz-column-count: <?php echo $table_content_columns; ?>; column-count: <?php echo $table_content_columns; ?>; <?php if ( !empty ($table_columns_gutter) && $table_content_columns > 1 ) : ?>-webkit-column-gap: <?php echo $table_columns_gutter; ?>mm; -moz-column-gap: <?php echo $table_columns_gutter; ?>mm; column-gap: <?php echo $table_columns_gutter; ?>mm;<?php endif; ?>display:block;<?php if (!empty ($filet) ) : ?>-webkit-column-rule: 1px solid #000; -moz-column-rule: 1px solid #000); column-rule: 1px solid #000;<?php endif; ?>}
<?php if (!empty($site_title) || !empty ($site_subtitle) ) : ?>
	#topheader {margin-bottom:<?php echo $table_header_bottom; ?>mm; margin-top:<?php echo $table_header_top; ?>mm; color: <?php echo $header_color; ?>;text-align:<?php if ($header_align  == 1) {?>left<?php } elseif ($header_align  == 2) { ?> center <?php } else { ?> right; <?php } ?>; <?php if($header_border == 1) { ?>border: none; padding:<?php echo $header_border_padding; ?>mm; <?php } elseif ($header_border == 2) { ?> border: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; <?php if ($bottomborder != "none") : ?>border-bottom-style: <?php echo $bottomborder; ?>!important; <?php endif; ?> border-bottom-width:<?php echo $header_border_bottom_width; ?>mm!important; <?php  } elseif  ($header_border == 3) { ?> border-top: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; border-bottom: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; <?php if ($bottomborder != "none") : ?>border-bottom-style: <?php echo $bottomborder; ?>!important; <?php endif; ?> border-bottom-width:<?php echo $header_border_bottom_width; ?>mm!important; <?php } else { ?> border-bottom: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; <?php if ($bottomborder != "none") : ?>border-bottom-style: <?php echo $bottomborder; ?>!important; <?php endif; ?> border-bottom-width:<?php echo $header_border_bottom_width; ?>mm!important; <?php  } 	 ?> }
<?php endif;?>
<?php if (!empty ($nomargin) ) : ?>
	#topheader{margin-left:-<?php echo $margin_left; ?>mm!important;margin-right:-<?php echo $margin_left; ?>mm!important;}
<?php endif; ?>
	#page_title{font-size:<?php echo $title_size; ?>pt;color: <?php echo $color_title; ?>;text-align:<?php if ($title_align == 1) { echo 'left'; } elseif ($title_align == 2) {echo 'center'; } else { echo 'right';} ?>;margin-top:<?php echo $title_margin_top; ?>mm; margin-bottom:<?php echo $title_margin_bottom; ?>mm;}
	.chapter_title{font-size:<?php echo $subtitle_size; ?>pt; color: <?php echo $color_subtitle; ?>; text-align: <?php echo $subtitle_align; ?>;margin-top: <?php echo $subtitle_margin_top; ?>mm;margin-bottom: <?php echo $subtitle_margin_bottom; ?>mm;<?php if (!empty ($break) ) : ?>break-before: page;<?php endif; ?>}
	#topheader h1{font-size:<?php echo $header_title_size; ?>pt;margin: 0 0 <?php echo $table_header_margin_title; ?>mm 0;}
	#topheader h2{font-size:<?php echo $header_subtitle_size; ?>pt;margin:0 0 0 0!important;}
	.pix,ol{<?php if (!empty ($text_margin_top) ) : ?>margin-top:<?php echo $text_margin_top; ?>mm;<?php endif; ?><?php if (!empty ($text_margin_bottom) ) : ?>margin-bottom:<?php echo $text_margin_bottom; ?>mm;<?php endif; ?><?php if (!empty ($text_padding) ) : ?>padding-left:<?php echo $text_padding; ?>mm;<?php endif; ?>}
	li{color:<?php echo $color_text; ?>; font-size: <?php echo $text_size; ?>pt;margin-bottom:<?php echo $li_margin_bottom; ?>mm;}
<?php if ($text_style == 1 ) { ?>
	.pix{padding:0;list-style-type: none;}
<?php } 
elseif ($text_style == 2 ) { ?>
	.pix{list-style-type: bullet;list-style-position: outside;list-style-image: none;}
<?php }
elseif ($text_style == 3 ) { ?>
	.pix{list-style-type: square;list-style-position: outside;list-style-image: none;}
<?php } ?>
	@media print {
	body{overflow:visible;height: height:100%!important;}
		@page { 			
<?php if ($table_size == 1) { ?>
			size: A4 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($table_size == 2) { ?>
			size: A3 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($table_size == 3) { ?>
			size: B5 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($table_size == 4) { ?>
			size: 280mm 430mm <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif (!empty($custom_size)) { ?>
			size: <?php echo $custom_width; ?>mm <?php echo $custom_height; ?>mm <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } ?>
			bleed: 5mm;
<?php if (!empty ($crop_marks) ) : ?>
			marks: crop cross;
<?php endif; ?>
<?php if (!empty($margin_top) && empty($recto) ) { ?>
			margin-top : <?php echo $margin_top; ?>mm;
			margin-bottom:  <?php echo $margin_top; ?>mm;
<?php } elseif (!empty($recto) ) { ?>
			margin: 10mm 15mm;
<?php } else { ?>
			margin-top: 0;
			margin-bottom: 0;
<?php } ?>
<?php if ( !empty($margin_left) && empty($recto) ) { ?>
			margin-left : <?php echo $margin_left; ?>mm;
			margin-right:  <?php echo $margin_left; ?>mm;
<?php } elseif ( empty($margin_left) && empty($recto) ) { ?>
			margin-left: 0;
			margin-right: 0;
<?php } ?>
		}	
<?php if ( !empty($recto) ) : ?>
		@page:left {
		  margin-left: 25mm;
		  margin-right: 10mm;
		}
		@page:right {
		  margin-left: 10mm;
		  margin-right: 25mm;
		}
<?php endif; 
	if (!empty($recto) && !empty($break) ) : ?>
		.chapter_title { break-before: right; }
<?php endif; ?>
	}
<?php 
	if (!empty ($header_css) ) : echo $header_css; endif;
	if (!empty ($custom_css) ) : echo $custom_css; endif; 
?>

</style>
  </head>
  
  <body>
	<div class="container">
		
		<?php 
		
		if ($tri  == 1 ) : $tri = "DESC"; endif;
		if ($tri  == 2 ) : $tri = "ASC"; endif;
		
		if (!empty ($site_title) && empty ($site_subtitle)  ) : ?>
		<header id="topheader">
			<h1 id="site_title"><?php bloginfo( 'name' ); ?></h1>
		</header>
		<?php endif;?>
		
		<?php if (!empty ($site_subtitle) && empty ($site_title) ) : ?>
		<header id="topheader">
			<h2 id="site_subtitle"><?php bloginfo( 'description' ); ?></h2>
		</header>
		<?php endif;?>
		
		<?php if (!empty ($site_subtitle) && !empty ($site_title) ) : ?>
		<header id="topheader">
			<h1 id="site_title"><?php bloginfo( 'name' ); ?></h1>
			<h2 id="site_subtitle"><?php bloginfo( 'description' ); ?></h2>
		</header>
		<?php endif;?>
		
		<?php if (!empty ($page_title) ) : ?>
<h1 id="page_title"><?php echo $page_title; ?></h1>
		<?php endif;?>
		
		<div id="content">	
		<?php if ( empty ($nodisplay_project) ) :
		
	if (empty($nodisplay_title_project) ) : ?>
	<h2 class="chapter_title"><?php echo $project_title; ?></h2>
	<?php endif; ?>	
			<section>	
			<?php 
				
				$projects = array_map('intval', explode(',', $project_id));
				
				if ($text_style == 4 ) : ?><ol><?php else: ?><ul class="pix"><?php endif;
				
				$args = array(
					'post_type' => array('projects'),
					'post_status' => array('publish'),
					'posts_per_page' => 500,
					'order' => 'DESC', 
					'orderby' => 'date',
					'post__not_in' => $projects
				);
			
			$the_query = new WP_Query( $args );
				
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :
					  $the_query->the_post(); ?>
				
				<li><?php the_title(); ?></li>
			<?php 
				endwhile;
				endif;
				wp_reset_postdata();
				
				if ($text_style == 4 ) : ?></ol><?php else: ?></ul><?php endif;?>
		
			</section>
		<?php endif; ?>
		
		
		<?php if ( empty ($nodisplay_map) ) :
		
	if (empty($nodisplay_title_map) ) : ?>
	<h2 class="chapter_title"><?php echo $map_title; ?></h2>
	<?php endif; ?>	
			<section>	
			<?php 
				
				if ($text_style == 4 ) : ?><ol><?php else: ?><ul class="pix"><?php endif;
				$maps = array_map('intval', explode(',', $map_id));
				$args = array(
					'post_type' => array('maps'),
					'post_status' => array('publish'),
					'posts_per_page' => 500,
					'order' => $tri, 
					'orderby' => 'date',
					'post__not_in' => $maps
				);
			
			$the_query = new WP_Query( $args );
				
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :
					  $the_query->the_post(); ?>
				
				<li><?php the_title(); ?></li>
			<?php 
				endwhile;
				endif;
				wp_reset_postdata();
				
				if ($text_style == 4 ) : ?></ol><?php else: ?></ul><?php endif;?>
		
			</section>
		<?php endif; ?>
		
		<?php if ( empty ($nodisplay_marker) ) :
		
	if (empty($nodisplay_title_marker) ) : ?>
	<h2 class="chapter_title"><?php echo $marker_title; ?></h2>
	<?php endif; ?>	
			<section>	
			<?php 
				
				if ($text_style == 4 ) : ?><ol><?php else: ?><ul class="pix"><?php endif;
				$markers = array_map('intval', explode(',', $marker_id));
				$args = array(
					'post_type' => array('markers'),
					'post_status' => array('publish'),
					'posts_per_page' => 500,
					'order' => $tri, 
					'orderby' => 'date',
					'post__not_in' => $markers
				);
			
			$the_query = new WP_Query( $args );
				
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :
					  $the_query->the_post(); ?>
				
				<li><?php the_title(); ?></li>
			<?php 
				endwhile;
				endif;
				wp_reset_postdata();
				
				if ($text_style == 4 ) : ?></ol><?php else: ?></ul><?php endif;?>
		
			</section>
		<?php endif; ?>
		
		<?php if ( empty ($nodisplay_gf) ) :
		
	if (empty($nodisplay_title_gf) ) : ?>
	<h2 class="chapter_title"><?php echo $gf_title; ?></h2>
	<?php endif; ?>	
			<section>	
			<?php 
				
				if ($text_style == 4 ) : ?><ol><?php else: ?><ul class="pix"><?php endif;
				$gfs = array_map('intval', explode(',', $gf_id));
				$args = array(
					'post_type' => array('geoformat'),
					'post_status' => array('publish'),
					'posts_per_page' => 500,
					'order' => $tri, 
					'orderby' => 'date',
					'post__not_in' => $gfs
				);
			
			$the_query = new WP_Query( $args );
				
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :
					  $the_query->the_post(); ?>
				
				<li><?php the_title(); ?></li>
			<?php 
				endwhile;
				endif;
				wp_reset_postdata();
				
				if ($text_style == 4 ) : ?></ol><?php else: ?></ul><?php endif;?>
		
			</section>
		<?php endif; ?>
		
		<?php if ( empty ($nodisplay_post) ) :
		
	if (empty($nodisplay_title_post) ) : ?>
	<h2 class="chapter_title"><?php echo $post_title; ?></h2>
	<?php endif; ?>	
			<section>	
			<?php 
				
				if ($text_style == 4 ) : ?><ol><?php else: ?><ul class="pix"><?php endif;
				$posts = array_map('intval', explode(',', $post_id));
				$args = array(
					'post_type' => array('post'),
					'post_status' => array('publish'),
					'posts_per_page' => 500,
					'order' => $tri, 
					'orderby' => 'date',
					'post__not_in' => $posts
				);
			
			$the_query = new WP_Query( $args );
				
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :
					  $the_query->the_post(); ?>
				
				<li><?php the_title(); ?></li>
			<?php 
				endwhile;
				endif;
				wp_reset_postdata();
				
				if ($text_style == 4 ) : ?></ol><?php else: ?></ul><?php endif;?>
		
			</section>
		<?php endif; ?>
		
		<?php if ( empty ($nodisplay_page) ) :
		
	if (empty($nodisplay_title_page) ) : ?>
	<h2 class="chapter_title"><?php echo $page_page_title; ?></h2>
	<?php endif; ?>	
			<section>	
			<?php 
				if ($text_style == 4 ) : ?><ol><?php else: ?><ul class="pix"><?php endif;
				$pages = array_map('intval', explode(',', $page_id));
				$args = array(
					'post_type' => array('page'),
					'post_status' => array('publish'),
					'posts_per_page' => 500,
					'order' => $tri, 
					'orderby' => 'date',
					'post__not_in' => $pages
				);
			
			$the_query = new WP_Query( $args );
				
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) :
					  $the_query->the_post(); ?>
				
				<li><?php the_title(); ?></li>
			<?php 
				endwhile;
				endif;
				wp_reset_postdata();
				
				if ($text_style == 4 ) : ?></ol><?php else: ?></ul><?php endif;?>
		
			</section>
		<?php endif; ?>
		
		
		<?php 
		if ( empty ($nodisplay_category) ) :
			$cats = get_categories(); 
			foreach ($cats as $cat) {
				$cat_id= $cat->term_id;
			echo "<h2 class='chapter_title'>".$cat->name."</h2>"; ?>
			
			<section>
			<?php if ($text_style == 4 ) : ?><ol><?php else: ?><ul class="pix"><?php endif;
			query_posts("cat=$cat_id&posts_per_page=100&post_type=any&order=$tri");
			
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<li><?php the_title(); ?></li>		
			<?php 
				endwhile; 
				endif;
				wp_reset_postdata();
			} 
			if ($text_style == 4 ) : ?></ol><?php else: ?></ul><?php endif;?>
		
			</section>
		<?php endif; ?>
</div>
	</div>
  </body>
</html>