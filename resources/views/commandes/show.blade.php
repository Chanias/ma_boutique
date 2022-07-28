@extends('layouts.app')

@section('title')
    Détails de la commande
@endsection

@section('content')
    <h2 class='pb-5 text-center'>Détails de la commande</h2>
        <div class="container text-center">
            <h3 class="DetailsCommandeTitle">Commande numéro : {{ $commande->numero }}</h3>
            <h2 class="text">{{ $commande->prix }} €</h2>
            <h3>du {{($commande->created_at) }} <h3>   
        </div>

        <div class="container">
            <div class="mb-3 text-center">
               
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom de l'article</th>
                            <th>Prix de l'article</th>
                            <th>Prix après réduction</th>
                            <th>Description</th>
                            <th>Quantité</th>
                            <th>Montant de la ligne</th>
                            <th>Détails de l'article</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($commande->articles as $article)
                       
                            <tr>
                                <td>{{ $article->nom }}</td>
                                <td>{{ $article->prix }} €</td>
                                <td>{{ intval($article['prix']) - (intval($article->pivot->reduction) ) }}</td>
                                 <td>{{ $article->description_courte }} </td>
                                <td>{{ $article->pivot->quantite }}</td> 
                                <td>{{ intval($article['prix']) * (intval($article->pivot->quantite)) }}  €</td>
                                <td><a href="{{ route('article.show', $article) }}">
                                    <input type="submit" class="btn btn-warning" value="Détails">
                                </a></td>
                            </tr>
                    </tbody>
                    @endforeach
                   
               </table>
                        <h3>Frais de port:</h3>
    @endsection
  
       

