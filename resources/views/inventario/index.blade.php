@yield('header')
<head><title>Controle de Inventário de T.I</title>
<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Inventário de Equipamentos de T.I') }}
        </h2>
    </x-slot></head>

        <!-- .sm\:items-center{align-items:center} -->
    @yield('content')
    @if (Auth::check() == true)
        <title></title>
    
        <div class="alinhaCentro">
        <div class="navbar-nav " > 

            @guest
            <a href="/login" class="nav-link">Entre</a>&nbsp;&nbsp;
            <a href="/register" class="nav-link">Cadastre-se</a>
            @endguest
        </div>         
        </div>
         
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
               
        <!-- Fonts -->
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">      
        <script src="{{ asset('js/script.js') }}"></script>
        <div class=" ">
            @if (Route::has('login'))            
            @endif
        </div>
        @yield('footer')
  <footer style="float:right"><br><b> 2023 &copy; Raphael de Almeida  &nbsp;&nbsp;&nbsp;</b></footer><br>

    </x-app-layout>
    @else {{'/'}}
    @endif