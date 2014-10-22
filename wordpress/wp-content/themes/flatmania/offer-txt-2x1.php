<?php
/**
 * Template Name: OF tekst, 2 pola: T|2x1
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
				<div class="row">
				<?php
					$pages = Utils::getChildPages(get_the_ID(), 3);
					$sizes = array('col-lg-12', 'col-sm-6', 'col-sm-6');

					for ($i = 0; $i < 3; $i++) :
				?>
					<div class="<?php echo $sizes[$i] ?> padd-box-sm">
					<?php
						if (!empty($pages[$i])) {
							$page = $pages[$i];
							$boxStyle = 'box-auto';
							get_template_part('box', Utils::ensureBoxType($page->ID));
						} else {
							Utils::printBoxPlaceholder($i);
						}
					?>
					</div>
				<?php endfor; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
