<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;


class VerifyDeployToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $verifToken = Token::find(1); // Chercher le token avec un idToken par exemple: idToken => 'app'
        $token = $verifToken->deploy_token; // Pour récupérer des info, utilise vraiment l'object : $verifToken->login_token
        $requestToken = $request->bearerToken(); // $request->bearerToken()
        // Ducoup, le token devrai ressembler à ça : 
        // {"
        //     id: 'app',
        //     value: '...',
        //     mdp: null 
        // }

        if ($token === $requestToken) {
            return $next($request);
        } else {
            // Ne génère pas des érreurs à chaque fois, 
            // mais renvoie juste une reponse avec : return echo response()->json([code: 401, message: 'Non autorisé'])

            return response()->json(['code' => 401, 'message' => 'Non autorisé']);
        }
    }
}
