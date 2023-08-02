<?php


require_once "./src/_lib/_view.php";

class LogoutController
{
    private $view_;

    public function __construct()
    {
        $this->view_ = new View();
    }
    public function index()
    {
       // session_start();
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
            $this->view_->render("users","logout");
        }
    }
}
?>  