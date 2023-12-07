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
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Ordine</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome: </strong>{{ $order->guest_name }}</li>
                <li class="list-group-item"><strong>Cognome: </strong>{{ $order->guest_surname }}</li>
                <li class="list-group-item"><strong>Indirizzo: </strong>{{ $order->guest_address }}</li>
                <li class="list-group-item"><strong>Telefono: </strong>{{ $order->guest_phone }}</li>
                <li class="list-group-item"><strong>E-Mail: </strong>{{ $order->guest_mail }}</li>
                <li class="list-group-item"><strong>Importo: </strong>€ {{ $order->totalItem }}</li>
                <li class="list-group-item"><strong>Creato il: </strong>{{ $order->created_at }}</li>
            </ul>
        </div>
    </div>
@endsection
