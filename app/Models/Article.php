<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description_courte',
        'description_longue',
        'image',
        'prix',
        'stock',
        'note',
        'gamme_id'
    ];

    protected $with = [ // dès que je récupère un article je récupère automatiquement les campagnes
        'campagnes'
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commandes_articles')->withPivot(['quantite', 'reduction']);
    }

    public function campagnes()
    {
        return $this->belongsToMany(Campagne::class, 'campagne_articles');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
    public function gamme()
    {
        return $this->belongsTo(Gamme::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'favoris');
    }
}
