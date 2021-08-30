<?php
/**
 * Template : Help - Credits
 */
?>

<div id="page_help" class="wrap" style="max-width:900px!important;">

	<h1><?php _e('FAQ - Help','geoformat'); ?></h1>
	
	<h2 class="nav-tab-wrapper">
			 <a href="#" class="nav-tab navtab1 active1"><?php _e( 'FAQ', 'geoformat' ); ?></a>	 
			 <a href="#" class="nav-tab navtab2 active2"><?php _e( 'Réglez vos Géoformats', 'geoformat' ); ?></a> 	 
			 <a href="#" class="nav-tab navtab3 active3"><?php _e( 'Cartes disponibles', 'geoformat' ); ?></a> 	 
			 <a href="#" class="nav-tab navtab4 active4"><?php _e( 'Credits', 'geoformat' ); ?></a> 	 
	</h2>
  
	<div id="tab1" class="ui-sortable meta-box-sortables">
		
		<h3>
			<?php _e( 'How the contents are organized?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<?php _e( 'The GeoProjects Wordpress theme adds 4 content types : Projects, Maps, Markers and Geoformats.', 'geoformat' ); ?>
			</p>
			<p>
				<?php _e( 'A Map contain markers and can be associated to a Project. You can also associate Geoformats as well as the traditionnals WordPress posts to Projects.', 'geoformat' ); ?>
			</p>
			<p>
				<?php _e( 'Markers can contain text, images, sound or video (and a mix of them), and you can provide you own icons to show up on the maps.', 'geoformat' ); ?>
			</p>
		</div>
		
		<h3>
		<?php _e('Why does nothing appear on the homepage?', 'geoformat'); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<?php _e('Do not panic ! This is linked to the "Show as homepage" option, which allows you to better control the content displayed. Just edit the items, maps, or geoformats you want to appear, check the ad hoc box and save them as is.', 'geoformat'); ?>
			</p>
		</div>
	
	
		<h3>
			<?php _e( 'How does Geoproject works?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/process.png" alt="Processus Géoformat" style="max-width:100%!important;height:auto;">
		</div>
		<h3>
			<?php _e( 'What is Geoformat?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<?php _e( 'The post type Geoformat permits you to create longform contents. Each new section is introduced with a title and a background map or a background image or a background video. The edit zones are well specified. A field not filled won\'t be displayed. The "subline" filed is used to display an abstract of the document on the front-pages and is also used for metadata (OpenGraph, Twitter Card and Dublin Core).', 'geoformat' ); ?>
			</p>
			
			<p>
				<?php _e('You can create photo galleries or use third parties plugins to add graphical dynamic contents. The "Formats" button, available above each edit zone, permits you to create frames, dropcaps and buttons. ', 'geoformat' ); ?>
			</p>
			
			<p>
				<strong><?php _e( 'The official documentation of the original plugin can be found', 'geoformat' ); ?>
				<a href="https://journodev.tech/?s=simple+long+form&submit=ok" target="_blank">
				<?php _e( 'on the website of the plugin\'s author.', 'geoformat' ); ?>
				</a></strong>
			</p>
		</div>

		<h3>
			<?php _e( 'What is the big Map Page?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
		<p>
			<?php _e( 'The GeoProjects theme comes with a special page showing all Markers of all Maps.', 'geoformat' ); ?>
		</p>

		<p>
			<?php _e( 'To use it, create a new Page, and set its "Model" to "Big Map". You can then add this page to your menu.', 'geoformat' ); ?>
		</p>
	</div>
	
		<h3>
			<?php _e( 'Which widgets are used?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<?php _e( 'This theme has a Widgets zone in the footer, where you can add any of them. There is a specific widget for Geoformats, if you wish to display the  list of the last longform publications.', 'geoformat' ); ?>
			</p>
		</div>
		
		<h3>
			<?php _e( 'Why Stadia maps are not displaying?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<?php _e( 'To display a stadia map, you have to sign up to <a href="https://client.stadiamaps.com/signup/" target="_blank">Stadia Maps</a> and to whitelist your domain name (if you are not using geoprojet.fr).', 'geoformat' ); ?>
			</p>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/stadiainfo.png" alt="Stadia Info" style="max-width:100%!important;height:auto;">			
		</div>
		
		<h3>
			<?php _e( 'Why is the overlaid image not displayed correctly?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<?php _e('The functionality of adding an image to a map is experimental. If this does not pose any display problem when the option is to replace the geographic basemap with an image, it is not always the same for displaying an overlaid image which requires defining a positioning via two latitudes and two longitudes. <a href="https://leafletjs.com/reference-1.6.0.html#imageoverlay" target="_blank"> Documentation is available here </a>. How to find geographic coordinates? <a href="https://www.latlong.net/" target="_blank"> Go here </a>. In addition, it is possible that the rendering is not optimal when zooming in and out on the map.','geoformat'); ?>
			</p>
		</div>
		
		<h3>
			<?php _e( 'How to set up printing options ?', 'geoformat' ); ?>
		</h3>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<a href="admin.php?page=print-settings"><?php _e( 'All of the documentation will be found on this page.', 'geoformat' ); ?></a> 
				<?php echo __('Please, read the "About" section before starting to set up.', 'geoformat'); ?>
			</p>
		</div>
	
	</div>
	
	<div id="tab2" class="ui-sortable meta-box-sortables">
		
		<h2 style="font-size:22px;margin:25px 0;"><?php _e('General principles','geoformat'); ?></h2>
		
		<ul style="list-style-type:square;padding-left:22px!important;font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<li><?php _e('No field is required: an unfilled field will not be displayed.','geoformat'); ?></li>
			<li><?php _e('One exception is the "subtitle" field, this text is used for description metadata as well as for sharing on social networks.','geoformat'); ?></li>
			<li><?php _e('Image formats at the top of section: 1400px wide x 777px high. The display of the image in full page will depend on the size of the screen.','geoformat'); ?></li>
			<li><?php _e('As a simple article, Geoformat accepts labels, categories, and  featured image (this is used to display Geoformats on the home page and in category pages)..','geoformat'); ?></li>
			<li><?php _e('As a classic article, editing allows WYSIWYG formatting as well as the insertion of multimedia elements.','geoformat'); ?></li>
		</ul>
		
		<h3 style="font-size:22px;margin:25px 0;"><?php _e('Sidebar Settings','geoformat'); ?></h3>
		
		<h4 style="font-size:20px;color:#696969;margin-bottom:10px;"><?php _e('General:','geoformat'); ?></h4>
			<ul style="list-style-type:square;padding-left:12px;font-size:1.1em;">
				<li><?php _e('Text size','geoformat'); ?></li>
				<li><?php _e('Width of the central column','geoformat'); ?></li>
				<li><?php _e('Border style for blockquotes','geoformat'); ?></li>
			</ul>
		<h4 style="font-size:20px;color:#696969;margin-bottom:10px;"><?php _e('Intro:','geoformat'); ?></h4>
			<ul style="list-style-type:square;padding-left:12px;font-size:1.1em;">
				<li><?php _e('Display the author\'s name in the loading intro','geoformat'); ?></li>
				<li><?php _e('Choice of the loader for loading (circle, by default)','geoformat'); ?></li>
				<li><?php _e('Animation of the loader to its disappearance','geoformat'); ?></li>
				<li><?php _e('Geoformat intro effect','geoformat'); ?></li>
				<li><?php _e('Style of the  "trigger" button (permits to pass from the full screen introduction to the contents)','geoformat'); ?></li>
			</ul>
		<h4 style="font-size:20px;color:#696969;margin-bottom:10px;"><?php _e('Navigation:','geoformat'); ?></h4>
			<ul style="list-style-type:square;padding-left:12px;font-size:1.1em;">
				<li><?php _e('Position of the progress bar or deactivation of this function','geoformat'); ?></li>
				<li><?php _e('Position and style of the fixed navigation bar (header or footer, background color, Geoformat title or not, intrapage navigation methode - via the hamburger drop-down menu - and appearance of social network icons)','geoformat'); ?></li>
			</ul>
			
		</div>
	
	<div id="tab3" class="ui-sortable meta-box-sortables">
		
		<h2 style="font-size:22px;margin:25px 0;"><?php _e('Maps catalog', 'geoformat'); ?></h2>
		
		<div style="font-size:1.15em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<?php _e('23 map styles are available, including MapBox. You will find below the map catalog. The default basemap is "OpenStreetMap". If you wish to add your own MapBox style, you will have to fill the access token field in the setting page','geoformat'); ?>
		</div>
		
		<h4 style="font-size:1.4em;">OpenStreetMap<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/osm.png" alt="OpenStreetMap" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">CyclOSM<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/cyclosm.png" alt="OpenMapSurfer.Roads" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Esri WorldGrayCanvas<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/esrigrey.png" alt="OpenMapSurfer.Grayscale" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Esri WorldStreetMap<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/esristreet.png" alt="Esri WorldStreetMap" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Esri WorldImagery<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/esriworld.png" alt="Esri WorldImagery" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">OpenTopoMap<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/opentopo.png" alt="OpenTopoMap" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">OpenStreetMap.HOT<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/osmhot.png" alt="OpenTopoMap" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Hydda Full<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/hydda.png" alt="Hydda Full" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Esri.Shaded.Relief<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/worldimagery.png" alt="Esri.Shaded.Relief" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;"> Esri.DeLorme<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/delorme.png" alt=" Esri.DeLorme" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Stadia Alida<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/stadialida.png" alt="Stadia Alida" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;"> Stadia Outdoors<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/outdoors.png" alt="Stadia Outdoors" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Stadia OSM Bright<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/stadiaosm.png" alt="Stadia OSM Bright" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;"> Stadia Dark<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/stadiadark.png" alt="Stadia Dark" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">MT Map<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/mtmap.png" alt="MT Map" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Stamen Toner<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/stamen.png" alt="Stamen Toner" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Stamen Light<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/stamenlight.png" alt="Stamen Light" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Stamen Watercolor<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/watercolor.png" alt="Stamen Watercolor" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Stamen Terrain<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/terrain.png" alt="Stamen Terrain" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Geoportail FR<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/geoportail.png" alt="Geoportail FR" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Geoportail IMG<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/geoportailimg.png" alt="Geoportail IMG" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">Geoportail Orthos<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/geoportailorthos.png" alt="Geoportail Orthos" style="max-width:100%!important;height:auto;">
		
		<h4 style="font-size:1.4em;">MapBox<h4>
			<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/img/mapbox.png" alt="MapBox" style="max-width:100%!important;height:auto;">
		
	</div>
	
	<div id="tab4" class="ui-sortable meta-box-sortables">
		<h2>
			<?php _e( 'Credits - License', 'geoformat' ); ?>
		</h2>
		
		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p>
				<?php
				printf(
					__( 'This Wordpress theme has been developped by %1$s and funded by the %2$s. The 2.0 version, which includes the Geoformat post type, is developed by Laurence Dierickx (%3$s), from the original plugin Simple Long Form, developed as an open source software for WordPress. She continued this work for version 3 of this theme, which she entirely reviewed in this fourth version, enriched with many features).', 'geoformat' ),
					'<a href="http://labomedia.org" target="_blank">Labomedia</a>',
					'<a href="http://bibliotheque.nimes.fr" target="_blank">Carré d\'Art Bibliothèques de Nîmes</a>',
					'<a href="http://www.journodev.tech" target="_blank">journodev.tech</a>'
				);
				?>
			</p>

			<p>
				<?php
				printf(
					__( 'Released under the GPL v.2 license, you can download this theme on %1$s. Please, feel free to report bugs and submit fixes or new features !', 'geoformat' ),
					'<a href="https://github.com/Labomedia/lm-maps-manager">GitHub</a>'
				); ?>
			</p>
		</div>
	</div>
</div>