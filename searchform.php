<?php
/**
 * The template for displaying search forms
 */
?>
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<input placeholder="<?php _e( 'Enter your search term...', 'geoformat' ); ?>" type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" name="search" id="search">
								
			<button type="submit" class="btn">OK</button>
	</form>