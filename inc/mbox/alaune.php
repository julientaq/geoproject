<?php
function display_image_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function display_image_add_meta_box() {
	$types = array('maps', 'markers');
	
	foreach( $types as $type )
    {
		add_meta_box(
			'display_image-display_image',
			__( 'Display option (index pages)', 'geoformat' ),
			'display_image_html',
			$type,
			'side',
			'default'
		);
	}
}
add_action( 'add_meta_boxes', 'display_image_add_meta_box' );

function display_image_html( $post) {
	wp_nonce_field( '_display_image_nonce', 'display_image_nonce' ); 
	
	$checkboxMeta = get_post_meta( $post->ID ); ?>

	<p><?php _e('Check this box to display the featured image rather than the map','geoformat'); ?></p>
	
	<p>

		<input type="checkbox" name="display_image_une" id="display_image_une" value="yes" <?php if ( isset ( $checkboxMeta['display_image_une'] ) ) checked( $checkboxMeta['display_image_une'][0], 'yes' ); ?> />
	</p>
	
		<?php
}

function display_image_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['display_image_nonce'] ) || ! wp_verify_nonce( $_POST['display_image_nonce'], '_display_image_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	 if( isset( $_POST[ 'display_image_une' ] ) ) {
        update_post_meta( $post_id, 'display_image_une', 'yes' );
    } else {
        update_post_meta( $post_id, 'display_image_une', 'no' );
    }
}
add_action( 'save_post', 'display_image_save' );
?>