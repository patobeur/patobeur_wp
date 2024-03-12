<?php

/*
 * functions.php
 */
require_once( __DIR__ . '/functions/register_userdatas.php');
require_once( __DIR__ . '/functions/register_frontpage.php');
require_once( __DIR__ . '/functions/register_home.php');
require_once( __DIR__ . '/functions/register_page.php');
require_once( __DIR__ . '/functions/register_footer.php');





function patobeur_custom_css()
{
    $custom_css = "";
    if (is_front_page()) :
        $frontpage_hero_height = get_theme_mod('patobeur_frontpage_hero_height');
        $frontpage_hero_image_width = get_theme_mod('patobeur_frontpage_hero_image_width');
        $frontpage_background_image = get_theme_mod('patobeur_frontpage_hero_background_image');
        $frontpage_background_image_enable = get_theme_mod('patobeur_frontpage_background_image_enable');
        $frontpage_hero_background_color = get_theme_mod('patobeur_frontpage_hero_background_color');

        if (empty($frontpage_hero_height)) $frontpage_hero_height = '100vh';
        if (empty($frontpage_hero_image_width)) $frontpage_hero_image_width = '100%';

        $custom_css .= "body .container .hero {";
        $custom_css .= "height: $frontpage_hero_height;";
        if ($frontpage_background_image_enable) {
            $custom_css .= "background: url('$frontpage_background_image') no-repeat center center / cover;";
        }
        if (!empty($frontpage_hero_background_color)) {
            $custom_css .= "background-color: $frontpage_hero_background_color;";
        }
        $custom_css .= "}";
        // $custom_css .= "#wpadminbar{display: none;}";
        $custom_css .= "body .container .hero .logo img {width: $frontpage_hero_image_width;}";
    elseif (is_page()) :
        // ------------------
        // PAGE
        // ------------------
        $page_contentpage_width = get_theme_mod('patobeur_page_contentpage_width');

        $custom_css .= "body .container {width: 100%;display: flex;flex-direction: column;align-items: center;.content-page {width: $page_contentpage_width;background-color:rgba(255,255,0.5);}}";



    else :
        printf('<h2>is_no_front_page</h2>');
    endif;

    wp_add_inline_style('feuillesdestyle', $custom_css);
}
function patobeur_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Primary');
    register_nav_menu('footer', 'Pied de page');
    add_theme_support('custom-logo', array(
        'height'      => 100, // Hauteur en pixels
        'width'       => 400, // Largeur en pixels
        'flex-height' => true, // Permet un logo de hauteur flexible
        'flex-width'  => true, // Permet un logo de largeur flexible
    ));
}
function patobeur_register_assets($Urls)
{
    $file_js = get_template_directory_uri() . '/assets/js/javascript.js';
    wp_register_script('file_js', $file_js, [], false, true);
    // wp_deregister_script('jquery'); // on vire jquery
    wp_enqueue_script('file_js');
}

function patobeur_custom_style()
{
    wp_enqueue_style('feuillesdestyle', get_stylesheet_uri());
    // Ajoutez d'autres feuilles de style personnalisées ci-dessous
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('nav-style', get_template_directory_uri() . '/assets/css/navigation.css', array(), '1.0', 'all');
    wp_enqueue_style('heroe-style', get_template_directory_uri() . '/assets/css/heroes.css', array(), '1.0', 'all');
    wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/content-home.css', array(), '1.0', 'all');
    wp_enqueue_style('page-style', get_template_directory_uri() . '/assets/css/content-page.css', array(), '1.0', 'all');
}

function patobeur_get_logo()
{
    if (function_exists('the_custom_logo') && has_custom_logo()) {
        the_custom_logo();
    } else {
        // Chemin relatif vers l'image par défaut depuis la racine du thème
        $default_logo_url = get_template_directory_uri() . '/assets/img/patobeur_blanc_transp.png';
        // Lien du site
        $site_url = esc_url(home_url('/'));
        // Nom du site
        $site_name = get_bloginfo('name');
        echo "<a href='{$site_url}'><img src='{$default_logo_url}' alt='{$site_name}'></a>";
    }
}
// function patobeur_title_separator()
// {
//     return '|';
// }
// function patobeur_document_title_parts($title)
// {
//     // $title['dev'] = 'dev';
//     // unset($title['tagline']); // supprimer le tagline
//     return $title;
// }
function patobeur_menu_submenu_class(array $classes): array
{
    // on change la class sur les items
    $classes['class'] = 'nav-sub-item';
    return $classes;
}
function patobeur_menu_class(array $classes): array
{
    // on change la class sur les items
    $classes['class'] = 'nav-item';
    return $classes;
}
function patobeur_menu_link_class($attrs)
{
    // var_dump(func_get_args());die();
    // on change la class sur les liens
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function default_page_menu()
{
    wp_list_pages();
}

add_action('after_setup_theme', 'patobeur_theme_support');



add_action('wp_enqueue_scripts', 'patobeur_register_assets');
// add_filter('document_title_separator', 'patobeur_title_separator');
// add_filter('document_title_parts', 'patobeur_document_title_parts');
add_filter('nav_menu_css_class', 'patobeur_menu_class');
add_filter('nav_menu_submenu_css_class', 'patobeur_menu_submenu_class');
add_filter('nav_menu_link_attributes', 'patobeur_menu_link_class');

add_action('wp_enqueue_scripts', 'patobeur_custom_style');
add_action('wp_enqueue_scripts', 'patobeur_custom_css');
