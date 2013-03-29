<?php 
	/*
		Template Name: Dictionary Loader
	*/
	
	if (isset($_GET['term'])) {
		$term = stripslashes($_GET['term']);
		$type = 'term';
	} elseif (isset($_GET['title'])) {
		$term = stripslashes($_GET['title']);
		$type = 's';
	} else {
		$term = 'A';
		$type = 'term';
	}
	
	$loop = new WP_Query(array('post_type'=>'dictionary', 'taxonomy'=>'dictionary_cat', $type => $term, 'orderby' => 'menu_order', 'order' => 'asc'));
 ?>
<?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<article>
		<strong class="ttl"><?php the_title(); ?></strong>
		<p><?php the_content(); ?></p>	
	</article><!-- / post -->
<?php endwhile; ?>

<?php else: ?>
	<article>
		<strong class="ttl">Sorry, we couldn't find anything.</strong>
		<p>Please try selecting another option.</p>
	</article><!-- / post -->
<?php endif; ?>
				