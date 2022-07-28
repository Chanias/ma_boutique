@extends('layouts.app')

@section('title')
    Gammes
@endsection

@section('content')
    <h2 class='pb-5 text-center'>Nos gammes</h3>

        <div class="container">
            <div class="row">
    
                @foreach ($gammes as $gamme)
    
                    <div class="container p-5 border border-info">
                        <div class="row p-5 justify-content-center">
                            <h2 class="text-primary text-center">{{ $gamme->nom }}</h2>
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach ($gamme->articles as $article)
                                    <div class="card text-center col-md-4 col-lg-3 p-3 m-3\" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset("images/$article->image") }}" alt="article">
                                        <div class="card-body">
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
                                                €</del>
                                            </h3>
                                        @else
                                            <p class="card-text font-italic">{{ $article->prix }}€</p>
                                        @endif
    
                                            <a href="{{ route('article.show', $article) }}">
                                                <button class="btn btn-info m-2">Détails produit</button>
                                            </a>
                                            <div class="row">
                                                <input type="number" id="typeNumber" class="form-control mx-auto mt-2" name="quantite"
                                                    value="1">
                                            </div>
                                          
                                             <form method="post" action="{{ route('panier.add',$article) }}" class="form-inline d-inline-block"> 
                                                @csrf
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
                </div>
                    @endforeach 
                   
                  
            </div>
    @endsection
