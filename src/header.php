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
		
		<!-- slick slider css -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.5/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.5/slick-theme.css"/>

        <?php if(is_page_template('page-report.php') || is_page_template('page-report-nocam.php')){ ?>

          <script src="<?php echo get_template_directory_uri(); ?>/static/components/d3/d3.js"></script>
		  <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/components/bootstrap/dist/css/bootstrap.min.css">
		  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/components/bootstrap/dist/css/bootstrap-theme.min.css"> -->
		 
		  <link href="<?php echo get_template_directory_uri(); ?>/static/components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		  <script src="<?php echo get_template_directory_uri(); ?>/static/components/bootstrap/dist/js/bootstrap.min.js"></script>  
		  <script src="<?php echo get_template_directory_uri(); ?>/static/components/moment/moment.js"></script>  

		  <link href="<?php echo get_template_directory_uri(); ?>/static/css/plot_css.css" rel="stylesheet">
		  <link href="<?php echo get_template_directory_uri(); ?>/static/css/other_plot.css" rel="stylesheet">

		  <script src="<?php echo get_template_directory_uri(); ?>/static/js/plot_function.js"></script>  
		  <script src="<?php echo get_template_directory_uri(); ?>/static/js/plot_man.js"></script>  
		  <script src="<?php echo get_template_directory_uri(); ?>/static/js/suncalc.js"></script>  
		  <script src="<?php echo get_template_directory_uri(); ?>/static/js/utilities.js"></script>  
		  <script src="<?php echo get_template_directory_uri(); ?>/static/js/water-temp.js"></script>  
		  <script src="<?php echo get_template_directory_uri(); ?>/static/js/plot_tide.js"></script> 
		  <script src="<?php echo get_template_directory_uri(); ?>/static/js/main.js"></script> 

        	<?php } ?>

        	<!--[if IE]>
			<style>
			    .slick-dots {
					bottom: 66px !important;
			    }
			</style>
			<![endif]-->

	</head>
	<body <?php body_class(); ?>>

	<div class="preloader">
	<img src="<?php echo get_template_directory_uri() . '/img/spinwheelicon.png'; ?>" alt="OBX Surf Info">
		<span id="loading2">
                        <span id="outerCircle">
                        	
                        </span>
        </span>
	</div>
	

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
					<a href="#" class="obxad obxad-top-center header-container">
						<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=1"></script>
					</a>
					<!-- /ad -->

					<div class="socials header-container">
						<ul>
							<li>
								<a target="_blank" class="soc-icon fb" href="https://www.facebook.com/OBXSurfInfo"></a>
							</li>
							<li>
								<a target="_blank" class="soc-icon twit" href="https://twitter.com/obxsurfinfo"></a>
							</li>
							<li>
								<a target="_blank" class="soc-icon rss" href="<?php echo bloginfo('rss2_url'); ?>"></a>
							</li>
							<li>
								<a target="_blank" class="soc-icon ig" href="#"></a>
							</li>
						</ul>
						<a class="subscribe" href="<?php echo site_url('/subscribe/') ?>"><span>Subscribe</span></a>
					</div>

					<!-- nav -->
					<nav class="nav mobile" role="navigation">
						<div class="nav-trigger">
							<h2 class="words">
							<a href="<?php echo site_url(); ?>">Home</a>
							<a href="<?php echo site_url('/reports/') ?>">Reports</a>
							<a href="<?php echo site_url('/blogs/') ?>">Blogs</a>
							</h2>
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

			<?php

			//$req = "http://sdf.ndbc.noaa.gov/sos/server.php?request=GetObservation&service=SOS&version=1.0.0&offering=urn:ioos:station:wmo:44095&observedproperty=Waves&responseformat=text/csv&eventtime=latest";
			//$response = file_get_contents($req);



			 ?>














