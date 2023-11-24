@extends('layouts.app')

@section('content')
    <div class="container mx-auto mb-5">
        {{-- * Buttons Container --}}
        <div class="container mt-3 mb-3">
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger mx-2">
                Torna alla tabella
            </a>

            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-success">
                Edita 🖊
            </a>
        </div>
        {{-- * DISH CARD --}}
        <div>
            <h3>🍲Il mio piatto</h3>
        </div>
        <div class="card" style="width: 20rem;">
            <img src="{{ asset('/storage/' . $dish->image) }}" class="img-thumbnail" alt="" style="">
            <div class="card-body">
                <h6>ID: {{ $dish->id }} </h6>
                <h5 class="card-title">{{ $dish->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome: </strong>{{ $dish->name }}</li>
                <li class="list-group-item"><strong>Prezzo: </strong>$ {{ $dish->price }}</li>
                {{-- <li class="list-group-item"><strong>Creato il: </strong>{{$dish->created_at}}</li> --}}
                <li class="list-group-item"><strong>Aggiornato il: </strong>{{ $dish->updated_at }}</li>
            </ul>
            <div class="card-body">
                <h6>Descrizione</h6>
                <p class="card-text">{{ $dish->description }}</p>
            </div>
        </div>
    </div>
@endsection
