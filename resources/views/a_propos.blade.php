@extends('layouts.app')

@section('title')
    A propos
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Notre histoire</h2>
            </div>
        </div>
        <div class="row">
            <p>Fondée en 2001, nous utilisons une technologie de fabrication à la demande pour connecter les fournisseurs à
                notre chaîne d'approvisionnement agile, réduisant ainsi le gaspillage des stocks et nous permettant de
                livrer une variété de produits abordables aux clients du monde entier. Depuis nos bureaux internationaux,
                nous touchons des clients dans plus de 150 pays. . Cras dapibus. Vivamus elementum semper
                nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies
                nisi. </p>
        </div>
        <div class="image">
            <img src="{{ asset('images/histoire.jpg') }}" class="d-block w-100" alt="notre histoire">
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Contrôle qualité</h2>
            </div>
        </div>
        <div class="row">
            <p>Durant le processus de fabrication de vêtement, il est nécessaire de mettre en place un plusieurs étapes de
                contrôle qualité (QC). La première étapes consiste à vérifier les tissus reçu avant la découpe. En effet,
                certains fabricants de tissus vendent avec près de 10% de tissus endommagé ou taché. La seconde étape est le
                QC après production. En effet, certaines marques ont pu être faites sur le vêtements si la couturière a
                oublié ou mal fait l’une des étapes du processus de production du vêtement. Par exemple, pour marquer les
                vêtements de luxe ou de haute qualité, les couturière utilisent une sorte de craie de tailleur permettant de
                tracer au plus près la découpe et de coudre avec plus de précision. Il est important donc de bien nettoyer,
                après couture, les petites marques volontairement apposés sur le tissus et normal lors d’une production de
                vêtement de luxe. La dernière étape est le QC avant emballage et packaging. A ce stade, c’est l’ensemble de
                la pièce qui est inspecter minutieusement. Les fils qui dépassent sont coupés, les coutures sont inspectées
                et les pièces sont renvoyées en production si elles ne sont pas parfaites. On vérifie aussi que les boutons
                ont correctement été faits, que les tissus sont propres et correctement repassés, …

                QC textile à la réception
                QC suite à la production
                QC final de la loupe avant l’emballage
            </p>
        </div>
        <div class="image">
            <img src="{{ asset('images/controle_qualite.jpg') }}" class="d-block w-100" alt="notre histoire">
        </div>
    </div>
@endsection
