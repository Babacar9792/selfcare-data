<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DepartementRequest;
use App\Http\Resources\DepartementResource;

class DepartementController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DB::transaction(function () {
            try {
                $departement = Departement::all();
                return $this->responseData('Tous les departements', true, Response::HTTP_OK, DepartementResource::collection($departement));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartementRequest $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $libelle = $request->libelle;
                $libelleFormate = ucwords(strtolower($libelle));
                $departement = Departement::create([
                    "libelle" => $libelleFormate
                ]);
                return $this->responseData('Ajout Departement effectue',true,Response::HTTP_OK,DepartementResource::make($departement));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(),false,Response::HTTP_INTERNAL_SERVER_ERROR,null);
            }
        });
    }


    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        return DB::transaction(function () use ($request, $departement) {
            try {
                if ($departement) {
                    $libelleFormate = ucwords(strtolower($request->libelle));
                    $departement->libelle = $libelleFormate;
                    $departement->save();
                    return $this->responseData('Modification effectue', true, Response::HTTP_OK, DepartementResource::make($departement));
                }
                return $this->responseData('Erreur modification', true, Response::HTTP_NOT_FOUND, DepartementResource::make($departement));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        return DB::transaction(function () use ($departement) {
            try {
                $departement->delete();
                return $this->responseData('Suppression effectuée', true, Response::HTTP_OK, DepartementResource::make($departement));
            } catch (\Throwable $th) {
                return $this->responseData($th->getMessage(), false, Response::HTTP_INTERNAL_SERVER_ERROR, null);
            }
        });
    }

}
