@extends('layouts.app')

@section('font-awesome')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="container p-5">
<div class="table-wrapper-2 p-5">
            <h1 class="dishes-title">I miei piatti</h1>
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
@section('footer')
<footer class="footer">
    <div class="container">
        <div class="row p-4 d-flex align-items-center justify-content-center">
            <div class="col">
                <ul>
                    <li><a href="#">Termini e condizioni</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
            <div class="col">
               
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Dove ci trovi</a></li>
                    <li><a href="#">Come pagare</a></li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li><a href="#">Partner</a></li>
                    <li><a href="#">Sponsor</a></li>
                    <li><a href="#">Telefono</a></li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li><a href="#">Agenzia</a></li>
                    <li><a href="#">Spazi pubblicitari</a></li>
                    <li><a href="#">submit</a></li>
                </ul>
            </div>
        
            <div class="col">
                <button class="btn">
                    <span>Share</span><span>
                        <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                            <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z">
                            </path>
                        </svg>
                    </span>
                    <ul>
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path fill="#ffffff" d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path fill="#ffffff" d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                                </svg></a>
            
                        </li>
                        <li>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path fill="#ffffff" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </button>
            </div>
        </div>
    </div>
</footer>
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
