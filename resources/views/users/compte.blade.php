@extends('layouts/app')

@section('title')
    Mon compte
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center p-2">Mon compte</h1>
        <h4 class="text-center p-3">Bienvenue {{ $user->nom }} {{ $user->prenom }} ! </h4>
        <div class="row">

            <div class="col-md-6">

                <h4 class="text-center p-4">Mes informations</h4>

                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <form class="col-12 mx-auto p-5 border " action="{{ route('compte.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="nom" value="{{ $user->nom }}" id="email">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="nom" class="form-control" name="nom" value="{{ $user->nom }}"
                                    id="nom">
                            </div>

                            <input type="hidden" name="prenom" value="{{ $user->prenom }}" id="email">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="prenom" class="form-control" name="prenom" value="{{ $user->prenom }}"
                                    id="prenom">
                            </div>

                            <input type="hidden" name="email" value="{{ $user->email }}" id="email">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    id="email">
                            </div>

                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <h4 class="text-center p-4">Modifier mon mot de passe</h4>

                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <form class="col-12 mx-auto p-5 border " action="{{ route('compte.updatePassword') }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group ">
                                <label class="label">Mot de passe actuel</label>
                                <div class="control">
                                    <input class="form-control" type="password" name="password">
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="label">Nouveau mot de passe</label>
                                <div class="control">
                                    <input class="form-control" type="password" name="newPassword">
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="label">Confirmez le mot de passe</label>
                                <div class="control">
                                    <input class="form-control" type="password" name="newPassword_confirmation">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                                @if ($errors->has('password_error'))
                                    <p class="help is-danger">{{ $errors->first('password_error') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------------------MODIFIER MON ADRESSE-------------------------------------------------------->

    <div class="row">
        <div class="col-md-8 offset-2 text-center">
            <h4 class="text-center p-4">Modifier mon adresse</h4>
            <form class="col-12 mx-auto p-5 border " action="{{ route('adresse.update', $user->adresse) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="adresse">adresse</label>
                    <input type="adresse" class="form-control" name="adresse" value="{{ $user->adresse->adresse }}"
                        id="adresse">
                </div>

                <div class="form-group">
                    <label for="code_postal">code_postal</label>
                    <input type="text" class="form-control" name="code_postal" value="{{ $user->adresse->code_postal }}"
                        id="code_postal">
                </div>

                <div class="form-group">
                    <label for="ville">ville</label>
                    <input type="text" class="form-control" name="ville" value="{{ $user->adresse->ville }}"
                        id="ville">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>

  



    <!--AFFICHAGE DES COMMANDES-->
    <div class="container">
        <div class="mb-3 text-center">
            <!-- On parcourt la liste des commandes -->
            <h2>La liste des commandes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Numéro de commande</th>
                        <th>Prix de la commande</th>
                        <th>Date de la commande</th>
                        <th>Détails de la commande</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user->commandes as $commande)
                        <tr>
                            <td>{{ $commande->numero }}</td>
                            <td>{{ $commande->prix }} €</td>
                            <td>{{ $commande->created_at }}</td>
                            <td><a href="{{ route('commande.show', $commande) }}">
                                <input type="submit" class="btn btn-warning" value="Détails">
                            </a></td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <div class="container" id="supprimerCompte">
        <div class="row">
            <div class="col-12 text-center">
                <h4>supprimer mon compte</h4>
            </div>
            <div class="col-12 text-center">
                <form class="section" action="{{ route('user.destroy') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="supprimer">
                </form>
            </div>
        </div>
    </div>
@endsection
