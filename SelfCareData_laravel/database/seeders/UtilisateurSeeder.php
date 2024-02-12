<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Chemin du fichier CSV
        $fichier = resource_path('data/users.csv');

        // Lecture du fichier CSV
        $handle = fopen($fichier, "r");
        if ($handle !== FALSE) {
            $firstLine = true; // Pour indiquer si c'est la première ligne
            // Parcours du fichier ligne par ligne
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($firstLine) {
                    $firstLine = false; // Ignorer la première ligne (l'en-tête)
                    continue;
                }
                // Insertion des données dans la base de données
                DB::table('users')->insert([
                    'prenom' => $data[0],
                    'nom' => $data[1],
                    'email' => $data[2],
                    'login_windows' => $data[3],
                    'departement_id' => $data[4],
                    'password' => bcrypt('password123'), // Assurez-vous que le mot de passe soit crypté avant l'insertion
                ]);
            }
            fclose($handle);
        }
    }


//     public function run()
// {
//     $file = resource_path('data/users.csv');
//     if (($handle = fopen($file, "r")) !== FALSE) {
//         $header = null;
//         $data = array();
//         $firstLine = true;
//         while (($row = fgetcsv($handle, 2000, ",")) !== false)
//         {
//             $row = array_map("utf8_encode", $row);

//             if ($firstLine) {
//                 // Ignorer la première ligne (entête)
//                 $firstLine = false;
//                 continue;
//             }

//             // Ajouter le mot de passe à chaque ligne
//             $row[] = bcrypt('password123');
//             $data[] = $row;
//         }

//         // Insérer toutes les données dans la base de données
//         User::insert($data);
//         fclose($handle);
//     }
// }
}
