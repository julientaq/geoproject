jQuery(document).ready(function($){
	var meta_image_frame;
	
	$('#meta-image-button').click(function(e){
		
		e.preventDefault();
		
		if ( meta_image_frame ) {
			meta_image_frame.open();
			return;
		}
			meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
				title: meta_image.title,
				button: { text:  meta_image.button },
				library: { type: 'image' }
			});
				meta_image_frame.on('select', function(){
					var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
						$('#meta-image').val(media_attachment.url);
						$('#imgtop').attr("src", media_attachment.url);
						$('#img-slf').show();
						$('#remove_img').show();
				});
		meta_image_frame.open();
    });
	
		$('#remove_img_intro').click(function()  {
			$('#imgtop').removeAttr('src');
			$('#meta-image').removeAttr('value');
			$('#img-slf').hide();
			$('#remove_img_intro').hide();
		});
});