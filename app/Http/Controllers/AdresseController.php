<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;

class AdresseController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
