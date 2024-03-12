<?php
// HOME
function patobeur_customize_register_home($wp_customize)
{
    // SECTION page
    $wp_customize->add_section('section_home', array(
        'title'       => __('📄 Home & Infos', 'muca-theme'),
        'priority'    => 30,
    ));
    // TITRE
    $wp_customize->add_setting('home_titre', array(
        'default' => 'Titre par défaut',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('home_titre', array(
        'label'    => __('Titre Home', 'muca-theme'),
        'section'  => 'section_home',
        'settings' => 'home_titre',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'patobeur_customize_register_home');
