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
		<div class="row">
			<?php if(have_posts()) : 
				while(have_posts()) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<!-- /section -->
		<div class="mobile-footer">
			<img src="<?php echo get_template_directory_uri() . 
			'/img/logo-blue.png'; ?>" alt="OBX Surf Info">
			<?php html5blank_mobilenav(); ?>
		</div>
	</main>

<?php get_footer(); ?>
