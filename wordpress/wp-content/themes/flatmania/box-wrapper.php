<?php
	global $page;
	$boxType = Utils::ensureBoxType($page->ID);
?>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
	<?php get_template_part('box', $boxType); ?>
</div>
