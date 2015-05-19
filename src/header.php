<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<!-- Theme Development by Jay Laiche @ Rocket Pop Media
		     jaylaiche.com / rocketpopmedia.com -->
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
		
		<!-- slick slider css -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.5/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.5/slick-theme.css"/>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo header-container">
						<a href="<?php echo home_url(); ?>">
							<h1>
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="OBX Surf Info" class="logo-img">
							</h1>
						</a>
					</div>
					<!-- /logo -->

					<!-- ad -->
					<div class="obxad header-container">
						<p>ad space here</p>
					</div>
					<!-- /ad -->

					<div class="socials header-container">
						<ul>
							<li>
								<a class="soc-icon fb" href="#"></a>
							</li>
							<li>
								<a class="soc-icon twit" href="#"></a>
							</li>
							<li>
								<a class="soc-icon rss" href="#"></a>
							</li>
							<li>
								<a class="soc-icon ig" href="#"></a>
							</li>
						</ul>
						<a class="subscribe" href="#"><span>Subscribe</span></a>
					</div>

					<!-- nav -->
					<nav class="nav mobile" role="navigation">
						<div class="nav-trigger">
							<h2 class="words">Home</h2>
							<span class="hamburger">
								<img src="<?php echo get_template_directory_uri() . '/img/hamburger.png'; ?>" alt="Mobile Navigation">
							</span>
						</div>
						<div class="mobile-overlay">
							<span class="hide">X</span>
							<?php html5blank_mobilenav(); ?>
						</div>
					</nav> 
					<!-- /nav -->

			</header>
			<!-- /header -->
