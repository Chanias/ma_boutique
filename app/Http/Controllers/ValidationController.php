<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user =  Auth::user();
        // Montrer la page de validation du panier
        return view('validation.index', compact('user'));
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
    public function choixLivraison(Request $request)
    {

        $prixTotal = $request->input('prixTotal');

        $livraison = $request->input('livraison');

        session()->put('livraison', $livraison); // pour stocker le choix de livraison dans la session

        if ($livraison == 'classique') {
            $prixTotal += 5;
        } elseif ($livraison == 'express') {
            $prixTotal += 9.90;
        } else {
            $prixTotal += 4;
        }
        session()->put('prixTotal',$prixTotal);
        return back()->withMessage("Livraison validée par le site");
    }
}
