<?php 
 $gp_options = get_option( 'gp_options' );
 $footer_link_color = $gp_options['footer_link_color'];
 $secundary = $gp_options['secundary_color'];
 $primary = $gp_options['primary_color'];
 $footer_bg = $gp_options['footer_style'];
 $footer_color = $gp_options['bottom_color'];
 $shadow = get_post_meta( get_the_ID(), 'shadow', true );
 $bar_site = get_post_meta( get_the_ID(), 'bar-title-site', true );
 $meta_font = get_post_meta( get_the_ID(), 'meta-font', true ); 
 $meta_date = get_post_meta( get_the_ID(), 'meta-date', true ); 
 $meta_font_title = get_post_meta( get_the_ID(), 'meta-font_title', true );
 $sec_title_align = get_post_meta( get_the_ID(), 'section_title_align', true ); 
 $section_un = get_post_meta( get_the_ID(), '_wp_editor_section_1', true );
 $section_deux = get_post_meta( get_the_ID(), '_wp_editor_section_2', true ); 
 $section_trois = get_post_meta( get_the_ID(), '_wp_editor_section_3', true ); 
 $section_quatre = get_post_meta( get_the_ID(), '_wp_editor_section_4', true ); 
 $section_cinq = get_post_meta( get_the_ID(), '_wp_editor_section_5', true ); 
 $section_six = get_post_meta( get_the_ID(), '_wp_editor_section_6', true ); 
 $section_sept = get_post_meta( get_the_ID(), '_wp_editor_section_7', true ); 
 $section_img_1 = get_post_meta( get_the_ID(), 'meta-image_1', true ); 
 $section_img_2 = get_post_meta( get_the_ID(), 'meta-image_2', true ); 
 $section_img_3 = get_post_meta( get_the_ID(), 'meta-image_3', true ); 
 $section_img_4 = get_post_meta( get_the_ID(), 'meta-image_4', true ); 
 $section_img_5 = get_post_meta( get_the_ID(), 'meta-image_5', true ); 
 $section_img_6 = get_post_meta( get_the_ID(), 'meta-image_6', true ); 
 $section_img_7 = get_post_meta( get_the_ID(), 'meta-image_7', true ); 
 $section1_caption = get_post_meta( get_the_ID(), 'section1_caption', true ); 
 $section2_caption = get_post_meta( get_the_ID(), 'section2_caption', true ); 
 $section3_caption = get_post_meta( get_the_ID(), 'section3_caption', true ); 
 $section4_caption = get_post_meta( get_the_ID(), 'section4_caption', true ); 
 $section5_caption = get_post_meta( get_the_ID(), 'section5_caption', true ); 
 $section6_caption = get_post_meta( get_the_ID(), 'section6_caption', true ); 
 $section7_caption = get_post_meta( get_the_ID(), 'section7_caption', true ); 
 $meta_video = get_post_meta( get_the_ID(), 'meta-video',true );
 $section_video_1 = get_post_meta( get_the_ID(), 'meta-video_1', true ); 
 $section_video_2 = get_post_meta( get_the_ID(), 'meta-video_2', true );  
 $section_video_3 = get_post_meta( get_the_ID(), 'meta-video_3', true ); 
 $section_video_4 = get_post_meta( get_the_ID(), 'meta-video_4', true ); 
 $section_video_5 = get_post_meta( get_the_ID(), 'meta-video_5', true ); 
 $section_video_6 = get_post_meta( get_the_ID(), 'meta-video_6', true ); 
 $section_video_7 = get_post_meta( get_the_ID(), 'meta-video_7', true ); 
 $section_title_un = get_post_meta( get_the_ID(), 'meta-title_1', true ); 
 $section_title_deux = get_post_meta( get_the_ID(), 'meta-title_2', true ); 
 $section_title_trois = get_post_meta( get_the_ID(), 'meta-title_3', true ); 
 $section_title_quatre = get_post_meta( get_the_ID(), 'meta-title_4', true ); 
 $section_title_cinq = get_post_meta( get_the_ID(), 'meta-title_5', true ); 
 $section_title_six = get_post_meta( get_the_ID(), 'meta-title_6', true ); 
 $section_title_sept = get_post_meta( get_the_ID(), 'meta-title_7', true ); 
 $top_title = get_post_meta( get_the_ID(), 'section_title_color', true ); 
 $sec1_title = get_post_meta( get_the_ID(), 'section1_title_color', true ); 
 $sec1_title_align = get_post_meta( get_the_ID(), 'section1_title_align', true ); 
 $sec2_title = get_post_meta( get_the_ID(), 'section2_title_color', true ); 
 $sec2_title_align = get_post_meta( get_the_ID(), 'section2_title_align', true ); 
 $sec3_title = get_post_meta( get_the_ID(), 'section3_title_color', true ); 
 $sec3_title_align = get_post_meta( get_the_ID(), 'section3_title_align', true ); 
 $sec4_title = get_post_meta( get_the_ID(), 'section4_title_color', true ); 
 $sec4_title_align = get_post_meta( get_the_ID(), 'section4_title_align', true ); 
 $sec5_title = get_post_meta( get_the_ID(), 'section5_title_color', true ); 
 $sec5_title_align = get_post_meta( get_the_ID(), 'section5_title_align', true ); 
 $sec6_title = get_post_meta( get_the_ID(), 'section6_title_color', true ); 
 $sec6_title_align = get_post_meta( get_the_ID(), 'section6_title_align', true ); 
 $sec7_title = get_post_meta( get_the_ID(), 'section7_title_color', true ); 
 $sec7_title_align = get_post_meta( get_the_ID(), 'section7_title_align', true );
 $meta_auteur = get_post_meta( get_the_ID(), 'meta-auteur', true ); 
 $load_auteur = get_post_meta( get_the_ID(), 'load-auteur', true ); 
 $meta_loader = get_post_meta( get_the_ID(), 'meta-loader', true ); 
 $meta_loader_animate = get_post_meta( get_the_ID(), 'meta-loader-animate', true ); 
 $meta_trigger = get_post_meta( get_the_ID(), 'meta-trigger', true ); 
 $trigger_text = get_post_meta( get_the_ID(), 'trigger-text', true ); 
 $meta_bar = get_post_meta( get_the_ID(), 'meta-bar', true ); 
 $meta_photos = get_post_meta( get_the_ID(), 'meta-photos', true ); 
 $meta_top = get_post_meta( get_the_ID(), 'meta-image', true ); 
 $meta_font_size = get_post_meta( get_the_ID(), 'meta-font-size', true ); 
 $meta_col = get_post_meta( get_the_ID(), 'meta-col', true ); 
 $small = "col-lg-6 col-md-6 col-sm-12"; 
 $medium = "col-lg-7 col-md-7 col-sm-12"; 
 $large = "col-lg-8 col-md-8 col-sm-12"; 
 $subline = get_post_meta( get_the_ID(), 'meta-subline', true ); 
 $chapo = get_post_meta( get_the_ID(), '_wp_editor_chapo', true ); 
 $txt = get_post_meta( get_the_ID(), '_wp_editor_text', true ); 
 $meta_color = get_post_meta( get_the_ID(), 'meta-color', true ); 
 $meta_text_color = get_post_meta( get_the_ID(), 'meta-text-color', true ); 
 $bar_sup = get_post_meta( get_the_ID(), 'bar-sup', true );
 $bar_title = get_post_meta( get_the_ID(), 'bar-title', true ); 
 $top_bar = get_post_meta( get_the_ID(), 'top-bar', true ); 
 $reseaux = get_post_meta( get_the_ID(), 'reseaux', true ); 
 $burger = get_post_meta( get_the_ID(), 'burger', true ); 
 $meta_quote = get_post_meta( get_the_ID(), 'quote-design', true );
 $meta_quote_design = get_post_meta( get_the_ID(), 'quote', true ); 
 $intro = get_post_meta( get_the_ID(), 'meta-animate', true ); 
 $body_color = get_post_meta( get_the_ID(), 'body-color', true ); 
 $footer = get_post_meta( get_the_ID(), '_wp_editor_foot', true );
 $custom_css = get_post_meta( get_the_ID(), 'custom-css', true ); 
 
