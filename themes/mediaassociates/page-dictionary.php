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
								<select class="alphabet selectdropdown mobile">
									<option value="a">a</option>
									<option value="b">b</option>
									<option value="c">c</option>
									<option value="d">d</option>
									<option value="e">e</option>
									<option value="f">f</option>
									<option value="g">g</option>
									<option value="h">h</option>
									<option value="i">i</option>
									<option value="j">j</option>
									<option value="k">k</option>
									<option value="l">l</option>
									<option value="m">m</option>
									<option value="n">n</option>
									<option value="o">o</option>
									<option value="p">p</option>
									<option value="q">q</option>
									<option value="r">r</option>
									<option value="s">s</option>
									<option value="t">t</option>
									<option value="u">u</option>
									<option value="v">v</option>
									<option value="w">w</option>
									<option value="x">x</option>
									<option value="y">y</option>
									<option value="z">z</option>
								</select> 
								<input type="submit" value="submit" />
							</div>
							<ul class="alphabet">
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
							</ul>
							<div id="definitions">
								<!-- load dev here -->
							</div>
							<ul class="alphabet">
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
							</ul>
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
					
					$(document).ready(function(mobile_true){
						serch_result('A', 'term');
					    if (!mobile_true) {
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
						} else if (mobile_true) {
							$("form#form").submit(function() {
							    // we want to store the values from the form input box, then send via ajax below
							    //var fid = $(".messag").attr("id");
							    var val = $(".selectdropdown").val();
							    
							    val = encodeURIComponent(val.trim());
							    serch_result(val, 'term');
							    $.ajax({
							       type: "GET",
							       url: "<?php echo get_site_url(); ?>/media-dictionary/hidden/",
							       data: "term="+ val,
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
							
						}
					   
					   function win_width() {
					   	var current_width = $(window).width();
					   	if (current_width <= 930) {
					   		mobile_true = true;
					   	} else {
					   		mobile_true = false;
					   	}
					   } win_width();
					   $(window).resize(function() {
					   	win_width();
					   	mobile_select();
					   });
					   function mobile_select () {
					   // create select from ul on media dictionary
						   console.log(mobile_true);
						   if (mobile_true) {
						   	   //$('.alphabet').show();
						   	   $('.ui-autocomplete-input').hide();
							   
							} else if (!mobile_true) {
								$('.ui-autocomplete-input').show();
							}// end mobile select creator
						} mobile_select();
					});
				</script>
			</section><!-- / content -->
			<?php get_sidebar(); ?>
		</section><!-- / main -->
	</div><!-- / wrapper -->
</div><!-- / page -->
<?php endwhile; ?>
<?php get_footer(); ?>