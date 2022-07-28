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
                                <td>{{ $article->nom }} <a href="{{ route('article.show', $article) }}">
                                        <input type="submit" class="btn btn-primary" value="Détails de l'article">
                                    </a></td>
                                <td>{{ $article->prix }} €</td>

                                <td>{{ $article['quantite'] }}</td>
                                @php $article['prix']=str_replace(',','.',$article['prix']) @endphp
                                {{-- On écrase le string du prix en remplpacement la , par 1 . --}}
                                <td> @php echo $lineTotal = floatval($article['prix']) * intval($article['quantite']) @endphp </td>
                       @php $prixTotal += $lineTotal @endphp
                                @endforeach
                        </tr>
                    </tbody>

                    <td>Total du panier : </td>

                    <td></td>
                    <td></td>
                    <td> @php echo number_format($prixTotal, 2, ',', ' ')
                    @endphp</td>
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

        <!----------------------------------------TYPE DE LIVRAISON-------------------------------------------------------->
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <h3>Type de livraison</h3>
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                    <label class="form-check-label" for="exampleRadios1">
                        Classique (à domicile - en 48H) : 5€
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Express (à domicile - en 24H) : 9,90€
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                    <label class="form-check-label" for="exampleRadios3">
                        En point-relais (48H) : 4€
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
        <div class="container">
            <div class="row text-center">


                <p>Choississez un mode de livraison pour connaître le total !</p>
            </div>
        </div>
    @endsection
