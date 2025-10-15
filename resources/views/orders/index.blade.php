@extends('partials.master')

@section('title', 'Softsul Code Challenge')

@section('body')
    @if($orders->isEmpty())
        <h4>Seus novos pedidos serão listados aqui...</h4>
    @else
        <h2>Lista de pedidos</h2> 

        <div class="overflow-auto" style="max-height: 350px;">
            @foreach ($orders as $order)
                @include('orders.card', ['order' => $order])
            @endforeach
        </div>
    @endif

    <div class="mt-5">
        @include('forms.order')
    </div>
@endsection