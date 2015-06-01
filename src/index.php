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
				<div class="slider-container">
					<img src="<?php echo get_template_directory_uri() . '/img/slider-surf.png'; ?>" alt="slider">
					<div class="slider-overlay">
						<h2>2014 Year In Review</h2>
					</div>
				</div>
				<div class="slider-container">
					<img src="<?php echo get_template_directory_uri() . '/img/slider-surf.png'; ?>" alt="slider">
					<div class="slider-overlay">
						<h2>Test 2</h2>
					</div>
				</div>
				<div class="slider-container">
					<img src="<?php echo get_template_directory_uri() . '/img/slider-surf.png'; ?>" alt="slider">
					<div class="slider-overlay">
						<h2>Test 3</h2>
					</div>
				</div>
				<div class="slider-container">
					<img src="<?php echo get_template_directory_uri() . '/img/slider-surf.png'; ?>" alt="slider">
					<div class="slider-overlay">
						<h2>Test 3</h2>
					</div>
				</div>
				<div class="slider-container">
					<img src="<?php echo get_template_directory_uri() . '/img/slider-surf.png'; ?>" alt="slider">
					<div class="slider-overlay">
						<h2>Test 3</h2>
					</div>
				</div>
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
				<a href="http://64.34.175.240:1935/cameras/camera3.stream/playlist.m3u8">WATCH LIVE ON Ipad,Iphone</a>
				<del datetime="2013-09-25T17:40:33+00:00"></del>
			</div>

		<script type="text/javascript">// < ![CDATA[
			jwplayer('mediaspace').setup({
				'author': 'OBXSURFINFO',
				'description': 'OBXsurfinfo.com Cam: Nags Head, NC',
				'image': 'http://www.obxsurfinfo.com/wp-content/uploads/2012/04/logo.png ',
				'title': 'OBXsurfinfo.com Cam: Nags Head, NC',
				'backcolor': 'CCCCCC',
				'frontcolor': '0000FF',
				'screencolor': '000000',
				'streamer':  'rtmp://64.34.175.240:1935/cameras/camera3.stream',
				'autostart': 'true',
				'controlbar': 'bottom',
				'width': '360',
				'height': '210',
				sources: [{
					file: 'rtmp://64.34.175.240:1935/cameras/camera3.stream'
				},{
					file: 'http://64.34.175.240:1935/cameras/camera3.stream/playlist.m3u8'
				}],
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
				<a href="http://www.accuweather.com/en/us/kitty-hawk-nc/27949/weather-forecast/2114054" class="aw-widget-legal">
			<!--
			By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
			-->
			</a><div id="awtd1432155532240" class="aw-widget-36hour"  data-locationkey="2114054" data-unit="f" data-language="en-us" data-useip="false" data-uid="awtd1432155532240" data-editlocation="false"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>

			</div>

			<div class="obxad full">
				<p>ad goes here</p>
			</div>
	</div>

	<div class="mosaic-bottom">
			

		<div class="latest-posts desktop-main">
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
							<img src="<?php echo get_template_directory_uri() . '/img/placeholder-latest.jpg'; ?>" alt="hey">
							<div class="date-overlay">
								<p>Dec 21, 2015</p>
							</div>
						</div>
						<h3>Premiere for The Invisible Woman</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>

					<?php $i++; ?>

				<?php } else if( $i == 1 ){ ?>

					<div class="recent-featured-right">
						<div class="image-contain">
							<img src="<?php echo get_template_directory_uri() . '/img/placeholder-latest1.jpg'; ?>" alt="hey">
							<div class="date-overlay">
								<p>Dec 21, 2015</p>
							</div>
						</div>
						<h3>Premiere for The Invisible Woman</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>

				<?php }

				endwhile; endif; wp_reset_postdata(); ?>
			<div class="sub-list recent-list-left">
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>
			</div>
			<div class="sub-list recent-list-right">
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>

			</div>
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
		<div class="obxad obx-sidebar-ad">
			Ad Space Here
		</div>
		<div class="obxad obx-sidebar-ad">
			Ad Space Here
		</div>
		<div class="obxad obx-sidebar-ad">
			Ad Space Here
		</div>
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


		</div>

		<div class="latest-posts desktop-main local-and-travel">
			<div class="recent-featured-left">
				<h2>Local</h2>
				<div class="image-contain">
					<img src="<?php echo get_template_directory_uri() . '/img/placeholder-latest.jpg'; ?>" alt="hey">
					<div class="date-overlay">
						<p>Dec 21, 2015</p>
					</div>
				</div>
				<h3>Premiere for The Invisible Woman</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="recent-featured-right">
				<h2>Travel</h2>
				<div class="image-contain">
					<img src="<?php echo get_template_directory_uri() . '/img/placeholder-latest1.jpg'; ?>" alt="hey">
					<div class="date-overlay">
						<p>Dec 21, 2015</p>
					</div>
				</div>
				<h3>Premiere for The Invisible Woman</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="sub-list recent-list-left">
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>
			</div>
			<div class="sub-list recent-list-right">
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>
				<div class="blog-snippet">
					<div class="blog-image">
						<img src="<?php echo get_template_directory_uri() . '/img/thumb.png'; ?>">
					</div>
					<div class="blog-content">
						<span>Dec 16, 2013</span>
						<h3>Blog Title Here</h3>
					</div>
				</div>

			</div>
		</div>

		<div class="partners desktop-main">
			<h2>Partners</h2>
			<div class="slider-partners">
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/img/partners/logo-wf.png'; ?>" alt="Wave Force">
				</div>
			</div>
		</div>



		





		</div>


		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
