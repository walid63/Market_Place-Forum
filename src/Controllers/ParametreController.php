<?php




class ParametreController {
    public function index() {
        // Afficher la vue des paramètres avec les paramètres actuels
        $parametres = Parametre::getAllParametres();
        require 'views/parametres.php';
    }

    public function update() {
        // Mettre à jour les paramètres dans la base de données
        $theme = $_POST['theme'];
        $parametres = Parametre::updateParametres($theme);
        // Rediriger vers la page des paramètres ou afficher un message de confirmation
        header('Location: /parametres');
    }
}





