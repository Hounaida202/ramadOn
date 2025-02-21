<?php

namespace App\Http\Controllers;

use App\Models\Publication; 
use App\Models\Recette; 

use Illuminate\Http\Request;

class PublicationController extends Controller 
{
    public function show()
    {
        $publications = Publication::paginate(3); 
        return view('Dash', compact('publications'));    
        // dd($publications);
    }


    public function store()
    {
        return view('ajouter');    

    }



    public function save( Request $request)
    {
        $title_pub = $request->input('title_pub');
        $description = $request->input('description');
        $image_url = $request->input('image_url');
        
        $publication = Publication::create([
            'titre' => $title_pub,
            'image' => $image_url,
            'description' => $description,
        ]);

        if ($publication) {
            return redirect()->route('publishing')->with('success', 'Publication ajoutée avec succès.');
        } else {
            echo "Une erreur s'est produite lors de l'ajout de la publication.";
        }    }

public function index()
{
    $publications = Publication::with('comments')->get();
    return view('Dash', compact('publications'));
}

public function showStatistics()
{
    $totalPublications = Publication::count();
    $totalRecipes = Recette::count(); 

    return view('statistiques', compact('totalPublications', 'totalRecipes'));
}



}