<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;
use App\Models\User;
use App\Models\Campagne;

class AdminController extends Controller
{
    public function __construct(){
        return $this->middleware('admin');
    }
    public function index()
    {
        // On récupère tout ce que l'on a besoin: articles, gammes, users, campagnes
        $articles=Article::all();
        $gammes=Gamme::all();
        $users=User::all();
        $campagnes=Campagne::with('articles')->get(); // je récupère mes campagnes avec mes articles associés : c'est un EAGER LOADING équivalent INNER JOIN


        return view('admin.index', compact('articles','gammes','users','campagnes'));
    }


}
