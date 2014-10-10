<?php
	global $menuItem;
	$subItem = null;
	$subItems = get_pages(array(
		'parent' => $menuItem->ID,
		'sort_column' => 'menu_order'
	));
	?>
<ul class="dropdown-menu dropdown-sm">
	<li>
		<div class="col-inner">
			<ul class="list-unstyled">
			<?php
				global $subItem;
				foreach ($subItems as $subItem) {
					get_template_part('menu', 'subitem');
				}
			?>
			</ul>
		</div>
	</li>
</ul>
