<?php

namespace App\Http\Controllers;

use App\Models\Caverne;
use App\Models\Conte;
use App\Models\LivreOr;
use App\Models\MotCle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        try {
            // trier les contes avec la meilleurs note en premier
            $contes = Conte::all()->sortByDesc(function ($conte) {
                if ($conte->nombre_note_conte > 0) {
                    return $conte->note_conte / $conte->nombre_note_conte;
                } else {
                    return 0;
                }
            });


            //trier les cavernes avec les nombre de conte
            $cavernes = Caverne::all()->sortByDesc(function ($cav) {
                return count($cav->conte);
            });


            $motcles = MotCle::all()->sortByDesc(function ($mot) {
                return count($mot->contes);
            });
            $livreor = LivreOr::all()->where('is_verified_livreor', false);
            return view('dashboard', compact('contes', 'cavernes', 'motcles', 'livreor'));
        } catch (Throwable $error) {
            dd($error);
        }
    }
}
