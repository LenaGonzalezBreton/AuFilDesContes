<?php

namespace App\Console\Commands;

use App\Models\Token;
use Illuminate\Console\Command;
use Nette\Utils\Random;

class ReloadDeployToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reload-deploy-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande pour obtenir un nouveau deploy_token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        $alphabetL = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $alphabetU = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'h', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $special = ['@', '!', '?', '€', '.', '-', '+', '&', '²'];
        $chiffre = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];


        $forCrypt = [];

        for ($i = 0; $i++; $i < 8) {

            switch (random_int(1, 4)) {
                case 1:
                    $forCrypt[$i] = $alphabetL[random_int(0, 25)];
                    break;
                case 2:
                    $forCrypt[$i] = $alphabetU[random_int(0, 25)];
                    break;
                case 3:
                    $forCrypt[$i] = $special[random_int(0, 7)];
                    break;
                case 4:
                    $forCrypt[$i] = $chiffre[random_int(0, 9)];
                    break;
            }
        }
        $forCrypt = implode("", $forCrypt);
        $encrypt = bcrypt($forCrypt);

        $token = Token::find(1);
        $token->deploy_token = $encrypt;
        $token->save();
    }
}
