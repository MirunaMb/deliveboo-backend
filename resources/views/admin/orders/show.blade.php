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
        <div class="plate-card container p-4">
            <div class="row">
                <div class="col-12">
                    <h4 class="p-3 bg-danger rounded text-light">Ordine numero: {{$order->id}} </h4>
                    <div class="m-2"><strong>Nome cliente: </strong>{{ $order->guest_name }}</div>
                    <div class="m-2" ><strong>Cognome : </strong>{{ $order->guest_surname }}</div>
                    <div class="m-2"><strong>Telefono: </strong>{{ $order->guest_phone }}</div>
                    <div class="m-2"><strong>E-Mail: </strong>{{ $order->guest_mail }} </div>
                    <div class="m-2"><strong>Indirizzo: </strong>{{ $order->guest_address }}</div>
                </div>
                <div class="col badge text-bg-secondary fs-5 mx-3">
                    <div class="me-2"><strong>Importo: </strong>€ {{ $order->totalItem }}</div>
                    <div class="me-2"><strong>Creato il: </strong>{{ $order->created_at->formatLocalized('%e/%m/%Y') }}</div>
                </div>
            </div>
            <div class="col-7 ms-3">
                <h4 class="p-3 bg-danger text-light rounded">Prodotti Acquistati</h4>
                    @foreach ($dishes as $dish)
                    <div class="m-2">
                        <strong>{{$dish->name }}:</strong>
                         {{ $dish->pivot->quantity }}pz.
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
