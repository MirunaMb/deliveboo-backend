@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary mt-3">
            <- Torna alla tabella </a>
                <form method="POST" action="{{ route('admin.restaurant.update', $restaurant) }}" class="row"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="col-12 my-4">
                        <label for="name" class="form-label ">Nome</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') ?? $restaurant->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 my-4">
                        <label for="address" class="form-label ">Inidirizzo</label>
                        <input type="text" name="address" id="address"
                            class="form-control @error('address') is-invalid @enderror"
                            value="{{ old('address') ?? $restaurant->address }}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 my-4">
                        <label for="phone_number" class="form-label ">Numero di Telefono</label>
                        <input type="text" name="phone_number" id="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ old('phone_number') ?? $restaurant->phone_number }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12 my-4">
                        <label for="vat" class="form-label ">PIVA</label>
                        <input type="text" name="vat" id="vat"
                            class="form-control @error('vat') is-invalid @enderror"
                            value="{{ old('vat') ?? $restaurant->vat }}">
                        @error('vat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- * CHECKBOXS per selezionare la\le Technology --}}
                    <label class="form-label">Tipologie</label>
                    <div class="form-check bg-light text-primary p-3">
                        <div class="row">
                            @foreach ($types as $type)
                                <div class="col-3 mb-3">
                                    <input type="checkbox" id="type-{{ $type->id }}" value="{{ $type->id }}"
                                        name="types[]" class="form-check-control"
                                        @if (in_array($type->id, old('types', $restaurant_types ?? []))) checked @endif>
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
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            value="{{ old('description') ?? $restaurant->description }}" rows="5"
                            value="{{ old('description') ?? $restaurant->description }}">{{ old('description') ?? $restaurant->description }}</textarea>
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

                    <div class="col-12 mb-4">
                        <button class="btn btn-secondary">Salva</button>
                    </div>

                </form>

    </div>
@endsection
