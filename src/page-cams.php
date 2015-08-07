<?php 

/* Template Name: Cams */


get_header(); ?>

<main role="main" class="cams">
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

	<div class="row">
		<a class="obxad obxad-report-long" href="#">
			<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=2&repeats=false"></script>
		</a>
	    <a href="#" class="obxad obxad-report-short">
	    	<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script>
	    </a>
	</div>
	<div class="row">
		<script type='text/javascript' src='<?php echo get_template_directory_uri() . '/js/lib/jwplayer.js'; ?>'></script>

			<script type="text/javascript">jwplayer.key="HkK82SF6pb3Nsl4jUamA+6I28yoBeFIUZm54ow+2JbI=";</script> 
			<h2 class="surf-title">Nags Head Surf Cam</h2>
			<div id="mediaspace">
				<p class="android_fallback"><a href="<?php echo $m3u8; ?>">Sorry, your device does not support native live streaming. Click here to view the OBXSurfInfo live stream through your device's native video player.</a></p>
				<del datetime="2013-09-25T17:40:33+00:00"></del>
			</div>

		<script type="text/javascript">// < ![CDATA[
			jwplayer('mediaspace').setup({
				'author': 'OBXSURFINFO',
				'description': 'OBXsurfinfo.com Camera',
				'image': 'http://dev.obxsurfinfo.com/wp-content/uploads/2015/06/logo_video.png',
				'logo' : {
					file: "http://obxsurfinfo.com/wp-content/uploads/2015/06/logo-video-black.png",
					position: 'top-left'
				},
				fallback: false,
				'title': 'OBXsurfinfo.com Cam',
				'backcolor': 'CCCCCC',
				'frontcolor': '0000FF',
				'screencolor': '000000',
				'streamer':  'rtmp://64.34.175.240:1935/cameras/camera3.stream',
				'autostart': 'true',
				'controlbar': 'bottom',
				'height': '400',
				'stretching': 'fill',
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

			<a class="obxad obxad-report-short mob" href="#"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script></a>
			
			<div class="cam-map">
				<h2 class="header-break">Find Your Break<span>click below for reports and data</span></h2>
			    <!-- <iframe class="surf-map" src="http://mapsengine.google.com/map/embed?mid=zLwzMpoYZbnw.kEvGYE-B2rHw" height="500" width="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe> -->
			    <iframe class="surf-map" src="https://www.google.com/maps/d/embed?mid=z0x55Mg3sPZ4.kDUIPa9f8QaM" frameborder="0" width="100%" height="500"></iframe>
		    </div>


		    <!-- Cuxton cam -->
		   <div class="second-cam">
		   		<script type="text/javascript">jwplayer.key="HkK82SF6pb3Nsl4jUamA+6I28yoBeFIUZm54ow+2JbI=";</script> 
		    <h2 class="surf-title">Buxton Surf Cam</h2>
			<div id="mediaspace1">
				<p class="android_fallback"><a href="<?php echo $m3u8; ?>">Sorry, your device does not support native live streaming. Click here to view the OBXSurfInfo live stream through your device's native video player.</a></p>
				<del datetime="2013-09-25T17:40:33+00:00"></del>
			</div>

		<script type="text/javascript">// < ![CDATA[
			jwplayer('mediaspace1').setup({
				'author': 'OBXSURFINFO',
				'description': 'OBXsurfinfo.com Camera',
				'image': 'http://dev.obxsurfinfo.com/wp-content/uploads/2015/06/logo_video.png',
				'logo' : {
					file: "http://obxsurfinfo.com/wp-content/uploads/2015/06/logo-video-black.png",
					position: 'top-left'
				},
				fallback: false,
				'title': 'OBXsurfinfo.com Cam',
				'backcolor': 'CCCCCC',
				'frontcolor': '0000FF',
				'screencolor': '000000',
				'streamer':  'rtmp://64.34.175.240:1935/cameras/camera1.stream',
				'autostart': 'true',
				'controlbar': 'bottom',
				'height': '400',
				'stretching': 'fill',
				sources: [{
					file: 'rtmp://64.34.175.240:1935/cameras/camera1.stream'
				},{
					file: 'http://64.34.175.240:1935/cameras/camera1.stream/playlist.m3u8'
				}],
				'modes': [
				{type: 'flash', src: 'http://obxsurfinfo.com/jwplayer/jwplayer.flash.swf'},
				{
					type: 'html5',
					config: {
						'file': 'http://64.34.175.240:1935/cameras/camera1.stream/playlist.m3u8',
						'provider': 'video'
					}
				},
				{
					type: 'download',
					config: {
						'file': 'http://64.34.175.240:1935/cameras/camera1.stream/playlist.m3u8',
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
		   </div>
		    
		    <!-- ads -->
		    <a class="obxad obxad-report-short mob" href="#"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script></a>
		    <a href="#" class="obxad obxad-report-short mobile-only sidebar"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script></a>
			<a href="#" class="sidebar obxad obxad-report-short"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script></a>
			<div class="subscribe-box subscribe-desktop">
				<img src="<?php echo get_template_directory_uri() . '/img/header-subscribe.png'; ?>" alt="Subscribe">
				<p>Be informed on what's happening on the Outer Banks and never miss an event. Subscribe today and we'll deliver all the goods directly to your email account. It's easy.</p>
				<div class="subscribe-input">
					<h3>Click here to subscribe:</h3>
					<form class="search-bar" role="search">
						<a class="subscribe" href="<?php echo site_url('/subscribe/') ?>"><span>Subscribe</span></a>
					</form>
				</div>
			</div>

			<!-- kb cam -->
			<div class="second-cam">
				 		<script type="text/javascript">jwplayer.key="HkK82SF6pb3Nsl4jUamA+6I28yoBeFIUZm54ow+2JbI=";</script> 
		    <h2 class="surf-title">Waves Kiteboarding Cam</h2>
			<div id="mediaspace2">
				<p class="android_fallback"><a href="<?php echo $m3u8; ?>">Sorry, your device does not support native live streaming. Click here to view the OBXSurfInfo live stream through your device's native video player.</a></p>
				<del datetime="2013-09-25T17:40:33+00:00"></del>
			</div>

		<script type="text/javascript">// < ![CDATA[
			jwplayer('mediaspace2').setup({
				'author': 'OBXSURFINFO',
				'description': 'OBXsurfinfo.com Camera',
				'image': 'http://dev.obxsurfinfo.com/wp-content/uploads/2015/06/logo_video.png',
				'logo' : {
					file: "http://obxsurfinfo.com/wp-content/uploads/2015/06/logo-video-black.png",
					position: 'top-left'
				},
				fallback: false,
				'title': 'OBXsurfinfo.com Cam',
				'backcolor': 'CCCCCC',
				'frontcolor': '0000FF',
				'screencolor': '000000',
				'streamer':  'rtmp://64.34.175.240:1935/cameras/camera2.stream',
				'autostart': 'true',
				'controlbar': 'bottom',
				'height': '400',
				'stretching': 'fill',
				sources: [{
					file: 'rtmp://64.34.175.240:1935/cameras/camera2.stream'
				},{
					file: 'http://64.34.175.240:1935/cameras/camera2.stream/playlist.m3u8'
				}],
				'modes': [
				{type: 'flash', src: 'http://obxsurfinfo.com/jwplayer/jwplayer.flash.swf'},
				{
					type: 'html5',
					config: {
						'file': 'http://64.34.175.240:1935/cameras/camera2.stream/playlist.m3u8',
						'provider': 'video'
					}
				},
				{
					type: 'download',
					config: {
						'file': 'http://64.34.175.240:1935/cameras/camera2.stream/playlist.m3u8',
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
			</div>
			<a class="obxad obxad-report-short mob" href="#"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script></a>
			<a href="#" class="obxad obxad-report-short mobile-only sidebar"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script></a>
			<a href="#" class="sidebar obxad obxad-report-short"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=4&repeats=false"></script></a>
			<a href="#" class="obxad obxad-report-short mobile-only sidebar"><script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=4&repeats=false"></script></a>

	</div>
		

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

		<a class="obxad obxad-report-short mob" href="<?php echo site_url('/advertise-with-us/'); ?>" style="background-image:url(http://dev.obxsurfinfo.com/wp-content/themes/html5blank/src/img/AdPlaceholder2.jpg);"><!--<script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script>--></a>
		<a class="obxad obxad-report-short mob" href="<?php echo site_url('/advertise-with-us/'); ?>" style="background-image:url(http://dev.obxsurfinfo.com/wp-content/themes/html5blank/src/img/AdPlaceholder2.jpg);"><!-- <script type="text/javascript" src="http://dev.obxsurfinfo.com/wp-content/plugins/oiopub-direct/js.php#type=banner&align=center&zone=3&repeats=false"></script> --></a>

	<div class="mobile-footer">
		<img src="<?php echo get_template_directory_uri() . 
		'/img/logo-blue.png'; ?>" alt="OBX Surf Info">
		<?php html5blank_mobilenav(); ?>
	</div>

</main>

<?php get_footer(); ?>