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
	echo 'Estoy en la seccion';
} 