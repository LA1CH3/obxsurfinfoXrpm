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

	// looping through users sucks... here comes some shitty code
	// i create an array of arrays, each individual array holds the values we need to display to the client

	$userlist = array();
	for($i = 2; $i < 5; $i++){

		$user = array();
		array_push($user, get_the_author_meta("display_name", $i));
		array_push($user, get_the_author_meta("Title", $i));
		array_push($user, get_the_author_meta("description", $i));
		array_push($user, get_avatar($i));
		array_push($user, get_the_author_meta("user_email", $i));

		array_push($userlist, $user);

	}

	//print_r($userlist);


	// then we loop and display the values
	foreach($userlist as &$value){ ?>

	<div class="team-member">
		<div class="bio-pic">
			<?php echo $value[3]; // the bio image ?>
		</div>
		<article>
			<div class="header-wrapper">
				<a href="mailto:<?php echo $value[4]; ?>">
				<img src="<?php echo get_template_directory_uri() . 
				'/img/mail-icon.png'; ?>" alt="Email">
			</a><h2><?php echo $value[0]; ?></h2><br>
			<h3><?php echo $value[1]; ?></h3>
			</div>
			<p><?php echo $value[2]; ?></p> 
		</article>
	</div>
	<?php }

	 ?>

</div>
</main>

<?php get_footer(); ?>