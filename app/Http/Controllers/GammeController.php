<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gamme;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gammes = Gamme::with('articles')->get();
        return view('gammes/index', [
            'gammes' => $gammes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gamme $gamme)
    {
        $request->validate([
            'nom'=> 'required|min:5|max:50',
        ]);

        $gamme->create($request->all());
        return redirect()->route('admin.index')->with('message', 'La gamme a bien été créée...');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gamme $gamme)
    {
        return view('gammes.edit', compact('gamme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Gamme $gamme)
    {
        $request->validate([
            'nom'=> 'required|min:5|max:50',
           
        ]);

        $gamme->update($request->all());
        return redirect()->route('admin.index')->with('message', 'La gamme a bien été modifié...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->delete();
        return redirect()->route('admin.index')->with('message', 'La gamme a bien été supprimé...');
    }
}
