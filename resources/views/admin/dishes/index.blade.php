@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <h1>Piatti del Ristorante</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Visibilità</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Data creazione</th>
                    <th scope="col">Ultimo aggiornamento</th>
                    <th scope="col">Edita</th>
                    <th scope="col">Mostra</th>
                    <th scope="col">Cancella</th>
                    <th scope="col">Visibilità</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->id }}</td>
                        <td>{{ $dish->name }}</td>
                        <td>${{ $dish->price }}</td>
                        <td>{{ $dish->visible }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->created_at }}</td>
                        <td>{{ $dish->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="mx-1">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('admin.dishes.show', $dish) }}" class="mx-1">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="mx-1" data-bs-toggle="modal"
                                data-bs-target="#delete-modal-{{ $dish->id }}">
                                <i class="fa-solid fa-trash-arrow-up fa-xl text-danger"></i>
                            </a>

                            {{-- * MODAL per il delete del piatto --}}
                            <div class="modal fade" id="delete-modal-{{ $dish->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Piatto</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete "<strong>{{ $dish->title }}</strong>"? Click <span
                                                class="text-danger">"Delete"</span> to continue or go <span
                                                class="text-primary">"Back"</span> to dishes.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Back</button>

                                            <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST"
                                                class="mx-2">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        {{-- * SWITCH per la visibilità dei piatti --}}
                        <td>
                            <form action="{{ route('admin.dishes.visible', $dish) }}"method="POST" 
                                id="form-visible-{{$dish->id }}">
                                {{-- per modificare il valore della colonna --}}
                                @method('PATCH')
                                @csrf

                                <label class="switch">
                                    <input type="checkbox" name="visible" @if ($dish->visible) checked @endif>
                                    <span class="slider round checkbox-visible" data-id="{{ $dish->id }}"></span>
                                </label>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
            + Crea nuovo piatto
        </a>
    </div>
@endsection

@section('scripts')
<script>
    const checkboxesVisible = document. getElementsByClassName('checkbox-visible');
    for (checkbox of checkboxesVisible) {
        checkbox.addEventListener('click', function() {
            const idDish = this.getAttribute('data-id');
            console.log(idDish);
            const form = document.getElementById('form-visible-' + idDish);
            form.submit();
        })
    }
</script>
@endsection
