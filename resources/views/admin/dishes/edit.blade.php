@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Modificare
            name
            description
            visible
            image
            price --}}
        
        <form method="POST" action="{{ route('admin.dishes.update', $dish) }}" class="row" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

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
                <label for="price" class="form-label ">Prezzo</label>
                <input type="text" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            {{-- CHECKBOXS per selezionare la\le Technology  --}}
 

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