@extends('layouts.app')

@section('title')
    Détails de l'article
@endsection

@section('content')
    <h2 class='pb-5 text-center'>Détails de l'article</h3>
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <h5 class="card-title text-center font-weight-bold">{{ $article->nom }}</h5>
                    <img class="card-img-top" style="width: 18rem" src="{{ asset("images/$article->image") }}" alt="article">
                </div>

                <div class="col-md-6">
                    <p class="card-text font-italic">{{ $article->description_courte }}</p>
                    <p class="card-text font-italic">{{ $article->description_longue }}</p>

                    @if (isset($article->campagnes[0]))
                        <h3 class="card-text text-danger font-weight-bold">
                            {{ $article->campagnes[0]->titre }}</h3>
                        <p class="card-text text-danger font-weight-bold">
                            {{ $article->campagnes[0]->reduction }}%</p>
                        <h3 class="card-text font-weight-light"><del>Prix avant promo:{{ $article['prix'] }} €</del></h3>
                        <h3 class="card-text text-danger font-weight-bold">
                            {{ intval($article['prix']) * (1 - intval($article->campagnes[0]->reduction) / 100) }}
                            €
                        </h3>
                    @else
                        <p class="card-text font-italic">Prix :{{ number_format($article->prix, 2, ',', ' ') }}€</p>
                    @endif

                    <p class="card-text font-italic"><i class="fa-solid fa-box-open"></i>En stock : {{ $article->stock }}
                    </p>
                    <p class="card-text font-italic">Note : {{ $article->note }}</p>



                    <form method="post" action="{{ route('panier.add', $article) }}" class="form-inline d-inline-block">
                        @csrf
                        <div class="row">
                            <input type="number" id="quantite" class="form-control mx-auto mt-2" name="quantite"
                                value="1">
                        </div>
                        <div class="row">
                            <button class="btn btn-warning" name="ajouter_article" type="submit">+ Ajouter au
                                panier</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    @endsection
