<?php get_header();
// $blogname = get_option('blogname');
$blogtagline = get_option('blogdescription');
$frontpage_titre = get_theme_mod('frontpage_titre');
$blogtagline_enable = get_theme_mod('frontpage_hero_tagline_enable');
?>

<div class="hero frontpage">

	<div class="logo">
		<?php /*patobeur_get_logo();*/  ?>
		<img src="<?= get_theme_mod('patobeur_frontpage_hero_image') ?>" alt="">
	</div>
	<?php
	if (!empty($frontpage_titre)) echo "<p>" . $frontpage_titre . "</p>";
	// if (!empty($blogname)) echo "<p>" . $blogname . "</p>";
	if (!empty($blogtagline) && $blogtagline_enable) echo "<p>" . $blogtagline . "</p>";
	?>
</div>
<?php get_footer(); ?>