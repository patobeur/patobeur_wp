<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body>

	<nav class="navigation">
		<div class="logo">
			<?php patobeur_get_logo(); ?>
		</div>
		<?php
		wp_nav_menu(
			[
				'theme_location' => 'header',
				'container' => false,
				'menu_class' => 'menu-navigation',
				'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>'
			]
		)
		?>
		<div class="burger">
			<a href="#" id="openBtn">
				<span class="burger-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
		</div>
	</nav>

	<div class="container">