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
		<?php if (have_posts()): while (have_posts()) : the_post(); 
		// vars we will need
		$posttags = get_the_tags();
		$cats = wp_get_post_categories(get_the_ID());

		?>

			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>

	</div>
	<div class="row">
		<div class="socials">
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
		</div>
		<div class="tags">
			<small><?php the_tags(); ?></small>
			<small>Categories: <?php 
				foreach($cats as $c){
					$cat = get_category($c);
					echo $cat->name . ',';
		}  ?></small>
			<small>Posted: <?php the_time( get_option( 'date_format' ) ); ?></small>
		</div>
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
		<div class="obxad full">
			<p>ad goes here</p>
		</div>
	</div>
	<?php endwhile; endif; wp_reset_postdata(); ?>
	<div class="row">
		<div class="obxad obx-sidebar-ad obx-mobile-ad">
			Ad Space Here
		</div>
		<div class="obxad obx-sidebar-ad obx-mobile-ad">
			Ad Space Here
		</div>
		<div class="latest-posts desktop-main single-more">
			<h3>If you like this, you may also like:</h3>
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
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
					</div>

					<?php $i++; ?>

				<?php } else if( $i == 1 ){ ?>

					<div class="recent-featured-right">
						<div class="image-contain">
							<?php the_post_thumbnail("front_thumb"); ?>
							<div class="date-overlay">
								<p><?php the_time(get_option('date_format')); ?></p>
							</div>
						</div>
						<h3><?php the_title(); ?></h3>
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
		<div class="obxad obx-sidebar-ad obx-desktop-ad">
			Ad Space Here
		</div>
		<div class="obxad obx-sidebar-ad obx-desktop-ad">
			Ad Space Here
		</div>
		<div class="obxad obx-sidebar-ad obx-desktop-ad">
			Ad Space Here
		</div>
		<div class="obxad obx-sidebar-ad obx-desktop-ad">
			Ad Space Here
		</div>
		<div class="ifyoulike">
			<h3>If you like this, you might like:</h3>
			<?php
			//for use in the loop, list 5 post titles related to first tag on current post
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$first_tag = $tags[0]->term_id;
				$args=array(
					'tag__in' => array($first_tag),
					'post__not_in' => array($post->ID),
					'posts_per_page'=>5,
					'caller_get_posts'=>1
					);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<div class="related-blog">
						<figure>
							<?php the_post_thumbnail("tiny_thumb"); ?>
						</figure>
						<div class="blog-info">
							<h3><?php the_time( get_option( 'date_format' ) ); ?></h3>
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					</div>

					<?php
					endwhile;
				}
				wp_reset_query();
			}
			?>
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
		<div class="mobile-footer">
			<img src="<?php echo get_template_directory_uri() . 
			'/img/logo-blue.png'; ?>" alt="OBX Surf Info">
			<?php html5blank_mobilenav(); ?>
		</div>
	</div>
	<!-- /section -->
</main>

<?php get_footer(); ?>
