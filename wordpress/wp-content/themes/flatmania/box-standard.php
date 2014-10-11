<?php
	global $page;
	$color = Utils::ensureColorRandomly($page->ID);
	$url = Utils::ensureUrl($page->ID);
?>
<div class="box box-standard box-md br-<?= $color ?> animated animation fadeInUp <?php if(!empty($url)) echo 'hasUrl' ?>">
	<?php if (empty($url)) : ?>
	<div class="box-content slide-up">
		<h2><?php echo $page->post_title ?></h2>
		<?php
			if (!empty($page->post_content)) {
				echo Utils::formatContent($page->post_content);
			}
		?>
	</div>
	<?php else : ?>
	<a href="<?php echo $url ?>">
		<span class="box-content navigation slide-up">
			<span class="title"><?php echo $page->post_title ?></span>
			<?php if (!empty($page->post_content)) : ?>
			<span class="text"><?php echo Utils::formatContent($page->post_content) ?></span>
			<?php endif; ?>
		</span>
	</a>
	<?php endif; ?>
</div>
