<?php

namespace App\Providers;

class ReponseApi
{
    /**
     * Nom : ReponseAllowed
     * Entrée : tableau des données retournées par le controller en cas de succès 
     * Sortie : tableau associatif au format attendu 
     */
    public static  function ReponseAllowed($datas): array
    {
        $reponse = [
            'success' => true,
            'code' => 200,
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
