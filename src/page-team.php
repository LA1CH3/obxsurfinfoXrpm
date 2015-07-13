<?php 

/* Template Name: Team */


get_header(); ?>

<main role="main" class="team">
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
<div class="team-content">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam ipsa beatae, numquam delectus necessitatibus ab fuga maxime soluta, repellat libero iste! Amet nisi sit animi aliquid quo ex dolorum quos!</p>

	<?php 

	$args = array(

		'post_type' => 'team',
		'posts_per_page' => -1

		);

	$team = new WP_Query($args);

	if($team->have_posts()) :
		while($team->have_posts()) : $team->the_post();

	// grab some info
	$image = get_field('photo');
	$role = get_field('role');
	$email = get_field('email');
	$bio = get_field('bio');

	?>

	<div class="team-member">
		<div class="bio-pic">
			<?php echo wp_get_attachment_image( $image, 'medium' ); ?>
		</div>
		<article>
			<div class="header-wrapper">
				<a href="mailto:<?php echo $email; ?>">
				<img src="<?php echo get_template_directory_uri() . 
				'/img/mail-icon.png'; ?>" alt="Email">
			</a><h2><?php the_title(); ?></h2><br>
			<h3><?php echo $role; ?></h3>
			</div>
			<p><?php echo $bio; ?></p> 
		</article>
	</div>

<?php endwhile; endif; wp_reset_postdata(); ?>
	
<div class="mobile-footer">
			<img src="<?php echo get_template_directory_uri() . 
			'/img/logo-blue.png'; ?>" alt="OBX Surf Info">
			<?php html5blank_mobilenav(); ?>
		</div>
</div>

</main>

<?php get_footer(); ?>