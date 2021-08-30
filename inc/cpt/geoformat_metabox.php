<?php
/**
 *Add METABOXES*
**/

//Metaboxes contents

add_action("add_meta_boxes", "add_gp_meta_box");
function add_gp_meta_box() {
    add_meta_box('gp-meta-box', __('Settings','geoformat'), 'geoformat_meta_callback', 'geoformat', 'side', 'high', null);
}
function geoformat_custom_meta() {
    add_meta_box( 'geoformat_meta', __( 'Settings', 'geoformat' ), 'geoformat_meta_callback', 'geoformat' );
}
function geoformat_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?>
<div id="wrap">
<h4 class="nav-tab-wrapper">	 
<a href="#" class="nav-tab navtab1 active1"> <?php _e( 'General', 'geoformat' ); ?> </a>	 
<a href="#" class="nav-tab navtab2 active2"> <?php _e( 'Intro', 'geoformat' ); ?> </a>	 
<a href="#" class="nav-tab navtab3 active3"> <?php _e( 'Content', 'geoformat' ); ?> </a> 
</h4> 
<div id="tab1" class="ui-sortable meta-box-sortables">	
	<p>		
		<label for="meta-color" class="geoformat-color"><?php _e( 'Theme color', 'geoformat' )?></label>		
		<br/>		
		<input name="meta-color" class="meta-color" type="text" value="<?php if ( isset ( $geoformat_stored_meta['meta-color'] ) ) { echo $geoformat_stored_meta['meta-color'][0]; } else { ?>#d91e18<?php } ?>" class="meta-color" />	
	</p>
	<p>		
		<label for="meta-text-color" class="geoformat-color"><?php _e( 'Text color', 'geoformat' )?></label>		
		<br/>		
		<input name="meta-text-color" class="meta-color" type="text" value="<?php if ( isset ( $geoformat_stored_meta['meta-text-color'] ) ) { echo $geoformat_stored_meta['meta-text-color'][0]; } else { ?>#121212<?php } ?>" class="meta-text-color" />	
	</p>
	<p>		
		<label for="body-color" class="geoformat-color"><?php _e( 'Background color', 'geoformat' )?></label>		
		<br/>		
		<input name="body-color" class="meta-color" type="text" value="<?php if ( isset ( $geoformat_stored_meta['body-color'] ) ) { echo $geoformat_stored_meta['body-color'][0]; } else { ?>#ffffff<?php } ?>" class="body-color" />	
	</p>
	<p>
		<label for="meta-font" class="geoformat-font"><?php _e( 'Font (texts)', 'geoformat' )?></label>
		<br/>
	<select name="meta-font" id="meta-font">

		<option value="select-seventeen" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-ten"); ?>>Roboto Slab, serif</option>';	
		<option value="select-sixteen" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-sixteen"); ?>>Roboto Condensed, sans-serif</option>';
		<option value="select-eleven" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-fifteen"); ?>>Coming Soon, cursive</option>';	
		<option value="select-eighteen" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-twenty-nine"); ?>>Special Elite, curisve</option>';
		<option value="select-thirty" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php if ( isset ( $geoformat_stored_meta['meta-font'] ) ) selected( $geoformat_stored_meta['meta-font'][0], "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	
        </select>
	</p>
	<p>
		<label for="meta-font_title" class="geoformat-font_title"><?php _e( 'Font (titles and captions)', 'geoformat' )?></label>
		<br/>
	<select name="meta-font_title" id="meta-font_title">
        <option value="select-seventeen" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-seventeen"); ?>>Raleway, sans-serif</option>';
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-one"); ?>>Arial, Helvetica, sans-serif</option>';
        <option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-two"); ?>>Georgia, serif</option>';
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-three"); ?>>Tahoma, Geneva, sans-serif</option>';
		<option value="select-four" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-four"); ?>>Times New Roman, Times, serif</option>';
		<option value="select-five" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-five"); ?>>Verdana, Geneva, sans-serif</option>';
		<option value="select-six" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-six"); ?>>Arvo, serif</option>';
		<option value="select-seven" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-seven"); ?>>Source Sans Pro, sans-serif</option>';
		<option value="select-eight" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-eight"); ?>>Open Sans, sans-serif</option>';
        <option value="select-nine" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-nine"); ?>>Roboto, sans-serif</option>';
		<option value="select-ten" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-ten"); ?>>Roboto Slab, serif</option>';
		<option value="select-eleven" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-eleven"); ?>>Lato, sans-serif</option>';
		<option value="select-twelve" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twelve"); ?>>Ubuntu Condensed, sans-serif</option>';
		<option value="select-thirteen" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-thirteen"); ?>>Inconsolata, cursive</option>';
		<option value="select-fourteen" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-fourteen"); ?>>Playfair Display, serif</option>';
		<option value="select-fifteen" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-fifteen"); ?>>Coming Soon, cursive</option>';
		<option value="select-sixteen" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-sixteen"); ?>>Roboto Light, sans-serif</option>';
		<option value="select-eighteen" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-eigtheen"); ?>>Bree, serif</option>';
		<option value="select-nineteen" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-nineteen"); ?>>Montserrat, sans-serif</option>';
		<option value="select-twenty" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty"); ?>>Oswald, sans-serif</option>';
		<option value="select-twenty-one" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-one"); ?>>Lobster, cursive</option>';
		<option value="select-twenty-two" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-two"); ?>>Lobster 2, cursive</option>';
		<option value="select-twenty-three" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-three"); ?>>Libre Baskerville, serif</option>';		
		<option value="select-twenty-four" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-four"); ?>>EB Garamond, serif</option>';
		<option value="select-twenty-five" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-five"); ?>>Faune, sans-serif</option>';
		<option value="select-twenty-six" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-six"); ?>>Play, serif</option>';
		<option value="select-twenty-seven" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-seven"); ?>>Quattrocento Sans, sans-serif</option>';
		<option value="select-twenty-eight" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-eight"); ?>>Quattrocento, serif</option>';
		<option value="select-twenty-nine" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-twenty-nine"); ?>>Special Elite, cursive</option>';
		<option value="select-thirty" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-thirty"); ?>>Karma, serif</option>';
		<option value="select-thirty-one" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-thirty-one"); ?>>Arbutus Slab, serif</option>';
		<option value="select-thirty-two" <?php if ( isset ( $geoformat_stored_meta['meta-font_title'] ) ) selected( $geoformat_stored_meta['meta-font_title'][0], "select-thirty-two"); ?>>Overpass Mono, monospace</option>';
	</select>
	</p>		
	
	<p>		
	<label for="meta-font-size" class="geoformat-font-size"><?php _e( 'Text size', 'geoformat' )?></label>		
	<br/>
	<select name="meta-font-size" id="meta-font-size">
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-font-size'] ) ) selected( $geoformat_stored_meta['meta-font-size'][0], 'select-one' ); ?>><?php _e( 'Medium', 'geoformat' )?></option>
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-font-size'] ) ) selected( $geoformat_stored_meta['meta-font-size'][0], 'select-two' ); ?>><?php _e( 'Large', 'geoformat' )?></option>			
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['meta-font-size'] ) ) selected( $geoformat_stored_meta['meta-font-size'][0], 'select-three' ); ?>><?php _e( 'Small', 'geoformat' )?></option>			
	</select>	
	</p>
	<p>		
	<label for="meta-col" class="geoformat-col"><?php _e( 'Column width', 'geoformat' )?></label>
	<br/>		
	<select name="meta-col" id="meta-col">			
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-col'] ) ) selected( $geoformat_stored_meta['meta-col'][0], 'select-one' ); ?>><?php _e( 'Medium', 'geoformat' )?></option>			
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-col'] ) ) selected( $geoformat_stored_meta['meta-col'][0], 'select-two' ); ?>><?php _e( 'Large', 'geoformat' )?></option>			
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['meta-col'] ) ) selected( $geoformat_stored_meta['meta-col'][0], 'select-three' ); ?>><?php _e( 'Small', 'geoformat' )?></option>			
	</select>	
	</p>
