
@extends('inventario.index')
@section('header')
@endsection
        <!-- sm:items-center // coloca os itens no centro // bg-center bg-gray-100 -->
        @section('content')
        @Auth
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm  border-t"><b>Ultima Alteração: </b>{{$infraestrutura->ult_alt}}<b><br> Por: </b>{{ $infraestrutura->agente}}</x-label>
 
<div >
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <div class="grid grid-cols-6 gap-6">     
      <div>
        <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Status:</b>
          @if ($infraestrutura->status=="1")<img style="margin-left: 60px; margin-top: -20px; width:20px;" src="/img/on.jpg" title="Disponível" style="width:20px;">
          @elseif($infraestrutura->status=="2") <img style="margin-left: 60px; margin-top: -20px; width:20px;" class="img" src="/img/orange.jpg" title="Restam Apenas {{$infraestrutura->metros_disponivel}} Metros!" >
          @else  <img style="margin-left: 60px; margin-top: -20px; width:20px;" class="img" src="/img/off.jpg" title="Esgotado!">
          @endif 
        <br>
        <h2 class="font-semibold text-xl text-gray-800 ">Ultimas Atualizações:</h2>
        @foreach ($descricoes as $item )      
        @if ($item->infraestrutura_id == $infraestrutura->id )
        <ul class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">
          <li><b>{{$item->agente_infraestrutura}}</b>{{$item->alteracoes}}<br><b>Descrição:</b>{{" ".$item->descricao_texto }}<b><small><br />{{ $item->data_comentario}}</small></b><br></li>
        </ul>
        @endif
        @endforeach
  
      </div>
      
      <br>

        <div>    
          <br>    
          
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Nome:</b> {{$infraestrutura->nome}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Marca: </b>{{$infraestrutura->marca}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Modelo: </b>{{$infraestrutura->modelo}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Número de Série: </b>{{$infraestrutura->n_serie}}</x-label>
   </div>
        <div>
          <br>  
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Metragem Disponível: </b>{{$infraestrutura->metros_disponivel}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Metragem Original: </b>{{$infraestrutura->metros_total}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">&nbsp;</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">&nbsp;

    </div>
    <div style="margin-top: 30px">
      <a href={{'/infra/edit/'. $infraestrutura->id}} style="float:left"><img src="/img/edit.png"  title="Editar" ></a>
      </div>
      <div>
        <br> 
</div>
</div>
</div>
</div></x-label>
</x-app-layout>
@endAuth
@endsection



  