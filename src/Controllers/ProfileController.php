<?php

require_once "./src/Models/User_model.php";
require_once './src/Entity/User.php';
require_once "./src/_lib/_view.php";
require_once "./src/_lib/authUser.php";
require_once  "./src/Models/Annonce_model.php";


class ProfileController
{
    private $view;
    private $userModel;
    private $annonceModel;
    private $user = [];

    public function __construct()
    {
        $this->userModel = new User_model;
        $this->annonceModel = new Annonce_model;
        $this->view = new View;
    }
    public function index()
    {
        if (AuthUser::isLoggedIn()) {

            $user = $_SESSION['user'];
            $userId = $_SESSION['user']['id'];
            $countAnnonce = $this->annonceModel->countAnnounces();
            $countUAnnonce = $this->annonceModel->countAnnouncesByUser($userId);



            $this->view->assign("countUAnnonce", $countUAnnonce);
            $this->view->assign("user", $user);
            $this->view->assign("countAnnonce", $countAnnonce);

        }
        $this->view->render("users", "profile");
    }
    public function editProfile()
    {
        $this->user = AuthUser::getUser();
        $this->view->assign("user", $this->user);

        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['birthday'];
            $tel = $_POST['tel'];
            $zipcode = $_POST['zipcode'];
            echo "hola";
        }
        $this->view->render("users", "edit_profile");
    }



    public function _edit($firstname,$lastname,$username,$email,$address,$city,$birthday,$tel,$zipcode)
    {
        
    }

    public function _editVerifValue($firstname,$lastname,$username,$email,$address,$city,$birthday,$tel,$zipcode)
    {
    
    }
}
