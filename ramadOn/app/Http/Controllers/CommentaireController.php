<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function show($publication_id)
{
    $comments = Commentaire::where('publication_id', $publication_id)->get();
    // 
}

public function store(Request $request)
{
    $request->validate([
        'publication_id' => 'required|exists:publication,id',
        'content' => 'required|string|max:255',
    ]);
    $comment = new Commentaire();
    $comment->publication_id = $request->publication_id;
    $comment->contenu = $request->content; 
    $comment->save();

    return redirect()->back()->with('success', 'Commentaire ajouté avec succès !');
}

}