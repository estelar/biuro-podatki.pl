<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="description" content="Biuro rachunkowe Szczecin - oferujemy profesjonalną księgowość. Biuro podatkowe - doradzamy w zakresie podatków. Szczecin - podatki">
		<meta name="keywords" content="biuro rachunkowe szczecin, księgowość szczecin, biuro podatkowe szczecin, usługi księgowe szczecin, doradca podatkowy szczecin, podatki szczecin, księgowa szczecin, abolicja podatkowa">
    <meta name="author" content="gestelar">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/animate.min.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/flatmania.css">
		<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/settings-ie8.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/ie-style.css">
		<![endif]-->
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/flatmania-customization.css?rev=20140929">
    <title><?php bloginfo ('name') ?><?php wp_title( '|', true, 'left' ); ?></title>
	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper white">
			<div class="header">
				<div class="header-navigation">
					<div class="container">
						<div class="languages">
						<?php get_template_part('menu', 'languages') ?>
						</div>
						<div class="row">
							<div class="col col-md-6">
								<div class="logo">
									<h1>
										<a href="<?php echo home_url(); ?>"><small><?php _e('Tax Advisor\'s Office', 'flatmania'); ?></small></a><br />
										<a href="<?php echo home_url(); ?>"><strong><?php _e('Natalia Gorczyca Accounting Office', 'flatmania'); ?></strong></a>
								  </h1>
								</div>
							</div>
							<div class="col col-md-6">
								<nav class="navbar navbar-default" role="navigation">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle br-orange" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
											<span class="sr-only">Przełącz nawigację</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div class="collapse navbar-collapse" id="menu-main">
									<?php get_template_part('menu', 'main') ?>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="inner-page">
				<div class="container">
