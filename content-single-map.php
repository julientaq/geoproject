<article class="type-maps">
	
	<header class="map-header">
	
		<h1 class="map-title"><?php the_title(); ?></h1>

        <?php
        $map_project_ID = get_post_meta( get_the_ID(), 'gp_project', true );

        if ( $map_project_ID != 0 ) :
            $map_project = gp_query_get_project( $map_project_ID );

            if ( $map_project != '' ) : ?>
                
                <p class="map-project">
                    <strong><?php _e( 'Project', 'geoformat' ); ?> :</strong>
                    <a href="<?php echo get_permalink( $map_project ); ?>" title="<?php echo esc_attr( $map_project->post_title ); ?>">
                        <?php echo $map_project->post_title; ?>
                    </a>
                </p>
				
                <?php
            endif;
        endif;
        ?>

	</header>

	<?php
	// Load Leaflet
    $gp_options = get_option( 'gp_options' );
    $map_tiles_provider = get_post_meta( get_the_ID(), 'gp_tiles_provider', true );
    $map_export = get_post_meta( get_the_ID(), 'gp_export', true );
	  
	if ( $map_export == '' ) { $map_export = $gp_options['export_maps']; }
	
	$zoom = $gp_options['zoom'];
	$overlay = get_post_meta( get_the_ID(), 'custom_image_displaying', true );
	$image = get_post_meta( get_the_ID(), 'custom_image_download', true );
	
	$gp_tiles_zoom = get_post_meta( get_the_ID(), 'gp_tiles_zoom', true ); 
		if ( empty ($gp_tiles_zoom) ) :
            $gp_tiles_zoom = $zoom;
		else :
			$gp_tiles_zoom = get_post_meta( get_the_ID(), 'gp_tiles_zoom', true );
        endif;
	?>
	
	<div class="gp-leaflet-map-container">
        <div class="gp-leaflet-map-wrap">
            <div id="gp-map-<?php the_ID(); ?>" class="gp-leaflet-map"
            	data-map-id="<?php the_ID(); ?>"
            	<?php if ( $overlay != 'replace' ) : ?>data-map-tiles="<?php echo $map_tiles_provider; ?>"<?php endif; ?>
            	<?php if ( empty($image) || $overlay != 'replace') : ?>data-map-clusterize="1"<?php endif; ?>
                data-map-markers-index="1"
				data-map-controls="1"
				data-map-drag="1"
				data-map-popups="1"
				<?php if (empty($image) || $overlay !='replace') : ?>data-map-zoom="<?php echo $gp_tiles_zoom; ?>" <?php endif; ?>
                <?php if ( $map_export ) : ?>
                    data-map-export="1"
                <?php endif;?>
                ></div>
        </div>
    </div>
	<div class="clearfix"></div>
	
	<div class="map-content">

		<?php the_content(); ?>

	</div>
<?php if (has_tag()) : ?>
		<div id="geotagp"><?php the_tags( '#', ' #', '' ); ?> </div>
		<?php endif; 
		get_template_part('networks'); ?>
</article>