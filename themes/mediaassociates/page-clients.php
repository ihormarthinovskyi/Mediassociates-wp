<?php 
	/*
		Template Name: Clients
	*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page">
	<div class="wrapper">
		<?php get_template_part('header','inner'); ?>
		<section id="main">
			<section id="content">
				<?php // <h2 id="clients">CLIENTS</h2> ?>
				<?php the_content(); ?>
								
				<?php $page_title = 'Client List';  //Page ID
				$page_data = get_page_by_title( $page_title ); ?>
				<?php $content = apply_filters('the_content', $page_data->post_content);
				//display the title and content
				echo $content; ?>
				<h2 id="case">CASE STUDIES</h2>
				<p>Examples of how we help clients get more advertising results.</p>
				<div class="gallery-holder">
					<div class="slideset">
						<ul class="slides">
							<?php 
							   // get the leadership fields
							   if(get_field('gallery')){ ?>
							 
								<?php $counter = 0; ?>
							 
								<?php while(has_sub_field('gallery')){ ?>
									<?php // get image id
										$image_id = get_sub_field('slide_image');
										//echo $image_id;
										$thumb = wp_get_attachment_image_src( $image_id, 'case-thumb' );
										$photo = wp_get_attachment_image( $image_id, 'case-image' );
									    // echo $photo; 
									     ?>
									     <li data-thumb="<? echo $thumb[0]; ?>">
									     	<?php echo $photo; ?>
									     	<h2 class="ttl"><?php the_sub_field('title');?></h2>
									     	<?php the_sub_field('content'); ?>
									     </li>
								<?php 
									$counter++;
									} // endwhile; ?>
							<?php } //endif; ?>
						</ul>
					</div><!-- / slideset -->
				</div><!-- / slideshow -->
				
			</section><!-- / content -->
			<?php get_sidebar(); ?>
		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<?php endwhile; ?>
<?php get_footer(); ?>