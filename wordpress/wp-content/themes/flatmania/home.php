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
	$frontPageId = get_option('page_on_front');
	$pages = get_pages(array(
		'parent' => $frontPageId,
		'sort_column' => 'menu_order'
	));

	foreach ($pages as $page) {
		get_template_part('box', 'wrapper');
	}
?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
