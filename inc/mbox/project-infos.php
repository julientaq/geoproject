<?php
/**
 * Metabox : "Project"
 * Post types : post, maps
 * Goal : Choose a project for a post or a map
 *
 * @package GeoProjects
 */


//Register Metabox

function gp_mbox_project_infos() {
  	add_meta_box( 'mbox_project_infos', __( 'Additionnal Informations', 'geoformat' ), 'gp_mbox_project_infos_content', 'projects', 'normal', 'core' );
}

add_action( 'add_meta_boxes', 'gp_mbox_project_infos' );


// Content of the Metabox
// @param object $post Post Object

function gp_mbox_project_infos_content( $post ) {

    // Get fields values
    $gp_owner = get_post_meta( $post->ID, 'gp_owner', true );
    $gp_website = get_post_meta( $post->ID, 'gp_website', true );
    $gp_date = get_post_meta( $post->ID, 'gp_date', true );
    $gp_day = get_post_meta( $post->ID, 'gp_day', true );
    $gp_month = get_post_meta( $post->ID, 'gp_month', true );
    $gp_year = get_post_meta( $post->ID, 'gp_year', true );
    $gp_hide_date = get_post_meta( $post->ID, 'gp_hide_date', true );


    // Nonce Field
    wp_nonce_field( plugin_basename( __FILE__ ), 'mbox_project_infos_nonce' );

    // Display HTML
    ?>
    
    <table class="mbox-fields-table">
        
        <thead class="visuallyhidden">
            <tr>
                <th>
                    <?php _e( 'Field name', 'geoformat' ); ?>
                </th>

                <th>
                    <?php _e( 'Field value', 'geoformat' ); ?>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="mbox-field-name">
                    <label for="gp-owner"><?php _e( 'Project initiator', 'geoformat' ); ?></label>
                </td>
                <td class="mbox-field-value">
                    <p><input type="text" name="gp-owner" id="gp-owner" value="<?php echo $gp_owner; ?>"></p>
                </td>
            </tr>
            <tr>
                <td class="mbox-field-name">
                    <label for="gp-website"><?php _e( 'Initiator website URL', 'geoformat' ); ?></label>
                </td>
                <td class="mbox-field-value">
                    <p><input type="text" name="gp-website" id="gp-website" value="<?php echo $gp_website; ?>"></p>
                </td>
            </tr>
            <tr >
                <td class="pt-3 mbox-field-name">
                    <label for="gp-date"><?php _e( 'Project start date', 'geoformat' ); ?></label>
                    	<p class="meta-options">
					<label for="gp_hide_date" class="selectit"><input name="gp_hide_date" type="checkbox" id="gp_hide_date" <?php if($gp_hide_date){ echo "checked";} ?> value="<?php echo $gp_hide_date; ?>"> Masquer la date de publication</label><br>
					</p>
                </td>
                <td class="pt-3 mbox-field-value publish-date">
					<div>
						<label for="gp_day"><?php _e( 'Day', 'geoformat' ); ?></label>
						<select name="gp_day" id="gp_day">
						<option <?php echo ($gp_day === '1' ) ? 'selected' : '' ?>>1</option>
						<option <?php echo ($gp_day === '2' ) ? 'selected' : '' ?>>2</option>
						<option <?php echo ($gp_day === '3' ) ? 'selected' : '' ?>>3</option>
						<option <?php echo ($gp_day === '4' ) ? 'selected' : '' ?>>4</option>
						<option <?php echo ($gp_day === '5' ) ? 'selected' : '' ?>>5</option>
						<option <?php echo ($gp_day === '6' ) ? 'selected' : '' ?>>6</option>
						<option <?php echo ($gp_day === '7' ) ? 'selected' : '' ?>>7</option>
						<option <?php echo ($gp_day === '8' ) ? 'selected' : '' ?>>8</option>
						<option <?php echo ($gp_day === '9' ) ? 'selected' : '' ?>>9</option>
						<option <?php echo ($gp_day === '10' ) ? 'selected' : '' ?>>10</option>
						<option <?php echo ($gp_day === '11' ) ? 'selected' : '' ?>>11</option>
						<option <?php echo ($gp_day === '12' ) ? 'selected' : '' ?>>12</option>
						<option <?php echo ($gp_day === '13' ) ? 'selected' : '' ?>>13</option>
						<option <?php echo ($gp_day === '14' ) ? 'selected' : '' ?>>14</option>
						<option <?php echo ($gp_day === '15' ) ? 'selected' : '' ?>>15</option>
						<option <?php echo ($gp_day === '16' ) ? 'selected' : '' ?>>16</option>
						<option <?php echo ($gp_day === '17' ) ? 'selected' : '' ?>>17</option>
						<option <?php echo ($gp_day === '18' ) ? 'selected' : '' ?>>18</option>
						<option <?php echo ($gp_day === '19' ) ? 'selected' : '' ?>>19</option>
						<option <?php echo ($gp_day === '20' ) ? 'selected' : '' ?>>20</option>
						<option <?php echo ($gp_day === '21' ) ? 'selected' : '' ?>>21</option>
						<option <?php echo ($gp_day === '22' ) ? 'selected' : '' ?>>22</option>
						<option <?php echo ($gp_day === '23' ) ? 'selected' : '' ?>>23</option>
						<option <?php echo ($gp_day === '24' ) ? 'selected' : '' ?>>24</option>
						<option <?php echo ($gp_day === '25' ) ? 'selected' : '' ?>>25</option>
						<option <?php echo ($gp_day === '26' ) ? 'selected' : '' ?>>26</option>
						<option <?php echo ($gp_day === '27' ) ? 'selected' : '' ?>>27</option>
						<option <?php echo ($gp_day === '28' ) ? 'selected' : '' ?>>28</option>
						<option <?php echo ($gp_day === '29' ) ? 'selected' : '' ?>>29</option>
						<option <?php echo ($gp_day === '30' ) ? 'selected' : '' ?>>30</option>
						<option <?php echo ($gp_day === '31' ) ? 'selected' : '' ?>>31</option>
						</select>
					</div>	
					<div>
						<label for="gp_month"><?php _e( 'Month', 'geoformat' ); ?></label>
						<select name="gp_month" id="gp_month">
							<option <?php echo ($gp_month === '1' ) ? 'selected' : '' ?>>1</option>
							<option <?php echo ($gp_month === '2' ) ? 'selected' : '' ?>>2</option>
							<option <?php echo ($gp_month === '3' ) ? 'selected' : '' ?>>3</option>
							<option <?php echo ($gp_month === '4' ) ? 'selected' : '' ?>>4</option>
							<option <?php echo ($gp_month === '5' ) ? 'selected' : '' ?>>5</option>
							<option <?php echo ($gp_month === '6' ) ? 'selected' : '' ?>>6</option>
							<option <?php echo ($gp_month === '7' ) ? 'selected' : '' ?>>7</option>
							<option <?php echo ($gp_month === '8' ) ? 'selected' : '' ?>>8</option>
							<option <?php echo ($gp_month === '9' ) ? 'selected' : '' ?>>9</option>
							<option <?php echo ($gp_month === '10' ) ? 'selected' : '' ?>>10</option>
							<option <?php echo ($gp_month === '11' ) ? 'selected' : '' ?>>11</option>
							<option <?php echo ($gp_month === '12' ) ? 'selected' : '' ?>>12</option>
						</select>
					</div>
					<div>
						<label for="gp_year"><?php _e( 'Year ', 'geoformat' ); ?></label>
						<select name="gp_year" id="gp_year">
							<option <?php echo ($gp_year === '2019' ) ? 'selected' : '' ?>>2014</option>
							<option <?php echo ($gp_year === '2019' ) ? 'selected' : '' ?>>2015</option>
							<option <?php echo ($gp_year === '2019' ) ? 'selected' : '' ?>>2016</option>
							<option <?php echo ($gp_year === '2019' ) ? 'selected' : '' ?>>2017</option>
							<option <?php echo ($gp_year === '2019' ) ? 'selected' : '' ?>>2018</option>
							<option <?php echo ($gp_year === '2019' ) ? 'selected' : '' ?>>2019</option>
							<option <?php echo ($gp_year === '2020' ) ? 'selected' : '' ?>>2020</option>
							<option <?php echo ($gp_year === '2021' ) ? 'selected' : '' ?>>2021</option>
							<option <?php echo ($gp_year === '2022' ) ? 'selected' : '' ?>>2022</option>
							<option <?php echo ($gp_year === '2022' ) ? 'selected' : '' ?>>2023</option>
						</select>
					</div>
				
                </td>
            </tr>
           
        </tbody>

    </table>

    <?php
}


