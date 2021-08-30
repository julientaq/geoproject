var $ = jQuery.noConflict();

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