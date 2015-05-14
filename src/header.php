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

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- ad -->
					<div class="obxad">
						<p>ad space here</p>
					</div>
					<!-- /ad -->

					<div class="socials">
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
						<a class="subscribe" href="#">Subscribe</a>
					</div>

					<!-- nav -->
					<!-- <nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav> -->
					<!-- /nav -->

			</header>
			<!-- /header -->
