<?php

//Avatar utilisateur

function geoformat_custom_avatar_field( $user ) { 
	$avatar = esc_attr( get_the_author_meta( 'geoformat_custom_avatar', $user->ID ) );
?>

 <h3><?php __('Profile picture', 'geoformat'); ?></h3>
 <table>
	 <tr>
		<th><label for="geoformat_custom_avatar"></label></th>
		 <td>
		 
			<input name="geoformat_custom_avatar" id="meta-image" class="regular-text" type="text" size="36"  value="<?php echo $avatar; ?>" />
			<input id="meta-image-button" class="button button-primary upload_image_button" type="button" value="<?php _e('Load image','geoformat');?>" />
			<p> <strong><?php __('Image size: 200 x 200px', 'geoformat'); ?></strong></p>
			
			<?php if (!empty ($avatar) ) { ?>

				 <div class="img-avatar">
					<img id="avatar-img" src="<?php echo $avatar; ?>" />
						<p class="remove_img">
							<a href="javascript:;"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>
				 </div>
			 <?php } ?>

				<script type="text/javascript">
				var $ =jQuery.noConflict();
				$(document).ready(function() {
					$('.remove_img').click(function() {
						$('#avatar-img').hide();
						$('.remove_img').hide();
						$('#meta-image').removeAttr('value');
					});
				});
				</script>
		 </td>
	 </tr>
 </table>

 <?php 
}

add_action( 'show_user_profile', 'geoformat_custom_avatar_field' );
add_action( 'edit_user_profile', 'geoformat_custom_avatar_field' );

	function geoformat_save_custom_avatar_field( $user_id ) {
		 if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
		 update_user_meta( $user_id, 'geoformat_custom_avatar', $_POST['geoformat_custom_avatar'] );
	}
	
	add_action( 'personal_options_update', 'geoformat_save_custom_avatar_field' );
	add_action( 'edit_user_profile_update', 'geoformat_save_custom_avatar_field' );
?>