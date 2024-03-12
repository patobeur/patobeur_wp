<?php
// FOOTER
function patobeur_customize_register_footer($wp_customize)
{
    // SECTION footer
    $wp_customize->add_section('section_footer', array(
        'title'       => __('📄 Footer & Infos', 'muca-theme'),
        'priority'    => 30,
    ));
    // TITRE
    $wp_customize->add_setting('footer_titre', array(
        'default' => 'Titre par défaut',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_titre', array(
        'label'    => __('Titre footer', 'muca-theme'),
        'section'  => 'section_footer',
        'settings' => 'footer_titre',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'patobeur_customize_register_footer');
