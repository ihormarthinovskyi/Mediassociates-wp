<?php get_header(); ?>
<div class="wrapper">
<?php get_template_part('header','inner'); ?>
</div>
<div class="page">
	<div class="wrapper">
		<section id="main">
			<section id="content">
				<div class="posts">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="post">
						<div class="img">
							<?php the_post_thumbnail('blog_image'); ?>
							<a href="<?php the_permalink(); ?>" class="text"><span><?php the_title(); ?></span></a>
						</div><!-- / img -->
						<strong class="meta">Published by <?php the_author_link(); ?> on <span><?php the_time('m/d/Y'); ?></span> in <em><?php the_category(', '); ?></em></strong>
						<?php the_content(); ?>
						<br />
						<div class="social">
							<ul>
								<li>SHARE</li>
								<li class="facebook"><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">facebook</a></li>
								<li class="twitter"><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" target="_blank">twitter</a></li>
							</ul>
						</div>
					</article><!-- / post -->
				<?php endwhile; ?>
				</div>
			</section><!-- / content -->
			<?php get_sidebar(); ?>
		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<?php get_footer(); ?>