if( !empty( $meta_font) || !empty ($meta_font_title) ) : ?>
<?php if ($meta_font == "select-six" || $meta_font_title == "select-six") { ?> <link href='https://fonts.googleapis.com/css?family=Arvo:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-seven" || $meta_font_title == "select-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-height" || $meta_font_title == "select-eight") { ?> <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-nine" || $meta_font_title == "select-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-ten" || $meta_font_title == "select-ten") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-eleven" || $meta_font_title == "select-eleven") { ?> <link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twelve" || $meta_font_title == "select-twelve") { ?> <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-thirteen" || $meta_font_title == "select-thirteen") { ?> <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-fourteen" || $meta_font_title == "select-fourteen") { ?> <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-fifteen" || $meta_font_title == "select-fifteen") { ?> <link href='https://fonts.googleapis.com/css?family=Coming+Soon&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-sixteen" || $meta_font_title == "select-sixteen") { ?> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-seventeen" || $meta_font_title == "select-seventeen") { ?> <link href='https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-eighteen" || $meta_font_title == "select-eighteen") { ?> <link href='https://fonts.googleapis.com/css?family=Bree+Serif&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-nineteen" || $meta_font_title == "select-nineteen") { ?> <link href='"https://fonts.googleapis.com/css?family=Montserrat&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty" || $meta_font_title == "select-twenty") { ?> <link href='https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-one" || $meta_font_title == "select-twenty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-two" || $meta_font_title == "select-twenty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-three" || $meta_font_title == "select-twenty-three") { ?> <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-four" || $meta_font_title == "select-twenty-four") { ?> <link href='https://fonts.googleapis.com/css?family=EB+Garamond:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-five" || $meta_font_title == "select-twenty-five") { ?> <link href='http://www.cnap.graphismeenfrance.fr/faune/styles/faune-fontes.css' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-six" || $meta_font_title == "select-twenty-six") { ?> <link href='https://fonts.googleapis.com/css?family=Play:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-seven" || $meta_font_title == "select-twenty-seven") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-eight" || $meta_font_title == "select-twenty-eight") { ?> <link href='https://fonts.googleapis.com/css?family=Quattrocento:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-twenty-nine" || $meta_font_title == "select-twenty-nine") { ?> <link href='https://fonts.googleapis.com/css?family=Special+Elite&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-thirty" || $meta_font_title == "select-thirty") { ?> <link href='https://fonts.googleapis.com/css?family=Karma:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-thirty-one" || $meta_font_title == "select-thirty-one") { ?> <link href='https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap' rel='stylesheet' type='text/css'>
<?php } if ($meta_font == "select-thirty-two" || $meta_font_title == "select-thirty-two") { ?> <link href='https://fonts.googleapis.com/css?family=Overpass+Mono:400,700&display=swap' rel='stylesheet' type='text/css'>
<?php  } 
endif; ?>
 
 <style type="text/css">
