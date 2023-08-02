<?php

require_once "./src/Server/_connect.php";


class WalletModel
{
    private $db;

   
    public function __construct()
    {
        $this->db = _connect::getInstance()->getConnection();
    }
    //$default_wallet_name,$balance, $walletType,$user_id
    public function createWallet($default_wallet_name, $montant, $type)
    {

        $user_id = $_SESSION['user']['id'];
        $date =  date('Y-m-d H:i:s');
        // Vérifier si l'utilisateur a déjà un portefeuille
        $existing_wallet = $this->getWalletByUserId($user_id);
        $status = ["cvbn"];
        // Si l'utilisateur n'a pas de portefeuille, en créer un nouveau
        if (!$existing_wallet) {
            // Insérer le nouveau portefeuille dans la base de données
            $new_wallet_id = $this->insertWallet($default_wallet_name, $montant, $date, $type, $status, $user_id);

            if ($new_wallet_id !== false) {
                return $new_wallet_id; // Le portefeuille a été créé avec succès
            } else {
                return false; // Échec de la création du portefeuille
            }
        }

        // Si l'utilisateur a déjà un portefeuille, retournez true pour indiquer que le portefeuille existe déjà
        return true;
    }


    // Autres fonctions de votre classe WalletModel...

    // Fonction pour récupérer le portefeuille d'un utilisateur par son ID d'utilisateur
    public function getWalletByUserId($user_id)
    {
        $sql = "SELECT * FROM wallet WHERE user_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result; // Retourner les données du portefeuille
        } else {
            return null; // Aucun portefeuille trouvé pour cet utilisateur
        }
    }


    private function insertWallet($wallet_name, $montant, $date, $type, $status, $user_id)
    {
        $arrayStat = json_encode($status);
        $walletRef = md5(uniqid());
        // Utiliser la classe de connexion _connect pour insérer le portefeuille
        $sql = "INSERT INTO wallet (reference,wallet_name, montant, creation_date,wallet_type,status,user_id) VALUES  (:ref,:wallet_name, :montant, :creation_date,:wallet_type,:status,:user_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":ref", $montant);
        $stmt->bindValue(":wallet_name", $wallet_name);
        $stmt->bindValue(":montant", $montant);
        $stmt->bindValue(":creation_date", $date);
        $stmt->bindValue(":wallet_type", $type);
        $stmt->bindValue(":status", $arrayStat);
        $stmt->bindValue(":user_id", $user_id);

        if ($stmt->execute()) {
            return $this->db->lastInsertId(); // Retourner l'ID généré après l'insertion
        } else {
            return false; // Échec de l'insertion du portefeuille
        }
    }

    public function getUserByWalletId($wallet_id)
    {
        /* $sql = "SELECT u.* 
                FROM user u 
                INNER JOIN wallet w ON u.user_id = w.user_id 
                WHERE w.wallet_id = :wallet_id";*/
        $sql = "SELECT u.* 
            FROM user u 
            INNER JOIN wallet w ON u.id = w.user_id 
            WHERE w.wallet_id = :wallet_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":wallet_id", $wallet_id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user; // Retourner les informations de l'utilisateur associé au portefeuille
    }
}
