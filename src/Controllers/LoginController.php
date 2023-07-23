<?php

require_once "./src/Models/User_model.php";
require_once "./src/_lib/_view.php";


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
        $this->view->render("users","login");
    }
}
