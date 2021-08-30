<?php 
$get_meta = get_option( 'print_settings' );
$def = $get_meta['print_default'];

if (empty($def) ) : ?>

	<?php get_template_part('inc/print/default-gf');?>

<?php endif; ?>