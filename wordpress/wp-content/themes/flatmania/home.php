<?php
/**
 * Template Name: Strona główna
 */
?>

<?php get_header(); ?>

<div class="box-wrapper">
	<div class="container">
		<div class="home">
			<div class="row">
<?php
	$pages = Utils::getChildPages(get_option('page_on_front'));

	foreach ($pages as $page) {
		get_template_part('box', 'wrapper');
	}
?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
