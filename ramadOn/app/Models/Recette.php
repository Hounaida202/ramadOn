<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Recette extends Model 
{
    use HasFactory;
    protected $table = 'recette'; 
    protected $fillable = ['titre', 'image', 'categorie','description'];
}