</div>
<div id="tab2" class="ui-sortable meta-box-sortables" style="display:none;">		 
	<div id="introt">
		
		<h3 class="gptxt"><?php _e('Page loading', 'geoformat');?></h3>
		<p>
		<label for="load-auteur" class="load-auteur"><?php _e( 'Display author\'s name', 'geoformat' )?></label>		
			<select name="load-auteur" id="load-auteur">				
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['load-auteur'] ) ) selected( $geoformat_stored_meta['load-auteur'][0], 'select-one' ); ?>><?php _e( 'Yes', 'geoformat' )?></option>				
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['load-auteur'] ) ) selected( $geoformat_stored_meta['load-auteur'][0], 'select-two' ); ?>><?php _e( 'No', 'geoformat' )?></option>				
			</select>
		</p>				
		
		<p>			
		<label for="meta-loader-animate" class="geoformat-loader-animate"><?php _e('Loading page fade out', 'geoformat' ); ?></label>			
		<br/>			
		<select name="meta-loader-animate" id="meta-loader-animate">				
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-loader-animate'] ) ) selected( $geoformat_stored_meta['meta-loader-animate'][0], 'select-one' ); ?>><?php _e( 'Faded', 'geoformat' )?></option>				
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-loader-animate'] ) ) selected( $geoformat_stored_meta['meta-loader-animate'][0], 'select-two' ); ?>><?php _e( 'Animated', 'geoformat' )?></option>				
		</select>		
		</p>
	</div>		
	<p>
	<label for="meta-animate" class="geoformat-animate"><?php _e( 'Intro effect', 'geoformat' )?></label>			
	<br/>			
	<select name="meta-animate" id="meta-animate">				
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-animate'] ) ) selected( $geoformat_stored_meta['meta-animate'][0], 'select-one' ); ?>><?php _e( 'Jump', 'geoformat' )?></option>				
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-animate'] ) ) selected( $geoformat_stored_meta['meta-animate'][0], 'select-two' ); ?>><?php _e( 'Push', 'geoformat' )?></option>				
	</select>
	</p>		 
	
	<p>			
	<label for="meta-trigger" class="geoformat-trigger"><?php _e( 'Trigger button', 'geoformat' )?></label>			
		<br/>			
	<select name="meta-trigger" id="meta-trigger">					
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['meta-trigger'] ) ) selected( $geoformat_stored_meta['meta-trigger'][0], 'select-three' ); ?>><?php _e( 'Arrow (small)', 'geoformat' )?></option>
		<option value="select-four" <?php if ( isset ( $geoformat_stored_meta['meta-trigger'] ) ) selected( $geoformat_stored_meta['meta-trigger'][0], 'select-four' ); ?>><?php _e( 'Arrow (small) width border', 'geoformat' )?></option>
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-trigger'] ) ) selected( $geoformat_stored_meta['meta-trigger'][0], 'select-two' ); ?>><?php _e( 'Arrow (medium)', 'geoformat' )?></option>
		<option value="select-five" <?php if ( isset ( $geoformat_stored_meta['meta-trigger'] ) ) selected( $geoformat_stored_meta['meta-trigger'][0], 'select-five' ); ?>><?php _e( 'Arrow (medium) with border', 'geoformat' )?></option>
		<option value="select-six" <?php if ( isset ( $geoformat_stored_meta['meta-trigger'] ) ) selected( $geoformat_stored_meta['meta-trigger'][0], 'select-six' ); ?>><?php _e( 'Arrow (full)', 'geoformat' )?></option>
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-trigger'] ) ) selected( $geoformat_stored_meta['meta-trigger'][0], 'select-one' ); ?>><?php _e( 'Text', 'geoformat' )?></option>			
	</select>		
	</p>		
	
	<div id="trigger-mes" style="display:none;">			
	<p>
	<label for="meta-trigger" class="geoformat-trigger"><?php _e( 'Trigger button text', 'geoformat' )?></label>			
	<br/>			
	<input type="text" name="trigger-text" id="trigger-text" class="trigger-text" placeholder="<?php _e('F.E. : Read more', 'geoformat');?>" value="<?php if ( isset ( $geoformat_stored_meta['trigger-text'] ) ) : $trigger = $geoformat_stored_meta['trigger-text'][0]; echo $trigger; endif; ?>" />		
	</div>				
		<?php if( !empty($trigger) )  : ?>		
			<style>#trigger-mes{display:block!important;}</style>				
		<?php endif; ?>
</div>	
	
	<div id="tab3" class="ui-sortable meta-box-sortables" style="display:none;">		
	
	<p>
		<label for="meta-bar" class="meta-bar"><?php _e( 'Progress bar position', 'geoformat' )?></label>		
		<br/>
		<select name="meta-bar" id="meta-bar">
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-bar'] ) ) selected( $geoformat_stored_meta['meta-bar'][0], 'select-one' ); ?>><?php _e( 'Top of the page', 'geoformat' )?></option>
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-bar'] ) ) selected( $geoformat_stored_meta['meta-bar'][0], 'select-two' ); ?>><?php _e( 'Bottom of the page', 'geoformat' )?></option>			
			<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['meta-bar'] ) ) selected( $geoformat_stored_meta['meta-bar'][0], 'select-three' ); ?>><?php _e( 'No progress bar', 'geoformat' )?></option>			
		</select>
	</p>
	
	<div id="bar">
	<h3 class="gptxt"><?php _e('Navbar', 'geoformat');?></h3>	
	
	<p>	
	<label for="top-bar" class="top-bar"><?php _e( 'Background color', 'geoformat' )?></label>		
	<select name="top-bar" id="top-bar">				
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['top-bar'] ) ) selected( $geoformat_stored_meta['top-bar'][0], 'select-one' ); ?>><?php _e( 'Theme color', 'geoformat' )?></option>				
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['top-bar'] ) ) selected( $geoformat_stored_meta['top-bar'][0], 'select-two' ); ?>><?php _e( 'White', 'geoformat' )?></option>				
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['top-bar'] ) ) selected( $geoformat_stored_meta['top-bar'][0], 'select-three' ); ?>><?php _e( 'Black', 'geoformat' )?></option>			
	</select>	
	</p>		
	
	<p>	
		<label for="shadow" class="shadow"><?php _e( 'Add shadow', 'geoformat' )?></label>		
		<select name="shadow" id="shadow">				
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['shadow'] ) ) selected( $geoformat_stored_meta['shadow'][0], 'select-one' ); ?>><?php _e( 'No', 'geoformat' )?></option>				
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['shadow'] ) ) selected( $geoformat_stored_meta['shadow'][0], 'select-two' ); ?>><?php _e( 'Yes', 'geoformat' )?></option>				
		</select>
	</p>
	
	<p>	
	<label for="reseaux" class="reseaux"><?php _e( 'Social networks icons', 'geoformat' )?></label>		
		<select name="reseaux" id="reseaux">				
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['reseaux'] ) ) selected( $geoformat_stored_meta['reseaux'][0], 'select-one' ); ?>><?php _e( 'Theme color', 'geoformat' )?></option>				
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['reseaux'] ) ) selected( $geoformat_stored_meta['reseaux'][0], 'select-two' ); ?>><?php _e( 'White', 'geoformat' )?></option>				
			<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['reseaux'] ) ) selected( $geoformat_stored_meta['reseaux'][0], 'select-three' ); ?>><?php _e( 'Black', 'geoformat' )?></option>			
		</select>	
	</p>		
		
	<p>	
		<label for="burger" class="burger"><?php _e( 'Intrapage navigation', 'geoformat' )?></label>		
		<select name="burger" id="burger">				
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['burger'] ) ) selected( $geoformat_stored_meta['burger'][0], 'select-one' ); ?>><?php _e( 'Section title', 'geoformat' )?></option>				
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['burger'] ) ) selected( $geoformat_stored_meta['burger'][0], 'select-two' ); ?>><?php _e( 'Circles', 'geoformat' )?></option>
			<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['burger'] ) ) selected( $geoformat_stored_meta['burger'][0], 'select-three' ); ?>><?php _e( 'No intrapage navigation', 'geoformat' )?></option>			
		</select>	
	</p>
	<p>
		<label for="bar-title" class="bar-title"><?php _e( 'Display the title', 'geoformat' )?></label>		
		<br/>
		<select name="bar-title" id="bar-title">
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['bar-title'] ) ) selected( $geoformat_stored_meta['bar-title'][0], 'select-one' ); ?>><?php _e( 'Yes', 'geoformat' )?></option>
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['bar-title'] ) ) selected( $geoformat_stored_meta['bar-title'][0], 'select-two' ); ?>><?php _e( 'No', 'geoformat' )?></option>			
		</select>
	</p>
	
	<p>
		<label for="bar-title-site" class="bar-title-site"><?php _e( 'Display the title of the website', 'geoformat' )?></label>		
		<br/>
		<select name="bar-title-site" id="bar-title-site">
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['bar-title-site'] ) ) selected( $geoformat_stored_meta['bar-title-site'][0], 'select-one' ); ?>><?php _e( 'Yes', 'geoformat' )?></option>
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['bar-title-site'] ) ) selected( $geoformat_stored_meta['bar-title-site'][0], 'select-two' ); ?>><?php _e( 'No', 'geoformat' )?></option>			
		</select>
	</p>
	</div>		
	
	<p>
	<label for="quote-design" class="quote-design"><?php _e( 'Blockquote style', 'geoformat' )?></label>			
	<select name="quote-design" id="quote-design">				
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['quote-design'] ) ) selected( $geoformat_stored_meta['quote-design'][0], 'select-one' ); ?>><?php _e( 'Left border', 'geoformat' )?></option>				
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['quote-design'] ) ) selected( $geoformat_stored_meta['quote-design'][0], 'select-two' ); ?>><?php _e( 'Right border', 'geoformat' )?></option>				
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['quote-design'] ) ) selected( $geoformat_stored_meta['quote-design'][0], 'select-three' ); ?>><?php _e( 'Bottom border', 'geoformat' )?></option>					
		<option value="select-five" <?php if ( isset ( $geoformat_stored_meta['quote-design'] ) ) selected( $geoformat_stored_meta['quote-design'][0], 'select-five' ); ?>><?php _e( 'Quotes (no border)', 'geoformat' )?></option>				
	</select>	
	</p>			
	
	<p>		
	<label for="quote" class="quote"><?php _e( 'Border type', 'geoformat' )?></label>		
	<select name="quote" id="quote">				
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['quote'] ) ) selected( $geoformat_stored_meta['quote'][0], 'select-one' ); ?>><?php _e( 'Theme color', 'geoformat' )?></option>				
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['quote'] ) ) selected( $geoformat_stored_meta['quote'][0], 'select-two' ); ?>><?php _e( 'Theme color dotted', 'geoformat' )?></option>				
		<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['quote'] ) ) selected( $geoformat_stored_meta['quote'][0], 'select-three' ); ?>><?php _e( 'Light grey', 'geoformat' )?></option>					
		<option value="select-four" <?php if ( isset ( $geoformat_stored_meta['quote'] ) ) selected( $geoformat_stored_meta['quote'][0], 'select-four' ); ?>><?php _e( 'Light grey dotted', 'geoformat' )?></option>					
	</select>	
	</p>				
	
	
	</div>
