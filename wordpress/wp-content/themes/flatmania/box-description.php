<?php
	global $page, $boxStyle;
?>
<div class="box box-description animated animation fadeInUp <?php echo $boxStyle ?>">
	<div class="box-content box-default">
		<h2><?php echo $page->post_title ?></h2>
		<?php echo Utils::formatContent($page->post_content) ?>
	</div>
</div>
