<?php

namespace Database\Seeders;


use App\Models\Departement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Departement::create(['libelle' => 'Informatique']);
        // Departement::create(['libelle' => 'Ressources humaines']);
        // Departement::create(['libelle' => 'Finance']);

        for ($i = 0; $i < 10; $i++) {
            Departement::create(['libelle' => 'Departement ' . $i]);
        }
    }
}
