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
                {{-- <p class="card-text text-danger font-weight-bold">-{{ $currentPromo->reduction }}%</p> --}}
                <h3 class="card-text font-weight-light">Prix : {{ $article['prix'] }} €</del></h3>
                {{--<h3 class="card-text font-weight-light">{{intval($article['prix']) * (1 - intval($currentPromo->reduction)/100)}} €</del></h3> --}}
                <p class="card-text font-italic"><i class="fa-solid fa-box-open"></i>En stock : {{ $article->stock }}</p>
               <p class="card-text font-italic">Note : {{ $article->note }}</p> 

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
      </div>
    @endsection
  
       

