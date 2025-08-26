<?php
require "plugin-update-checker-v5/plugin-update-checker.php";

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://demo1.sierra.365villas.xyz/wp-content/uploads/details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'divi-child-theme'
);
function divi__child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'divi__child_theme_enqueue_styles' );
 
//you can add custom functions below this line:
function wpc_remove_height_cropping($height) {
	return '9999';
}
function wpc_remove_width_cropping($width) {
	return '9999';
}
add_filter( 'et_pb_blog_image_height', 'wpc_remove_height_cropping' );
add_filter( 'et_pb_blog_image_width', 'wpc_remove_width_cropping' );

function add_json_upload_support($mimes) {
    $mimes['json'] = 'application/json';
    return $mimes;
}
add_filter('upload_mimes', 'add_json_upload_support');


