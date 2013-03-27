<?php 
	/*
		Template Name: Services Inner
	*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page">
	<div class="wrapper">
		<?php get_template_part('header','inner'); ?>
		<section id="main">
			<section id="content">
				<?php the_content(); ?>
				<?php if(get_field('content_filter')) remove_filter ('the_content',  'wpautop'); ?>	
				<div class="info-block">
					<?php if(get_field('service_mod_title')) {
						echo "<h2>";
						the_field('service_mod_title');
						echo "</h2>";
					} if (get_field('service_module_content')) {
						the_field('service_module_content');
					} ?>
				</div><!--info-block-->
			</section><!-- / content -->
			<?php get_sidebar(); ?>
		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<?php endwhile; ?>
<?php get_footer(); ?>