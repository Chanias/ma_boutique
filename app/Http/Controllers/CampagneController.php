<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Campagne;
use Auth;
use Illuminate\Support\Facades\DB;

class CampagneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campagnes = Campagne::whereDate('date_fin', '>=',  date('Y-m-d'))->orderBy('date_debut', 'asc')->get();
        

        return view('campagnes/index', ['campagnes' => $campagnes,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|min:5|max:50',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'reduction' => 'required',
        ]);
        // sauvegarde dans la base de données les nouvelles campagnes et je stock la variable
        $campagne = Campagne::create($request->all()); //$campagne est une instance de la table Campagne

        //insertion des articles associés via un eager loading dans campagne_article
        $articles = Article::all();
        for ($i = 1; $i < count($articles); $i++) {
            if (isset($request['article' . $i])) {
                $campagne->articles()->attach([$i]); // attach = insert into ...
            }
        }
        return redirect()->route('admin.index')->with('message', 'Campagne a été créée avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campagne $campagne)
    {
        $campagneArticlesId = DB::table('campagne_articles')->where('campagne_id', '=', $campagne->id)->get('article_id');
        $articles = Article::all();

        return view('campagnes.edit', [
            'campagne' => $campagne,
            'articles' => $articles,
            'campagneArticlesId' => $campagneArticlesId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campagne $campagne)
    {
        $request->validate([
            'titre' => 'required|min:5|max:50',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'reduction' => 'required',
        ]);
        // sauvegarde dans la base de données les modifs des campagne
        $campagne->update($request->all());

        // on charge les articles associés à la campagne
        $campagne->load('articles');

        // on les retire de la table intermédiaire
        foreach ($campagne->articles as $article) {
            $campagne->articles()->detach($article);
        }
        $articles = Article::all();
        //On réinplante les nouveaux articles dans la base de données
        for ($i = 1; $i < count($articles); $i++) {
            if (isset($request['article' . $i])) {
                $campagne->articles()->attach([$i]); // attach = insert into ...
            }
        }

        return redirect()->route('admin.index')->with('message', 'La campagne a bien été modifié...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campagne $campagne)
    {
        $campagne->delete();
        return redirect()->route('admin.index')->with('message', 'La campagne a bien été supprimé...');
    }
}
