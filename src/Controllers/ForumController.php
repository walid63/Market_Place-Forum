<?php 

require_once "./src/_lib/_view.php";
require_once "./src/Models/Post_model.php";
require_once "./src/Models/User_model.php";
require_once "./src/Entity/Post.php";
require_once "./src/Entity/User.php";
require_once "./src/_lib/authUser.php";

class ForumController 
{


    private $userModel;
    private $postModel;
    private$post;
    private $view;

    public function __construct()
    {
        $this->view = new View();
        $this->userModel = new User_model();
        $this->postModel = new Post_model();
        $this->post = new Post();    
    }

    public function index()
    {
   
        $this->view->render('forum','actuality');
    }
}