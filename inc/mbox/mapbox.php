<?php
function mapbox_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function mapbox_add_meta_box() {
	add_meta_box(
		'mapbox-mapbox',
		__( 'Add MapBox map?', 'geoformat' ),
		'mapbox_html',
		'post',
		'side',
		'default'
	);
	add_meta_box(
		'mapbox-mapbox',
		__( 'Add MapBox map?', 'geoformat' ),
		'mapbox_html',
		'page',
		'side',
		'default'
	);
	add_meta_box(
		'mapbox-mapbox',
		__( 'Add MapBox map?', 'geoformat' ),
		'mapbox_html',
		'geoformat',
		'side',
		'default'
	);
	add_meta_box(
		'mapbox-mapbox',
		__( 'Add MapBox map?', 'geoformat' ),
		'mapbox_html',
		'maps',
		'side',
		'default'
	);
	add_meta_box(
		'mapbox-mapbox',
		__( 'Add MapBox map?', 'geoformat' ),
		'mapbox_html',
		'markers',
		'side',
		'default'
	);
	add_meta_box(
		'mapbox-mapbox',
		__( 'Add MapBox map?', 'geoformat' ),
		'mapbox_html',
		'projects',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'mapbox_add_meta_box' );

function mapbox_html( $post) {
	wp_nonce_field( '_mapbox_nonce', 'mapbox_nonce' ); 
	$checkboxMB = get_post_meta( $post->ID );
	?>

	<p>
		<p><?php _e( 'I am using an embedded MapBox map in this post', 'geoformat' ); ?></p>
		
		<input type="checkbox" name="mapbox_mapbox" id="mapbox_mapbox" value="yes" <?php if ( isset ( $checkboxMB['mapbox_mapbox'] ) ) checked( $checkboxMB['mapbox_mapbox'][0], 'yes' ); ?> />
		
		<label for="mapbox_mapbox"><?php _e( 'Yes', 'geoformat' ); ?></label>
		<p>
			<em><?php _e( 'Recommended size : style="width: 100%; height: 500px;", paste your MapBox code in a HTML container (Gutenberg editor) or in text mode (classic editor).', 'geoformat' ); ?></em>
		</p>
		<?php
}

function mapbox_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['mapbox_nonce'] ) || ! wp_verify_nonce( $_POST['mapbox_nonce'], '_mapbox_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	 if( isset( $_POST[ 'mapbox_mapbox' ] ) ) {
        update_post_meta( $post_id, 'mapbox_mapbox', 'yes' );
    } else {
        update_post_meta( $post_id, 'mapbox_mapbox', 'no' );
    }
}
add_action( 'save_post', 'mapbox_save' );
?>