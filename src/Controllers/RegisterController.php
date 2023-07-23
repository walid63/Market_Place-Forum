<?php

require_once "./src/Models/User_model.php";
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
      $this->view->render("users","register");
    }
}