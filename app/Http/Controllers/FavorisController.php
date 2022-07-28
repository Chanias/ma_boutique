<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user =  Auth::user(); // charger les favoris dans l'index
        // return view('favoris/index', [
        //     'user' => $user
        // ]);
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
    public function store(Request $request)
    {
        // $articleId = $request->input('articleId'); // on doit récupérer les id des articles : + simple pour code comme pour le panier
        // $user =  Auth::user();
        // $user->favoris()->attach($articleId); // attach = insert into ... On insert dans la table Favoris les id des articles 
        // return redirect()->back()->with('message', 'L\'article a été ajouté aux favoris ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy()
    {
        // $favoris->delete();
        // return redirect()->route('admin.index')->with('message', 'La campagne a bien été supprimé...');
    }
}
