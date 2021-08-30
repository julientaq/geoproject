<?php
$get_meta = get_option( 'print_settings' );
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
$size = $get_meta['print_content_size'];
$paper_size = $get_meta['print_content_paper_size'];
$custom_size = $get_meta['print_content_custom_size_activate'];
$custom_width = $get_meta['print_content_custom_width'];
$custom_height = $get_meta['print_content_custom_height'];
$crop_marks = $get_meta['print_content_crop_marks'];
$margin_top = $get_meta['print_content_margin_top'];
$margin_left = $get_meta['print_content_margin_left'];
if ( !empty($recto) ) : 
	$margin_top = 10;
	$margin_left = 15;
endif;
$recto = $get_meta['print_content_recto'];
$comments = $get_meta['print_content_comments'];
$background = $get_meta['print_content_color_background'];
$font_title = $get_meta['print_content_title'];
$font_subtitle = $get_meta['print_content_subtitle'];
$title_size = $get_meta['print_content_title_size'];
$color_title = $get_meta['print_content_color_title'];
$title_align = $get_meta['print_content_title_align'];
$subtitle_align = $get_meta['print_content_subtitle_align'];
if ($title_align == 1 ) {
	$title_align = "left";
}
elseif ($title_align == 2 ) {
	$title_align = "center";
}
elseif ($title_align == 3 ) {
	$title_align = "right";
}
if ($subtitle_align == 1 ) {
	$subtitle_align = "left";
}
elseif ($subtitle_align == 2 ) {
	$subtitle_align = "center";
}
elseif ($subtitle_align == 3 ) {
	$subtitle_align = "right";
}
$title_margin_top = $get_meta['print_content_title_margin_top'];
$title_margin_bottom = $get_meta['print_content_title_margin_bottom'];
$content_width = $get_meta['print_content_page_width'];
$content_columns = $get_meta['print_content_content_columns'];
$filet = $get_meta['print_content_columns_filet'];
$fill = $get_meta['print_content_columns_fill'];
$columns_gutter = $get_meta['print_content_content_columns_gutter'];
$font_text = $get_meta['print_content_font_text'];
$text_size = $get_meta['print_content_text_font_size'];
$line_height = $get_meta['print_content_text_line_height'];
$color_text = $get_meta['print_content_color_text'];
$text_align = $get_meta['print_content_text_alignment'];
if ($text_align == 1 ) {
	$text_align = "left";
}
elseif ($text_align == 2 ) {
	$text_align = "center";
}
elseif ($text_align == 3 ) {
	$text_align = "right";
}
elseif ($text_align == 4 ) {
	$text_align = "justify";
}
$metadata = $get_meta['print_content_metadata'];
$metadata_icons = $get_meta['print_content_metadata_icons'];
$metadata_bottom = $get_meta['print_content_metadata_bottom'];
$metadata_align = $get_meta['print_content_metadata_align'];
if ($metadata_align == 1 ) {
	$metadata_align = "left";
}
elseif ($metadata_align == 2 ) {
	$metadata_align = "center";
}
else {
	$metadata_align = "right";
}
$metadata_border = $get_meta['content_metadata_border'];
$metadata_border_style = $get_meta['print_content_metadata_border_style'];
if ($metadata_border_style == 1) { 
	$metadata_border_style = " solid ";
} elseif ($metadata_border_style == 2) { 
	$metadata_border_style = " dotted ";
} elseif ($metadata_border_style == 3) { 
	$metadata_border_style = " dashed ";
} else {
	$metadata_border_style = " double ";
}
$metadata_border_color = $get_meta['print_metadata_border_color']; 
$metadata_border_padding = $get_meta['print_metadata_border_padding'];
$metadata_border_width = $get_meta['print_metadata_border_width'];
if ( $metadata_border  == 1 ) {
	$metadata_border = "border:none";
} elseif ( $metadata_border  == 2 ) {
	$metadata_border = "border:" . $metadata_border_width  . "mm" . $metadata_border_style . $metadata_border_color; 
} elseif ( $metadata_border  == 3 ) {
	$metadata_border = "border-top:" . $metadata_border_width  . "mm" . $metadata_border_style . $metadata_border_color . "; border-bottom:" . $metadata_border_width  . "mm" . $metadata_border_style . $metadata_border_color; 
} else {
	$metadata_border = "border-bottom:" . $metadata_border_width  . "mm" . $metadata_border_style . $metadata_border_color; 
}
$images = $get_meta['print_content_images'];
$image_width = $get_meta['print_content_image_width'];
$images_margin_top = $get_meta['print_content_images_margin_top'];
$images_margin_bottom = $get_meta['print_content_images_margin_bottom'];
$images_align = $get_meta['print_content_images_align'];
if ($images_align == 1 ) {
	$images_alignment = "float:left!important;padding-right:15px!important;}.wp-block-image{margin:0!important;padding:0!important;}.entry-content figcaption{text-align: left!important;padding:0;padding-right:15px!important;float:left;text-align-last: left!important;}";
}
if ($images_align == 2 ) {
	$images_alignment = "margin-left:auto!important;margin-right:auto!important;float:none!important;}.wp-block-image:margin:0!important;padding:0!important;}figure img{text-align:center!important;}.entry-content figcaption{text-align: center!important;text-align-last: center!important;}";
}
if ($images_align == 3 ) {
	$images_alignment = "float:right!important;padding-left:15px!important;}.wp-block-image{margin:0!important;padding:0!important;}.entry-content figcaption{text-align: right!important;padding-left:15px!important;float:right;text-align-last: right!important;}";
}
$project_list = $get_meta['print_project_list'];
$display_map = $get_meta['print_content_maps'];	
$maps_margin_top = $get_meta['print_content_maps_margin_top'];
$maps_margin_bottom = $get_meta['print_content_maps_margin_bottom'];
$maps_border = $get_meta['print_content_maps_align'];
$embed = $get_meta['print_content_embed'];
$embed_margin_top = $get_meta['print_content_embed_margin_top'];
$embed_margin_bottom = $get_meta['print_content_embed_margin_bottom'];
$page_number = $get_meta['content_page_number'];
$page_number_position =  $get_meta['content_page_number_position'];
$page_number_start = $get_meta['content_page_number_start'];
$css = $get_meta['print_content_css'];

