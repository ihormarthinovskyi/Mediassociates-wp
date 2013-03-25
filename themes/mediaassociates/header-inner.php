<?php
	
	if(is_home() || is_single() || is_category()) {
		$post_id = 8;
	} else {
		$post_id = $post->ID;
	}
	$img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'inner_hero');
	$menu = wp_get_nav_menu_items(3);

	

?>
<div class="header-bottom news" <?php if($img): ?>style="background-image: url(<?php echo $img[0]; ?>);" <?php endif; ?>>
	

	<?php if($menu): ?>
	<nav id="main-nav">
		<ul>
			<?php 
				$count = 0; 
				foreach($menu as $item): 
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
					<img src="<?php echo get_bloginfo('template_directory').'/'; ?>images/ico-00<?php echo $count; ?>.png" alt="image" width="46" height="46" >
					<span><?php echo $item->title; ?></span>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</nav><!--nav-->
	<?php endif; ?>

	<h1><?php echo get_the_title($post_id); ?></h1>
</div><!-- / header-bottom -->