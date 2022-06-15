@extends('layouts.app')

@section('title')
    INTERFACE ADMINISTRATEUR
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <h2 class="mb-4">Bienvenue sur le back office</h2>

            <h3>Créer un article</h3>
        </div>

        <div class="row" <form action="{{ route('article.store') }}" method="post"
            enctype="multipart/form-data">


            <div class="mb-3 row">
                <label for="staticNom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticNom">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticNom" class="col-sm-2 col-form-label">Description courte</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticNom">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticNom" class="col-sm-2 col-form-label">Description longue</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticNom">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticNom" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" readonly class="form-control-plaintext" id="staticNom">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticNom" class="col-sm-2 col-form-label">Prix</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticNom">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticNom" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticNom">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticNom" class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticNom">
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="container">
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

                            <!--LIEN POUR ALLER SUR LA VIEW MODIFIER L'ARTICLE-->
                            <form method="put" action="{{ route('article.edit', $article) }}">
                                <td>
                                    <input type="submit" class="btn btn-success" value="Modifier article">
                                </td>
                            </form>


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
    @endsection
