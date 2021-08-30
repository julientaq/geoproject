<div id="overlay"></div>


<nav class="navbar fixed-top navbar-expand-md navbar-dark">
  	<div class="containerhead">
  		
			<div id="left-nav">
				<?php if ( has_nav_menu( 'primary' ) ) :?>
					<span class="icon" id="burger"><ion-icon name="menu"></ion-icon></span>
					<span class="icon" id="close"><ion-icon name="close"></ion-icon></span>
				<?php endif;?>
				
				<?php 
					$gp_options = get_option( 'gp_options' ); 
					$twitter = $gp_options['url_twitter'];
					$facebook = $gp_options['url_facebook'];
					$instagram = $gp_options['url_instagram'];
					$youtube = $gp_options['url_youtube'];
					$soundcloud = $gp_options['url_soundcloud'];
					$medium = $gp_options['url_medium'];
					$rss = $gp_options['rss_share']; ?>
						
					<ul id="social-top">
							<?php if( !empty( $facebook ) ) : ?>	
							<li id="facebook">
								<a title="<?php _e('Facebook', 'geoformat'); ?>" href="<?php echo $facebook;?>" target="_blank">
									<ion-icon name="logo-facebook"></ion-icon>
								</a>
							</li>	
							<?php endif; 
							if( !empty( $twitter ) ) : ?>	
							<li id="twitter">
								<a title="<?php _e('Twitter', 'geoformat'); ?>" href="<?php echo $twitter;?>" target="_blank">
									<ion-icon name="logo-twitter"></ion-icon>
								</a>
							</li>	
							<?php endif; 
							if( !empty( $instagram ) ) : ?>	
							<li id="instagram">
								<a title="<?php _e('Instagram', 'geoformat'); ?>" href="<?php echo $instagram;?>" target="_blank">
									<ion-icon name="logo-instagram"></ion-icon>
								</a>
							</li>	
							<?php endif; 
							if( !empty( $youtube ) ) : ?>	
							<li id="youtube">
								<a title="<?php _e('YouTube', 'geoformat'); ?>" href="<?php echo $youtube;?>" target="_blank">
									<ion-icon name="logo-youtube"></ion-icon>
								</a>
							</li>	
							<?php endif; 
							if( !empty( $soundcloud ) ) : ?>	
							<li id="soundcloud">
								<a title="<?php _e('Soundcloud', 'geoformat'); ?>" href="<?php echo $soundcloud;?>" target="_blank">
									<ion-icon name="cloud"></ion-icon>
								</a>
							</li>	
							<?php endif; 
							if( !empty( $medium ) ) : ?>	
							<li id="medium">
								<a title="<?php _e('Medium', 'geoformat'); ?>" href="<?php echo $medium;?>" target="_blank">
									<ion-icon name="logo-markdown"></ion-icon>
								</a>
							</li>	
							<?php endif; 
							if( !empty( $rss ) ) : ?>	
							<li>
								<a href="<?php echo get_site_url(); ?>/feed" target="_blank">
									<ion-icon name="logo-rss"></ion-icon>
								</a>
							</li>
							<?php endif; ?> 
					</ul>

					<?php if ( has_nav_menu( 'primary' ) ) :?>
						<div id="menu" class="mCustomScrollbar">
						<?php
					    wp_nav_menu([
						 'menu'            => 'top',
						 'theme_location'  => 'primary',
						 'container'       => 'div',
						 'container_id'    => 'bs4navbar',
						 'container_class' => 'navbar-collapse',
						 'menu_id'         => false,
						 'menu_class'      => 'menutop',
						 'depth'           => 2,
						 'fallback_cb'     => 'bs4navwalker::fallback',
						 'walker'          => new bs4navwalker()
					    ]);
						endif;?>
	
					</div>
				
			</div>

		

		<div class="navbar-nav ml-auto">
			<div id="right-nav">
				<div id="container-search">		
					<div id="sb-search" class="sb-search">
						<form id="search-bar-top" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<input class="sb-search-input" placeholder="<?php _e( 'Enter your search term...', 'geoformat' ); ?>" type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"><ion-icon name="search"></ion-icon></span>
						</form>
					</div>
				</div>
				
				<div id="search-resp"><ion-icon name="search"></ion-icon></div>
			</div>
		</div>
	</div>
</nav>

<div id="sousmenu">
	<?php if(get_header_image() ): ?>
		<div class="header_image">
			<a href="<?php echo get_site_url(); ?>"><img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>"></a>
		</div>
	<?php endif; ?>
	<h1><a href="<?php echo get_site_url(); ?>"><span><?php bloginfo('name'); ?></span></a></h1>
	<h2><a href="<?php echo get_site_url(); ?>"><span><?php bloginfo('description'); ?></span></a></h2>
</div>
  
<div id="search-resp-ext">
	<form id="search-bar-top" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input class="sb-search-input" placeholder="<?php _e( 'Enter your search term...', 'geoformat' ); ?>" type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" name="search" id="search">
								
		<button type="submit" class="btn">OK</button>
	</form>
</div>
  
<div id="barresep"></div>