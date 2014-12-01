<?php
	global $menuItem;
	$subItem = null;
	$subItems = Utils::getChildPages($menuItem->ID);
	$bgcolor = Utils::getMeta($menuItem->ID, 'bgcolor');
?>
<ul class="dropdown-menu dropdown-sm"<?php if (!empty($bgcolor)) echo ' style="background-color:' . $bgcolor . '; border-color:rgba(75,170,211,0) rgba(75,170,211,0) ' . $bgcolor . '"' ?>>
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
<?php if(!empty($bgcolor)) : ?>
<style type="text/css">
.header .navbar-default .navbar-nav > .dropdown .dropdown-menu:after {
  border-color: rgba(75, 170, 211, 0) rgba(75, 170, 211, 0) <?php echo $bgcolor ?>;
}
</style>
<?php endif; ?>