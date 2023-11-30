@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Numero di cellulare</th>
                    <th scope="col">Partita Iva</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Mostra</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $restaurant->id }}</th>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>{{ $restaurant->phone_number }}</td>
                    <td>{{ $restaurant->vat }}</td>
                    <td>
                        <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class="mx-1 text-success fs-5 text">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.restaurant.show', $restaurant) }}" class="mx-1 text-success fs-5 text">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>

        <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger mt-5">
            Vai a i miei piatti 🍜
        </a>
        

        
    </div>
@endsection
