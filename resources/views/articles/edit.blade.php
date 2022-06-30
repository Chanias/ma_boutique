@extends('layouts.app')

@section('title')
    MOFIFICATION DES ARTICLES
@endsection

@section('content')

<div class="Container">
    <div class="row text-center md-6 mx-auto">
        <div class="col-md-12">
            <h2>Modifier un article</h2>
        </div>
    </div>

    @if (isset($article))
        <form method="POST" action="{{ route('article.update', $article) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row text-center">
                <div class="field">
                    <div class="col-md-6 mx-auto">
                        <label for="label" class="mt-3 fs-4">Nouveau nom :</label>
                        <div class="control">
                            <input class="input" id="content" type="text" name="nom"
                                value="{{ $article->nom }}">
                        </div>
                        @if ($errors->has('nom'))
                            <p class="help is-danger">{{ $errors->first('nom') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="field">
                    <div class="col-md-6 mx-auto">
                        <label for="label" class="mt-3 fs-4">Nouvelle description courte :</label>
                        <div class="control">
                            <input class="input" id="content" type="text" name="description_courte"
                                value="{{ $article->description_courte }}">
                        </div>
                        @if ($errors->has('description_courte'))
                            <p class="help is-danger">{{ $errors->first('description_courte') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row text-center" id="image">
                <div class="col-md-6 mx-auto">
                    <label for="image" class="fs-4 mt-3">Image : </label>
                    <input type="file" name="image" class="form-control ">
                </div>
            </div>

            <div class="row text-center">
                <div class="field">
                    <div class="col-md-6 mx-auto">
                        <label for="label" class="mt-3 fs-4">Prix :</label>
                        <div class="control">
                            <input class="input" id="content" type="text" name="prix"
                                value="{{ $article->prix }}">
                        </div>
                        @if ($errors->has('prix'))
                            <p class="help is-danger">{{ $errors->first('prix') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="field">
                    <div class="col-md-6 mx-auto">
                        <label for="label" class="mt-3 fs-4">Stock :</label>
                        <div class="control">
                            <input class="input" id="content" type="text" name="stock"
                                value="{{ $article->stock }}">
                        </div>
                        @if ($errors->has('stock'))
                            <p class="help is-danger">{{ $errors->first('stock') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="field">
                    <div class="col-md-6 mx-auto">
                        <label for="label" class="mt-3 fs-4">Note :</label>
                        <div class="control">
                            <input class="input" id="content" type="text" name="note"
                                value="{{ $article->note }}">
                        </div>
                        @if ($errors->has('note'))
                            <p class="help is-danger">{{ $errors->first('note') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="label">Gamme</label>
                <select name="gamme_id" id="game_id">
                    <option values="">--Choississez une gamme--</option>
                    @foreach ($gammes as $gamme)
                        <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field text-center">
                <div class="control">
                    <button type="submit" class="btn btn-success">
                        {{ __('Modifier article') }}
                    </button>
                </div>
            </div>
        </form>
     @endif
</div>

@endsection