<?php



class _reference
{


    private $code;
    private $used;
    private $expirationDate;

    public function __construct($length = 10)
    {
        $this->code = $this->generateRandomCode($length);
        $this->used = false;
        $this->expirationDate = date('Y-m-d H:i:s', strtotime('+1 day'));
    }

    public function generateRandomCode($length)
    {
        // Le code de génération aléatoire que nous avons utilisé auparavant
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }

        return $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function isUsed()
    {
        return $this->used;
    }

    public function markAsUsed()
    {
        $this->used = true;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function isValid()
    {
        return (!$this->used && $this->expirationDate >= date('Y-m-d H:i:s'));
    }
}
