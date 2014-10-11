<?php
/**
 * Template Name: Oferta - marynarze
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
						$pages = Utils::getChildPages(get_the_ID(), 5);
						$cnt = count($pages);

						if ($cnt >= 0) :
					?>
						<div class="col-md-3 autoBox">
						<?php
								$page = $pages[0];
								get_template_part('box', 'image')
						?>
						</div>
						<?php if ($cnt >= 1) : ?>
						<div class="col-md-1"></div>
						<div class="col-md-8">
							<?php
									$page = $pages[1];
									get_template_part('box', 'description');

									if ($cnt >= 2) :
							?>
							<div class="row">
							<?php for ($i = 2; $i < $cnt; $i++) :?>
								<div class="col-md-4">
									<?php
										$page = $pages[$i];
										get_template_part('box', 'standard');
									?>
								</div>
							<?php endfor ?>
							</div>
							<?php endif ?>
						</div>
						<?php endif ?>
					<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
