<?php
/**
 * Template Name: OF zdjęcie, tekst, 3 pola: [Z][T|3x1]
 */
?>

<?php
	get_header();
	the_post();

	$pages = Utils::getChildPages(get_the_ID(), 5);
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
					<div class="col-xs-6 col-lg-3 padd-box padd-box-sm">
					<?php
						if (!empty($pages[0])) {
							$page = $pages[0];
							$boxStyle = 'box-auto';
							get_template_part('box', Utils::ensureBoxType($page->ID));
						} else {
							Utils::printBoxPlaceholder(0);
						}
					?>
					</div>
					<div class="col-xs-6 col-lg-9 padd-box">
						<div class="row">
							<div class="col-xs-12 padd-box">
								<?php
									if (!empty($pages[1])) {
										$page = $pages[1];
										$boxStyle = 'box-auto';
										get_template_part('box', Utils::ensureBoxType($page->ID));
									} else {
										Utils::printBoxPlaceholder(1);
									}
								?>
							</div>
						</div>
						<div class="row">
							<?php
								for ($i = 2; $i <= 4; $i++) :
							?>
							<div class="col-lg-4 padd-box">
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
							<?php endfor ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
