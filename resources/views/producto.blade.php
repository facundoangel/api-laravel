@extends('layouts.template')

@section('content')

@if(isset($products))

    <h1>Lista de Productos</h1>

    @foreach ($products as $product)
        <p>{{ $product->nombre }}|{{ $product->precio }} </p>
    @endforeach
@else
    <h1>No hay productos</h1>
@endif

@endsection