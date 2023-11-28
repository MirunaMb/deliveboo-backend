@extends('layouts.app')

@section('content')
    <div class="container">

        <span class=""><em>I campi obbligatori sono contrassegnati con *</em> </span>

        <form method="POST" action="{{ route('admin.restaurant.store') }}" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-12 my-4">
                <label for="name" class="form-label ">Nome*</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-12 my-4">
                <label for="address" class="form-label ">Indirizzo*</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" required value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 my-4">
                <label for="phone_number" class="form-label ">Numero di Telefono*</label>
                <input type="text" name="phone_number" id="phone_number"
                    class="form-control @error('phone_number') is-invalid @enderror" required
                    value="{{ old('phone_number') }}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 my-4">
                <label for="vat" class="form-label ">PIVA*</label>
                <input type="text" name="vat" id="vat" class="form-control @error('vat') is-invalid @enderror"
                    required value="{{ old('vat') }}">
                @error('vat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- * CHECKBOXS per selezionare i tipi --}}
            <label class="form-label">Tipologie*</label>
            <div class="form-check bg-light text-primary p-3">
                <div class="row">
                    @foreach ($types as $type)
                        <div class="col-3 mb-3">
                            <input type="checkbox" id="type-{{ $type->id }}" required value="{{ $type->id }}"
                                name="types[]" class="form-check-control" @if (in_array($type->id, old('types', $restaurant_types ?? []))) checked @endif>
                            <label for="type-{{ $type->id }}">
                                {{ $type->label }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            @error('types')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <div class="col-12 mb-4">
                <label for="description" class="form-label">Descrizione*</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required
                    rows="5">{{ old('description') }}</textarea>
                @error('description')
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

            <div class="col-3 mb-4">
                <button class="btn btn-secondary">Salva</button>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <script>
        // Attendi che il documento HTML sia completamente caricato prima di eseguire lo script
        document.addEventListener("DOMContentLoaded", function() {
            // Seleziona tutte le checkbox con il nome "types[]"
            let checkboxes = document.querySelectorAll('input[name="types[]"]');
            // Itera su ogni checkbox
            checkboxes.forEach(function(checkbox) {
                // Aggiungi un listener per l'evento di cambio (quando la checkbox viene selezionata/deselezionata)
                checkbox.addEventListener('change', function() {
                    // Seleziona tutte le checkbox "types[]" che sono attualmente selezionate
                    let checkedCheckboxes = document.querySelectorAll(
                        'input[name="types[]"]:checked');
                    // Imposta l'attributo "required" solo se nessuna checkbox è selezionata
                    checkboxes.forEach(function(cb) {
                        cb.required = (checkedCheckboxes.length === 0);
                    });
                });
            });
        });
    </script>
@endsection
