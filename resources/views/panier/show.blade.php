 @extends('layouts.app')

 @section('title')
     Panier
 @endsection

 @section('content')
     <div class="container">

         @if (session()->has('panier'))
             <h1>Mon panier</h1>
             <div class="table-responsive shadow mb-3">
                 <table class="table table-bordered table-hover bg-white mb-0">
                     <thead class="thead-dark bg-dark text-center text-light">
                         <tr>
                             <th>Produit</th>
                             <th>Prix</th>
                             <th>Quantité</th>
                             <th>Total</th>
                             <th>Opérations</th>
                         </tr>
                     </thead>
                     <tbody class="text-center">
                         <!-- On parcourt les articles du panier en session : session('panier') -->
                         @foreach (session()->get('panier') as $article)
                             <tr>
                                 <td>{{ $article->nom }} <a href="{{ route('article.show', $article) }}">
                                         <input type="submit" class="btn btn-primary" value="Détails de l'article">
                                     </a></td>
                                 {{-- @if ($article->campagne)
                                 <td>{{$article->campagne->titre}}:{{$article->campagne->reduction}}%</td>
                                 <td><del>{{ $article['prix'] }} €</del>  {{ intval($article['prix']) * (1 - intval($article->campagnes->reduction) / 100) }}
                                    €</td>
                                 @else --}}
                                     <td>{{ $article->prix }} €</td>
                                
                                 <td>
                                     <!-- Le Lien pour le changement de quantité de l'article -->
                                     <form method="post" action="{{ route('panier.modifierQuantite', $article->id) }}">
                                         <input type="number" id="quantite" class="form-control" name="quantite"
                                             value="{{ $article['quantite'] }}">
                                         @csrf
                                         <button class="btn btn-warning" name="modifier_quantite" type="submit">Modifier
                                             quantité</button>
                                     </form>

                                 </td>

                                 <td>{{ intval($article['prix']) * intval($article['quantite']) }}€</td>
                                 <td>
                                     <!-- Le Lien pour retirer un produit du panier -->
                                     <a class="btn btn-danger" href="{{ route('panier.remove', $article->id) }}"
                                         title="Retirer la ligne de l'article">Supprimer l'article</a>
                                 </td>
                         @endforeach

                         </tr>
                     </tbody>
                 </table>

             </div>

             <!-- Lien pour vider le panier -->
             <a class="btn btn-danger text-center" href="{{ route('panier.empty') }}"
                 title="Retirer tous les produits du panier">Vider
                 le
                 panier</a>
             <a class="btn btn-success text-center" href="{{ route('validation.index') }}"
                 title="Aller sur la validation panier">Valider la commande</a>
         @else
             <div class="alert alert-info">Aucun produit au panier</div>


     </div>
     @endif

 @endsection
