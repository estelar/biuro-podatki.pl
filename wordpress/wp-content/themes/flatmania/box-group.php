<?php
	global $page;
	$sizeStyle = ensureSizeStyle($page->ID);
	$subPages = get_pages(array(
		'parent' => $page->ID,
		'sort_column' => 'menu_order'
	));
?>
<div class="boxGroup <?= $sizeStyle ?>">
<?php
	foreach ($subPages as $page) {
		$boxType = ensureBoxType($page->ID);
		get_template_part('box', $boxType);
	}
?>
</div>