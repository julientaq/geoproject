jQuery( document ).ready( function( $ ) {
    var $container = $('.grid');
    $container.imagesLoaded(function () {
        $container.masonry({
            itemSelector: '.grid-item'
        });
    });
    $('.grid').masonry({
        itemSelector: '.grid-item'
    });
    $container.infinitescroll({
        navSelector: '.wp-prev-next',
        nextSelector: '.wp-prev-next a',
        itemSelector: '.grid-item',
        loading: {
            msgText: ' ',
            finishedMsg: ' ',
            img: 'data:image/gif;base64,R0lGODlhKwALAPEAAP///wAAAIKCggAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAKwALAAACMoSOCMuW2diD88UKG95W88uF4DaGWFmhZid93pq+pwxnLUnXh8ou+sSz+T64oCAyTBUAACH5BAkKAAAALAAAAAArAAsAAAI9xI4IyyAPYWOxmoTHrHzzmGHe94xkmJifyqFKQ0pwLLgHa82xrekkDrIBZRQab1jyfY7KTtPimixiUsevAAAh+QQJCgAAACwAAAAAKwALAAACPYSOCMswD2FjqZpqW9xv4g8KE7d54XmMpNSgqLoOpgvC60xjNonnyc7p+VKamKw1zDCMR8rp8pksYlKorgAAIfkECQoAAAAsAAAAACsACwAAAkCEjgjLltnYmJS6Bxt+sfq5ZUyoNJ9HHlEqdCfFrqn7DrE2m7Wdj/2y45FkQ13t5itKdshFExC8YCLOEBX6AhQAADsAAAAAAAAAAAA='
		}
    }, function (newElements) {
        var $newElems = $(newElements).css({
            opacity: 0
        });
		
		$('.wp-prev-next').show();
		
        $newElems.imagesLoaded(function () {
            $newElems.animate({
                opacity: 1
            });
            $container.masonry('appended', $newElems, true);
        });
    });
		$(window).unbind('.infscr');
		jQuery(".wp-prev-next a").click(function () {
			jQuery('.grid').infinitescroll('retrieve');
			return false;
		});
			    
});