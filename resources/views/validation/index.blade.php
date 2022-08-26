@extends('layouts.app')

@section('title')
    Validation panier
@endsection

@section('content')

    <div class="container">

        @if (session()->has('panier'))
            <h1 class="text-center">Validation du panier</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark bg-dark text-center text-light">
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <!-- On parcourt les articles du panier en session : session('panier') -->
                        @php $prixTotal=0 @endphp
                        @foreach (session()->get('panier') as $article)
                            <tr>
                                <td>{{ $article->nom }} </td>

                                @if ($article->campagne)
                                    <td>{{ $article->campagne->titre }}: -{{ $article->campagne->reduction }}%
                                        <br><del>{{ $article['prix'] }} €</del>
                                        {{ number_format(floatval($article['prix']) * (1 - intval($article->campagne->reduction) / 100), 2, ',', ' ') }}
                                        €
                                    </td>
                                @else
                                    <td>{{ $article->prix }} €</td>
                                @endif

                                <td>{{ $article['quantite'] }}</td>
                                @php $article['prix']=str_replace(',','.',$article['prix']) @endphp
                                {{-- On écrase le string du prix en remplpacement la , par 1 . --}}
                                @if ($article->campagne) <!-- Prix total de la ligne -->
                                     <td>{{number_format($totalLigne = floatval($article['prix']) * (1 - intval($article->campagne->reduction) / 100) * intval($article['quantite']), 2, ',', ' ') }}€
                                     </td>
                                 @else
                                     <td>{{number_format($totalLigne = floatval($article['prix']) * intval($article['quantite']), 2, ',', ' ') }}</td>
                                 @endif

                                @php $prixTotal+=$totalLigne @endphp
                        @endforeach
                        </tr>
                    </tbody>

                    <td>Total du panier : </td>

                    <td></td>
                    <td></td>
                    <td> @php echo number_format($prixTotal, 2, ',', ' '); @endphp €</td>
                    
                </table>

            </div>
        @endif
        <!----------------------------------------MODIFIER MES INFORMATIONS-------------------------------------------------------->

        <div class="container">
            <div class="col-md-12">
                <h4 class="text-center p-4">Mes informations</h4>
                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <form class="col-12 mx-auto p-5 border " action="{{ route('compte.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="nom" class="form-control" name="nom" value="{{ $user->nom }}"
                                    id="nom">
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="prenom" class="form-control" name="prenom" value="{{ $user->prenom }}"
                                    id="prenom">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    id="email">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!----------------------------------------MODIFIER MON ADRESSE-------------------------------------------------------->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2 text-center">
                    <h4 class="text-center p-4">Modifier mon adresse</h4>
                    <form class="col-12 mx-auto p-5 border " action="{{ route('adresse.update', $user->adresse) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="adresse" class="form-control" name="adresse" value="{{ $user->adresse->adresse }}"
                                id="adresse">
                        </div>

                        <div class="form-group">
                            <label for="code_postal">Code postal</label>
                            <input type="text" class="form-control" name="code_postal"
                                value="{{ $user->adresse->code_postal }}" id="code_postal">
                        </div>

                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" name="ville" value="{{ $user->adresse->ville }}"
                                id="ville">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>


        <!----------------------------------------TYPE DE LIVRAISON-------------------------------------------------------->
        <div class="container">
            <form method="post" action="{{ route('validation.choixLivraison') }}">
                @csrf
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h3>Type de livraison</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="livraison" id="classique" value="classique"
                                @if (session()->has('livraison') && session()->get('livraison') == 'classique') checked @endif>
                            <label class="form-check-label" for="classique">
                                Classique (à domicile - en 48H) : 5€
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="livraison" id="express" value="express"
                                @if (session()->has('livraison') && session()->get('livraison') == 'express') checked @endif>
                            <label class="form-check-label" for="express">
                                Express (à domicile - en 24H) : 9,90€
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="livraison" id="relais" value="relais"
                                @if (session()->has('livraison') && session()->get('livraison') == 'relais') checked @endif>
                            <label class="form-check-label" for="relais">
                                En point-relais (48H) : 4€
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="prixTotal" value="{{ $prixTotal }}">

                    <button type="submit" class="btn btn-primary" id="validation">Valider</button>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="row text-center">
                @if (session()->has('livraison'))
                <p>Prix total de la commande après frais de port: @php echo session()->get('prixTotal') @endphp €.</p>
                    <a href="{{ route('commande.store') }}">
                        @csrf
                        <button class="btn btn-success">Validation de la commande</button> </a>                       
                @else
                    <p>Choississez un mode de livraison pour connaître le total !</p>
                @endif
            </div>
        </div>

    @endsection
