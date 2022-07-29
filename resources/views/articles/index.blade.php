@extends('layouts.app')

@section('title')
    Catalogue
@endsection

@section('content')
    <h2 class='pb-5 text-center'>Catalogue</h3>

        <div class="container-fluid" id="catalogue">
            <div class="row">

                @foreach ($articles as $article)
                    <div class="card text-center col-md-4 col-lg-3 p-3 m-3\" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset("images/$article->image") }}" alt="article">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                            <p class="card-text font-italic">{{ $article->description_courte }}</p>

                            @if (isset($article->campagnes[0]))
                                <h3 class="card-text text-danger font-weight-bold">{{ $article->campagnes[0]->titre }}</h3>
                                <p class="card-text text-danger font-weight-bold">{{ $article->campagnes[0]->reduction }}%
                                </p>
                                <h3 class="card-text font-weight-light"><del>{{ $article['prix'] }} €</del></h3>
                                <h3 class="card-text text-danger font-weight-bold">
                                    {{ floatval($article['prix']) * (1 - intval($article->campagnes[0]->reduction) / 100) }}
                                    €</del>
                                </h3>
                            @else
                                <p class="card-text font-italic">{{ $article->prix }}€</p>
                            @endif
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
    @endsection
