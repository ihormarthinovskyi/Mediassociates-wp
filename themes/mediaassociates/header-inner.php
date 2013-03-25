<?php
	
	if(is_home() || is_single() || is_category()) {
		$post_id = 8;
	} else {
		$post_id = $post->ID;
	}
	$img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'inner_hero');

?>
<div class="header-bottom news" <?php if($img): ?>style="background-image: url(<?php echo $img[0]; ?>);" <?php endif; ?>>
	<nav id="main-nav">
		<ul>
			<li>
				<a href="#">
					<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-001.png" alt="image" width="46" height="46" >
					<span>TV</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-002.png" alt="image" width="46" height="46" >
					<span>RADIO</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-003.png" alt="image" width="46" height="46" >
					<span>DIGITAL</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-004.png" alt="image" width="46" height="46" >
					<span>PRINT</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-005.png" alt="image" width="46" height="46" >
					<span>OOH</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-006.png" alt="image" width="46" height="46" >
					<span>ANALYTICS</span>
				</a>
			</li>
		</ul>
	</nav><!--nav-->
	<h1><?php echo get_the_title($post_id); ?></h1>
</div><!-- / header-bottom -->