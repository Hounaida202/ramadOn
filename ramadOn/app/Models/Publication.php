<?php

namespace App\Models;
//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commentaire;

class Publication extends Model 
{
    use HasFactory;

    protected $table = 'publication'; 

    protected $fillable = ['titre', 'image', 'description'];

    public function comments()
{
    return $this->hasMany(Commentaire::class, 'publication_id');
}
}