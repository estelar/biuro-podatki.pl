<?php
/**
 * Template Name: OF tekst, zdjęcie, tekst, 2 pola: T|[Z][T][1x2]
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
					<div class="col-xs-12 padd-box">
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
				</div>
				<div class="row">
					<div class="col-xs-6 col-lg-3 padd-box">
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
					<div class="col-xs-6 col-lg-6 padd-box">
					<?php
						if (!empty($pages[2])) {
							$page = $pages[2];
							$boxStyle = 'box-auto';
							get_template_part('box', Utils::ensureBoxType($page->ID));
						} else {
							Utils::printBoxPlaceholder(2);
						}
					?>
					</div>
					<div class="col-lg-3">
						<div class="row">
							<div class="col-xs-12 padd-box">
							<?php
								if (!empty($pages[3])) {
									$page = $pages[3];
									$boxStyle = 'box-md';
									get_template_part('box', Utils::ensureBoxType($page->ID));
								} else {
									Utils::printBoxPlaceholder(3);
								}
							?>
							</div>
							<div class="col-xs-12 padd-box">
							<?php
								if (!empty($pages[4])) {
									$page = $pages[4];
									$boxStyle = 'box-md';
									get_template_part('box', Utils::ensureBoxType($page->ID));
								} else {
									Utils::printBoxPlaceholder(4);
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
