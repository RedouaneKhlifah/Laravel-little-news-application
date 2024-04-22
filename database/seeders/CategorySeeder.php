<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\categorie;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Actualités
        $actualites = categorie::create(['name' => 'Actualités']);
        $politique = $actualites->children()->create(['name' => 'Politique']);
        $economie = $actualites->children()->create(['name' => 'Économie']);
        $sport = $actualites->children()->create(['name' => 'Sport']);

        // Divertissement
        $divertissement = categorie::create(['name' => 'Divertissement']);
        $cinema = $divertissement->children()->create(['name' => 'Cinéma']);
        $musique = $divertissement->children()->create(['name' => 'Musique']);
        $sorties = $divertissement->children()->create(['name' => 'Sorties']);

        // Technologie
        $technologie = categorie::create(['name' => 'Technologie']);
        $informatique = $technologie->children()->create(['name' => 'Informatique']);
        $ordinateurs = $informatique->children()->create(['name' => 'Ordinateurs de bureau']);
        $pcPortable = $informatique->children()->create(['name' => 'PC portable']);
        $connexionInternet = $informatique->children()->create(['name' => 'Connexion internet']);
        $gadgets = $technologie->children()->create(['name' => 'Gadgets']);
        $smartphones = $gadgets->children()->create(['name' => 'Smartphones']);
        $tablettes = $gadgets->children()->create(['name' => 'Tablettes']);
        $jeuxVideo = $gadgets->children()->create(['name' => 'Jeux vidéo']);

        // Santé
        $sante = categorie::create(['name' => 'Santé']);
        $medecine = $sante->children()->create(['name' => 'Médecine']);
        $bienEtre = $sante->children()->create(['name' => 'Bien-être']);
    }
}

