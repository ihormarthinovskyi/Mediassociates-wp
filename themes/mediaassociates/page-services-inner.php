<?php 
	/*
		Template Name: Services Inner
	*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page">
	<div class="wrapper">
		<?php get_template_part('header','inner'); ?>
		<section id="main">
			<section id="content">
				<p>Advertising campaigns generate big data. We help you cut through it to the key insights. Mediassociates’ clients are served by an internal dedicated Analytics Group that provides ongoing reports on media performance, from buying value to brand lift to direct-response performance to cost-per-lead and cost-per-sale analysis.</p>
				<div class="info-block">
					<h2>Analytics Planning &amp; Buying Services Include:</h2>
					<ul class="list">
						<li>Custom demographic segmentation</li>
						<li>Media value-add analysis</li>
						<li>Media post-buy reports</li>
						<li>Direct-response evaluation</li>
						<li>Display advertising reports</li>
						<li>Video advertising reports</li>
						<li>Mobile advertising reports</li>
						<li>Social-media advertising reports</li>
						<li>Reporting integration with client CRM systems such as <a href="#">Salesforce.com</a></li>
						<li>Support for client A/B split tests</li>
						<li>Ongoing creative, media and landing page optimization recommendations</li>
					</ul>
				</div><!--info-block-->
			</section><!-- / content -->
			<?php get_sidebar(); ?>
		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<?php endwhile; ?>
<?php get_footer(); ?>