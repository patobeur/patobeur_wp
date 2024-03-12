<?php
// USER
function patobeur_customize_register_userdatas($wp_customize)
{
    // SECTION user datas
    $wp_customize->add_section('section_user', array(
        'title'       => __('🗃️ User Datas', 'muca-theme'),
        'priority'    => 30,
    ));
    // user_names
    $wp_customize->add_setting('user_names', array(
        'default' => 'Patobeur EtLardons',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('user_names', array(
        'label'    => __('📋 Nom et prénom/Name and Surname', 'muca-theme'),
        'section'  => 'section_user',
        'settings' => 'user_names',
        'type'     => 'text',
    ));
    // user_street
    $wp_customize->add_setting('user_street', array(
        'default' => '2 rue de la patte',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('user_street', array(
        'label'    => __('🏚️ Rue/Street', 'muca-theme'),
        'section'  => 'section_user',
        'settings' => 'user_street',
        'type'     => 'text',
    ));
    // user_city
    $wp_customize->add_setting('user_city', array(
        'default' => 'Lasagne sur Toast',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('user_city', array(
        'label'    => __('🗺️ Ville/City', 'muca-theme'),
        'section'  => 'section_user',
        'settings' => 'user_city',
        'type'     => 'text',
    ));
    // user_zip
    $wp_customize->add_setting('user_zip', array(
        'default' => '01011',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('user_zip', array(
        'label'    => __('📇 Code Postal/Zip', 'muca-theme'),
        'section'  => 'section_user',
        'settings' => 'user_zip',
        'type'     => 'text',
    ));
    // user_country
    $wp_customize->add_setting('user_country', array(
        'default' => 'Lasagna',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('user_country', array(
        'label'    => __('🌎 Pays/Country', 'muca-theme'),
        'section'  => 'section_user',
        'settings' => 'user_country',
        'type'     => 'text',
    ));
    // user_mail
    $wp_customize->add_setting('user_mail', array(
        'default' => 'patobeur@zarbix.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('user_mail', array(
        'label'    => __('📧 Mèle/Email', 'muca-theme'),
        'section'  => 'section_user',
        'settings' => 'user_mail',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'patobeur_customize_register_userdatas');
