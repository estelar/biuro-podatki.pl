<?php
	global $page;
	$sizeStyle = ensureSizeStyle($page->ID);
?>
<div class="<?= $sizeStyle ?>">
	<div class="box box-description box-md animated animation">
		<div class="box-content box-default">
			<h2><?= $page->post_title ?></h2>
			<p>
				<?= $page->post_content ?>
			</p>
		</div>
	</div>
</div>