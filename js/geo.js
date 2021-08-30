jQuery(document).ready(function($) {
	//Admin Geoformat
	$('#tab1').css('display','block');
	$('#tab1').show();
	$('#tab2').css('display','none');
			$('#tab2').hide();
			$('#tab3').css('display','none');
			$('#tab3').hide();
			$('#tab4').css('display','none');
			$('#tab4').hide();
			$('#tab5').css('display','none');
			$('#tab5').hide();
			$('#tab6').css('display','none');
			$('#tab6').hide();
			$('#tab7').css('display','none');
			$('#tab7').hide();
			$('#infopt').css('display','none');
			$('#infopt').hide();
			$('#nextpt').css('display','none');
			$('#nextpt').hide();
			
			$('.navtab1').click(function() {
				$('#tab1').css('display','block');
				$('#tab2').css('display','none');
				$('#tab3').css('display','none');
				$('#tab4').css('display','none');
				$('#tab5').css('display','none');
				$('#tab6').css('display','none');
				$('#tab7').css('display','none');
				$('#tab7').hide();
				$('.active1').css('background','#FFFFFF').css('color', '#d91e18');
				$('.active2').css('background','#E4E4E4').css('color', '#686868');
				$('.active3').css('background','#E4E4E4').css('color', '#686868');
				$('.active4').css('background','#E4E4E4').css('color', '#686868');
				$('.active5').css('background','#E4E4E4').css('color', '#686868');
				$('.active6').css('background','#E4E4E4').css('color', '#686868');
				$('.active7').css('background','#E4E4E4').css('color', '#686868');
			});
			
			$('.navtab2').click(function() {
				$('#tab2').css('display','block');
				$('#tab1').css('display','none');
				$('#tab3').css('display','none');
				$('#tab4').css('display','none');
				$('#tab5').css('display','none');
				$('#tab6').css('display','none');
				$('#tab7').css('display','none');
				$('#tab7').hide();
				$('.active2').css('background','#FFFFFF').css('color', '#d91e18');
				$('.active3').css('background','#E4E4E4').css('color', '#686868');
				$('.active1').css('background','#E4E4E4').css('color', '#686868');
				$('.active4').css('background','#E4E4E4').css('color', '#686868');
				$('.active5').css('background','#E4E4E4').css('color', '#686868');
				$('.active6').css('background','#E4E4E4').css('color', '#686868');
				$('.active7').css('background','#E4E4E4').css('color', '#686868');
			});
			
			$('.navtab3').click(function() {
				$('#tab3').css('display','block');
				$('#tab1').css('display','none');
				$('#tab2').css('display','none');
				$('#tab4').css('display','none');
				$('#tab5').css('display','none');
				$('#tab6').css('display','none');
				$('#tab7').css('display','none');
				$('#tab7').hide();
				$('.active3').css('background','#FFFFFF').css('color', '#d91e18');
				$('.active2').css('background','#E4E4E4').css('color', '#686868');
				$('.active1').css('background','#E4E4E4').css('color', '#686868');
				$('.active4').css('background','#E4E4E4').css('color', '#686868');
				$('.active5').css('background','#E4E4E4').css('color', '#686868');
				$('.active6').css('background','#E4E4E4').css('color', '#686868');
			});
			
			
			$('.navtab4').click(function() {
				$('#tab4').css('display','block');
				$('#tab1').css('display','none');
				$('#tab2').css('display','none');
				$('#tab3').css('display','none');
				$('#tab5').css('display','none');
				$('#tab6').css('display','none');
				$('#tab7').css('display','none');
				$('#tab7').hide();
				$('.active4').css('background','#FFFFFF').css('color', '#d91e18');
				$('.active2').css('background','#E4E4E4').css('color', '#686868');
				$('.active1').css('background','#E4E4E4').css('color', '#686868');
				$('.active3').css('background','#E4E4E4').css('color', '#686868');
				$('.active5').css('background','#E4E4E4').css('color', '#686868');
				$('.active6').css('background','#E4E4E4').css('color', '#686868');
				$('.active7').css('background','#E4E4E4').css('color', '#686868');
			});
			
			$('.navtab5').click(function() {
				$('#tab5').css('display','block');
				$('#tab1').css('display','none');
				$('#tab2').css('display','none');
				$('#tab3').css('display','none');
				$('#tab4').css('display','none');
				$('#tab6').css('display','none');
				$('#tab7').css('display','none');
				$('#tab7').hide();
				$('.active5').css('background','#FFFFFF').css('color', '#d91e18');
				$('.active2').css('background','#E4E4E4').css('color', '#686868');
				$('.active1').css('background','#E4E4E4').css('color', '#686868');
				$('.active4').css('background','#E4E4E4').css('color', '#686868');
				$('.active3').css('background','#E4E4E4').css('color', '#686868');
				$('.active6').css('background','#E4E4E4').css('color', '#686868');
				$('.active7').css('background','#E4E4E4').css('color', '#686868');
			});
			
			$('.navtab6').click(function() {
				$('#tab6').css('display','block');
				$('#tab1').css('display','none');
				$('#tab2').css('display','none');
				$('#tab3').css('display','none');
				$('#tab4').css('display','none');
				$('#tab5').css('display','none');
				$('#tab7').css('display','none');
				$('#tab7').hide();
				$('.active6').css('background','#FFFFFF').css('color', '#d91e18');
				$('.active2').css('background','#E4E4E4').css('color', '#686868');
				$('.active1').css('background','#E4E4E4').css('color', '#686868');
				$('.active4').css('background','#E4E4E4').css('color', '#686868');
				$('.active3').css('background','#E4E4E4').css('color', '#686868');
				$('.active5').css('background','#E4E4E4').css('color', '#686868');
				$('.active7').css('background','#E4E4E4').css('color', '#686868');
			});
			$('.navtab7').click(function() {
				$('#tab7').css('display','block');
				$('#tab1').css('display','none');
				$('#tab2').css('display','none');
				$('#tab3').css('display','none');
				$('#tab4').css('display','none');
				$('#tab5').css('display','none');
				$('#tab6').css('display','none');
				$('#tab6').hide();
				$('.active7').css('background','#FFFFFF').css('color', '#d91e18');
				$('.active2').css('background','#E4E4E4').css('color', '#686868');
				$('.active1').css('background','#E4E4E4').css('color', '#686868');
				$('.active4').css('background','#E4E4E4').css('color', '#686868');
				$('.active3').css('background','#E4E4E4').css('color', '#686868');
				$('.active5').css('background','#E4E4E4').css('color', '#686868');
				$('.active6').css('background','#E4E4E4').css('color', '#686868');
			});
			
			$("#meta-trigger").change(function() {
			  if ($("#meta-trigger option[value='select-one']").attr('selected')) {
				$('#trigger-mes').show();
			  }
			  else {
				$('#trigger-mes').hide();
			  }
			});

			$("#meta-image").change(function() {
				$('#img-slf').show();
			});
			
			$("#meta-image_1").change(function() {
				$('#img-slf_1').show();
			});
			
			$("#meta-image_2").change(function() {
				$('#img-slf_2').show();
			});
			
			$("#meta-image_3").change(function() {
				$('#img-slf_3').show();
			});
			
			$("#meta-image_4").change(function() {
				$('#img-slf_4').show();
			});
			
			$("#meta-image_5").change(function() {
				$('#img-slf_5').show();
			});
			
			$("#meta-image_6").change(function() {
				$('#img-slf_6').show();
			});
			
			$("#meta-image_7").change(function() {
				$('#img-slf_7').show();
			});
		
			$('#add1').mouseover(function() {
				$('#add1').css('color', '#666666');
			});

			$('#add1').mouseout(function() {
				$('#add1').css('color', '#0073AA');
			});

			$('#add1').click(function() {
				$('#add1').fadeOut();
				$('#add1').css('color', '#666666');
				$('#wp_editor_section_1').fadeIn('slow');
			});
		
			$('#add2').mouseover(function() {
				$('#add2').css('color', '#666666');
			});

			$('#add2').mouseout(function() {
				$('#add2').css('color', '#0073AA');
			});

			$('#add2').click(function() {
				$('#add2').fadeOut();
				$('#add2').css('color', '#666666');
				$('#wp_editor_section_2').fadeIn('slow');
			});

			$('#add3').mouseover(function() {
				$('#add3').css('color', '#666666');
			});

			$('#add3').mouseout(function() {
				$('#add3').css('color', '#0073AA');
			});

			$('#add3').click(function() {
				$('#add3').fadeOut();
				$('#add3').css('color', '#666666');
				$('#wp_editor_section_3').fadeIn('slow');
			});

			$('#add4').mouseover(function() {
				$('#add4').css('color', '#666666');
			});

			$('#add4').mouseout(function() {
				$('#add4').css('color', '#0073AA');
			});

			$('#add4').click(function() {
				$('#add4').fadeOut();
				$('#add4').css('color', '#666666');
				$('#wp_editor_section_4').fadeIn('slow');
			});

			$('#add5').mouseover(function() {
				$('#add5').css('color', '#666666');
			});

			$('#add5').mouseout(function() {
				$('#add5').css('color', '#0073AA');
			});

			$('#add5').click(function() {
				$('#add5').fadeOut();
				$('#add5').css('color', '#666666');
				$('#wp_editor_section_5').fadeIn('slow');
			});
			
			$('#add6').mouseover(function() {
				$('#add6').css('color', '#666666');
			});

			$('#add6').mouseout(function() {
				$('#add6').css('color', '#0073AA');
			});

			$('#add6').click(function() {
				$('#add6').fadeOut();
				$('#add6').css('color', '#666666');
				$('#wp_editor_section_6').fadeIn('slow');
			});
			
			$('#add7').mouseover(function() {
				$('#add7').css('color', '#666666');
			});

			$('#add7').mouseout(function() {
				$('#add7').css('color', '#0073AA');
			});

			$('#add7').click(function() {
				$('#add7').fadeOut();
				$('#add7').css('color', '#666666');
				$('#wp_editor_section_7').fadeIn('slow');
			});
			
			$('.meta-color').wpColorPicker();

		$('#remove_img_intro').click(function()  {
			$('#imgtop').removeAttr('src');
			$('#meta-image').removeAttr('value');
			$('#img-slf').hide();
			$('#remove_img_intro').hide();
		});
	
		$('#remove_img_1').click(function()  {
			$('#imgtop1').removeAttr('src');
			$('#meta-image_1').val('');
			$('img#imgtop_1').hide();
			$('#remove_img_1').hide();
		});

		$('#remove_img_2').click(function()  {
			$('#imgtop2').removeAttr('src');
			$('#meta-image_2').val('');
			$('#imgtop_2').hide();
			$('#remove_img_2').hide();
		});

		$('#remove_img_3').click(function()  {
			$('#imgtop3').removeAttr('src');
			$('#meta-image_3').val('');
			$('#imgtop_3').hide();
			$('#remove_img_3').hide();
		});

		$('#remove_img_4').click(function()  {
			$('#imgtop4').removeAttr('src');
			$('#meta-image_4').val('');
			$('#imgtop_4').hide();
			$('#remove_img_4').hide();
		});

		$('#remove_img_5').click(function()  {
			$('#imgtop5').removeAttr('src');
			$('#meta-image_5').val('');
			$('#imgtop_5').hide();
			$('#remove_img_5').hide();
		});
		
		$('#remove_img_6').click(function()  {
			$('#imgtop6').removeAttr('src');
			$('#meta-image_6').val('');
			$('#imgtop_6').hide();
			$('#remove_img_6').hide();
		});
		
		$('#remove_img_7').click(function()  {
			$('#imgtop7').removeAttr('src');
			$('#meta-image_7').val('');
			$('#imgtop_7').hide();
			$('#remove_img_7').hide();
		});
		
			$("#meta-trigger").change(function() {
			  if ($("#meta-trigger option[value='select-one']").attr('selected')) {
				$('#trigger-mes').show();
			  }
			  else {
				$('#trigger-mes').hide();
			  }
			});

			$("#meta-image").change(function() {
				$('#img-slf').show();
			});
			
			$("#meta-image_1").change(function() {
				$('#img-slf_1').show();
			});
			
			$("#meta-image_2").change(function() {
				$('#img-slf_2').show();
			});
			
			$("#meta-image_3").change(function() {
				$('#img-slf_3').show();
			});
			
			$("#meta-image_4").change(function() {
				$('#img-slf_4').show();
			});
			
			$("#meta-image_5").change(function() {
				$('#img-slf_5').show();
			});
			$("#meta-image_6").change(function() {
				$('#img-slf_6').show();
			});
			$("#meta-image_7").change(function() {
				$('#img-slf_7').show();
			});
			
		$('#remove_img').click(function()  {
			$('#imgtop').removeAttr('src');
			$('#meta-image').removeAttr('value');
			$('#img-slf').hide();
			$('#remove_img').hide();
		});
	
		$('#remove_img_1').click(function()  {
			$('#meta-image_1').val('');
			$('#imgtop_1').hide();
			$('#remove_img_1').hide();
		});

		$('#remove_img_2').click(function()  {
			$('#meta-image_2').val('');
			$('#imgtop_2').hide();
			$('#remove_img_2').hide();
		});

		$('#remove_img_3').click(function()  {
			$('#meta-image_3').val('');
			$('#imgtop_3').hide();
			$('#remove_img_3').hide();
		});

		$('#remove_img_4').click(function()  {
			$('#meta-image_4').val('');
			$('#imgtop_4').hide();
			$('#remove_img_4').hide();
		});

		$('#remove_img_5').click(function()  {
			$('#meta-image_5').val('');
			$('#imgtop_5').hide();
			$('#remove_img_5').hide();
		});
		$('#remove_img_6').click(function()  {
			$('#meta-image_6').val('');
			$('#imgtop_6').hide();
			$('#remove_img_6').hide();
		});
		$('#remove_img_7').click(function()  {
			$('#meta-image_7').val('');
			$('#imgtop_7').hide();
			$('#remove_img_7').hide();
		});
		
			$('#add1').mouseover(function() {
				$('#add1').css('color', '#666666');
			});

			$('#add1').mouseout(function() {
				$('#add1').css('color', '#0073AA');
			});

			$('#add1').click(function() {
				$('#add1').fadeOut();
				$('#add1').css('color', '#666666');
				$('#wp_editor_section_1').fadeIn('slow');
			});
		
			$('#add2').mouseover(function() {
				$('#add2').css('color', '#666666');
			});

			$('#add2').mouseout(function() {
				$('#add2').css('color', '#0073AA');
			});

			$('#add2').click(function() {
				$('#add2').fadeOut();
				$('#add2').css('color', '#666666');
				$('#wp_editor_section_2').fadeIn('slow');
			});

			$('#add3').mouseover(function() {
				$('#add3').css('color', '#666666');
			});

			$('#add3').mouseout(function() {
				$('#add3').css('color', '#0073AA');
			});

			$('#add3').click(function() {
				$('#add3').fadeOut();
				$('#add3').css('color', '#666666');
				$('#wp_editor_section_3').fadeIn('slow');
			});

			$('#add4').mouseover(function() {
				$('#add4').css('color', '#666666');
			});

			$('#add4').mouseout(function() {
				$('#add4').css('color', '#0073AA');
			});

			$('#add4').click(function() {
				$('#add4').fadeOut();
				$('#add4').css('color', '#666666');
				$('#wp_editor_section_4').fadeIn('slow');
			});

			$('#add5').mouseover(function() {
				$('#add5').css('color', '#666666');
			});

			$('#add5').mouseout(function() {
				$('#add5').css('color', '#0073AA');
			});

			$('#add5').click(function() {
				$('#add5').fadeOut();
				$('#add5').css('color', '#666666');
				$('#wp_editor_section_5').fadeIn('slow');
			});
			$('#add6').mouseout(function() {
				$('#add6').css('color', '#0073AA');
			});

			$('#add6').click(function() {
				$('#add6').fadeOut();
				$('#add6').css('color', '#666666');
				$('#wp_editor_section_6').fadeIn('slow');
			});
			$('#add7').mouseout(function() {
				$('#add7').css('color', '#0073AA');
			});

			$('#add7').click(function() {
				$('#add7').fadeOut();
				$('#add7').css('color', '#777777');
				$('#wp_editor_section_7').fadeIn('slow');
			});
			
			$('.style').hide();
			
			
	$(".meta-color").wpColorPicker();
		
		$(document).on("click", ".upload_image_button", function() {

			jQuery.data(document.body, 'prevElement', $(this).prev());

				window.send_to_editor = function(html) {
					var imgurl = jQuery(html).attr('src');
					var inputText = jQuery.data(document.body, 'prevElement');

					 if(inputText != undefined && inputText != '')
					{
						inputText.val(imgurl);
					}

					tb_remove();
				};

				tb_show('', 'media-upload.php?type=image&TB_iframe=true');
				return false;
			});
		
	jQuery("input").each(function() {
		jQuery(this).data('holder',jQuery(this).attr('placeholder'));

			jQuery(this).focusin(function(){
    			jQuery(this).attr('placeholder','');
			});
			
			jQuery(this).focusout(function(){
    			jQuery(this).attr('placeholder',jQuery(this).data('holder'));
			});
	})	
});