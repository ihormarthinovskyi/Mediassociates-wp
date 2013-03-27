<?php 
	/*
		Template Name: About
	*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page">
	<div class="wrapper">
		<?php get_template_part('header','inner'); ?>
		<section id="main">
			<section id="content">
				<?php the_content(); ?>
				<div class="two-columns" id="planning">
					<?php the_field('columns'); ?>
				</div>
				<div class="team" id="team">
					<div class="mobile-hidden">
						<?php if(get_field('leadership_mobile')) the_field('leadership_mobile'); ?>
					</div>
					<h2 class="hidden">LEADERSHIP TEAM</h2>
					
					<?php 
					   // get the leadership fields
					   if(get_field('leadership')){ ?>
					 
						<?php $counter = 0; ?>
					 
						<?php while(has_sub_field('leadership')){ ?>
					 	<div class="member" id="leader">
							<?php // get image id
								$image_id = get_sub_field('photo');
								$photo = wp_get_attachment_image( $image_id, 'leader-thumb' );
							    // echo $photo; 
							     ?>
								<?php echo $photo ?>
								<strong class="name"><?php the_sub_field('name_and_title'); ?></strong>
								<?php the_sub_field('bio_intro'); ?>
								
								<div id="hidden_<? echo $counter; ?>" style="display:none;">
									<?php the_sub_field('bio_full'); ?>
								</div>
					 	</div><!-- / member -->
						<?php 
							$counter++;
							} // endwhile; ?>
					 
						
					 
					<?php } //endif; ?>
					
				</div><!-- / team -->
				<?php // get the modules fields
				   if(get_field('modules')){ ?>
				 
						<?php $counter = 0; ?>
					 
						<?php while(has_sub_field('modules')){ ?>
							<?php $color = get_sub_field('color'); ?>
							<div class="line <?php echo $color; ?>" id="<?php the_sub_field('title'); ?>">
								<h2><?php the_sub_field('title'); ?></h2>
								<?php the_sub_field('content'); ?>
					 		</div><!-- / line -->
						<?php $counter++; } // endwhile; ?>
				<?php } //endif; ?>
				
				
			</section><!-- / content -->

			<?php get_sidebar(); ?>

		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<script>
	var count = 0;
	$( '.member' ).each(function( index ) {
		  $(this).find('p').first().append(' <a href="javascript:void(0)" id="readmore" data-attr="hidden_'+count+'">...More</a>');
		  count++;
	});
	$('a#readmore').bind('click',function() {
		var this_id = $(this).attr('data-attr');
		$('#'+this_id).slideToggle();
		//console.log(this_id);
	});
</script>
<?php endwhile; ?>
<?php get_footer(); ?>