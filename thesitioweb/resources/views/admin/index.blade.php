@extends('themes.padmin')

@section('title', 'Admin')

@section('content')

    <div class="block mx-14 my-12 p-8 bg-white w-1/1 border border-gray-200 rounded-lg shadow-lg">

        @if (Session::has('mensaje'))
            <div class="border border-green-500 rounded-md bg-green-100 w-full text-green-600 p-2 my-2">
                {{Session::get('mensaje')}}
            </div>
        @endif

        <a href="{{ route('admin.createUserview') }}" class="rounded-md bg-indigo-500 w-1/2 text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600">Crear Usuario</a>

        <h1 class="text-5xl text-center pb-8">Usuarios</h1>

        <table class="table-auto w-full text-center">
            <thead class="text-3xl pt-6">
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Solicitud</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-2xl p-4">
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->primerNombre }} {{ $user->primerApellido }}</td>
                    <td>{{ $user->mail }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->estado }}</td>
                    <td>{{ $user->solicitud }}</td>
                    <td class="p-2">
                        <a href=" {{ route('admin.edit', $user) }}"  class="rounded-md bg-green-500 w-1/2 text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Editar</a>
                        <a href="{{ route('admin.destroy', $user) }}"  class="rounded-md bg-red-500 w-1/2 text-lg text-white font-semibold p-2 my-3 hover:bg-red-600">Eliminar</a>
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