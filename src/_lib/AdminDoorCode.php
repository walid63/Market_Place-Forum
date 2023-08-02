<?php 

class CodeManager {
    private $code;
    private $used;
    private $expirationDate;

    public function __construct($length = 10) {
        $this->code = $this->generateRandomCode($length);
        $this->used = false;
        $this->expirationDate = date('Y-m-d H:i:s', strtotime('+1 day'));
    }

    public function generateRandomCode($length) {
        // Le code de génération aléatoire que nous avons utilisé auparavant
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }

        return $code;
    }

    public function getCode() {
        return $this->code;
    }

    public function isUsed() {
        return $this->used;
    }

    public function markAsUsed() {
        $this->used = true;
    }

    public function getExpirationDate() {
        return $this->expirationDate;
    }

    public function isValid() {
        return (!$this->used && $this->expirationDate >= date('Y-m-d H:i:s'));
    }
}



/*  public function instanciationExempleForMe()
    {
        $codeManager = new CodeManager();

        // Récupération du code généré
        $code = $codeManager->getCode();

        // Vérification si le code est valide
        if ($codeManager->isValid()) {
            // Le code est valide et n'a pas été utilisé
            dump ("Voici votre code : $code");

            // Maintenant, supposons que l'utilisateur entre le code dans un formulaire
            // et que vous vérifiez s'il est correct ici. Pour les besoins de l'exemple, nous considérerons que le code est correct.
            // Ensuite, vous pouvez marquer le code comme "utilisé" une fois qu'il est validé.

            // Marquer le code comme utilisé une fois que l'utilisateur l'a saisi et validé
            $codeManager->markAsUsed();

            // Vous pouvez maintenant permettre à l'utilisateur d'accéder aux fonctionnalités spécifiques.
        } else {
            // Le code n'est pas valide ou a déjà été utilisé
            echo "Le code n'est pas valide.";
        }
    } */ 