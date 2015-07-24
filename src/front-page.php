<?php get_header(); ?>

<main role="main">

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

	<!-- section -->
	<section>

		<div class="mosaic-top">

			<div class="slider frontpage-slider">

			<?php

				$args = array(

					'post_type' => 'post',
					'posts_per_page' => 5,
					'cat' => 7

					);

				$sliderquery = new WP_Query($args);

				if($sliderquery->have_posts()) : while($sliderquery->have_posts()) :$sliderquery->the_post(); ?>

				<div class="slider-container">
					<?php the_post_thumbnail("slider_size"); ?>
					<div class="slider-overlay">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>
				</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>
				
			</div>

			<div class="vid-info cloned">
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

			<script type='text/javascript' src='<?php echo get_template_directory_uri() . '/js/lib/jwplayer.js'; ?>'></script>

			<script type="text/javascript">jwplayer.key="HkK82SF6pb3Nsl4jUamA+6I28yoBeFIUZm54ow+2JbI=";</script> 

			<div id="mediaspace">
				<p class="android_fallback"><a href="http://64.34.175.240:1935/cameras/camera3.stream/playlist.m3u8">Sorry, your device does not support native live streaming. Click here to view the OBXSurfInfo live stream through your device's native video player.</a></p>
				<del datetime="2013-09-25T17:40:33+00:00"></del>
			</div>

		<script type="text/javascript">// < ![CDATA[
			jwplayer('mediaspace').setup({
				'author': 'OBXSURFINFO',
				'description': 'OBXsurfinfo.com Cam: Nags Head, NC',
				'image': 'http://dev.obxsurfinfo.com/obxsurf/wp-content/uploads/2015/06/logo_video.png',
				'logo' : {
					file: "http://obxsurfinfo.com/wp-content/uploads/2015/06/logo-video-black.png",
					position: 'top-left'
				},
				'title': 'OBXsurfinfo.com Cam: Nags Head, NC',
				'backcolor': 'CCCCCC',
				'frontcolor': '0000FF',
				'screencolor': '000000',
				'streamer':  'http://64.34.175.240:1935/cameras/camera3.stream/playlist.m3u8',
				'fallback': false,
				'autostart': 'true',
				'controlbar': 'bottom',
				'width': '320',
				'height': '210',
				'androidhls' : 'true',
				'stretching': 'fill',
				sources: [{
					file: 'rtsp://64.34.175.240:1935/cameras/camera3.stream'
				},{
					file: 'rtmp://64.34.175.240:1935/cameras/camera3.stream'
				},{
					file: 'http://64.34.175.240:1935/cameras/camera3.stream/playlist.m3u8',
					default: true
				},],
				'modes': [
				{type: 'flash', src: 'http://obxsurfinfo.com/jwplayer/jwplayer.flash.swf'},
				{
					type: 'html5',
					config: {
						'file': 'http://64.34.175.240:1935/cameras/camera3.stream/playlist.m3u8',
						'provider': 'video'
					}
				},

				{
					type: 'download',
					config: {
						'file': 'http://64.34.175.240:1935/cameras/camera3.stream/playlist.m3u8',
						'provider': 'video'
					}
				}
				]
			});                            
			// ]]>

			// Pause jwplayer after period of time
			window.setTimeout(function(){
				jwplayer().pause(true);
			}, 30000);

			</script>

			<div class="weather-wrapper">
				<!-- <img src="<?php echo get_template_directory_uri() . '/img/placeholder-weather.png'; ?>" alt="surf"> -->
				<a href="http://www.accuweather.com/en/us/nags-head-nc/27959/current-weather/349742" class="aw-widget-legal">
				<!--
				By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
				-->
				</a><div id="awtd1436453448785" class="aw-widget-36hour"  data-locationkey="349742" data-unit="f" data-language="en-us" data-useip="false" data-uid="awtd1436453448785" data-editlocation="false"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>

			</div>

			<a href="" class="obxad full">
				<p>ad goes here</p>
			</a>
	</div>

	<div class="mosaic-bottom">
			

		<div class="latest-posts desktop-main top-posts">
			<h2>Latest</h2>
			<?php

				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '2'
					);

				$latestquery = new WP_Query($args);

				$i = 0;


				if( $latestquery->have_posts() ) : while( $latestquery->have_posts() ) : $latestquery->the_post();

				if($i == 0){ ?>

					<div class="recent-featured-left">
						<div class="image-contain">
							<?php the_post_thumbnail("front_thumb"); ?>
							<div class="date-overlay">
								<p><?php the_time(get_option('date_format')); ?></p>
							</div>
						</div>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
					</div>

					<?php $i++; continue; ?>

				<?php } else if( $i == 1 ){ ?>

					<div class="recent-featured-right">
						<div class="image-contain">
							<?php the_post_thumbnail("front_thumb"); ?>
							<div class="date-overlay">
								<p><?php the_time(get_option('date_format')); ?></p>
							</div>
						</div>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
					</div>

				<?php }

				endwhile; endif; wp_reset_postdata(); ?>

				<?php 

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
						'offset' => 2
						);

					$morequery = new WP_Query($args);

					$i = 2;

					if( $morequery->have_posts() ) : while( $morequery->have_posts()) :

				 ?>
				
			<div class="sub-list recent-list-left">

				<?php if($i % 2 == 0){ 

					$morequery->the_post(); ?>
						
					<div class="blog-snippet">
						<div class="blog-image">
							<?php the_post_thumbnail("tiny_thumb"); ?>
						</div>
						<div class="blog-content">
							<span><?php the_time(get_option('date_format')); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div> 


					<?php $i++; } ?>	
			</div>
			<div class="sub-list recent-list-right">

			<?php if($i % 2 !== 0){ 

				$morequery->the_post(); ?>

				<div class="blog-snippet">
					<div class="blog-image">
						<?php the_post_thumbnail("tiny_thumb"); ?>
					</div>
					<div class="blog-content">
						<span><?php the_time(get_option('date_format')); ?></span>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
				</div>


				<?php $i++; } ?>

			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<div class="desktop-secondary">
			<!--
		Add the code below to the bottom of your page, just before the closing </body> tag.
		Edit myLatlng and the other variables.

		Find syntax for Features that can be styled here:

		https://developers.google.com/maps/documentation/javascript/reference#MapTypeStyleFeatureType

		Or use a service such as:

		http://software.stadtwerk.org/google_maps_colorizr/#
		http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
		https://developers.google.com/maps/documentation/javascript/tutorial
		-->
		
		<h2 class="header-break">Find Your Break<span>click below for reports and data</span></h2>
		<!-- <iframe class="surf-map" src="http://mapsengine.google.com/map/embed?mid=zLwzMpoYZbnw.kEvGYE-B2rHw" height="500" width="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe> -->
		<iframe class="surf-map" src="https://www.google.com/maps/d/embed?mid=z3-rd3vo__6g.kbhErvatmfuM" frameborder="0" width="100%" height="500"></iframe>
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
		<a href="" class="obxad obx-sidebar-ad">
			Ad Space Here
		</a>
		<a href="" class="obxad obx-sidebar-ad">
			Ad Space Here
		</a>
		<a href="" class="obxad obx-sidebar-ad">
			Ad Space Here
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


		</div>

		<div class="latest-posts desktop-main local-and-travel">
			<div class="recent-featured-left">
				<h2>Local</h2>

				<?php

					$args = array(

						'post_type' => 'post',
						'posts_per_page' => 1,
						'cat' => 61

						);

					$localquery = new WP_Query($args);

				 	if($localquery->have_posts()) : while( $localquery->have_posts()) : $localquery->the_post(); ?>

				<div class="image-contain">
						<?php the_post_thumbnail("front_thumb"); ?>
						<div class="date-overlay">
							<p><?php the_time(get_option('date_format')); ?></p>
						</div>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
				</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>
			<div class="recent-featured-right">
				<h2>Travel</h2>
				<?php

					$args = array(

						'post_type' => 'post',
						'posts_per_page' => 1,
						'cat' => 5

						);

					$travelquery = new WP_Query($args);

				 	if($travelquery->have_posts()) : while( $travelquery->have_posts()) : $travelquery->the_post(); ?>

				<div class="image-contain">
						<?php the_post_thumbnail("front_thumb"); ?>
						<div class="date-overlay">
							<p><?php the_time(get_option('date_format')); ?></p>
						</div>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
				</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>

			<div class="sub-list recent-list-left">

			<?php

				$args = array(

					'post_type' => 'post',
					'posts_per_page' => 2,
					'offset' => 1,
					'cat' => 4

					);

				$morelocalquery = new WP_Query($args);

				if($morelocalquery->have_posts()) : while($morelocalquery->have_posts()) : $morelocalquery->the_post(); 

			 ?>
				<div class="blog-snippet">
						<div class="blog-image">
							<?php the_post_thumbnail("tiny_thumb"); ?>
						</div>
						<div class="blog-content">
							<span><?php the_time(get_option('date_format')); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div> 
				
			<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
			<div class="sub-list recent-list-right">
			<?php

				$args = array(

					'post_type' => 'post',
					'posts_per_page' => 2,
					'offset' => 1,
					'cat' => 5

					);

				$moretravelquery = new WP_Query($args);

				if($moretravelquery->have_posts()) : while($moretravelquery->have_posts()) : $moretravelquery->the_post(); 

			 ?>
				<div class="blog-snippet">
						<div class="blog-image">
							<?php the_post_thumbnail("tiny_thumb"); ?>
						</div>
						<div class="blog-content">
							<span><?php the_time(get_option('date_format')); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div> 

				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>

		<div class="partners desktop-main">
			<h2>Partners</h2>
			<div class="slider-partners">

			<?php

			if(have_posts()) : while(have_posts()) : the_post();

				if( have_rows('partners')) :

					while( have_rows('partners')) : the_row();

					$partnerlogo = get_sub_field('plain_logo');
					$partnerhoverlogo = get_sub_field('hover_logo');
					$partnerlink = get_sub_field('link');
			 ?>
				<div>
					<a target="_blank" href="<?php echo $partnerlink; ?>">
					<img src="<?php echo $partnerlogo; ?>" data-hover="<?php echo $partnerhoverlogo; ?>" alt="Wave Force">
					</a>
				</div>

			<?php endwhile; endif; ?>

			<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>



		





		</div>


		</section>
		<!-- /section -->
		<div class="mobile-footer">
			<img src="<?php echo get_template_directory_uri() . 
			'/img/logo-blue.png'; ?>" alt="OBX Surf Info">
			<?php html5blank_mobilenav(); ?>
		</div>
	</main>

<?php get_footer(); ?>
