<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
        return view('home',[           
            'currentPromo' => $currentPromo,
            ]);
    }
}
