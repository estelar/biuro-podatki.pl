<?php
	$page = get_post(get_the_ID());
	$parentPage = get_post($page->post_parent);
	$color = Utils::ensureColorRandomly($parentPage->ID);
	$pageInParent = null;
	$pagesInParent = Utils::getChildPages($parentPage->ID);
?>
<div class="page-sidebar">
	<div class="page-title br-<?php echo $color ?>">
		<h2><?php echo $parentPage->post_title ?></h2>
	</div>
	<div class="sidebar-link col-disable">
		<ul class="list-unstyled">
		<?php
			global $pageInParent;
			foreach ($pagesInParent as $pageInParent) {
				get_template_part('menu', 'sidebar');
			}
		?>
		</ul>
	</div>
</div>
