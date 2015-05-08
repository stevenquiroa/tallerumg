<?php
/**
* Plugin Name: Mis tags de Facebook
* Plugin URI: http://nadd.co
* Description: Este plugin te va a permitir bonitos enlaces en facebook.
* Version: 1.0.0
* Author: Steven Quiroa
* Author URI: http://quiroa.me
* License: GPL2
*/ 
add_action( 'wp_head', 'my_facebook_tags' );
function my_facebook_tags() {
	if( is_single() ) {
		?>
		<meta property="og:title" content="<?php the_title() ?>" />
		<meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>" />
		<meta property="og:url" content="<?php the_permalink() ?>" />
		<meta property="og:description" content="<?php the_excerpt() ?>" />
		<meta property="og:type" content="article" />
		<?php
		if ( has_post_thumbnail() ) :
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		?>
		<meta property="og:image" content="<?php echo $image[0]; ?>"/>
	<?php endif; ?>
	<?php
	}
} 