<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PanierController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // Montrer la page du panier
        return view('panier.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Article $article, Request $request)
    {
       
        $panier = session()->get("panier"); //on récupère le panier en session

        if (!$panier) { // on initialise un panier vide si le panier existe pas
            $panier = array();
        }

        $this->validate($request, [
            'quantite' => 'numeric|min:1'
        ]);
        $article->quantite = $request->input('quantite');

        array_push($panier, $article); // on insére le panier et ses articles dans un tableau

        session()->put("panier", $panier); // on enregistre le panier
        return redirect()->route('panier.show')->with('message', 'L\'article a bien été ajouté');
    }
    public function modifierQuantite($articleId, Request $request)
    {

        $panier = session()->get("panier"); // on récupère le panier en session

        $this->validate($request, [
            'quantite' => 'numeric|min:1'
        ]);

        foreach ($panier as $key => $articlePanier) { // on boucle sur le panier en prenant les valurs des articles dans le panier

            if ($articlePanier->id == $articleId) { // si l'id des articles dans le panier ont leurs quantités qui est modifiées

                $panier[$key]["quantite"] = $request->quantite; // on modifie les quantités
            }
        }


        session()->put("panier", $panier); // on enregistre le panier

        // Redirection vers le panier
        return back()->withMessage("Quantité modifiée");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $panier = session()->get("panier"); // on récupère le panier en session

        foreach ($panier as $key => $articlePanier) {

            if ($articlePanier->id == $id) {

                array_splice($panier, $key, 1);
            }
        }

        session()->put("panier", $panier); // on enregistre le panier

        // Redirection vers le panier
        return back()->withMessage("Produit retiré du panier");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        session()->forget("panier"); // On supprime le panier en session

        // Redirection vers le panier vide
        return back()->withMessage("Panier vidé");
    }
  
}
