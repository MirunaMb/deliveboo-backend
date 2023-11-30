@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="descr-edit">
        <div class="container mt-2">
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
                <- Torna alla tabella </a>
        </div>
        <div class="mt-2">
            <span><em>I campi obbligatori sono contrassegnati con *</em> </span>
        </div>


        <form method="POST" action="{{ route('admin.dishes.update', $dish) }}" class="row" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="col-12 my-4">
                <label for="name" class="form-label ">Nome*</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    required value="{{ old('name') ?? $dish->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-12 my-4">
                <label for="price" class="form-label ">Prezzo*</label>
                <input type="text" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" required
                    value="{{ old('price') ?? $dish->price }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            {{-- CHECKBOXS per selezionare la\le Technology  --}}


            <div class="col-12 mb-4">
                <label for="description" class="form-label">Descrizione*</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="5" required value="{{ old('description') ?? $dish->description }}">{{ old('description') ?? $dish->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Anteprima dell'immagine esistente -->

            <div class="col-12 mb-4">
                <label for="image" class="form-label">Carica immagine</label>
                <input type="file" class="form-control  @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="col-4">
                    @if ($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" class="img-fluid" alt="Anteprima dell'immagine"
                            id="image_preview">
                    @endif
                </div>
            </div>

            {{-- * CHECKBOXS per selezionare la\le Technology --}}
            <label class="form-label">Tipologie</label>
            <div class="form-check bg-light text-primary p-3">
                <label for="visible">Disponibile</label>
                <input type="checkbox" id="visible" name="visible" value="1"
                    @if (old('visible', $dish->visible) == 1) checked @endif>
                @error('visible')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-12 mb-4">
                <button class="btn btn-success">Salva</button>
            </div>

        </form>
    </div>
</div>
@endsection
@section('scripts')
    
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
