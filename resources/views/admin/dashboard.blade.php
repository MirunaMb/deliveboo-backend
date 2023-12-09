@extends('layouts.app')

@section('content')
<div class="container">
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

    <div class="text-center">
        <a class="btn btn-danger mt-5" href="{{ route('admin.restaurant.index') }}">Il mio ristorante</a>

    </div>
</div>
@endsection
