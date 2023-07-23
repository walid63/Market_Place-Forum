<?php




class SidebarController
{
    public function index()
    {
        $userModel = new User_model();
        $isLoggedIn = $userModel->isLoggedIn();

        include './src/Views/sidebar/sidebar.php';
    }
}
