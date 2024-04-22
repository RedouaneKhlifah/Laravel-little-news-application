<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news;


class categorie extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(categorie::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(categorie::class, 'parent_id');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}

