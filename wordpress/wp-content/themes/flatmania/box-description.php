<?php
	global $page;
?>
<div class="box box-description box-md animated animation">
	<div class="box-content box-default">
		<h2><?php echo $page->post_title ?></h2>
		<p>
			<?php echo Utils::formatContent($page->post_content) ?>
		</p>
	</div>
</div>
