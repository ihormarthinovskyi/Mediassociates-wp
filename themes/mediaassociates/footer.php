<footer>
	<div class="footer-holder">
		<div class="holder">
			<?php
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
			<?php endforeach; endif; ?>
		</div><!-- / holder -->
		<div class="line">
			<strong class="footer-logo"><a href="<?php bloginfo('url'); ?>">Our platform to buy banner ads at huge savings.</a></strong>
			<strong>THOUGHTGADGETS</strong>
			<p>Views on the future of advertising. Official Mediassociates blog</p>
		</div><!-- / line -->
		<div class="bottom-row">
			<strong class="phone">1-800-522-1660</strong>
			<p class="copy">&copy; <?php echo date('Y'); ?> Mediassociates.</p>
			<ul class="social">
				<li class="twitter"><a href="#">twitter</a></li>
				<li class="facebook"><a href="#">facebook</a></li>
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
			<strong class="form-ttl open-form"><em>How MAY we help <span>you</span>?</em></strong>
			<?php

				
				 	get_template_part('form','gravity'); 
				

			?>
			
		</div><!--form-holder-->
	</div><!--form-frame-->
	<div class="menu-frame">
		<strong class="menu-ttl open-nav"><span>SERVICES</span></strong>
		<div class="nav-holder">
			<ul class="nav">
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-008.png" alt="image" width="30" height="30" >TV</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-009.png" alt="image" width="30" height="30" >PRINT</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-010.png" alt="image" width="30" height="30" >RADIO</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-011.png" alt="image" width="30" height="30" >OOH</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-012.png" alt="image" width="30" height="30" >DIGITAL</a></li>
				<li><a href="#"><img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-013.png" alt="image" width="30" height="30" >ANALYTICS</a></li>
			</ul>
		</div>
	</div>
</div><!--mobile-bar-->
<?php wp_footer(); ?>
</body>
</html>