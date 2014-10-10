<?php
/**
 * Template Name: Kontakt
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>

<div class="contactus">
	<div class="contactus-content">
		<div class="row">
<?php
	$items = get_pages(array(
		'parent' => get_the_ID(),
		'sort_column' => 'menu_order',
		'number' => 4
	));
	$cnt = count($items);

	if ($cnt > 0) {
		$colSize = 'col-md-' + (12 / $cnt);
		foreach ($items as $item) {
			get_template_part('contact', 'item');
		}
	}
?>
		</div>
	</div>

	<div class="contact-form">
		<div class="row">
			<div class="col-md-5">
				<?php if (function_exists('ninja_forms_display_form')) ninja_forms_display_form(2) ?>
			</div>
			<div class="col-md-5 padd-horizontal">
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:298px;width:100%;"><div id="gmap_canvas" style="height:298px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">zum beispiel</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(53.4534347,14.542953200000056),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(53.4534347, 14.542953200000056)});infowindow = new google.maps.InfoWindow({content:"<b>Kancelaria&nbsp;Natalia&nbsp;Gorczyca</b><br/>&#321;ab&#281;dzia 38/1<br/>71-453 Szczecin" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			</div>
			<div class="col-md-2">
				<script type="text/javascript" src="http://widget.gadu-gadu.pl/getCode.php?id=885b5d7b51b5ce5e3f513430cf9ef8d8df8bad39"></script>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

<?php get_footer(); ?>
