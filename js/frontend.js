/**
 * GeoProjects Frontend Javascript
 *
 * @package GeoProjects
 */

/*! Respond.js v1.4.2: min/max-width media query polyfill
 * Copyright 2014 Scott Jehl
 * Licensed under MIT
 * http://j.mp/respondjs */

!function(a){"use strict";a.matchMedia=a.matchMedia||function(a){var b,c=a.documentElement,d=c.firstElementChild||c.firstChild,e=a.createElement("body"),f=a.createElement("div");return f.id="mq-test-1",f.style.cssText="position:absolute;top:-100em",e.style.background="none",e.appendChild(f),function(a){return f.innerHTML='&shy;<style media="'+a+'"> #mq-test-1 { width: 42px; }</style>',c.insertBefore(e,d),b=42===f.offsetWidth,c.removeChild(e),{matches:b,media:a}}}(a.document)}(this),function(a){"use strict";function b(){v(!0)}var c={};a.respond=c,c.update=function(){};var d=[],e=function(){var b=!1;try{b=new a.XMLHttpRequest}catch(c){b=new a.ActiveXObject("Microsoft.XMLHTTP")}return function(){return b}}(),f=function(a,b){var c=e();c&&(c.open("GET",a,!0),c.onreadystatechange=function(){4!==c.readyState||200!==c.status&&304!==c.status||b(c.responseText)},4!==c.readyState&&c.send(null))},g=function(a){return a.replace(c.regex.minmaxwh,"").match(c.regex.other)};if(c.ajax=f,c.queue=d,c.unsupportedmq=g,c.regex={media:/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi,keyframes:/@(?:\-(?:o|moz|webkit)\-)?keyframes[^\{]+\{(?:[^\{\}]*\{[^\}\{]*\})+[^\}]*\}/gi,comments:/\/\*[^*]*\*+([^/][^*]*\*+)*\//gi,urls:/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,findStyles:/@media *([^\{]+)\{([\S\s]+?)$/,only:/(only\s+)?([a-zA-Z]+)\s?/,minw:/\(\s*min\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/,maxw:/\(\s*max\-width\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/,minmaxwh:/\(\s*m(in|ax)\-(height|width)\s*:\s*(\s*[0-9\.]+)(px|em)\s*\)/gi,other:/\([^\)]*\)/g},c.mediaQueriesSupported=a.matchMedia&&null!==a.matchMedia("only all")&&a.matchMedia("only all").matches,!c.mediaQueriesSupported){var h,i,j,k=a.document,l=k.documentElement,m=[],n=[],o=[],p={},q=30,r=k.getElementsByTagName("head")[0]||l,s=k.getElementsByTagName("base")[0],t=r.getElementsByTagName("link"),u=function(){var a,b=k.createElement("div"),c=k.body,d=l.style.fontSize,e=c&&c.style.fontSize,f=!1;return b.style.cssText="position:absolute;font-size:1em;width:1em",c||(c=f=k.createElement("body"),c.style.background="none"),l.style.fontSize="100%",c.style.fontSize="100%",c.appendChild(b),f&&l.insertBefore(c,l.firstChild),a=b.offsetWidth,f?l.removeChild(c):c.removeChild(b),l.style.fontSize=d,e&&(c.style.fontSize=e),a=j=parseFloat(a)},v=function(b){var c="clientWidth",d=l[c],e="CSS1Compat"===k.compatMode&&d||k.body[c]||d,f={},g=t[t.length-1],p=(new Date).getTime();if(b&&h&&q>p-h)return a.clearTimeout(i),i=a.setTimeout(v,q),void 0;h=p;for(var s in m)if(m.hasOwnProperty(s)){var w=m[s],x=w.minw,y=w.maxw,z=null===x,A=null===y,B="em";x&&(x=parseFloat(x)*(x.indexOf(B)>-1?j||u():1)),y&&(y=parseFloat(y)*(y.indexOf(B)>-1?j||u():1)),w.hasquery&&(z&&A||!(z||e>=x)||!(A||y>=e))||(f[w.media]||(f[w.media]=[]),f[w.media].push(n[w.rules]))}for(var C in o)o.hasOwnProperty(C)&&o[C]&&o[C].parentNode===r&&r.removeChild(o[C]);o.length=0;for(var D in f)if(f.hasOwnProperty(D)){var E=k.createElement("style"),F=f[D].join("\n");E.type="text/css",E.media=D,r.insertBefore(E,g.nextSibling),E.styleSheet?E.styleSheet.cssText=F:E.appendChild(k.createTextNode(F)),o.push(E)}},w=function(a,b,d){var e=a.replace(c.regex.comments,"").replace(c.regex.keyframes,"").match(c.regex.media),f=e&&e.length||0;b=b.substring(0,b.lastIndexOf("/"));var h=function(a){return a.replace(c.regex.urls,"$1"+b+"$2$3")},i=!f&&d;b.length&&(b+="/"),i&&(f=1);for(var j=0;f>j;j++){var k,l,o,p;i?(k=d,n.push(h(a))):(k=e[j].match(c.regex.findStyles)&&RegExp.$1,n.push(RegExp.$2&&h(RegExp.$2))),o=k.split(","),p=o.length;for(var q=0;p>q;q++)l=o[q],g(l)||m.push({media:l.split("(")[0].match(c.regex.only)&&RegExp.$2||"all",rules:n.length-1,hasquery:l.indexOf("(")>-1,minw:l.match(c.regex.minw)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:l.match(c.regex.maxw)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}v()},x=function(){if(d.length){var b=d.shift();f(b.href,function(c){w(c,b.href,b.media),p[b.href]=!0,a.setTimeout(function(){x()},0)})}},y=function(){for(var b=0;b<t.length;b++){var c=t[b],e=c.href,f=c.media,g=c.rel&&"stylesheet"===c.rel.toLowerCase();e&&g&&!p[e]&&(c.styleSheet&&c.styleSheet.rawCssText?(w(c.styleSheet.rawCssText,e,f),p[e]=!0):(!/^([a-zA-Z:]*\/\/)/.test(e)&&!s||e.replace(RegExp.$1,"").split("/")[0]===a.location.host)&&("//"===e.substring(0,2)&&(e=a.location.protocol+e),d.push({href:e,media:f})))}x()};y(),c.update=y,c.getEmValue=u,a.addEventListener?a.addEventListener("resize",b,!1):a.attachEvent&&a.attachEvent("onresize",b)}}(this);

/**
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/

(function( $ ){

  "use strict";

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null,
      ignore: null,
    };

    if(!document.getElementById('fit-vids-style')) {
      // appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
      var head = document.head || document.getElementsByTagName('head')[0];
      var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
      var div = document.createElement('div');
      div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
      head.appendChild(div.childNodes[1]);
    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']",
        "iframe[src*='youtube.com']",
        "iframe[src*='youtube-nocookie.com']",
        "iframe[src*='kickstarter.com'][src*='video.html']",
        "object",
        "embed"
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var ignoreList = '.fitvidsignore';

      if(settings.ignore) {
        ignoreList = ignoreList + ', ' + settings.ignore;
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not("object object"); // SwfObj conflict patch
      $allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

      $allVideos.each(function(){
        var $this = $(this);
        if($this.parents(ignoreList).length > 0) {
          return; // Disable FitVids on this video.
        }
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
        {
          $this.attr('height', 9);
          $this.attr('width', 16);
        }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );



/**
 * Init navigation menu for mobile
 */
function gpInitSmallNavigation() {

	var nav = document.getElementById( 'site-navigation' ), button, menu;
	if ( ! nav )
		return;
	button = nav.getElementsByTagName( 'h3' )[0];
	menu   = nav.getElementsByTagName( 'ul' )[0];
	if ( ! button )
		return;

	// Hide button if menu is missing or empty.
	if ( ! menu || ! menu.childNodes.length ) {
		button.style.display = 'none';
		return;
	}

	button.onclick = function() {
		if ( -1 == menu.className.indexOf( 'nav-menu' ) )
			menu.className = 'nav-menu';

		if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
			button.className = button.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( ' toggled-on', '' );
		} else {
			button.className += ' toggled-on';
			menu.className += ' toggled-on';
		}
	};

}


/**
 * Init Projects List navigation
 */
function gpInitProjectsList() {

    var projectsListMore = jQuery( '.projects-list-more' );

    if ( projectsListMore.length > 0 ) {

        projectsListMore.on( 'click', 'a', function(e){
            e.preventDefault();
            var curLink = jQuery( this );
            var divElt = curLink.parents( '#projects-list' );
            divElt.find( 'li:visible' ).css( 'display', 'block' );
            divElt.find( 'li:hidden' ).each( function( index ){
                var curElt = jQuery( this );
                var delay = 50;
                setTimeout( function(){
                    curElt.css( 'display', 'block' );
                }, delay * index );
            });
            //divElt.find( 'li' ).css( 'display', 'block' );
            projectsListMore.hide();
        });

    }

}


/**
 * Init maps
 */
function gpInitMaps() {
    var gpMaps = jQuery( '.gp-leaflet-map' );

    if ( gpMaps.length > 0 ) {
        gpMaps.gpLeafletMap();
    }
}


/**
 * DOM Ready
 */
jQuery(document).ready(function($) {
	
	// Init navigation menu for mobile
	gpInitSmallNavigation();

    // Init Projects list
    gpInitProjectsList();

    // Init maps
    gpInitMaps();

	// Init FitVid.js
	$( '#main' ).fitVids({ customSelector: "iframe[src^='http://www.dailymotion.com']" });
	
	$('body').removeClass('wp-embed-responsive');
	
	//Hide search input text
	jQuery("input").each(function() {
		jQuery(this).data('holder',jQuery(this).attr('placeholder'));
			
			jQuery(this).focusin(function(){
    			jQuery(this).attr('placeholder','');
						if ($(window).width() > 850){
						$('#ico-search').css('display','none');
						$('#topsearch').css('display','block');
						}
			});
			
			jQuery(this).focusout(function(){
    			jQuery(this).attr('placeholder',jQuery(this).data('holder'));
			});
	});
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 150) {
			$('#up').fadeIn(1200);
		}
		else {
			$('#up').fadeOut(800);
		}
		
		if ($(window).width() <= 380){
			if ($(this).scrollTop() > 50) {
				$('#social-top').hide();	
			} else {
				$('#social-top').show();	
			}
		}		
	});	
	
	if ($(window).width() >= 565){
		var maxHeightb = 0;
		
		$('.loop-projet .card-text').each(function(){
		   var thisHb = $(this).height();
		   if (thisHb > maxHeightb) { maxHeightb = thisHb; }
		});
		
		$('.loop-projet .card-text').height(maxHeightb);
	}
	
	
	$('#up').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	$('#annee').click( function() { 
		$('#drop').slideToggle();
	});

	$('.home .gp-leaflet-map-container').mouseenter(function() {
		$('.show-fig').hide();
		$('.home .gp-leaflet-map-container').fadeIn();
		$(this).hide().stop();
		$(this).parent().find(".show-fig").fadeIn();
	});
	
	$('.home .effeckt-caption').mouseenter(function() {
		$('.show-fig').hide();
		$('.home .gp-leaflet-map-container').fadeIn();
	});
	
	$('#liste').mouseenter(function() {
		$('.show-fig').hide();
		$('.home .gp-leaflet-map-container').fadeIn();
	});
	$('.navbar').mouseenter(function() {
		$('.show-fig').hide();
		$('.home .gp-leaflet-map-container').fadeIn();
	});
	$('#sousmenu').mouseenter(function() {
		$('.show-fig').hide();
		$('.home .gp-leaflet-map-container').fadeIn();
	});
	$('footer').mouseenter(function() {
		$('.show-fig').hide();
		$('.home .gp-leaflet-map-container').fadeIn();
	});
	

	$('iframe').load( function () {
        $('this').contents().find("leaflet-control-container").css('display', 'none');
    });
	
	$('#burger').click( function() { 
		$("#menu").animate({"left":"264px"}, "slow");
		$('#burger').hide();
		$('#close').fadeIn();
		$('#search-resp-ext').slideUp();
		$('#overlay').fadeIn();
	});
	
	$('#close').click( function() { 
		$("#menu").animate({"left":"-264px"}, "slow");
		$('#close').hide();
		$('#burger').fadeIn();
		$('#overlay').fadeOut();
	});
	
	$('.sb-icon-search').click( function() { 
		$("#menu").animate({"left":"-264px"}, "slow");
		$('#close').hide();
		$('#burger').fadeIn();
		$('#overlay').fadeOut();
	});
	
	$('#search-resp').click( function() { 
		$("#menu").animate({"left":"-264px"}, "slow");
		$('#search-resp-ext').slideToggle();
		$('#close').hide();
		$('#burger').fadeIn();
		$('#overlay').fadeOut();
	});
	
	var highestBox = 0;
        $('.search-list').each(function(){  
                if($(this).height() > highestBox){  
                highestBox = $(this).height() -10;  
        }
    });    
    $('.search-list img').height(highestBox);
	$( document ).keydown( function( e ) {
		var url = false;
		if ( e.which == 37 ) {  // Left arrow key code
			url = $( '.previous-image a' ).attr( 'href' );
		}
		else if ( e.which == 39 ) {  // Right arrow key code
			url = $( '.entry-attachment a' ).attr( 'href' );
		}
		if ( url && ( !$( 'textarea, input' ).is( ':focus' ) ) ) {
			window.location = url;
		}
	} );
});


/*!
 * IE10 viewport hack for Surface/desktop Windows 8 bug
 * Copyright 2014-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

// See the Getting Started docs for more information:
// http://getbootstrap.com/getting-started/#support-ie10-width

(function () {
  'use strict';
  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style');
    msViewportStyle.appendChild(
      document.createTextNode(
        '@-ms-viewport{width:auto!important}'
      )
    );
    document.querySelector('head').appendChild(msViewportStyle);
  }
})();