<header class="marker-header">
	<h1 class="marker-title"><?php the_title(); ?></h1>
</header>

<?php
   
	if ( !empty(get_post_meta( get_the_ID(), 'gp_map', true ))) :
		$marker_map_ID = get_post_meta( get_the_ID(), 'gp_map', true );
    
		if ( $marker_map_ID != 0 ) :
			$marker_map = gp_query_get_map( $marker_map_ID );
		endif;
		
		if ( !empty(get_post_meta( $marker_map->ID, 'gp_project', true ))) :
			$marker_map_project_ID = get_post_meta( $marker_map->ID, 'gp_project', true );
		endif;
	endif;

	
			if ( !empty($marker_map_project_ID) ) :
            ?>
                <div class="same-map-title">
                    <strong><?php _e( 'Linked map:', 'geoformat' ); ?> </strong>
					<a href="<?php echo get_permalink( $marker_map ); ?>" title="<?php _e( 'See this map', 'geoformat' ); ?>">
                        <?php echo $marker_map->post_title; ?>
                    </a>
                </div>
			<?php endif;?>
			
				<div class="clear"></div>

               <?php
                if ( !empty($marker_map_project_ID) && $marker_map_project_ID != '' ) :
                    $marker_map_project = gp_query_get_project( $marker_map_project_ID );

                    if ( $marker_map_project != '' ) : ?>

                        <p class="marker-project">
                            <strong><?php _e( 'Linked project: ', 'geoformat' ); ?></strong>
                            <a href="<?php echo get_permalink( $marker_map_project ); ?>" title="<?php _e( 'See this project', 'geoformat' ); ?>">
                                <?php echo $marker_map_project->post_title; ?>
                            </a>
                        </p>
               <?php 
					endif; 
						endif; ?>
				<?php

				if ( !empty(get_post_meta( get_the_ID(), 'gp_read_more_link', true ))) :

				$url_link = get_post_meta( get_the_ID(), 'gp_read_more_link', true );

				echo '<p class="otherLink"><a href="'.$url_link.'" target="_blank">
					<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
						<path stroke="black" d="M14.851 11.923c-.179-.641-.521-1.246-1.025-1.749-1.562-1.562-4.095-1.563-5.657 0l-4.998 4.998c-1.562 1.563-1.563 4.095 0 5.657 1.562 1.563 4.096 1.561 5.656 0l3.842-3.841.333.009c.404 0 .802-.04 1.189-.117l-4.657 4.656c-.975.976-2.255 1.464-3.535 1.464-1.28 0-2.56-.488-3.535-1.464-1.952-1.951-1.952-5.12 0-7.071l4.998-4.998c.975-.976 2.256-1.464 3.536-1.464 1.279 0 2.56.488 3.535 1.464.493.493.861 1.063 1.105 1.672l-.787.784zm-5.703.147c.178.643.521 1.25 1.026 1.756 1.562 1.563 4.096 1.561 5.656 0l4.999-4.998c1.563-1.562 1.563-4.095 0-5.657-1.562-1.562-4.095-1.563-5.657 0l-3.841 3.841-.333-.009c-.404 0-.802.04-1.189.117l4.656-4.656c.975-.976 2.256-1.464 3.536-1.464 1.279 0 2.56.488 3.535 1.464 1.951 1.951 1.951 5.119 0 7.071l-4.999 4.998c-.975.976-2.255 1.464-3.535 1.464-1.28 0-2.56-.488-3.535-1.464-.494-.495-.863-1.067-1.107-1.678l.788-.785z"/>
					</svg>'.$url_link.'</a></p>';
				endif;?>
				
				<div class="marker-content">
					<?php the_content(); ?>
				</div>
               
                <?php
                // Load Leaflet
                
				$gp_options = get_option( 'gp_options' );
				$map_tiles_provider = get_post_meta( get_the_ID(), 'gp_tiles_provider', true );
				$map_export = get_post_meta( get_the_ID(), 'gp_export', true );
				$overlay = get_post_meta( get_the_ID(), 'custom_image_displaying', true ); 
				if ( $map_export == '' ) { $map_export = $gp_options['export_maps']; }
				if ( $map_tiles_provider == '' ) :
					$map_tiles_provider = GP_DEFAULT_TILES_PROVIDER;
				endif;
				
				if (!isset($marker_map_ID)) :
					$marker_map_ID = 0;
					echo __('<p><strong>Error: you have to link your marker to a map</strong> - ', 'geoformat');
					edit_post_link( __( 'Edit', 'geoformat' ) ); 
					echo '</p>';
				else :
			
				?>
				
				<h4 id="samemap"><span class="iont"><ion-icon name="cellular"></ion-icon></span><?php echo __('In the same map','geoformat'); ?></h4>
				
				<?php endif; 
				
				$gp_options = get_option( 'gp_options' );
				$zoom = $gp_options['zoom']; 
				$overlay = get_post_meta( get_the_ID(), 'gp-overlay-map', true );
				?>
				
				<div class="gp-leaflet-map-container">
                    <div class="gp-leaflet-map-wrap">
                        <div id="gp-map-marker-<?php echo $marker_map_ID; ?>" class="gp-leaflet-map"
                            data-map-id="<?php echo $marker_map_ID; ?>"
                            <?php if ($overlay != 'replace') : ?>data-map-tiles="<?php echo $map_tiles_provider; ?>"<?php endif; ?>
							data-map-zoom="<?php echo $zoom; ?>"
                            <?php if ($overlay != 'replace') : ?>data-map-clusterize="1"<?php endif; ?>
							data-map-markers-index="1"
							data-map-controls="1"
							data-map-drag="1"
                            data-map-open-marker="<?php the_ID(); ?>"
								<?php if ( $map_export ) : ?>
								data-map-export="1"
							<?php endif;?>		
					> </div>
                    </div>
                </div>
				
	<div class="clear"></div>
		<?php if (has_tag()) : ?>
			<div id="geotagp"><?php the_tags( '#', ' #', ' ' ); ?></div>
		<?php endif;
		get_template_part('networks'); ?>

<div class="clear"></div>
