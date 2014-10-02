<?php
/**
 * Template Name: Home
 */
?>

<?php get_header(); ?>

<div class="box-wrapper">
	<div class="container">
		<div class="row">

<?php
	$pages = get_pages(array(
		'parent' => '4',
		'sort_column' => 'ID'
	));

	foreach ($pages as $page) {
		$boxType = ensureBoxType($page->ID);
		get_template_part('box', $boxType);
	}
?>

		</div>
	</div>
</div>

<?php get_footer(); ?>
