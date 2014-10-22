<?php
/**
 * Template Name: OF zwykła strona
 */
?>

<?php
	get_header();
	the_post();
?>

<div class="row">
	<div class="col-md-3">
		<?php get_template_part('sidebar', 'offer') ?>
	</div>
	<div class="col-md-9">
		<div class="page-mainbar offer">
			<h2><?php the_title() ?></h2>
			<div class="offer-content">
				<?php the_content() ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
