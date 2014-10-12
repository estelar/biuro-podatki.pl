<?php
	global $menuItem;
	$color = Utils::ensureColorRandomly($menuItem->ID);
	$icon = Utils::getMeta($menuItem->ID, 'icon');
	$submenu = Utils::getMeta($menuItem->ID, 'submenu');
?>
<?php if ($submenu) : ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle br-<?php echo $color ?>" data-toggle="dropdown">
		<?php if ($icon != null) : ?><i class="link-icon <?php echo $icon ?>"></i><?php endif; ?>
		<span class="link-title"><?php echo $menuItem->post_title ?> <b class="fa fa-angle-down"></b></span>
	</a>
	<?php get_template_part('menu', 'sub');	?>
</li>
<?php else : ?>
<li>
	<a href="<?php echo $menuItem->guid ?>" class="br-<?php echo $color ?>">
		<?php if ($icon != null) : ?><i class="link-icon <?php echo $icon ?>"></i><?php endif; ?>
		<span class="link-title"><?php echo $menuItem->post_title ?></span>
	</a>
</li>
<?php endif; ?>