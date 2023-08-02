<?php 

require_once "./src/_lib/_view.php";
require_once "./src/Models/Annonce_model.php";
require_once "./src/Models/User_model.php";
require_once "./src/Entity/Annonce.php";
require_once "./src/Entity/User.php";
require_once "./src/_lib/authUser.php";
require_once "./src/Controllers/AnnonceFilterController.php";


class AnnonceFilterController 
{


    private $userModel;
    private $annonceModel;
    private$annonce;
    private $view;

    public function __construct()
    {
        $this->view = new View();
        $this->userModel = new User_model();
        $this->annonceModel = new Annonce_model();
        $this->annonce = new Annonce();    
    }

    public function index()
    {

        $filter = new AnnonceFilterController;
        echo 'test';
        $this->view->assign("filter", $filter);
        $this->view->render('forum','filter');
    }
}