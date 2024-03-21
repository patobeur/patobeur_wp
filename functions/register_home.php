<?php
// HOME
function patobeur_customize_register_home($wp_customize)
{
    $sectionHome = 'section_home';
    // SECTION page
    $wp_customize->add_section($sectionHome, array(
        'title'       => __('📄 Home & Infos', 'patobeur-theme'),
        'priority'    => 30,
    ));
    // TITRE
    $wp_customize->add_setting('patobeur_home_titre', array(
        'default' => 'Titre par défaut',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('patobeur_home_titre', array(
        'label'    => __('Titre Home', 'patobeur-theme'),
        'section'  => $sectionHome,
        'settings' => 'patobeur_home_titre',
        'type'     => 'text',
    ));
    
    










    
    // --------------------------------------------------------
    // hauteur du bloc hero en vh
    $wp_customize->add_setting('patobeur_home_hero_height', array(
        'default' => '100vh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('patobeur_home_hero_height', array(
        'label' => __('Hauteur du Hero', 'patobeur-theme'),
        'section' => $sectionHome,
        'type' => 'text',
        'description' => __('Hauteur du bloc hero à 100vh par default si vide. (vh=vertical height de la fenêtre du navigateur !)', 'patobeur-theme'),
    ));
    // --------------------------------------------------------
    // URL de l'image de fond dans le hero
    $wp_customize->add_setting('patobeur_home_hero_background_image', array(
        'default' => get_template_directory_uri() . '/assets/img/default_background.jpg',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'patobeur_home_hero_background_image', array(
        'label'    => __('URL de l\'image', 'patobeur-theme'),
        'section'  => $sectionHome,
        'settings' => 'patobeur_home_hero_background_image',
    )));














}
add_action('customize_register', 'patobeur_customize_register_home');
