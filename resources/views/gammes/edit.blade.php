@extends('layouts.app')

@section('title')
    MOFIFICATION DES GAMMES
@endsection

@section('content')

<div class="container">
    <div class="row text-center md-6 mx-auto">
        <div class="col-md-12">
            <h2>Modifier une gamme</h2>
        </div>
    </div>

    @if (isset($gamme))
        <form method="POST" action="{{ route('gamme.update', $gamme) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row text-center">
                <div class="field">
                    <div class="col-md-6 mx-auto">
                        <label for="label" class="mt-3 fs-4">Nouveau nom :</label>
                        <div class="control">
                            <input class="input" id="content" type="text" name="nom"
                                value="{{ $gamme->nom }}">
                        </div>
                        @if ($errors->has('nom'))
                            <p class="help is-danger">{{ $errors->first('nom') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="field text-center">
                <div class="control">
                    <button type="submit" class="btn btn-success">
                        {{ __('Modifier la gamme') }}
                    </button>
                </div>
            </div>
            
      </form>
      @endif 
</div>




@endsection