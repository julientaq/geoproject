<?php
/**
 * Content for a single projects
 */
?>

	<header class="project-header">

		<h1 class="project-title">
			<div class="iont"><ion-icon name="cellular"></ion-icon></div> <?php the_title(); ?>
		</h1>

		<?php
		$project_date = get_post_meta( get_the_ID(), 'gp_year', true );
		$project_month = get_post_meta( get_the_ID(), 'gp_month', true );
		$project_day = get_post_meta( get_the_ID(), 'gp_day', true );

		$gp_hide_date = get_post_meta( get_the_ID(), 'gp_hide_date', true );

		if ( $project_date != ''  &&  !$gp_hide_date ) : ?>

			<p class="project-date">
				<span class="fa fa-clock-o"></span>  <span><?php _e( 'Started on', 'geoformat' ); ?> : </span>
				<?php echo $project_day . "-" . $project_month . "-" . $project_date; ?>
			</p>

		<?php endif; ?>

		<?php
		$project_owner = get_post_meta( get_the_ID(), 'gp_owner', true );
		$project_website = get_post_meta( get_the_ID(), 'gp_website', true );

		if ( $project_owner != '' ) : ?>

			<p class="project-owner">
				<span class="fa fa-user"></span> <span><?php _e( 'Initiated by', 'geoformat' ); ?> : </span>
				
				<?php if ( $project_website != '' ) : ?>
				
					<a href="<?php echo $project_website; ?>" target="_blank">
						<?php echo $project_owner; ?>
					</a>

				<?php else : ?>
	
					<?php echo $project_owner; ?>

				<?php endif; ?>

			</p>
	
		<?php endif; ?>
	</header>

	<?php
	// Has featured Image ?
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'gp-project-thumb' );
	}
	?>

	<div class="project-content">

		<?php the_content();
		
		if (has_tag()) : ?>
			<div id="geotagp">
				<ion-icon name="folder-open"></ion-icon> 
				<span><?php echo get_the_category_list( ', ' ); ?></span>
				&nbsp; 
				<?php the_tags( '<ion-icon name="pricetag"></ion-icon> &nbsp;', ', ', '<br />' ); ?> 
			</div>
		<?php endif; ?>
	
	<div class="share"><a href="#modal1" data-toggle="modal"><ion-icon name="share"></ion-icon></a></div>
		
	</div>
	
<?php 
	$get_meta = get_option( 'print_settings' );
	$pdf = $get_meta['print_pdf'];
	$preview = $get_meta['print_preview'];
	$linkprint = get_permalink();
	$linkprintpr = str_replace('projects','projects/print', $linkprint);
?>
	<?php if ( !empty($pdf) || !empty($preview) ) : ?>
	<div id="printpdf">
		
		<?php if ( !empty($pdf) ) : ?>
			<button class="btn" onclick="window.print()"><?php echo __('Print this page', 'geoformat'); ?></button>
		<?php endif; ?>
		<br/>
		<br/>
		<?php if (!empty($preview) ) : ?>
				<a href="<?php echo $linkprintpr; ?>" target="_blank">
					<button class="btn"><?php echo __('Preview before printing', 'geoformat'); ?></button>
				</a>
		<?php endif;?>
	</div>
	<?php endif; ?>

	<div class="modal" id="modal1">
		<div class="modal-dialog modal-lg modal-dialog-centered">
		  <div class="modal-content">
				<div class="modal-body">
					 <a href="#" data-dismiss="modal" class="close-modal"><ion-icon name="close"></ion-icon></a>
						 
					<div class="ion-modal"><ion-icon name="share"></ion-icon></div>
						
					<h4>Partager ce projet</h4>
						
					<h3><?php the_title(); ?></h3>
						
						<div class="networks-modal">
							<?php get_template_part('networks'); ?>
						</div>
						
						<div class="link"> <ion-icon name="link"></ion-icon> <br/> <?php the_permalink(); ?></div> 
						
				</div>
			</div>
		</div>
	</div>