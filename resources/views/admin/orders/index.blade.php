{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($orders as $order)
            <div>{{ $order->guest_name }}</div>
        @endforeach
    </div>
@endsection --}}

@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container-tb p-5">
        <div class="table-wrapper p-5">
            <h1 class="order-title">Tabella Ordini</h1>
            <table class="fl-table">
                <thead>
                    <tr>
                        <th scope="col">Nome Utente</th>
                        <th scope="col">Cognome Utente</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Totale</th>
                        <th scope="col">Vedi Ordine</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->guest_name }}</td>
                            <td>{{ $order->guest_surname }}</td>
                            <td>{{ $order->guest_address }}</td>
                            <td>{{ $order->guest_phone }}</td>
                            <td>{{ $order->guest_mail }}</td>
                            <td>{{ $order->totalItem }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="mx-1 text-success fs-5 text">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary">
                Torna alla tabella
            </a>
        </div>

    </div>
@endsection
