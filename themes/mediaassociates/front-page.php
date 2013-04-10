<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<!--<div class="slideshow home_slides">
	<div class="slideset">
		<ul class="slides">
			<li class="slide-01">
				<div class="holder">
					<div class="text-holder">
						<h2>Media is changing.</h2>
						<p>If you manage advertising, you face challenges — big data, rising mobile, shifting demos, fragmenting screens. Mediassociates can help. Our exceptional media planning, buying and innovation get you more results from marketing. </p>
					</div>
					<span class="slide-info">Photo: CERN in Switzerland, birthplace of the World Wide Web.</span>
				</div>
			</li>
			<li class="slide-02">
				<div class="holder">
					<div class="text-holder">
						<h2>Media is going digital.</h2>
						<p>Smart TVs, mobile, tablets, online video — advertising evolves. We help clients evaluate media tactics to improve advertising, from traditional TV, radio, print and OOH to newer digital audience, social media, and mobile channels.</p>
					</div>
				</div>
			</li> 
			<li class="slide-03">
				<div class="holder">
					<div class="text-holder">
						<h2>Media needs measurement.</h2>
						<p>What if you had less marketing data and more intelligence? Our Analytics Group interprets the glut of information spun off by ad campaigns to find vital insights. From A/B tests to media optimization, we turn reporting into growth.</p>
					</div>
				</div>
			</li> 
			<li class="slide-04">
				<div class="holder">
					<div class="text-holder">
						<h2>Mediassociates can help. </h2>
						<p>Mediassociates offers senior media planning and buying teams schooled by the biggest agencies in the world, with a personal focus on your business results. We’re innovative. We’re published nationally. We&rsquo;ll give you better thinking.</p>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>-->
<?php 

$images = get_field('home_page_slider');
$slide_count = 0;

if( $images ){ ?>
	
    <div class="slideshow home_slides">
    	<div class="slideset">
    		<ul class="slides">
	    		<?php foreach( $images as $image ){ ?>
	    			<?php $image_src = wp_get_attachment_image_src( $image['id'], 'home-slide' ); ?>
		    		<li class="slide-<?php echo $slide_count; ?>" style="background: url(<?php echo $image_src[0]; ?>);">
		    			
		    			<div class="holder">
		    				<div class="text-holder <?php echo get_field('text_position', $image['id'])." ". get_field('mobile_text', $image['id']);?>">
								
		    					<h2><?php echo $image['title']; ?></h2>
		    					<p><?php echo $image['caption']; ?></p>
		    				</div>
		    				<?php if($image['description'] != '') { ?>
		    					<span class="slide-info"><?php echo $image['description'] ?></span>
		    				<?php } ?>
		    			</div>
		    		</li>
		    		<?php $slide_count++; ?>
	    		<?php } //endforeach; ?>
	    	</ul>
	    </div>
    </div>
<?php } ?>
<nav class="add-nav">
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