@extends('themes.plantilla')

@section('title', 'Registro')

@section('content')
    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">

        <h2 class="text-3xl text-center font-bold">Registro</h2>
        
        <form class="mt-4" enctype="multipart/form-data" action="{{ route('register.store') }}" method="post">
            
            @csrf

            <div class="flex">
                
                <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="primerNombre" value="{{old('primerNombre')}}" placeholder="Primer Nombre">    
                @error('primerNombre')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="segundoNombre" value="{{old('segundoNombre')}}" placeholder="Segundo Nombre">
                @error('segundoNombre')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror

            </div>
            
            <div class="flex">

                <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="primerApellido" value="{{old('primerApellido')}}" placeholder="Primer Apellido">
                @error('primerApellido')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="segundoApellido" value="{{old('segundoApellido')}}" placeholder="Segundo Apellido">
                @error('segundoApellido')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
            
            </div>

            <div class="flex">
            
                <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="text" name="apellidoCasada"  value="{{old('apellidoCasada')}}" placeholder="Apellido de Casada (opcional)">
                @error('apellidoCasada')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="date" value="{{old('birthDay')}}" name="birthDay">
                @error('birthDay')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="flex">

                <input class="mr-2 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="text" name="dpi" value="{{old('dpi')}}" placeholder="DPI">
                @error('dpi')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-2 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="text" name="profesion" value="{{old('profesion')}}" placeholder="Profesion (opcional)">
                @error('profesion')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex">

                <input accept="image/jpeg,image/png,image/jpg" class=" mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="file" value="{{old('foto')}}" name="foto" placeholder="Imagen">
                @error('foto')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="number" name="aniosLaborando" value="{{old('aniosLaborando')}}" placeholder="Años Laborando">
                @error('aniosLaborando')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="flex">

                <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="number" name="salario" value="{{old('salario')}}" step="0.01" placeholder="Salario">
                @error('salario')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" type="email" name="mail" value="{{old('mail')}}" placeholder="Correo Electronico">
                @error('mail')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
            
            </div>

            <button type="submit" name="submit" class="rounded-md bg-sky-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-sky-600">Enviar Solicitud</button>

        </form>
        
    </div>
@endsection