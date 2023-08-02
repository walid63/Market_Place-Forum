<?php

require_once "./src/Server/_connect.php";
require_once "./src/Entity/Annonce.php";

class Annonce_model
{
    private $db;

    public function __construct()
    {
        $this->db = _connect::getInstance()->getConnection();
    }

    public function getAllAnnounces()
    {
        $query = "SELECT * FROM annonce";

        $stmt = $this->db->prepare($query);
        $stmt->execute();


        $announces = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $announce = new Annonce();
            $announce->setId($row['id']);
            $announce->setTitle($row['title']);
            $announce->setDescription($row['description']);
            $announce->setCreated_at($row['created_at']);
            $announce->setPrice($row['price']);
            $announce->setVendor_id($row['vendor_id']);

            $announces[] = $announce;
        }

        return $announces;
    }

    public function createAnnounce(Annonce $announce)
    {
        $query = "INSERT INTO annonce (title, description, created_at, price, image, vendor_id) 
                  VALUES (:title, :description, :created_at, :price, :image, :vendor_id)";

        $statement = $this->db->prepare($query);

        $statement->execute([
            'title' => $announce->getTitle(),
            'description' => $announce->getDescription(),
            'created_at' => $announce->getCreated_at(),
            'price' => $announce->getPrice(),
            'vendor_id' => $announce->getVendor_id()
        ]);

        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByAnnonce($vendorId)
    {
        $query = "SELECT * FROM User WHERE id = :vendor_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['vendor_id' => $vendorId]);

        $userAnnonce = $stmt->fetchAll();

        return $userAnnonce;
    }


    public function getUserByAnnonceId($vendorId)
    {
        $query = "SELECT * FROM User WHERE id = :vendor_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['vendor_id' => $vendorId]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            
            $user = new User(
                $userData['firstname'],
                $userData['lastname'],
                $userData['username'],
                $userData['email'],
                $userData['password'],
                $userData['tel'],
                $userData['address'],
                $userData['ville'],
                $userData['code_postal'],
                $userData['roles'],
                $userData['createdAt']
            );
            return $user;
        }

        return null; // Retourne null si l utilisateur nest pas trouvé.
    }

    public function countAnnounces()
    {
        $query = "SELECT COUNT(*) as count FROM annonce";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    public function countAnnouncesByUser($vendorId)
    {
        $query = "SELECT COUNT(*) as count FROM annonce WHERE vendor_id = :vendor_id";

        $stmt = $this->db->prepare($query);
        $stmt->execute(['vendor_id' => $vendorId]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }


    public function getAnnouncesByCurrentUser()
    {
        // Vérifier si l'utilisateur est connecté en vérifiant la présence de l'ID dans la session
        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id'];
            
            // Requête pour récupérer les annonces de l'utilisateur connecté
            $query = "SELECT * FROM annonce WHERE vendor_id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute(['user_id' => $userId]);
            
            $announces = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $announce = new Annonce();
                $announce->setId($row['id']);
                $announce->setTitle($row['title']);
                $announce->setDescription($row['description']);
                $announce->setCreated_at($row['created_at']);
                $announce->setPrice($row['price']);
                $announce->setVendor_id($row['vendor_id']);
    
                $announces[] = $announce;
            }
    
            return $announces;
        }
        
        // Retourne une liste vide si l'utilisateur n'est pas connecté
        return [];
    }
}
