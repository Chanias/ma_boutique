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
            <div class="row">
                <div class="col-md-8 offset-2 text-center">
                    <h4 class="text-center p-4">Modifier mon adresse</h4>

                    <form class="col-12 mx-auto p-5 border " action="{{ route('compte.updatePassword') }}" method="POST">

                        @csrf
                        @method('PUT')

                        <input type="hidden" name="adresse" value="{{ $user->adresse }}" id="adresse">
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" name="adresse" value="{{ $user->adresse }}"
                                id="adresse">
                        </div>

                        <input type="hidden" name="code_postal" value="{{ $user->code_postal }}" id="code_postal">
                        <div class="form-group">
                            <label for="code_postal">Code postal</label>
                            <input type="text" class="form-control" name="code_postal" value="{{ $user->adresse }}"
                                id="code_postal">
                        </div>

                        <input type="hidden" name="ville" value="{{ $user->ville }}" id="ville">
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" name="ville" value="{{ $user->ville }}" id="ville">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 text-center">
            <h4>supprimer mon compte</h4>
                      
           
            </div>
        </div>

    </div>
@endsection
