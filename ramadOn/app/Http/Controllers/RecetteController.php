<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recette;

class recetteController extends Controller
{
    public function show(Request $request)
    {
        $query = Recette::query();
    
        if ($request->has('category') && $request->category != 'Tous') {
            $query->where('categorie', $request->category);
        }
    
        $recettes = $query->paginate(3);
        
        return view('Recett', compact('recettes'));
    }

    public function store()
    {
        return view('AddRecipes');    

    }
    public function save( Request $request)
    {
        $title_pub = $request->input('titre');
        $image_url = $request->input('image_url');
        $categorie = $request->input('categorie');
        $description = $request->input('description');
        
        $recette = Recette::create([
            'titre' => $title_pub,
            'image' => $image_url,
            'categorie' => $categorie,
            'description' => $description,
        ]);

        if ($recette) {
            return redirect()->route('recettes')->with('success', 'Recette ajoutée avec succès.');
        } else {
            echo "Une erreur s'est produite lors de l'ajout de la recette.";
        }    dd($recette);
    }
}
