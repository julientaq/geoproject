<?php 
//Template for error page

get_template_part('header'); ?>

<div class="container">
	 <div id="page-content">
	 
		<div class="col col-lg-12 col-md-12 erreur">
            <h1><?php _e('An error occured', 'geoformat'); ?></h1> 
			
			<div class="iconer">
				<ion-icon name="pin"></ion-icon>
			</div>

			   <p><?php _e( 'Page not found.<br/> Try another research or go back','geoformat');?><a href="<?php echo get_site_url(); ?>"> <?php _e(' to the homepage</a>','geoformat'); ?>.</p>
         </div>

	</div>
</div>
<?php get_footer(); ?>