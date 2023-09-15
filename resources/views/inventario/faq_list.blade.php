

@extends('inventario.index')
@section('header')
@endsection
        <!-- sm:items-center // coloca os itens no centro // bg-center bg-gray-100 -->
        @section('content')
        @Auth

        <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" style="margin-top: 0px;" >
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Lista de Artigos De FAQ') }}
          </h2>
      </x-label><br>
      <form action="{{route('faq_search')}}" method="POST">
        @csrf
        <input type="search" style="margin-left: 10px;" class="form-control" id="search" name="search" placeholder="Pesquisar">
       
        <button  type="submit"><img class="img" src="/img/search.jpg" title="Pesquisar" style="width:35px;"></button>
      </form>

      <table id="tabela" class="comBordaComplexa  p-6 rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all">
   
        
    <tr>
      <th>Título</th>
      <th>Assunto</th>
      <th>Última Alteração</th>
    </tr>
    @foreach ($faq as $item)
    <tr> 
      <td><a href="{{"/faq/item/" . strval($item->id)}}"><img src="/img/ver.png" style=" float:left" title="Visualizar Item {{$item->titulo}} "></a>&nbsp;{{$item->titulo}}</td>
      <td>{{$item->assunto}}</td>
      <td>{{$item->ult_alt}}</td>  
    </tr>
    @endforeach 
  </table>

  @endsection
@endAuth