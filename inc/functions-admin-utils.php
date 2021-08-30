<?php
/**
 * GeoProjects Admin Utils functions
 *
 * @package GeoProjects
 */


/**
 * Echo the markers icons list of the given type
 * @param  string 	$list_type 	Type of the list requested : 'default' or 'custom'
 * @return Echo HTML and return boolean
 */
function gp_get_markers_icons_list( $list_type = 'default' ) {
	$excluded_files = array( '.', '..', 'shadows' );

	if ( !in_array( $list_type, array( 'default', 'custom' ) ) ) {
		$list_type = 'default';
	}

	if ( $list_type == 'default' ) {
		$icons_path = GP_PATH_DEFAULT_MARKERS_ICONS;
		$icons_url = GP_URL_DEFAULT_MARKERS_ICONS;
	}
	else {
		$icons_path = GP_PATH_CUSTOM_MARKERS_ICONS;
		$icons_url = GP_URL_CUSTOM_MARKERS_ICONS;
	}

	// Directory exists ?
	if ( file_exists( $icons_path ) ) {
		$icons_list = array_diff( scandir( $icons_path ), array( '.', '..', 'shadows' ) );

		// Icons ?
		if ( count( $icons_list ) > 0 ) {
			?>
	
			<ul class="clearfix">
                <?php
                foreach( $icons_list as $icon_filename ) :
                    ?>
                    <li>
                        <a href="" data-icon-type="<?php echo $list_type; ?>" data-icon-filename="<?php echo esc_attr( $icon_filename ); ?>">
                            <img src="<?php echo $icons_url . '/' . $icon_filename; ?>" alt="">
                        </a>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>

			<?php
			return;
		}
	}

	// No icons
	switch( $list_type ) {

		// No default icons (???)
		case 'default':
			?>
			<p class="mbox-error">
                <?php printf( __( '%1$s, no default icons markers found : you must have a problem with the theme.', 'geoformat' ), '<strong>' . __( 'Warning', 'geoformat' ) . ' : </strong>' ); ?>
            </p>
			<?php
			break;

		// No customs icons
		case 'custom':
			?>
			<p class="mbox-no-custom-marker-icons">
                <strong><?php _e( 'No custom markers found! You can send your marker images (PNG, transparent background) from the button below "Load your custom marker"', 'geoformat' ); ?></strong>
            </p>
			
            <p>
                <?php printf( __( 'A good list of free markers icons can be found on the %1$s website.', 'geoformat' ), '<a href="http://mapicons.nicolasmollet.com/" target="_blank">Map Icons Collection</a>' ); ?>
            </p>
			<?php
			break;

	}

}