if ( !empty ($background) ) : ?>
body,html{background:<?php echo $background;?>!important;}
<?php endif; ?>
a{text-decoration:none;}
<?php if (empty($comments) ) : ?>#comments,<?php endif; ?>.soundcite-audio,.sidebar-wiki,.screen-reader-text,.sidebar,aside,.col-lg-2,.footer,footer,.projects-sidebar,.share, #printpdf,#up,#networks,.navbar,#sousmenu,#breadcrumb,.networks,#respond, .anchor,.invisible,.modal,#barresep,.reply{display:none;} .entry-content,#comments{margin:0!important;}
<?php if (!empty($site_title) || !empty ($site_subtitle) ) : ?> 
#topheader {margin-bottom:<?php echo $table_header_bottom; ?>mm; margin-top:<?php echo $table_header_top; ?>mm; color: <?php echo $header_color; ?>;text-align:<?php if ($header_align  == 1) {?>left<?php } elseif ($header_align  == 2) { ?> center <?php } else { ?> right; <?php } ?>; <?php if($header_border == 1) { ?>border: none; padding:<?php echo $header_border_padding; ?>mm; <?php } elseif ($header_border == 2) { ?> border: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; <?php if ($bottomborder != "none") : ?>border-bottom-style: <?php echo $bottomborder; ?>!important; <?php endif; ?> border-bottom-width:<?php echo $header_border_bottom_width; ?>mm!important; <?php  } elseif  ($header_border == 3) { ?> border-top: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; border-bottom: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; <?php if ($bottomborder != "none") : ?>border-bottom-style: <?php echo $bottomborder; ?>!important; <?php endif; ?> border-bottom-width:<?php echo $header_border_bottom_width; ?>mm!important; <?php } else { ?> border-bottom: <?php echo $header_border_width; ?>mm <?php echo $header_border_style . ' ' . $header_border_color; ?>;padding: <?php echo $header_border_padding; ?>mm; <?php if ($bottomborder != "none") : ?>border-bottom-style: <?php echo $bottomborder; ?>!important; <?php endif; ?> border-bottom-width:<?php echo $header_border_bottom_width; ?>mm!important; <?php  } 	 ?> }
<?php if (!empty ($nomargin) ) : ?>
	#topheader{margin-left:-<?php echo $margin_left; ?>mm!important;margin-right:-<?php echo $margin_left; ?>mm!important;}
