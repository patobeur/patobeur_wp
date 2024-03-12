<?php
// FRONTPAGE
function patobeur_customize_register_frontpage($wp_customize)
{
    // Ajouter une section dans le Customizer
    $wp_customize->add_section('section_frontpage', array(
        'title'       => __('📄 FrontPage & Infos', 'muca-theme'),
        'priority'    => 30,
    ));

    // SLOGAN TAGLINE ENABLE or NOT
    $wp_customize->add_setting('frontpage_hero_tagline_enable', array(
        'default' => true,
    ));
    $wp_customize->add_control('frontpage_hero_tagline_enable', array(
        'label' => __('Activer le slogan dans le Hero', 'muca-theme'),
        'section' => 'section_frontpage',
        'type' => 'checkbox',
    ));
    // Ajouter un champ de texte pour le nom
    $wp_customize->add_setting('frontpage_titre', array(
        'default' => 'Titre par défaut',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('frontpage_titre', array(
        'label'    => __('Titre FrontPage', 'muca-theme'),
        'section'  => 'section_frontpage',
        'settings' => 'frontpage_titre',
        'type'     => 'text',
    ));

    // Ajouter un champ de texte pour l'URL de l'image
    $wp_customize->add_setting('patobeur_frontpage_hero_image', array(
        'default' => get_template_directory_uri() . '/assets/img/patobeur_blanc_transp.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'patobeur_frontpage_hero_image', array(
        'label'    => __('URL de l\'image dans le bloc Hero', 'muca-theme'),
        'section'  => 'section_frontpage',
        'settings' => 'patobeur_frontpage_hero_image',
        'description' => __('Téléchargez l\'image que vous souhaitez utiliser pour votre image se trouve dans le bloc Hero. La taille recommandée est de 300 x 300 pixels. Vous pouvez cependant changer la largeur de l\'image plus bas', 'muca-theme'),

    )));
    $wp_customize->selective_refresh->add_partial('patobeur_frontpage_hero_image', array(
        'selector' => '.logo img',
        'render_callback' => function () {
            return get_theme_mod('patobeur_frontpage_hero_image');
        },
    ));
    // --------------------------------------------------------
    // Ajouter un champ de texte pour la largeur de l'image
    $wp_customize->add_setting('patobeur_frontpage_hero_image_width', array(
        'default' => '100%',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('patobeur_frontpage_hero_image_width', array(
        'label' => __('Largeur de l\'image', 'muca-theme'),
        'section' => 'section_frontpage',
        'type' => 'text',
    ));
    // --------------------------------------------------------
    // Ajouter un champ de texte pour la hauteur du bloc hero
    $wp_customize->add_setting('patobeur_frontpage_hero_height', array(
        'default' => '100vh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('patobeur_frontpage_hero_height', array(
        'label' => __('Hauteur du Hero', 'muca-theme'),
        'section' => 'section_frontpage',
        'type' => 'text',
        'description' => __('Hauteur du bloc hero à 100vh par default si vide. (vh=vertical height de la fenêtre du navigateur !)', 'muca-theme'),
    ));
    // --------------------------------------------------------
    // Ajouter un champ de texte pour l'URL de l'image de fond dans le hero
    $wp_customize->add_setting('patobeur_frontpage_hero_background_image', array(
        'default' => get_template_directory_uri() . '/assets/img/default_background.jpg',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'patobeur_frontpage_hero_background_image', array(
        'label'    => __('URL de l\'image', 'muca-theme'),
        'section'  => 'section_frontpage',
        'settings' => 'patobeur_frontpage_hero_background_image',
    )));
    // --------------------------------------------------------
    // Ajouter un champ de type checkbox pour activer/désactiver l'image de fond
    $wp_customize->add_setting('patobeur_frontpage_background_image_enable', array(
        'default' => true,
    ));
    $wp_customize->add_control('patobeur_frontpage_background_image_enable', array(
        'label' => __('Activer l\'image de fond', 'muca-theme'),
        'section' => 'section_frontpage',
        'type' => 'checkbox',
    ));
    // --------------------------------------------------------
    // Ajouter un selecteur pour la couleur de fond du bloc hero
    $wp_customize->add_setting('patobeur_frontpage_hero_background_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'patobeur_frontpage_hero_background_color', array(
        'label'    => __('Couleur de fond du bloc Hero', 'muca-theme'),
        'section'  => 'section_frontpage',
        'settings' => 'patobeur_frontpage_hero_background_color',
    )));
    // --------------------------------------------------------
}
add_action('customize_register', 'patobeur_customize_register_frontpage');
