<?php
/**
 * Template Name: Oferta - wirtualne biuro
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
		<div class="page-mainbar offer">
			<h2><?php the_title() ?></h2>
			<div class="offer-content">
				<div class="container">
					<div class="row">
					<?php
						$pages = Utils::getChildPages(get_the_ID(), 6);
						$boxes = array('image', 'standard', 'standard', 'standard', 'standard', 'image');

						for ($i = 0; $i < count($pages); $i++) :
							$page = $pages[$i];
					?>
						<div class="col col-md-6 padd-box">
						<?php get_template_part('box', $boxes[$i]) ?>
						</div>
					<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
