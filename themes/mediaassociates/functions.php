<?php

	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'inner_hero', 9999, 162 );
	add_image_size( 'blog_image', 607, 241 );
	add_image_size( 'leader-thumb', 95, 95, true );
	add_image_size( 'case-image', 539, 300, true );
	add_image_size( 'case-thumb', 79, 48, true );

	add_action( 'init', 'register_my_menu' );
	function register_my_menu() {
		register_nav_menu( 'main_menu', __( 'Main Menu' ) );

		register_nav_menu( 'services_menu', __( 'Services Menu' ) );
		register_nav_menu( 'mobile_menu', __( 'Mobile Menu' ) );

	}

	function ss_init_script() {
		if (!is_admin()) {

		   wp_deregister_script( 'jquery' );
		   wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
		   wp_enqueue_script( 'jquery','1.8.2');
		   wp_enqueue_script('ui', get_bloginfo('template_directory').'/js/jquery-ui-1.9.2.custom.min.js', array('jquery'), '1.0');
		   wp_enqueue_script('flex', get_bloginfo('template_directory').'/js/jquery.flexslider-min.js', array('jquery'), '1.0');
		   wp_enqueue_script('customform', get_bloginfo('template_directory').'/js/custom-form.js', array('jquery'), '1.0');
		   wp_enqueue_script('customselect', get_bloginfo('template_directory').'/js/custom-form.select.js', array('jquery'), '1.0');
		   wp_enqueue_script('mobilebar', get_bloginfo('template_directory').'/js/mobile-bar.js', array('jquery'), '1.0');
		   wp_enqueue_script('inputs', get_bloginfo('template_directory').'/js/clear-inputs.js', array('jquery'), '1.0');
		   wp_enqueue_script('slideblock', get_bloginfo('template_directory').'/js/slideBlock.js', array('jquery'), '1.0');
		   wp_enqueue_script('script', get_bloginfo('template_directory').'/js/scripts.js', array('jquery'), '1.0');
		}
	}
	add_action('wp_enqueue_scripts', 'ss_init_script');

	remove_action('wp_head', 'rel_canonical'); 
	remove_action('wp_head', 'rsd_link'); 
	remove_action('wp_head', 'wp_generator'); 
	remove_action('wp_head', 'feed_links', 2); 
	remove_action('wp_head', 'index_rel_link'); 
	remove_action('wp_head', 'wlwmanifest_link'); 
	remove_action('wp_head', 'feed_links_extra', 3); 
	remove_action('wp_head', 'start_post_rel_link', 10, 0); 
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); 

	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 
	
	/**
	 *
	 * do shrotcode in sidebar
	 *
	 */
	add_filter('widget_text', 'do_shortcode');
	
	/**
	 *
	 * span in widget titles
	 * use #span text #/span
	 */
	function kc_convert_title_html_tags( $string ) {
	  global $wp_current_filter;
	  $filter = end($wp_current_filter);
	  $search = array('[span] ', ' [/span]');
	  $replace = ( in_array($filter, array('wp_title', 'the_title_rss')) || ($filter == 'the_title' && (is_admin() || in_array('wp_head', $wp_current_filter))) ) ? '' : array('<span>', '</span>');
	  $string = str_replace( $search, $replace, $string );
	
	  return $string;
	} add_filter( 'widget_title', 'kc_convert_title_html_tags' );
	
	/**
	 * Register our sidebars and widgetized areas.
	 *
	 */
	function MA_init() {
	 	// right top interior
		register_sidebar( array(
			'name' => 'Interior Right Top',
			'id' => 'interior_right_1',
			'before_widget' => '<div class="form-holder">',
			'after_widget' => '</div><!--form-holder-->',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		// right bottom interior
		register_sidebar( array(
			'name' => 'Interior Right bottom',
			'id' => 'interior_right_2',
			'before_widget' => '<div class="rss-box">',
			'after_widget' => '</div><!--rss-box-->',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'MA_init' );
	
	// [sidebar_form] shorcode
	function sidebar_form_func( $atts ) {
		extract( shortcode_atts( array(
			'form' => 'form',
			'type' => 'gravity',
		), $atts ) );
		ob_start();
		echo get_template_part($form,$type);
		$output_form = ob_get_contents();
		ob_end_clean();
		return $output_form;
	}
	add_shortcode( 'sidebar_form', 'sidebar_form_func' );
	
?>