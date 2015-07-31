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
		<!-- <iframe src="http://mapsengine.google.com/map/embed?mid=zLwzMpoYZbnw.kEvGYE-B2rHw" height="1085" width="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe> -->
		<iframe class="surf-map" src="https://www.google.com/maps/d/embed?mid=z3-rd3vo__6g.kbhErvatmfuM" frameborder="0" width="100%" height="1085"></iframe>
	<div class="subscribe-box subscribe-desktop">
			<img src="<?php echo get_template_directory_uri() . '/img/header-subscribe.png'; ?>" alt="#">
			<p>Be informed on what's happening on the Outer Banks and never miss an event. Subscribe today and we'll deliver all the goods directly to your email account. It's easy.</p>
			<div class="subscribe-input">
				<h3>Click here to subscribe:</h3>
					<form class="search-bar" role="search">
						<a class="subscribe" href="<?php echo site_url('/subscribe/') ?>"><span>Subscribe</span></a>
					</form>
			</div>
		</div>
		<div class="sidebar-ads-wrap">
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&refresh=5"></script>
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&refresh=5"></script>
			</a>
			<div class="sub-list recent-list-left">
				<h2>Latest Surf Reports</h2>
			<?php 

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
						'offset' => 2
						);

					$morequery = new WP_Query($args);

					if( $morequery->have_posts() ) : while( $morequery->have_posts()) :

				 ?>

					<?php $morequery->the_post(); ?>
						
					<div class="blog-snippet">
						<div class="blog-content">
							<span><?php the_time(get_option('date_format')); ?> @ <?php the_time(); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div> 
			<?php endwhile; endif; wp_reset_postdata(); ?>	
			</div>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&refresh=5"></script>
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&refresh=5"></script>
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=4&refresh=5"></script>
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-desktop-ad">
				<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=4&refresh=5"></script>
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-mobile-ad" style="background-image:url(<?php echo get_template_directory_uri() . '/img/Advertisers/Zone1/badbean.jpg'; ?>);">
				
			</a>
			<a href="#" class="obxad obx-sidebar-ad obx-mobile-ad" style="background-image:url(<?php echo get_template_directory_uri() . '/img/Advertisers/Zone2/carolinabrew.jpg'; ?>);">
				
			</a>
		</div>
		<a href="#" class="obxad full">
			<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=2&refresh=5"></script>
		</a>
		

		<div class="subscribe-box subscribe-mobile">
			<img src="<?php echo get_template_directory_uri() . '/img/header-subscribe.png'; ?>" alt="#">
			<p>Be informed on what's happening on the Outer Banks and never miss an event. Subscribe today and we'll deliver all the goods directly to your email account. It's easy.</p>
			<div class="subscribe-input">
				<h3>Click here to subscribe:</h3>
					<form class="search-bar" role="search">
						<a class="subscribe" href="<?php echo site_url('/subscribe/') ?>"><span>Subscribe</span></a>
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