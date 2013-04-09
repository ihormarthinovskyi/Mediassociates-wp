<?php 
	/*
		Template Name: Client Portal
	*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="wrapper">
<?php get_template_part('header','inner'); ?>
</div>
<div class="page">
	<div class="portal">
		<?php the_content(); ?>
	</div><!-- / wrapper -->
	
	
</div><!-- / page -->
<?php endwhile; ?>
<?php get_footer(); ?>