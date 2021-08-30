var $ = jQuery.noConflict();

$(document).ready(function($) {
	
	
	$("#delete").on('click', function() {
		$('#print-background-default').removeAttr('src');
		$('#print-background').removeAttr('value');
		$('#print-background-display').hide();
		$(this).hide();
	});
	
	$("#delete_image").on('click', function() {
		$('#print-image-default').removeAttr('src');
		$('#print-image').removeAttr('value');
		$('#print-image-display').hide();
		$(this).hide();
	});
	
	var print_background;

    $('#print-background-button').on('click', function(e){
        e.preventDefault();

		if( print_background ){
			print_background.open();
			return;
		}

            print_background = wp.media.frames.file_frame = wp.media({
                title: 'Image de fond pour impression',
				button: {text: meta_image.button},
					library: {type: 'image'},
					multiple: false
            });

            print_background.on('select', function(){
                var media_attachment = print_background.state().get('selection').first().toJSON();
				var url = '';

                $('#print-background').val(media_attachment.url);
				$('#print-background-default').removeAttr('src');
				$('#print-background-default').attr('src', media_attachment.url);
				$('#print-background-display').show();
				$('#delete').show();
            });

        print_background.open();
    });
	
	var print_image;
	
	$('#print-image-button').on('click', function(e){
        e.preventDefault();

		if( print_image ){
			print_image.open();
			return;
		}

            print_image = wp.media.frames.file_frame = wp.media({
                title: 'Image de couverture',
				button: {text: meta_image.button},
					library: {type: 'image'},
					multiple: false
            });

            print_image.on('select', function(){
                var media_attachment = print_image.state().get('selection').first().toJSON();
				var url = '';

                $('#print-image').val(media_attachment.url);
				$('#print-image-default').removeAttr('src');
				$('#print-image-default').attr('src', media_attachment.url);
				$('#print-image-display').show();
				$('#delete').show();
            });

        print_image.open();
    });
 });