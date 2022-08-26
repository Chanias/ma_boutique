<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //On récupère les articles qui ont une campagne en cours
        $articles = Article::with(['campagnes' => function ($query) {
            $query->whereDate('date_debut', '<=', date('Y-m-d'))
                ->whereDate('date_fin', '>=',  date('Y-m-d'))
                ->get();
            
        }])->get();
        $articles= Article::orderBy('nom','asc')->get();
        return view('articles/index', [
            'articles' => $articles,
        ]);
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
            'nom' => 'required|min:5|max:50',
            'description_courte' => 'nullable|min:10|max:50',
            'description_longue' => 'nullable|min:10|max:150',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required|min:1|max:100',
            'stock' => 'required|min:1|max:500',
            'note' => 'required|min:1|max:5',
            'gamme_id' => 'required'
        ]);
        // on donne un nom à l'image : timestamp en temps unix + extension
        $imageName = time() . '.' . $request->image->extension();

        //on déplace l'image dans public/images
        $request->image->move(public_path('images'), $imageName);

        Article::create($request->all());
        return redirect()->route('admin.index')->with('message', 'L\'article a bien été crée...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        return view('articles/show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $gammes = Gamme::all();
        return view('articles.edit', [
            'article' => $article,
            'gammes' => $gammes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => 'required|min:5|max:50',
            'description_courte' => 'nullable|min:10|max:50',
            'description_longue' => 'nullable|min:10|max:150',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required|min:1|max:100',
            'stock' => 'required|min:1|max:500',
            'note' => 'required|min:1|max:5',
            'gamme_id' => 'required'
        ]);
        // on donne un nom à l'image : timestamp en temps unix + extension
        $imageName = time() . '.' . $request->image->extension();

        //on déplace l'image dans public/images
        $request->image->move(public_path('images'), $imageName);

        $article->update($request->all());
        return redirect()->route('admin.index')->with('message', 'L\'article a bien été modifié...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.index')->with('message', 'L\'article a bien été supprimé...');
    }
}
