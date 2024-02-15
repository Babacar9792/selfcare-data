<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\AssiRoleRequest;
use App\Http\Requests\Role\InterimRequest;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // for ($i = 1; $i <= 10; $i++) {
        //     $departements = User::where('departement_id', $i)->get();
        //     if (count($departements) == 0) {
        //         $user  = User::create([
        //             'name' => 'Babs sy '.$i,
        //             'email' => 'babacar'.$i.'@gmail.com',
        //             'password' => "123",
        //             'login_window' => 'stg_'.$i,
        //             "departement_id" => $i
        //         ]);
        //         $user->assignRole("Support fonctionnel");
        //     }
        //     else{
        //         $departements[0]->assignRole("Support fonctionnel");
        //     }
        // }
        activity()->log("listé les roles");
        return $this->responseData("tous les roles", true, Response::HTTP_ACCEPTED, Role::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        return  DB::transaction(function () use ($request) {
            try {
                $role = Role::create([
                    "name" => ucfirst(strtolower($request->name)),
                    "guard_name" => "api"
                ]);
                activity()->log('ajouté un nouveau role');
                return $this->responseData("Role crée", true, Response::HTTP_ACCEPTED, $role);
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
            }
        });
    }

    public function assignRoleToUser(AssiRoleRequest $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $user = User::where("id", $request->user_id)->first();
                $role = Role::where("id", $request->role_id)->first();
                $user->syncRoles([$role->name]);
                activity()->log("changé le role d'un utilisateur");
                return $this->responseData("nouveau role assigné ", true, Response::HTTP_ACCEPTED, $role);
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
            }
        });
    }

    public function interim(InterimRequest $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $current = User::find($request->current);
                $current->syncRoles(['Collaborateur']);
                $new_user = User::find($request->new_user);
                $new_user->syncRoles(['Support fonctionnel']);
                activity()->log("changé le role d'un utilisateur en tant que support fonctionnel");
                return $this->responseData('Changement effectué', true, Response::HTTP_ACCEPTED, [
                    "current" => UserResource::make($current),
                    "new" => UserResource::make($new_user)
                ]);
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST);
            }
        });
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
