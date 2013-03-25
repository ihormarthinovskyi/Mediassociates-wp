<?php
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'inner_hero', 9999, 162 );
	add_image_size( 'blog_image', 607, 241 );


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
?>