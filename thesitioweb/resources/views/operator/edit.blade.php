@extends('themes.padmin')

@section('title', 'Operator')

@section('content')

    <div class="block mx-auto my-12 p-8 bg-white w-1/2 border border-gray-200 rounded-lg shadow-lg">


        <h1 class="text-3xl text-center pb-4">Solicitud de Cliente</h1>

        @if (Session::has('mensaje'))
            <div class="border border-green-500 rounded-md bg-green-100 w-full text-green-600 p-2 my-2">
                {{Session::get('mensaje')}}
            </div>
        @endif

        <form action="{{ route('operator.update', $user) }}" method="post">
        @method('put')
        @csrf

            <table class="text-center w-full ">
                <tr class="">
                        
                            <td class=>
                            <p class="text-2xl"> {{$user->primerNombre}}  {{$user->primerApellido}}</p>
                            </td>
                            <td>
                                <select id="select" name="select">
                                    <option value="aceptada" selected>Aceptar</option>
                                    <option value="rechazada" >Rechazar</option>
                                </select>
                            </td>
                        
                    </td>
                </tr>
            </table>

            <button type="submit" class="rounded-md bg-sky-500 w-1/3 text-lg text-white font-semibold p-2 my-3 hover:bg-sky-600">Actualizar</button>
        </form>
        
    </div>
@endsection