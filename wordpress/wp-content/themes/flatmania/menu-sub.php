<?php
	global $menuItem;
	$subItem = null;
	$subItems = Utils::getChildPages($menuItem->ID);
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
