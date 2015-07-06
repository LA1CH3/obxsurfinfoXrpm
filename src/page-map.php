<?php 

/* Template Name: Map */


get_header(); ?>

<main role="main" class="map">
	<div class="before-content">

		<nav class="nav desktop" role="navigation">
			<?php html5blank_nav(); ?>
		</nav>

		<div class="vid-info">
			<div class="location">
				<span class="vid-title">Currently:</span>
				<span class="vid-location">Nags Head</span>
			</div>
			<div class="wind">
				<span class="vid-title">Duck Research Pier</span>
				<span class="duck-swell"></span>
			</div>
			<div class="temp last">
				<img src="<?php echo get_template_directory_uri() . '
				/img/mysparklyhappysunshinecloud.png'; ?>" alt="Temperature">
				<span class="vid-title">Air:</span>
				<span class="duck-temp"></span>
			</div>
		</div>

	</div>
	<h2 class="header-break">Interactive Wave Map<span>click below for reports and data</span></h2>
		<iframe src="http://mapsengine.google.com/map/embed?mid=zLwzMpoYZbnw.kEvGYE-B2rHw" height="700" width="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
	<div class="subscribe-box subscribe-desktop">
			<img src="<?php echo get_template_directory_uri() . '/img/header-subscribe.png'; ?>" alt="#">
			<p>Be informed on what's happening on the Outer Banks and never miss an event. Subscribe today and we'll deliver all the goods directly to your email account. It's easy.</p>
			<div class="subscribe-input">
				<h3>Enter Your Email Here:</h3>
				<form class="search-bar" role="search">
				  <input type="search" placeholder="Enter Search" />
				  <button type="submit">
				    Subscribe
				  </button>
				</form>
			</div>
		</div>
		<div class="sidebar-ads-wrap">
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				Ad Space Here
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				Ad Space Here
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				Ad Space Here
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				Ad Space Here
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-mobile-ad">
				Ad Space Here
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-mobile-ad">
				Ad Space Here
			</a>
		</div>
		<a href="#" class="obxad full">
			<p>ad goes here</p>
		</a>
		

		<div class="subscribe-box subscribe-mobile">
			<img src="<?php echo get_template_directory_uri() . '/img/header-subscribe.png'; ?>" alt="#">
			<p>Be informed on what's happening on the Outer Banks and never miss an event. Subscribe today and we'll deliver all the goods directly to your email account. It's easy.</p>
			<div class="subscribe-input">
				<h3>Enter Your Email Here:</h3>
				<form class="search-bar" role="search">
				  <input type="search" placeholder="Enter Search" />
				  <button type="submit">
				    Subscribe
				  </button>
				</form>
			</div>
		</div>

	<div class="mobile-footer">
		<img src="<?php echo get_template_directory_uri() . 
		'/img/logo-blue.png'; ?>" alt="OBX Surf Info">
		<?php html5blank_mobilenav(); ?>
	</div>

</main>

<?php get_footer(); ?>