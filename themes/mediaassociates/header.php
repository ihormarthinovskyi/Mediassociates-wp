<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title('', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<?php wp_head(); ?>
	<!--[if lt IE 9]>
		<link rel="stylesheet" media="all" type="text/css" href="<?php echo get_bloginfo('template_directory').'/'; ?>css/ie.css" />
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div class="header-holder">
			<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			<strong class="phone">1-800-522-1660</strong>
			<?php
				wp_nav_menu (array(
					'theme_location' => 'main_menu',
					'menu_id' => '',
					'container' => false,
					'container_class' => '',
					'menu_class' => '',
					'depth' => 1
				));
			?>
			<?php
				if(is_front_page() || is_page_template('page-services-main.php')) {
					get_template_part('form','dropdown');
				}
			?>
			<div class="mobile-nav">
				<div class="open-holder">
					<a href="#" class="open">open</a>
				</div>
				<ul class="drop">
					<li class="link-01"><a href="#">Services </a></li>
					<li class="link-02"><a href="#">About </a></li>
					<li class="link-03"><a href="#">Clients</a></li>
					<li class="link-04"><a href="#">News</a></li>
					<li class="link-05">1-800-522-1660</li>
				</ul>
			</div>
		</div>
	</header>