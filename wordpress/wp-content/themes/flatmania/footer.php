				</div>
			</div>

			<div class="footer">
				<div class="footer-copyright">
					<p>&copy; Copyright 2014 <a href="#">Biuro Rachunkowe Natalia Gorczyca</a></p>
				</div>
			</div>
		</div>

		<span class="totop"><a href="#"><i class="fa fa-angle-up"></i></a></span>

		<div id="menu-offer-content" style="display:none">
			<ul class="dropdown-menu dropdown-sm">
				<li>
					<div class="col-inner">
						<ul class="list-unstyled">
							<?php wp_list_pages(array(
									'depth' => 1,
									'child_of' => 9,
									'title_li' => '',
									'link_before' => '<i class="fa fa-arrow-right dd-link-icon"></i>'
								)); ?>
						</ul>
					</div>
				</li>
			</ul>
		</div>

		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.js"></script><!-- jQuery -->
		<script type="text/javascript">
			$(document).ready(function() {
				$('#menu-main li:nth-child(1) a').addClass('br-orange');
				$('#menu-main li:nth-child(2) a').addClass('br-purple');
				$('#menu-main li:nth-child(3) a').addClass('br-pink');
				$('#menu-main li:nth-child(4) a').addClass('br-lblue');
				$('#menu-main li:nth-child(5) a').addClass('br-yellow');
				$('#menu-main li:nth-child(1) i.link-icon').addClass('fa-home');
				$('#menu-main li:nth-child(2) i.link-icon').addClass('fa-envelope');
				$('#menu-main li:nth-child(3) i.link-icon').addClass('fa-tags');
				$('#menu-main li:nth-child(4) i.link-icon').addClass('fa-file');
				$('#menu-main li:nth-child(5) i.link-icon').addClass('fa-cog');

				// Cut Offer submenu html from document and inject it into main menu
				var submenuOfferContent = $('#menu-offer-content').html();
// 				$('#menu-offer-content').remove();
				$('#menu-main li:nth-child(3)').addClass('dropdown').append(submenuOfferContent).
					find('> a').addClass('dropdown-toggle').attr('data-toggle', 'dropdown').attr('href', '#').
					find('.link-title').append(' <b class="fa fa-angle-down"></b>');

			});
		</script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/bootstrap.min.js"></script><!-- Bootstrap JS -->
		<!--[if lte IE 8]><script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/excanvas.min.js"></script><![endif]-->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/imagesloaded.pkgd.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/respond.min.js"></script><!-- Respond JS for IE8 -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/html5shiv.js"></script><!-- HTML5 Support for IE -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/waypoints.min.js"></script><!-- jQuery way points -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.prettyPhoto.js"></script><!-- jQuery prettyPhoto & Isotope -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/custom.js"></script><!-- Custom JS -->

		<?php /*
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.cycle.all.js"></script><!-- Cycle JS -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.flot.min.js"></script><!-- jQuery flot -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.countTo.js"></script><!-- Count To JS  -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/masonry.pkgd.min.js"></script><!-- Count To JS  -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.themepunch.plugins.min.js"></script><!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/isotope.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.countdown.min.js"></script>--><!-- Jquery for Countdown  -->
		*/ ?>

		<?php wp_footer(); ?>
	</body>
</html>