@extends('inventario.index')
@section('header')
@endsection
        <!-- sm:items-center // coloca os itens no centro // bg-center bg-gray-100 -->
        @section('content')
        @Auth
       
        <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" style="margin-top: 0px;" >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de InfraEstrutura') }}
            </h2>
        </x-label><br>
        <form action="{{route('infra_search')}}" method="POST">
          @csrf
          <input type="search" style="margin-left: 10px;" class="form-control" id="search" name="search" placeholder="Pesquisar">
         
          <button  type="submit"><img class="img" src="/img/search.jpg" title="Pesquisar" style="width:35px;"></button>
        </form>
        <table id="tabela" class="comBordaComplexa  p-6 rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all">
  
    <tr>
      <th>Nome</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Tipo</th>
      <th>Metragem Disponível</th>
      <th>Local Da Instalação</th>
      <th>Status</th>

    </tr>
    @foreach ($infraestrutura as $item)
    <tr> 
      <td><a href="{{"/infra/item/" . strval($item->id)}}"><img src="/img/ver.png" style=" float:left" title="Visualizar item {{$item->nome}}">{{$item->nome}}</a></td>
      <td>{{$item->marca}}</td>
      <td>{{$item->modelo}}</td>
      <td>{{$item->tipo}}</td>
      <td>{{$item->metros}}</td>
      <td>{{$item->local}}</td>
      @if ($item->status == '1')<td><img src="/img/on.jpg" style="width:20px;" title="Disponível"></td>
      @elseif ($item->status == '0') <td><img src="/img/off.jpg" style="width:20px;" title="Esgotado"></td>
      @else <td><img src="/img/orange.jpg" style="width:20px;" title="Restam Apenas {{$item->metros_disponivel}} Metros!"></td>
      @endif      
    </tr>

    @endforeach 
  </table>

  @endsection
@endAuth
