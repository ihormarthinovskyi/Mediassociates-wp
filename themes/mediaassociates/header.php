<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title><?php wp_title('', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon">
	
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
			<strong class="phone"><?php the_field('phone_number', 'option'); ?></strong>
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
				<?php
					wp_nav_menu (array(
						'theme_location' => 'mobile_menu',
						'menu_id' => 'menu',
						'container' => false,
						'container_class' => '',
						'menu_class' => 'drop',
						'depth' => 1
					));
				?>

			</div>
		</div>
	</header>