<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PermissionController;
use App\Http\Controllers\Auth\RoleController;
// use App\Http\Controllers\PermissionController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilisateurController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\TrackingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("login", [AuthController::class, "login"])->name("auth.login");

//customAuth : middleware pour moddifier le forma de réponse de l'authentification avec auth
 Route::middleware("auth:api")->group(function() {
    Route::apiResource("role",  RoleController::class);
    Route::get("logout", [AuthController::class, 'logout'])->name("au.logout");
    Route::post('user/{user}/debloquer', [AuthController::class, 'debloquerUser'])->name("user.deblocker");
    Route::post('user/{id}/role', [RoleController::class, "assignRoleToUser"])->name("user.assignRole");
    Route::apiResource("permission",  PermissionController::class);
    Route::post('departement/{id}/interim', [RoleController::class, 'interim'])->name("departement.interim");
    Route::apiResource('user', UtilisateurController::class);
    Route::apiResource('departement',DepartementController::class);
    Route::get('tracking',[TrackingController::class,'getAllTrafics']);
 });




//user


//Departement
