@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="descr-edit">
            <div>
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger">Torna alla tabella </a>
            </div>
            <div class="mt-2">
                <span>
                    <em>I campi obbligatori sono contrassegnati con *</em>
                </span>
            </div>
            {{-- * FORM CREATE RISTORANTE --}}
            <form method="POST" action="{{ route('admin.dishes.store') }}" class="row" enctype="multipart/form-data">
            @csrf
                <div class="col-6 my-4">
                    <label for="name" class="form-label ">Nome *</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-4 my-4">
                    <label for="price" class="form-label ">Prezzo *</label>
                    <input type="number" name="price" id="price" pattern="[0-9]+([\.,])[0-9]+?" step="0.01"
                    class="form-control @error('price') is-invalid @enderror" required value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- CHECKBOX per la disponibilità --}}
                <div class="col-2 my-4">
                    <label class="form-label">Disponibilità</label>
                    <div class="form-control">
                        <label for="visible">Disponibile</label>
                        <input type="checkbox" id="visible" name="visible" value="1">
                        @error('visible')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <label for="description" class="form-label">Descrizione *</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required
                    rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- IMAGINE -->
                <div class="col-6 mb-4">
                    <label for="image" class="form-label">Carica immagine</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"  value="{{ old('image') }}" name="image">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <img src="" class="img-fluid rounded"
                    alt="" id="image_preview">
                </div>
                <div class="col-12 mb-4">
                    <button type="submit" class="btn btn-success" id="submitBtn">Salva</button>
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
           
            const [file] = this.files //prendo il file dentro input
            //quando l'immagine viene cambiata crea un Array di files da dove andiamo a estrarrne un solo file 

            //console.log(URL.createObjectURL(file)); //genera un blob-un formato di dati che contiene una lunga stringa di dati(che sono proprio l'immagine fisica)
            imagePreview.src = URL.createObjectURL(
            file); //il source di coverImagePreview e uguale al URL che creo dal file 
        })
    </script>
@endsection
