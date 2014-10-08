<?php
	global $page;
	$color = ensureColor($page->ID);
	$sizeStyle = ensureSizeStyle($page->ID);
	$url = ensureUrl($page->ID);
?>
<div class="<?= $sizeStyle ?>">
	<div class="box box-standard box-md br-<?= $color ?> animated animation fadeInUp <?php if(!empty($url)) echo 'hasUrl' ?>">
		<?php if (empty($url)) : ?>
		<div class="box-content slide-up">
			<h2><?= $page->post_title ?></h2>
			<?php if (!empty($page->post_content)) : ?>
			<p><?= $page->post_content ?></p>
			<?php endif; ?>
		</div>
		<?php else : ?>
		<a href="<?= $url ?>">
			<span class="box-content navigation slide-up">
				<span class="title"><?= $page->post_title ?></span>
				<?php if (!empty($page->post_content)) : ?>
				<span class="text"><?= $page->post_content ?></span>
				<?php endif; ?>
			</span>
		</a>
		<?php endif; ?>
	</div>
</div>
