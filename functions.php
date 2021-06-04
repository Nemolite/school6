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

/** 
 * class School6
 */

require 'inc/class-school6.php';

/**
 * Copyright footer
 */

function school6_author_link()
{
	return sprintf(
		esc_html__(' %s', 'magazinenp'),
		'<a href="' . esc_url('https://mantrabrain.com/downloads/magazinenp-wordpress-theme/') . '" target="_blank" title="' . esc_attr__('The theme MagazineNP', 'magazinenp') . '" >' . esc_html__('The theme MagazineNP', 'magazinenp') . '</a>'
	);
} 

function school6_footer_text()
{
	$allowed_tags = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'class' => array(),
			'target' => array()
		)
	);

	$footer_text = magazinenp_get_option('bottom_footer_copyright_text') . ' | ' . school6_author_link();

	echo wp_kses(apply_filters('magazinenp_footer_copyright_text', $footer_text), $allowed_tags);
}

function school6_website_development_link() {
	return sprintf(
		esc_html__(' %s', 'magazinenp'),
		'<a href="' . esc_url('http://vandraren.ru/') . '" target="_blank" title="' . esc_attr__('Vandraren - Разработка web-проектов', 'magazinenp') . '" >' . esc_html__('Vandraren - Разработка web-проектов', 'magazinenp') . '</a>'
	); 
}

function school6_website_development() {
	$allowed_tags = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'class' => array(),
			'target' => array()
		)
	);

	$footer_text = esc_html__('Создание и техническая поддержка сайта', 'magazinenp') . ' : ' . school6_website_development_link();  

	echo wp_kses(apply_filters('magazinenp_footer_copyright_text', $footer_text), $allowed_tags);
}

/**
 * Банеры для футера
 */ 
require 'inc/footer-baners.php';

/**
 * Банеры для футера
 */ 
require 'inc/sitebar-baners.php';

/**
 * Подключение для работы с классами над новостями
 */

require 'inc/class-magazinenp-template-hooks.php';

/**
 * Раздел объявление
 */

add_action('init', 'school6_top_section_info');
function school6_top_section_info(){
	$labels = array(
		'name'               => 'Объявление', 
		'singular_name'      => 'Объявления', 
		'add_new'            => 'Добавить новое',
		'add_new_item'       => 'Добавить новое объявление',
		'edit_item'          => 'Редактировать объявление',
		'new_item'           => 'Новое объявление',
		'view_item'          => 'Посмотреть объявление',
		'search_items'       => 'Найти объявление',
		'not_found'          => 'Объявление не найдено',
		'not_found_in_trash' => 'В корзине объявление не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Объявления'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, // 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-document', 
		'menu_position' => 20, 
		'supports' => array( 'title', 'editor' )
	);	
	register_post_type('top_section_info', $args  );
}
?>
