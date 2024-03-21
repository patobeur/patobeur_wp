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
<?php 
$pageModel = 'page';
// https://developer.wordpress.org/themes/basics/conditional-tags/
if (is_page()): 
	// do this
elseif (is_front_page()):
	// do this
elseif (is_home()): 
	// do this
elseif (is_single()):
	// Returns true when any single Post (or attachment, or custom Post Type) is being displayed. This condition returns false if you are on a page.
	// do this
elseif (is_singular()):
	// Returns true for any is_single, is_page, and is_attachment. It does allow testing for post types.
	// do this
elseif (is_page_template()):
	// Is a Page Template being used ?
	// do this
elseif (is_category()):
	// When a Category archive page is being displayed.
endif;
?>
	<div class="container">