<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'adresse' => 'required|min:3|max:50',
            'code_postal' => 'required|min:5|max:5',
            'ville' => 'required|min:3|max:50',
        ]);
        Adresse::create($request->all());
        return redirect()->back()->with('message', 'Adresse enregistrée !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Adresse $adresse)
    {
        $request->validate([
            'adresse' => 'required|min:3|max:50',
            'code_postal' => 'required|min:3|max:50',
            'ville' => 'required|min:3|max:50',
        ]);

        $adresse->update([
            'adresse' => $request->input('adresse'),
            'code_postal' => $request->input('code_postal'),
            'ville' => $request->input('ville'),
        ]);

        return redirect()->back()->with('message', 'L\'adresse a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adresse)
    {
        $adresse->delete();
        return redirect()->back()->with('message', 'L\'adresse a bien été supprimée');
    }
}
