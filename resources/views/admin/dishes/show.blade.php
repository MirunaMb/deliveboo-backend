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
        

            <div class="plate-card">
                <div class="badge-dish">
                    <span class="price">€{{ $dish->price }}</span>
                </div>
                <div class="plate-details">
                    <div class="caption">{{ $dish->name }}</div>
                    <div class="description">{{ $dish->description }}</div>
                    <div class="plate-image">
                        <img src="{{ asset($dish->image) }}">
                    </div>
                    <div class="updated-at">Aggiornato il: {{ $dish->updated_at }}</div>
                </div>
            </div>

    </div>
@endsection
