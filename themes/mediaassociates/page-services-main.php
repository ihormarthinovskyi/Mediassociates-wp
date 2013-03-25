<?php
	
	/*
		Template Name: Services Main
	*/
		
 get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="container-holder">
	<section id="container">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<ul class="mobile-serv">
			<li class="tv"><a href="#">tv</a></li>
			<li class="print"><a href="#">print</a></li>
			<li class="radio"><a href="#">radio</a></li>
			<li class="ooh"><a href="#">ooh</a></li>
			<li class="digital"><a href="#">digital</a></li>
			<li class="analystic"><a href="#">ANALYTICS</a></li>
		</ul>
	</section>
</div>
<nav class="add-nav inner">
	<?php
		wp_nav_menu (array(
			'theme_location' => 'services_menu',
			'menu_id' => 'menu',
			'container' => false,
			'container_class' => '',
			'menu_class' => '',
			'depth' => 1
		));
	?>
</nav><!-- / main-nav -->
<?php endwhile; ?>
<?php get_footer(); ?>