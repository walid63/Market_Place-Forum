

<?php
// AdminCodeModel.php
require_once "./src/_lib/AdminDoorCode.php";
require_once "./src/Server/_connect.php";

class AdminKeyModel {
    private $db;

    public function __construct() {
        $this->db = _connect::getInstance()->getConnection();
    }

    public function generateAdminKey($adminId, $codeLength = 10) {
        $codeManager = new CodeManager();
        $code = $codeManager->generateRandomCode($codeLength);
       

        // Définir la date d'expiration (par exemple, +1 jour à partir de maintenant)
        $expirationDate = date('Y-m-d H:i:s', strtotime('+1 day'));

        // Insérer la clé générée dans la base de données associée à l'admin_id
        $query = "INSERT INTO admin_codes (admin_id, code, used, expiration_date) VALUES (?, ?, 0, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$adminId, $code, $expirationDate]);

        // Retourner la clé générée
        return $code;
    }

    public function getValidAdminKeyByCode($code) {
        // Récupérer les détails de la clé en fonction du code généré, s'il est encore valide et non utilisé
        $query = "SELECT * FROM admin_codes WHERE code = ? AND used = 0 AND expiration_date >= NOW()";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$code]);

        // Récupérer les résultats sous forme de tableau associatif
        $adminKeyData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $adminKeyData;
    }

    public function markAdminKeyAsUsed($keyId) {
        // Marquer la clé comme utilisée dans la base de données
        $query = "UPDATE admin_codes SET used = 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$keyId]);
    }

    // Autres méthodes pour la gestion des clés générées, la récupération des clés valides, etc.
}