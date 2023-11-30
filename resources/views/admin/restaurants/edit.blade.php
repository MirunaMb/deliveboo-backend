@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="descr-edit">
        <a href="{{ route('admin.restaurant.index') }}" class="btn btn-danger mt-3">
            Torna alla tabella </a>
        <div class="mt-2">
            <span><em>I campi obbligatori sono contrassegnati con *</em> </span>
        </div>

        {{-- * FORM EDIT PIATTI --}}
        <form method="POST" action="{{ route('admin.restaurant.update', $restaurant) }}" class="row"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="col-12 my-4">
                <label for="name" class="form-label ">Nome *</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    required value="{{ old('name') ?? $restaurant->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 my-4">
                <label for="address" class="form-label ">Inidirizzo *</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" required
                    value="{{ old('address') ?? $restaurant->address }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 my-4">
                <label for="phone_number" class="form-label ">Numero di Telefono *</label>
                <input type="text" name="phone_number" id="phone_number"
                    class="form-control @error('phone_number') is-invalid @enderror" required
                    value="{{ old('phone_number') ?? $restaurant->phone_number }}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 my-4">
                <label for="vat" class="form-label ">PIVA *</label>
                <input type="text" name="vat" id="vat" class="form-control @error('vat') is-invalid @enderror"
                    required value="{{ old('vat') ?? $restaurant->vat }}">
                @error('vat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- * CHECKBOXS per selezionare le tipologie --}}
            <label class="form-label">Tipologie</label>
            <div class="form-check bg-light text-primary p-3">
                <div class="row">
                    @foreach ($types as $type)
                        <div class="col-3 mb-3">
                            <input type="checkbox" id="type-{{ $type->id }}" value="{{ $type->id }}"
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
                <label for="description" class="form-label">Descrizione *</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="5" required value="{{ old('description') ?? $restaurant->description }}">{{ old('description') ?? $restaurant->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <!-- Anteprima dell'immagine esistente -->

            <div class="col-12 mb-4">
                <label for="image" class="form-label">Carica immagine</label>
                <input type="file" class="form-control" id="image" name="image">

                <div class="col-4">
                    @if ($restaurant->image)
                        <img src="{{ asset($restaurant->image) }}" class="img-fluid" alt="Anteprima dell'immagine"
                            id="image_preview">
                    @endif
                </div>
            </div>



            <div class="col-12 mb-4">
                <button class="btn btn-secondary">Salva</button>
            </div>
        </form>
    </div>
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

    <script type="text/javascript">
        const inputFileElement = document.getElementById('image');
        const imagePreview = document.getElementById('image_preview');
        inputFileElement.addEventListener('change', function() { //prendo l'input,intercetto il change
            alert('Immagine Cambiata');
            const [file] = this.files //prendo il file dentro input
            //quando l'immagine viene cambiata crea un Array di files da dove andiamo a estrarrne un solo file 

            //console.log(URL.createObjectURL(file)); //genera un blob-un formato di dati che contiene una lunga stringa di dati(che sono proprio l'immagine fisica)
            imagePreview.src = URL.createObjectURL(
                file); //il source di coverImagePreview e uguale al URL che creo dal file 
        })
    </script>
@endsection
