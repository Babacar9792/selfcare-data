<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreutilisateurRequest;
use App\Http\Requests\UpdateutilisateurRequest;
use App\Http\Resources\UserResource;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            "message" =>"liste des utilisateurs",
            "data"=>UserResource::collection($user)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreutilisateurRequest $request)
    // {

    //         $existingUser = User::where('email', $request->email)->withTrashed()->first();

    //         if ($existingUser) {
    //             $existingUser->restore();

    //             return response()->json([
    //                 'message' => 'Utilisateur restauré avec succès',
    //                 'user' => $existingUser
    //             ], 200);
    //         }

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'departement_id'=>$request->departement,
    //         'login_windows' => $request->login_windows,
    //         'password' => bcrypt($request->password),
    //     ]);

    //     return response()->json([
    //         'message' => 'Utilisateur créé avec succès',
    //         'user' => $user,
    //     ], 201);
    // }

    public function store(StoreutilisateurRequest $request)
{
    // Vérifier si un utilisateur avec le même e-mail existe déjà
    $existingUser = User::where('email', $request->email)->withTrashed()->first();

    if ($existingUser) {
        // Restaurer l'utilisateur existant
        $existingUser->restore();

        return response()->json([
            'message' => 'Utilisateur restauré avec succès',
            'user' =>  new UserResource($existingUser)
        ], 200);
    }


    // Créer un nouvel utilisateur avec l'adresse e-mail complétée si nécessaire
    $user = User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'departement_id' => $request->departement,
        'login_windows' => $request->login_windows,
        'password' => $request->password,
    ]);

    return response()->json([
        'message' => 'Utilisateur créé avec succès',
        'user' => new UserResource($user),
    ], 201);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateutilisateurRequest $request, User $user)
    {
        $user->update([
            'name' => $request->filled('name') ? $request->name : $user->name,
            'email' => $request->filled('email') ? $request->email : $user->email,
            'login_windows' => $request->filled('login_windows') ? $request->login_windows : $user->login_windows,
        ]);

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'user' => $user,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'Utilisateur supprimé avec succès'
        ], 200);
    }
}
