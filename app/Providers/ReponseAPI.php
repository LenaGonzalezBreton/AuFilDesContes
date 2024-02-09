<?php

namespace App\Providers;

class ReponseApi
{

    public static  function ReponseCorrect($datas): array
    {
        $reponse = [
            'success' => true,
            'code' => '00000',
            'datas' => $datas,
        ];
        return $reponse;
    }
}
