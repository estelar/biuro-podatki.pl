<?php
	global $page;
	$sizeStyle = Utils::ensureSizeStyle($page->ID);
	$subPages = Utils::getChildPages($page->ID);

	foreach ($subPages as $page) {
		$boxType = Utils::ensureBoxType($page->ID);
		get_template_part('box', $boxType);
	}
?>
