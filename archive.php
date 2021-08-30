<?php 
/*
Template Name: Template for archive pages
*/
get_header(); ?>

<div class="container tagpage">
	 <div id="page-content">

			<?php if ( have_posts() ) : ?>

				<header id="bigmap-header" class="header-archives">
				<h1><div class="iont"><ion-icon name="cellular"></ion-icon></div>
						<?php
							if ( is_category() ) {
								printf( __( 'Category Archives : %s', 'geoformat' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag Archives : %s', 'geoformat' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author Archives : %s', 'geoformat' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							} elseif ( is_day() ) {
								printf( __( 'Daily Archives : %s', 'geoformat' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives : %s', 'geoformat' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives : %s', 'geoformat' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} else {
								_e( 'Archives', 'geoformat' );

							}
						?>
					</h1>
					<?php
						if ( is_category() ) {
							// show an optional category description
							$category_description = category_description();
							if ( ! empty( $category_description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

						} elseif ( is_tag() ) {
							// show an optional tag description
							$tag_description = tag_description();
							if ( ! empty( $tag_description ) )
								echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						}
					?>
					
					<div id="archives" class="dropdown">
						<div id="list-archive">
							<div id="annee" >Archives par année <ion-icon name="arrow-dropdown"></ion-icon></div>
							<ul class="dropdown-menu" id="drop">
								<?php wp_get_archives('type=yearly'); ?>
							</ul> 
						</div>
					</div>
					<div class="clear"></div>
				</header>

				<?php get_template_part( 'category-loop' ); 
				
		endif; ?>

	</div>
</div>
<?php get_footer(); ?>