<?php endif; ?>
#topheader h1{font-size:<?php echo $header_title_size; ?>pt;margin: 0 0 <?php echo $table_header_margin_title; ?>mm 0!important;}
#topheader h2{font-size:<?php echo $header_subtitle_size; ?>pt;margin:0 0 0 0!important;}
<?php if( !empty( $site_font_title ) ) :  if ($site_font_title == "select-one") { ?> 
#topheader h1{font-family:Arial,Helvetica,sans-serif!important}
	<?php } elseif ($site_font_title == "select-two") { ?> 
#topheader h1{font-family:Georgia,serif!important;}
	<?php } elseif ($site_font_title == "select-three") { ?> 
#topheader h1{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($site_font_title == "select-four") { ?> 
#topheader h1{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($site_font_title == "select-five") { ?> 
#topheader h1{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($site_font_title == "select-six") { ?> 
#topheader h1{font-family:'Arvo',serif!important;}
	<?php } elseif ($site_font_title == "select-seven") { ?> 
#topheader h1{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-height") { ?> 
#topheader h1{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($site_font_title == "select-nine") { ?> 
#topheader h1{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-ten") { ?> 
#topheader h1{font-family: 'Roboto Slab', serif!important;}
	<?php } elseif ($site_font_title == "select-eleven") { ?> 
#topheader h1{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-twelve") { ?> 
#topheader h1{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-thirteen") { ?> 
#topheader h1{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($site_font_title == "select-fourteen") { ?>
#topheader h1{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($site_font_title == "select-fifteen") { ?> 
#topheader h1{font-family: 'Coming Soon', cursive!important}
	<?php } elseif ($site_font_title == "select-sixteen") { ?> 
#topheader h1{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-seventeen") { ?> 
#topheader h1{font-family: 'Raleway', sans-serif!important}
	<?php } elseif ($site_font_title == "select-eighteen") { ?> 
#topheader h1{font-family: 'Bree Serif', serif!important;}
	<?php } elseif ($site_font_title == "select-nineteen") { ?> 
#topheader h1{font-family: 'Montserrat', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-twenty") { ?> 
#topheader h1{font-family: 'Oswald', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-twenty-one") { ?> 
#topheader h1{font-family: 'Lobster',cursive!important;}
	<?php } elseif ($site_font_title == "select-twenty-two") { ?> 
#topheader h1{font-family:'Lobster Two',cursive!important;}
	<?php } elseif ($site_font_title == "select-twenty-three") { ?> 
#topheader h1{font-family:'Libre Baskerville', serif!important;}
	<?php } elseif ($site_font_title == "select-twenty-four") { ?> 
#topheader h1{font-family: 'EB Garamond', serif!important;}
	<?php } elseif ($site_font_title == "select-twenty-five") { ?> 
#topheader h1{font-family:'Faune', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-twenty-six") { ?> 
#topheader h1{font-family: 'Play', sans-serifimportant;}
	<?php } elseif ($site_font_title == "select-twenty-seven") { ?> 
#topheader h1{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php } elseif ($site_font_title == "select-twenty-eight") { ?> 
#topheader h1{font-family: 'Quattrocento', serif!important;}
	<?php } elseif ($site_font_title == "select-twenty-nine") { ?> 
#topheader h1{font-family: 'Special Elite', cursive!important;}
	<?php } elseif ($site_font_title == "select-thirty") { ?> 
#topheader h1{font-family: 'Karma', serif!important;}
	<?php } elseif ($site_font_title == "select-thirty-one") { ?> 
#topheader h1{font-family: 'Arbutus Slab', serif!important;}
	<?php } elseif ($site_font_title == "select-thirty-two") { ?> 
#topheader h1{font-family: 'Overpass Mono', monospace!important;}
<?php } else { ?> 
#topheader h1{font-family:'Raleway',sans-serif!important} 
	<?php } endif; 	
