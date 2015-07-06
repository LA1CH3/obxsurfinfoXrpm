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
							<li><a href="<?php echo site_url('surf-cams/'); ?>">Surf Cams</a></li>
							<li><a href="<?php echo site_url('photo-galleries/'); ?>">Photo Galleries</a></li>
							<li><a href="<?php echo site_url('video/'); ?>">Video</a></li>
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
							<li>Email Us</li>
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

	</body>
</html>
