<?php
/**
 * Template Name: Oferta - PIT
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
				<div class="container">
					<div class="row">
					<?php
						$pages = Utils::getChildPages(get_the_ID(), 3);
						$boxes = array('description', 'standard', 'standard');
						$sizes = array('col-md-12', 'col-md-6', 'col-md-6');

						for ($i = 0; $i < count($pages); $i++) :
							$page = $pages[$i];
					?>
						<div class="<?php echo $sizes[$i] ?>">
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
