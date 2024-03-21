<?php
// CUSTOM MENU
function patobeur_add_custom_menu_item() {
    add_menu_page(
        'Nom de la page', // Titre de la page
        'PatobeurWp', // Texte à afficher dans le menu
        'manage_options', // Capacité requise pour accéder à la page
        'Paramétrage du thème', // Slug de la page
        'patobeur_custom_menu_page_callback', // Fonction de rappel pour afficher le contenu de la page
        'dashicons-smiley', // Icône à afficher dans le menu (facultatif)
        2 // Position du menu dans le menu principal (facultatif)
    );
}
add_action( 'admin_menu', 'patobeur_add_custom_menu_item' );

function patobeur_custom_menu_page_callback() {
    echo '<div class="wrap">';
    echo '<h1>Paramétrage du thème PatobeurWp</h1>';
    echo '<p>fichier : functions/register_custom_menu.php</p>';
    echo '</div>';
    
    echo '<div class="wrap">';
    echo '<h2>WordPress Developer Resources</h2>';
    echo '<p>Documentation : <a href="https://developer.wordpress.org/" target="_blank">developer.wordpress.org</a></p>';
    echo '<p>fichier : <a href="https://developer.wordpress.org/resource/dashicons/" target="_blank">dashicons</a></p>';
    echo '</div>';

    echo '<div class="wrap">';
    echo '<h2>Thème code-source</h2>';
    echo '<p><a href="https://github.com/patobeur/patobeur_wp" target="_blank">PatobeurWp on Github</a></p>';
    echo '</div>';

    echo '<div class="wrap">';
    echo '<h2>Thème Customization</h2>';
    echo '<p><a href="customize.php" target="_blank">Customize</a></p>';
    echo '</div>';
}