@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container-tb p-5">
        <div class="table-wrapper p-5">
            <h1 class="dishes-title">I MIEI PIATTI</h1>
        <table class="fl-table">
            <thead>
                <tr>
                    <th scope="col">Piatto</th>
                    <th scope="col">Prezzo</th>              
                    <th scope="col">Data creazione</th>
                    <th scope="col">Ultimo aggiornamento</th>
                    <th scope="col">Disponibile nel menù</th>
                    <th scope="col">Cambia la Disponibilità</th>
                    <th scope="col">Mostra</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Cancella</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>€{{ $dish->price }}</td>                      
                        <td>{{ $dish->created_at->formatLocalized('%e %B %Y') }}</td>
                        <td>{{ $dish->updated_at->formatLocalized('%e %B %Y') }}</td>
                        <td>{{ $dish->visible ? 'Disponibile ✅' : 'Non disponibile ❌' }}</td>
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
                        <td>
                            <a href="{{ route('admin.dishes.show', $dish) }}" class="mx-1 text-success fs-5 text">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="mx-1 text-success fs-5 text">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        
                        <td>
                            <a href="#" class="mx-1" data-bs-toggle="modal"
                            data-bs-target="#delete-modal-{{ $dish->id }}">
                            <i class="fa-solid fa-trash-arrow-up fa-xl text-danger fs-5 text"></i>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-danger mt-5">
            Aggiungi un nuovo piatto 
        </a>
    </div>

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
