
@extends('inventario.index')
@section('header')
@endsection
        <!-- sm:items-center // coloca os itens no centro // bg-center bg-gray-100 -->
        @section('content')
        @Auth
        
        <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Visualizando PC TAG ".$redes->tag .", Proprietario ".$redes->proprietario}}</h1><br>
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm  border-t"><b>Ultima Alteração: </b>{{$redes->ult_alt}}<b><br> Por: </b>{{ $redes->agente}}</x-label>
 
<div >
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <div class="grid grid-cols-6 gap-6">     
      <div>
        <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Status:</b>
          @if ($redes->status=="on")<img style="margin-left: 60px; margin-top: -20px; width:20px;" src="/img/on.jpg" title="Em Atividade" >
          @elseif($redes->status=="2") <img class="img" src="/img/orange.jpg" title="Em Manutenção / Estoque" style="margin-left: 60px; margin-top: -20px; width:20px;">
          @else  <img class="img" src="/img/off.jpg" title="Desativada" style="margin-left: 60px; margin-top: -20px; width:20px;">
          @endif 
        <br>
        <h2 class="font-semibold text-xl text-gray-800 ">Ultimas Atualizações:</h2>
        @foreach ($descricoes as $item )
      
        @if ($item->redes_id == $redes->id )
        <ul class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">
          <li><b>{{$item->agente_redes}}</b>{{$item->alteracoes}}<br><b>Descrição:</b>{{" ".$item->descricao_texto }}<b><small><br />{{ $item->data_comentario}}</small></b><br></li>
        </ul>
        @endif
        @endforeach
  
      </div>
      
      <br>

        <div>    
          <br>    
          
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>TAG: </b>{{$redes->tag}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Nome:</b> {{$redes->nome}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Marca: </b>{{$redes->marca}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Modelo: </b>{{$redes->modelo}}</x-label>
        </div>
        <div>
          <br>  
     
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Número de Série: </b>{{$redes->processador}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Gateway: </b>{{$redes->memoria}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Situação: </b>{{$redes->disco_rigido}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Endereço de Rede: </b>{{$redes->end_rede}}</x-label>
    </div>
      <div>
        <br>  
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Garantia: </b>{{$redes->garantia}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Patrimonio: </b>{{$redes->patrimonio}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Local: </b>{{$redes->local}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">&nbsp;</x-label>

     
     
</div>
<div style="margin-top: 30px">
  <a href={{'/netw/edit/'. $redes->id}} style="float:left"><img src="/img/edit.png"  title="Editar"></a>
  </div>
  
<div style="margin-top: 30px">
</div>

</div>
</div>
</div>
</x-app-layout>
@endAuth
@endsection



  