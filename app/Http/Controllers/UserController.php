<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Str;

use Illuminate\Validation\Rules\Password;
use App\Models\Commande;
use App\Models\User;
use App\Models\Adresse;

class UserController extends Controller
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
    public function store(Request $request, User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function compte()
    {
        $user =  Auth::user();
        $user->load('adresse', 'commandes');
        return view(
            'users.compte',
            ['user' => $user]

        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|min:3|max:50',
            'prenom' => 'nullable|min:3|max:50',
            'email' => 'nullable|min:10|max:50',
        ]);

        $user =  Auth::user();

        $user->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('message', 'Le profil a bien été modifié');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            // 'token' => 'required',
            'password' => 'required',    //mot de passe actuel
            'new_password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()]
        ]);

        $user = Auth::user();
        //  $user->password = $request['token'];
        if (!Hash::check($request['password'], $user->password)) { // si mdp et different du mdp acuel alors erreur sinon on continue dans le else

            return redirect()->back()->withErrors(['erreur' => 'erreur mot de passe actuel']);
        } else {

            if ($request['password'] == $request['newPassword']) { // si mdp et pareille que le nouveau mdp  alors erreur sinon on continue dans le else

                return redirect()->back()->withErrors(['erreur' => 'le mot de passe actuel et identique au nouveau mot de passe']);
            } else

                $user->password = Hash::make($request['newPassword']);
            $user->save();
            // ->setRememberToken(Str::random(60));
            return redirect()->route('compte')->with('message', 'Le mot de passe a bien été modifié');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('home')->with('message', 'Le compte a bien été supprimé');
    }
}