if( !empty( $site_font_subtitle ) ) : if ($site_font_subtitle == "select-one") { ?> 
#topheader h2{font-family:Arial,Helvetica,sans-serif!important}
	<?php } elseif ($site_font_subtitle == "select-two") { ?> 
#topheader h2{font-family:Georgia,serif!important;}
	<?php } elseif ($site_font_subtitle == "select-three") { ?> 
#topheader h2{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-four") { ?>
#topheader h2{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($site_font_subtitle == "select-five") { ?>
#topheader h2{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-six") { ?>
#topheader h2{font-family:'Arvo',serif!important;}
	<?php } elseif ($site_font_subtitle == "select-seven") { ?>
#topheader h2{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-height") { ?>
#topheader h2{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-nine") { ?>
#topheader h2{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-ten") { ?>
#topheader h2{font-family: 'Roboto Slab', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-eleven") { ?> 
#topheader h2{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twelve") { ?>
#topheader h2{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-thirteen") { ?>
#topheader h2{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($site_font_subtitle == "select-fourteen") { ?>
#topheader h2{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-fifteen") { ?>
#topheader h2{font-family: 'Coming Soon', cursive!important}
	<?php } elseif ($site_font_subtitle == "select-sixteen") { ?> 
#topheader h2{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-seventeen") { ?>
#topheader h2{font-family: 'Raleway', sans-serif!important}
	<?php } elseif ($site_font_subtitle == "select-eighteen") { ?> 
#topheader h2{font-family: 'Bree Serif', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-nineteen") { ?> 
#topheader h2{font-family: 'Montserrat', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty") { ?> 
#topheader h2{font-family: 'Oswald', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-one") { ?> 
#topheader h2{font-family: 'Lobster',cursive!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-two") { ?> 
#topheader h2{font-family:'Lobster Two',cursive!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-three") { ?> 
#topheader h2{font-family:'Libre Baskerville', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-four") { ?> 
#topheader h2{font-family: 'EB Garamond', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-five") { ?> 
#topheader h2{font-family:'Faune', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-six") { ?> 
#topheader h2{font-family: 'Play', sans-serifimportant;}
	<?php } elseif ($site_font_subtitle == "select-twenty-seven") { ?> 
#topheader h2{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-eight") { ?> 
#topheader h2{font-family: 'Quattrocento', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-twenty-nine") { ?> 
#topheader h2{font-family: 'Special Elite', cursive!important;}
	<?php } elseif ($site_font_subtitle == "select-thirty") { ?> 
#topheader h2{font-family: 'Karma', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-thirty-one") { ?> 
#topheader h2{font-family: 'Arbutus Slab', serif!important;}
	<?php } elseif ($site_font_subtitle == "select-thirty-two") { ?> 
#topheader h2{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> 
#topheader h2{font-family:'Raleway',sans-serif!important} 
	<?php }
	endif; 
