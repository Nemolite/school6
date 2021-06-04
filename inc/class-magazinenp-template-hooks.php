<?php

/**
 * School6_Template_Hooks Class.
 *
 */
class School6_Template_Hooks
{

	public function __construct()
	{
		// Before Main Layout

		add_action('school6_before_main_layout', array($this, 'before_main'), 10);

		// Filter
		add_filter('school6_primary_layout_class', array($this, 'primary_class'));

		add_action('school6_main_layout', array($this, 'main_layout_start'), 10);

		add_action('school6_main_layout', array($this, 'main_layout_content_area'), 15);

		add_action('school6_main_layout', array($this, 'main_layout_end'), 20);

		add_action('school6_after_main_layout', array($this, 'sidebar'));

		add_action('school6_site_content', array($this, 'site_content'));

		add_action('school6_site_top_content', array($this, 'site_top_content'));

	}

	public function before_main()
	{
		?>
		<div id="content"
		 class="site-content">
		<div class="container">
			<?php
			$mnp_row_class = 'row justify-content-center site-content-row';
			if (is_page_template('templates/gutentor-template.php')) {
				$mnp_row_class = 'gutentor-template-wrap';
			}
			?>
			<div class="<?php echo esc_attr($mnp_row_class); ?>">
		<?php

	}

	public function primary_class($class)
	{
		$home_page = (boolean)magazinenp_get_option('enable_theme_style_homepage');
		if ($home_page && (is_home() || is_front_page())) {
			if (is_active_sidebar('magazinenp_front_page_sidebar_section')) {
				// return 'content-area col-lg-8 order-lg-2';
				return 'content-area col-lg-8';
			} else {
				return 'content-area col-lg-12';

			}
		}


		$base_sidebar_layout = magazinenp_base_sidebar_layout();

		switch ($base_sidebar_layout) {
			case "left":
				$class .= ' col-lg-8 order-lg-2 ';
				break;
			case "right":
				$class .= ' col-lg-8 ';
				break;
			case "fullwidth":
				$class .= ' col-lg-12 ';
				break;
			case "nosidebar":
				$class .= ' col-lg-8 ';
				break;
		}
		return $class;
	}

	public function main_layout_start()
	{
		$class = apply_filters('school6_primary_layout_class', 'content-area');

		echo '<!-- #start of primary div--><div id="primary" class="' . esc_attr($class) . '"> ';

	}

	public function main_layout_end()
	{
		echo '</div><!-- #end of primary div-->';
	}

	public function main_layout_content_area()
	{
		?>
		<main id="main" class="site-main">

			<?php

			do_action('school6_site_content');


			?>

		</main><!-- #main -->
		<?php
	}

	function sidebar()
	{

		$home_page = (boolean)magazinenp_get_option('enable_theme_style_homepage');
		if ($home_page && (is_home() || is_front_page())) {

			$this->homepage_sidebar();
			return;
		}
		$base_sidebar_layout = magazinenp_base_sidebar_layout();


		switch ($base_sidebar_layout) {
			case "left":
				get_sidebar('left');
				break;
			case "right":
				get_sidebar();
				break;
			case "fullwidth":
			case "nosidebar":
				break;
		}
	}

	public function homepage_sidebar($position = 'right')
	{
		$class = 'col-lg-4 widget-area';

		$class .= $position == 'left' ? ' order-lg-1' : '';

		$enable_sidebar_sticky = (boolean)magazinenp_get_option('enable_sidebar_sticky');

		$sidebar_inner_class = $enable_sidebar_sticky ? 'sticky-sidebar' : 'no-sticky-sidebar';

		?>
		<aside id="secondary" class="<?php echo esc_attr($class) ?>" role="complementary">
			<div class="<?php echo esc_attr($sidebar_inner_class); ?>>">
				<?php dynamic_sidebar('magazinenp_front_page_sidebar_section'); ?>
			</div>
		</aside><!-- #secondary -->
		<?php
	}

	public function site_content()
	{

		$home_page = (boolean)magazinenp_get_option('enable_theme_style_homepage');
		if ($home_page && (is_home() || is_front_page())) {
			
			dynamic_sidebar('magazinenp_front_page_content_section');
		} else {			
			do_action('school6_site_top_content');
			MagazineNP_Loops::init();
		}
	}
	/**
	 * Метод для работы Основными блоками над новостями
 	*
 	* @return void
 	*/
	public function site_top_content()
	{
		get_template_part( 'inc/top','content' ); 
	}

}

new School6_Template_Hooks();
