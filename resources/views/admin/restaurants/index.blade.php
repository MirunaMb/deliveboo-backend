@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Vat</th>
                    <th scope="col">Modifica</th>
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
                        <a href="{{ route('admin.restaurant.edit', $restaurant) }}" class="mx-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.restaurant.show', $restaurant) }}" class="mx-1">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
            I miei piatti 🍜
        </a>
        <div class="mt-5">
            <h5>Descrizione Ristorante</h5>
            <p>{{ $restaurant->description }}</p>
        </div>
    </div>
@endsection
