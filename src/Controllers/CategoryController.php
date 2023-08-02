<?php 

require_once "./src/_lib/_view.php";
require_once "./src/Models/Annonce_category_model.php";
require_once "./src/Entity/CategoryAnnonce.php";
require_once "./src/Models/Annonce_model.php";

class CategoryController
{
    private $modelCategory;
    private $annonceModel;
    private $view;
    private $entity;
 
    public function __construct()
    {
        $this->view = new View();
        $this->modelCategory = new Annonce_category_model();
        $this->annonceModel =  new Annonce_model();
    }

    public function displayByCategory()
    {

        if(isset($_GET['id']))
        {
            $categoryId = $_GET['id'];

            // Instancier le modèle Annonce_model
           // $annonceModel = new Annonce_model();
        
            // Appeler la méthode getAnnouncesByCategory pour récupérer les annonces de la catégorie spécifiée
            $annonces = $this->modelCategory->getAnnouncesByCategory($categoryId);
        }

        $this->view->assign('annonces', $annonces);
        $this->view->render("annonce","category");
    }

}