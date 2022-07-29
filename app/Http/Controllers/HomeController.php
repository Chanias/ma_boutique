<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Campagne;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() && !session()->has('adresse')){
            session()->put('adresse', Adresse::where('user_id', Auth::user()->id)->first());
        }

        $currentPromo = Campagne::with(['articles' => function ($query) {
            $query->limit(3);
        }])
            ->whereDate('date_debut', '<=', date('Y-m-d')) //2022-06-17  format de date mysql
            ->whereDate('date_fin', '>=',  date('Y-m-d'))
            ->get();

        if (isset($currentPromo[0])) {
            $currentPromo = $currentPromo[0];
        } else {
            $currentPromo = null;
        }

        // On récupère les 3 articles les mieux notés : notes la plus haute
        $topArticles=Article::orderBy('note','desc')->with(['campagnes'=>function($query){ // avec un desc pour que ça soit l'inverse : la note la + haute en 1ere
           $query
            ->whereDate('date_debut', '<=', date('Y-m-d')) //2022-06-17  format de date mysql
            ->whereDate('date_fin', '>=',  date('Y-m-d'))
            ->get();

        }])->limit(3)->get();
        
        return view('home',[           
            'currentPromo' => $currentPromo,
            'topArticles' => $topArticles,

            ]);
           
    }
    public function a_propos()
    {
        return view('a_propos');
    }
}
