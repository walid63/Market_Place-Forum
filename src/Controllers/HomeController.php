<?php
require_once "./src/Models/User_model.php";
require_once "./src/_lib/_view.php";
require_once "./src/Models/Annonce_model.php";
require_once "./src/Models/Post_model.php";

class HomeController
{
    private $userModel;
    private $view;
    private $annonceModel;
    private $postModel;

    public function __construct()
    {
        $this->userModel = new User_model();
        $this->annonceModel = new Annonce_model();
        $this->postModel = new Post_model();
        $this->view = new View();
    }


    public function index()
    {
        $posts = $this->postModel->getAllPost();
    
        // Récupérer toutes les annonces à partir du modèle AnnounceModel
        $announces = $this->annonceModel->getAllAnnounces();
        $posts = $this->postModel->getAllPost();

        foreach ($posts as $post)
        {
            $postAuthorId = $post->getAuthor_id();
            $userPost = $this->postModel->getUserByPost($postAuthorId);
        } 

        foreach ($announces as $announce)
        {
            $annonceVendorId = $announce->getVendor_id();
            $userAnnonce = $this->annonceModel->getUserByAnnonceId($annonceVendorId);
        }
       
        $this->view->assign("userPost", $userPost);
        $this->view->assign("userAnnonce", $userAnnonce);
        $this->view->assign("posts", $posts);
        $this->view->assign("annonces", $announces);

        $this->view->render("home","index");
        $this->view->loadIncludes("footer");
      
    }

}
