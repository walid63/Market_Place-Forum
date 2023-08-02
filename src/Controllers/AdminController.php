<?php

require_once "./src/_lib/_view.php";
require_once "./src/Entity/Annonce.php";
require_once "./src/Entity/User.php";
require_once "./src/Models/User_model.php";
require_once "./src/Models/Admin_model.php";


class AdminController
{

    private $view_;
    private $adminModel;
    public function __construct()
    {
        $this->view_ = new View;
        $this->adminModel = new AdminModel;
    }

    public function index()
    {
        echo 'admin panel';
        $this->view_->render('admin', 'index');
      
    }


    public function adminPanel()
    {
       echo 'admin panel';
       if(isset( $_SESSION['user']['admin']))
       {
           $test =  $_SESSION['user']['admin'] ;

           if($this->admin_verificator())
           {
              
           }
          
       }


        $this->view_->render('admin', 'adminPanel');

    }

    private function admin_verificator()
    {
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
            $isAdmin = $this->adminModel->checkIfUserIsAdmin($userId);

            if ($isAdmin) {
                // L'utilisateur est un administrateur, affichez les fonctionnalités d'administration

                $adminData = $this->adminModel->getAdminData($userId);

                // Stockez les informations de l'administrateur dans $_SESSION['user']['admin']
                $_SESSION['user']['admin'] = $adminData;
                 

                $isAdminAdded = $this->adminModel->addAdminUser($userId);
                $userData = $this->adminModel->getUserByAdminId($_SESSION['user']['admin']['id']);

          

                // Affichez les fonctionnalités d'administration
        
                $this->view_->assign('userData',$userData);
                $this->view_->assign('isAdminAdded',$isAdminAdded);
                $this->view_->assign('adminData',$adminData);
                //$this->view_->render('admin', 'adminPanel');
            } else {
                // L'utilisateur n'est pas un administrateur, affichez un message d'erreur ou redirigez-le vers une autre page
                echo "Vous n'êtes pas autorisé à accéder à cette page.";
            }
        } else {
            echo "vous n etes pas connecter veullez vous connecter";
        }
    }
    

    // Autres méthodes du contrôleur...
}
