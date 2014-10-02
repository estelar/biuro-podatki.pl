<?php
	global $page;
	$color = ensureColor($page->ID);
	$sizeStyle = ensureSizeStyle($page->ID);
	$url = ensureUrl($page->ID);
?>
<div class="<?= $sizeStyle ?>">
	<div class="box box-navi box-md br-<?= $color ?> animated animation fadeInUp">
		<a href="<?= $url ?>">
			<span class="box-content navigation slide-up">
				<span class="title"><?= $page->post_title ?></span>
				<span class="text"><?= $page->post_content ?></span>
			</span>
		</a>
	</div>
</div>
