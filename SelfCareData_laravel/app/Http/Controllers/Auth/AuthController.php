<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\DebloquerRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ResponseTrait;


    /**
     * Méthode pour l'authentification 
     * @param $request : username and password
     * Le username peut etre l'email ou le login_window
     * Dans le model user, nous avons deux foocntions : une pour incrémenter la valeur de l'attribut tentative de l'utilisateur et le bloqué s'il y trop de tentatives, une autre pour reinitialiser la valeur et débloquer L'utilisateur
     * Nous utilisons les événement de Login et de Fail pour savoir si l'authentification s'est bien passé ou pas. Laravel nous fournie des event qui émettent lorsque l'utilsiateur fairt appel à cette méthode
     * Nous avons creer deux listener pour écouter ces événement
     */

    public function login(LoginRequest $request)
    {
        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'login_windows';
        $credentials = [
            $field => $request->input('username'),
            'password' => $request->input('password')
        ];

        // Tentative de connexion
        if (!Auth::attempt($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);

            // Vérifier si l'utilisateur est bloqué
            if ($user && $user->blocked) {
                return $this->responseData("Trop de tentatives, votre compte vient d'être bloqué. Veuillez contacter un administrateur.", false, Response::HTTP_UNAUTHORIZED);
            }

            // Échec de la connexion
            return $this->responseData("Email ou mot de passe incorrect.", false, Response::HTTP_UNAUTHORIZED);
        }


        // Vérifier si l'utilisateur est bloqué

        if (Auth::user()->blocked == true) {
            return $this->responseData("Votre compte a été bloqué. Veuillez contacter un administrateur.", false, Response::HTTP_UNAUTHORIZED);
        }

        // Authentification réussie
        $token = Auth::user()->createToken('token');
        return $this->responseData("Authentification réussie", true, Response::HTTP_ACCEPTED, ["user" => UserResource::make(Auth::user()), "token" => $token]);
    }


    public function logout()
    {
        try {
            Auth::user()->token()->revoke();
            return $this->responseData("Deconnexion réussie", true, Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
        }
    }

    public function debloquerUser(DebloquerRequest $request)
    {
        try {
            $user = User::where("id", $request->user)->first();
            $user->resetTentatives();
            return $this->responseData("L'utilisateur a bien été débloqué", true, Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
        }
    }
}
