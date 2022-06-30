@extends('layouts.app')

@section('content')
    @if ($currentPromo)
        <div class="container text-center">
            <h1 class="currentPromoTitle">{{ $currentPromo->titre }}</h1>
            <h2 class="text-primary">-{{ $currentPromo->reduction }}% sur les articles liés</h2>
            <h3>du {{ date('d/m', strtotime($currentPromo->date_debut)) }} au
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
                            {{-- <h3 class="card-text font-weight-light"><del>{{ $article->prix/50}} €</del></h3> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    @endif
@endsection
