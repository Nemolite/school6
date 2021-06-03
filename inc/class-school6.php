<?php
/**
 * Class School6
 */
// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;


class School6
{

	public function __construct()
	{

		add_action('school6_footer', array($this, 'site_content_close'), 10);
		add_action('school6_footer', array($this, 'related_posts'), 15);
		add_action('school6_footer', array($this, 'footer'), 20);
		add_action('school6_footer', array($this, 'page_html_close'), 25);

	}

	public function site_content_close()
	{

		echo '</div><!-- row -->
		</div><!-- .container -->
	</div><!-- #content .site-content-->';
	}

	public function related_posts()
	{
		get_template_part('template-parts/footer/related-posts');

	}

	public function page_html_close()
	{

		echo '</div><!-- #page -->';
	}

	public function footer()
	{
		//get_template_part('template-parts/footer/footer');

        get_template_part('inc/school6','footer');

	}


}

new School6();