<?php
//Additionnal tools for shortcodes

//Shortcodes

function gp_ion_shortcode( $atts ) {
  extract( shortcode_atts( array( 'icon' => 'home', ), $atts ) );
  return '<i class="ion ion-'.str_replace('ion-','',$icon).'"></i>';
}
add_shortcode( 'icon', 'gp_ion_shortcode' );

function gp_iframe($atts, $content) {
	if (!$atts['width']) { $atts['width'] = 600; }
	if (!$atts['height']) { $atts['height'] = 400; }
	return '<iframe border="0" class="shortcode_iframe" src="' . $atts['src'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '"></iframe>';
}
add_shortcode('iframe', 'gp_iframe');

add_filter('wp_nav_menu_items', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_filter('widget_title', 'do_shortcode');

//Page with shortoce generators

add_action( 'admin_menu', 'tools_admin_menu' );
add_action( 'admin_init', 'tools_global_fields' );


function tools_admin_menu(){
	$page_title = __('Toolbox', 'geoformat'); 
	$menu_title = __('Toolbox', 'geoformat'); 
	$capability = 'manage_options'; 
	$menu_slug= 'toolbox'; 
	$function = 'tools_page';
	$icon_url = 'dashicons-media-code'; 
	$position = 35;
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

//Settings 
function tools_global_fields() { 

	register_setting( 'tools_global_options', 'tools_settings' );

	add_settings_section(
		'tools_settings_section', 
		__( 'Additional tools', 'geoformat' ), 
		'tools_settings_call', 
		'tools_global_options'
	);
}
	
function tools_page() { 
?>

<div id="page_help" class="wrap" style="max-width:900px!important;">
	<h1><?php _e('Toolbox','geoformat'); ?></h1>
	
	<h2 class="nav-tab-wrapper">
			 <a href="#" class="nav-tab navtab1 active1"><?php _e( 'Tools', 'geoformat' ); ?></a>	 
			 <a href="#" class="nav-tab navtab2 active2"><?php _e( 'Icon generator', 'geoformat' ); ?></a> 	 
			 <a href="#" class="nav-tab navtab3 active3"><?php _e( 'Embed contents', 'geoformat' ); ?></a> 	 	 
			 <a href="#" class="nav-tab navtab4 active4"><?php _e( 'Knight Lab', 'geoformat' ); ?></a> 	 	 
	</h2>
  
	<div id="tab1" class="ui-sortable meta-box-sortables">
		<h2><?php _e( 'Additional tools to enhance your stories', 'geoformat' ); ?></h2>

		<div style="font-size:1.1em;border:1px dotted #686868;background:#FFFFFF;padding:10px;">
			<p style="font-size:15px!important;color:black!important;">
			Cette boîte à outils vous permet d'ajouter, de manière simple, des contenus réalisés sur d'autres plateformes en 
			ligne en transformant le code d'intégration du prestataire de services (fourni sous la forme d'un "iframe") par un shortcode à copier puis à coller dans la zone d'édition 
			de WordPress (qu'il s'agisse d'une carte, d'un projet, d'un marqueur, d'un article, d'une page ou d'un géoformat).
			<br/>
			<br/>
			Ex. : &lt;iframe src="https://moncontenuheberge.com" height="500" width="500" /&gt; va devenir : [iframe src="https://moncontenuheberge.com" width="600" height="400"] 
			<br/>
			<br/>
			<strong>La différence ne s'arrête pas à la seule forme : cela vous évite de devoir passer en mode d'édition HTML (le langage du web),
			et vous permet donc de rester dans la zone d'édition habituelle d'un contenu (mode visuel).</strong>
			</p>
			<hr/>
			<p style="font-size:15px!important;color:black!important;">
			Cette boîte à outils vous permet également d'intégrer des icônes dans vos contenus, <a href="https://openclassrooms.com/fr/courses/1891206-propulsez-votre-site-avec-wordpress/1892651-les-shortcodes" target="_blank" rel="noopener">via la création de shortcodes</a>. 
			<br/>
			<br/>
			Ex. :  [icon icon="ion-md-folder"] affichera l'icône d'un petit répertoire et  [icon icon="ion-md-airplane"] affichera un petit avion.
			</p>
			
			<p style="font-size:15px!important;color:black!important;">
			Enfin, elle vous présente six outils développés dans un contexte journalistique par le Knight Lab de la Northwestern University (Etats-Unis), qui permettent d'enrichir vos histoires de contenus interactifs.
			</p>
			<p style="background:#D91E18;padding:10px;font-size:1.1em;color:#FFFFFF;margin:30px 0 15px 0;"><strong>Les outils proposés consistent en une aide à la réalisation de vos shortcodes.</strong>
			</p>
			
		</div>
	</div>
	
	<div id="tab2" class="ui-sortable meta-box-sortables">
		<div class="pane">
		
		<h1>Générateur de shortcode pour une icône</h1>
		
		 <label>Nom de l'îcone</label>
		 <input id="input" 
           type="text" 
           class="Disable" 
           value="" /> 
		  <label>Style de l'îcone</label>
			 <select id="check">
			  <option value="ion-md-">Material Style</option>
			  <option value="ion-ios-">IOS Style</option>
			  <option value="ion-logo-">Logo</option>
			</select> 
			
			<br> 
			<br> 
			<button id="setText"> 
				Envoyer
			</button>

			<div id="iconshortcode">
				<h1>
					<strong>Shortcode à copier-coller : </strong> 
					
					<span id="short"> 
						
					</span>
				
				</h1>			
			</div>
			
			<div id="preview1">
				<h1>Prévisualisation : <span id="preview"> </span> </h1> 
				
			</div>
			
			<script> 
				jQuery(document).ready(function($) {
				//Shortcode generator
					$("#setText").click(function(event) { 
						var shortcode = $('#input').val();
						var style = $('#check').val();
						$('#input').val(shortcode); 
						$('#iconshortcode').show();
						$('#preview1').show();
						$('#short').empty();
						$('#short').append('[icon icon=&quot;' + style + shortcode + '&quot;]');
						$('#preview').html('<i class="ion ' + style + shortcode + '"></i>');	
					}); 
				}); 
			</script> 
			
			<div style="text-align:left!important;font-size:1.2em!important;margin-top:50px;">
			<h3>La bibliothèque d'icônes utilisée est celle de Ionicons (version 4.5) :</h3> 
			<p style="font-size:15px!important;color:black!important;">
			+ <a href="https://ionicons.com/cheatsheet.html" rel="noopener" target="_blank">Voir la liste d'icônes disponibles</a>
			<br/>
			<br/>
			+ <a href="https://ionicons.com/" rel="noopener" target="_blank">Rechercher une icône de manère interactive</a>
			</p>
			<br/>
			<p style="background:#F7F7F8;padding:10px;">
				add - add-circle - add-circle-outline - airplane - alarm - albums - alert - american-football - analytics - aperture - apps - appstore - archive - arrow-back - arrow-down - arrow-dropdown - arrow-dropdown-circle - arrow-dropleft - arrow-dropleft-circle - arrow-dropright - arrow-dropright-circle - arrow-dropup - arrow-dropup-circle - arrow-forward - arrow-round-back - arrow-round-down - arrow-round-forward - arrow-round-up - arrow-up - at - attach - backspace - barcode - baseball - basket - basketball - battery-charging - battery-dead - battery-full - beaker - bed - beer - bicycle - bluetooth - boat - body - bonfire - book - bookmark - bookmarks - bowtie - briefcase - browsers - brush - bug - build - bulb - bus - business - cafe - calculator - calendar - call - camera - car - card - cart - cash - cellular - chatboxes - chatbubbles - checkbox - checkbox-outline - checkmark - checkmark-circle - checkmark-circle-outline - clipboard - clock - close - close-circle - close-circle-outline - cloud - cloud-circle - cloud-done - cloud-download - cloud-outline - cloud-upload - cloudy - cloudy-night - code - code-download - code-working - cog - color-fill - color-filter - color-palette - color-wand - compass - construct - contact - contacts - contract - contrast - copy - create - crop - cube - cut - desktop - disc - document - done-all - download - easel - egg - exit - expand - eye - eye-off - fastforward - female - filing - film - finger-print - fitness - flag - flame - flash - flash-off - flashlight - flask - flower - folder - folder-open - football - funnel - gift - git-branch - git-commit - git-compare - git-merge - git-network - git-pull-request - glasses - globe - grid - hammer - hand - happy - headset - heart - heart-dislike - heart-empty - heart-half - help - help-buoy - help-circle - help-circle-outline - home - hourglass - ice-cream - image - images - infinite - information - information-circle - information-circle-outline - jet - journal - key - keypad - laptop - leaf - link - list - list-box - locate - lock - log-in - log-out - magnet - mail - mail-open - mail-unread - male - man - map - medal - medical - medkit - megaphone - menu - mic - mic-off - microphone - moon - more - move - musical-note - musical-notes - navigate - notifications - notifications-off - notifications-outline - nuclear - nutrition - open - options - outlet - paper - paper-plane - partly-sunny - pause - paw - people - person - person-add - phone-landscape - phone-portrait - photos - pie - pin - pint - pizza - planet - play - play-circle - podium - power - pricetag - pricetags - print - pulse - qr-scanner - quote - radio - radio-button-off - radio-button-on - rainy - recording - redo - refresh - refresh-circle - remove - remove-circle - remove-circle-outline - reorder - repeat - resize - restaurant - return-left - return-right - reverse-camera - rewind - ribbon - rocket - rose - sad - save - school - search - send - settings - share - share-alt - shirt - shuffle - skip-backward - skip-forward - snow - speedometer - square - square-outline - star - star-half - star-outline - stats - stopwatch - subway - sunny - swap - switch - sync - tablet-landscape - tablet-portrait - tennisball - text - thermometer - thumbs-down - thumbs-up - thunderstorm - time - timer - today - train - transgender - trash - trending-down - trending-up - trophy - tv - umbrella - undo - unlock - videocam - volume-high - volume-low - volume-mute - volume-off - walk - wallet - warning - watch - water - wifi - wine - woman
			</p>
			</div>
		</div>
	</div>
	
	<div id="tab3" class="ui-sortable meta-box-sortables">
	<div class="pane">
		
		<h1>Générateur de shortcode pour un contenu d'intégration <br/>(code &lt;iframe&gt;) </h1>
		
		<p style="font-size:15px!important;color:black!important;"><strong>Cet outil est réservé aux codes d'intégration provenant de sites extérieurs. 
		Le shortcode d'intégration de chaque carte créée se trouve sous cette carte.
		Il est préférable d'utiliser un plugin pour l'intégration de vidéos hébergées sur YouTube 
		(par exemple, <a href="https://fr.wordpress.org/plugins/youtube-widget-responsive/" target="_blank" rel="noopener">YouTube widget responsive</a>).</strong>
		</strong></p>
		
		 <label>Code iframe à convertir en shortcode</label>
		 <br/>
		 <input id="input2" 
           type="text" 
           class="Disable" 
           value="" /> 
			<br> 
			<br> 
			<button id="ok"> 
				Envoyer
			</button>

			<div id="iconshortcode2">
				<h1>
					<strong>Shortcode à copier-coller : </strong> 
					
					<span id="short2"> 
						
					</span>
				
				</h1>
				<h3 style="font-weight:normal!important;line-height:1.4;">Un shortcode valide devrait ressembler à ceci :
				<br/>				
				[iframe src="https://moncontenuheberge.com" width="600" height="400"]
				<br/> La hauteur (height) et la largeur (width) peuvent être modifiés.</h3>
			</div>
			
			<div id="prev2">
				<h1>Prévisualisation  </h1> 
				<div id="preview2"> </div>
			</div>
			
			<script> 
				jQuery(document).ready(function($) {
				//Shortcode generator
					$("#ok").click(function(event) { 
						var shortcode2 = $('#input2').val();
						$('#input2').val(shortcode2); 
						$('#short2').empty();
						$('#preview2').empty();
						$('#prev2').show();
						$('#iconshortcode2').show();
						var iframe = shortcode2.split('src="');
						var iframe2 = iframe[1].split('"');
						$('#short2').html('[iframe src="' + iframe2[0] + '" width="600" height="400"]');
						$('#preview2').html(shortcode2);
					}); 
				}); 
			</script> 
			
		</div>
	</div>
	
	<div id="tab4" class="ui-sortable meta-box-sortables">
		<div class="pane">
			<h1>Outils du Knight Lab</h1>
			
			<p style="font-size:16px!important;color:black!important;">
			<strong>
			Le Knight Lab de la Northwestern University (USA) consiste en une communauté de concepteurs, de développeurs, 
			d'étudiants et d'éducateurs travaillant sur des outils destinés à appuyer des formats journalistiques innovants.
			</strong>
			</p>
			
			<div style="text-align:left!important;font-size:1.2em!important;">
			<h2 style="margin-top:35px;">1. JuXtapose</h2>
			<p style="font-size:15px!important;color:black!important;">
			Le principe de cet outil est de proposer deux photographies d'un même lieu, prises à une époque différente. Les images doivent être obligatoirement hébergées sur une plateforme en ligne, 
			par exemple sur ce site. Pour ce faire, rendez-vous dans l'onglet "Médias", ajoutez un média (pour WP, une image, un son ou tout autre document est un média). A l'issue du chargement, 
			cliquez sur l'icône du média et copiez-collez l'adresse du média (URL commençant par http....).
			</p>
			<p style="font-size:15px!important;color:black!important;">
			<strong>Pour créer un "JuXtapose", rendez-vous à cette adresse et suivez les instructions :</strong> 
			<a href="https://juxtapose.knightlab.com/" target="_blank" rel="noopener">https://juxtapose.knightlab.com/</a>
			</p>
			<p style="font-size:15px!important;color:black!important;">
			Lorsque votre module est configuré, cliquez sur "Publish". Un code "embed" (commençant par &lt;iframe&gt;) sera automatiquement généré.
			Pour une intégration optimale, copiez-coller ce code dans le générateur de shortcode 
			(onglet "Contenus d'intégration", accessible depuis cette boîte à outils). Démo :
			</p>
			</div>
			
			<iframe style="margin:15px 0!important" frameborder="0" class="juxtapose" width="50%" height="240" src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=0d06c8b2-0b7a-11ea-b9b8-0edaf8f81e27"></iframe>
			
			<div style="text-align:left!important;font-size:1.2em!important;">
			<h2>2. Timeline</h2>
			
			<p style="font-size:15px!important;color:black!important;">Cet outil permet de créer des lignes du temps interactives. Celles-ci sont automatiquement générées à partir d'une feuille de calcul réalisée dans "Google Sheet".
			Là aussi, il s'agit de suivre les instructions (simples et claires, mais en anglais) à l'écran. 
			</p>
			
			<p style="font-size:15px!important;color:black!important;">
			<strong>Pour créer une ligne du temps, rendez-vous à cette adresse et suivez les instructions :</strong> 
			<a href="http://timeline.knightlab.com/" target="_blank" rel="noopener">http://timeline.knightlab.com/</a>
			</p>
			
			<p style="font-size:15px!important;color:black!important;"> Après avoir cliqué sur le bouton "Publish", 
			un code d'intégration "embed" (commençant par &lt;iframe&gt;) sera automatiquement généré (étape 4).
			Pour une intégration optimale, copiez-coller ce code dans le générateur de shortcode (onglet "Contenus d'intégration", 
			accessible depuis cette boîte à outils). Démo : <a href="https://www.ohmybox.info/generation-automatique-de-textes-et-journalisme-une-ligne-du-temps/" target="_blank" rel="noopener">https://www.ohmybox.info/generation-automatique-de-textes-et-journalisme-une-ligne-du-temps/</a>
			</p>
			
			</div>
			
			<div style="text-align:left!important;font-size:1.2em!important;">
			<h2 style="margin-top:35px;">3. Soundcite</h2>
			
			<p style="font-size:15px!important;color:black!important;">Cet outil permet d'ajouter du son dans un texte publié. Chaque nouveau son doit obligatoirement être hébergé en ligne, 
			par exemple sur ce site (la procédure est identitique à celle de l'outil "JuXtapose").
			</p>
			
			<p style="font-size:15px!important;color:black!important;">
			<strong>Pour créer un "Soundcite", rendez-vous à cette adresse et suivez les instructions :</strong> 
			<a href="http://soundcite.knightlab.com/" target="_blank" rel="noopener">http://soundcite.knightlab.com/</a>
			</p>
			
			<p style="font-size:15px!important;color:black!important;"> 
			Seul le code fourni à la deuxième étape vous sera nécessaire (commençant par &lt;span&gt;). Ce code 
			doit être copié-collé directement dans votre contenu, mais en mode "Texte" (éditeur classique de WP) ou en mode 
			"Code" ou "HTML" (éditeur Gutenberg de WP). Ne vous préoccupez pas de la troisième étape de la procédure. Toutefois, 
			il ne faudra pas oublier de cocher la case "Activer Soundcite" via les réglages du thème ("Réglages Geoproject", 
			onglet "Récits et cartes").
			</p>
			
			<p style="font-size:15px!important;color:black!important;">
			Attention : vous ne pourrez pas visualiser l'écoute du son dans la zone d'édition de WordPress. Pour ce faire, vous devrez impérativement (pré)visualiser votre article, projet, carte, page, marqueur ou géoformat dans votre navigateur.
			</p>
			
			</div>
			
			<div style="text-align:left!important;font-size:1.2em!important;">
			<h2 style="margin-top:35px;">4. Storymap</h2>
			
			<p style="font-size:15px!important;color:black!important;">Cet outil permet de créer des récits cartographiques interactifs, en 
			créant un parcours où le texte dialogue avec une représentation géographique. Quelques conseils pour bien réussir une "Storymap" : 
			une diapositive par lieu d'histoire et pas plus de 20 diapositives par histoire pour rester efficace. L'intégration d'images, vidéos, 
			audios est également possible. Chaque "Storymap" est générée de manière automatique. Attention : il faut obligatoirement disposer d'un 
			compte Google pour accéder à l'outil. Un bouton "Options" permet de modifier la langue par défaut (anglais) et de choisir un fond de carte.
			D'autres options de personnalisation sont également disponibles, sous chaque module ("boîte") d'édition, par exemple pour choisir la couleur 
			d'arrière-plan du texte. L'outil est assez intuitif et accessible.
			</p>
			
			<p style="font-size:15px!important;color:black!important;">
			<strong>Pour créer une "Storymap", rendez-vous à cette adresse et suivez les instructions :</strong> 
			<a href="https://storymap.knightlab.com/" target="_blank" rel="noopener">https://storymap.knightlab.com/</a>
			</p>
			
			<p style="font-size:15px!important;color:black!important;"> Après avoir cliqué sur le bouton "Publish", 
			un code d'intégration "embed" (commençant par &lt;iframe&gt;) sera automatiquement généré. Ce code peut 
			être récupéré via le bouton "Share". Pour une intégration optimale, copiez-coller ce code dans le générateur de shortcode (onglet "Contenus d'intégration", 
			accessible depuis cette boîte à outils). Démo : <a href="https://storymap.knightlab.com/examples/aryas-journey/" target="_blank" rel="noopener">https://storymap.knightlab.com/examples/aryas-journey/</a>
			</p>
			
			</div>
			
			<div style="text-align:left!important;font-size:1.2em!important;">
			<h2>5. Storyline</h2>
			
			<p style="font-size:15px!important;color:black!important;">Cet outil permet de créer des visualisation de données interactives. 
			Comme pour l'outil "Timeline", celles-ci sont automatiquement générées à partir d'une feuille de calcul réalisée dans "Google Sheet".
			Là aussi, il s'agit de suivre les instructions (simples et claires, mais en anglais) à l'écran. 
			</p>
			
			<p style="font-size:15px!important;color:black!important;">
			<strong>Pour créer une "Storyline", rendez-vous à cette adresse et suivez les instructions :</strong> 
			<a href="http://storyline.knightlab.com/#make" target="_blank" rel="noopener">http://storyline.knightlab.com/#make</a>
			</p>
			
			<p style="font-size:15px!important;color:black!important;"> Après avoir cliqué sur le bouton "Publish", 
			un code d'intégration "embed" (commençant par &lt;iframe&gt;) sera automatiquement généré (étape 4).
			Pour une intégration optimale, copiez-coller ce code dans le générateur de shortcode (onglet "Contenus d'intégration", 
			accessible depuis cette boîte à outils). Démo :
			</p>
			
			</div>
			
			<iframe src="http://storyline.knightlab.com/from-example.html" style="width:100%;height:500px;" frameborder="0" marginwidth="0" marginheight="0"  vspace="0" hspace="0"></iframe>
			
			
			<div style="text-align:left!important;font-size:1.2em!important;">
			<h2>6. Scene</h2>
			
			<p style="font-size:15px!important;color:black!important;">Bienvenue dans le monde de la réalité virtuelle avec 
			"Scene", un outil qui transforme une collection de photos panoramiques en un diaporama de scènes permettant 
            de créer des récits à 360 degrés. Chaque photo peut être décrite et commentée. Quelques trucs et astuces : 
			chaque scène doit être envisagée dans le cadre d'un ensemble, les textes doivent rester courts et simples, 
			les images utilisées doivent être au format panoramique (ou 360°). Ici aussi, il faut disposer d'un compte 
			Google pour accéder à l'outil. 
			</p>
			
			<p style="font-size:15px!important;color:black!important;">
			<strong>Pour créer une "Scene", rendez-vous à cette adresse et suivez les instructions :</strong> 
			<a href="https://scene.knightlab.com/" target="_blank" rel="noopener">https://scene.knightlab.com/</a>. 
			Une démo est disponible via ce lien.
			</p>
			
			<p style="font-size:15px!important;color:black!important;"> Lorsqu'un nouveau projet est terminé, il faut cliquer sur la 
			flèche de partage située en haut à droite de la zone d'édition. Il faut alors copier 
			le code d'intégration "embed" (commençant par &lt;iframe&gt;). 
			Pour une intégration optimale, copiez-coller ce code dans le générateur de shortcode (onglet "Contenus d'intégration", 
			accessible depuis cette boîte à outils). 
			</p>
			
			</div>
		<div class="clear"></div>
		</div>
	</div>

</div>
<div class="clear"></div>
<?php } ?>