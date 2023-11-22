@extends('layouts.app')

@section('content')
    <div class="container">


        <form method="POST" action="{{ route('admin.restaurant.store') }}" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-12 my-4">
                <label for="name" class="form-label ">Nome</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-12 my-4">
                <label for="address" class="form-label ">Indirizzo</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 my-4">
                <label for="phone_number" class="form-label ">Numero di Telefono</label>
                <input type="text" name="phone_number" id="phone_number"
                    class="form-control @error('phone_number') is-invalid @enderror">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 my-4">
                <label for="vat" class="form-label ">PIVA</label>
                <input type="text" name="vat" id="vat" class="form-control @error('vat') is-invalid @enderror">
                @error('vat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mb-4">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="5"></textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 mb-4">
                <label for="image" class="form-label">Carica immagine</label>
                <input type="file" class="form-control" id="image" name="image" >
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

           
            <div class="col-12 mb-4">
                <button class="btn btn-secondary">Salva</button>
            </div>

        </form>

    </div>
@endsection
