@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="container mt-2">
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
                <- Torna alla tabella </a>
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary">
                        Edita 🖊
                    </a>
        </div>
        <div class="card mt-3 mb-3" style="width: 40rem;">
            {{-- per l'immagine nella show.. --}}

            <div class="card-head">
                <div>
                    <h3>🍲Il mio piatto</h3>
                </div>
                <div><strong>ID: {{ $dish->id }} </strong> </div>
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item"><strong>Nome: </strong>{{ $dish->name }}</li>
                <li class="list-group-item"><strong>Prezzo: </strong>$ {{ $dish->price }}</li>
                {{-- <li class="list-group-item"><strong>Creato il: </strong>{{$dish->created_at}}</li> --}}
                <li class="list-group-item"><strong>Aggiornato il: </strong>{{ $dish->updated_at }}</li>
                <li class="list-group-item"><strong>Descrizione: </strong>{{ $dish->description }}</li>
            </ul>
            <div class="container">
                <img src="{{ asset('/storage/' . $dish->image) }}" class="card-img-top" alt="">
            </div>
        </div>
    </div>
@endsection
