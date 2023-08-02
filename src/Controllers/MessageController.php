<?php

require_once "./src/Models/Message_model.php";
require_once "./src/_lib/_view.php";

class MessageController
{
    private $view_;
    private $messageModel;

    public function __construct()
    {
        $this->view_ = new View();
        $this->messageModel = new MessageModel();
    }

    public function index()
    {
        echo "<h1 class='text-center'>Messagerie</h1>";

        // Récupérer les fils de discussion pour l'utilisateur connecté
        $userId = 1; // Remplacez 1 par l'ID de l'utilisateur connecté (à récupérer depuis la session, par exemple)
        $threads = $this->messageModel->getThreadsByUserId($userId);

        if ($threads !== null) {
            // Use the $threads variable here
            // You can loop through $threads and display the list of threads, for example
            $threads = [];
            foreach ($threads as $thread) {
                $convers = $thread['id'] . ': ' . $thread['subject'] . '<br>';
                
            }
        } else {
            // Handle the case where no threads were found
            echo 'No threads found.';
        }


      //  $this->view_->assign("convers",$convers);
        $this->view_->render("message", "list");
    }

    public function createThread()
    {
        // Vérifier si le formulaire de création de fil de discussion a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $subject = $_POST['subject'];

            // Créer un nouveau fil de discussion
            $threadId = $this->messageModel->createThread($subject);

            // Rediriger vers la vue du fil de discussion nouvellement créé
            header("Location: /message/view/" . $threadId);
            exit;
        }

        // Afficher le formulaire de création de fil de discussion
        $this->view_->render("message", "create_thread");
    }

    public function viewThread($threadId)
    {
        // Récupérer les messages du fil de discussion spécifié
        $messages = $this->messageModel->getMessagesByThreadId($threadId);

        // Marquer les messages comme lus (optionnel, selon la logique de votre application)

        // Afficher les messages du fil de discussion
        $this->view_->render("message", "view_thread", ['messages' => $messages]);
    }

    public function sendMessage($threadId)
    {
        // Vérifier si le formulaire d'envoi de message a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $senderId = 1; // Remplacez 1 par l'ID de l'utilisateur envoyant le message (à récupérer depuis la session, par exemple)
            $receiverId = $_POST['receiver_id'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];

            // Enregistrer le message dans la base de données
            $this->messageModel->createMessage($senderId, $receiverId, $subject, $content, $threadId);

            // Rediriger vers la vue du fil de discussion
            header("Location: /message/view/" . $threadId);
            exit;
        }

        // Afficher le formulaire d'envoi de message
        $this->view_->render("message", "send_message");
    }

    public function deleteMessage($messageId)
    {
        // Vérifier si le message peut être supprimé (par exemple, en vérifiant si l'utilisateur est l'auteur du message)

        // Supprimer le message de la base de données
        $this->messageModel->deleteMessage($messageId);

        // Rediriger vers la vue du fil de discussion (ou une autre page appropriée)
        //header("Location: /message/view/" . $threadId);
        exit;
    }
}
