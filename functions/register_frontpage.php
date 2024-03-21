<?php
// FRONTPAGE
// Tableau global des valeurs par défaut pour la section frontpage
$default_frontpage_values = array(
	'frontpage' => array(
		'section' => 'frontpage',
		'title' => 'FrontPage',
		'emoji' => '🗃️ ',
		'priority' => 30,
		'datas' => array(
			'frontpage_hero_tagline_enable' => array(
				'label' => 'Afficher le slogan dans le Hero',
				'value' => true,
				'description' => false,
				'type' => 'checkbox',
				'control' => 'checkbox',
			),
			'frontpage_titre' => array(
				'label' => 'Titre FrontPage',
				'value' => 'Titre par défaut',
				'description' => false,
				'type' => 'text',
			),
			'patobeur_frontpage_hero_image' => array(
				'label' => 'URL de l\'image dans le bloc Hero',
				'value' => get_template_directory_uri() . '/assets/img/patobeur_blanc_transp.png',
				'description' => 'Téléchargez l\'image que vous souhaitez utiliser comme image dans votre Hero. La taille recommandée est de 300 x 300 pixels. Vous pouvez cependant changer la largeur de l\'image plus bas',
				'type' => 'text',
				'control' => 'image',
			),
			'patobeur_frontpage_hero_image_width' => array(
				'label' => 'Largeur de l\'image',
				'value' => '100%',
				'description' => 'largeur image !',
				'type' => 'text',
			),
			'patobeur_frontpage_hero_height' => array(
				'label' => 'Hauteur du Hero',
				'value' => '100vh',
				'description' => 'Hauteur du bloc hero à 100vh par default si vide. (vh=vertical height de la fenêtre du navigateur !)',
				'type' => 'text',
			),
			'patobeur_frontpage_hero_background_image' => array(
				'label' => 'URL de l\'image',
				'value' => get_template_directory_uri() . '/assets/img/default_background.jpg',
				'description' => false,
				'type' => 'text',
				'control' => 'image',
			),
			'patobeur_frontpage_background_image_enable' => array(
				'label' => 'Activer l\'image de fond',
				'value' => true,
				'description' => false,
				'type' => 'checkbox',
				'control' => 'checkbox',
			),
			'patobeur_frontpage_hero_background_color' => array(
				'label' => 'Couleur de fond du bloc Hero',
				'value' => '#ffffff',
				'description' => false,
				'type' => 'text',
				'control' => 'color',
			),
		),
	),
);
// --------------------------
function patobeur_frontpage_datas()
{
	return array(
		'frontpage' => array(
			'section' => 'frontpage',
			'title' => 'FrontPage',
			'emoji' => '🗃️ ',
			'priority' => 30,
			'datas' => array(
				'frontpage_hero_tagline_enable' => array(
					'label' => 'Afficher le slogan dans le Hero',
					'value' => true,
					'type' => 'checkbox',
					'control' => 'checkbox',
				),
				'frontpage_titre' => array(
					'label' => 'Titre FrontPage',
					'value' => 'Titre par défaut',
					'type' => 'text',
				),
				'patobeur_frontpage_hero_image' => array(
					'label' => 'URL de l\'image dans le bloc Hero',
					'value' => get_template_directory_uri() . '/assets/img/patobeur_blanc_transp.png',
					'description' => 'Téléchargez l\'image que vous souhaitez utiliser comme image dans votre Hero. La taille recommandée est de 300 x 300 pixels. Vous pouvez cependant changer la largeur de l\'image plus bas',
					'type' => 'text',
					'control' => 'image',
				),
				'patobeur_frontpage_hero_image_width' => array(
					'label' => 'Largeur de l\'image',
					'value' => '100%',
					'description' => 'largeur image !',
					'type' => 'text',
				),
				'patobeur_frontpage_hero_height' => array(
					'label' => 'Hauteur du Hero',
					'value' => '100vh',
					'description' => 'Hauteur du bloc hero à 100vh par default si vide. (vh=vertical height de la fenêtre du navigateur !)',
					'type' => 'text',
				),
				'patobeur_frontpage_hero_background_image' => array(
					'label' => 'URL de l\'image',
					'value' => get_template_directory_uri() . '/assets/img/default_background.jpg',
					'type' => 'text',
					'control' => 'image',
				),
				// 'patobeur_frontpage_background_image_enable' => array(
				// 	'label' => 'Activer l\'image de fond',
				// 	'value' => false,
				// 	'type' => 'checkbox',
				// 	'control' => 'checkbox',
				// ),
				'patobeur_frontpage_hero_background_color' => array(
					'label' => 'Couleur de fond du bloc Hero',
					'value' => '#ffffff',
					'type' => 'text',
					'control' => 'color',
				),
			),
		),
	);
}
// --------------------------
function patobeur_customize_register_frontpage($wp_customize)
{
	// global $default_frontpage_values;
	// $default_frontpage_values = patobeur_frontpage_datas();

	foreach (patobeur_frontpage_datas() as $section => $values) {
		$wp_customize->add_section('section_' . $values['section'], [
			'title'    => $values['emoji'] . $values['title'],
			'priority' => $values['priority'],
		]);

		foreach ($values['datas'] as $key => $data) {
			if (!isset($data['description'])) {
				$data['description'] = false;
			}
			if (!isset($data['control'])) {
				$data['control'] = false;
			}
			$wp_customize->add_setting($key, [
				'default'           => $data['value'],
				'sanitize_callback' => 'patobeur_sanitize_' . $data['type'],
			]);

			$tmp_frontpage_description = $data['description'] ? $data['description'] . " ( ". $key . " )" : '';

			$control_options = [
				'label'       => __($data['label'], 'patobeur-theme'),
				'section'     => 'section_' . $values['section'],
				'settings'    => $key,
				'type'        => $data['control'] ?? 'text',
				'description' => __($tmp_frontpage_description, 'patobeur-theme'),

			];
			switch ($data['control']) {
					// case 'bgimage':
					// 	$wp_customize->add_control(new WP_Customize_Background_Image_Control($wp_customize, $key, $control_options));
					// 	break;
				case 'image':
					$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $key, $control_options));
					break;
				case 'color':
					$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $key, $control_options));
					break;
				default:
					$wp_customize->add_control($key, $control_options);
					break;
			}
		}
	}
}
add_action('customize_register', 'patobeur_customize_register_frontpage');
