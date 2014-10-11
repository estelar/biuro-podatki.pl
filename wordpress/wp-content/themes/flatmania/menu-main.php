<ul class="nav navbar-nav navbar-right">
<?php
	$menuItem = null;
	$menuItems = Utils::getChildPages('');

	global $menuItem;
	foreach ($menuItems as $menuItem) {
		get_template_part('menu', 'item');
	}
?>
</ul>