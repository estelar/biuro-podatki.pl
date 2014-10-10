<ul class="nav navbar-nav navbar-right">
<?php
	$menuItem = null;
	$menuItems = get_pages(array(
			'parent' => '',
			'sort_column' => 'menu_order'
	));
	global $menuItem;
	foreach ($menuItems as $menuItem) {
		get_template_part('menu', 'item');
	}
?>
</ul>