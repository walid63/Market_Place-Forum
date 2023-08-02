<?php

require_once "./src/Server/_connect.php";

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = _connect::getInstance()->getConnection();
    }

    public function markUserAsAdmin($userId)
    {

        $query = "UPDATE user SET admin = 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);
    }

    public function checkIfUserIsAdmin($userId)
    {
        // Vérifiez si l'utilisateur est marqué comme administrateur dans la base de données
        // Remplacez "user" par le nom de votre table d'utilisateurs et "isAdmin" par le nom du champ indiquant si l'utilisateur est administrateur
        $query = "SELECT is_admin FROM user WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);

        // Récupérer le résultat sous forme de tableau associatif
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur est un administrateur (si le champ "isAdmin" est à 1)
        // return $userData['isAdmin'] == 1;
        return isset($userData['is_admin']) && $userData['is_admin'] == 1;
    }

    public function addAdminUser($userId)
    {
        // Récupérer les détails de l'utilisateur à partir de la table "user" en utilisant son ID
        $query = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);

        // Vérifier si l'utilisateur existe dans la table "user"
        if ($stmt->rowCount() > 0) {
            // L'utilisateur existe, vous pouvez maintenant l'ajouter en tant qu'administrateur dans la table "admin"
            $query = "INSERT INTO admin (user_id, date_inscription, statut, derniere_connexion) VALUES (?, NOW(), 'actif', NOW())";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$userId]);

            // Retourner true pour indiquer que l'ajout a été effectué avec succès
            return true;
        } else {
            // L'utilisateur n'existe pas dans la table "user"
            // Vous pouvez gérer cette situation comme vous le souhaitez, par exemple en lançant une exception
            // ou en affichant un message d'erreur approprié
            return false;
        }
    }



    public function getAdminData($userId)
    {
        // Récupérer les informations de l'administrateur à partir de la table "admin" en fonction de l'ID de l'utilisateur
        $query = "SELECT * FROM admin WHERE user_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);

        // Récupérer les résultats sous forme de tableau associatif
        $adminData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si des données d'administrateur ont été trouvées
        if (!$adminData) {
            return null; // Aucune donnée d'administrateur trouvée, retourner null
        }

        return $adminData;
    }

    public function getUserByAdminId($adminId) {
        // Récupérer les informations de l'utilisateur à partir de la table "user" en fonction de l'ID d'administrateur
        $query = "SELECT user.* FROM user
                  JOIN admin ON user.id = admin.user_id
                  WHERE admin.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$adminId]);

        // Récupérer les résultats sous forme de tableau associatif
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si des données d'utilisateur ont été trouvées
        if (!$userData) {
            return null; // Aucune donnée d'utilisateur trouvée, retourner null
        }

        return $userData;
    }
}
