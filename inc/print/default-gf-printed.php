<?php
$gp_options = get_option( 'gp_options' ); 
$meta_quote = get_post_meta( get_the_ID(), 'quote-design', true );
$meta_quote_design = get_post_meta( get_the_ID(), 'quote', true );
$meta_color = get_post_meta( get_the_ID(), 'meta-color', true );
$meta_top = get_post_meta( get_the_ID(), 'meta-image', true );
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
$size = $get_meta['print_geoformat_size'];
$paper_size = $get_meta['print_geoformat_paper_size'];
$custom_size = $get_meta['print_geoformat_custom_size_activate'];
$custom_width = $get_meta['print_geoformat_custom_width'];
$custom_height = $get_meta['print_geoformat_custom_height'];
$crop_marks = $get_meta['print_geoformat_crop_marks'];
$margin_top = $get_meta['print_geoformat_margin_top'];
$margin_left = $get_meta['print_geoformat_margin_left'];
if ( !empty($recto) ) : 
	$margin_top = 10;
	$margin_left = 15;
endif;
$font_title = $get_meta['print_geoformat_title'];
$font_subtitle = $get_meta['print_geoformat_subtitle'];
$cover = $get_meta['print_geoformat_cover'];
$cover_font_size = $get_meta['print_geoformat_cover_font_size'];
$cover_line_height = $get_meta['print_geoformat_cover_line_height'];
$cover_font_color = $get_meta['print_geoformat_color_cover'];
$cover_align = $get_meta['print_geoformat_cover_alignment'];
$cover_top_margin = $get_meta['print_geoformat_cover_top_margin'];
$cover_padding = $get_meta['print_geoformat_cover_padding'];
if ($cover_align == 1 ) {
	$cover_align = "left";
}
elseif ($cover_align == 2 ) {
	$cover_align = "center";
}
elseif ($cover_align == 3 ) {
	$cover_align = "right";
}
$background_vertical = $get_meta['print_cover_background_vertical_align'];
$background_horizontal = $get_meta['print_cover_background_horizontal_align'];
$maintitle_font_size = $get_meta['print_geoformat_maintitle_font_size'];
$maintitle_font_color = $get_meta['print_geoformat_maintitle_font_color'];
$maintitle_alignment = $get_meta['print_geoformat_maintitle_alignment'];
$maintitle_top = $get_meta['print_geoformat_title_top_margin'];
$maintitle_bottom = $get_meta['print_geoformat_title_bottom_margin'];
$maintitle_break = ''; 
$maintitle_break = $get_meta['print_geoformat_maintitle_break'];
if ($maintitle_alignment == 1 ) {
	$maintitle_alignment = "left";
}
elseif ($maintitle_alignment == 2 ) {
	$maintitle_alignment = "center";
}
elseif ($maintitle_alignment == 3 ) {
	$maintitle_alignment = "right";
}
$maintitle_width = $get_meta['print_geoformat_maintitle_image_width'];
$maintitle_top_margin = $get_meta['print_geoformat_maintitle_image_top_margin'];
$maintitle_bottom_margin = $get_meta['print_geoformat_maintitle_image_bottom_margin'];
$maintitle_border_style = $get_meta['print_maintitle_image_border_style'];
$maintitle_border_width = $get_meta['print_maintitle_image_border_width'];
$maintitle_border_padding = $get_meta['print_maintitle_image_border_padding'];
$display_maintitle_image = $get_meta['print_geoformat_display_maintitle_image'];
$maintitle_image_color = $get_meta['print_geoformat_maintitle_image_color'];
$maintitle_image_alignment = $get_meta['print_geoformat_maintitle_image_alignment'];
$maintitle_image_break = $get_meta['print_geoformat_maintitle_image_break'];
if ($maintitle_image_alignment == 1 ) {
	$maintitle_image_alignment = "left";
}
elseif ($maintitle_image_alignment == 2 ) {
	$maintitle_image_alignment = "center";
}
elseif ($maintitle_image_alignment == 3 ) {
	$maintitle_image_alignment = "right";
}
$metadata_author = $get_meta['print_geoformat_metadata_author'];
$metadata_image = $get_meta['print_geoformat_metadata_image'];
$metadata_date = $get_meta['print_geoformat_metadata_date'];
$metadata_bottom = $get_meta['print_geoformat_metadata_bottom'];
$metadata_align = $get_meta['print_geoformat_metadata_align'];
$metadata_border = $get_meta['geoformat_metadata_border'];
$metadata_border_style = $get_meta['print_geoformat_metadata_border_style'];
$metadata_border_color = GP_DEFAULT_TEXT_COLOR;
$metadata_border_padding = $get_meta['print_metadata_border_padding'];
$metadata_border_width = $get_meta['print_metadata_border_width'];
$metadata_break = $get_meta['print_geoformat_metadata_break'];
if ($metadata_align == 1 ) {
	$metadata_align = "left";
}
elseif ($metadata_align == 2 ) {
	$metadata_align = "center";
}
elseif ($metadata_align == 3 ) {
	$metadata_align = "right";
}
if ($metadata_border_style == 1) { 
	$metadata_border_style = "solid";
} elseif ($metadata_border_style == 2) { 
	$metadata_border_style = "dotted";
} elseif ($metadata_border_style == 3) { 
	$metadata_border_style = "dashed";
} else {
	$metadata_border_style = "double";
}
$subtitle_font_size = $get_meta['print_geoformat_subtitle_font_size'];
$subtitle_weight = $get_meta['print_geoformat_subtitle_weight'];
$subtitle_align = $get_meta['print_geoformat_subtitle_align'];
$subtitle_border = $get_meta['print_geoformat_subtitle_border'];
$subtitle_border_style = $get_meta['print_geoformat_subtitle_border_style'];
$subtitle_border_color = $get_meta['print_geoformat_subtitle_border_color']; 
$subtitle_border_padding = $get_meta['print_geoformat_subtitle_border_padding'];
$subtitle_border_width = $get_meta['print_geoformat_subtitle_border_width'];
$subtitle_bottom = $get_meta['print_geoformat_subtitle_bottom'];
$subtitle_break = $get_meta['print_geoformat_subtitle_break'];
if ($subtitle_align == 1 ) {
	$subtitle_align = "left";
}
elseif ($subtitle_align == 2 ) {
	$subtitle_align = "center";
}
elseif ($subtitle_align == 3 ) {
	$subtitle_align = "right";
}
if ($subtitle_border_style == 1) { 
	$subtitle_border_style = "solid";
} elseif ($subtitle_border_style == 2) { 
	$subtitle_border_style = "dotted";
} elseif ($subtitle_border_style == 3) { 
	$subtitle_border_style = "dashed";
} else {
	$subtitle_border_style = "double";
}
$hat_font_size = $get_meta['print_geoformat_hat_font_size'];
$hat_weight = $get_meta['print_geoformat_hat_weight'];
$hat_align = $get_meta['print_geoformat_hat_align'];
$hat_border = $get_meta['print_geoformat_hat_border'];
$hat_border_color = $get_meta['print_geoformat_hat_border_color']; 
$hat_border_padding = $get_meta['print_geoformat_hat_border_padding'];
$hat_bottom = $get_meta['print_geoformat_hat_bottom'];
if ($hat_align == 1 ) {
	$hat_align = "left";
}
elseif ($hat_align == 2 ) {
	$hat_align = "center";
}
elseif ($hat_align == 3 ) {
	$hat_align = "right";
}
else {
	$hat_align = "justify";
}
$introbloc_bottom = $get_meta['print_geoformat_introbloc_bottom'];
$section_title_font_size = $get_meta['print_geoformat_section_title_font_size'];
$section_title_line_height = $get_meta['print_geoformat_section_title_line_height'];
$section_title_font_color = $get_meta['print_geoformat_section_title_color'];
$section_title_align = $get_meta['print_geoformat_section_title_alignment'];
$section_title_top_margin = $get_meta['print_geoformat_section_title_top_margin'];
$section_title_bottom_margin = $get_meta['print_geoformat_section_title_bottom_margin'];
if ($section_title_align == 1 ) {
	$section_title_align = "left";
}
elseif ($section_title_align == 2 ) {
	$section_title_align = "center";
}
elseif ($section_title_align == 3 ) {
	$section_title_align = "right";
}
$multimedia_width = $get_meta['print_geoformat_multimedia_width'];
$multimedia_top_margin = $get_meta['print_geoformat_multimedia_top_margin'];
$multimedia_bottom_margin = $get_meta['print_geoformat_multimedia_bottom_margin'];
$multimedia_border_style = $get_meta['print_multimedia_border_style'];
$multimedia_border_width = $get_meta['print_multimedia_border_width'];
$multimedia_border_padding = $get_meta['print_multimedia_border_padding'];
$multimedia_color = $get_meta['print_geoformat_multimedia_color'];
$display_caption = $get_meta['print_geoformat_display_caption'];
$caption_font_size = $get_meta['print_geoformat_caption_font_size'];
$caption_style = $get_meta['print_geoformat_caption_style'];
$caption_font_color = $get_meta['print_geoformat_caption_color'];
$caption_align = $get_meta['print_geoformat_caption_alignment'];
$caption_bottom_margin = $get_meta['print_geoformat_caption_bottom_margin'];
if ($caption_align == 1 ) {
	$caption_align = "left";
}
elseif ($caption_align == 2 ) {
	$caption_align = "center";
}
elseif ($caption_align == 3 ) {
	$caption_align = "right";
}
if ($caption_style == 2 ) {
	$caption_style = "italic";
}
else {
	$caption_style = "normal";
}
$section_break = $get_meta['print_geoformat_section_break'];
$content_width = $get_meta['print_geoformat_page_width'];
$content_columns = $get_meta['print_geoformat_geoformat_columns'];
$filet = $get_meta['print_geoformat_columns_filet'];
$fill = $get_meta['print_geoformat_columns_fill'];
$columns_gutter = $get_meta['print_content_content_columns_gutter'];
$font_text = $get_meta['print_geoformat_font_text'];
$text_size = $get_meta['print_geoformat_text_font_size'];
$line_height = $get_meta['print_geoformat_text_line_height'];
$color_text = $get_meta['print_geoformat_color_text'];
$text_align = $get_meta['print_geoformat_text_alignment'];
$text_subtitles_align = $get_meta['print_geoformat_text_subtitles_alignment'];
$dropcap = $get_meta['print_geoformat_dropcap'];
$breakpage = $get_meta['print_geoformat_break'];
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
if ($text_subtitles_align == 2 ) {
	$text_subtitles_align = "center";
}
elseif ($text_subtitles_align == 3 ) {
	$text_subtitles_align = "right";
}
else {
	$text_subtitles_align = "left";
}
$images = $get_meta['print_geoformat_images'];
$image_width = $get_meta['print_geoformat_image_width'];
$images_margin_top = $get_meta['print_geoformat_images_margin_top'];
$images_margin_bottom = $get_meta['print_geoformat_images_margin_bottom'];
$images_align = $get_meta['print_geoformat_images_align'];
if ($images_align == 1 ) {
	$images_alignment = "float:left!important;padding-right:15px!important;}.wp-block-image{margin:0!important;padding:0!important;}.entry-geoformat figcaption{text-align: left!important;padding:0;padding-right:15px!important;float:left;text-align-last: left!important;}";
}
if ($images_align == 2 ) {
	$images_alignment = "margin-left:auto!important;margin-right:auto!important;float:none!important;}.wp-block-image:margin:0!important;padding:0!important;}figure img{text-align:center!important;}.entry-geoformat figcaption{text-align: center!important;text-align-last: center!important;}";
}
if ($images_align == 3 ) {
	$images_alignment = "float:right!important;padding-left:15px!important;}.wp-block-image{margin:0!important;padding:0!important;}.entry-geoformat figcaption{text-align: right!important;padding-left:15px!important;float:right;text-align-last: right!important;}";
}
$embed = $get_meta['print_geoformat_embed'];
$embed_margin_top = $get_meta['print_geoformat_embed_margin_top'];
$embed_margin_bottom = $get_meta['print_geoformat_embed_margin_bottom'];
$recto = $get_meta['print_geoformat_recto'];
$comments = $get_meta['print_geoformat_comments'];
$background = $get_meta['print_geoformat_color_background'];
$page_number = $get_meta['geoformat_page_number'];
$page_number_position =  $get_meta['geoformat_page_number_position'];
$page_number_start = $get_meta['geoformat_page_number_start'];
$css = $get_meta['print_geoformat_css'];
if( !empty( $font_text ) ) : 
	if ($font_text == "select-one") { ?> 
body,html{font-family:Arial,Helvetica,sans-serif!important;}
	<?php } elseif ($font_text == "select-two") { ?> 
body,html{font-family:Georgia,serif;}
	<?php } elseif ($font_text == "select-three") { ?> 
body,html{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($font_text == "select-four") { ?> 
body,html{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($font_text == "select-five") { ?> 
body,html{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($font_text == "select-six") { ?> 
body,html{font-family:'Arvo',serif;}
	<?php } elseif ($font_text == "select-seven") { ?> 
body,html{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($font_text == "select-height") { ?> 
body,html{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($font_text == "select-nine") { ?> 
body,html{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($font_text == "select-ten") { ?> 
body,html{font-family: 'Roboto Slab', serif;}
	<?php } elseif ($font_text == "select-eleven") { ?> 
body,html{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($font_text == "select-twelve") { ?> 
body,html{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($font_text == "select-thirteen") { ?> 
body,html{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($font_text == "select-fourteen") { ?> 
body,html{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($font_text == "select-fifteen") { ?> 
body,html{font-family: 'Coming Soon', cursive!important;}
	<?php } elseif ($font_text == "select-sixteen") { ?> 
body,html{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($font_text == "select-seventeen"){ ?> 
body,html{font-family: 'Raleway', sans-serif!important;}
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
body,html{font-family: 'Play', sans-serifimportant!important;}
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
	<?php } endif; 
if( !empty( $font_subtitle ) ) : if ($font_subtitle == "select-one") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:Arial,Helvetica,sans-serif!important}
	<?php } elseif ($font_subtitle == "select-two") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:Georgia,serif!important;}
	<?php } elseif ($font_subtitle == "select-three") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-four") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($font_subtitle == "select-five") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-six") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:'Arvo',serif!important;}
	<?php } elseif ($font_subtitle == "select-seven") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-height") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-nine") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-ten") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Roboto Slab', serif!important;}
	<?php } elseif ($font_subtitle == "select-eleven") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twelve") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-thirteen") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($font_subtitle == "select-fourteen") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($font_subtitle == "select-fifteen") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Coming Soon', cursive!important}
	<?php } elseif ($font_subtitle == "select-sixteen") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-seventeen") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Raleway', sans-serif!important}
	<?php } elseif ($font_subtitle == "select-eighteen") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Bree Serif', serif!important;}
	<?php } elseif ($font_subtitle == "select-nineteen") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Montserrat', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Oswald', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-one") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Lobster',cursive!important;}
	<?php } elseif ($font_subtitle == "select-twenty-two") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:'Lobster Two',cursive!important;}
	<?php } elseif ($font_subtitle == "select-twenty-three") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:'Libre Baskerville', serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-four") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'EB Garamond', serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-five") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:'Faune', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-six") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Play', sans-serifimportant;}
	<?php } elseif ($font_subtitle == "select-twenty-seven") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-eight") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Quattrocento', serif!important;}
	<?php } elseif ($font_subtitle == "select-twenty-nine") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Special Elite', cursive!important;}
	<?php } elseif ($font_subtitle == "select-thirty") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Karma', serif!important;}
	<?php } elseif ($font_subtitle == "select-thirty-one") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Arbutus Slab', serif!important;}
	<?php } elseif ($font_subtitle == "select-thirty-two") { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family: 'Overpass Mono', monospace!important;}<?php }
	else { ?> 
.entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5,blockquote,.entry-meta{font-family:'Raleway',sans-serif!important} 
<?php } endif; 
if( !empty( $font_title ) ) : if ($font_title == "select-one") { ?>
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:Arial,Helvetica,sans-serif!important}
	<?php } elseif ($font_title == "select-two") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:Georgia,serif!important;}
	<?php } elseif ($font_title == "select-three") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:Tahoma, Geneva, sans-serif!important;}
	<?php } elseif ($font_title == "select-four") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:Times New Roman, Times, serif!important;}
	<?php } elseif ($font_title == "select-five") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:Verdana, Geneva, sans-serif!important;}
	<?php } elseif ($font_title == "select-six") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:'Arvo',serif!important;}
	<?php } elseif ($font_title == "select-seven") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Source Sans Pro', sans-serif!important;}
	<?php } elseif ($font_title == "select-height") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:'Open Sans',sans-serif!important;}
	<?php } elseif ($font_title == "select-nine") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Roboto', sans-serif!important;}
	<?php } elseif ($font_title == "select-ten") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Roboto Slab', serif!important;}
	<?php } elseif ($font_title == "select-eleven") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Lato', sans-serif!important;}
	<?php } elseif ($font_title == "select-twelve") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Ubuntu Condensed', sans-serif!important;}
	<?php } elseif ($font_title == "select-thirteen") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Inconsolata', monospace!important;}
	<?php } elseif ($font_title == "select-fourteen") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:'Playfair Display', serif!important;}
	<?php } elseif ($font_title == "select-fifteen") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Coming Soon', cursive!important}
	<?php } elseif ($font_title == "select-sixteen") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Roboto Condensed', sans-serif!important;}
	<?php } elseif ($font_title == "select-seventeen") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Raleway', sans-serif!important}
	<?php } elseif ($font_title == "select-eighteen") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Bree Serif', serif!important;}
	<?php } elseif ($font_title == "select-nineteen") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Montserrat', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Oswald', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty-one") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Lobster',cursive!important;}
	<?php } elseif ($font_title == "select-twenty-two") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:'Lobster Two',cursive!important;}
	<?php } elseif ($font_title == "select-twenty-three") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:'Libre Baskerville', serif!important;}
	<?php } elseif ($font_title == "select-twenty-four") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'EB Garamond', serif!important;}
	<?php } elseif ($font_title == "select-twenty-five") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:'Faune', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty-six") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Play', sans-serifimportant;}
	<?php } elseif ($font_title == "select-twenty-seven") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Quattrocento Sans', sans-serif!important;}
	<?php } elseif ($font_title == "select-twenty-eight") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Quattrocento', serif!important;}
	<?php } elseif ($font_title == "select-twenty-nine") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Special Elite', cursive!important;}
	<?php } elseif ($font_title == "select-thirty") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Karma', serif!important;}
	<?php } elseif ($font_title == "select-thirty-one") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Arbutus Slab', serif!important;}
	<?php } elseif ($font_title == "select-thirty-two") { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family: 'Overpass Mono', monospace!important;}
	<?php } else { ?> 
#cover-title, .entry-title, .header-entry h2, #topscroll{font-family:'Raleway',sans-serif!important} 
<?php } endif;
if (!empty ($cover)) : ?>
body, html{background: <?php echo $background;?> URL('<?php echo $meta_top; ?>') no-repeat <?php if ($background_vertical == 1 ) { echo 'top'; } elseif ($background_vertical == 2 ) { echo 'center'; } else { echo 'bottom'; } ?> <?php  if ($background_horizontal == 1 ) { echo 'left'; } elseif ($background_horizontal == 2 ) { echo 'center'; } else { echo 'right'; } ?>; background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;margin:0!important;padding:0;}
#cover{height:100%;height:100vh;width:100%;display:block;position:absolute;left:0;top:0;}
#cover-title{color:<?php echo $cover_font_color; ?>;text-align:<?php echo $cover_align; ?>;font-size:<?php echo $cover_font_size; ?>pt;
line-height:<?php echo $cover_line_height; ?>pt;padding:<?php echo $cover_top_margin; ?>mm <?php echo $cover_padding; ?>mm;}
#topheader,#gf-meta,.entry-content,.header-entry,footer,.entry,#alert{display:none;}
@media print {
	@page {<?php if ($size == 1) { ?>size: A4 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>; <?php } elseif ($size == 2) { ?>size: A3 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>; <?php } elseif ($size == 3) { ?>size: B5 <?php if ($paper_size == 2) : echo "landscape"; endif; ?>; <?php } elseif ($size == 4) { ?> size: 280mm 430mm <?php if ($paper_size == 2) : echo "landscape"; endif; ?>; 	<?php } elseif (!empty($custom_size)) { ?> size: <?php echo $custom_width; ?>mm <?php echo $custom_height; ?>mm <?php if ($paper_size == 2) : echo "landscape"; endif; ?>; 	<?php } if (!empty ($crop_marks) ) : ?> marks: crop cross; bleed: 5mm;<?php endif; ?>}
}
<?php else : 
if ( !empty ($background) ) : ?>
body,html{background:<?php echo $background;?>;}
<?php endif; ?>	
#cover{display:none;}
a{text-decoration:none;}
#topheader h1{margin-top:0!important;}
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
endif; ?>
a{text-decoration:none!important;color:<?php echo $color_text; ?>!important;}
a[href]:after {content: none !important;}
pre {border: none !important;}
.clear{clear:left;}
<?php if (empty($comments) ) : ?>#comments,<?php endif; ?>.soundcite-audio,.reply,.modal,.anchor{display:none;} 
.header-entry{<?php if (!empty ($breakpage) )  : ?>page-break-before: always;<?php endif; ?>}
.entry-content{color:<?php echo $color_text; ?>!important;font-size:<?php echo $text_size; ?>pt!important;line-height: <?php echo $line_height; ?>pt;text-align:<?php echo $text_align; ?>; <?php if ( !empty($fill) ) : ?>column-fill: auto;<?php endif; ?>width:<?php echo $content_width; ?>%;-webkit-column-count: <?php echo $content_columns; ?>; -moz-column-count: <?php echo $content_columns; ?>; column-count: <?php echo $content_columns; ?>; <?php if ( !empty ($columns_gutter) && $content_columns > 1 ) : ?>-webkit-column-gap: <?php echo $columns_gutter; ?>mm; -moz-column-gap: <?php echo $columns_gutter; ?>mm; column-gap: <?php echo $columns_gutter; ?>mm;<?php endif; ?>display:block;<?php if (!empty ($filet) ) : ?>-webkit-column-rule: 1px solid #000; -moz-column-rule: 1px solid #000); column-rule: 1px solid #000;<?php endif; ?>}
.entry-content figcaption{margin: 8px 0 0 0!important;width: 100% !important;color:<?php echo $color_text; ?>;}
<?php 
if( !empty( $meta_quote) ) {
if ($meta_quote == "select-one") { ?>blockquote{border:0;border-left:4px solid;padding-left:20px;}<?php } 
elseif ($meta_quote == "select-two") { ?>blockquote{border:0;border-right:4px solid;padding-right:20px;}<?php } 
elseif ($meta_quote == "select-three") { ?>blockquote{border:0;border-bottom:4px solid;padding-bottom:20px}<?php } 
elseif ($meta_quote == "select-five") { ?>blockquote{border:0;border:none!important!;} blockquote::before {content:"\201C";display: inline;height: 0; line-height: 0;left: 0;position: relative;top:35px!important;color:<?php echo $meta_color; ?>;font-size: 3em;font-family: 'Times New Roman',serif;} blockquote::after {content:"\201D";display: inline;height: 0; line-height: 0;left: 0;position: relative;top:35px!important;color:<?php echo $meta_color; ?>;font-size: 3em;font-family: 'Times New Roman',serif;}
<?php }
  } 
if ( $meta_quote_design == 'select-one' ) { ?>blockquote{border-color:<?php echo $meta_color; ?>}<?php } elseif ( $meta_quote_design == 'select-two' ) { ?>blockquote{border-color:<?php echo $meta_color; ?>;border-style:dotted}<?php } elseif ( $meta_quote_design == 'select-four' ) { ?>blockquote{border-style:dotted}<?php } else { ?>blockquote{border-color:#eee}<?php } 
?>
h1#topscroll{font-size:<?php echo $maintitle_font_size; ?>pt!important; color:<?php echo $maintitle_font_color; ?>; text-align:<?php echo $maintitle_alignment; ?>!important; margin-top:<?php echo $maintitle_top; ?>mm!important; margin-bottom:<?php echo $maintitle_bottom; ?>mm!important; <?php if (!empty($maintitle_break) ) : ?>page-break-after: always;<?php endif; ?> }
#image{text-align:<?php echo $maintitle_image_alignment; ?>;margin-top: <?php echo $maintitle_top_margin; ?>mm;margin-bottom: <?php echo $maintitle_bottom_margin; ?>mm;<?php if (!empty($maintitle_image_break) ) : ?> page-break-after: always; <?php endif; if (!empty($display_maintitle_image) ) : ?> display:none; <?php endif; ?>}
#image img, #image iframe{width: <?php echo $maintitle_width ?>%!important;padding:<?php echo $maintitle_border_padding; ?>mm;}
#image img{height:auto;}	
<?php if ($maintitle_border_style == 2 ) { ?>
#image img, #image iframe{border: <?php echo $maintitle_border_width; ?>mm solid <?php echo $maintitle_image_color; ?>;padding: <?php echo $maintitle_border_padding; ?>mm;}
<?php } elseif ($maintitle_border_style == 3 ) { ?>
#image img, #image iframe{border: <?php echo $maintitle_border_width; ?>mm dotted <?php echo $maintitle_image_color; ?>;padding: <?php echo $maintitle_border_padding; ?>mm;}
<?php } elseif ($maintitle_border_style == 4 ) { ?>
#image img, #image iframe{border: <?php echo $maintitle_border_width; ?>mm dashed <?php echo $maintitle_image_color; ?>;padding: <?php echo $maintitle_border_padding; ?>mm;}
<?php } elseif ($maintitle_border_style == 5 ) { ?>
#image img, #image iframe{border: <?php echo $maintitle_border_width; ?>mm double <?php echo $maintitle_image_color; ?>;padding: <?php echo $maintitle_border_padding; ?>mm;}
<?php } else { ?>
#image img, #image iframe{border:none;}
<?php } if (!empty ($metadata_author) ) : ?>#metadata #author{display:none;}<?php endif; 
if (!empty ($metadata_image) ) : ?>#metadata #photos{display:none;}<?php endif; 
if (!empty ($metadata_date) ) : ?>#metadata #date{display:none;}<?php endif; ?>
#author,#date,#photos{text-align:<?php echo $metadata_align; ?>!important;}
#date,#photos{margin-bottom:0!important;margin-top:10px;}
#author{margin-top:0!important;margin-bottom:0!important;}
#metadata{<?php if ($metadata_border == 2) { ?>padding: <?php echo $metadata_border_padding; ?>mm;border: <?php echo $metadata_border_width; ?>mm <?php echo $metadata_border_style; ?> <?php echo $metadata_border_color; ?>; <?php } elseif ($metadata_border == 3) { ?> padding: <?php echo $metadata_border_padding; ?>mm;border-top: <?php echo $metadata_border_width; ?>mm <?php echo $metadata_border_style; ?> <?php echo $metadata_border_color; ?>;border-bottom: <?php echo $metadata_border_width; ?>mm <?php echo $metadata_border_style; ?>  <?php echo $metadata_border_color; ?>; <?php } elseif ($metadata_border == 4) { ?> padding: <?php echo $metadata_border_padding; ?>mm;border-bottom: <?php echo $metadata_border_width; ?>mm <?php echo $metadata_border_style; ?>  <?php echo $metadata_border_color; ?>; <?php } else { ?> border:none; <?php } if ( !empty ($metadata_break) ) : ?>page-break-after: always!important;<?php else: ?>margin-bottom:<?php echo $metadata_bottom; ?>mm;<?php endif; ?>}
#subline-print { line-height: 130%; font-size: <?php echo $subtitle_font_size; ?>pt; <?php if ($subtitle_weight == 2) : ?>font-weight:normal<?php else : ?>font-weight:bold<?php endif; ?>;   text-align: <?php echo $subtitle_align; ?>; <?php if (!empty($subtitle_break) ) : ?>page-break-after:always;<?php else : ?>margin-bottom: <?php echo $subtitle_bottom; ?>mm;<?php endif; ?> <?php if ($subtitle_border == 2) { ?>padding: <?php echo $subtitle_border_padding; ?>mm; border: <?php echo $subtitle_border_width; ?>mm <?php echo $subtitle_border_style; ?> <?php echo $subtitle_border_color; ?>; <?php } elseif ($subtitle_border == 3) { ?> padding: <?php echo $subtitle_border_padding; ?>mm; border-top: <?php echo $subtitle_border_width; ?>mm <?php echo $subtitle_border_style; ?> <?php echo $subtitle_border_color; ?>;border-bottom: <?php echo $subtitle_border_width; ?>mm <?php echo $subtitle_border_style; ?>  <?php echo $subtitle_border_color; ?>; <?php } elseif ($subtitle_border == 4) { ?> padding: <?php echo $subtitle_border_padding; ?>mm; border-bottom: <?php echo $subtitle_border_width; ?>mm <?php echo $subtitle_border_style; ?>  <?php echo $subtitle_border_color; ?>; <?php } else { ?> border:none; <?php } ?> } 
#hat{line-height:130%;font-size: <?php echo $hat_font_size; ?>pt; <?php if ($hat_weight == 1) : ?>font-weight:bold<?php endif; ?>; text-align: <?php echo $hat_align; ?>; margin-bottom: <?php echo $hat_bottom; ?>mm; <?php if ($hat_border == 2) { ?> border-bottom: 0.5mm solid <?php echo $hat_border_color; ?>; padding-bottom:<?php echo $hat_border_padding;?>mm; <?php } elseif ($hat_border == 3) { ?> border-bottom: 1mm solid <?php echo $hat_border_color; ?>; padding-bottom:<?php echo $hat_border_padding;?>mm; <?php } elseif ($hat_border == 4) { ?> border-bottom: 1.5mm solid <?php echo $hat_border_color; ?>; padding-bottom:<?php echo $hat_border_padding;?>mm; <?php } else { ?> border:none; <?php } ?> }
#bloc-intro{margin-bottom:<?php echo $introbloc_bottom; ?>mm;}
<?php if (!empty ($images) ) : ?>
.entry-content img,.wp-caption-text,.entry-content figcaption{display:none!important;}
<?php else : ?>
.entry-content img,figcaption{width: <?php echo $image_width; ?>%!important;margin-top: <?php echo $images_margin_top; ?>mm;margin-top: <?php echo $images_margin_bottom; ?>mm;<?php echo $images_alignment; ?>
<?php if ($images_align == 3 ) : ?>figure{width:100%!important;}<?php endif; if ( $images_align == 1 ) : ?>figure{width: <?php echo $image_width; ?>%!important;}<?php endif; if ($images_align == 2) : ?>figure {width: 100% !important;padding: 0!important;margin: 0!important;text-align: center;}<?php endif; ?>
<?php endif; 
if (!empty ($dropcap) )  : ?>
.lettrine,.dropcap {color:<?php echo $color_text; ?>!important;font-size:<?php echo $text_size + 2; ?>pt!important;line-height: <?php echo $line_height; ?>pt;padding-right: 0;float: none;font-weight: 400;text-indent: 0;text-transform:uppercase!important;}
<?php endif; ?>
blockquote{text-align:center!important;font-size:<?php echo $text_size +2; ?>pt!important;line-height:150%!important;}
.header-entry{text-align: <?php echo $section_title_align; ?>;}
.section-title{font-size: <?php echo $section_title_font_size; ?>pt; line-height: <?php echo $section_title_line_height; ?>pt; color: <?php echo $section_title_font_color; ?>; margin-top:<?php echo $section_title_top_margin; ?>mm; margin-bottom:<?php echo $section_title_bottom_margin; ?>mm;}
.header-entry h2, #topscroll{margin:0;}
.header-entry img, .header-entry iframe{width:<?php echo $multimedia_width; ?>%;margin-top: <?php echo $multimedia_top_margin; ?>mm;margin-bottom: <?php echo $multimedia_bottom_margin; ?>mm;}
.header-entry img{height:auto;}
<?php if ($multimedia_border_style == 2 ) { ?>
.header-entry img, .header-entry iframe{border: <?php echo $multimedia_border_width; ?>mm solid <?php echo $multimedia_color; ?>;padding: <?php echo $multimedia_border_padding; ?>mm;}
<?php } elseif ($multimedia_border_style == 3 ) { ?>
.header-entry img, .header-entry iframe{border: <?php echo $multimedia_border_width; ?>mm dotted <?php echo $multimedia_color; ?>;padding: <?php echo $multimedia_border_padding; ?>mm;}
<?php } elseif ($multimedia_border_style == 4 ) { ?>
.header-entry img, .header-entry iframe{border: <?php echo $multimedia_border_width; ?>mm dashed <?php echo $multimedia_color; ?>;padding: <?php echo $multimedia_border_padding; ?>mm;}
<?php } elseif ($multimedia_border_style == 5 ) { ?>
.header-entry img, .header-entry iframe{border: <?php echo $multimedia_border_width; ?>mm double <?php echo $multimedia_color; ?>;padding: <?php echo $multimedia_border_padding; ?>mm;}
<?php } else { ?>
.header-entry img, .header-entry iframe{border:none;}
<?php } ?>
<?php if (!empty($display_caption) ) : ?>
.caption{display:none;}
<?php else : ?>
.caption{text-align: <?php echo $caption_align; ?>;font-style:<?php echo $caption_style; ?>;font-size:<?php echo $caption_font_size; ?>pt;color:<?php echo $caption_font_color; ?>;margin-bottom:<?php echo $caption_bottom_margin; ?>mm;}
<?php endif;
if (!empty($section_break) ) : ?>
.header-entry{page-break-after:always;}
<?php endif; ?>
.entry-content h2,.entry-content h3,.entry-content h4,.entry-content h5{text-align:<?php echo $text_subtitles_align; ?>!important;line-height:130%;margin:30px 0 20px 0!important;text-align-last:<?php echo $text_subtitles_align; ?>!important;}
.entry-content h2{font-size:<?php echo $text_size +3.5; ?>pt!important;}
.entry-content h3{font-size:<?php echo $text_size +2.5; ?>pt!important;}
.entry-content h4{font-size:<?php echo $text_size +1.5; ?>pt!important;}
.entry-content h5{font-size:<?php echo $text_size +1; ?>pt!important;}
#masquer {text-decoration: underline;cursor: pointer;}
#masquer:hover {opacity: 0.5;}
#printbtn .btn {cursor: pointer;font-size: 14px;}
#alert {width: 90%;margin: 0 auto 30px auto;background: #f7f7f8 !important;padding: 15px;font-size: 16px;}
#alert .btn {font-size: 14px;margin-top: 30px;}
<?php if (!empty($embed) ) : ?>iframe,.wp-block-embed{display:none;}<?php else : ?>
iframe{padding-top:<?php echo $embed_margin_top; ?>mm;padding-bottom:<?php echo $embed_margin_top; ?>mm;}
<?php endif;
if (!empty ($css) ) : echo $css; endif; ?>
@media print {
* {margin:0;padding:0}
html,body{overflow:visible;min-height:100%;margin: 0 0 0 0;display: block;break-inside: avoid;}
.entry-content:last-child{page-break-after:avoid!important;}
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
<?php endif; 
endif; ?>