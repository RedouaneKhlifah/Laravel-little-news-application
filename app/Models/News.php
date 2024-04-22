<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class News extends Model
{
    use HasFactory;

    protected $table = 'news'; 

    protected $fillable = [ 
        'titre',
        'contenu',
        'categorie_id',
        'date_debut',
        'date_expiration',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class );
    }
}
