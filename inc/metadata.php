<?php

//Metadata for sharings

function geoformat_html_meta_tags() {
	$options = get_option( 'gp_options' );
	
	if (!empty($options['description'])):
		$description = $options['description']; 
	else :
		$description = " ";
	endif;
	
	if (!empty($options['keywords'])):
		$keywords = $options['keywords']; 
	else :
		$keywords = " ";
	endif; ?>	
	
	<meta name="description" content="<?php echo $description; ?>" />
	<meta name="keywords" content="<?php echo $keywords; ?>" />		
<?php }
add_action( 'wp_head', 'geoformat_html_meta_tags', 1 );
	
function add_simple_metadata() {
	global $post;
	$options = get_option( 'gp_options' );
	if (!empty($options['card'])):
		$type = $options['card']; 
	else :
		$type = "summary";
	endif;
	$twitterid = $options['twitter_id'];
	if (!empty($options['default'])):
		$imagedef = $options['default']; 
	else :
		$imagedef = " ";
	endif;
	$site_lang = get_bloginfo('language');
	$subline = get_post_meta( get_the_ID(), 'meta-subline', true );
	if (!empty($options['description'])):
		$description = $options['description']; 
	else :
		$description = " ";
	endif;
	$cat_descr = category_description();
	
	global $wp;
	$link = home_url($wp->request);
		
		$author = get_the_author_meta('display_name'); 
		
		
		if (has_category()):
			$category = get_the_category();
			$cat = $category[0]->cat_name;
		endif;
	
		if ($type == 1) : 
			$type ='summary'; 
		else : 
			$type = 'summary_large_image'; 
		endif;
		
		if (is_single() && !is_404() && !is_home() || is_page() ) :		
			if (has_excerpt()) :
				$abstract = wp_strip_all_tags( get_the_excerpt(), true );
			else :
				$abstract = strip_tags($post->post_content);
				$abstract_more = '';
					if (strlen($abstract) > 155) :
						$abstract = substr($abstract,0,155);
						$abstract_more = ' ...';
					endif;
				$abstract = str_replace('"', '', $abstract);
				$abstract = str_replace("'", '', $abstract);
				$abstractwords = preg_split('/[\n\r\t ]+/', $abstract, -1, PREG_SPLIT_NO_EMPTY);
				array_pop($abstractwords);
					$abstract = implode(' ', $abstractwords) . $abstract_more;
			endif;			
		endif;
	
		if ( is_single() || is_page() ) :
			if (get_the_post_thumbnail($post->ID, 'thumbnail')) :
				$thumbnail_id = get_post_thumbnail_id($post->ID);
				$thumbnail_object = get_post($thumbnail_id);
				$image = $thumbnail_object->guid;
			else :	
				$image = $imagedef;
			endif;
		
		else : 
			$image = $imagedef;
		endif;	
//Open Graph Metadata  ?>	
			<meta property="og:type" content="article" /> 
			<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
			<meta property="og:determiner" content="auto" />
			<meta property="og:locale" content="<?php echo $site_lang; ?>" /> 
			<meta property="og:website" content="<?php echo get_site_url(); ?>" /> 
		<?php if (is_single()) : ?>
	<meta property="og:profile" content="<?php echo $author; ?>" /> 
		<?php endif; 
		if ( !empty ($fbadm) ) : ?>
			<meta property="fb:admins" content="<?php echo $fbadm; ?>"/> 
		<?php endif; 
	
	if (is_category() ) : ?>
	<meta property="og:title" content="<?php echo $cat; ?>" />
			<meta name="og:url" content="<?php echo $link; ?>">
		<?php if (!empty ($cat_descr) ) : ?>
	<meta name="og:description" content="<?php echo $cat_descr;  ?>" />
		<?php else : ?>
	<meta name="og:description" content="<?php echo $description;  ?>" />
		<?php endif; ?>
	<meta property="og:image" content="<?php echo $image; ?>" />
	<?php endif; 
		
	if (is_tag() ) : ?>
			<meta property="og:title" content="#<?php single_tag_title(); ?>" />
			<meta name="og:url" content="<?php echo $link; ?>">
			<meta name="og:description" content="<?php echo $description;  ?>" />
			<meta property="og:image" content="<?php echo $image; ?>">
	<?php endif; 

	if (is_author() ) : ?>
			<meta name="og:title" content="<?php echo $author;  ?>" />
			<meta name="og:url" content="<?php echo $link; ?>" />
			<meta name="og:description" content="<?php the_author_meta('description'); ?>" />
			<meta property="og:image" content="<?php echo $image; ?>" />
	<?php endif; 

	if (is_search() ) : ?>
			<meta name="og:title" content="<?php echo _e('Search results for:', 'geoformat'); the_search_query();  ?>" />
			<meta name="og:url" content="<?php echo $link; ?>">
			<meta name="og:description" content="<?php echo $description;  ?>" />
			<meta property="og:image" content="<?php echo $imagedef; ?>">
	<?php endif; 
		
	if (is_page() ) : ?>
			<meta property="og:title" content="<?php the_title(); ?>" />
			<meta name="og:url" content="<?php echo $link; ?>" /> 
		<?php if (!empty ($abstract) ) : ?>
			<meta name="og:description" content="<?php echo $abstract;  ?>" />
		<?php else: ?>
			<meta name="og:description" content="<?php echo $description;  ?>" />
		<?php endif; 
		if ( has_post_thumbnail() ) : ?>	
			<meta property="og:image" content="<?php echo the_post_thumbnail_url(); ?>" /> 
		<?php else: ?>
			<meta property="og:image" content="<?php echo $image; ?>" /> 
		<?php endif;
	endif; 
	
	if ( is_archive() && !is_author() ) : ?>
			<meta property="og:title" content="<?php the_archive_title(); ?>" />
			<meta name="og:url" content="<?php echo $link; ?>" /> 
		<?php if (!empty ($abstract) ) : ?>
			<meta name="og:description" content="<?php echo $abstract;  ?>" />
		<?php else: ?>
			<meta name="og:description" content="<?php echo $description;  ?>" />
		<?php endif; 
		if ( has_post_thumbnail() ) : ?>	
			<meta property="og:image" content="<?php echo the_post_thumbnail_url(); ?>" /> 
		<?php else: ?>
			<meta property="og:image" content="<?php echo $image; ?>" /> 
		<?php endif;
	endif; 

	if (is_home() || is_front_page() || is_search() ) : ?>
			<meta property="og:title" content="<?php bloginfo(); ?>" />
			<meta name="og:description" content="<?php echo $description;  ?>" />
			<meta property="og:image" content="<?php echo $imagedef; ?>">
			<meta property="og:url" content="<?php echo get_site_url(); ?>" />
	<?php endif; 
	if ( is_single () ) : ?>
	<meta property="og:title" content="<?php the_title(); ?>" /> 
		<?php if ( has_post_thumbnail() ) : ?>	
			<meta name="og:url" content="<?php echo $link; ?>" />
			<meta property="og:image" content="<?php echo the_post_thumbnail_url(); ?>" /> 
		<?php else: ?>
	<meta property="og:image" content="<?php echo $image; ?>" /> 
		<?php endif; 
		if (!empty ($subline) ) : ?>
	<meta property="og:description" content="<?php echo $subline; ?>" /> 
		<?php else: ?>
	<meta property="og:description" content="<?php echo $abstract; ?>" /> 
		<?php endif;
	endif; 
 
//Twitter
		if ( !empty($type) ) : ?>
	<meta name="twitter:card" value="<?php echo $type; ?>" /> 
		<?php endif;
		if (!empty ($twitterid) ) : ?>
			<meta name="twitter:site" value="<?php echo $twitterid; ?>" />
			<meta name="twitter:creator" value="<?php echo $twitterid; ?>" />
		<?php endif;

	if (is_category() ) : ?>
			<meta property="twitter:title" content="<?php echo $cat; ?>" />
			<meta name="twitter:url" content="<?php echo $link; ?>">
		<?php if (!empty ($cat_descr) ) : ?>
			<meta name="twitter:description" content="<?php echo $cat_descr;  ?>" />
		<?php else : ?>
			<meta name="twitter:description" content="<?php echo $description;  ?>" />
		<?php endif; ?>
			<meta property="twitter:image" content="<?php echo $image; ?>" />
	<?php endif; 

	if (is_tag() ) : ?>
			<meta property="twitter:title" content="#<?php single_tag_title(); ?>" />
			<meta name="twitter:url" content="<?php echo $link; ?>">
			<meta name="twitter:description" content="<?php echo $description;  ?>" />
			<meta property="twitter:image" content="<?php echo $image; ?>" />
	<?php endif; 

	if (is_author() ) : ?>
		<meta name="twitter:title" content="<?php echo $author;  ?>" />
		<meta name="twitter:url" content="<?php echo $link; ?>" />
		<meta name="twitter:description" content="<?php the_author_meta('description'); ?>" />
		<meta property="twitter:image" content="<?php echo $image; ?>" />
	<?php endif; 

	if (is_search() ) : ?>
		<meta name="twitter:title" content="<?php echo _e('Search results for:', 'geoformat'); the_search_query();  ?>" />
		<meta name="twitter:url" content="<?php echo $link; ?>">
		<meta name="twitter:description" content="<?php echo $description;  ?>" />
		<meta property="twitter:image" content="<?php echo $imagedef; ?>">
	<?php endif; 

	if (is_page()) : ?>
			<meta property="twitter:title" content="<?php the_title(); ?>" />
			<meta name="twitter:url" content="<?php echo $link; ?>">	
		<?php if (!empty ($abstract) ) : ?>
			<meta name="twitter:description" content="<?php echo $abstract;  ?>" />
		<?php else: ?>
			<meta name="twitter:description" content="<?php echo $description;  ?>" />
		<?php endif;  
		if ( has_post_thumbnail() ) : ?>	
			<meta property="twitter:image" content="<?php echo the_post_thumbnail_url(); ?>" /> 
		<?php else: ?>
			<meta property="twitter:image" content="<?php echo $image; ?>" /> 
		<?php endif;
	endif;
	if (is_archive() && !is_author() ) : ?>
			<meta property="twitter:title" content="<?php the_archive_title(); ?>" />
			<meta name="twitter:url" content="<?php echo $link; ?>">	
		<?php if (!empty ($abstract) ) : ?>
			<meta name="twitter:description" content="<?php echo $abstract;  ?>" />
		<?php else: ?>
			<meta name="twitter:description" content="<?php echo $description;  ?>" />
		<?php endif;  
		if ( has_post_thumbnail() ) : ?>	
			<meta property="twitter:image" content="<?php echo the_post_thumbnail_url(); ?>" /> 
		<?php else: ?>
			<meta property="twitter:image" content="<?php echo $image; ?>" /> 
		<?php endif;
	endif;
	
		if (is_home() || is_front_page() ) : ?>
			<meta property="twitter:title" content="<?php bloginfo(); ?>" />
			<meta name="twitter:description" content="<?php echo $description;  ?>" />
			<meta property="twitter:image" content="<?php echo $image; ?>">
			<meta property="twitter:url" content="<?php echo get_site_url(); ?>" />
		<?php endif; 	
	if ( is_single () ) : ?>
	<meta property="twitter:title" content="<?php the_title(); ?>" /> 
			<meta name="twitter:url" content="<?php echo $link; ?>"> 
		<?php if ( has_post_thumbnail() ) : ?>	
	<meta property="twitter:image" content="<?php echo the_post_thumbnail_url(); ?>" /> 
		<?php else: ?>
	<meta property="twitter:image" content="<?php echo $image; ?>" /> 
		<?php endif; 
		if (!empty ($subline) ) : ?>
	<meta property="twitter:description" content="<?php echo $subline; ?>" /> 
		<?php else: ?>
	<meta property="twitter:description" content="<?php echo $abstract; ?>" /> 
		<?php endif;
	endif;
	
		  
//Dublin Core  ?>
	<meta name="DC.Publisher" content="<?php echo get_bloginfo('name'); ?>" />
			<meta name="DC.Date" content="<?php the_time('Y-m-d'); ?>">
			<meta name="DC.Language" scheme="UTF-8" content="<?php echo $site_lang; ?>" />
		<?php if (has_category()): ?>
	<meta name="DC.Subject" content="<?php echo $cat; ?>" />
		<?php endif; 
		if ( is_single() ) : ?>
	<meta name="DC.Creator" content="<?php echo $author; ?>" /> 
		<?php endif;

	if (is_category() ) : ?>
	<meta property="DC.Title" content="<?php echo $cat; ?>" />
			<meta name="DC.Description" content="<?php echo $description;  ?>" />
			<meta name="DC.Identifier" content="<?php echo $link; ?>">
	<?php endif; 

	if (is_tag() ) : ?>
			<meta property="DC.Title" content="<?php the_title(); ?>" />
			<meta name="DC.Description" content="<?php echo $description;  ?>" />
			<meta name="DC.Identifier" content="<?php echo $link; ?>">
	<?php endif; 

	if (is_search() ) : ?>
			<meta name="DC.Title" content="<?php echo _e('Search results for:', 'geoformat'); the_search_query();  ?>" />
			<meta name="DC.Description" content="<?php echo $description;  ?>" />
			<meta name="DC.Identifier" content="<?php echo $link; ?>">
	<?php endif; 

	if (is_page() ) : ?>
			<meta property="DC.Title" content="<?php the_title(); ?>" />
			<meta name="DC.Identifier" content="<?php echo $link; ?>" />
		<?php if (!empty ($abstract) ) : ?>
			<meta name="DC.Description" content="<?php echo $abstract;  ?>" />
		<?php else: ?>
			<meta name="DC.Description" content="<?php echo $description;  ?>" />
		<?php endif;
	endif;
	
	if (is_archive() && !is_author() ) : ?>
			<meta property="DC.Title" content="<?php the_archive_title(); ?>" />
			<meta name="DC.Identifier" content="<?php echo $link; ?>" />
		<?php if (!empty ($abstract) ) : ?>
			<meta name="DC.Description" content="<?php echo $abstract;  ?>" />
		<?php else: ?>
			<meta name="DC.Description" content="<?php echo $description;  ?>" />
		<?php endif;
	endif;
 
	if (is_home() || is_front_page() ) : ?>
			<meta property="DC.Title" content="<?php bloginfo(); ?>" />
			<meta name="DC.Description" content="<?php echo $description;  ?>" />
			<meta name="DC.Identifier" content="<?php echo get_site_url(); ?>" />
	<?php endif; ?>
	<?php if ( is_single () ) : ?>
<meta name="DC.Identifier" content="<?php echo $link; ?>" />
			<meta property="DC.Title" content="<?php the_title(); ?>" /> 
		<?php if (!empty ($subline) ) : ?>
	<meta property="DC.Description" content="<?php echo $subline; ?>" /> 
		<?php else: ?>
	<meta property="DC.Description" content="<?php echo $abstract; ?>" /> 
		<?php endif;
	endif;

?>

<?php

}
add_action( 'wp_head', 'add_simple_metadata', 1 );
?>