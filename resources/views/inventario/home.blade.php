@extends('inventario.index')
@section('header')
@endsection
        <!-- sm:items-center // coloca os itens no centro // bg-center bg-gray-100 -->
        @section('content')
        @Auth

        <div>          
           
            @if (Route::has('login'))            
            @endif
          <!-- class="max-w-7xl mx-auto p-6 lg:p-8" -->  
                <div class="mt-16"> <!-- class="mt-16" -->    
                    <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" style="margin-top: -64px;">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Cadastrar') }}
                        </h2>
                    </x-label>

                    <div class="grid md:grid-cols-2  gap-6 lg:gap-8 ">

                        <a href="/comp/store" title="Cadastrar" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="margin-left: 10px; margin-top:10px;">
                            <div  >
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <img src="/img/comp.png" fill="none" class="w-7 h-7 stroke-red-500" >                                     
                                </div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Computador/Servidor</h2>
                            </div>                            
                            <svg style="color: rgb(3, 0, 158);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" fill="#03009e" ></path> </svg>
                        </a> 
                        <a href="/netw/store" title="Cadastrar" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="margin-top:10px;">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <img src="/img/switch.png" fill="none" class="w-7 h-7 stroke-red-500">                                     
                                </div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Switch/AP</h2>
                            </div>                            
                            <svg style="color: rgb(3, 0, 158);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" fill="#03009e"></path> </svg>
                        </a> 
                        <a href="/hardw/store" title="Cadastrar" class=" scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"style="margin-top:10px;">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full ">
                                    <img src="/img/hardware.png" fill="none" class="w-7 h-7 stroke-red-500">
                                </div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Hardware</h2>
                            </div>
                            <svg style="color: rgb(3, 0, 158);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" fill="#03009e"></path> </svg>
                        </a>         
                        <a href="/infra/store" title="Cadastrar" class=" scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="margin-top:10px;">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full ">
                                    <img src="/img/infra.png" fill="none" class="w-7 h-7 stroke-red-500">
                                </div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Material de InfraEstrutura</h2>
                            </div>
                            <svg style="color: rgb(3, 0, 158);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" fill="#03009e"></path> </svg>
                        </a> 

                        <a href="/faq/store" title="Cadastrar" class=" scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="margin-top:10px;">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full ">
                                    <img src="/img/faq2.jpg" fill="none" class="w-7 h-7 stroke-red-500">
                                </div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Adicionar Artigo de FAQ</h2>
                            </div>
                            <svg style="color: rgb(3, 0, 158);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" fill="#03009e"></path> </svg>
                        </a> 
                        
                    </div>
                    <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" >
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Lista de Equipamentos') }}
                        </h2>
                    </x-label>

                        <div class="grid md:grid-cols-2 gap-6 lg:gap-8" style="margin-top:10px;">

                <a href="/comp/list" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t ctImgDiv" style="margin-left: 10px" >
                        <img src="/img/computer.jpg" style="width:100px; margin-left:10px;"  title="Lista de Computadores/Servidores"><p style="margin-left:110px; font-size:17px;" >{{count($computadores)." Itens"}}</p>
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                    </div>
                </a>
                <a href="/netw/list" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                       <div class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t ctImgDiv"  >
                       <img src="/img/redes.jpg" style="width:100px; margin-left:10px;"  title="Lista de Ativos de Rede">&nbsp;&nbsp;&nbsp;<p style="margin-left:110px; font-size:17px;" >{{count($redes)." Itens"}}</p>
                       <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                    </div>
                </a>
                <a href="/hardw/list" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t ctImgDiv">
                       <img src="/img/hardware2.png" style="width:100px; margin-left:10px; "  title="Lista de Hardware"><br>&nbsp;&nbsp;&nbsp;<p style="margin-left:110px; font-size:17px;" >{{count($hardware)." Itens"}}</p>
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                     </div>             
                </a>
                <a href="/infra/list" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t ctImgDiv">
                   <img src="/img/infra.jpg" style="width:100px; margin-left:10px;"  title="Lista de InfraEstrutura"><br>&nbsp;&nbsp;&nbsp;<p style="margin-left:110px; font-size:17px;" >{{count($infraestrutura)." Itens"}}</p>
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                 </div>             
            </a>
            <a href="/faq/list" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t ctImgDiv">
               <img src="/img/faq.jpg" style="width:100px; margin-left:10px;"  title="Lista de InfraEstrutura"><br>&nbsp;&nbsp;&nbsp;<p style="margin-left:110px; font-size:17px;" >{{count($faq)." Itens"}}</p>
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
             </div>             
        </a>
                   
                </div>
        </div>            
    </div>
     
@endAuth
  @endsection


