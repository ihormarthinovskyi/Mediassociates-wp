<footer>
	<div class="footer-holder">
		<div class="holder">
			<?php /*
				$count = 0;
				$footer_navigation = get_field('f_column','options');
				if($footer_navigation):
					foreach($footer_navigation as $col):
						$count++;
						$id = $col['top_level']->ID;
					
			?>
			<div class="col-0<?php echo $count; ?>">
				<a href="<?php echo get_permalink($id); ?>" class="ttl"><?php echo get_the_title($id); ?></a>

				<?php
					$subnav = $col['sub_nav'];
					if($subnav):
				?>
				<ul>
					<?php 

						foreach($subnav as $li) {

							$child_id = $li['page']->ID;

							echo '<li><a href="'.get_permalink($child_id).'">'.get_the_title($child_id).'</a></li>';

						}

					?>
				</ul>
				<?php endif; ?>
			</div>
			<?php endforeach; endif; */ ?>
			
			<?php
				wp_nav_menu (array(
					'theme_location' => 'footer_menu',
					'menu_id' => 'footer-nav',
					'container' => false,
					'container_class' => '',
					'menu_class' => 'footer-nav',
					'depth' => 2
				));
			?>
			
		</div><!-- / holder -->
		<div class="line">
			<strong class="footer-logo" style="background-image: <?php the_field('eeffective_logo', 'option'); ?>;"><a href="<?php the_field('eeffective_url', 'option'); ?>">Our platform to buy banner ads at huge savings.</a></strong>
			<a href="<?php the_field('thought_link', 'option'); ?>" target="_blank">
				<strong><?php the_field('thought_title', 'option'); ?></strong>
				<p><?php the_field('thoughtgadgets_sub_head', 'option'); ?></p>
			</a>
		</div><!-- / line -->
		<div class="bottom-row">
			<strong class="phone"><?php the_field('phone_number', 'option'); ?></strong>
			<p class="copy">&copy; <?php echo date('Y'); ?> Mediassociates. | <a href="<?php the_field('privacy_policy_link', 'options'); ?>">Privacy Policy</a></p>
			<ul class="social">
				<li class="twitter"><a href="<?php the_field('twitter', 'option'); ?>" target="_blank">twitter</a></li>
				<li class="facebook"><a href="<?php the_field('facebook', 'option'); ?>" target="_blank">facebook</a></li>
			</ul>
		</div><!-- / bottom-row -->
	</div><!-- / footer-holder -->
</footer>
<div class="mobile-bar">
	<div class="line">
		<a class="btn-bar open-nav">&nbsp;</a>
		<a class="ttl open-form">How MAY we help <span>you</span>?</a>
	</div>
	<div class="form-frame">
		<div class="form-holder">
			<strong class="form-ttl open-form"><em><?php the_field('how_may', 'option'); ?></em></strong>
			<?php

				
				 	get_template_part('form','gravity'); 
				

			?>
			
		</div><!--form-holder-->
	</div><!--form-frame-->
	<div class="menu-frame">
		<strong class="menu-ttl open-nav"><span>SERVICES</span></strong>
		<div class="nav-holder">
			<ul class="nav">

				<?php 
					$count = 07; 
					$mobile_menu = wp_get_nav_menu_items(3);
					foreach($mobile_menu as $item): 
					$count++; 
	
					$id = $item->object_id;
					
					$this_page = $post->ID;
					
	
					if($id == $this_page) {
						echo '<li class="active">';
					} else {
						echo '<li>';
					}
	 
				?>
					<a data-id="<?php echo $id; ?>" href="<?php echo $item->url; ?>">
						<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-0<?php echo sprintf("%02d", $count); ?>.png" alt="image" width="30" height="30" >
						<span><?php echo $item->title; ?></span>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div><!--nav-->
		<!-- <div class="nav-holder">
			<ul class="nav">
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-008.png" alt="image" width="30" height="30" >TV</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-009.png" alt="image" width="30" height="30" >PRINT</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-010.png" alt="image" width="30" height="30" >RADIO</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-011.png" alt="image" width="30" height="30" >OOH</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-012.png" alt="image" width="30" height="30" >DIGITAL</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-013.png" alt="image" width="30" height="30" >ANALYTICS</a></li>
			</ul>
		</div> -->
	</div>
</div><!--mobile-bar-->
<div id="view"><!-- use this element to determine when to fix the sidebar and title bar --></div>

<?php wp_footer(); ?>
</body>
</html>