endif; 
if( !empty( $font_text ) ) : 
	if ($font_text == "select-one") { ?> 
body,html{font-family:Arial,Helvetica,sans-serif!important}
	<?php } elseif ($font_text == "select-two") { ?> 
body,html{font-family:Georgia,serif!important;}
	<?php } elseif ($font_text == "select-three") { ?> 
body,html{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($font_text == "select-four") { ?> 
body,html{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($font_text == "select-five") { ?> 
body,html{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($font_text == "select-six") { ?> 
body,html{font-family:'Arvo',serif!important;}
	<?php } elseif ($font_text == "select-seven") { ?> 
body,html{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($font_text == "select-height") { ?> 
body,html{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($font_text == "select-nine") { ?> 
body,html{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($font_text == "select-ten") { ?> 
body,html{font-family: 'Roboto Slab', serif!important;}
	<?php } elseif ($font_text == "select-eleven") { ?> 
body,html{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($font_text == "select-twelve") { ?> 
body,html{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($font_text == "select-thirteen") { ?> 
body,html{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($font_text == "select-fourteen") { ?> 
body,html{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($font_text == "select-fifteen") { ?> 
body,html{font-family: 'Coming Soon', cursive!important}
	<?php } elseif ($font_text == "select-sixteen") { ?> 
body,html{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($font_text == "select-seventeen") { ?> 
body,html{font-family: 'Raleway', sans-serif!important}
	<?php } elseif ($font_text == "select-eighteen") { ?> 
body,html{font-family: 'Bree Serif', serif!important;}
	<?php } elseif ($font_text == "select-nineteen") { ?> 
body,html{font-family: 'Montserrat', sans-serif!important;}
	<?php } elseif ($font_text == "select-twenty") { ?> 
body,html{font-family: 'Oswald', sans-serif!important;}
	<?php } elseif ($font_text == "select-twenty-one") { ?> 
body,html{font-family: 'Lobster',cursive!important;}
	<?php } elseif ($font_text == "select-twenty-two") { ?> 
body,html{font-family:'Lobster Two',cursive!important;}
	<?php } elseif ($font_text == "select-twenty-three") { ?> 
body,html{font-family:'Libre Baskerville', serif!important;}
	<?php } elseif ($font_text == "select-twenty-four") { ?> 
body,html{font-family: 'EB Garamond', serif!important;}
	<?php } elseif ($font_text == "select-twenty-five") { ?> 
body,html{font-family:'Faune', sans-serif!important;}
	<?php } elseif ($font_text == "select-twenty-six") { ?> 
body,html{font-family: 'Play', sans-serifimportant;}
	<?php } elseif ($font_text == "select-twenty-seven") { ?> 
body,html{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php } elseif ($font_text == "select-twenty-eight") { ?> 
body,html{font-family: 'Quattrocento', serif!important;}
	<?php } elseif ($font_text == "select-twenty-nine") { ?> 
body,html{font-family: 'Special Elite', cursive!important;}
	<?php } elseif ($font_text == "select-thirty") { ?> 
body,html{font-family: 'Karma', serif!important;}
	<?php } elseif ($font_text == "select-thirty-one") { ?> 
body,html{font-family: 'Arbutus Slab', serif!important;}
	<?php } elseif ($font_text == "select-thirty-two") { ?> 
body,html{font-family: 'Overpass Mono', monospace!important;}
	<?php } else { ?> 
body,html{font-family:'Raleway',sans-serif!important} 
	<?php } endif; ?>
#map{display:block!important;}
.entry-content a,blockquote::before,blockquote::after,h5{color:<?php echo $color_text; ?>!important;text-decoration:none;}
.entry-content{color:<?php echo $color_text; ?>;font-size:<?php echo $text_size; ?>pt!important;line-height: <?php echo $line_height; ?>pt;text-align:<?php echo $text_align; ?>; <?php if ( !empty($fill) ) : ?>column-fill: auto;<?php endif; ?>width:<?php echo $content_width; ?>%;-webkit-column-count: <?php echo $content_columns; ?>; -moz-column-count: <?php echo $content_columns; ?>; column-count: <?php echo $content_columns; ?>; <?php if ( !empty ($columns_gutter) && $content_columns > 1 ) : ?>-webkit-column-gap: <?php echo $columns_gutter; ?>mm; -moz-column-gap: <?php echo $columns_gutter; ?>mm; column-gap: <?php echo $columns_gutter; ?>mm;<?php endif; ?>display:block;<?php if (!empty ($filet) ) : ?>-webkit-column-rule: 1px solid #000; -moz-column-rule: 1px solid #000); column-rule: 1px solid #000;<?php endif; ?>}
.entry-content p:nth-child(1){margin-top:-1px!important;}
.entry-title {font-size:<?php echo $title_size; ?>pt;text-align:<?php echo $title_align; ?>; color:<?php echo $color_title; ?>;margin-top:<?php echo $title_margin_top; ?>mm;margin-bottom:<?php echo $title_margin_bottom; ?>mm;}
<?php if( !empty( $font_title ) ) : if ($font_title == "select-one") { ?>
.entry-title{font-family:Arial,Helvetica,sans-serif!important}
	<?php } elseif ($font_title == "select-two") { ?> 
.entry-title{font-family:Georgia,serif!important;}
	<?php } elseif ($font_title == "select-three") { ?> 
.entry-title{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($font_title == "select-four") { ?> 
.entry-title{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($font_title == "select-five") { ?> 
.entry-title{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($font_title == "select-six") { ?> 
.entry-title{font-family:'Arvo',serif!important;}
	<?php } elseif ($font_title == "select-seven") { ?> 
.entry-title{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($font_title == "select-height") { ?> 
.entry-title{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($font_title == "select-nine") { ?> 
.entry-title{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($font_title == "select-ten") { ?> 
.entry-title{font-family: 'Roboto Slab', serif!important;}
	<?php } elseif ($font_title == "select-eleven") { ?> 
.entry-title{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($font_title == "select-twelve") { ?> 
.entry-title{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($font_title == "select-thirteen") { ?> 
.entry-title{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($font_title == "select-fourteen") { ?> 
.entry-title{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($font_title == "select-fifteen") { ?> 
.entry-title{font-family: 'Coming Soon', cursive!important}
	<?php } elseif ($font_title == "select-sixteen") { ?> 
.entry-title{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($font_title == "select-seventeen") { ?> 
.entry-title{font-family: 'Raleway', sans-serif!important}
	<?php } elseif ($font_title == "select-eighteen") { ?> 
.entry-title{font-family: 'Bree Serif', serif!important;}
	<?php } elseif ($font_title == "select-nineteen") { ?> 
.entry-title{font-family: 'Montserrat', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty") { ?> 
.entry-title{font-family: 'Oswald', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty-one") { ?> 
.entry-title{font-family: 'Lobster',cursive!important;}
	<?php } elseif ($font_title == "select-twenty-two") { ?> 
.entry-title{font-family:'Lobster Two',cursive!important;}
	<?php } elseif ($font_title == "select-twenty-three") { ?> 
.entry-title{font-family:'Libre Baskerville', serif!important;}
	<?php } elseif ($font_title == "select-twenty-four") { ?> 
.entry-title{font-family: 'EB Garamond', serif!important;}
	<?php } elseif ($font_title == "select-twenty-five") { ?> 
.entry-title{font-family:'Faune', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty-six") { ?> 
.entry-title{font-family: 'Play', sans-serifimportant;}
	<?php } elseif ($font_title == "select-twenty-seven") { ?> 
.entry-title{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty-eight") { ?> 
.entry-title{font-family: 'Quattrocento', serif!important;}
	<?php } elseif ($font_title == "select-twenty-nine") { ?> 
.entry-title{font-family: 'Special Elite', cursive!important;}
	<?php } elseif ($font_title == "select-thirty") { ?> 
.entry-title{font-family: 'Karma', serif!important;}
	<?php } elseif ($font_title == "select-thirty-one") { ?> 
.entry-title{font-family: 'Arbutus Slab', serif!important;}
	<?php } elseif ($font_title == "select-thirty-two") { ?> 
.entry-title{font-family: 'Overpass Mono', monospace!important;}
	<?php } else { ?> 
.entry-title{font-family:'Raleway',sans-serif!important} 
<?php } endif;
if( !empty( $font_subtitle ) ) : 
	if ($font_subtitle == "select-one") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:Arial,Helvetica,sans-serif!important}
	<?php } elseif ($font_subtitle == "select-two") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:Georgia,serif!important;}
	<?php } elseif ($font_subtitle == "select-three") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-four") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($font_subtitle == "select-five") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-six") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:'Arvo',serif!important;}
	<?php } elseif ($font_subtitle == "select-seven") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-height") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-nine") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-ten") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Roboto Slab', serif!important;}
	<?php } elseif ($font_subtitle == "select-eleven") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twelve") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-thirteen") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($font_subtitle == "select-fourteen") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($font_subtitle == "select-fifteen") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Coming Soon', cursive!important}
	<?php } elseif ($font_subtitle == "select-sixteen") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-seventeen") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Raleway', sans-serif!important}
	<?php } elseif ($font_subtitle == "select-eighteen") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Bree Serif', serif!important;}
	<?php } elseif ($font_subtitle == "select-nineteen") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Montserrat', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Oswald', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-one") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Lobster',cursive!important;}
	<?php } elseif ($font_subtitle == "select-twenty-two") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:'Lobster Two',cursive!important;}
	<?php } elseif ($font_subtitle == "select-twenty-three") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:'Libre Baskerville', serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-four") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'EB Garamond', serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-five") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:'Faune', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-six") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Play', sans-serifimportant;}
	<?php } elseif ($font_subtitle == "select-twenty-seven") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-eight") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Quattrocento', serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-nine") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Special Elite', cursive!important;}
	<?php } elseif ($font_subtitle == "select-thirty") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Karma', serif!important;}
	<?php } elseif ($font_subtitle == "select-thirty-one") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Arbutus Slab', serif!important;}
	<?php } elseif ($font_subtitle == "select-thirty-two") { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> 
h2,h3,h4,h5,blockquote,.entry-meta{font-family:'Raleway',sans-serif!important} 
	<?php } endif; ?>
.entry-content h2,.entry-content h3,.entry-content h4,.entry-content h5,.entry-content blockquote{text-align:<?php echo $subtitle_align; ?>!important;margin:30px 0 20px 0;}
<?php if ( $metadata == 4 ) { ?>
.entry-meta{display:none;}
<?php } elseif ( $metadata == 2 ) { ?>
.date-entry,.entry-categories{display:none;}
<?php } elseif ( $metadata == 3 ) { ?>
.entry-categories{display:none;}
.date-entry,#auteur{width:100%!important;display:block;margin:0;}
<?php } if ( $metadata != 4 ) : ?>
.entry-meta{<?php echo $metadata_border; ?>;text-align:<?php echo $metadata_align; ?>;padding:<?php echo $metadata_border_padding; ?>mm;margin-bottom:<?php echo $metadata_bottom; ?>mm;}
<?php endif; 
if (!empty ($metadata_icons) ) : ?>
ion-icon{display:none!important;}
<?php endif; ?>
.entry-content figcaption{margin: 8px 0 0 0!important;width: 100% !important;color:<?php echo $color_text; ?>;}
<?php if (!empty ($images) ) : ?>
.entry-content img,.wp-caption-text,.entry-content figcaption{display:none!important;}
<?php else : ?>
.entry-content img,figcaption{width: <?php echo $image_width; ?>%!important;margin-top: <?php echo $images_margin_top; ?>mm;margin-top: <?php echo $images_margin_bottom; ?>mm;<?php echo $images_alignment; ?>
<?php if ($images_align == 3 ) : ?>figure{width:100%!important;}<?php endif; if ( $images_align == 1 ) : ?>figure{width: <?php echo $image_width; ?>%!important;}<?php endif; if ($images_align == 2) : ?>figure {width: 100% !important;padding: 0!important;margin: 0!important;text-align: center;}<?php endif; ?>
<?php endif; 
if (!empty($embed) ) : ?>iframe,.wp-block-embed{display:none;}<?php else : ?>
iframe{padding-top:<?php echo $embed_margin_top; ?>mm;padding-bottom:<?php echo $embed_margin_top; ?>mm;}
<?php endif; ?>
.entry-content h2{font-size:<?php echo $text_size +3; ?>pt!important;}
.entry-content h3{font-size:<?php echo $text_size +2.5; ?>pt!important;}
.entry-content h4{font-size:<?php echo $text_size +1.5; ?>pt!important;}
.entry-content h5{font-size:<?php echo $text_size +1; ?>pt!important;}
.entry-content iframe, .entry-content figure {padding-bottom: 20px !important;}
.entry-content blockquote{break-inside:avoid;max-width:100%;text-align:center!important;text-align-last: center!important;font-size:<?php echo $text_size + 0.5; ?>pt!important;padding:0 10px;line-height:<?php echo $line_height; ?>pt;}
.entry-content blockquote::before{top:20px;}
.entry-content blockquote::after{top:40px;}
<?php if ( !empty($project_list) ) : ?>
#project_print_list{display:none;}
<?php else : ?>
#project_print_list ul{margin-left:15px;}
<?php endif;
if ( empty ( $display_map ) ) : ?>
#gpmaps¨_print{display:block!important;margin-top:<?php echo $maps_margin_top;?>mm; margin-bottom:<?php echo $maps_margin_bottom;?>mm; <?php if ($maps_border == 1 ) { ?> border:none; <?php } elseif ($maps_border == 2 ) { ?> border:0.5px solid black; <?php } elseif ($maps_border == 3 ) { ?> border:1px solid black; <?php } else { ?> border:2px solid black; <?php } ?>}
<?php endif;
if (!empty ($css) ) : echo $css; endif; ?>
@media print {
* {margin:0;padding:0}
html,body{overflow:visible;min-height:100%;margin: 0 0 0 0;display: block;break-inside: avoid;}
@page {			
<?php if ($size == 1) { ?>
			size: A4 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($size == 2) { ?>
			size: A3 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($size == 3) { ?>
			size: B5 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>;
<?php } elseif ($size == 4) { ?>
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
<?php if (!empty($recto) ) : ?>
		@page:left {
		  margin-left: 25mm;
		  margin-right: 10mm;
		}
		@page:right {
		  margin-left: 10mm;
		  margin-right: 25mm;
		}
<?php endif;
if ( !empty ($page_number) ) : ?>
@page {
	reset-counter: page <?php echo $page_number_start; ?>;	
<?php if ($page_number_position == 1) { ?>
	@bottom-left { content: counter(page) }
<?php } elseif ($page_number_position == 2) { ?>
	@bottom-center { content: counter(page) }
<?php } elseif ($page_number_position == 3) { ?>
	@bottom-right { content: counter(page) }
	<?php } ?>
}
<?php endif; ?>