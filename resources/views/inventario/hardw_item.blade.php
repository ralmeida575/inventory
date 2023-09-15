
@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth

        <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Visualizando PC TAG ".$hardware->tag .", Proprietario ".$hardware->proprietario}}</h1><br>
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm  border-t"><b>Ultima Alteração: </b>{{$hardware->ult_alt}}<b><br> Por: </b>{{ $hardware->agente}}</x-label>
 
<div >
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <div class="grid grid-cols-6 gap-6">     
      <div>
        <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Status:</b>
          @if ($hardware->status=="on")<img style="margin-left: 60px; margin-top: -20px; width:20px;" src="/img/on.jpg" title="Em Atividade" style="width:20px;">
          @elseif($hardware->status=="2") <img class="img" src="/img/orange.jpg" title="Em Manutenção / Estoque" style="width:20px;">
          @else  <img class="img" src="/img/off.jpg" title="Desativada" style="width:20px;">
          @endif 
        <br>
        <h2 class="font-semibold text-xl text-gray-800 ">Ultimas Atualizações:</h2>
        @foreach ($descricoes as $item )
      
        @if ($item->hardware_id == $hardware->id )
        <ul class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">
          <li><b>{{$item->agente_hardware}}</b>{{$item->alteracoes}}<br><b>Descrição:</b>{{" ".$item->descricao_texto }}<b><small><br />{{ $item->data_comentario}}</small></b><br></li>
        </ul>
        @endif
        @endforeach
  
      </div>
      
      <br>

        <div>    
          <br>    
          
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>TAG: </b>{{$hardware->tag}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Nome:</b> {{$hardware->nome}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Marca: </b>{{$hardware->marca}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Modelo: </b>{{$hardware->modelo}}</x-label>
        </div>
        <div>
          <br>  
     
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Situação: </b>{{$hardware->disco_rigido}}</x-label>
    </div>
      <div>
        <br>  
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Garantia: </b>{{$hardware->garantia}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Patrimonio: </b>{{$hardware->patrimonio}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Local: </b>{{$hardware->local}}</x-label> 
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Status:</b>
        @if ($hardware->status=="on")<img style="margin-left: 60px; margin-top: -20px; width:20px;" src="/img/on.jpg" title="Em Atividade" >
        @elseif($hardware->status=="2") <img class="img" src="/img/orange.jpg" title="Em Manutenção / Estoque" style="width:20px;">
        @else  <img class="img" src="/img/off.jpg" title="Desativada" style="width:20px;">
        @endif 
     
</div>
<div style="margin-top: 30px">
  <a href={{'/hardw/edit/'. $hardware->id}} style="float:left"><img src="/img/edit.png"  title="Editar"></a>
  </div>
  

</div>
</div>
</div></x-label>
</x-app-layout>
@endAuth
@endsection
@section('footer')
@endsection



  