</div>
	<?php
}

function geoformat_meta_save( $post_id ) {     
$is_autosave = wp_is_post_autosave( $post_id );    
$is_revision = wp_is_post_revision( $post_id );    
$is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }	
		if( isset( $_POST[ 'body-color' ] ) ) {
			update_post_meta( $post_id, 'body-color', sanitize_text_field($_POST[ 'body-color' ]) );
		} if( isset( $_POST[ 'meta-font' ] ) ) {
			update_post_meta( $post_id, 'meta-font', sanitize_text_field($_POST[ 'meta-font' ]) );
		} if( isset( $_POST[ 'meta-font_title' ] ) ) {
			update_post_meta( $post_id, 'meta-font_title', sanitize_text_field($_POST[ 'meta-font_title' ]) );
		} if( isset( $_POST[ 'meta-color' ] ) ) {
			update_post_meta( $post_id, 'meta-color', sanitize_text_field($_POST[ 'meta-color' ]) );
		}	if( isset( $_POST[ 'meta-text-color' ] ) ) {
			update_post_meta( $post_id, 'meta-text-color', sanitize_text_field($_POST[ 'meta-text-color' ]) );
		} if( isset( $_POST[ 'meta-col' ] ) ) {			
			update_post_meta( $post_id, 'meta-col', sanitize_text_field($_POST[ 'meta-col' ]) );		
		} if( isset( $_POST[ 'shadow' ] ) ) {			
			update_post_meta( $post_id, 'shadow', sanitize_text_field($_POST[ 'shadow' ]) );
		} if( isset( $_POST[ 'meta-font-size' ] ) ) {			
			update_post_meta( $post_id, 'meta-font-size', sanitize_text_field($_POST[ 'meta-font-size' ]) );		
		}	if( isset( $_POST[ 'meta-bar' ] ) ) {			
			update_post_meta( $post_id, 'meta-bar', sanitize_text_field($_POST[ 'meta-bar' ]) );		
		}	if( isset( $_POST[ 'meta-animate' ] ) ) {			
			update_post_meta( $post_id, 'meta-animate', sanitize_text_field($_POST[ 'animate' ]) );				
		}	if( isset( $_POST[ 'meta-trigger' ] ) ) {			
			update_post_meta( $post_id, 'meta-trigger', sanitize_text_field($_POST[ 'meta-trigger' ]) );		
		}	if( isset( $_POST[ 'trigger-text' ] ) ) {			
			update_post_meta( $post_id, 'trigger-text', sanitize_text_field($_POST[ 'trigger-text' ]) );		
		}	if( isset( $_POST[ 'load-auteur' ] ) ) {			
			update_post_meta( $post_id, 'load-auteur', sanitize_text_field($_POST[ 'load-auteur' ]) );		
		}	if( isset( $_POST[ 'top-bar' ] ) ) {			
			update_post_meta( $post_id, 'top-bar', sanitize_text_field($_POST[ 'top-bar' ]) );		
		}	if( isset( $_POST[ 'bar-sup' ] ) ) {			
			update_post_meta( $post_id, 'bar-sup', sanitize_text_field($_POST[ 'bar-sup' ]) );		
		}	if( isset( $_POST[ 'bar-title' ] ) ) {			
			update_post_meta( $post_id, 'bar-title', sanitize_text_field($_POST[ 'bar-title' ]) );
		}	if( isset( $_POST[ 'bar-title-site' ] ) ) {			
			update_post_meta( $post_id, 'bar-title-site', sanitize_text_field($_POST[ 'bar-title-site' ]) );
		}   if( isset( $_POST[ 'reseaux' ] ) ) {			
			update_post_meta( $post_id, 'reseaux', sanitize_text_field($_POST[ 'reseaux' ]) );		
		}	if( isset( $_POST[ 'quote' ] ) ) {			
			update_post_meta( $post_id, 'quote', sanitize_text_field($_POST[ 'quote' ]) );		
		}	if( isset( $_POST[ 'quote-design' ] ) ) {			
			update_post_meta( $post_id, 'quote-design', sanitize_text_field($_POST[ 'quote-design' ]) );		
		}	if( isset( $_POST[ 'burger' ] ) ) {			
			update_post_meta( $post_id, 'burger', sanitize_text_field($_POST[ 'burger' ]) );		
		}
}
add_action( 'save_post', 'geoformat_meta_save' );
//Sections
function gp_add_custom_box() {
	global $typenow;
		if( $typenow == 'geoformat' ) {
		  add_meta_box( 'wp_editor_chapo', __('Intro','geoformat'), 'wp_editor_chapo' );
		  add_meta_box( 'wp_editor_section_1', __('Chapter 1','geoformat'), 'wp_editor_meta_box' );
		  add_meta_box( 'wp_editor_section_2', __('Chapter 2','geoformat'), 'wp_editor_meta_box_2' );
		  add_meta_box( 'wp_editor_section_3', __('Chapter 3','geoformat'), 'wp_editor_meta_box_3' );
		  add_meta_box( 'wp_editor_section_4', __('Chapter 4','geoformat'), 'wp_editor_meta_box_4' );
		  add_meta_box( 'wp_editor_section_5', __('Chapter 5','geoformat'), 'wp_editor_meta_box_5' );		  
		  add_meta_box( 'wp_editor_section_6', __('Chapter 6','geoformat'), 'wp_editor_meta_box_6' );		  
		  add_meta_box( 'wp_editor_section_7', __('Chapter 7','geoformat'), 'wp_editor_meta_box_7' );
		  add_meta_box( 'wp_editor_footer', __('Custom CSS','geoformat'), 'wp_editor_footer');
		}
}
add_action( 'add_meta_boxes', 'gp_add_custom_box' );