// Save the Metaboxes data
// @param  Int $post_id ID of the post

function gp_save_mbox_project_infos( $post_id ) {
  
    // Don't do anything for auto-save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return $post_id;

    // No nonce ?
    if( !isset( $_POST['mbox_project_infos_nonce'] ) )
        return $post_id;

    // Check nonce
    if ( !wp_verify_nonce( $_POST['mbox_project_infos_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    // Check permissions
    if ( !current_user_can( 'edit_posts', $post_id ) )
        return;

    if ( isset( $_POST['gp-website'] )  ) {

        $gp_website = trim( $_POST['gp-website'] );
        update_post_meta( $post_id, 'gp_website', sanitize_text_field($gp_website) );
	}
	if ( isset( $_POST['gp-owner'] )  ) {
        $gp_owner = trim( $_POST['gp-owner'] );
        update_post_meta( $post_id, 'gp_owner', sanitize_text_field($gp_owner) );
	}
	if ( isset( $_POST['gp-date'] )  ) {
        $gp_date = trim( $_POST['gp-date'] );
        update_post_meta( $post_id, 'gp_date', sanitize_text_field($gp_date));
	}
	if ( isset( $_POST['gp_day'] )  ) {
		$gp_day = trim( $_POST['gp_day'] );
        update_post_meta( $post_id, 'gp_day', sanitize_text_field($gp_day));
	}	
	if ( isset( $_POST['gp_month'] )  ) {
		$gp_month = trim( $_POST['gp_month'] );
        update_post_meta( $post_id, 'gp_month', sanitize_text_field($gp_month));
	}
	if ( isset( $_POST['gp_year'] )  ) {
		$gp_year = trim( $_POST['gp_year'] );
        update_post_meta( $post_id, 'gp_year', sanitize_text_field($gp_year));
    }

	if ( isset( $_POST['gp_hide_date'] ) ) {
	    update_post_meta( $post_id, 'gp_hide_date', 'on', true );
	} else {
	    delete_post_meta( $post_id, 'gp_hide_date' );
	}




}

add_action( 'save_post', 'gp_save_mbox_project_infos' );
?>