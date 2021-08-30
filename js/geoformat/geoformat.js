var $ = jQuery.noConflict();
$(document).ready(function() {
	$(window).scroll(function() {
	var h = $(document).height(); 
	var s = $(window).scrollTop(); 
	var w = $(window).height();   
	var t = (s / h) * w;var p = Math.ceil((s + t) / h * 110) + 1; 
	
	$('#gp-map-original-page').hide();
	
	$('#barre').width(p + '%');
			if ($(this).scrollTop() > 0) {
				$('#progression').show();
				$('.navbar').slideDown();
				$('.trigger').hide();
				
			} else {
				$('#progression').hide();
				$('.trigger').show();
				$('#side_nav').hide();
			}
			if ($(this).scrollTop() > 150) {
				$('#up').fadeIn(1200);
				$('#printpdf').fadeOut(1200);
			} 
			else {
				$('#up').fadeOut(800);
				$('#printpdf').fadeIn(1200);
			}
		});	
	$('.trigger').click(function(){
		$('#progression').show();
		$('.navbar').slideDown();
		$('.intro-effect-jam3 + .content').fadeIn(1000);
	});
	
	$('.loader').ClassyLoader({
		percentage: 100,
		speed: 20,
		fontSize: '20px',
		diameter: 40,
		lineColor: 'rgba(255,255,255, 0.8)',
		remainingLineColor: 'rgba(232, 232, 232, 0.6)',
		lineWidth: 10       
	});
	
	$('.togglenav').click(function(){
		$('#side_nav').slideToggle();
		$(this).toggleClass('open');
	});
	
	$('#side_nav a').click(function(){
		$('#side_nav').slideUp();
		$('.togglenav').removeClass('open');
	});
	
	$('#up').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	$('.scrollTo').click( function() { 
		var page = $(this).attr('href'); 
		var speed = 750; 
		$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); 
		return false;
	});
	
	$('[data-toggle="tooltip"]').tooltip(); 
	$('[data-toggle="popover"]').popover();
	
	$("body").scrollspy({
		target: "#side_nav",
		offset: 70
	});
		$('[data-spy="scroll"]').each(function(){
			var $spy = $(this).scrollspy('refresh');
		}); 
		
	$('.bg-img iframe').addClass('bgvideo');
	$('.chapitre iframe').addClass('bgvideo');
	$('iframe').addClass('videoWrapper'); 
	$('article iframe').addClass('mainvideo');
	
	var v = $('.mainvideo[src^="https://www.youtube.com/embed/"]');
    v.wrap("<div class='video-container'/>");

    var w = $('.mainvideo[src^="https://player.vimeo.com"]');
    w.wrap("<div class='video-container'/>");
	
	var x = $('.mainvideo[src^="//"]');
    x.wrap("<div class='timeWrapper'/>");
	
	var y = $('.mainvideo[src^="https://www.scribd"]');
    y.wrap("<div class='timeWrapper'/>");
	
	var z= $('.alwaysThinglink');
    z.wrap("<div class='timeWrapper'/>");
	
	var a=$('audio');
	a.wrap("<div class='audio'/>");
	
	$(".slf_carousel").carousel();
	
	$(".item").click(function() {
        $(".slf_carousel").carousel(1);
    }); 
	
	$(".left").click(function() {
        $(".slf_carousel").carousel("prev");
    }); 
	
	$(".carousel-inner").wrap("<div class='carousel slide slf_carousel' id='myCarousel' data-ride='carousel'  data-interval='false'>"); 
	$(".carousel-inner .item:first").addClass("active"); 
	$(".carousel-indicators li:first").addClass("active");
	$(".wp-caption").addClass("imgvert");
	
	(function() {

				// detect if IE : from http://stackoverflow.com/a/16657946		
				var ie = (function(){
					var undef,rv = -1; // Return value assumes failure.
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf('MSIE ');
					var trident = ua.indexOf('Trident/');

					if (msie > 0) {
						// IE 10 or older => return version number
						rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
					} else if (trident > 0) {
						// IE 11 (or newer) => return version number
						var rvNum = ua.indexOf('rv:');
						rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
					}

					return ((rv > -1) ? rv : undef);
				}());


				// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179					
				// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				var keys = [37, 39], wheelIter = 0;

				function preventDefault(e) {
					e = e || window.event;
					if (e.preventDefault)
					e.preventDefault();
					e.returnValue = false;  
				}

				function keydown(e) {
					for (var i = keys.length; i--;) {
						if (e.keyCode === keys[i]) {
							preventDefault(e);
							return;
						}
					}
				}

				function touchmove(e) {
					preventDefault(e);
				}

				function wheel(e) {
					// for IE 
					//if( ie ) {
						//preventDefault(e);
					//}
				}

				function disable_scroll() {
					window.onmousewheel = document.onmousewheel = wheel;
					document.onkeydown = keydown;
					document.body.ontouchmove = touchmove;
				}

				function enable_scroll() {
					window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
				}

				var docElem = window.document.documentElement,
					scrollVal,
					isRevealed, 
					noscroll, 
					isAnimating,
					container = document.getElementById( 'container' ),
					trigger = container.querySelector( 'button.trigger' );

				function scrollY() {
					return window.pageYOffset || docElem.scrollTop;
				}
				
				function scrollPage() {
					scrollVal = scrollY();
					
					if( noscroll && !ie ) {
						if( scrollVal < 0 ) return false;
						// keep it that way
						window.scrollTo( 0, 0 );
					}

					if( classie.has( container, 'notrans' ) ) {
						classie.remove( container, 'notrans' );
						return false;
					}

					if( isAnimating ) {
						return false;
					}
					
					if( scrollVal <= 0 && isRevealed ) {
						toggle(0);
					}
					else if( scrollVal > 0 && !isRevealed ){
						toggle(1);
					}
				}

				function toggle( reveal ) {
					isAnimating = true;
					
					if( reveal ) {
						classie.add( container, 'modify' );
					}
					else {
						noscroll = true;
						disable_scroll();
						classie.remove( container, 'modify' );
						$('.navbar').slideUp();
					}

					// simulating the end of the transition:
					setTimeout( function() {
						isRevealed = !isRevealed;
						isAnimating = false;
						if( reveal ) {
							noscroll = false;
							enable_scroll();
						}
					}, 600 );
				}

				// refreshing the page...
				var pageScroll = scrollY();
				noscroll = pageScroll === 0;
				
				disable_scroll();
				
				if( pageScroll ) {
					isRevealed = true;
					classie.add( container, 'notrans' );
					classie.add( container, 'modify' );
				}
				
				window.addEventListener( 'scroll', scrollPage );
				trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
			})();
});	


