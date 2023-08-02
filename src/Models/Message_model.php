<?php 

require_once "./src/Server/_connect.php";


class MessageModel 
{
    
    private $db;

    public function __construct()
    {
        $this->db = _connect::getInstance()->getConnection();
    }

    public function createMessage($senderId, $receiverId, $subject, $content)
    {
        // Code pour insérer le message dans la base de données
    }

    // Obtenir tous les messages d'un fil de discussion spécifique
    public function getMessagesByThreadId($threadId)
    {
        // Code pour récupérer les messages en fonction de l'ID du fil de discussion
    }

    // Obtenir tous les fils de discussion pour un utilisateur donné
    public function getThreadsByUserId($userId)
    {
        $test =["id" =>"id","cbxbnfhnhf","fdgfhn"];
        return $test;
        // Code pour récupérer les fils de discussion associés à l'utilisateur donné
    }

    // Marquer un message comme lu
    public function markMessageAsRead($messageId)
    {
        // Code pour mettre à jour l'état de lecture du message dans la base de données
    }

    // Supprimer un message
    public function deleteMessage($messageId)
    {
        // Code pour supprimer le message de la base de données
    }
}