<?php
/**
 * Template Name: Cover
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

$cover_size = $get_meta['print_cover_size'];
$paper_size = $get_meta['print_cover_paper_size'];
$custom_size = $get_meta['print_custom_size_activate'];
$crop_marks = $get_meta['print_crop_marks'];
$custom_width = $get_meta['print_custom_width'];
$custom_height = $get_meta['print_custom_height'];
$margin_top = $get_meta['print_margin_top'];
$margin_left = $get_meta['print_margin_left'];
$vertical_align = $get_meta['print_content_vertical_align'];
$content_width = $get_meta['print_content_content_width'];
$background = $get_meta['print_color_background'];
$background_image = $get_meta['print_image_background'];
$background_vertical = $get_meta['print_background_vertical_align'];
$background_horizontal = $get_meta['print_background_horizontal_align'];
$font_title = $get_meta['print_title'];
$color_title = $get_meta['print_color_title'];
$font_text = $get_meta['print_font_text'];
$font_subtitle = $get_meta['print_subtitle'];
$color_subtitle = $get_meta['print_color_subtitle'];
$color_text = $get_meta['print_color_text'];
$title_size = $get_meta['print_title_size'];
$subtitle_size = $get_meta['print_subtitle_size'];
$title_align = $get_meta['print_title_align'];
$title_margin_top = $get_meta['print_title_margin_top'];
$title_margin_bottom = $get_meta['print_title_margin_bottom'];
$subtitle_align = $get_meta['print_subtitle_align'];
$subtitle_margin_top = $get_meta['print_subtitle_margin_top'];
$subtitle_margin_bottom = $get_meta['print_subtitle_margin_bottom'];
$no_subtitle = $get_meta['print_no_subtitle'];
if (!empty($get_meta['print_text']) ) :
$text = $get_meta['print_text'];
$text_size = $get_meta['print_text_size'];
$text_align = $get_meta['print_text_align'];
$text_margin_top = $get_meta['print_text_margin_top'];
$text_margin_bottom = $get_meta['print_text_margin_bottom'];
$text_position = $get_meta['print_text_position'];
endif;
$image = $get_meta['print_image'];
$image_size = $get_meta['print_image_size'];
$image_align = $get_meta['print_image_align'];
$image_margin_top = $get_meta['print_image_margin_top'];
$image_margin_bottom = $get_meta['print_image_margin_bottom'];
if (!empty($get_meta['print_image_position']) ) :
$image_position = $get_meta['print_image_position'];
endif;
$border_width = $get_meta['print_border_width'];
$border_style = $get_meta['print_border_style'];
$border_padding = $get_meta['print_border_padding'];
if (!empty($get_meta['border_elements']) ) :
$border_elements = $get_meta['border_elements'];
endif;
if (!empty($get_meta['border_title']) ) :
$border_title = $get_meta['border_title'];
endif;
if (!empty($get_meta['border_subtitle']) ) :
$border_subtitle = $get_meta['border_subtitle'];
endif;
if (!empty($get_meta['border_image']) ) :
$border_image = $get_meta['border_image'];
endif;
if (!empty($get_meta['border_text']) ) :
$border_text = $get_meta['border_text'];
endif;
$border_color = $get_meta['print_border_color'];
if (!empty($get_meta['print_cover_css']) ) :
$custom_css = $get_meta['print_cover_css'];
endif;
if( !empty( $font_title) || !empty ($font_subtitle) ) : ?>
	<?php if ($font_title == "select-six" || $font_subtitle == "select-six" || $font_text == "select-six") { ?> <link href='https://fonts.googleapis.com/css?family=Arvo:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-seven" || $font_subtitle == "select-seven" || $font_text == "select-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-height" || $font_subtitle == "select-eight" || $font_text == "select-height") { ?> <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-nine" || $font_subtitle == "select-nine" || $font_text == "select-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-ten" || $font_subtitle == "select-ten" || $font_text == "select-ten") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-eleven" || $font_subtitle == "select-eleven" || $font_text == "select-eleven") { ?> <link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twelve" || $font_subtitle == "select-twelve" || $font_text == "select-twelve") { ?> <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirteen" || $font_subtitle == "select-thirteen" || $font_text == "select-thirteen") { ?> <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-fourteen" || $font_subtitle == "select-fourteen" || $font_text == "select-fourteen") { ?> <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-fifteen" || $font_subtitle == "select-fifteen" || $font_text == "select-fifteen") { ?> <link href='https://fonts.googleapis.com/css?family=Coming+Soon&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-sixteen" || $font_subtitle == "select-sixteen" || $font_text == "select-sixteen") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-seventeen" || $font_subtitle == "select-seventeen" || $font_text == "select-seventeen") { ?> <link href='https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-eighteen" || $font_subtitle == "select-eighteen" || $font_text == "select-eighteen") { ?> <link href='https://fonts.googleapis.com/css?family=Bree+Serif&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-nineteen" || $font_subtitle == "select-nineteen" || $font_text == "select-nineteen") { ?> <link href='"https://fonts.googleapis.com/css?family=Montserrat&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty" || $font_subtitle == "select-twenty" || $font_text == "select-twenty") { ?> <link href='https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-one" || $font_subtitle == "select-twenty-one" || $font_text == "select-twenty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-two" || $font_subtitle == "select-twenty-two" || $font_text == "select-twenty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-three" || $font_subtitle == "select-twenty-three" || $font_text == "select-twenty-three") { ?> <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-four" || $font_subtitle == "select-twenty-four" || $font_text == "select-twenty-four") { ?> <link href='https://fonts.googleapis.com/css?family=EB+Garamond:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-five" || $font_subtitle == "select-twenty-five" || $font_text == "select-twenty-five") { ?> <link href='http://www.cnap.graphismeenfrance.fr/faune/styles/faune-fontes.css' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-six" || $font_subtitle == "select-twenty-six" || $font_text == "select-twenty-six") { ?> <link href='https://fonts.googleapis.com/css?family=Play:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-seven" || $font_subtitle == "select-twenty-seven" || $font_text == "select-twenty-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-eight" || $font_subtitle == "select-twenty-eight" || $font_text == "select-twenty-height") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-twenty-nine" || $font_subtitle == "select-twenty-nine" || $font_text == "select-twenty-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Special+Elite&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty" || $font_subtitle == "select-thirty" || $font_text == "select-thirty") { ?> <link href='https://fonts.googleapis.com/css?family=Karma:400,700&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty-one" || $font_subtitle == "select-thirty-one" || $font_text == "select-thirty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap' rel='stylesheet' type='text/css'>
	<?php } if ($font_title == "select-thirty-two" || $font_subtitle == "select-thirty-two" || $font_text == "select-thirty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Overpass+Mono:400,700&display=swap' rel='stylesheet' type='text/css'>
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
	
	if( !empty( $font_text ) ) : 
	if ($font_text == "select-one") { ?> p{font-family:Arial,Helvetica,sans-serif!important}
	<?php } 
	elseif ($font_text == "select-two") { ?> p{font-family:Georgia,serif!important;}
	<?php }
	elseif ($font_text == "select-three") { ?> p{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_text == "select-four") { ?> p{font-family:Times New Roman, Times, serif!important;}
	<?php }
	elseif ($font_text == "select-five") { ?> p{font-family:Verdana, Geneva, sans-serif!important;}
	<?php }
	elseif ($font_text == "select-six") { ?> p{font-family:'Arvo',serif!important;}
	<?php }
	elseif ($font_text == "select-seven") { ?> p{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-height") { ?> p{font-family:'Open Sans',sans-serif!important;}
	<?php }
	elseif ($font_text == "select-nine") { ?> p{font-family: 'Roboto', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-ten") { ?> p{font-family: 'Roboto Slab', serif!important;}
	<?php }
	elseif ($font_text == "select-eleven") { ?> p{font-family: 'Lato', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twelve") { ?> p{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-thirteen") { ?> p{font-family: 'Inconsolata', monospace!important;}
	<?php }
	elseif ($font_text == "select-fourteen") { ?> p{font-family:'Playfair Display', serif!important;}
	<?php }
	elseif ($font_text == "select-fifteen") { ?> p{font-family: 'Coming Soon', cursive!important}
	<?php }
	elseif ($font_text == "select-sixteen") { ?> p{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-seventeen") { ?> p{font-family: 'Raleway', sans-serif!important}
	<?php }
	elseif ($font_text == "select-eighteen") { ?> p{font-family: 'Bree Serif', serif!important;}
	<?php }
	elseif ($font_text == "select-nineteen") { ?> p{font-family: 'Montserrat', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty") { ?> p{font-family: 'Oswald', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-one") { ?> p{font-family: 'Lobster',cursive!important;}
	<?php }
	elseif ($font_text == "select-twenty-two") { ?> p{font-family:'Lobster Two',cursive!important;}
	<?php }
	elseif ($font_text == "select-twenty-three") { ?> p{font-family:'Libre Baskerville', serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-four") { ?> p{font-family: 'EB Garamond', serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-five") { ?> p{font-family:'Faune', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-six") { ?> p{font-family: 'Play', sans-serifimportant;}
	<?php }
	elseif ($font_text == "select-twenty-seven") { ?> p{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-eight") { ?> p{font-family: 'Quattrocento', serif!important;}
	<?php }
	elseif ($font_text == "select-twenty-nine") { ?> p{font-family: 'Special Elite', cursive!important;}
	<?php }
	elseif ($font_text == "select-thirty") { ?> p{font-family: 'Karma', serif!important;}
	<?php }
	elseif ($font_text == "select-thirty-one") { ?> p{font-family: 'Arbutus Slab', serif!important;}
	<?php }
	elseif ($font_text == "select-thirty-two") { ?> p{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> p{font-family:'Raleway',sans-serif!important} 
	<?php }
	endif; ?> 
<?php if (!empty ($printed) ) : ?>	
<?php if (!empty ($background) && empty($background_image) ) { ?>
body,html{background:<?php echo $background;?>;}
	<?php } elseif (!empty ($background_image) ) { ?>
body, html{background: <?php echo $background;?> URL('<?php echo $background_image; ?>') no-repeat <?php if ($background_vertical == 1 ) { echo 'top'; } elseif ($background_vertical == 2 ) { echo 'center'; } else { echo 'bottom'; } ?> <?php  if ($background_horizontal == 1 ) { echo 'left'; } elseif ($background_horizontal == 2 ) { echo 'center'; } else { echo 'right'; } ?>; background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;}
	<?php } ?>
body,html{margin:0;<?php if (!empty ($border_width) ) : ?>  min-height:90%;min-height:90vh; <?php else : ?>height:90%;height:90vh;<?php endif; ?>overflow-x:hidden;}
	.container{width: <?php echo $content_width;?>%;display:table;<?php if (!empty ($border_width) ) : ?>  min-height:95%;min-height:95vh; <?php else : ?>height:90%;height:90vh;<?php endif; ?>margin:0 auto!important;overflow-x:hidden;}
	#page-content{display:table-cell;height:100%;height:100vh;vertical-align: <?php if ($vertical_align == 1) { echo "top"; } elseif ($vertical_align == 2) { echo "middle"; } else { echo "bottom"; } ?>;}
	h1{font-size: <?php echo $title_size; ?>pt;margin:0;color:<?php echo $color_title; ?>;text-align:<?php if ($title_align == 1) { echo 'left'; } elseif ($title_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($title_margin_top) ) : ?>margin-top: <?php echo $title_margin_top; ?>mm; <?php endif; if (!empty($title_margin_bottom) ) : ?>margin-bottom: <?php echo $title_margin_bottom; ?>mm; <?php endif; ?>}
	h2{font-size: <?php echo $subtitle_size; ?>pt;margin:0;color:<?php echo $color_subtitle; ?>;text-align:<?php if ($subtitle_align == 1) { echo 'left'; } elseif ($subtitle_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($subtitle_margin_top) ) : ?>margin-top: <?php echo $subtitle_margin_top; ?>mm; <?php endif; if (!empty($subtitle_margin_bottom) ) : ?>margin-bottom: <?php echo $subtitle_margin_bottom; ?>mm; <?php endif; ?>}
	p{color:<?php echo $color_text; ?>;font-size: <?php echo $text_size; ?>pt;text-align: <?php if ($text_align == 1) { echo 'left'; } elseif ($text_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($text_margin_top) ) : ?>margin-top: <?php echo $text_margin_top; ?>mm; <?php endif; if (!empty($text_margin_bottom) ) : ?>margin-bottom: <?php echo $text_margin_bottom; ?>mm; <?php endif; ?>}
<?php if (!empty ($image ) ) : ?>
	.image{width:100%;text-align: <?php if ($image_align == 1) { echo 'left'; } elseif ($image_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($image_margin_top) ) : ?>margin-top: <?php echo $image_margin_top; ?>mm; <?php endif; if (!empty($image_margin_bottom) ) : ?>margin-bottom: <?php echo $image_margin_bottom; ?>mm; <?php endif; ?>}
	.image img{width:<?php echo $image_size; ?>mm;height;auto;}
<?php endif; ?>
<?php if (!empty ($border_elements) ) : ?>
	.container {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_title) ) : ?>
	h1 {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_subtitle) ) : ?>
	h2 {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_text) ) : ?>
	p {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_image) ) : ?>
	img {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
	<?php if (!empty ($custom_css) ) : echo $custom_css; endif; ?>
@media print {
	@page { 
<?php if ($cover_size == 1) { ?>
		size: A4 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($cover_size == 2) { ?>
		size: A3 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($cover_size == 3) { ?>
		size: B5 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($cover_size == 4) { ?>
		size: 280mm 430mm <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } ?>
		bleed: 5mm;
<?php if (!empty ($crop_marks) ) : ?>
		marks: crop cross;
<?php endif; ?>
<?php if (!empty($margin_top) ) : ?>
		margin-top : <?php echo $margin_top; ?>mm;
		margin-bottom:  <?php echo $margin_top; ?>mm;
<?php else : ?>
		margin-top: 0;
		margin-bottom: 0;
<?php endif; ?>
<?php if (!empty($margin_left) ) : ?>
		margin-left : <?php echo $margin_left; ?>mm;
		margin-right:  <?php echo $margin_left; ?>mm;
<?php else : ?>
		margin-left: 0;
		margin-right: 0;
<?php endif; ?>
	}
}
<?php 
//Without Printed.js
else : ?>
<?php if (!empty ($background) && empty($background_image) ) { ?>
body,html{background:<?php echo $background;?>;}
	<?php } elseif (!empty ($background_image) ) { ?>
body{background: <?php echo $background;?> URL('<?php echo $background_image; ?>') no-repeat <?php if ($background_vertical == 1 ) { echo 'top'; } elseif ($background_vertical == 2 ) { echo 'center'; } else { echo 'bottom'; } ?> <?php  if ($background_horizontal == 1 ) { echo 'left'; } elseif ($background_horizontal == 2 ) { echo 'center'; } else { echo 'right'; } ?> ; background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;}
	<?php } ?>
body,html{margin:0;<?php if (!empty ($border_width) ) : ?>  min-height:100%;min-height:100vh; <?php else : ?>height:100%;height:100vh;<?php endif; ?>overflow-x:hidden;}
	.container{width: <?php echo $content_width;?>%;display:table;<?php if (!empty ($border_width) ) : ?>  min-height:100%;min-height:100vh; <?php else : ?>height:100%;height:100vh;<?php endif; ?>margin:0 auto!important;overflow-x:hidden;}
	#page-content{display:table-cell;height:100%;height:100vh;vertical-align: <?php if ($vertical_align == 1) { echo "top"; } elseif ($vertical_align == 2) { echo "middle"; } else { echo "bottom"; } ?>;}
	h1{font-size: <?php echo $title_size; ?>pt;margin:0;color:<?php echo $color_title; ?>;text-align:<?php if ($title_align == 1) { echo 'left'; } elseif ($title_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($title_margin_top) ) : ?>margin-top: <?php echo $title_margin_top; ?>mm; <?php endif; if (!empty($title_margin_bottom) ) : ?>margin-bottom: <?php echo $title_margin_bottom; ?>mm; <?php endif; ?>}
	h2{font-size: <?php echo $subtitle_size; ?>pt;margin:0;color:<?php echo $color_subtitle; ?>;text-align:<?php if ($subtitle_align == 1) { echo 'left'; } elseif ($subtitle_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($subtitle_margin_top) ) : ?>margin-top: <?php echo $subtitle_margin_top; ?>mm; <?php endif; if (!empty($subtitle_margin_bottom) ) : ?>margin-bottom: <?php echo $subtitle_margin_bottom; ?>mm; <?php endif; ?>}
	p{color:<?php echo $color_text; ?>;font-size: <?php echo $text_size; ?>pt;text-align: <?php if ($text_align == 1) { echo 'left'; } elseif ($text_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($text_margin_top) ) : ?>margin-top: <?php echo $text_margin_top; ?>mm; <?php endif; if (!empty($text_margin_bottom) ) : ?>margin-bottom: <?php echo $text_margin_bottom; ?>mm; <?php endif; ?>}
	.image{width:100%;text-align: <?php if ($image_align == 1) { echo 'left'; } elseif ($image_align == 2) {echo 'center'; } else { echo 'right';} ?>;<?php if (!empty($image_margin_top) ) : ?>margin-top: <?php echo $image_margin_top; ?>mm; <?php endif; if (!empty($image_margin_bottom) ) : ?>margin-bottom: <?php echo $image_margin_bottom; ?>mm; <?php endif; ?>}
	.image img{width:<?php echo $image_size; ?>mm;height;auto;}
<?php if (!empty ($border_elements) ) : ?>
	.container {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_title) ) : ?>
	h1 {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_subtitle) ) : ?>
	h2 {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_text) ) : ?>
	p {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
<?php if (!empty ($border_image) ) : ?>
	img {border: <?php echo $border_width; ?>mm <?php if ($border_style == 1) { echo "solid"; } elseif ($border_style == 2) { echo "dotted"; } elseif ($border_style == 3) { echo "dashed"; } else { echo "double"; } ?> <?php echo $border_color; ?>; padding: <?php echo $border_padding; ?>mm; }
<?php endif; ?>
	<?php if (!empty ($custom_css) ) : echo $custom_css; endif; ?>
	
	<?php if ( empty ($custom_size ) ) : ?>
	@page { 
<?php if ($cover_size == 1) { ?>
		size: A4 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($cover_size == 2) { ?>
		size: A3 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($cover_size == 3) { ?>
		size: B5 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($cover_size == 4) { ?>
		size: 280mm 430mm <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } ?>
		bleed: 5mm;
<?php if (!empty ($crop_marks) ) : ?>
		marks: crop cross;
<?php endif; ?>
<?php if (!empty($margin_top) ) : ?>
		margin-top : <?php echo $margin_top; ?>mm;
		margin-bottom:  <?php echo $margin_top; ?>mm;
<?php else : ?>
		margin-top: 0;
		margin-bottom: 0;
<?php endif; ?>
<?php if (!empty($margin_left) ) : ?>
		margin-left : <?php echo $margin_left; ?>mm;
		margin-right:  <?php echo $margin_left; ?>mm;
<?php else : ?>
		margin-left: 0;
		margin-right: 0;
<?php endif; ?>
	}
	@media print {
<?php if ($cover_size == 1) { ?>
		html, body {width: 210mm;height: 297mm;}
<?php } elseif ($cover_size == 2) { ?>
		html, body {width: 297mm;height: 420mm;}
<?php } elseif ($cover_size == 3) { ?>
		html, body {width: 176mm;height: 150mm;}
<?php } elseif ($cover_size == 4) { ?>
		html, body {width: 280mm;height: 430mm;}
<?php } ?>
		html, body, .container {height: 100%;padding: 0;margin: 0;}
	}
<?php else : ?>
	@page { 
		size: <?php echo $custom_width; ?>mm <?php echo $custom_height; ?>mm <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
		bleed: 5mm;
<?php if (!empty ($crop_marks) ) : ?>
		marks: crop cross;
<?php endif; ?>
<?php if (!empty($margin_top) ) : ?>
		margin-top : <?php echo $margin_top; ?>mm;
		margin-bottom:  <?php echo $margin_top; ?>mm;
<?php else : ?>
		margin-top: 0;
		margin-bottom: 0;
<?php endif; ?>
<?php if (!empty($margin_left) ) : ?>
		margin-left : <?php echo $margin_left; ?>mm;
		margin-right:  <?php echo $margin_left; ?>mm;
<?php else : ?>
		margin-left: 0;
		margin-right: 0;
<?php endif; ?>
	}
	@media print {
		html, body {width: <?php echo $custom_width; ?>mm;<?php echo $custom_height; ?>mm;}
		margin: 0;
		html, body, .container {height: 100%;padding: 0;margin: 0;}
	}
<?php endif; ?>
	
	@media print {
	  
	  @page { margin: 0; }
	  html, body, .container {height: 100%;padding: 0;margin: 0;}
	}
<?php endif; ?>

	</style>
  </head>
  <body>
	<div class="container">
		<div id="page-content">
		
		<?php if ( !empty($image) && $image_position == 1) : ?>
			<div class="image"><img src="<?php echo $image; ?>" alt="" /></div>
		<?php endif; ?>
		
		<?php if (!empty ($text_position) ) : 
		if ($text_position == 1) : ?>
			<p><?php echo $text; ?></p>
		<?php endif; 
		endif;?>
		
		<h1><?php echo get_bloginfo('name'); ?></h1>
		
		<?php if (!empty ($text_position) ) :
		if ($text_position == 2) : ?>
		<p><?php echo $text; ?></p>
		<?php endif; 
		endif; ?>
		
		<?php if ( !empty($image) && $image_position == 2)  : ?>
			<div class="image"><img src="<?php echo $image; ?>" alt="" /></div>
		<?php endif; ?>
		
		<?php if (empty ($no_subtitle) ) : ?>
		<h2><?php echo get_bloginfo('description'); ?></h2>
		<?php endif; ?>
		
		<?php if ( !empty($image) && $image_position == 3)  : ?>
			<div class="image"><img src="<?php echo $image; ?>" alt="" /></div>
		<?php endif; ?>
		
		<?php if (!empty ($text_position) ) :
		if ($text_position == 3) : ?>
		<p><?php echo $text; ?></p>
		<?php endif; 
		endif; ?>
		
		<?php if ( !empty($image) && $image_position == 4) : ?>
			<div class="image"><img src="<?php echo $image; ?>" alt="" /></div>
		<?php endif; ?>
		</div>
	</div>
  </body>
</html>