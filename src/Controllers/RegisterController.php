<?php
require_once "./src/Models/User_model.php";
require_once './src/Entity/User.php';
require_once "./src/_lib/_view.php";

class RegisterController
{
  private $view;
  private $userModel;
  public function __construct()
  {
    $this->userModel = new User_model();
    $this->view = new View();
  }
  public function index()
  {

    $this->registerUser();
    $this->view->render("users", "register");
  }
  public function registerUser()
  {
    if (isset($_POST['submit'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $passw = $_POST['password'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $zipCode = $_POST['zipcode'];
      $phone = $_POST['phone'];
      $role = ['ROLE_USER'];

      $pass = password_hash($passw, PASSWORD_BCRYPT);

      $user = new User($firstname, $lastname, $username, $email, $pass, $phone, $address, $city, $zipCode, $role);
      $user->setStatus(["
        
        "]);

      if ($this->userModel->isEmailTaken($email)) {

        $this->view->assign("error", "Cet E-mail existe deja");
      } else {
        $this->userModel->createUser($user);
        header('Location: /login');
      }
    }
  }
}
