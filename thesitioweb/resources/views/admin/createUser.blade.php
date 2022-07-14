@extends('themes.padmin')

@section('title', 'Admin')

@section('content')

    <div class="block mx-auto my-12 p-8 bg-white w-1/2 border border-gray-200 rounded-lg shadow-lg">
        @if (isset($user))
        <p class="text-4xl text-center p-4 font-bold">Editar Usuario</p>    
        @else
        <p class="text-4xl text-center p-4 font-bold">Crear Usuario</p>
        @endif

        @if (Session::has('mensaje'))
            <div class="border border-green-500 rounded-md bg-green-100 w-full text-green-600 p-2 my-2">
                {{Session::get('mensaje')}}
            </div>
        @endif

        @if (isset($user))
        <form class="mt-4" enctype="multipart/form-data" action="{{ route('admin.update', $user) }}" method="post">  
        @else
        <form class="mt-4" enctype="multipart/form-data" action="{{ route('admin.createUser') }}" method="post">    
        @endif

        @csrf

            <div class="flex">
                
                <input class="border mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="primerNombre" value="{{old('primerNombre') ?? @$user->primerNombre}}" placeholder="Primer Nombre">    
                @error('primerNombre')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="segundoNombre" value="{{old('segundoNombre') ?? @$user->segundoNombre}}" placeholder="Segundo Nombre">
                @error('segundoNombre')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror

            </div>
            
            <div class="flex">

                <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="primerApellido" value="{{old('primerApellido') ?? @$user->primerApellido}}" placeholder="Primer Apellido">
                @error('primerApellido')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="segundoApellido" value="{{old('segundoApellido') ?? @$user->segundoApellido}}" placeholder="Segundo Apellido">
                @error('segundoApellido')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
            
            </div>

            <div class="flex">
            
                <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="apellidoCasada"  value="{{old('apellidoCasada') ?? @$user->apellidoCasada}}" placeholder="Apellido de Casada (opcional)">
                @error('apellidoCasada')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="ml-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="date" value="{{old('birthDay') ?? @$user->birthDay}}" name="birthDay">
                @error('birthDay')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="flex">
                <input class="mr-2 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="text" name="dpi" value="{{old('dpi') ?? @$user->dpi}}" placeholder="DPI">
                @error('dpi')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
                <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                type="email" name="mail" value="{{old('mail') ?? @$user->mail}}" placeholder="Correo Electronico">
                @error('mail')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex">

                @if (isset($user))    
                    @if ($user->role == 'guest')
                        <input class="ml-2 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                        type="text" name="profesion" value="{{old('profesion') ?? @$user->profesion}}" placeholder="Profesion (opcional)">
                        @error('profesion')
                            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                        @enderror                        
                    @endif
                @endif


            </div>

            <div class="flex">
                @if (isset($user))    
                    @if ($user->role == 'guest')
                        
                        <input class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                        type="number" name="aniosLaborando" value="{{old('aniosLaborando') ?? @$user->aniosLaborando}}" placeholder="Años Laborando">
                        @error('aniosLaborando')
                            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                        @enderror
                        <input class="ml-2 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" 
                        type="number" name="salario" value="{{old('salario') ?? @$user->salario}}" step="0.01" placeholder="Salario">
                        @error('salario')
                            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                        @enderror
                    @endif
                @endif

            </div>

            <div class="flex">

                @if (!isset($user))
                <select class="mr-1 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" id="role" name="role">
                    <optgroup label="Roles">
                    <option value="guest">Guest</option>
                    <option value="operator" >Operador</option>
                    <option value="admin" >Administrador</option>
                </select>    
                @endif
                

                @if (isset($user) )
                    @if ($user->role == 'guest')
                        @if ($user->solicitud == 'pendiente')
                            <select class="ml-2 border border-gray-200 rounded-md bg-gray-200 w-full text-lm p-2 my-2 placeholder-gray-500 focus:bg-white" id="select" name="select">
                                <optgroup label="Solicitud">
                                <option value="aceptada" selected>Aceptar</option>
                                <option value="rechazada" >Rechazar</option>
                            </select>      
                        @endif
                    @endif
                @endif


            </div>
            @if (isset($user))
                <button type="submit" name="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600">Editar</button>    
            @else
                <button type="submit" name="submit" class="rounded-md bg-sky-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-sky-600">Crear</button>    
            @endif
            
        
        </form>
    </div>

@endsection