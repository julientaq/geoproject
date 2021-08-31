<?php
/**
 * GeoProjects Admin Menus
 *
 * @package GeoProjects
 */


/**
 * Add admin menus
 * - Theme Settings page
 */
function gp_admin_menu() {
	// Main Menu
	add_menu_page( __( 'Theme settings', 'geoformat' ), __( 'Settings GP', 'geoformat' ), 'delete_others_posts', 'gp_geoprojects_page', 'gp_geoprojects_page_content', 'dashicons-admin-generic', '59');

	// Submenus
	add_submenu_page( 'gp_geoprojects_page', __( 'FAQ - Help', 'geoformat' ), __( 'FAQ- Help', 'geoformat' ), 'delete_others_posts', 'faq_help', 'faq_help' . '_content' );
	
	// Fix the title of the 1st submenu which is the same link than the top level but not the same text
	global $submenu;
	
	if ( isset( $submenu['gp_geoprojects_page'] ) ) {
		$submenu['gp_geoprojects_page'][0][0] = __( 'Theme settings', 'geoformat' );
	}
}

add_action( 'admin_menu', 'gp_admin_menu' );


/**
 * Theme settings page content
 */
function gp_geoprojects_page_content() {
	?>

	<div id="page_settings" class="wrap">
  
		<div id="icon-options-general" class="icon32"><br></div>
		<h2><?php _e( 'Theme settings', 'geoformat' ); ?></h2>

		<?php settings_errors(); ?>

		<h2 class="nav-tab-wrapper">
			 <a href="#" class="nav-tab navtab1 active1"><?php _e( 'Storytelling and maps', 'geoformat' ); ?></a>	 
			 <a href="#" class="nav-tab navtab2 active2"><?php _e( 'Design', 'geoformat' ); ?></a>
			 <a href="#" class="nav-tab navtab7 active7"><?php _e( 'Homepage', 'geoformat' ); ?></a> 	 
			 <a href="#" class="nav-tab navtab4 active4"><?php _e( 'Geoformat', 'geoformat' ); ?></a>
			 <a href="#" class="nav-tab navtab3 active3"><?php _e( 'Social Networks', 'geoformat' ); ?></a>
			 <a href="#" class="nav-tab navtab5 active5"><?php _e( 'Metadata & analytics', 'geoformat' ); ?></a>
			 <a href="#" class="nav-tab navtab6 active6"><?php _e( 'Footer content', 'geoformat' ); ?></a>
		</h2>
		
		<form action="options.php" method="post">

		<div id="tab1" class="ui-sortable meta-box-sortables">
			<h3><?php _e( 'General settings for projects', 'geoformat' ); ?></h3>
				<?php
				settings_fields( 'gp_options' );
				do_settings_sections( 'gp_theme_settings' );
				?>

		</div>
		
		<div id="tab2" class="ui-sortable meta-box-sortables">
			
				<?php
				settings_fields( 'gp_options' );
				do_settings_sections( 'gp_theme_settings_design' );
				?>

		</div>
		
		<div id="tab3" class="ui-sortable meta-box-sortables">
		
			<?php
				settings_fields( 'gp_options' );
				do_settings_sections( 'gp_theme_settings_social' );
				do_settings_sections( 'gp_theme_settings_socials' );
				do_settings_sections( 'gp_theme_settings_card' );
			?>
		</div>
		
		<div id="tab4" class="ui-sortable meta-box-sortables" style="max-width:900px;">
			
			<h3><?php _e( 'General settings for Geoformats', 'geoformat' ); ?></h3>
			
			<?php
				settings_fields( 'gp_options' );				
				do_settings_sections("gp_theme_settings_geoformat");      
			?>          
			
			<h3><?php _e( 'Set your Geofomats', 'geoformat' ); ?></h3>
			
			<div style="padding:10px;border:1px solid #CDCDCD;font-size:1.2em!important;background:#FFFFFF;font-weight:normel!important;">
				<p>
				<?php _e( 'The settings of each Geoformat must be done at the creation of each new Geoformat. Several options will then be proposed to customize your Geoformat. No field is required: what is not completed or activated will not be displayed. If you do not want to review these settings with each new geoformat, display the list and hover over the Geoformat of your choice. Then click on "Duplicate Model". This action duplicates all settings but beware: it also duplicates the contents!', 'geoformat' ); ?>
				
				</p>
				<p>
					<strong><?php _e( 'You can find more information in the "FAQ" page of the "GP Settings" menu.', 'geoformat' ); ?></strong>
				</p>
			</div>
		</div>
		
		<div id="tab5" class="ui-sortable meta-box-sortables">
		
			<?php
				settings_fields( 'gp_options' );
				do_settings_sections("gp_theme_settings_metadata");      
				do_settings_sections( 'gp_theme_settings_analytics' );
			?>
		</div>
		
		<div id="tab6" class="ui-sortable meta-box-sortables">
			<?php
				settings_fields( 'gp_options' );
				do_settings_sections( 'gp_theme_settings_footer' );
			?>
		</div>
		
		<div id="tab7" class="ui-sortable meta-box-sortables">
			<?php
				settings_fields( 'gp_options' );
				do_settings_sections( 'gp_theme_settings_homepage' );
			?>
		</div>			
				<p class="submit">
					<input type="submit" name="Submit" value="<?php _e( 'Save changes', 'geoformat' ); ?>" class="button-primary">
				</p>

			</form>
		
	</div>

	<?php
}

/**
 * Help Page Content
 */
function faq_help_content() {

	require_once( get_template_directory() . '/inc/admin/help.php' );

}
?>