//Chapo
function wp_editor_chapo( $post ) {wp_nonce_field( plugin_basename( __FILE__ ), 'gp_nonce' );$geoformat_stored_meta = get_post_meta( $post->ID );
?>
    <p>
        <label for="meta-auteur" class="geoformat-auteur"><?php _e( 'Author(s)', 'geoformat' )?></label>
        <input type="text" name="meta-auteur" class="meta-text-title" id="meta-auteur" value="<?php if ( isset ( $geoformat_stored_meta['meta-auteur'] ) ) echo $geoformat_stored_meta['meta-auteur'][0]; ?>" />
    </p>
	<p>
        <label for="meta-photos" class="geoformat-photos"><?php _e( 'Author(s) of the pictures', 'geoformat' )?></label>
        <input type="text" name="meta-photos" class="meta-text-title" id="meta-photos" value="<?php if ( isset ( $geoformat_stored_meta['meta-photos'] ) ) echo $geoformat_stored_meta['meta-photos'][0]; ?>" />
    </p>
	<p>
        <label for="meta-subline" class="geoformat-subline"><?php _e( 'Subtitle', 'geoformat' )?></label>
        <textarea type="text" name="meta-subline" class="meta-text-title" id="meta_subline" /><?php if ( isset ( $geoformat_stored_meta['meta-subline'] ) ) echo $geoformat_stored_meta['meta-subline'][0]; ?></textarea>
    </p>
	<p>
		<label for="section_title_align" class="geoformat-font_title"><?php _e( 'Title position', 'geoformat' )?></label>
		<br/>
			<select name="section_title_align" id="section_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section_title_align'] ) ) selected( $geoformat_stored_meta['section_title_align'][0], 'select-one' ); ?>><?php _e( 'Centred',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section_title_align'] ) ) selected( $geoformat_stored_meta['section_title_align'][0], 'select-two' ); ?>><?php _e( 'Left', 'geoformat' )?></option>				
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section_title_align'] ) ) selected( $geoformat_stored_meta['section_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>				
			</select>
	</p>
	<p>
		<label for="section_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
			<select name="section_title_color" id="section_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section_title_color'] ) ) selected( $geoformat_stored_meta['section_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section_title_color'] ) ) selected( $geoformat_stored_meta['section_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>				
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section_title_color'] ) ) selected( $geoformat_stored_meta['section_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
			</select>
	</p>
	<p>
	<label for="meta-date" class="geoformat-date"><?php _e( 'Display date', 'geoformat' )?></label>			
	<br/>			
	<select name="meta-date" id="meta-date">				
		<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['meta-date'] ) ) selected( $geoformat_stored_meta['meta-date'][0], 'select-one' ); ?>><?php _e( 'Yes', 'geoformat' )?></option>				
		<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['meta-date'] ) ) selected( $geoformat_stored_meta['meta-date'][0], 'select-two' ); ?>><?php _e( 'No', 'geoformat' )?></option>				
	</select>
	</p>
	<p>
		<label for="meta-image" class="geoformat-title"><?php _e( 'Background image (intro)', 'geoformat' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image" id="meta-image" value="<?php if ( isset ( $geoformat_stored_meta['meta-image'] ) ) : $topimg = $geoformat_stored_meta['meta-image'][0]; echo $topimg; endif; ?>" />
			<input type="button" id="meta-image-button" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg ) ): ?>			
				<div class="img-gp" id="img-gp">
					<img src="<?php echo $topimg; ?>" id="imgtop" />
						<p class="remove_img" id="remove_img_intro">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
		<label for="meta-map" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the shortcode at the bottom of the map (via admin dashboard)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map" id="meta-map" value="<?php if ( isset ( $geoformat_stored_meta['meta-map'] ) ) echo $geoformat_stored_meta['meta-map'][0]; ?>" />
	</p>
	<p>
		<label for="meta-video" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-video" id="meta-video" value="<?php if ( isset ( $geoformat_stored_meta['meta-video'] ) ) echo $geoformat_stored_meta['meta-video'][0]; ?>" />
	</p>
	<hr />
	<h2 class="title-content"><?php _e('Intro of the article', 'geoformat'); ?></h2>	
	<?php 
	
	$field_value = get_post_meta( $post->ID, '_wp_editor_chapo', false );
	
	if ( $field_value == false ) :
		wp_editor( ' ', '_wp_editor_chapo' );
	else :
		wp_editor( $field_value[0], '_wp_editor_chapo' ); 
	endif;
	?>
	
	<h2 class="title-content"><?php _e('Add text (optional)', 'geoformat'); ?></h2>
	<?php	  
	$field_value = get_post_meta( $post->ID, '_wp_editor_text', false );	  
	
	if ( $field_value == false ) :
		wp_editor( ' ', '_wp_editor_text' );
	else :
		wp_editor( $field_value[0], '_wp_editor_text' ); 
	endif;	  
	
	$post1 = get_post_meta( get_the_ID(), '_wp_editor_section_1', true ); 
	$post2 = get_post_meta( get_the_ID(), 'meta-title_1', true ); 
	$post3 = get_post_meta( get_the_ID(), 'meta-image_1', true ); 
	$post3b = get_post_meta( get_the_ID(), 'meta-video_1', true ); 
		if( !empty( $post1 ) || !empty( $post2) || !empty( $post3 ) || !empty( $post3b ) ) : ?> 
			<style>
			#wp_editor_section_1{display:block;}
			#add1{display:none;}
			</style>
		<?php else: ?>
			<div id="add1" class="add"> 
				<?php _e( 'Add new chapter +', 'geoformat' )?>
			</div>
	<?php endif;
}
function geoformat_save_postdata_intro( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {        return;    }
		
		if( isset( $_POST[ 'meta-subline' ] ) ) {			
			update_post_meta( $post_id, 'meta-subline', sanitize_text_field($_POST[ 'meta-subline' ]) );
		}

		if( isset( $_POST[ 'meta-auteur' ] ) ) {			
			update_post_meta( $post_id, 'meta-auteur', sanitize_text_field($_POST[ 'meta-auteur' ]) );		}		
		if( isset( $_POST[ 'meta-photos' ] ) ) {
			update_post_meta( $post_id, 'meta-photos', sanitize_text_field($_POST[ 'meta-photos' ]) );
		}
		if( isset( $_POST[ 'meta-image' ] ) ) {
			update_post_meta( $post_id, 'meta-image', sanitize_text_field($_POST[ 'meta-image' ]) );
		}
		 if( isset( $_POST[ 'meta-video' ] ) ) {
			update_post_meta( $post_id, 'meta-video', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video' ])) ));
		}
		if( isset( $_POST[ 'meta-map' ] ) ) {
			update_post_meta( $post_id, 'meta-map', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map' ])) ));
		}
		if( isset( $_POST[ 'meta-date' ] ) ) {
			update_post_meta( $post_id, 'meta-date', sanitize_text_field($_POST[ 'meta-date' ]) );
		}
		if( isset( $_POST[ 'section_title_color' ] ) ) {			
			update_post_meta( $post_id, 'section_title_color', sanitize_text_field($_POST[ 'section_title_color' ]) );		
		}
		if( isset( $_POST[ 'section_title_align' ] ) ) {			
			update_post_meta( $post_id, 'section_title_align', sanitize_text_field($_POST[ 'section_title_align' ]) );		
			}   		
		$meta_chapo = '';
		if ( isset ( $_POST['_wp_editor_chapo'] ) ) {		
			$meta_chapo = update_post_meta( $post_id, '_wp_editor_chapo', $_POST['_wp_editor_chapo'] );	 
		}
		if ( isset ( $_POST['_wp_editor_text'] ) ) {		
			update_post_meta( $post_id, '_wp_editor_text', $_POST['_wp_editor_text'] );	 
		}
}
add_action( 'save_post', 'geoformat_save_postdata_intro' );
//Section 1
function wp_editor_meta_box( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );	
	?>		
	<p>
        <label for="meta-title_1" class="geoformat-title"><?php _e( 'Section title', 'geoformat' )?></label>
        <input type="text" name="meta-title_1" id="meta-text-title1" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['meta-title_1'] ) ) echo $geoformat_stored_meta['meta-title_1'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_1" class="geoformat-align"><?php _e( 'Alignement of the title', 'geoformat' )?></label>
        <br/>
		<select name="section1_title_align" id="section1_title_align" class="options">
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section1_title_align'] ) ) selected( $geoformat_stored_meta['section1_title_align'][0], 'select-one' ); ?>><?php _e( 'Left',  'geoformat' )?></option>
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section1_title_align'] ) ) selected( $geoformat_stored_meta['section1_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'geoformat' )?></option>
			<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section1_title_align'] ) ) selected( $geoformat_stored_meta['section1_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>
		</select>
	</p>
	<p>
		<label for="section1_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
		<select name="section1_title_color" id="section1_title_color" class="options">
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section1_title_color'] ) ) selected( $geoformat_stored_meta['section1_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section1_title_color'] ) ) selected( $geoformat_stored_meta['section1_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>
			<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section_title_color'] ) ) selected( $geoformat_stored_meta['section1_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
		</select>
	</p>
	<p>
		<label for="meta-image_1" class="geoformat-title"><?php _e( 'Background image (intro de la section)', 'geoformat' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image_1" id="meta-image_1" value="<?php if ( isset ( $geoformat_stored_meta['meta-image_1'] ) ) : $topimg_1 = $geoformat_stored_meta['meta-image_1'][0]; echo $topimg_1; endif; ?>" />
			<input type="button" id="meta-image-button_1" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_1 ) ): ?>			
				<div class="img-gp" id="img-gp_1">
					<img src="<?php echo $topimg_1; ?>" id="imgtop1" />
						<p class="remove_img" id="remove_img_1">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	
	<p>
		<label for="meta-map_1" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the embed code available at the bottom of the map (share button)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map_1" id="meta-map_1" value="<?php if ( isset ( $geoformat_stored_meta['meta-map_1'] ) ) echo $geoformat_stored_meta['meta-map_1'][0]; ?>" />
	</p>
	<p>
		<label for="meta-video_1" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_1" name="meta-video_1" id="meta-video_1" value="<?php if ( isset ( $geoformat_stored_meta['meta-video_1'] ) ) echo $geoformat_stored_meta['meta-video_1'][0]; ?>" />
	</p>
	
	<p>
        <label for="section1_caption" class="geoformat-title"><?php _e( 'Caption (below image, video or map)', 'geoformat' )?></label>
        <input type="text" name="section1_caption" id="section1_caption" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['section1_caption'] ) ) echo $geoformat_stored_meta['section1_caption'][0]; ?>" />
    </p>
	<hr/>
	<h2 class="title-content"><?php _e('Add content', 'geoformat'); ?></h2>
	<?php	
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_1', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_1' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_1' ); 
		endif;
		
	$post4 = get_post_meta( get_the_ID(), '_wp_editor_section_2', true ); 
	$post5 = get_post_meta( get_the_ID(), 'meta-title_2', true ); 
	$post6 = get_post_meta( get_the_ID(), 'meta-image_2', true ); 
	$post6b = get_post_meta( get_the_ID(), 'meta-video_2', true ); 
	$post6c = get_post_meta( get_the_ID(), 'meta-map_2', true ); 
		if( !empty( $post4 ) || !empty( $post5) || !empty( $post6 ) || !empty( $post6b ) || !empty( $post6c ) ) : ?> 
			<style>
			#wp_editor_section_2{display:block;}
			#add2{display:none;}
			</style>
		<?php else: ?>
			<div id="add2" class="add"> 
				<?php _e( 'Add new chapter +', 'geoformat' )?>
			</div>
	<?php endif;
}
function geoformat_save_postdata_1( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	  if( isset( $_POST[ 'meta-title_1' ] ) ) {
			update_post_meta( $post_id, 'meta-title_1', sanitize_text_field( $_POST[ 'meta-title_1' ] ) );
		}
		if( isset( $_POST[ 'section1_title_color' ] ) ) {
			update_post_meta( $post_id, 'section1_title_color', sanitize_text_field($_POST[ 'section1_title_color' ]) );
		}
		if( isset( $_POST[ 'section1_title_align' ] ) ) {
			update_post_meta( $post_id, 'section1_title_align', sanitize_text_field($_POST[ 'section1_title_align' ]) );
		}
	  if( isset( $_POST[ 'meta-map_1' ] ) ) {
			update_post_meta( $post_id, 'meta-map_1', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map_1' ])) ));
		}
	  if( isset( $_POST[ 'meta-image_1' ] ) ) {
		update_post_meta( $post_id, 'meta-image_1', sanitize_text_field($_POST[ 'meta-image_1' ]) );
	  }	  
	  if( isset( $_POST[ 'meta-video_1' ] ) ) {
			update_post_meta( $post_id, 'meta-video_1', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_1' ])) ));
		}
	  if( isset( $_POST[ 'section1_caption' ] ) ) {
			update_post_meta( $post_id, 'section1_caption', sanitize_text_field( $_POST[ 'section1_caption' ] ) );
		}
	  if ( isset ( $_POST['_wp_editor_section_1'] ) ) {
		update_post_meta( $post_id, '_wp_editor_section_1', $_POST['_wp_editor_section_1'] );
	  }
}
add_action( 'save_post', 'geoformat_save_postdata_1' );
//Section 2
function wp_editor_meta_box_2( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_2" class="geoformat-title"><?php _e( 'Section title', 'geoformat' )?></label>
        <input type="text" name="meta-title_2" id="meta-text-title_2" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['meta-title_2'] ) ) echo $geoformat_stored_meta['meta-title_2'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_2" class="geoformat-align"><?php _e( 'Alignement of the title', 'geoformat' )?></label>
        <br/>
			<select name="section2_title_align" id="section2_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section2_title_align'] ) ) selected( $geoformat_stored_meta['section2_title_align'][0], 'select-one' ); ?>><?php _e( 'Left',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section2_title_align'] ) ) selected( $geoformat_stored_meta['section2_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section2_title_align'] ) ) selected( $geoformat_stored_meta['section2_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="section2_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
		<select name="section2_title_color" id="section2_title_color" class="options">
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section2_title_color'] ) ) selected( $geoformat_stored_meta['section2_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section2_title_color'] ) ) selected( $geoformat_stored_meta['section2_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>
			<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section2_title_color'] ) ) selected( $geoformat_stored_meta['section2_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
		</select>
	</p>
	<p>
		<label for="meta-image_2" class="geoformat-row-title"><?php _e( 'Background image', 'geoformat' )?></label>
			<br/>
			<input type="text" class="meta-image" name="meta-image_2" id="meta-image_2" value="<?php if ( isset ( $geoformat_stored_meta['meta-image_2'] ) ) : $topimg_2 = $geoformat_stored_meta['meta-image_2'][0]; echo $topimg_2; endif; ?>" />
			<input type="button" id="meta-image-button_2" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_2 ) ): ?>			
				<div class="img-gp" id="img-gp_2">
					<img src="<?php echo $topimg_2; ?>" id="imgtop2" />
						<p class="remove_img" id="remove_img_2">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	
	<p>
		<label for="meta-map_2" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the embed code available at the bottom of the map (share button)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map_2" id="meta-map_2" value="<?php if ( isset ( $geoformat_stored_meta['meta-map_2'] ) ) echo $geoformat_stored_meta['meta-map_2'][0]; ?>" />
	</p>
	
	<p>
		<label for="meta-video_2" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_2" name="meta-video_2" id="meta-video_2" value="<?php if ( isset ( $geoformat_stored_meta['meta-video_2'] ) ) echo $geoformat_stored_meta['meta-video_2'][0]; ?>" />
	</p>
	
	<p>
        <label for="section2_caption" class="geoformat-title"><?php _e( 'Caption (below image, video or map)', 'geoformat' )?></label>
        <input type="text" name="section2_caption" id="section2_caption" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['section2_caption'] ) ) echo $geoformat_stored_meta['section2_caption'][0]; ?>" />
    </p>
	
	
	<hr/>
	<h2 class="title-content"><?php _e('Add content', 'geoformat'); ?></h2>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_2', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_2' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_2' ); 
		endif;
		
	$post7 = get_post_meta( get_the_ID(), '_wp_editor_section_3', true ); 
	$post8 = get_post_meta( get_the_ID(), 'meta-title_3', true ); 
	$post9 = get_post_meta( get_the_ID(), 'meta-image_3', true ); 
	$post9b = get_post_meta( get_the_ID(), 'meta-video_3', true ); 
	$post9c = get_post_meta( get_the_ID(), 'meta-map_3', true ); 
		if( !empty( $post7 ) || !empty( $post8) || !empty( $post9 ) || !empty( $post9b ) || !empty( $post9c ) ) : ?> 
			<style>
			#wp_editor_section_3{display:block;}
			#add3{display:none;}
			</style>
		<?php else: ?>
			<div id="add3" class="add"> 
				<?php _e( 'Add new chapter +', 'geoformat' )?>
			</div>
	<?php endif;
}
function geoformat_save_postdata_2( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_2' ] ) ) {
			update_post_meta( $post_id, 'meta-title_2', sanitize_text_field( $_POST[ 'meta-title_2' ] ) );
		}
		if( isset( $_POST[ 'section2_title_align' ] ) ) {
			update_post_meta( $post_id, 'section2_title_align', sanitize_text_field($_POST[ 'section2_title_align' ]) );
		}
		if( isset( $_POST[ 'section2_title_color' ] ) ) {
			update_post_meta( $post_id, 'section2_title_color', sanitize_text_field($_POST[ 'section2_title_color' ]) );
		}
		if( isset( $_POST[ 'meta-map_2' ] ) ) {
			update_post_meta( $post_id, 'meta-map_2', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map_2' ])) ));
		}
		if( isset( $_POST[ 'meta-image_2' ] ) ) {
			update_post_meta( $post_id, 'meta-image_2', sanitize_text_field($_POST[ 'meta-image_2' ]) );
		}
		if( isset( $_POST[ 'meta-video_2' ] ) ) {
			update_post_meta( $post_id, 'meta-video_2', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_2' ])) ));
		}
		if( isset( $_POST[ 'section2_caption' ] ) ) {
			update_post_meta( $post_id, 'section2_caption', sanitize_text_field( $_POST[ 'section2_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_2'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_2', $_POST['_wp_editor_section_2'] );
		}
}
add_action( 'save_post', 'geoformat_save_postdata_2' );
//Section 3
function wp_editor_meta_box_3( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_3" class="geoformat-title"><?php _e( 'Section title', 'geoformat' )?></label>
        <input type="text" name="meta-title_3" id="meta-text-title_3" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['meta-title_3'] ) ) echo $geoformat_stored_meta['meta-title_3'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_3" class="geoformat-align"><?php _e( 'Alignement of the title', 'geoformat' )?></label>
        <br/>
			<select name="section3_title_align" id="section3_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section3_title_align'] ) ) selected( $geoformat_stored_meta['section3_title_align'][0], 'select-one' ); ?>><?php _e( 'Left',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section3_title_align'] ) ) selected( $geoformat_stored_meta['section3_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section3_title_align'] ) ) selected( $geoformat_stored_meta['section3_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="section3_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
			<select name="section3_title_color" id="section3_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section3_title_color'] ) ) selected( $geoformat_stored_meta['section3_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section3_title_color'] ) ) selected( $geoformat_stored_meta['section3_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section3_title_color'] ) ) selected( $geoformat_stored_meta['section3_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_3" class="geoformat-row-title"><?php _e( 'Background image', 'geoformat' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image_3" id="meta-image_3" value="<?php if ( isset ( $geoformat_stored_meta['meta-image_3'] ) ) : $topimg_3 = $geoformat_stored_meta['meta-image_3'][0]; echo $topimg_3; endif; ?>" />
			<input type="button" id="meta-image-button_3" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_3 ) ): ?>			
				<div class="img-gp" id="img-gp_3">
					<img src="<?php echo $topimg_3; ?>" id="imgtop3" />
						<p class="remove_img" id="remove_img_3">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	
	<p>
		<label for="meta-map_3" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the shortcode at the bottom of the map (via admin dashboard)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map_3" id="meta-map_3" value="<?php if ( isset ( $geoformat_stored_meta['meta-map_3'] ) ) echo $geoformat_stored_meta['meta-map_3'][0]; ?>" />
	</p>
	
	<p>
		<label for="meta-video_3" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_3" name="meta-video_3" id="meta-video_3" value="<?php if ( isset ( $geoformat_stored_meta['meta-video_3'] ) ) echo $geoformat_stored_meta['meta-video_3'][0]; ?>" />
	</p>
	
	<p>
        <label for="section3_caption" class="geoformat-title"><?php _e( 'Caption (below image, video or map)', 'geoformat' )?></label>
        <input type="text" name="section3_caption" id="section3_caption" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['section3_caption'] ) ) echo $geoformat_stored_meta['section3_caption'][0]; ?>" />
    </p>
	
	<hr/>
	
	<h3 class="title-content2"><?php _e('Add content', 'geoformat'); ?></h3>
 
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_3', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_3' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_3' ); 
		endif;
	  
	$post10 = get_post_meta( get_the_ID(), '_wp_editor_section_4', true ); 
	$post11 = get_post_meta( get_the_ID(), 'meta-title_4', true ); 
	$post12 = get_post_meta( get_the_ID(), 'meta-image_4', true ); 
	$post12b = get_post_meta( get_the_ID(), 'meta-video_4', true ); 
	$post12c = get_post_meta( get_the_ID(), 'meta-map_4', true ); 
		if( !empty( $post10 ) || !empty( $post11) || !empty( $post12 ) || !empty( $post12b ) || !empty( $post12c ) ) : ?> 
			<style>
			#wp_editor_section_4{display:block!important;}
			#add4{display:none;}
			</style>
		<?php else: ?>
			<div id="add4" class="add"> 
				<?php _e( 'Add new chapter +', 'geoformat' )?>
			</div>
	<?php endif;
}
function geoformat_save_postdata_3( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
     if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
     }
	 if( isset( $_POST[ 'meta-title_3' ] ) ) {
			update_post_meta( $post_id, 'meta-title_3', sanitize_text_field( $_POST[ 'meta-title_3' ] ) );
		}
		
	if( isset( $_POST[ 'section3_title_align' ] ) ) {
			update_post_meta( $post_id, 'section3_title_align', sanitize_text_field($_POST[ 'section3_title_align' ]) );
		}
	 if( isset( $_POST[ 'section3_title_color' ] ) ) {
			update_post_meta( $post_id, 'section3_title_color', sanitize_text_field($_POST[ 'section3_title_color' ]) );
	 }
	 if( isset( $_POST[ 'meta-image_3' ] ) ) {
		update_post_meta( $post_id, 'meta-image_3', sanitize_text_field($_POST[ 'meta-image_3' ]) );
	 }
	 if( isset( $_POST[ 'meta-map_3' ] ) ) {
			update_post_meta( $post_id, 'meta-map_3', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map_3' ])) ));
	 }
	 if( isset( $_POST[ 'meta-video_3' ] ) ) {
			update_post_meta( $post_id, 'meta-video_3', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_3' ])) ));
	 }
	 if( isset( $_POST[ 'section3_caption' ] ) ) {
			update_post_meta( $post_id, 'section3_caption', sanitize_text_field( $_POST[ 'section3_caption' ] ) );
	 }
	 if ( isset ( $_POST['_wp_editor_section_3'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_3', $_POST['_wp_editor_section_3'] );
	  }
}
add_action( 'save_post', 'geoformat_save_postdata_3' );
//Section 4
function wp_editor_meta_box_4( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_4" class="geoformat-title"><?php _e( 'Section title', 'geoformat' )?></label>
        <input type="text" name="meta-title_4" id="meta-text-title_4" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['meta-title_4'] ) ) echo $geoformat_stored_meta['meta-title_4'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_4" class="geoformat-align"><?php _e( 'Alignement of the title', 'geoformat' )?></label>
        <br/>
			<select name="section4_title_align" id="section4_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section4_title_align'] ) ) selected( $geoformat_stored_meta['section4_title_align'][0], 'select-one' ); ?>><?php _e( 'Left',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section4_title_align'] ) ) selected( $geoformat_stored_meta['section4_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section4_title_align'] ) ) selected( $geoformat_stored_meta['section4_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="section4_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
		<select name="section4_title_color" id="section4_title_color" class="options">
			<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section4_title_color'] ) ) selected( $geoformat_stored_meta['section4_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
			<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section4_title_color'] ) ) selected( $geoformat_stored_meta['section4_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>
			<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section4_title_color'] ) ) selected( $geoformat_stored_meta['section4_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
		</select>
	</p>
	<p>
		<label for="meta-image_4" class="geoformat-row-title"><?php _e( 'Background image', 'geoformat' )?></label>
		<br/>
			<input type="text" class="meta-image" name="meta-image_4" id="meta-image_4" value="<?php if ( isset ( $geoformat_stored_meta['meta-image_4'] ) ) : $topimg_4 = $geoformat_stored_meta['meta-image_4'][0]; echo $topimg_4; endif; ?>" />
			<input type="button" id="meta-image-button_4" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_4 ) ): ?>			
				<div class="img-gp" id="img-gp_4">
					<img src="<?php echo $topimg_4; ?>" id="imgtop4" />
						<p class="remove_img" id="remove_img_4">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
		<label for="meta-map_4" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the shortcode at the bottom of the map (via admin dashboard)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map_4" id="meta-map_4" value="<?php if ( isset ( $geoformat_stored_meta['meta-map_4'] ) ) echo $geoformat_stored_meta['meta-map_4'][0]; ?>" />
	</p>
	<p>
		<label for="meta-video_4" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_4" name="meta-video_4" id="meta-video_4" value="<?php if ( isset ( $geoformat_stored_meta['meta-video_4'] ) ) echo $geoformat_stored_meta['meta-video_4'][0]; ?>" />
	</p>
	<p>
        <label for="section4_caption" class="geoformat-title"><?php _e( 'Caption (below image, video or map)', 'geoformat' )?></label>
        <input type="text" name="section4_caption" id="section4_caption" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['section4_caption'] ) ) echo $geoformat_stored_meta['section4_caption'][0]; ?>" />
    </p>
	<hr/>
	<h3 class="title-content2"><?php _e('Add content', 'geoformat'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_4', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_4' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_4' ); 
		endif;
		
	$post13 = get_post_meta( get_the_ID(), '_wp_editor_section_5', true ); 
	$post14 = get_post_meta( get_the_ID(), 'meta-title_5', true ); 
	$post15 = get_post_meta( get_the_ID(), 'meta-image_5', true ); 
	$post15b = get_post_meta( get_the_ID(), 'meta-video_5', true ); 
	$post15c = get_post_meta( get_the_ID(), 'meta-map_5', true ); 
		if( !empty( $post13 ) || !empty( $post14) || !empty( $post15 ) || !empty( $post15b ) || !empty( $post15c ) ) : ?> 
			<style>
			#wp_editor_section_5{display:block;}
			#add5{display:none;}
			</style>
		<?php else: ?>
			<div id="add5" class="add"> 
				<?php _e( 'Add new chapter +', 'geoformat' )?>
			</div>
	<?php endif;
}
function geoformat_save_postdata_4( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_4' ] ) ) {
			update_post_meta( $post_id, 'meta-title_4', sanitize_text_field( $_POST[ 'meta-title_4' ] ) );
		}
		if( isset( $_POST[ 'section4_title_color' ] ) ) {
			update_post_meta( $post_id, 'section4_title_color', sanitize_text_field($_POST[ 'section4_title_color' ]) );
		}
		if( isset( $_POST[ 'section4_title_align' ] ) ) {
			update_post_meta( $post_id, 'section4_title_align', sanitize_text_field($_POST[ 'section4_title_align' ]) );
		}
		if( isset( $_POST[ 'meta-map_4' ] ) ) {
			update_post_meta( $post_id, 'meta-map_4', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map_4' ])) ));
		}
		if( isset( $_POST[ 'meta-image_4' ] ) ) {
			update_post_meta( $post_id, 'meta-image_4', sanitize_text_field($_POST[ 'meta-image_4' ]) );
		}
		if( isset( $_POST[ 'section4_caption' ] ) ) {
			update_post_meta( $post_id, 'section4_caption', sanitize_text_field( $_POST[ 'section4_caption' ] ) );
		}
		if( isset( $_POST[ 'meta-video_4' ] ) ) {
			update_post_meta( $post_id, 'meta-video_4', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_4' ])) ));
		}
		if ( isset ( $_POST['_wp_editor_section_4'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_4', $_POST['_wp_editor_section_4'] );
		}
}
add_action( 'save_post', 'geoformat_save_postdata_4' );
//Section 5
function wp_editor_meta_box_5( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_5" class="geoformat-title"><?php _e( 'Section title', 'geoformat' )?></label>
        <input type="text" name="meta-title_5" id="meta-text-title_5" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['meta-title_5'] ) ) echo $geoformat_stored_meta['meta-title_5'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_5" class="geoformat-align"><?php _e( 'Alignement of the title', 'geoformat' )?></label>
        <br/>
			<select name="section5_title_align" id="section5_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section5_title_align'] ) ) selected( $geoformat_stored_meta['section5_title_align'][0], 'select-one' ); ?>><?php _e( 'Left',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section5_title_align'] ) ) selected( $geoformat_stored_meta['section5_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section5_title_align'] ) ) selected( $geoformat_stored_meta['section5_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="section5_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
			<select name="section5_title_color" id="section5_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section5_title_color'] ) ) selected( $geoformat_stored_meta['section5_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section5_title_color'] ) ) selected( $geoformat_stored_meta['section5_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section5_title_color'] ) ) selected( $geoformat_stored_meta['section5_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_5" class="geoformat-row-title"><?php _e( 'Background image', 'geoformat' )?></label>
			<br/>
		<input type="text" class="meta-image" name="meta-image_5" id="meta-image_5" value="<?php if ( isset ( $geoformat_stored_meta['meta-image_5'] ) ) : $topimg_5 = $geoformat_stored_meta['meta-image_5'][0]; echo $topimg_5; endif; ?>" />
			<input type="button" id="meta-image-button_5" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_5 ) ): ?>			
				<div class="img-gp" id="img-gp_5">
					<img src="<?php echo $topimg_5; ?>" id="imgtop5" />
						<p class="remove_img" id="remove_img_5">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
		<label for="meta-map_5" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the shortcode at the bottom of the map (via admin dashboard)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map_5" id="meta-map_5" value="<?php if ( isset ( $geoformat_stored_meta['meta-map_5'] ) ) echo $geoformat_stored_meta['meta-map_5'][0]; ?>" />
	</p>
	<p>
		<label for="meta-video_5" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_5" name="meta-video_5" id="meta-video_5" value="<?php if ( isset ( $geoformat_stored_meta['meta-video_5'] ) ) echo $geoformat_stored_meta['meta-video_5'][0]; ?>" />
	</p>
	<p>
        <label for="section5_caption" class="geoformat-title"><?php _e( 'Caption (below image, video or map)', 'geoformat' )?></label>
        <input type="text" name="section5_caption" id="section5_caption" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['section5_caption'] ) ) echo $geoformat_stored_meta['section5_caption'][0]; ?>" />
    </p>
	<hr/>
	<h3 class="title-content2"><?php _e('Add content', 'geoformat'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_5', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_5' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_5' ); 
		endif;
		
	$post16 = get_post_meta( get_the_ID(), '_wp_editor_section_6', true ); 
	$post17 = get_post_meta( get_the_ID(), 'meta-title_6', true ); 
	$post18 = get_post_meta( get_the_ID(), 'meta-image_6', true ); 
	$post18b = get_post_meta( get_the_ID(), 'meta-video_6', true ); 
	$post18c = get_post_meta( get_the_ID(), 'meta-map_6', true ); 
		if( !empty( $post16 ) || !empty( $post17) || !empty( $post18 ) || !empty( $post18b ) || !empty( $post18c ) ) : ?> 
			<style>
			#wp_editor_section_6{display:block;}
			#add6{display:none;}
			</style>
		<?php else: ?>
			<div id="add6" class="add"> 
				<?php _e( 'Add new chapter +', 'geoformat' )?>
			</div>
	<?php endif;
}
function geoformat_save_postdata_5( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_5' ] ) ) {
			update_post_meta( $post_id, 'meta-title_5', sanitize_text_field( $_POST[ 'meta-title_5' ] ) );
		}
		if( isset( $_POST[ 'section5_title_color' ] ) ) {
			update_post_meta( $post_id, 'section5_title_color', sanitize_text_field($_POST[ 'section5_title_color' ]) );
		}
		if( isset( $_POST[ 'section5_title_align' ] ) ) {
			update_post_meta( $post_id, 'section5_title_align', sanitize_text_field($_POST[ 'section5_title_align' ]) );
		}
		if( isset( $_POST[ 'meta-map_5' ] ) ) {
			update_post_meta( $post_id, 'meta-map_5', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map_5' ])) ));
		}
		if( isset( $_POST[ 'meta-image_5' ] ) ) {
			update_post_meta( $post_id, 'meta-image_5', sanitize_text_field($_POST[ 'meta-image_5' ]) );
		}
		if( isset( $_POST[ 'meta-video_5' ] ) ) {
			update_post_meta( $post_id, 'meta-video_5', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_5' ])) ));
		}
		if( isset( $_POST[ 'section5_caption' ] ) ) {
			update_post_meta( $post_id, 'section5_caption', sanitize_text_field( $_POST[ 'section5_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_5'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_5', $_POST['_wp_editor_section_5'] );
		}
}
add_action( 'save_post', 'geoformat_save_postdata_5' );
//Section 6
function wp_editor_meta_box_6( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_6" class="geoformat-title"><?php _e( 'Section title', 'geoformat' )?></label>
        <input type="text" name="meta-title_6" id="meta-text-title_6" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['meta-title_6'] ) ) echo $geoformat_stored_meta['meta-title_6'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_6" class="geoformat-align"><?php _e( 'Alignement of the title', 'geoformat' )?></label>
        <br/>
			<select name="section6_title_align" id="section6_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section6_title_align'] ) ) selected( $geoformat_stored_meta['section6_title_align'][0], 'select-one' ); ?>><?php _e( 'Left',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section6_title_align'] ) ) selected( $geoformat_stored_meta['section6_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section6_title_align'] ) ) selected( $geoformat_stored_meta['section6_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="section6_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
			<select name="section6_title_color" id="section6_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section6_title_color'] ) ) selected( $geoformat_stored_meta['section6_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section6_title_color'] ) ) selected( $geoformat_stored_meta['section6_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section6_title_color'] ) ) selected( $geoformat_stored_meta['section6_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_6" class="geoformat-row-title"><?php _e( 'Background image', 'geoformat' )?></label>
			<br/>
		<input type="text" class="meta-image" name="meta-image_6" id="meta-image_6" value="<?php if ( isset ( $geoformat_stored_meta['meta-image_6'] ) ) : $topimg_6 = $geoformat_stored_meta['meta-image_6'][0]; echo $topimg_6; endif; ?>" />
			<input type="button" id="meta-image-button_6" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_6 ) ): ?>			
				<div class="img-gp" id="img-gp_6">
					<img src="<?php echo $topimg_6; ?>" id="imgtop6" />
						<p class="remove_img" id="remove_img_6">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
		<label for="meta-map_6" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the shortcode at the bottom of the map (via admin dashboard)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map_6" id="meta-map_6" value="<?php if ( isset ( $geoformat_stored_meta['meta-map_6'] ) ) echo $geoformat_stored_meta['meta-map_6'][0]; ?>" />
	</p>
	<p>
		<label for="meta-video_6" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_6" name="meta-video_6" id="meta-video_6" value="<?php if ( isset ( $geoformat_stored_meta['meta-video_6'] ) ) echo $geoformat_stored_meta['meta-video_6'][0]; ?>" />
	</p>
	<p>
        <label for="section6_caption" class="geoformat-title"><?php _e( 'Caption (below image, video or map)', 'geoformat' )?></label>
        <input type="text" name="section6_caption" id="section6_caption" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['section6_caption'] ) ) echo $geoformat_stored_meta['section6_caption'][0]; ?>" />
    </p>
	<hr/>
	<h3 class="title-content2"><?php _e('Add content', 'geoformat'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_6', false );
		
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_6' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_6' ); 
		endif;
		
	$post19 = get_post_meta( get_the_ID(), '_wp_editor_section_7', true ); 
	$post20 = get_post_meta( get_the_ID(), 'meta-title_7', true ); 
	$post21 = get_post_meta( get_the_ID(), 'meta-image_7', true ); 
	$post21b = get_post_meta( get_the_ID(), 'meta-video_7', true ); 
	$post21c = get_post_meta( get_the_ID(), 'meta-video_7', true ); 
		if( !empty( $post19 ) || !empty( $post20) || !empty( $post21 ) || !empty( $post21b ) || !empty( $post21c ) ) : ?> 
			<style>
			#wp_editor_section_7{display:block;}
			#add7{display:none;}
			</style>
		<?php else: ?>
			<div id="add7" class="add"> 
				<?php _e( 'Add new chapter +', 'geoformat' )?>
			</div>
	<?php endif;
}
function geoformat_save_postdata_6( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_6' ] ) ) {
			update_post_meta( $post_id, 'meta-title_6', sanitize_text_field( $_POST[ 'meta-title_6' ] ) );
		}
		if( isset( $_POST[ 'section6_title_color' ] ) ) {
			update_post_meta( $post_id, 'section6_title_color', sanitize_text_field($_POST[ 'section6_title_color' ]) );
		}
		if( isset( $_POST[ 'section6_title_align' ] ) ) {
			update_post_meta( $post_id, 'section6_title_align', sanitize_text_field($_POST[ 'section6_title_align' ]) );
		}
		if( isset( $_POST[ 'meta-map_6' ] ) ) {
			update_post_meta( $post_id, 'meta-map_6', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map_6' ])) ));
		}
		if( isset( $_POST[ 'meta-image_6' ] ) ) {
			update_post_meta( $post_id, 'meta-image_6', sanitize_text_field($_POST[ 'meta-image_6' ]) );
		}
		if( isset( $_POST[ 'meta-video_6' ] ) ) {
			update_post_meta( $post_id, 'meta-video_6', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_6' ])) ));
		}
		if( isset( $_POST[ 'section6_caption' ] ) ) {
			update_post_meta( $post_id, 'section6_caption', sanitize_text_field( $_POST[ 'section6_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_6'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_6', $_POST['_wp_editor_section_6'] );
		}
}
add_action( 'save_post', 'geoformat_save_postdata_6' );
//Section 7
function wp_editor_meta_box_7( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'gp_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?> 
	<p>
        <label for="meta-title_7" class="geoformat-title"><?php _e( 'Section title', 'geoformat' )?></label>
        <input type="text" name="meta-title_7" id="meta-text-title_7" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['meta-title_7'] ) ) echo $geoformat_stored_meta['meta-title_7'][0]; ?>" />
    </p>
	<p>
        <label for="meta-align_7" class="geoformat-align"><?php _e( 'Alignement of the title', 'geoformat' )?></label>
        <br/>
			<select name="section7_title_align" id="section7_title_align" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section7_title_align'] ) ) selected( $geoformat_stored_meta['section7_title_align'][0], 'select-one' ); ?>><?php _e( 'Left',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section7_title_align'] ) ) selected( $geoformat_stored_meta['section7_title_align'][0], 'select-two' ); ?>><?php _e( 'Centre', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section7_title_align'] ) ) selected( $geoformat_stored_meta['section7_title_align'][0], 'select-three' ); ?>><?php _e( 'Right', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="section7_title_color" class="geoformat-font_title"><?php _e( 'Title color', 'geoformat' )?></label>
		<br/>
			<select name="section7_title_color" id="section7_title_color" class="options">
				<option value="select-one" <?php if ( isset ( $geoformat_stored_meta['section7_title_color'] ) ) selected( $geoformat_stored_meta['section7_title_color'][0], 'select-one' ); ?>><?php _e( 'White',  'geoformat' )?></option>
				<option value="select-two" <?php if ( isset ( $geoformat_stored_meta['section7_title_color'] ) ) selected( $geoformat_stored_meta['section7_title_color'][0], 'select-two' ); ?>><?php _e( 'Black', 'geoformat' )?></option>
				<option value="select-three" <?php if ( isset ( $geoformat_stored_meta['section7_title_color'] ) ) selected( $geoformat_stored_meta['section7_title_color'][0], 'select-three' ); ?>><?php _e( 'White on theme color background', 'geoformat' )?></option>
			</select>
	</p>
	<p>
		<label for="meta-image_7" class="geoformat-row-title"><?php _e( 'Background image', 'geoformat' )?></label>
			<br/>
		<input type="text" class="meta-image" name="meta-image_7" id="meta-image_7" value="<?php if ( isset ( $geoformat_stored_meta['meta-image_7'] ) ) : $topimg_7 = $geoformat_stored_meta['meta-image_7'][0]; echo $topimg_7; endif; ?>" />
			<input type="button" id="meta-image-button_7" class="button-gp" value="<?php _e( 'Choose your image', 'geoformat' )?>" />
		<br/>			
			
			<?php if( !empty( $topimg_7 ) ): ?>			
				<div class="img-gp" id="img-gp_7">
					<img src="<?php echo $topimg_7; ?>" id="imgtop7" />
						<p class="remove_img" id="remove_img_7">
							<a title="<?php _e('Remove', 'geoformat'); ?>" href="javascript:;" id="remove-footer-thumbnail"><?php _e('Remove image', 'geoformat'); ?></a>
						</p>			
				</div>
			<?php endif; ?>
	</p>
	<p>
		<label for="meta-map_7" class="geoformat-map"><?php _e( 'OR map in the background (copy-paste the shortcode at the bottom of the map (via admin dashboard)', 'geoformat' )?></label>
		<br/>
		<input type="text" class="meta-text-title" name="meta-map_7" id="meta-map_7" value="<?php if ( isset ( $geoformat_stored_meta['meta-map_7'] ) ) echo $geoformat_stored_meta['meta-map_7'][0]; ?>" />
	</p>
	<p>
		<label for="meta-video_7" class="geoformat-video"><?php _e( 'OR video background (copy-paste the code)', 'geoformat' )?></label>
		<br/>
		<input type="text" style="width:100%;" class="meta-video_7" name="meta-video_7" id="meta-video_7" value="<?php if ( isset ( $geoformat_stored_meta['meta-video_7'] ) ) echo $geoformat_stored_meta['meta-video_7'][0]; ?>" />
	</p>
		<p>
        <label for="section7_caption" class="geoformat-title"><?php _e( 'Caption (below image, video or map)', 'geoformat' )?></label>
        <input type="text" name="section7_caption" id="section7_caption" class="meta-text-title" value="<?php if ( isset ( $geoformat_stored_meta['section7_caption'] ) ) echo $geoformat_stored_meta['section7_caption'][0]; ?>" />
    </p>
	<hr/>
	<h3 class="title-content2"><?php _e('Add content', 'geoformat'); ?></h3>
	<?php
		$field_value = get_post_meta( $post->ID, '_wp_editor_section_7', false );
		if ( $field_value == false ) :
			wp_editor( ' ', '_wp_editor_section_7' );
		else :
			wp_editor( $field_value[0], '_wp_editor_section_7' ); 
		endif;
}
function geoformat_save_postdata_7( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gp_nonce' ] ) && wp_verify_nonce( $_POST[ 'gp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
		if( isset( $_POST[ 'meta-title_7' ] ) ) {
			update_post_meta( $post_id, 'meta-title_7', sanitize_text_field( $_POST[ 'meta-title_7' ] ) );
		}
		if( isset( $_POST[ 'section7_title_color' ] ) ) {
			update_post_meta( $post_id, 'section7_title_color', sanitize_text_field($_POST[ 'section7_title_color' ]) );
		}
		if( isset( $_POST[ 'section7_title_align' ] ) ) {
			update_post_meta( $post_id, 'section7_title_align', sanitize_text_field($_POST[ 'section7_title_align' ]) );
		}
		if( isset( $_POST[ 'meta-map_7' ] ) ) {
			update_post_meta( $post_id, 'meta-map_7', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-map_7' ])) ));
		}
		if( isset( $_POST[ 'meta-image_7' ] ) ) {
			update_post_meta( $post_id, 'meta-image_7', sanitize_text_field($_POST[ 'meta-image_7' ]) );
		}
		if( isset( $_POST[ 'meta-video_7' ] ) ) {
			update_post_meta( $post_id, 'meta-video_7', sanitize_text_field(htmlentities(stripslashes($_POST[ 'meta-video_7' ])) ));
		}
		if( isset( $_POST[ 'section7_caption' ] ) ) {
			update_post_meta( $post_id, 'section7_caption', sanitize_text_field( $_POST[ 'section7_caption' ] ) );
		}
		if ( isset ( $_POST['_wp_editor_section_7'] ) ) {
			update_post_meta( $post_id, '_wp_editor_section_7', $_POST['_wp_editor_section_7'] );
		}
}
add_action( 'save_post', 'geoformat_save_postdata_7' );

//Custom CSS
function wp_editor_footer( $post ) { 
	wp_nonce_field( basename( __FILE__ ), 'geoformat_nonce' );
    $geoformat_stored_meta = get_post_meta( $post->ID );
?> 

	 <p>
        <label for="custom-css" class="geoformat-subline"><?php _e( 'Additional style (advanced user)', 'geoformat' )?></label>
        
		<?php if ( isset ( $geoformat_stored_meta['custom-css'] ) ) { ?><textarea type="text" name="custom-css" class="meta-text-css" id="custom_css" /><?php echo $geoformat_stored_meta['custom-css'][0]; ?></textarea>
		<?php } else { ?><textarea type="text" name="custom-css" class="meta-text-css" id="custom_css" /></textarea>
		<?php } ?>
	</p>
	
<?php }

function geoformat_save_postdata_foot( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'geoformat_nonce' ] ) && wp_verify_nonce( $_POST[ 'geoformat_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
		}
		  if ( isset ( $_POST['custom-css'] ) ) {
			update_post_meta( $post_id, 'custom-css', $_POST['custom-css'] );
		  }
}
add_action( 'save_post', 'geoformat_save_postdata_foot' );
?>