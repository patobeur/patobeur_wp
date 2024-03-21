<?php get_header();
// $blogname = get_option('blogname');
$blogtagline = get_option('blogdescription');
$frontpage_titre = get_theme_mod('frontpage_titre');
$blogtagline_enable = get_theme_mod('frontpage_hero_tagline_enable');
$herobackgroundimage = get_theme_mod('patobeur_frontpage_hero_image');
?>

<div class="hero page">

	<div class="logo">
		<?php /*patobeur_get_logo();*/  ?>
		<img src="<?= $herobackgroundimage ?>" alt="">
	</div>
	<?php
	if (!empty($frontpage_titre)) echo "<p>" . $frontpage_titre . "</p>";
	// if (!empty($blogname)) echo "<p>" . $blogname . "</p>";
	if (!empty($blogtagline) && $blogtagline_enable) echo "<p>" . $blogtagline . "</p>";
	?>
	<p><?= the_title() ?></p>
</div>
<?php get_template_part( 'template-parts/content', 'page' ); ?>
page.php
<?php get_footer(); ?>