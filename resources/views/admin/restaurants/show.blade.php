@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="container mt-2">
        <a href="{{ route('admin.restaurant.index')}}" class="btn btn-primary"> 
            <- Torna alla tabella 
        </a>
        <a href="{{ route('admin.restaurant.edit', $restaurant)}}" class="btn btn-primary"> 
            Edita 🖊
        </a>
    </div>
    <div class="card mt-3" style="width: 60rem;">
        {{-- per l'immagine nella show.. --}}
         <img src="{{ asset('/storage/' . $restaurant->image) }}" class="card-img-top" alt="">
            <div class="card-head">
                <div><h3>🍲Il mio ristorante⛪</h3></div>
                <div><strong>ID: {{ $restaurant->id}} </strong> </div>
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item"><strong>Nome: </strong>{{$restaurant->name}}</li>
                <li class="list-group-item"><strong>Indirizzo: </strong>{{$restaurant->address}}</li>
                <li class="list-group-item"><strong>Numero: </strong>{{$restaurant->phone_number}}</li>
                <li class="list-group-item"><strong>Vat: </strong>{{$restaurant->vat}}</li>
                <li class="list-group-item"><strong>Creato il: </strong>{{$restaurant->created_at}}</li>
                <li class="list-group-item"><strong>Aggiornato il: </strong>{{$restaurant->updated_at}}</li>
                <li class="list-group-item"><strong>Descrizione: </strong>{{$restaurant->description}}</li>
            </ul>
    </div>
</div>
@endsection