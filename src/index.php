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
					<span>5.4' ENE @ 9 SEC</span>
				</div>
				<div class="temp last">
					<img src="<?php echo get_template_directory_uri() . '
					/img/mysparklyhappysunshinecloud.png'; ?>" alt="Temperature">
					<span class="vid-title">Air:</span>
					<span>74°</span>
				</div>
			</div>

		</div>

		<!-- section -->
		<section>
			
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
			</div>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
