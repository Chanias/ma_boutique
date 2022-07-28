@extends('layouts.app')

@section('title')
    Campagnes
@endsection

@section('content')
    <h2 class='pb-5 text-center'>Nos campagnes promotionnelles</h3>
        <div class="container">
            <div class="row">
                @foreach ($campagnes as $campagne)
    
                    <div class="container p-5 border border-info">
                        <div class="row p-5 justify-content-center">
                            <h2 class="text-primary text-center">{{ $campagne->titre }}</h2>
                            <p class="card-text text-center font-bold">Du {{ $campagne->date_debut }} au {{ $campagne->date_fin }}</p>
                            <h3 class="text-success text-center">-{{ $campagne->reduction }}% sur les articles liés</h3>
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach ($campagne->articles as $article)
                                    <div class="card text-center col-md-4 col-lg-3 p-3 m-3\" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset("images/$article->image") }}" alt="article">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                                            <p class="card-text font-italic">{{ $article->description }}</p>
    
                                            @if (isset($article->campagnes[0]))
                                            <h3 class="card-text font-weight-light"><del>{{ $article['prix'] }} €</del></h3>
                                            <h3 class="card-text text-danger font-weight-bold">
                                                {{ intval($article['prix']) * (1 - intval($article->campagnes[0]->reduction) / 100) }}
                                                €</del>
                                            </h3>
                                        @else
                                            <p class="card-text font-italic">{{ $article->prix }}€</p>
                                        @endif
    
                                            <a href="{{ route('article.show', $article) }}">
                                                <button class="btn btn-info m-2">Détails produit</button>
                                            </a>
    
                                        </div>   
                                    </div>
                                @endforeach
                            
                        </div>
                    </div>
                </div>
                    @endforeach 
                   
                  
            </div>
    @endsection

  