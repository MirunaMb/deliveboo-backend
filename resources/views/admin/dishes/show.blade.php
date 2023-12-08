@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container mx-auto mb-5">
        {{-- * Buttons Container --}}
        <div class="container d-flex justify-content-end mt-3 mb-3">
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger mx-2">
                Torna alla tabella
            </a>

            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-success">
                Modifica  <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </div>
        {{-- * DISH CARD --}}
        <div>
            <h3>Il mio piatto</h3>
        </div>
        <div class="card" style="width: 30rem;">
            <img src="{{ asset($dish->image) }}" class="img-thumbnail" alt="" style="">
            <div class="card-body">
                <h5 class="card-title">{{ $dish->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome: </strong>{{ $dish->name }}</li>
                <li class="list-group-item"><strong>Prezzo: </strong>€ {{ $dish->price }}</li>
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
