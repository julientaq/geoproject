/*
 * Attaches the image uploader to the input fields
 */
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
						$('#img-gp').show();
						$('#remove_img').show();
				});
		meta_image_frame.open();
    });
	
 var meta_image_frame_1;
		
		$('#meta-image-button_1').click(function(e){
			
			e.preventDefault();
			
			if ( meta_image_frame_1 ) {
				meta_image_frame_1.open();
				return;
			}
				meta_image_frame_1 = wp.media.frames.meta_image_frame_1 = wp.media({
					title: meta_image.title,
					button: { text:  meta_image.button },
					library: { type: 'image' }
				});
				
				meta_image_frame_1.on('select', function(){
					var media_attachment = meta_image_frame_1.state().get('selection').first().toJSON();
					$('#meta-image_1').val(media_attachment.url);
					$('#imgtop1').removeAttr("src");
					$('#img-gp_1').show();
					$('#imgtop1').attr("src", media_attachment.url);
					$('#remove_img_1').show();
				});
		meta_image_frame_1.open();
	});
    
var meta_image_frame_2;
		
	$('#meta-image-button_2').click(function(e){
		e.preventDefault();
			if ( meta_image_frame_2 ) {
					meta_image_frame_2.open();
					return;
			}
				meta_image_frame_2 = wp.media.frames.meta_image_frame_2 = wp.media({
					title: meta_image.title,
					button: { text:  meta_image.button },
					library: { type: 'image' }
				});
				meta_image_frame_2.on('select', function(){
					var media_attachment = meta_image_frame_2.state().get('selection').first().toJSON();
						$('#meta-image_2').val(media_attachment.url);
						$('#imgtop2').attr("src", media_attachment.url);
						$('#img-gp_2').show();
						$('#remove_img_2').show();
				});
	meta_image_frame_2.open();
});
    
var meta_image_frame_3;

	$('#meta-image-button_3').click(function(e){
			e.preventDefault();
				if ( meta_image_frame_3 ) {
					meta_image_frame_3.open();
					return;
				}
				meta_image_frame_3 = wp.media.frames.meta_image_frame_3 = wp.media({
					title: meta_image.title,
					button: { text:  meta_image.button },
					library: { type: 'image' }
				});
			meta_image_frame_3.on('select', function(){
				 var media_attachment = meta_image_frame_3.state().get('selection').first().toJSON();
				 $('#meta-image_3').val(media_attachment.url);
						$('#imgtop3').attr("src", media_attachment.url);
						$('#img-gp_3').show();
						$('#remove_img_3').show();
			});
 meta_image_frame_3.open();
    });
    

var meta_image_frame_4;
	$('#meta-image-button_4').click(function(e){
		e.preventDefault();
		if ( meta_image_frame_4 ) {
				meta_image_frame_4.open();
				return;
			}
			meta_image_frame_4 = wp.media.frames.meta_image_frame_4 = wp.media({
				title: meta_image.title,
				button: { text:  meta_image.button },
				library: { type: 'image' }
			});
			
			meta_image_frame_4.on('select', function(){
			 var media_attachment = meta_image_frame_4.state().get('selection').first().toJSON();
			 $('#meta-image_4').val(media_attachment.url);
				$('#imgtop4').attr("src", media_attachment.url);
				$('#img-gp_4').show();
				$('#remove_img_4').show();
			});
	 meta_image_frame_4.open();
	});
    
    var meta_image_frame_5;
		$('#meta-image-button_5').click(function(e){
			e.preventDefault();
				if ( meta_image_frame_5 ) {
					meta_image_frame_5.open();
					return;
				}
				meta_image_frame_5 = wp.media.frames.meta_image_frame_5 = wp.media({
					title: meta_image.title,
					button: { text:  meta_image.button },
					library: { type: 'image' }
				});
				meta_image_frame_5.on('select', function(){
				 var media_attachment = meta_image_frame_5.state().get('selection').first().toJSON();
				 $('#meta-image_5').val(media_attachment.url);
						$('#imgtop5').attr("src", media_attachment.url);
						$('#img-gp_5').show();
						$('#remove_img_5').show();
				});
	 meta_image_frame_5.open();
	});
	var meta_image_frame_6;
		$('#meta-image-button_6').click(function(e){
			e.preventDefault();
				if ( meta_image_frame_6 ) {
					meta_image_frame_6.open();
					return;
				}
				meta_image_frame_6 = wp.media.frames.meta_image_frame_6 = wp.media({
					title: meta_image.title,
					button: { text:  meta_image.button },
					library: { type: 'image' }
				});
				meta_image_frame_6.on('select', function(){
				 var media_attachment = meta_image_frame_6.state().get('selection').first().toJSON();
				 $('#meta-image_6').val(media_attachment.url);
						$('#imgtop6').attr("src", media_attachment.url);
						$('#img-gp_6').show();
						$('#remove_img_6').show();
				});
	 meta_image_frame_6.open();
	});
	var meta_image_frame_7;
		$('#meta-image-button_7').click(function(e){
			e.preventDefault();
				if ( meta_image_frame_7 ) {
					meta_image_frame_7.open();
					return;
				}
				meta_image_frame_7 = wp.media.frames.meta_image_frame_7 = wp.media({
					title: meta_image.title,
					button: { text:  meta_image.button },
					library: { type: 'image' }
				});
				meta_image_frame_7.on('select', function(){
				 var media_attachment = meta_image_frame_7.state().get('selection').first().toJSON();
				 $('#meta-image_7').val(media_attachment.url);
						$('#imgtop7').attr("src", media_attachment.url);
						$('#img-gp_7').show();
						$('#remove_img_7').show();
				});
	 meta_image_frame_7.open();
	});
});