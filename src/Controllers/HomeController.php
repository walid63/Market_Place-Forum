<?php

require_once "./src/Models/User_model.php";
require_once "./src/_lib/_view.php";

//include "./src/Views/home/index.php";
class HomeController
{

    private $userModel;
    private $view;

    public function __construct()
    {
        $this->userModel = new User_model();
        $this->view = new View();
        
    }



    public function index()
    {
 
        $nom = "test var";
        $this->view->assign('nom', $nom);
        $this->view->render("home","index");
      
    }


    public function globalGetPostHomeForum()
    {

    }


    
    public function sidebar()
    {
        // Préparation des données spécifiques à la barre latérale

        // ...

        $loggedIn = false; // Variable indiquant si l'utilisateur est connecté
        $forumDetails = 'Détails du forum'; // Détails du forum à afficher
        $categories = ['Catégorie 1', 'Catégorie 2', 'Catégorie 3']; // Catégories de l'e-commerce

   
    }
}
