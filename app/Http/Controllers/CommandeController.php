<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use App\Models\Adresse;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $prixTotal = session()->get('prixTotal');

        $commande=Commande::create([
            'numero'=>rand(1000000, 9999999),
            'prix'=>$prixTotal,
            'user_id'=>Auth::user()->id,
            'adresse_id'=>session()->get('adresse')->id,

        ]);
        foreach(session()->get('panier') as $article){

            $commande->articles()->attach( // attach = insert into ...
               $article->id,
                ['quantite'=>$article->quantite,
                'reduction'=> $article->campagne ? $article->campagne->reduction : 0]
            ); 
        }
        

        session()->forget("panier"); // On supprime le panier en session

        // Redirection vers la page d'accueil
        return redirect()->route('home')->with('message', 'La commande a été sauvegardée et le panier vidé...');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
       
       $commande->load('articles');
      
        return view('commandes.show', ['commande' => $commande]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
