@extends('layouts.app')

@section('content')



    @if ($currentPromo)
    <div class="container text-center">
        <h1 class="currentPromoTitle">{{ $currentPromo->titre }}</h1>
        <h2 class="text-primary">-{{ $currentPromo->reduction }}% sur les articles liés</h2>
        <h3>du {{ date('d/m/y', strtotime($currentPromo->date_debut)) }} au
            {{ date('d/m/y', strtotime($currentPromo->date_fin)) }}</h3>
    </div>
    <hr>
    <div class="col-md-8 offset-2 text-center">
        <div class="row mb-5">

            @foreach ($currentPromo->articles as $article)
                <div class="card text-center" style="width: 18rem;">
                    <h3 class="card-title ">{{ $article->nom }}</h3>
                    <div class="card-body">
                        <img class="card-img" src="{{ asset("images/$article->image") }}" alt="article">
                        <p class="card-text">{{ $article->description_courte }}</p>
                        <p class="card-text text-danger font-weight-bold">-{{ $currentPromo->reduction }}%</p>
                        <h3 class="card-text font-weight-light"><del>{{ $article['prix'] }} €</del></h3>
                        <h3 class="card-text font-weight-light">
                            {{ intval($article['prix']) * (1 - intval($currentPromo->reduction) / 100) }} €</del></h3>

                        <a href="{{ route('article.show', $article) }}">
                            <input type="submit" class="btn btn-primary" value="Détails de l'article">
                        </a>

                        <form method="post" action="{{ route('panier.add', $article) }}"
                            class="form-inline d-inline-block">
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
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <a href="{{ route('campagne.index', $article) }}">
                    <input type="submit" class="btn btn-warning" value="Voir toutes les promotions">
                </a>
            </div>
        </div>
    </div>
@endif
<hr>
<div class="container text-center bg-primary">
    <div class="row justify-content-center">

        <h1><i class="fas fa-star"></i>Produits les mieux notés</h1>
    </div>

    <!-------------------------------------------LES ARTICLES LES MIEUX NOTES------------------------------------------------------------>


    <div class="container" id="les_mieux_notes">
        <div class="row">
            @foreach ($topArticles as $article)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" style="width: 18rem;" src="{{ asset("images/$article->image") }}"
                            alt="article">
                        <div class="card-body">

                            <h4 class="card-title font-weight-bold text-warning"><i
                                    class="text-warning fas fa-star mr-2 "></i>Note : {{ $article->note }} / 5</h4>
                            <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                            <p class="card-text font-italic">{{ $article->description }}</p>
                            @if (isset($article->campagnes[0]))
                                <h3 class="card-text text-danger font-weight-bold">
                                    {{ $article->campagnes[0]->titre }}</h3>
                                <p class="card-text text-danger font-weight-bold">
                                    {{ $article->campagnes[0]->reduction }}%</p>
                                <h3 class="card-text font-weight-light"><del>{{ $article['prix'] }} €</del></h3>
                                <h3 class="card-text text-danger font-weight-bold">
                                    {{ intval($article['prix']) * (1 - intval($article->campagnes[0]->reduction) / 100) }}
                                    €
                                </h3>
                            @else
                                <p class="card-text font-italic">{{ number_format($article->prix, 2, ',', ' ') }}€
                                </p>
                            @endif
                            <a href="{{ route('article.show', $article) }}">
                                <input type="submit" class="btn btn-primary" value="Détails de l'article">
                            </a>

                            <form method="post" action="{{ route('panier.add', $article) }}"
                                class="form-inline d-inline-block">
                                @csrf
                                <div class="row">
                                    <input type="number" id="quantite" class="form-control mx-auto mt-2"
                                        name="quantite" value="1">
                                </div>
                                <div class="row">
                                    <button class="btn btn-warning" name="ajouter_article" type="submit">+ Ajouter au
                                        panier</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


   
    @endsection
