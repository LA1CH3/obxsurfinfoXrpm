<?php 

/* Template Name: Surf Report */


get_header(); ?>

<main role="main" class="report">

<?php if(have_posts()) : while(have_posts()) : the_post();

	// getting some vars for later 
	$cat = get_field('category_name');

?>

	


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

<h2 class="report-title"><?php the_title(); ?></h2>
<div class="row">
	<iframe src="http://mapsengine.google.com/map/embed?mid=zLwzMpoYZbnw.kEvGYE-B2rHw" height="300" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
	<!-- this will be a custom field -->
	<?php $shortname = get_field('widget_shortname'); ?>
		<div id="widget">      
            <div id="tooltip" class="tooltipMenu" style="">
        </div>
	<script>
		var shortname = <?php echo json_encode($shortname); ?>;
		var d;
getStationData();
updateWidget(shortname);
	</script>
</div>

<div class="row">
	<a class="obxad obxad-report-long" href="#">Ad goes here</a>
	<a href="#" class="obxad obxad-report-short">Ad goes here</a>
</div>

<div class="row">
	<!-- custom field for the correct video here -->
	<script type='text/javascript' src='<?php echo get_template_directory_uri() . '/js/lib/jwplayer.js'; ?>'></script>

			<script type="text/javascript">jwplayer.key="HkK82SF6pb3Nsl4jUamA+6I28yoBeFIUZm54ow+2JbI=";</script> 

			<?php
			$rtmp = get_field('rtmp_video_link');
			$m3u8 = get_field('m3u8_video_link');

			 ?>

			<div id="mediaspace">
				<a href="<?php echo $m3u8; ?>">WATCH LIVE ON Ipad,Iphone</a>
				<del datetime="2013-09-25T17:40:33+00:00"></del>
			</div>

		<script type="text/javascript">// < ![CDATA[

			var rtmp = <?php echo json_encode($rtmp); ?>;
			var m3u8 = <?php echo json_encode($m3u8); ?>;

			jwplayer('mediaspace').setup({
				'author': 'OBXSURFINFO',
				'description': 'OBXsurfinfo.com Cam: Nags Head, NC',
				'image': 'http://localhost:8888/obxsurf/wp-content/uploads/2015/06/logo_video.png',
				'logo' : {
					file: "http://obxsurfinfo.com/wp-content/uploads/2015/06/logo-video-black.png",
					position: 'top-left'
				},
				'title': 'OBXsurfinfo.com Cam: Nags Head, NC',
				'backcolor': 'CCCCCC',
				'frontcolor': '0000FF',
				'screencolor': '000000',
				'streamer':  rtmp,
				'autostart': 'true',
				'controlbar': 'bottom',
				'height': '400',
				'stretching': 'fill',
				sources: [{
					file: rtmp
				},{
					file: m3u8
				}],
				'modes': [
				{type: 'flash', src: 'http://obxsurfinfo.com/jwplayer/jwplayer.flash.swf'},
				{
					type: 'html5',
					config: {
						'file': m3u8,
						'provider': 'video'
					}
				},
				{
					type: 'download',
					config: {
						'file': m3u8,
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

			<a class="obxad obxad-report-short" href="#">Ad goes here</a>

			<a class="obxad obxad-report-short" href="#">Ad goes here</a>

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

</div>

<?php endwhile; endif; wp_reset_postdata(); ?>

<div class="row reporter">
	<article>
		<h2><?php the_title(); ?></h2>
		<div class="socials header-container">

		<?php




			$args = array(
				'post_type' => 'surf_reports',
				'posts_per_page' => '1',
				'category_name' => $cat

				);

			$surfquery = new WP_Query($args);

			if($surfquery->have_posts()): while($surfquery->have_posts()) : $surfquery->the_post();

		 ?>
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
		<div class="headshot">
			<?php echo get_avatar(get_the_author_meta('ID')); ?>
			<h3>Local Reporter:</h3>
			<!-- this will be custom field or whatever -->
			<h3 class="author"><?php the_author(); ?></h3>
			<?php

				$authlink = get_the_author_meta('user_url');


			 ?>
			<a href="<?php echo $authlink; ?>">Click Here For Bio</a>
		</div>
		<?php

		$feat1 = get_field('featured_image_1');
		$feat2 = get_field('featured_image_2');

		$link1 = wp_get_attachment_image_src($feat1, 'full');
		$link2 = wp_get_attachment_image_src($feat2, 'full');
		$link1 = $link1[0];
		$link2 = $link2[0];

		 ?>
		<div class="report-pic">
			<a href="<?php echo $link1; ?>">
				<?php echo wp_get_attachment_image($feat1, 'report_size'); ?>
			</a>
		</div>
		<div class="report-pic">
			<a href="<?php echo $link2; ?>">
				<?php echo wp_get_attachment_image($feat2, 'report_size'); ?>
			</a>
		</div>
		<h5>Click Photos To Enlarge</h5>
		<div class="post">
			<h5>Last Update: <?php the_time( get_option( 'date_format' ) ); ?></h5>
			<h5>Time: <?php the_time(); ?></h5>
			<?php the_content(); ?>
			<a class="obxad obxad-report-post" href="#">Ad goes here</a>
		</div>
	</article>

	<?php endwhile; endif; wp_reset_postdata(); ?>
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

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<a href="#" class="obxad obxad-report-short mobile-only">Ad goes here</a>
	<a href="#" class="obxad obxad-report-short">Ad goes here</a>
	<a href="#" class="obxad obxad-report-short">Ad goes here</a>
	<a href="#" class="obxad obxad-report-short">Ad goes here</a>
	<a href="#" class="obxad obxad-report-short">Ad goes here</a>

</div>

<div class="row about">
	<!-- everything in here will be custom field fed -->
	<h2>About Nags Head:</h2>
	<h3>Photos, Videos, and More</h3>
	<div class="report-slider">

		<?php if(have_rows('photos')) : while(have_rows('photos')) : the_row(); ?>
		<div>
			<?php
			$image = get_sub_field('image');
			$img_link1 = wp_get_attachment_image_src($image, ''); 
			$img_link1 = $img_link1[0]; ?>
			<a href="<?php echo $img_link1; ?>">
				<?php echo wp_get_attachment_image($image, 'report_slider_size'); ?>	
			</a>

		</div>
	<?php endwhile; endif; ?>
	</div>
	<div class="row">
		<div class="surf-break">
			<h3>Surf Break</h3>
			<div class="content">

			<?php

			$break = get_field('surf_break');
			echo $break;

			 ?>
				
			</div>
		</div>
		<div class="nearby">
			<h3>What's Nearby?</h3>
			<div class="content">
				<?php 
				$nearby = get_field('whats_nearby');
				echo $nearby;

				 ?>
			</div>
		</div>

	</div>
</div>
<div class="row final-ads">
		<a href="#" class="obxad obxad-report-short mobile-only">Ad goes here</a>
		<a href="#" class="obxad obxad-report-short mobile-only">Ad goes here</a>
	</div>
<?php endwhile; endif; wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>