body.custom-background { background-image: none!important; background-color: <?php echo $body_color;?>}  <?php if( !empty( $meta_font_size ) ) {   if ($meta_font_size == "select-two") { ?> html,body{font-size:1.1em}<?php } elseif ($meta_font_size == "select-three") { ?> html,body{font-size:.9em}.content{font-size:1.1em!important}<?php } else { ?> html,body{font-size:1em}<?php }  }   if( !empty( $sec_title_align ) ) {   if ( $sec_title_align == "select-one" ) { ?>.title_bg_une h1,.title_home h1{text-align:center!important}<?php }   elseif ( $sec_title_align == "select-three" ) { ?>.title_bg_une h1,.title_home h1{text-align:right;margin-left:30px}<?php } else { ?>.title_bg_une h1,.title_home h1{text-align:left;margin-right:30px}<?php }  }   if( !empty( $sec1_title_align ) ) {   if ( $sec1_title_align == "select-two" ) { ?> #sec1_title{text-align:center!important}<?php }   elseif ( $sec1_title_align == "select-three" ) { ?> #sec1_title{text-align:right}<?php } else { ?> #sec1_title{text-align:left}<?php }  }   if( !empty( $sec2_title_align ) ) {   if ($sec2_title_align == "select-two" ) { ?> #sec2_title{text-align:center}<?php } elseif ($sec2_title_align == "select-three" ) { ?> #sec2_title{text-align:right}<?php } else { ?> #sec2_title{text-align:left}<?php }  }   if( !empty( $sec3_title_align ) ) {   if ($sec3_title_align == "select-two" ) { ?> #sec3_title{text-align:center}<?php } elseif ($sec3_title_align == "select-three" ) { ?> #sec3_title{text-align:right}<?php } else { ?> #sec3_title{text-align:left}<?php }  }    if( !empty( $sec4_title_align ) ) {   if ($sec4_title_align == "select-two" ) { ?> #sec4_title{text-align:center}<?php } elseif ($sec4_title_align == "select-three" ) { ?> #sec4_title{text-align:right}<?php } else { ?> #sec4_title{text-align:left}<?php }  }   if( !empty( $sec5_title_align ) ) {   if ($sec5_title_align == "select-two" ) { ?> #sec5_title{text-align:center}<?php } elseif ($sec5_title_align == "select-three" ) { ?> #sec5_title{text-align:right}<?php } else { ?> #sec5_title{text-align:left}<?php }  }   if( !empty( $sec6_title_align ) ) {   if ($sec6_title_align == "select-two" ) { ?> #sec6_title{text-align:center}<?php } else if ($sec6_title_align == "select-three" ) { ?> #sec6_title{text-align:right}<?php } else { ?> #sec6_title{text-align:left}<?php }  }   if( !empty( $sec7_title_align ) ) {   if ($sec7_title_align == "select-two" ) { ?> #sec7_title{text-align:center}<?php } else if ($sec7_title_align == "select-three" ) { ?> #sec7_title{text-align:right}<?php } else { ?> #sec7_title{text-align:left}<?php }  } if( !empty( $top_title ) ) {    if ($top_title == "select-one") { ?>.bloc_title_top{color:#FFFFFF!important;background:none!important;line-height:110%!important}<?php } elseif ($top_title == "select-two") { ?>.bloc_title_top{color:#000;background:none!important;line-height:110%!important}<?php } elseif ($top_title == "select-three") { ?>.bloc_title_top{line-height:180%;color:#fff;padding:10px 20px;background:<?php echo $meta_color; ?>;margin:0;text-align:center}<?php } else { ?>.title h1{color:#fff}     @media screen and (max-width:550px){.intro-effect-jam3:not(.notrans).header h1{font-size:2.7em;margin:0 auto}.title{padding:0 2%;top:20%}.bloc_title_top{line-height:190%;color:#FFFFFF!important;padding:10px}   #bloc_title_1,#bloc_title_2,#bloc_title_3,#bloc_title_4,#bloc_title_5{padding:10px;line-height:210%}}@media screen and (max-width:450px){.title{padding:0 2%;top:10%}.intro-effect-jam3:not(.notrans).header h1{font-size:2.5em}}@media screen and (max-width:350px){.title{padding:0 2%;top:40px}}<?php }  } if( !empty( $sec1_title ) ) {    if ($sec1_title == "select-two") { ?> #sec1_title h1{color:#000000!important;}<?php }   elseif ($sec1_title == "select-three") { ?> #bloc_title_1{color:#FFFFFF!important;padding:10px 20px;background-color:<?php echo $meta_color; ?>!important;margin:0;text-align:center;line-height:190%}<?php } else { ?> #sec1_title h1{color:#FFFFFF!important}<?php }   }   if( !empty( $sec2_title ) ) {    if ($sec2_title == "select-two") { ?> #sec2_title h1{color:#000000!important;}<?php }   elseif ($sec2_title == "select-three") { ?> #bloc_title_2{color:#FFFFFF!important;padding:10px 20px;background-color:<?php echo $meta_color; ?>!important;margin:0;text-align:center;line-height:190%}<?php } else { ?> #sec2_title h1{color:#FFFFFF!important}<?php }   }  if( !empty( $sec3_title ) ) {    if ($sec3_title == "select-two") { ?> #sec3_title h1{color:#000000!important;}<?php } elseif ($sec3_title == "select-three") { ?> #bloc_title_3{color:#FFFFFF!important;padding:10px 20px;background-color:<?php echo $meta_color; ?>!important;margin:0;text-align:center;line-height:190%}<?php } else { ?> #sec3_title h1{color:#FFFFFF!important}<?php }   }  if( !empty( $sec4_title ) ) {    if ($sec4_title == "select-two") { ?> #sec4_title h1{color:#000000!important;}<?php } elseif ($sec4_title == "select-three") { ?> #bloc_title_4{color:#FFFFFF!important;padding:10px 20px;background-color:<?php echo $meta_color; ?>!important;margin:0;text-align:center;line-height:190%}<?php } else { ?> #sec4_title h1{color:#FFFFFF!important}<?php }   }  if( !empty( $sec5_title ) ) {    if ($sec5_title == "select-two") { ?> #sec5_title h1{color:#000000!important;}<?php } elseif ($sec5_title == "select-three") { ?> #bloc_title_5{color:#FFFFFF!important;padding:10px 20px;background-color:<?php echo $meta_color; ?>!important;margin:0;text-align:center;line-height:190%}<?php } else { ?> #sec5_title h1{color:#FFFFFF!important}<?php }  }   if( !empty( $sec6_title ) ) {   if ($sec6_title == "select-two") { ?> #sec6_title h1{color:#000000!important;}<?php } elseif ($sec6_title == "select-three") { ?> #bloc_title_6{color:#FFFFFF!important;padding:10px 20px;background-color:<?php echo $meta_color; ?>!important;margin:0;text-align:center;line-height:190%}<?php } else { ?> #sec6_title h1{color:#FFFFFF!important}<?php }  }   if( !empty( $sec7_title ) ) {    if ($sec7_title == "select-two") { ?> #sec7_title h1{color:#000000!important;}<?php } elseif ($sec7_title == "select-three") { ?> #bloc_title_7{color:#FFFFFF!important;padding:10px 20px;background-color:<?php echo $meta_color; ?>!important;margin:0;text-align:center;line-height:190%}<?php } else { ?> #sec7_title h1{color:#FFFFFF!important}<?php }  }   if( !empty( $section_img_1 ) ) { ?> #section_un{background:<?php echo $meta_color; ?> url("<?php echo $section_img_1; ?>") center fixed}<?php }  if( !empty( $section_img_2 ) ) { ?> #section_deux{background:<?php echo $meta_color; ?> url("<?php echo $section_img_2; ?>") center fixed}<?php }  if( !empty( $section_img_3 ) ) { ?> #section_trois{background:<?php echo $meta_color; ?> url("<?php echo $section_img_3; ?>") center fixed}<?php }  if( !empty( $section_img_4 ) ) { ?> #section_quatre{background:<?php echo $meta_color; ?> url("<?php echo $section_img_4; ?>") center fixed}<?php }  if( !empty( $section_img_5 ) ) { ?> #section_cinq{background:<?php echo $meta_color; ?> url("<?php echo $section_img_5; ?>") center fixed}<?php }   if( !empty( $section_img_6 ) ) { ?> #section_six{background:<?php echo $meta_color; ?> url("<?php echo $section_img_6; ?>") center fixed}<?php }   if( !empty( $section_img_7 ) ) { ?> #section_sept{background:<?php echo $meta_color; ?> url("<?php echo $section_img_7; ?>") center fixed}<?php }    if ($meta_bar == "select-one") { ?> #progression{top:0}<?php } elseif ($meta_bar == "select-two") { ?> #progression{bottom:0}<?php } elseif ($meta_bar == "select-three") { ?> #progression{display:none!important}<?php }    if($shadow == 'select-two') : ?>.navbar{-webkit-box-shadow:0 2px 4px 0 rgba(158,158,158,0.77);-moz-box-shadow:0 2px 4px 0 rgba(158,158,158,0.77);box-shadow:0 2px 4px 0 rgba(158,158,158,0.77)}<?php endif;   if ($bar_site == 'select-two') : ?>.navbar-fixed-bottom #top_title{margin:16px 0 0 50px}<?php endif;  if( !empty( $meta_top ) ) { ?>.page_loader div,.bg-img{background:<?php echo $meta_color; ?> url('<?php echo $meta_top; ?>') no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;min-width:100%;min-height:100%;@media(max-width:600px){background-attachment:scroll}@media(max-width:@iphone-screen){background-attachment:scroll}}<?php }  if ($bar_sup == "select-two" && empty( $footer ) ) {?> #nextpage{padding:30px 0 120px 0}<?php } if ($bar_sup == "select-two") { ?>#up{bottom:70px}<?php } if( !empty( $top_bar) ) { ?> <?php if ($top_bar == "select-one") { ?>.navbar{background:<?php echo $meta_color; ?>;color:#FFFFFF!important}#side_nav{border-color:#fff}#barre{opacity:.7} .navbar a,.navbar,#networks a{color:#FFFFFF!important}  <?php } elseif ($top_bar == "select-two") { ?>.navbar{background:#fff;color:<?php echo $meta_color; ?>}.navbar a{color:<?php echo $meta_color; ?>} .navbar-fixed-bottom{border-top:1px solid <?php echo $meta_color; ?>}.navbar-fixed-top{border-bottom:1px solid <?php echo $meta_color; ?>}#side_nav{border-color:transparent}<?php } elseif ($top_bar == "select-three") { ?>.navbar{background:#000;color:#fff} .navbar a,.navbar{color:#FFFFFF!important}#side_nav{border-color:transparent}<?php }  } if( !empty( $meta_quote) ) { if ($meta_quote == "select-one") { ?>.content blockquote{border:0;border-left:4px solid;padding-left:20px;}<?php } elseif ($meta_quote == "select-two") { ?>.content blockquote{border:0;border-right:4px solid;padding-right:20px;}<?php } elseif ($meta_quote == "select-three") { ?>.content blockquote{border:0;border-bottom:4px solid;padding-bottom:20px}<?php } elseif ($meta_quote == "select-five") { ?>.content blockquote{border:0;border:none!important!;text-align:center;} blockquote::before {content:"\201C";display: inline;height: 0; line-height: 0;left: 0;position: relative;top: 30px!important;color:<?php echo $meta_color; ?>;font-size: 4em;font-family: 'Times New Roman',serif;} blockquote::after {content:"\201D";display: inline;height: 0; line-height: 0;left: 0;position: relative;top: 30px;color:<?php echo $meta_color; ?>;font-size: 4em;font-family: 'Times New Roman',serif;} @media only screen and (max-width: 767px) { blockquote{font-size: 1.15em;font-family:'Raleway',sans-serif;} blockquote::before {top: 20px} blockquote::after {top:30px;} }<?php }   } if( !empty( $meta_color ) ) { ?>.page_loader,#side_nav,.carousel-indicators{background:<?php echo $meta_color; ?>}.jumbotron{background:<?php echo $meta_color; ?>}a,a:link,a:visited,a:active,a:focus,#up,a.navbar-brand:nth-child(2):hover,.left:hover,.right:hover,.comment-notes,input#submit:hover,.mejs-currenttime,.mejs-duration{color:<?php echo $meta_color; ?>}input#submit:hover{background:<?php echo $meta_color; ?>!important;color:#fff}#barre,#side_nav,.carousel-indicators,.chapitre,.mejs-embed,.mejs-embed body,.mejs-container.mejs-controls,.mejs-controls.mejs-time-rail.mejs-time-total,.mejs-horizontal-volume-current,.mejs-controls.mejs-time-rail.mejs-time-current,.mejs-volume-handle,.mejs-horizontal-volume-total,.mejs-time-loaded{background:<?php echo $meta_color; ?>}#show.open,.togglenav:hover,.togglenav:active,.togglenav:focus{background:<?php echo $meta_color; ?>;}#nextpage,.intro-effect-jam3.modify.header h1,.intro-effect-jam3.modify.subline{color:<?php echo $meta_color; ?>} input#submit:hover,.btn-succes{margin:0 auto;background:<?php echo $meta_color; ?>;color:#fff}.btn-succes:hover{border:1px solid <?php echo $meta_color; ?>;color:<?php echo $meta_color; ?>;background:#fff}<?php if ( $meta_trigger == 'select-one' || $meta_trigger == 'select-four' || $meta_trigger == 'select-five' ) { ?> button.trigger{position:fixed;background:transparent;bottom:60px;width:20%;left:40%;z-index:8000;display:block;padding:8px 22px;border:1px solid #FFFFFF!important;font-size:1.2em;cursor:pointer;margin:0 auto;color:#fff}button.trigger:hover{border:1px solid <?php echo $meta_color; ?>!important;color:<?php echo $meta_color; ?>}<?php if (!empty ($top_title) )  {   if ($top_title == "select-two") { ?> button.trigger{border:1px solid #000;color:#000}<?php }  }   } else { ?> button.trigger{color:<?php echo $meta_color; ?>}button.trigger:hover{opacity:.7}<?php } if ( $meta_quote_design == 'select-one' ) { ?>.content blockquote{border-color:<?php echo $meta_color; ?>}<?php } elseif ( $meta_quote_design == 'select-two' ) { ?>.content blockquote{border-color:<?php echo $meta_color; ?>;border-style:dotted}<?php } elseif ( $meta_quote_design == 'select-four' ) { ?>.content blockquote{border-style:dotted}<?php } else { ?>.content blockquote{border-color:#eee}<?php }  if ( $reseaux == 'select-one' ) { ?>.right-net a{color:<?php echo $meta_color; ?>!important;}<?php } elseif ( $reseaux == 'select-two' ) { ?>.right-net a{color:#FFFFFF!important}<?php } elseif ( $reseaux == 'select-n' ) { ?>.right-net a.fa{color:#FFFFFF!important}.fa-pinterest{background:#bd081c!important;}.fa-whatsapp{background:#25d366;}.fa-twitter{background:#2ca8d2!important;}.fa-facebook{background:#305891!important;}.fa-google-plus{background:#ce4d39!important;}.fa-linkedin{background:#4498c8!important;}.fa-envelope-o{background:#787878!important;}<?php } elseif ( $reseaux == 'select-three' ) { ?>.right-net a{color:#000000!important;}<?php }  } if ( $reseaux == 'select-one' ) { ?>.right-net a.fa{color:<?php echo $meta_color; ?>}<?php } elseif ( $reseaux == 'select-two' ) { ?>.right-net a.fa{background:<?php echo $meta_color; ?>;color:#FFFFFF!important}<?php } elseif ( $reseaux == 'select-three' ) { ?>.right-net a.fa{color:#FFFFFF!important}.fa-pinterest{background:#bd081c}.fa-whatsapp{background:#25d366;.fa-twitter{background:#2ca8d2}.fa-facebook{background:#305891}.fa-google-plus{background:#ce4d39}.fa-linkedin{background:#4498c8}.fa-envelope-o{background:#787878}<?php } elseif ( $reseaux == 'select-three' ) { ?>.right-net a.fa{color:#fff}<?php } if( !empty( $meta_color ) ) { ?>.dropcap,section ul li:before{color:<?php echo $meta_color; ?>}#nextpage a{border-bottom:1px solid <?php echo $meta_color; ?>!important}.btn-slf{background:<?php echo $meta_color; ?>!important;color:#fff}<?php } ?> #footer{background:<?php echo $footer_bg; ?>;color:<?php echo $footer_color; ?>!important;} <?php if ($footer_link_color == "select-one") { ?> #footer a {color:<?php echo $footer_color; ?>!important;}  <?php } elseif ($footer_link_color == "select-two") { ?> #footer a,#progression {color:<?php echo $primary; ?>!important;}  <?php } elseif ($footer_link_color == "select-three") { ?> #footer a {color:#FFFFFF!important;}  <?php } elseif ($footer_link_color == "select-four") { ?> #footer a {color:#000000!important;}  <?php } ?> #printpdf .btn{background:<?php echo $secundary;?>;border:none!important;color:#FFFFFF;} #printpdf .btn:hover{background:<?php echo $meta_color; ?>;color:#FFFFFF;}
<?php
if( !empty( $meta_font) ) : 
if ($meta_font == "select-one") { ?> html,body,.widget-title,.leaflet-container{font-family:Arial,Helvetica,sans-serif!important}
<?php } 
elseif ($meta_font == "select-two") { ?> html,body,.widget-title,.leaflet-container{font-family:Georgia,serif!important;}
<?php }
elseif ($meta_font == "select-three") { ?> html,body,.widget-title,.leaflet-container{font-family:Tahoma, Geneva, sans-serif!important;}
<?php }
elseif ($meta_font == "select-four") { ?> html,body,.widget-title,.leaflet-container{font-family:Times New Roman, Times, serif!important;}
<?php }
elseif ($meta_font == "select-five") { ?> html,body,.widget-title,.leaflet-container{font-family:Verdana, Geneva, sans-serif!important;}
<?php }
elseif ($meta_font == "select-six") { ?> html,body,.widget-title,.leaflet-container{font-family:'Arvo',serif!important;}
<?php }
elseif ($meta_font == "select-seven") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Source Sans Pro', sans-serif!important;}
<?php }
elseif ($meta_font == "select-height") { ?> html,body,.widget-title,.leaflet-container{font-family:'Open Sans',sans-serif!important;}
<?php }
elseif ($meta_font == "select-nine") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Roboto', sans-serif!important;}
<?php }
elseif ($meta_font == "select-ten") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Roboto Slab', serif!important;}
<?php }
elseif ($meta_font == "select-eleven") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Lato', sans-serif!important;}
<?php }
elseif ($meta_font == "select-twelve") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Ubuntu Condensed', sans-serif!important;}
<?php }
elseif ($meta_font == "select-thirteen") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Inconsolata', monospace!important;}
<?php }
elseif ($meta_font == "select-fourteen") { ?> html,body,.widget-title,.leaflet-container{font-family:'Playfair Display', serif!important;}
<?php }
elseif ($meta_font == "select-fifteen") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Coming Soon', cursive!important}
<?php }
elseif ($meta_font == "select-sixteen") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Roboto Condensed', sans-serif!important;}
<?php }
elseif ($meta_font == "select-seventeen") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Raleway', sans-serif!important}
<?php }
elseif ($meta_font == "select-eighteen") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Bree Serif', serif!important;}
<?php }
elseif ($meta_font == "select-nineteen") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Montserrat', sans-serif!important;}
<?php }
elseif ($meta_font == "select-twenty") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Oswald', sans-serif!important;}
<?php }
elseif ($meta_font == "select-twenty-one") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Lobster',cursive!important;}
<?php }
elseif ($meta_font == "select-twenty-two") { ?> html,body,.widget-title,.leaflet-container{font-family:'Lobster Two',cursive!important;}
<?php }
elseif ($meta_font == "select-twenty-three") { ?> html,body,.widget-title,.leaflet-container{font-family:'Libre Baskerville', serif!important;}
<?php }
elseif ($meta_font == "select-twenty-four") { ?> html,body,.widget-title,.leaflet-container{font-family: 'EB Garamond', serif!important;}
<?php }
elseif ($meta_font == "select-twenty-five") { ?> html,body,.widget-title,.leaflet-container{font-family:'Faune', sans-serif!important;}
<?php }
elseif ($meta_font == "select-twenty-six") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Play', sans-serifimportant;}
<?php }
elseif ($meta_font == "select-twenty-seven") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Quattrocento Sans', sans-serif!important;}
<?php }
elseif ($meta_font == "select-twenty-eight") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Quattrocento', serif!important;}
<?php }
elseif ($meta_font == "select-twenty-nine") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Special Elite', cursive!important;}
<?php }
elseif ($meta_font == "select-thirty") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Karma', serif!important;}
<?php }
elseif ($meta_font == "select-thirty-one") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Arbutus Slab', serif!important;}
<?php }
elseif ($meta_font == "select-thirty-two") { ?> html,body,.widget-title,.leaflet-container{font-family: 'Overpass Mono', monospace!important;}<?php }
else { ?> html,body,.widget-title,.leaflet-container{font-family:'Raleway',sans-serif!important} 
<?php }
endif;

