<?php
/**
 * Template Name: Kontakt
 */
?>

<?php
	get_header();
	the_post();
?>

<div class="contactus">
	<div class="contactus-content">
		<div class="row">
<?php
	$items = Utils::getChildPages(get_the_ID(), 3);
	$colSize = 'col-md-' + (12 / count($items));

	foreach ($items as $item) {
		get_template_part('contact', 'item');
	}
?>
		</div>
	</div>
	<div class="contact-form">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4">
				<?php if (function_exists('ninja_forms_display_form')) ninja_forms_display_form(2) ?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="gg">
					<script type="text/javascript" src="http://widget.gadu-gadu.pl/getCode.php?id=885b5d7b51b5ce5e3f513430cf9ef8d8df8bad39"></script>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div class="gmap">
					<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
					<div style="overflow: hidden; height: 298px; width: 100%;">
						<div id="gmap_canvas" style="height: 298px; width: 100%;"></div>
					</div>
					<script type="text/javascript"> function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(53.4534347,14.542953200000056),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(53.4534347, 14.542953200000056)});infowindow = new google.maps.InfoWindow({content:"<b>Kancelaria&nbsp;Natalia&nbsp;Gorczyca</b><br/>&#321;ab&#281;dzia 38/1<br/>71-453 Szczecin" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
