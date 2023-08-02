<?php

require_once "./src/Server/_connect.php";
require_once "./src/Entity/CategoryAnnonce.php";




class Annonce_category_model
{
    private $db;

    public function __construct()
    {
        $this->db = _connect::getInstance()->getConnection();
    }


    public function getAllCategory()
    {
        $query = "SELECT * FROM category_annonce";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $categories = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $category = new CategoryAnnonce();
            $category->setId($row['id']);
            $category->setName($row['name']);

            $categories[] = $category;
        }

        return $categories;
    }

    public function getAnnouncesByCategory($categoryId)
    {
        $query = "SELECT * FROM annonce WHERE category_id = :category_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['category_id' => $categoryId]);

        $announces = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $announce = new Annonce();
            $announce->setId($row['id']);
            $announce->setTitle($row['title']);
            // Récupérer les autres propriétés de l'annonce à partir des colonnes de votre table
            // ...

            $announces[] = $announce;
        }

        return $announces;
    }
}
