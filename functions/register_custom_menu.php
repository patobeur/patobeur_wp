<?php
// CUSTOM MENU
function patobeur_add_custom_menu_item() {
    add_menu_page(
        'Nom de la page', // Titre de la page
        'Titre du menu', // Texte à afficher dans le menu
        'manage_options', // Capacité requise pour accéder à la page
        'mon_menu_personnalise', // Slug de la page
        'patobeur_custom_menu_page_callback', // Fonction de rappel pour afficher le contenu de la page
        'dashicons-admin-generic', // Icône à afficher dans le menu (facultatif)
        30 // Position du menu dans le menu principal (facultatif)
    );
}
add_action( 'admin_menu', 'patobeur_add_custom_menu_item' );

function patobeur_custom_menu_page_callback() {
    echo '<div class="wrap">';
    echo '<h1>Titre de ma page personnalisée</h1>';
    echo '<p>Contenu de ma page personnalisée</p>';
    echo '</div>';
}