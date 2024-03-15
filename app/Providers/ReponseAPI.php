<?php

namespace App\Providers;

use App\Models\Token;

class ReponseApi
{
    /**
     * Nom : ReponseAllowed
     * Entrée : tableau des données retournées par le controller en cas de succès 
     * Sortie : tableau associatif au format attendu 
     */
    public static  function ReponseAllowed($datas): array
    {
        $verifToken = Token::find(1); // Chercher le token avec un idToken par exemple: idToken => 'app'
        $token = $verifToken->app_token; // Pour récupérer des info, utilise vraiment l'object : $verifToken->login_token
        $reponse = [
            'success' => true,
            'code' => 200,
            'sécurité' => $token,
            'datas' => $datas,
        ];
        return $reponse;
    }

    /**
     * Nom : ReponseReject 
     * Entrée : erreur renvoyé par le controller
     * Sortie : tableau associatif les informations sur l'erreur 
     */
    public static function ReponseReject($error): array
    {
        $reponse =
            [
                'success' => false,
                'code' => $error->getCode(),
                'message' => $error->getMessage(),
            ];

        return $reponse;
    }
}
