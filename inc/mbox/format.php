<?php

function format_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function format_add_meta_box() {
	add_meta_box(
		'format-format',
		__( 'Format', 'geoformat' ),
		'format_html',
		'post',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'format_add_meta_box' );

function format_html( $post) {
	wp_nonce_field( '_format_nonce', 'format_nonce' ); ?>

	<p>Format d'article</p>
	
	<p>

		<p>
		<input type="checkbox" name="format_project" id="format_project" value="projet" <?php echo ( format_get_meta( 'format_project' ) === 'projet' ) ? 'checked' : ''; ?>>
		<label for="format_project"><?php _e( 'Project', 'geoformat' ); ?></label>	</p>
		
		<input type="checkbox" name="format_texte" id="format_texte" value="texte" <?php echo ( format_get_meta( 'format_texte' ) === 'texte' ) ? 'checked' : ''; ?>>
		<label for="format_texte"><?php _e( 'Text', 'geoformat' ); ?></label>	</p>	<p>

		<input type="checkbox" name="format_photo" id="format_photo" value="photo" <?php echo ( format_get_meta( 'format_photo' ) === 'photo' ) ? 'checked' : ''; ?>>
		<label for="format_photo"><?php _e( 'Picture', 'geoformat' ); ?></label>	</p>	<p>

		<input type="checkbox" name="format_audio" id="format_audio" value="audio" <?php echo ( format_get_meta( 'format_audio' ) === 'audio' ) ? 'checked' : ''; ?>>
		<label for="format_audio"><?php _e( 'Sound', 'geoformat' ); ?></label>	</p>	<p>

		<input type="checkbox" name="format_video" id="format_video" value="video" <?php echo ( format_get_meta( 'format_video' ) === 'video' ) ? 'checked' : ''; ?>>
		<label for="format_video"><?php _e( 'Video', 'geoformat' ); ?></label>	</p>	<p>

		<input type="checkbox" name="format_geoformat" id="format_geoformat" value="geoformat" <?php echo ( format_get_meta( 'format_geoformat' ) === 'geoformat' ) ? 'checked' : ''; ?>>
		<label for="format_geoformat"><?php _e( 'Map', 'geoformat' ); ?></label>	</p>	<p>
		
		<input type="checkbox" name="format_graph" id="format_graph" value="graph" <?php echo ( format_get_meta( 'format_graph' ) === 'graph' ) ? 'checked' : ''; ?>>
		<label for="format_graph"><?php _e( 'Chart', 'geoformat' ); ?></label>	</p>	

		<?php
}

function format_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['format_nonce'] ) || ! wp_verify_nonce( $_POST['format_nonce'], '_format_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['format_texte'] ) )
		update_post_meta( $post_id, 'format_texte', esc_attr( $_POST['format_texte'] ) );
	else
		update_post_meta( $post_id, 'format_texte', null );
	if ( isset( $_POST['format_photo'] ) )
		update_post_meta( $post_id, 'format_photo', esc_attr( $_POST['format_photo'] ) );
	else
		update_post_meta( $post_id, 'format_photo', null );
	if ( isset( $_POST['format_audio'] ) )
		update_post_meta( $post_id, 'format_audio', esc_attr( $_POST['format_audio'] ) );
	else
		update_post_meta( $post_id, 'format_audio', null );
	if ( isset( $_POST['format_video'] ) )
		update_post_meta( $post_id, 'format_video', esc_attr( $_POST['format_video'] ) );
	else
		update_post_meta( $post_id, 'format_video', null );
	if ( isset( $_POST['format_geoformat'] ) )
		update_post_meta( $post_id, 'format_geoformat', esc_attr( $_POST['format_geoformat'] ) );
	else
		update_post_meta( $post_id, 'format_geoformat', null );
	if ( isset( $_POST['format_graph'] ) )
		update_post_meta( $post_id, 'format_graph', esc_attr( $_POST['format_graph'] ) );
	else
		update_post_meta( $post_id, 'format_graph', null );
	if ( isset( $_POST['format_project'] ) )
		update_post_meta( $post_id, 'format_project', esc_attr( $_POST['format_project'] ) );
	else
		update_post_meta( $post_id, 'format_project', null );
}
add_action( 'save_post', 'format_save' );