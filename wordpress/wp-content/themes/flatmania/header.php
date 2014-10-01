<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="description" content="Biuro Rachunkowe, Szczecin, Natalia Gorczyca">
		<meta name="keywords" content="Biuro Rachunkowe, Szczecin, Natalia Gorczyca">
    <meta name="author" content="gestelar">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/animate.min.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/flatmania.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/flatmania-customization.css?rev=20140929">
		<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/settings-ie8.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/ie-style.css">
		<![endif]-->
		<?php wp_head(); ?>
    <title><?php bloginfo ('name') ?><?php wp_title( '|', true, 'left' ); ?></title>
	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper white">
			<div class="header">
				<div class="header-navigation">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<div class="logo">
									<h1>
										<a href="index.orig.html" target="_blank"><small>Kancelaria Doradcy Podatkowego</small></a><br />
										<a href="index.kazik.html" target="_blank"><strong>Natalia Gorczyca</strong></a>
								  </h1>
								</div>
							</div>
							<div class="col-md-7">
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
										<ul class="nav navbar-nav navbar-right">
											<?php wp_list_pages(array(
													'depth' => 1,
													'title_li' => '',
													'link_before' => '<i class="fa link-icon"></i><span class="link-title">',
													'link_after' => '</span>'
												)); ?>
										</ul>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="inner-page">
				<div class="container">
