<?php

namespace App\Http\Middleware;

use App\Models\Token;
use App\Providers\ReponseApi;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
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
        $verifToken = Token::all()->first();
        $token = $verifToken['login_token'];
        $mdp = $verifToken['mot_de_passe'];
        if ($token == $request['login_token']) {
            if ($mdp == $request['mot_de_passe']) {
                return $next($request);
            } else {
                try {
                    abort(401);
                } catch (Throwable $error) {
                    return redirect()->route('displayError', ['error' => $error]);
                };
            }
        } else {
            try {
                abort(401);
            } catch (Throwable $error) {
                dd($error);

                return redirect()->route('displayError', ['error' => $error]);
            }
        }
    }
}
