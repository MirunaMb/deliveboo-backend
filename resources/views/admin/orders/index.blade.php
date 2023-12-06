@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($orders as $order)
        <div>{{$order->guest_name}}</div>   
        @endforeach
    </div>
@endsection