@extends('layouts.app')

@section('title')
    Catalogue - Laravel Online Store
@endsection

@section('content')

    <h2 class='pb-5 text-center'>Catalogue</h3>

        <div class="container">
            <div class="row">

                @foreach ($articles as $article)
                    <div class="card text-center col-md-4 col-lg-3 p-3 m-3\" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset("images/$article->image") }}" alt="article">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                            <p class="card-text font-italic">{{ $article->description }}</p>

                            @if (in_array($article->id, $campagnesArticlesIds))

                                @php $campagne = GetCampaign($article->id) @endphp

                                @if ($campagne)

                                    <p class="card-text text-danger font-weight-bold">{{ $campagne->nom }} :
                                        -{{ $campagne->reduction }}%</p>
                                    <h5 class="card-text font-weight-light"><del>{{ $article->prix }} €</del>
                                        <span class="text-danger font-weight-bold">
                                            @php
                                                $newPrice = $article->prix - $article->prix * ($campagne->reduction / 100);
                                                echo number_format($newPrice, 2);
                                            @endphp
                                            €</span>
                                    </h5>

                                @else
                                    <h5 class="card-text font-weight-light">{{ $article->prix }} €</h5>
                                @endif

                            @else
                                <h5 class="card-text font-weight-light">{{ $article->prix }} €</h5>
                            @endif

                            <a href="{{ route('articles.show', $article) }}">
                                <button class="btn btn-info m-2">Détails produit</button>
                            </a>