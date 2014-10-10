<?php
	global $page;
	$sizeStyle = Utils::ensureSizeStyle($page->ID);
	$boxType = Utils::ensureBoxType($page->ID);
	$break = get_post_meta($page->ID, 'break', true) != '';
?>
<div class="<?php echo $sizeStyle; if ($boxType == 'group') echo ' boxGroup'; if ($break) echo ' newRow'; ?>">
	<?php get_template_part('box', $boxType); ?>
</div>
