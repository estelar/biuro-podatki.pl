<?php
/**
 * Template Name: Oferta - zwykła strona
 */
?>

<?php
	get_header();

	the_post();
?>

<div class="row">
	<div class="col col-md-3">
		<?php get_template_part('sidebar', 'offer') ?>
	</div>
	<div class="col col-md-9">
		<div class="page-mainbar offer padd-left">
			<h2><?php the_title() ?></h2>
			<div class="offer-content">
				<?php the_content() ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
