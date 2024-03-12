<?php
// PAGE
function patobeur_customize_register_page($wp_customize)
{
    // SECTION page
    $wp_customize->add_section('section_page', array(
        'title'       => __('📄 Page & Infos', 'muca-theme'),
        'priority'    => 30,
    ));
    // SLOGAN TAGLINE ENABLE or NOT
    $wp_customize->add_setting('patobeur_page_hero_tagline_enable', array(
        'default' => true,
    ));
    $wp_customize->add_control('patobeur_page_hero_tagline_enable', array(
        'label' => __('Activer le slogan', 'muca-theme'),
        'section' => 'section_page',
        'type' => 'checkbox',
    ));
    // page_titre
    $wp_customize->add_setting('page_titre', array(
        'default' => 'Titre par défaut',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('page_titre', array(
        'label'    => __('Titre Page', 'muca-theme'),
        'section'  => 'section_page',
        'settings' => 'page_titre',
        'type'     => 'text',
    ));
    // --------------------------------------------------------
    // largeur du style .content-page
    $wp_customize->add_setting('patobeur_page_contentpage_width', array(
        'default' => '100%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('patobeur_page_contentpage_width', array(
        'label' => __('Largeur du style content-page', 'muca-theme'),
        'section' => 'section_page',
        'type' => 'text',
    ));
}
add_action('customize_register', 'patobeur_customize_register_page');
