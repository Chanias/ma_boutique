@extends('layouts.app')

@section('title')
    A propos
@endsection

@section('content')
    @foreach ($user->favoris as $article)
        <div class="card text-center col-md-4 col-lg-3 p-3 m-3\" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset("images/$article->image") }}" alt="article">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                <p class="card-text font-italic">{{ $article->description }}</p>
            </div>
        </div>
    @endforeach
@endsection
