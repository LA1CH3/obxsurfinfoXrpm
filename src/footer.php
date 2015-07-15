			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<div class="footer-desktop">
					<div>
						<h3>About</h3>
						<ul>
							<li><a href="<?php echo site_url('team/'); ?>">Team</a></li>
							<li><a href="<?php echo site_url('technology/'); ?>">Technology</a></li>
							<li><a href="<?php echo site_url('our-story/'); ?>">Our Story</a></li>
							<li><a href="<?php echo site_url('lees-lil-shore-breakers/'); ?>">Lee's Lil Shore Breakers</a></li>
						</ul>
					</div>
					<div>
						<h3>Media</h3>
						<ul>
							<li><a href="<?php echo site_url('media/surf-cams/'); ?>">Surf Cams</a></li>
							<li><a href="<?php echo site_url('category/surf-pictures/'); ?>">Photo Galleries</a></li>
							<li><a href="<?php echo site_url('category/videos/'); ?>">Video</a></li>
						</ul>
					</div>
					<div>
						<h3>More</h3>
						<ul>
							<li><a href="<?php echo site_url('where-to-stay/'); ?>">Where To Stay</a></li>
							<li><a href="<?php echo site_url('where-to-eat/'); ?>">Where To Eat</a></li>
						</ul>
					</div>
					<div>
						<h3>Contact</h3>
						<ul>
							<li><a href="mailto:info@obxsurfinfo.com">Email Us</a></li>
							<li><a href="<?php echo site_url('advertise/'); ?>">Advertise</a></li>
							<li>PO 125</li>
							<li>Kill Devil Hills, NC 27948</li>
						</ul>
					</div>
					<div>
						<img src="<?php echo get_template_directory_uri() . '/img/logo-blue.png'; ?>" alt="">
					</div>
				</div>
				<div class="footer-mobile"></div>

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.5/slick.min.js"></script>

		<?php wp_footer(); ?>

		<!-- slick slider JS -->
		

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

		<!-- requesting NOAA API -->
		<?php
		$req = "http://sdf.ndbc.noaa.gov/sos/server.php?request=GetObservation&service=SOS&version=1.0.0&offering=urn:ioos:station:wmo:44095&observedproperty=Waves&responseformat=text/csv&eventtime=latest";
		$response = file_get_contents($req);
		?>
		
		<script>
		function csvJSON(csv){
		 
		  var lines=csv.split("\n");
		 
		  var result = [];
		 
		  var headers=lines[0].split(",");
		 
		  for(var i=1;i<lines.length;i++){
		 
			  var obj = {};
			  var currentline=lines[i].split(",");
		 
			  for(var j=0;j<headers.length;j++){
				  obj[headers[j]] = currentline[j];
			  }
		 
			  result.push(obj);
		 
		  }
		  
		  //return result; //JavaScript object
		  return JSON.stringify(result); //JSON
		}

		// turn our degrees from NOAA into compass directions
		function degToDirection(deg){

			var val = Math.floor((deg/22.5) + 11.25 + 360);
			var arr = ["N","NNE","NE","ENE","E","ESE", "SE", "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"];
			var result = arr[val % 16];
			return result;
		}

		var dataR = csvJSON(<?php echo json_encode($response); ?>);
				dataR = JSON.parse(dataR);
				//console.log(dataR);

				var swellHeight = dataR[0]['\"sea_surface_wave_significant_height (m)\"'];
				var swellDir = dataR[0]['\"sea_surface_wind_wave_to_direction (degree)\"'];
				var swellInt = dataR[0]['\"sea_surface_wave_peak_period (s)\"'];
				var swellTemp = dataR[0]['\"sea_water_temperature (c)\"'];

				var swellString = swellHeight + "' " + degToDirection(swellDir) + " @ " + swellInt + "SEC";

				$(".duck-swell").html(swellString);
		</script>

	</body>
</html>
