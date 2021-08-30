<?php
	$texte = esc_attr( format_get_meta( 'format_texte' ) );
	$photo = esc_attr( format_get_meta( 'format_photo' ) );
	$audio = esc_attr( format_get_meta( 'format_audio' ) );
	$video = esc_attr( format_get_meta( 'format_video' ) );
	$geoformat = esc_attr( format_get_meta( 'format_geoformat' ) );
	$chart = esc_attr( format_get_meta( 'format_graph' ) );
	$projet = esc_attr( format_get_meta( 'format_project' ) );
		
		if (!empty($projet) ) :
			echo '<ion-icon name="folder"></ion-icon>';
		endif;
		if (!empty($texte) ) :
			echo '<ion-icon name="create"></ion-icon>';
		endif;
		if (!empty($photo) ) :
			echo '<ion-icon name="images"></ion-icon>';
		endif;
		if (!empty($audio) ) :
			echo '<ion-icon name="volume-high"></ion-icon>';
		endif;
		if (!empty($video) ) :
			echo '<ion-icon name="videocam"></ion-icon>';
		endif;
		if (!empty($geoformat) ) :
			echo '<ion-icon name="pin"></ion-icon>';
		endif;
		if (!empty($chart) ) :
			echo '<ion-icon name="stats"></ion-icon>';
		endif;
?>