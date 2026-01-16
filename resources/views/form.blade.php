
@extends('layouts.template')

@section('content')

<form method="POST" action="/form">
    @csrf

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">

    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion">

    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio">

    <button type="submit">Enviar</button>
    
</form>


@if (isset($producto))
    <div class="alert alert-success">
        <p>Producto {{ $producto }} creado correctamente</p>
    </div>
@endif
@endsection