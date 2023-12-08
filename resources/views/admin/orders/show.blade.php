{{-- @extends('layouts.app')

@section('content')
    <div class="container">
       
            <div>
                {{ $order->guest_name }}
            </div>

    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mb-5">
        {{-- * Buttons Container --}}
        <div class="container mt-3 mb-3">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-danger mx-2">
                Torna agli ordini
            </a>
        </div>
        {{-- * Order CARD --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ordine</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="me-2">Nome: {{ $order->guest_name }}</span>
                    <span class="me-2" >Cognome: {{ $order->guest_surname }}</span>
                    <span class="me-2">Telefono: {{ $order->guest_phone }}</span>
                    <span class="me-2">E-Mail:{{ $order->guest_mail }} </span>
                </li>
                <li class="list-group-item"><strong>Indirizzo: </strong>{{ $order->guest_address }}</li>
                <li class="list-group-item"></li>
                <li class="list-group-item"><strong>E-Mail: </strong>{{ $order->guest_mail }}</li>
                <li class="list-group-item"><strong>Importo: </strong>€ {{ $order->totalItem }}</li>
                <li class="list-group-item"><strong>Creato il: </strong>{{ $order->created_at->formatLocalized('%e/%m/%Y') }}</li>
                <ul>
                    @foreach ($dishes as $dish)
            <li>{{ $dish->name }} - Quantità: {{ $dish->pivot->quantity }}
                <img src="{{ $dish->image }}" alt="">
            </li>
        @endforeach
                </ul>
                    
              
            </ul>
        </div>
    </div>
@endsection
