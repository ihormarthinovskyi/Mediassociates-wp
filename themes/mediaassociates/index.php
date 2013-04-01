<?php get_header(); ?>

<div class="page">
	<div class="wrapper">
		<?php get_template_part('header','inner'); ?>
		<section id="main">
			<section id="content">
				<div class="posts">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article class="post">
						<div class="img">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('blog_image');
								} ?>
							<a href="<?php the_permalink(); ?>" class="text"><span><?php the_title(); ?></span></a>
						</div><!-- / img -->
						<strong class="meta">Published by <?php the_author_link(); ?> on <span><?php the_time('m/d/Y'); ?></span> in <em><?php the_category(', '); ?></em></strong>
						<?php the_content('...More'); ?>

						<div class="social">
							<ul>
								<li>SHARE</li>
								<li class="facebook"><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">facebook</a></li>
								<li class="twitter"><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" target="_blank">twitter</a></li>
							</ul>
							<a href="<?php the_permalink(); ?>" class="btn">READ MORE</a>
						</div>
					</article><!-- / post -->
				<?php endwhile; ?>

				<?php else: ?>
					<article class="post">
						
						<h2>Sorry, we couldn't find anything.</h2>
						<p>Please try going back to our <a href="<?php bloginfo('url'); ?>">home page</a>.</p>

					</article><!-- / post -->
				<?php endif; ?>
				</div>
			</section><!-- / content -->
			<?php get_sidebar(); ?>
		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<?php get_footer(); ?>