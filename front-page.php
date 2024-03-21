<?php get_header();
// $blogname = get_option('blogname');
$blogtagline = get_option('blogdescription');

$frontpage_titre = get_theme_mod('frontpage_titre');
$frontpage_tagline_enable = get_theme_mod('frontpage_hero_tagline_enable');
$heroimage = get_theme_mod('patobeur_frontpage_hero_image');
$hero_background_image = get_theme_mod('patobeur_frontpage_background_image');

?>

<div class="hero frontpage">

	<div class="logo">
		<?php /*patobeur_get_logo();*/  ?>
		<img src="<?= $heroimage ?>" alt="">
	</div>
	<?php

echo "<p>background_image_enable:".get_theme_mod('patobeur_frontpage_background_image_enable')."</p>";
echo "<p>background_image:".get_theme_mod('patobeur_frontpage_background_image')."</p>";


	?>



	<?php
	if (!empty($frontpage_titre)) echo "<p>" . $frontpage_titre . "</p>";
	// if (!empty($blogname)) echo "<p>" . $blogname . "</p>";
	if ($frontpage_tagline_enable && !empty($blogtagline) ) echo "<p>" . $blogtagline . "</p>";
	?>
</div>
	<p>front-page.php</p>
<?php get_footer(); ?>