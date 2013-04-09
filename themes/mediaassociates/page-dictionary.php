<?php 
	
	/*
		Template Name: Dictionary
	*/

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="wrapper">
<?php get_template_part('header','inner'); ?>
</div>
<div class="page">
	<div class="wrapper">
		<section id="main">
			<section id="content">
			<?php the_content(); ?>
				<div class="choose-form">
					<form id="form" action="#" >
						<fieldset>
							<div class="txt-row">
								<input class="txt" type="text" value="Search" />
								
								<!-- <select class="sel">
									<option>a</option>
									<option>b</option>
									<option>c</option>
									<option selected="selected">d</option>
									<option>e</option>
									<option>f</option>
									<option>g</option>
									<option>h</option>
									<option>i</option>
									<option>j</option>
									<option>k</option>
									<option>l</option>
									<option>m</option>
									<option>n</option>
									<option>o</option>
									<option>p</option>
									<option>q</option>
									<option>r</option>
									<option>s</option>
									<option>t</option>
									<option>u</option>
									<option>v</option>
									<option>w</option>
									<option>x</option>
									<option>y</option>
									<option>z</option>
								</select> -->
							</div>
							<ul class="alphabet selectdropdown">
								<li class="a"><a href="#">a</a></li>
								<li class="b"><a href="#">b</a></li>
								<li class="c"><a href="#">c</a></li>
								<li class="d"><a href="#">d</a></li>
								<li class="e"><a href="#">e</a></li>
								<li class="f"><a href="#">f</a></li>
								<li class="g"><a href="#">g</a></li>
								<li class="h"><a href="#">h</a></li>
								<li class="i"><a href="#">i</a></li>
								<li class="j"><a href="#">j</a></li>
								<li class="k"><a href="#">k</a></li>
								<li class="l"><a href="#">l</a></li>
								<li class="m"><a href="#">m</a></li>
								<li class="n"><a href="#">n</a></li>
								<li class="o"><a href="#">o</a></li>
								<li class="p"><a href="#">p</a></li>
								<li class="q"><a href="#">q</a></li>
								<li class="r"><a href="#">r</a></li>
								<li class="s"><a href="#">s</a></li>
								<li class="t"><a href="#">t</a></li>
								<li class="u"><a href="#">u</a></li>
								<li class="v"><a href="#">v</a></li>
								<li class="w"><a href="#">w</a></li>
								<li class="x"><a href="#">x</a></li>
								<li class="y"><a href="#">y</a></li>
								<li class="z"><a href="#">z</a></li>
							</ul> <input type="submit" value="submit" />
							<div id="definitions">
								<!-- load dev here -->
							</div>
							<ul class="alphabet selectdropdown">
								<li class="a"><a href="#">a</a></li>
								<li class="b"><a href="#">b</a></li>
								<li class="c"><a href="#">c</a></li>
								<li class="d"><a href="#">d</a></li>
								<li class="e"><a href="#">e</a></li>
								<li class="f"><a href="#">f</a></li>
								<li class="g"><a href="#">g</a></li>
								<li class="h"><a href="#">h</a></li>
								<li class="i"><a href="#">i</a></li>
								<li class="j"><a href="#">j</a></li>
								<li class="k"><a href="#">k</a></li>
								<li class="l"><a href="#">l</a></li>
								<li class="m"><a href="#">m</a></li>
								<li class="n"><a href="#">n</a></li>
								<li class="o"><a href="#">o</a></li>
								<li class="p"><a href="#">p</a></li>
								<li class="q"><a href="#">q</a></li>
								<li class="r"><a href="#">r</a></li>
								<li class="s"><a href="#">s</a></li>
								<li class="t"><a href="#">t</a></li>
								<li class="u"><a href="#">u</a></li>
								<li class="v"><a href="#">v</a></li>
								<li class="w"><a href="#">w</a></li>
								<li class="x"><a href="#">x</a></li>
								<li class="y"><a href="#">y</a></li>
								<li class="z"><a href="#">z</a></li>
							</ul> <input type="submit" value="submit" />
						</fieldset>
					</form>
				</div><!-- / chose-form -->
				<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
				  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
				  
				  <?php
				  	 // create loop for auto complete
				  	 $loop = new WP_Query(array('post_type'=>'dictionary','posts_per_page' => '-1', 'taxonomy'=>'dictionary_cat', 'orderby' => 'menu_order', 'order' => 'asc')); 
				  ?>
				<script>
					$(function() {
					    var availableTags = [
					      <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
					      	"<?php the_title(); ?>",
					      <?php endwhile; ?>
					      <?php endif; ?>
					      "--"
					    ];
					    $( ".txt" ).autocomplete({
					      source: availableTags
					    });
					  });
					$('.alphabet li a').each(function (i) {
						$(this).attr('href', 'javascript:void(0)');
					});
					
					function the_def(term, term_title) {
						$("#definitions").slideUp(function() {
							$(this).load('http://media/media-dictionary/hidden/?'+term_title+'='+term, function() {
									$(this).slideDown();
								});
							});
					}
					function serch_result(term, term_title) {
						$("#definitions").slideUp(function() {
							$(this).load('<?php echo get_site_url(); ?>/media-dictionary/hidden/?'+term_title+'='+term, function() {
									$(this).slideDown();
								});
							});
					}
					$('.alphabet li a').bind('click', function () {
						//console.log($(this).text());
						$('.alphabet li').removeClass('active');
						var id = $(this).parent().attr('class');
						//console.log(id);
						$("."+id).each(function(e){
							$(this).addClass('active');
							});
						var first_term = $(this).text();
						serch_result(first_term, 'term');
					});
					
					$(document).ready(function(){
						serch_result('A', 'term');
					    $("form#form").submit(function() {
					       // we want to store the values from the form input box, then send via ajax below
					       //var fid = $(".messag").attr("id");
					       var val = $(".txt").val();
					       val = encodeURIComponent(val.trim());
					       $.ajax({
					          type: "GET",
					          url: "<?php echo get_site_url(); ?>/media-dictionary/hidden/",
					          data: "title="+ val,
					          success: function(incoming_data){
					             // ALERT incoming data if coming
					             $("#definitions").html(incoming_data);
					           
					          },
					          error: function() { 
					             alert("BROKEN REQUEST.");
					          }
					       });
					       return false;
					   });
					   
					   
					   // create select from ul on media dictionary
					   console.log(mobile_true);
					   if (mobile_true) {
					   	   $('.alphabet').show();
					   	   $('.ui-autocomplete-input').hide();
						   $('ul.selectdropdown').each(function(){
						     var list=$(this),
						     select=$(document.createElement('select')).insertBefore($(this).hide());
						     $('>li a', this).each(function(){
						       var target=$(this).attr('target'),
						       option=$(document.createElement('option'))
						        .appendTo(select)
						        .val(this.href)
						        .html($(this).html())
						        .click(function(){
						          if (target==='_blank'){
						            window.open($(this).val());
						          }
						          else{
						            window.location.href=$(this).val();
						          }
						         });
						     });
						     list.remove();
						   });
						} // end mobile select creator
					});
				</script>
			</section><!-- / content -->
			<?php get_sidebar(); ?>
		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<?php endwhile; ?>
<?php get_footer(); ?>