/*Titles*/
if( !empty( $meta_font_title ) ) : 
if ($meta_font_title == "select-one") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:Arial,Helvetica,sans-serif!important}
<?php } 
elseif ($meta_font_title == "select-two") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:Georgia,serif!important;}
<?php }
elseif ($meta_font_title == "select-three") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:Tahoma, Geneva, sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-four") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:Times New Roman, Times, serif!important;}
<?php }
elseif ($meta_font_title == "select-five") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:Verdana, Geneva, sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-six") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:'Arvo',serif!important;}
<?php }
elseif ($meta_font_title == "select-seven") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Source Sans Pro', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-height") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:'Open Sans',sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-nine") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Roboto', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-ten") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Roboto Slab', serif!important;}
<?php }
elseif ($meta_font_title == "select-eleven") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Lato', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-twelve") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Ubuntu Condensed', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-thirteen") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Inconsolata', monospace!important;}
<?php }
elseif ($meta_font_title == "select-fourteen") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:'Playfair Display', serif!important;}
<?php }
elseif ($meta_font_title == "select-fifteen") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Coming Soon', cursive!important}
<?php }
elseif ($meta_font_title == "select-sixteen") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Roboto Condensed', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-seventeen") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Raleway', sans-serif!important}
<?php }
elseif ($meta_font_title == "select-eighteen") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Bree Serif', serif!important;}
<?php }
elseif ($meta_font_title == "select-nineteen") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Montserrat', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-twenty") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Oswald', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-twenty-one") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Lobster',cursive!important;}
<?php }
elseif ($meta_font_title == "select-twenty-two") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:'Lobster Two',cursive!important;}
<?php }
elseif ($meta_font_title == "select-twenty-three") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:'Libre Baskerville', serif!important;}
<?php }
elseif ($meta_font_title == "select-twenty-four") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'EB Garamond', serif!important;}
<?php }
elseif ($meta_font_title == "select-twenty-five") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:'Faune', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-twenty-six") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Play', sans-serifimportant;}
<?php }
elseif ($meta_font_title == "select-twenty-seven") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Quattrocento Sans', sans-serif!important;}
<?php }
elseif ($meta_font_title == "select-twenty-eight") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Quattrocento', serif!important;}
<?php }
elseif ($meta_font_title == "select-twenty-nine") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Special Elite', cursive!important;}
<?php }
elseif ($meta_font_title == "select-thirty") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Karma', serif!important;}
<?php }
elseif ($meta_font_title == "select-thirty-one") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Arbutus Slab', serif!important;}
<?php }
elseif ($meta_font_title == "select-thirty-two") { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family: 'Overpass Mono', monospace!important;}<?php }
else { ?>.title h1,#intro h1,.section_title,#inner h1,.caption_img_slf,h1,h2,h3,h4,h5,.content blockquote,h1,h2,h3,h4,h5,blockquote{font-family:'Raleway',sans-serif!important} 
<?php }
endif; 

if ($meta_bar == "select-two") { ?>
#progression{bottom:0;left:0;}
<?php } elseif ($meta_bar == "select-three" ){ ?>
#progression{display:none;}
<?php } else { ?>
#progression{top:0;left:0;}
<?php }



if( !empty( $custom_css ) ) : 
echo $custom_css;
endif; ?>
</style>