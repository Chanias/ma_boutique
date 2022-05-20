<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'description_courte', 
        'longue', 
        'image', 'prix', 
        'stock', 
        'note', 
        'gamme_id'];

    public function commandes(){
        return $this->belongsToMany(Commande::class, 'commande_articles');
    }

    public function campagnes(){
        return $this->belongsToMany(Campagne::class, 'campagne_articles');
    }
}
