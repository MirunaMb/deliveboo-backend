@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <h1>i miei piatti</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">prezzo</th>
                    <th scope="col">visible</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">creato</th>
                    <th scope="col">update</th>
                    <th scope="col">edit</th>
                    <th scope="col">show</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->id }}</td>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->price }}</td>
                        <td>{{ $dish->visible }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->created_at }}</td>
                        <td>{{ $dish->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="mx-1">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('admin.dishes.show', $dish) }}" class="mx-1">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>Delete</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
            + Crea nuovo piatto
        </a>
    </div>
@endsection
