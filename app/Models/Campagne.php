<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;

    protected $fillable = [
    'titre',
    'montant_promo', 
    'date_debut', 
    'date_fin'
];

    public function articles(){
        return $this->belongsToMany(Article::class, 'campagnes_articles');
    }
}
