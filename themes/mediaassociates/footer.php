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
<?php wp_footer(); ?>
</body>
</html>