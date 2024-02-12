<?php

namespace App\Http\Middleware;

use App\Trait\ResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CostumeAuthenticateMiddleware
{

    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        var_dump(Auth::user());
        if(Auth::check()){
            return $next($request);
        }
        return $this->responseData("Veuiller vous authentifier", false, HttpResponse::HTTP_UNAUTHORIZED);
    }
}


