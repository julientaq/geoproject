<?php //Sidebar with projects list ?>

<div class="container" id="main">
	<div id="page-content">
		<div class="row">
			<div class="col col-lg-2">
				<?php gp_the_projects_list_nav(); ?>
				<div class="my-5"><?php 
				$cpt = get_post_type();
				if( $cpt != "maps"  AND $cpt != "markers" AND $cpt != "capes" AND $cpt != "waymark_map" ):
					gp_the_categories_list_nav(); 
				endif;
				?></div>
			</div>
			
			<div class="col-lg-10">