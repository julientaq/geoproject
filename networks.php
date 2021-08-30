<ul id="networks">
	<?php 
	$gp_options = get_option( 'gp_options' ); 
	$email = $gp_options['email_share'];
	$twitter = $gp_options['twitter_share'];
	$twitter_id = $gp_options['twitter_id'];
	$facebook = $gp_options['facebook_share'];
	$linkedin = $gp_options['linkedin_share'];
	$pinterest = $gp_options['pinterest_share'];
	$whatsapp = $gp_options['whatsapp_share'];
	
	if( !empty( $email ) ) : ?>	
	<li id="mail">
		<a title="<?php _e('Share by e-mail', 'geoformat'); ?>" href="mailto:?subject=<?php _e('A friend wants to share this article with you:', 'geoformat'); ?> <?php the_title(); ?>&amp;body=<?php _e('Read:', 'geoformat'); ?> <strong><?php the_title(); ?></strong>&nbsp;:&nbsp;<a href=<?php the_permalink() ?>><?php the_permalink() ?></a>" rel="nofollow"> 		<ion-icon name="send"></ion-icon></a>
	</li>	
	<?php endif; ?> 

	<?php if( !empty( $twitter ) ) : ?>	
	<li id="twit">
		<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>&text=<?php if (is_category() ) { echo $cat; } elseif (is_tag() ) { echo $tag; } else { the_title(); } echo " via ";  echo $twitter_id; ?>&hashtags=<?php $tags = get_the_tags(); $first_tag = (isset($tags[0]) && !empty($tags[0])) ? $tags[0] : ''; echo (isset($first_tag->name) && !empty($first_tag->name)) ? $first_tag->name : ''; ?>"><ion-icon name="logo-twitter"></ion-icon></a>
	</li>
	<?php endif; ?> 

	<?php  if( !empty( $facebook ) ) : ?>
	<li id="face">
		<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><ion-icon name="logo-facebook"></ion-icon></a>
	</li>
	<?php endif; ?> 

	<?php if( !empty( $linkedin ) ) : ?>
	<li id="link">	
		<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=<?php get_home_url(); ?>" title="<?php _e('Share on LinkedIn', 'geoformat'); ?>"><ion-icon name="logo-linkedin"></ion-icon></a>
	</li>
	<?php endif; ?> 
	<?php if( !empty( $pinterest ) ) : ?>	
	<li id="pin">
		<a class='pi' href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><ion-icon name="logo-pinterest"></ion-icon></a>
	</li>
	<?php endif; ?> 
	<?php if( !empty( $whatsapp ) ) : ?>
	<li id="whats">
		<a class='wh' href="whatsapp://send?text=<?php echo (the_title() ." ". the_permalink());?>?utm_source=WhatsApp?utm_medium=Messenger"> 			<ion-icon name="logo-whatsapp"></ion-icon> 		</a>
	</li>
	<?php endif; ?> 
</ul>

<?php 
	$get_meta = get_option( 'print_settings' );
	$pdf = $get_meta['print_pdf'];
	$preview = $get_meta['print_preview'];
	$linkprint = get_permalink(); 
	$uri = get_site_url();
	$uriprint = $uri . '/print';
	$uriprintp = $uri . '/printp';
	$linkprintmp = str_replace('maps','maps/print', $linkprint);
	$linkprintmk = str_replace('markers','markers/print', $linkprint);
	$linkprintgf = str_replace('geoformat','geoformat/print', $linkprint);
	$linkprintms = str_replace($uri, $uriprint, $linkprint);
	$linkprintpa = str_replace($uri, $uriprintp, $linkprint);
?>
<?php if ( !empty($pdf) || !empty($preview) ) : ?>
	<div id="printpdf">
		<?php if (!empty($pdf) && !is_singular('projects') ) : ?>
			<button class="btn" onclick="window.print()"><?php echo __('Print this page', 'geoformat'); ?></button>
		<?php endif; ?>
		
		<?php if ( is_singular('maps') ) :
		if (!empty($preview) ) : ?>
			<a href="<?php echo $linkprintmp; ?>" target="_blank">
				<button class="btn"><?php echo __('Preview before printing', 'geoformat'); ?></button>
			</a>
		<?php endif; 
		endif;?>
		
		<?php if ( is_singular('markers') ) :
			if (!empty($preview) ) : ?>
			<a href="<?php echo $linkprintmk; ?>" target="_blank">
				<button class="btn"><?php echo __('Preview before printing', 'geoformat'); ?></button>
			</a>
		<?php endif; 
		endif;
		if ( is_singular('post') ) :
			if (!empty($preview) ) : ?>
			<a href="<?php echo $linkprintms; ?>" target="_blank">
				<button class="btn"><?php echo __('Preview before printing', 'geoformat'); ?></button>
			</a>
		<?php endif; 
		endif;
		if ( is_page() ) :
			if (!empty($preview) ) : ?>
			<a href="<?php echo $linkprintpa; ?>" target="_blank">
				<button class="btn"><?php echo __('Preview before printing', 'geoformat'); ?></button>
			</a>
		<?php endif; 
		endif;
		if ( is_singular('geoformat') ) :
			if (!empty($preview) ) : ?>
			<a href="<?php echo $linkprintgf; ?>" target="_blank">
				<button class="btn"><?php echo __('Preview before printing', 'geoformat'); ?></button>
			</a>
		<?php endif; 
		endif;?>
	 </div>
<?php endif; ?>