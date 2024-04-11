<?php

namespace App\Http\Middleware;

use App\Models\Token;
use App\Providers\ReponseApi;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

use function PHPSTORM_META\elementType;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $verifToken = Token::find(1); // Chercher le token avec un idToken par exemple: idToken => 'app'
        $token = $verifToken->app_token; // Pour récupérer des info, utilise vraiment l'object : $verifToken->login_token

        // Ducoup, le token devrai ressembler à ça : 
        // {"
        //     id: 'app',
        //     value: '...',
        //     mdp: null 
        // }

        if ($token == $request->bearerToken()) { // Le token de la requete viens de $request->bearerToken();
            return $next($request);
        } else {
            // Ne génère pas des érreurs à chaque fois, 
            // mais renvoie juste une reponse avec : return echo response()->json([code: 401, message: 'Non autorisé'])

            return response()->json(['success' => false, 'code' => 401, 'message' => 'Non autorisé']);
        }
    }
    // (Après c'est juste des conseil ^^)
}
