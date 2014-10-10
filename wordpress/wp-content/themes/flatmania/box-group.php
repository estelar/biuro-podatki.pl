<?php
	global $page;
	$sizeStyle = Utils::ensureSizeStyle($page->ID);
	$subPages = get_pages(array(
		'parent' => $page->ID,
		'sort_column' => 'menu_order'
	));

	foreach ($subPages as $page) {
		$boxType = Utils::ensureBoxType($page->ID);
		get_template_part('box', $boxType);
	}
?>
