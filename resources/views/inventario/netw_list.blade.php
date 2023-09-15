@extends('inventario.index')
@section('header')
@endsection
        <!-- sm:items-center // coloca os itens no centro // bg-center bg-gray-100 -->
        @section('content')
        @Auth
       
        <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" style="margin-top: 0px;" >
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Lista de Equipamentos de Rede') }}
          </h2>
      </x-label><br>
      <form action="{{route('netw_search')}}" method="POST">
        @csrf
        <input type="search" style="margin-left: 10px;" class="form-control" id="search" name="search" placeholder="Pesquisar">
       
        <button  type="submit"><img class="img" src="/img/search.jpg" title="Pesquisar" style="width:35px;"></button>
      </form>

      <table id="tabela" class="comBordaComplexa  p-6 rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all">
 
  
    <tr>
      <th>TAG</th>
      <th>Nome</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Endereço de Rede</th>
      <th>Local de Atividade</th>
      <th>Ultima Alteração</th>
      <th>Status</th>
    </tr>
    @foreach ($redes as $item)
    <tr> 
      <td><a href="{{"/netw/item/" . strval($item->id)}}"><img src="/img/ver.png" style=" float:left" title="Visualizar PC {{$item->tag}} De {{$item->proprietario}}"></a>&nbsp;{{$item->tag}}</td>
      <td>{{$item->nome}}</td>
      <td>{{$item->marca}}</td>
      <td>{{$item->modelo}}</td>
      <td>{{$item->end_rede}}</td>
      <td>{{$item->local}}</td>
      <td>{{$item->ult_alt}}</td>
      @if ($item->status == 'on')<td><img src="/img/on.jpg" style="width:20px;"></td>
      @else<td><img src="off.jpg"></td>
      @endif
    </tr>

    @endforeach 
  </table>

  @endsection
@endAuth
