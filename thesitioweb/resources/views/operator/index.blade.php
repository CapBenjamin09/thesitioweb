@extends('themes.padmin')

@section('title', 'Operator')

@section('content')

    <div class="block mx-auto my-12 p-8 bg-white w-1/2 border border-gray-200 rounded-lg shadow-lg">

        @if (Session::has('mensaje'))
            <div class="border border-green-500 rounded-md bg-green-100 w-full text-green-600 p-2 my-2">
                {{Session::get('mensaje')}}
            </div>
        @endif

        <h1 class="text-5xl text-center pb-8">Solicitudes</h1>

        <table class="table-auto w-full text-center">
            <thead class="text-3xl pt-6">
                <th>Nombre</th>
                <th>Solicitud</th>
            </thead>
            <tbody class="text-2xl p-4">
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->primerNombre }} {{ $user->primerApellido }}</td>
                    <td class="p-2">
                        <a href="{{ route('operator.edit', $user) }}"  class="rounded-md bg-green-500 w-1/2 text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Editar</a>
                    </td>
                </tr>
                @empty
                <tr>
                <td colspan="2">No hay Registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection