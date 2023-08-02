<?php


require_once "./src/_lib/_view.php";
require_once "./src/Entity/CategoryAnnonce.php";
require_once "./src/Models/User_model.php";
require_once "./src/Models/Annonce_category_model.php";
require_once "./src/Models/Annonce_model.php";
require_once "./src/Models/Post_model.php";


//require_once "./src/Models";


class SidebarController
{
    private $userModel;
    private $view;
    private $annonceModel;
    private $postModel;
    private $category;
    private $categoryModel;

    public function __construct()
    {
        $this->category = new CategoryAnnonce();
        $this->userModel = new User_model();
        $this->annonceModel = new Annonce_model();
        $this->postModel = new Post_model();
        $this->categoryModel = new Annonce_category_model();
        $this->view = new View();
    }
    public function _home()
    {
        $userModel = new User_model();
        $isLoggedIn = $userModel->isLoggedIn();



        $categories = $this->categoryModel->getAllCategory();

        $this->view->assign("categories",$categories);
        $this->view->assign("isLoggedIn",$isLoggedIn);
        $this->view->render("sidebar","sidebar");

    }



    public function actualityForum() 
    {
        echo 'sidebar' ;
    }
}
