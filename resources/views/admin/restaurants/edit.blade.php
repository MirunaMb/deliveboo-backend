@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- @if ($errors->any())
            <div class="alert alert-danger mt-2">
                Correggi i seguenti errori:

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form method="POST" action="{{ route('admin.restaurant.update', $restaurant)}}" class="row">
            @csrf
            @method('PATCH')

            <div class="col-12 my-4">
                <label for="name" class="form-label ">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
            </div>

            <div class="col-12 my-4">
                <label for="address" class="form-label ">address</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror">
            </div>

            <div class="col-12 my-4">
                <label for="phone_number" class="form-label ">phone_number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
            </div>

            <div class="col-12 my-4">
                <label for="vat" class="form-label ">vat</label>
                <input type="text" name="vat" id="vat" class="form-control @error('vat') is-invalid @enderror">
            </div>

            <div class="col-12 mb-4">
                <label for="description" class="form-label">description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
            </div>

            <div class="col-12 mb-4">
                <button class="btn btn-secondary">Salva</button>
            </div>

        </form>

    </div>
@endsection
