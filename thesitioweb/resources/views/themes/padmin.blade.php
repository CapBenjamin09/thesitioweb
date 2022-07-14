<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css')}}"> --}}

    {{-- Tailwind CSS Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>@yield('title') - TheSitioWeb</title>
  </head>
  <body class="bg-gray-100 text-gray-800">

    <nav class="flex py-5 bg-emerald-700 text-white">
      <div class="w-1/3 px-12 mr-auto">
        <p class="text-2xl font-bold">TheSitioWeb Administration</p>
      </div>
      
      @if (auth()->user()->role == 'operator')
        <div class="text-center flex">
            <p class="text-2xl font-bold" >OPERADOR</p>
        </div>    
      @elseif(auth()->user()->role == 'admin')
        <div class="text-center flex">
            <p class="text-2xl font-bold" >ADMINISTRADOR</p>
        </div>    
      @endif
      

      <ul class="w-1/3 px-16 ml-auto flex justify-end pt-1">
        <li class="mx-6">
          <p class="text-xl">Bienvenido <b>{{auth()->user()->primerNombre}} {{auth()->user()->primerApellido}}</b></p>
        </li>
        <li>
          <a href="{{ route('login.destroy') }}" class="font-bold py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Log Out</a>
        </li>
      </ul>

    </nav>

    @yield('content')
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>