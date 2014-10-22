<?php
/**
 * Template Name: OF 6 pól: 2x3
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
					$pages = Utils::getChildPages(get_the_ID(), 6);
					for ($i = 0; $i < 6; $i++) :
				?>
					<div class="col-sm-6 padd-box">
					<?php
						if (!empty($pages[$i])) {
							$page = $pages[$i];
						  $boxStyle = 'box-md';
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
