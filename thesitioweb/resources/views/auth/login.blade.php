@extends('themes.plantilla')

@section('title', 'Login')

@section('content')
    <div class="">

        <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
            

        

            <h1 class="text-3xl text-center font-bold">Login</h1>
            
            @if (Session::has('mensaje'))
            <div class="border border-green-500 rounded-md bg-green-100 w-full text-green-600 p-2 my-2">
                {{Session::get('mensaje')}}
            </div>
            @endif

            
            <form  class="mt-4" method="POST" action="{{ route('login.store') }}">
                
            @csrf

                <div class="form-group">
                    <input class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg p-2 my-2 placeholder-gray-500 focus:bg-white" 
                    placeholder="Correo Electronico" value="{{old('mail')}}" type="email" name="mail" id="mail">
                </div>

                <div class="form-group">
                    <input class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg p-2 my-2 placeholder-gray-500 focus:bg-white" 
                    type="password" placeholder="Password" value="{{old('password')}}" name="password" id="password">
                </div>
                @error('message')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                @enderror

                <div class="text-center">
                    <button type="submit" class="rounded-md bg-sky-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-sky-600">Iniciar Sesión</button>
                </div>
                
            </form>

        </div>

    </div>
@endsection