<?php

namespace App\Utils;


class View {
    private $template;

    public function __construct($template) {
        $this->template = $template;
    }

    public function render($data) {
        extract($data); // Extraction des données pour les rendre disponibles dans la vue
        echo 'hola';
        // Construction du chemin du fichier de modèle
        $templatePath = str_replace('.', '/', $this->template); // Remplacer les points par des slashes
        $templateFile = './src/Views/' . $templatePath . '.php';

        // Inclusion du template
        require_once $templateFile;
    }
}
