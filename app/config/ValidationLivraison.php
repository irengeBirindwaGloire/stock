<?php

namespace Config;

class ValidationLivraison
{
    private static $message = [];

    public static function validate($data)
    {
        if (empty($data['marchand']))
            self::$message['marchand'] = "Veillez renseigner la du marchandise";

        if (empty($data['quantite'] && filter_var($data['quantite'], FILTER_VALIDATE_INT)))
            self::$message['quantite'] = "Veillez renseigner la quantité du marchandise";

        if (empty($data['prixUnitaire']))
            self::$message['prixUnitaire'] = "Veillez renseigner le prix unitaire du marchandise";

        if (empty($data['devise']))
            self::$message['devise'] = "Vous devez préciser la devise";
        return self::$message;
    }
    public static function validateData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
