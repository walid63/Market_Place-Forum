<?php 

require_once "./src/_lib/_view.php";
require_once "./src/Models/Wallet_model.php";
require_once "./src/_lib/authUser.php";



class WalletController 
{
    private $wallet;
    private $view_;
    private $authUser;

    public function __construct()
    {
        $this->view_ = new View();
        $this->wallet = new WalletModel();
        $this->authUser = new AuthUser;
    }


    public function index()
    {
        if(isset($_SESSION['user']['wallet']))
        {
            $globalTitle = "Bonjour ". $_SESSION['user']['username'];
        }else{
            $globalTitle = "Bonjour ". $_SESSION['user']['username']."Vous n'avez pas encor creer de Portefeuille sur notre pLateform";
        }
     
        $this->view_->assign('globalTitle',$globalTitle);
        $this->view_->render('wallet','index');
    }

    public function newWallet()
    {
        if(isset($_POST['submit']))
        {
            $user_id = $_SESSION['user']['id'];
            $default_wallet_name = $_POST['walletName'];
            $montant = $_POST['montant'];
            $walletType =  $_POST['type'];
            $this->wallet->createWallet($default_wallet_name,$montant,  $walletType);
            $this->wallet->getWalletByUserId($user_id);
            $this->getUserByWallet();

            if( $this->wallet->createWallet($default_wallet_name,$montant,  $walletType))
            {
               echo 'vous avez un compte';
            }
        }
        $this->view_->render('wallet','create');
    }

    public function walletPanel()
    {
        $this->view_->render('wallet','panel');
    }

    public function getUserDataForPanel()
    {
        
    }


    public function getUserByWallet()
    {
        $user = $this->wallet->getUserByWalletId(0);

        dump($user);

    }

    
}