@extends('layouts.app')

@section('content')
    <div class="container">


        <form method="POST" action="{{ route('admin.dishes.store') }}" class="row" enctype="multipart/form-data">
            @csrf

            {{-- <input type="hidden" name="restaurant_id" value="{{ $restaurantId }}"> --}}

            <div class="col-12 my-4">
                <label for="name" class="form-label ">Nome</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
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

            <div class="col-12 my-4">
                <label for="price" class="form-label ">Prezzo</label>
                <input type="number" name="price" id="price" pattern="[0-9]+([\.,])[0-9]+?" step="0.01"
                    class="form-control @error('price') is-invalid @enderror">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mb-4">
                <label for="image" class="form-label">Carica immagine</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- * CHECKBOXS per selezionare la\le Technology --}}
            <label class="form-label">Tipologie</label>
            <div class="form-check bg-light text-primary p-3">
                <label for="visible">Disponibile</label>
                <input type="checkbox" id="visible" name="visible" value="1">
                @error('visible')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mb-4">
                <button type="submit" class="btn btn-secondary">Salva</button>
            </div>
        </form>
    </div>
@endsection
