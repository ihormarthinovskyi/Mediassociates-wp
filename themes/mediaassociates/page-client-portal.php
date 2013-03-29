<?php 
	/*
		Template Name: Client Portal
	*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page">
	<div class="wrapper">
		<?php get_template_part('header','inner'); ?>
	</div><!-- / wrapper -->
	<?php the_content(); ?>
	
</div><!-- / page -->
<?php endwhile; ?>
<?php get_footer(); ?>