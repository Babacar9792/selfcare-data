<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UtilisateurSeeder::class
        ]);

        // DepartementSeeder::class;
        // \App\Models\User::factory(10)->create();
        Departement::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Babacar sy',
        //     'email' => 'babacar.sy9792@gmail.com',
        //     'password' => "123",
        //     'login_window' => "stg_sow77187",
        //     "departement_id" => 1
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Babs sy',
        //     'email' => 'babacar77979204@gmail.com',
        //     'password' => "123",
        //     'login_window' => 'stg_sy78186',
        //     "departement_id" => 1
        // ]);
        // User::factory(30)->create();

        // Role::insert([
        //     [
        //         "name" => "Admine",
        //         "guard_name" => "api"
        //     ],
        //     [
        //         "name" => "Support fonctionnele",
        //         "guard_name" => "api"
        //     ],
        //     [
        //         "name" => "Collaborateurs",
        //         "guard_name" => "api"
        //     ],
        // ]);

        // for ($i = 1; $i <= 10; $i++) {
        //     $departements = User::where('departement_id', $i)->get();
        //     if (count($departements) == 0) {
        //         $user  = User::create([
        //             'prenom' => 'Babs '.$i,
        //             'nom' => "sy",
        //             'email' => 'babacar'.$i.'@gmail.com',
        //             'password' => "123",
        //             'login_windows' => 'stg_'.$i,
        //             "departement_id" => $i
        //         ]);
        //         $user->assignRole("Support fonctionnel");
        //     }
        //     else{
        //         $departements[0]->assignRole("Support fonctionnel");
        //     }
        // }

    }
}
