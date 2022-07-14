@extends('themes.plantilla')

@section('title', 'Usuario')

@section('content')

    {{-- <h1 class="text-5xl text-center pt-24">Bienvenido Usuario!</h1> --}}

    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
        
        <h1 class="text-5xl text-center pb-8">Datos de Usuario</h1>

        <div>

            <img src="{{'storage/'.auth()->user()->foto }}" alt="Foto de Perfil" width="400" height="600">
            <h1  class="text-2xl">Nombre completo: {{auth()->user()->primerNombre }} {{auth()->user()->segundoNombre }} {{auth()->user()->primerApellido }} {{auth()->user()->segundoApellido }} </h1>
            
            @if (auth()->user()->apellidoCasada != null)
            <h1 class="text-2xl">Apellido de casada: {{auth()->user()->apellidoCasada}}</h1>
            @endif
            
            <h1 class="text-2xl">Fecha de Nacimiento: {{$fecha = auth()->user()->birthDay }}</h1>
            
            <h1 class="text-2xl">DPI: {{auth()->user()->dpi }}</h1>

            @if (auth()->user()->profesion != null)
            <h1 class="text-2xl">Profesión: {{auth()->user()->profesion}}</h1>
            @endif
            
            <h1 class="text-2xl font-bold">Estado de solicitud: {{auth()->user()->solicitud }}</h1>

        </div>
    </div>

@endsection