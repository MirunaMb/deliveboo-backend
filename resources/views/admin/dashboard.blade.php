@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2> --}}
    <div class="row justify-content-center mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header text-bg-danger text-center fs-3">Sei autenticato</div>

                <div class="card-body text-center fs-4">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Benvenuto sulla piattaforma Deliveboo!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
