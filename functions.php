<?php
/**
 * Дочерняя тема для темы magazinenp
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helper
 */
function show($param){
	echo "<pre>";
	print_r($param);
	echo "</per>";
}

function school6_scripts_style() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'school6-style', get_stylesheet_directory_uri() .'/assets/css/school6.css' );
	wp_enqueue_script( 'school6-script', get_stylesheet_directory_uri() . '/assets/js/school6.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'school6_scripts_style' );


?>