//Modal for image gallery

(function($) {
    $.fn.changeElementType = function(newType) {
        var attrs = {};
        if (!(this[0] && this[0].attributes))
            return;

        $.each(this[0].attributes, function(idx, attr) {
            attrs[attr.nodeName] = attr.nodeValue;
        });
        this.replaceWith(function() {
            return $("<" + newType + "/>", attrs).append($(this).contents());
        });
    }
})(jQuery);

				$('.gallery-size-thumbnail').changeElementType('ul');
				$('.gallery-size-slf_gallery_size').changeElementType('ul');
				$('.gallery').addClass('row');
				$('.gallery-item').changeElementType('li');
				$('.gallery-icon').changeElementType('span');
				$('dd').changeElementType('div');
				$('.gallery').find('br').remove();
				$('.gallery li span').removeAttr('class', 'gallery-icon');
				$('.gallery img').unwrap('span');
				
				if ( $('ul').has('.homepage-gallery-item')  ) {
						$(this).changeElementType('div');
				}

$(document).ready(function(){  
		
	$('.btnmodal').on('click',function(){
		$('.gallery').removeAttr('id', 'select');
	});
	
	$('.close').on('click',function(){
		$('.gallery').removeAttr('id', 'select');
	});
	
	$('.gallery li img').on('click',function(){
					
		var src = $(this).attr('src').replace("-150x150", "");
		var alt = $(this).attr('alt');
		
		var img = '<img src="' + src + '" class="img-responsive"/>';
		
		var index = $(this).parent('.gallery-item').index();   		
		var html = '';
		html += img;
		html += '<span id="alt">' + alt + '</span>';
		html += '<div style="height:45px;clear:both;display:block;">';
		html += '</div>';
		
			$('#slf_modal').modal();
			$('#slf_modal').on('shown.bs.modal', function(){
				$('#slf_modal .modal-body').html(html);
			})
			$('#slf_modal').on('hidden.bs.modal', function(){
				$('#slf_modal .modal-body').html('');
			});	
   });	
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