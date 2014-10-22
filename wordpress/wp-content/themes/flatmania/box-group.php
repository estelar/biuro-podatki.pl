<?php
	global $page, $boxStyle;
	$subPages = Utils::getChildPages($page->ID);

	foreach ($subPages as $page) {
		$boxType = Utils::ensureBoxType($page->ID);
		get_template_part('box', $boxType);
	}
?>
