<?php
	global $item, $colSize;
	$icon = get_post_meta($item->ID, 'icon', true);
?>
<div class="col-sm-<?php echo $colSize ?>">
	<div class="content-item">
		<?php if(!empty($icon)) echo '<i class="' . $icon . '"></i>' ?>
		<h4><?php echo $item->post_title ?></h4>
		<?php echo Utils::formatContent($item->post_content) ?>
	</div>
</div>