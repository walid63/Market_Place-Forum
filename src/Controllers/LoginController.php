<?php

require_once "./src/Models/User_model.php";
require_once "./src/Entity/User.php";
require_once "./src/_lib/_view.php";
require_once "./vendor/autoload.php";

class LoginController
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
        
        $this->login();
        $this->view->render("users", "login");
         
        
    }
    public function login()
    {
        if (isset($_SESSION['auth_token'])) {       
            return;
        }
       
        if (isset($_POST['submit'])) {
                 
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->verifyCredentials($email, $password)) {
              $token = $this->generateAuthToken();          
                $_SESSION['auth_token'] = $token;
                $userData = $this->userModel->getUserByEmail($email);
                $_SESSION['user'] = [
                    'id' => $userData->getId(),
                    'firstname' =>  $userData->getFirstname(),
                    'lastname' =>  $userData->getLastname(),
                    'username' => $userData->getUsername(),
                    'email' => $userData->getEmail(),
                    'password' => $userData->getPassword(),
                    'tel' => $userData->getTel(),
                    'address' => $userData->getAddress(),
                    'city' => $userData->getCity(),
                    'zip_code' => $userData->getZipCode(),
                    'is_admin' => $userData->getIsAdmin(),
                    'is_banned' => $userData->getIsBanned(),
                    'status' => $userData->getStatus(),
                    'cratedAt' => $userData->getCreatedAt(),
                ];
               // header('Location: /');
            } else {
                $error = "L'e-mail ou le Mot de passe incorrect";
                $this->view->assign('error',$error); 
            }
        }

       
       // $this->view->render("users", "login");
    }

    private function verifyCredentials($email, $password)
    {
        
     
        $user = $this->userModel->getUserByEmail($email);

         if ($user && password_verify($password, $user->getPassword())) {
            return true;  
        }

        return false; 
    }
    function generateAuthToken()
    {
        $length = 32; // Longueur du jeton
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = random_int(0, strlen($characters) - 1);
            $token .= $characters[$randomIndex];
        }

        return $token;
    }
}
