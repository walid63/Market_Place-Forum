<?php

require_once "./src/_lib/_view.php";
require_once "./src/Models/Annonce_model.php";
require_once "./src/Models/User_model.php";
require_once "./src/Entity/Annonce.php";
require_once "./src/Entity/User.php";
require_once "./src/_lib/authUser.php";

class AnnonceController
{
    private $userModel;
    private $annonceModel;
    private $annonce;
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
        $annonces = $this->annonceModel->getAllAnnounces();

   
        foreach ($annonces as $key => $value) {
            $annonceId = $value->getId();
            $vendor  = $value->getVendor_id();
        }


       // $userAnnonce = [];
        $userAnnonce = $this->annonceModel->getUserByAnnonceId($vendor);
        $this->view->assign("userAnnonce", $userAnnonce);
        $this->view->assign("annonces", $annonces);
        $this->view->render('annonce', 'list');
    }
    public function getMyAnnonces()
    {
        $id = $_SESSION['user']['id'];
        $annonce = $this->annonceModel->getUserByAnnonceId($id);


        $this->view->assign("annonce", $annonce);
        $this->view->render('annonce', 'myAnnonce');
    }
    public function createAnnnonce()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $newAnnounce = new Annonce();
            $newAnnounce->setTitle($title);
            $newAnnounce->setDescription($description);
            $newAnnounce->setPrice($price);
            $result = $this->annonceModel->createAnnounce($newAnnounce);

            if ($result) {

                // header("Location: /annonce/detail/" . $newAnnounce->getId());
                exit();
            }
        } else {

            $this->view->render('annonce', 'create');
        }
    }

    public function getAnnonceUserLoggedIn()
    {
        $annonce = $this->annonceModel->getAnnouncesByCurrentUser();
        

        $this->view->assign('annonce',$annonce);
        $this->view->render('annonce', 'myAnnonce');
    }
}
