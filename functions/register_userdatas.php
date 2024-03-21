<?php
// USER
// Tableau global des valeurs par défaut
$default_customizer_user_values = array(
    'user' => array(
        'section' => 'user',
        'title' => 'User Datas',
        'emoji' => '🗃️ ',
        'priority' => 30,
        'datas' => array(
            'user_names' => array(
                'label'    => __('user_names', 'patobeur-theme'),
                'value' => 'Patobeur EtLardons',
                'type' => 'text',
            ),
            'user_street' => array(
                'label'    => __('user_street', 'patobeur-theme'),
                'value' => '2 rue de la patte',
                'type' => 'text',
            ), 
            'user_city' => array(
                'label'    => __('user_city', 'patobeur-theme'),
                'value' => 'Lasagne sur Toast',
                'type' => 'text',
            ), 
            'user_zip' => array(
                'label'    => __('user_zip', 'patobeur-theme'),
                'value' => '75001',
                'type' => 'text',
            ), 
            'user_country' => array(
                'label'    => __('user_country', 'patobeur-theme'),
                'value' => 'Lasagna',
                'type' => 'text',
            ),
            'user_mail' => array(
                'label'    => __('user_mail', 'patobeur-theme'),
                'value' => 'patobeur@zarbix.com',
                'type' => 'text',
            )
        ),
    ),
);

// Fonction pour enregistrer les contrôles dans le Customizer
function patobeur_customize_register_userdatas($wp_customize) {
    global $default_customizer_user_values;

    // Parcourir les catégories de valeurs par défaut
    foreach ($default_customizer_user_values as $category => $values) {
        // Créer une section pour chaque catégorie
        $wp_customize->add_section('section_' . $values['section'], array(
            'title'       => $values['emoji'] . $values['title'],
            'priority'    => $values['priority'],
        ));

        // Parcourir les valeurs par défaut de chaque catégorie
        foreach ($values['datas'] as $key => $default_value) {
            // Ajouter le contrôle pour chaque valeur avec la valeur par défaut correspondante
            $wp_customize->add_setting($key, array(
                'default' => $default_value['value'],
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control($key, array(
                'label'    => $default_value['label'],
                'section'  => 'section_' . $values['section'],
                'settings' => $key,
                'type'     => $default_value['type'],
            ));
        }
    }
}

add_action('customize_register', 'patobeur_customize_register_userdatas');