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
				
		meta_image_frame.open();
    });
});