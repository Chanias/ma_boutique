@extends('layouts.app')

@section('title')
    MOFIFICATION DES CAMPAGNES
@endsection

@section('content')

    <div class="container">
        <div class="row text-center md-6 mx-auto">
            <div class="col-md-12">
                <h2>Modifier une campagne</h2>
            </div>
        </div>

        @if (isset($campagne))
            <form method="POST" action="{{ route('campagne.update', $campagne) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row text-center">
                    <div class="field">
                        <div class="col-md-6 mx-auto">
                            <label for="label" class="mt-3 fs-4">Nouveau nom de la campagne :</label>
                            <div class="control">
                                <input class="input" id="content" type="text" name="titre"
                                    value="{{ $campagne->titre }}">
                            </div>
                            @if ($errors->has('titre'))
                                <p class="help is-danger">{{ $errors->first('titre') }}</p>
                            @endif
                        </div>

                        <div class="col-md-6 mx-auto">
                            <label for="label" class="mt-3 fs-4">Date de début :</label>
                            <div class="control">
                                <input class="input" id="content" type="text" name="date_debut"
                                    value="{{ $campagne->date_debut }}">
                            </div>
                            @if ($errors->has('date_debut'))
                                <p class="help is-danger">{{ $errors->first('date_debut') }}</p>
                            @endif
                        </div>

                        <div class="col-md-6 mx-auto">
                            <label for="label" class="mt-3 fs-4">Date de fin :</label>
                            <div class="control">
                                <input class="input" id="content" type="text" name="date_fin"
                                    value="{{ $campagne->date_fin }}">
                            </div>
                            @if ($errors->has('date_fin'))
                                <p class="help is-danger">{{ $errors->first('date_fin') }}</p>
                            @endif
                        </div>

                        <div class="col-md-6 mx-auto">
                            <label for="label" class="mt-3 fs-4">Réduction :</label>
                            <div class="control">
                                <input class="input" id="content" type="text" name="reduction"
                                    value="{{ $campagne->reduction }}">
                            </div>
                            @if ($errors->has('reduction'))
                                <p class="help is-danger">{{ $errors->first('reduction') }}</p>
                            @endif
                        </div>

                        @foreach ($articles as $article)

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="article{{ $article->id }}"
                                value="{{ $article->id }}" id="article{{ $article->id }}"
    
                                @foreach ($campagneArticlesId as $id) 
                                    @if ($article->id == $id->article_id)
                                        checked
                                        @break 
                                    @endIf
                                @endforeach>
    
                            <label class="custom-control-label" for="article{{ $article->id }}">{{ $article->nom }}</label>
                        </div>
                    @endforeach

                    </div>
                </div>

                <div class="field text-center">
                    <div class="control">
                        <button type="submit" class="btn btn-success">
                            {{ __('Modifier la gamme') }}
                        </button>
                    </div>
                </div>

            </form>
        @endif
    </div>




@endsection
