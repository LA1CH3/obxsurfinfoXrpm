<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

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

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
