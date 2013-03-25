<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="slideshow">
	<div class="slideset">
		<ul class="slides">
			<li class="slide-01">
				<div class="holder">
					<div class="text-holder">
						<h2>Media is changing.</h2>
						<p>If you manage advertising, you face challenges — big data, rising mobile, shifting demos, fragmenting screens. Mediassociates can help. Our exceptional media planning, buying and innovation gets you more results from marketing. </p>
					</div>
					<span class="slide-info">CERN in Switzerland, birthplace of the World Wide Web.</span>
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
						<p>What if you had less marketing data and more intelligence? Our Analytics Group interprets the glut of information spun off by ad campaigns to find vital insights. From A/B tests to media optimization, we turn reporting into action.</p>
					</div>
				</div>
			</li> 
			<li class="slide-04">
				<div class="holder">
					<div class="text-holder">
						<h2>Mediassociates can help. </h2>
						<p>Mediassociates offers senior media planning and buying teams schooled by the biggest agencies in the world, with the personal focus on your business results. We’re innovative. We’re published nationally. We give you better thinking.</p>
					</div>
				</div>
			</li>
		</ul>
	</div><!-- / slideset -->
</div><!-- / slideshow -->
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