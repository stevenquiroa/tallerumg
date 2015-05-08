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
add_action( 'publish_post', 'post_published_notification', 10, 2 );
function post_published_notification( $ID, $post ) {
	$email = get_the_author_meta( 'user_email', $post->post_author );
	$subject = 'Nuevo post: ' . $post->post_title;
	$message = 'Acabamos de crear un nuevo post: ' . $post->post_title . ' miralo aquí: ' . get_permalink( $ID );
	wp_mail( $email, $subject, $message );
} 
add_filter('login_errors','login_error_message');
	function login_error_message( $error ){
	$error = "Pasword incorrecto, FUERA DE AQUÍ";
	return $error;
} 

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function Empresas() {

	$labels = array(
		'name'                => __( 'Empresas', 'umg' ),
		'singular_name'       => __( 'Empresa', 'umg' ),
		'add_new'             => _x( 'Add New Empresa', 'umg', 'umg' ),
		'add_new_item'        => __( 'Add New Empresa', 'umg' ),
		'edit_item'           => __( 'Edit Empresa', 'umg' ),
		'new_item'            => __( 'New Empresa', 'umg' ),
		'view_item'           => __( 'View Empresa', 'umg' ),
		'search_items'        => __( 'Search Empresas', 'umg' ),
		'not_found'           => __( 'No Empresas found', 'umg' ),
		'not_found_in_trash'  => __( 'No Empresas found in Trash', 'umg' ),
		'parent_item_colon'   => __( 'Parent Empresa:', 'umg' ),
		'menu_name'           => __( 'Empresas', 'umg' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats'
			)
	);

	register_post_type( 'empresa', $args );
}

add_action( 'init', 'Empresas' );

add_action('admin_menu', 'my_plugin_menu');
function my_plugin_menu() {
	add_menu_page('My Plugin Settings', 'Plugin Settings', 'administrator', 'my-plugin-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
}
function my_plugin_settings_page() {
	echo "<h2>Plugin page </h2>";
} 

