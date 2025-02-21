<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publication;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publication::create([
            'titre' => 'Recette 1',
            'image' => 'image1.jpg',
            'description' => 'Description de la recette 1'
        ]);

        Publication::create([
            'titre' => 'Recette 2',
            'image' => 'image2.jpg',
            'description' => 'Description de la recette 2'
        ]);
    }
}
