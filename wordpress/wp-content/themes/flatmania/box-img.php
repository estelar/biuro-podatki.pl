<?php
	global $page;
	$color = ensureColor($page->ID);
	$sizeStyle = ensureSizeStyle($page->ID);
?>
<div class="<?= $sizeStyle ?>">
	<div class="box box-img box-md br-<?= $color ?> animated animation fadeInUp">
		<div class="box-content box-gallery slide-up padd-zero">
			<?= $page->post_content ?>
		</div>
	</div>
</div>
