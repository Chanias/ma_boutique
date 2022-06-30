@extends('layouts.app')

@section('title')
    INTERFACE ADMINISTRATEUR
@endsection

@section('content')
    <script>
        function showElement(id) {
            let element = document.getElementById(id)
            if (element.style.display == 'block') {
                element.style.display = 'none'
            } else {
                element.style.display = 'block'
            }
        }
    </script>

    <div class="container text-center">
        <div class="row text-center">
            <h2 class="mb-4">Bienvenue sur le back office</h2>
        </div>
        <button class="btn btn-primary btn-lg" onclick="showElement('creer_article')">Créer un article</button>
        <button class="btn btn-primary btn-lg" onclick="showElement('creer_gamme')">Créer une gamme</button>
        <button class="btn btn-primary btn-lg" onclick="showElement('creer_campagne')">Créer une campagne</button>
    </div>

    <div class="container text-center">
        <button class="btn btn-primary btn-lg" onclick="showElement('liste_article')">Liste des articles</button>
        <button class="btn btn-primary btn-lg" onclick="showElement('liste_gamme')">Liste des gammes</button>
        <button class="btn btn-primary btn-lg" onclick="showElement('liste_campagne')">Liste des campagnes</button>
        <button class="btn btn-primary btn-lg" onclick="showElement('liste_utilisateur')">Liste des utilisateurs</button>
    </div>



    <div class="container" id="creer_article" style="display: none">
        <div class="row text-center">
            <div class="col-md-10 text-center">
                <!-------------------------------------------CREER UN ARTICLE--------------------------------------------------------->
                <h3>Créer un article</h3>
            </div>

            <div class="row">
                <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label class="label">Nom</label>
                        <div class="control">
                            <input class="input" type="text" name="nom">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="label">Description courte</label>
                        <div class="control">
                            <input class="input" type="text" name="description_courte">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="label">Description longue</label>
                        <div class="control">
                            <textarea name="description_longue" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 mx-auto">
                        <label for="image" class="fs-4 mt-3">Image : </label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3 row">
                        <label class="label">Prix</label>
                        <div class="control">
                            <input class="input" type="text" name="prix">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="label">Stock</label>
                        <div class="control">
                            <input class="input" type="number" name="stock">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="label">Note</label>
                        <div class="control">
                            <input class="input" type="number" name="note">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="label">Gamme</label>
                        <select name="gamme_id" id="game_id">
                            <option values="">--Choississez une gamme--</option>
                            @foreach ($gammes as $gamme)
                                <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="field">
                        <div class="control">
                            <button class="btn btn-success" type="submit">Valider</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!------------------------------------------------LISTE DES ARTICLES------------------------------------->
    <div class="container" id="liste_article" style="display: none">
        <div class="mb-3">
            <!-- On parcourt la liste des articles -->
            <h2>La liste des articles</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Note</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->nom }}</td>
                            <td>{{ $article->description_courte }}</td>
                            <td><img class="w-25" src="{{ asset("images/$article->image") }}"></td>
                            <td>{{ $article->prix }}</td>
                            <td>{{ $article->stock }}</td>
                            <td>{{ $article->note }}</td>

                            <td>
                                <!--LIEN POUR ALLER SUR LA VIEW MODIFIER L'ARTICLE-->
                                <a href="{{ route('article.edit', $article) }}">
                                    <button class="btn btn-success">Modifier article</button>
                                </a>
                            </td>
                            <!--SUPPRIMER L'ARTICLE-->
                            <form method="POST" action="{{ route('article.destroy', $article) }}">
                                <!-- CSRF token -->
                                @csrf
                                @method('DELETE')
                                <td>
                                    <input type="submit" class="btn btn-danger" value="Supprimer article">
                                </td>
                            </form>

                        </tr>
                </tbody>
                @endforeach
            </table>

        </div>
    </div>


    <!-----------------------------------------CREER UNE GAMME--------------------------------------------->
    <div class="container" id="creer_gamme" style="display: none">
        <div class="row text-center">
            <div class="col-md-10">
                <h3>Créer une gamme</h3>
            </div>

            <div class="row">
                <form action="{{ route('gamme.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label class="label">Nom</label>
                        <div class="control">
                            <input class="input" type="text" name="nom">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="btn btn-success" type="submit">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---------------------------------------LISTE DES GAMMES----------------------------------------------------->
    <div class="container" id="liste_gamme" style="display: none">
        <div class="mb-3">
            <!-- On parcourt la liste des gammes -->
            <h2>La liste des gammes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($gammes as $gamme)
                        <tr>
                            <td>{{ $gamme->id }}</td>
                            <td>{{ $gamme->nom }}</td>
                            {{-- <td><img class="w-25" src="{{ asset("images/$article->image") }}"></td> --}}

                            <!--LIEN POUR ALLER SUR LA VIEW MODIFIER L'ARTICLE-->
                            <form method="put" action="{{ route('gamme.edit', $gamme) }}">
                                <td>
                                    <input type="submit" class="btn btn-success" value="Modifier gamme">
                                </td>
                            </form>

                            <!--SUPPRIMER L'ARTICLE-->
                            <form method="POST" action="{{ route('gamme.destroy', $gamme) }}">
                                <!-- CSRF token -->
                                @csrf
                                @method('DELETE')
                                <td>
                                    <input type="submit" class="btn btn-danger" value="Supprimer gamme">
                                </td>
                            </form>
                        </tr>
                </tbody>
                @endforeach
            </table>

        </div>
    </div>

    <!------------------------------------------CREER UNE CAMPAGNE------------------------------------------------->

    <div class="container" id="creer_campagne" style="display: none">
        <div class="row text-center">
            <div class="col-md-10">
                <h3>Créer une campagne</h3>
            </div>
            
                <div class="row">
                    <form action="{{ route('campagne.store') }}" method="post">
                        @csrf
                      
                        <div class="mb-3 row">
                            <label class="label">Nom de la campagne</label>
                            <div class="control">
                                <input class="input" type="text" name="titre">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="label">Date de début</label>
                            <div class="control">
                                <input class="input" type="text" name="date_debut">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="label">Date de fin</label>
                            <div class="control">
                                <input class="input" type="text" name="date_fin">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="label">Réduction</label>
                            <div class="control">
                                <input class="input" type="text" name="reduction">
                            </div>
                        </div>

                        @foreach($articles as $article)
                            <input type="checkbox" id="article{{$article->id}}" name="article{{$article->id}}" value="{{$article->id}}">
                            <label for="article{{ $article->id }}">{{ $article->nom }}</label>
                            @endforeach

                        <div class="field">
                            <div class="control">
                                <button class="btn btn-success" type="submit">Valider</button>
                            </div>
                        </div>

                    </form>
                </div>
        </div>
    </div>

    <!-------------------------------------------LISTE DES CAMPAGNES--------------------------------------------->
    <div class="container" id="liste_campagne" style="display: none">
        <div class="mb-3">
            <!-- On parcourt la liste des campagnes -->
            <h2>La liste des campagnes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nom de la campagne</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Reduction</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($campagnes as $campagne)
                        <tr>
                            <td>{{ $campagne->id }}</td>
                            <td>{{ $campagne->titre }}</td>
                            <td>{{ $campagne->date_debut }}</td>
                            <td>{{ $campagne->date_fin }}</td>
                            <td>{{ $campagne->reduction }}%</td>

                            <!--LIEN POUR ALLER SUR LA VIEW MODIFIER L'ARTICLE-->
                            <form method="put" action="{{ route('campagne.edit', $campagne) }}">
                                <td>
                                    <input type="submit" class="btn btn-success" value="Modifier campagne">
                                </td>
                            </form>

                            <!--SUPPRIMER L'ARTICLE-->
                            <form method="POST" action="{{ route('campagne.destroy', $gamme) }}">
                                <!-- CSRF token -->
                                @csrf
                                @method('DELETE')
                                <td>
                                    <input type="submit" class="btn btn-danger" value="Supprimer campagne">
                                </td>
                            </form>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>


    <!-------------------------------------------LISTE DES UTILISATEURS--------------------------------------------->
    <div class="container" id="liste_utilisateur" style="display: none">
        <div class="mb-3">
            <!-- On parcourt la liste des campagnes -->
            <h2>La liste des utilisateurs</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_id }}</td>

                            <!--SUPPRIMER L'UTILISATEUR-->
                                <form method="POST" action="{{ route('user.destroy', $user) }}">
                                    <!-- CSRF token -->
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <input type="submit" class="btn btn-danger" value="Supprimer utilisateur">
                                    </td>
                                </form>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
