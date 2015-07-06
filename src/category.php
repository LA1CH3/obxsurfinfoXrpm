<?php get_header(); ?>

	<main role="main">
		<!-- section -->

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

			<section>

			<h1><?php _e( 'Category: ', 'html5blank' ); single_cat_title(); ?></h1>
	
			<?php

			if(have_posts()) :
				while(have_posts()) : the_post(); 

			 ?>
	
			 <div class="recent-featured">
			 	<div class="image-contain">
			 		<?php the_post_thumbnail("front_thumb"); ?>
			 		<div class="date-overlay">
			 			<p><?php the_time(get_option('date_format')); ?></p>
			 		</div>
			 	</div>
			 	<h3><?php the_title(); ?></h3>
			 	<p><?php the_excerpt(); ?></p>
			 </div>





			<?php endwhile; endif; wp_reset_postdata(); ?>

		</section>
		<!-- /section -->
		<div class="mobile-footer">
			<img src="<?php echo get_template_directory_uri() . 
			'/img/logo-blue.png'; ?>" alt="OBX Surf Info">
			<?php html5blank_mobilenav(); ?>
		</div>
	</main>

<?php get_footer(); ?>
