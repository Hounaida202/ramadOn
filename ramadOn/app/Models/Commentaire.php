<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication;

class Commentaire extends Model 
{
    use HasFactory;

    protected $table = 'commentaire'; 
    protected $fillable = ['contenu', 'publication_id'];
public function publication()
{
    return $this->belongsTo(Publication::class);
}
}