@extends('inventario.index')
@section('header')
@endsection
@section('content') 
@Auth
<div >
  <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Visualizando PC TAG ".$computadores->tag .", Proprietario ".$computadores->proprietario}}</h1><br>
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm  border-t"><b>Ultima Alteração: </b>{{$computadores->ult_alt}}<b><br> Por: </b>{{ $computadores->agente}}</x-label>

    <div class="grid grid-cols-6 gap-6">
      <div>
        <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Status:</b>
          @if ($computadores->status=="on")<img style="margin-left: 60px; margin-top: -20px; width:20px;" src="/img/on.jpg" title="Ativo" style="width:20px;">
          @elseif($computadores->status=="2") <img class="img" src="/img/orange.jpg" title="Em Manutenção / Estoque" style="width:20px;">
          @else  <img class="img" src="/img/off.jpg" title="Desativada" style="width:20px;">
          @endif 
        <br>
        <h2 class="font-semibold text-xl text-gray-800 ">Ultimas Atualizações:</h2>
        @foreach ($descricoes as $item )
      
        @if ($item->computadores_id == $computadores->id )
        <ul class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">
          <li><b>{{$item->agente_computadores}}</b>{{$item->alteracoes}}<br><b>Descrição:</b>{{" ".$item->descricao_texto }}<b><small><br />{{ $item->data_comentario}}</small></b><br></li>
        </ul>
        @endif
        @endforeach
  
      </div>

      
      <br>

        <div>    
          <br>    
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>TAG: </b>{{$computadores->tag}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Nome:</b> {{$computadores->nome}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Marca: </b>{{$computadores->marca}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Modelo: </b>{{$computadores->modelo}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Proprietario: </b>{{$computadores->proprietario}}</x-label>
        </div>
        <div>
          <br>  
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Placa de Rede OffBoard?: </b> @if($computadores->placa_rede == "Sim"){{'SIM'}} @else {{'NÃO'}} @endif</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Placa de Video OffBoard?: </b> @if($computadores->placa_video == "Sim"){{'SIM'}} @else {{'NÃO'}} @endif</x-label>       
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Processador: </b>{{$computadores->processador}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Memoria RAM: </b>{{$computadores->memoria}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Disco Rigido: </b>{{$computadores->disco_rigido}}</x-label>
    </div>
      <div>
        <br>  
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Sistema Operacional: </b>{{$computadores->so}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Garantia: </b>{{$computadores->garantia}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Patrimonio: </b>{{$computadores->patrimonio}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Local: </b>{{$computadores->local}}</x-label>
      @if ($computadores->situacao == 'Operação') 
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" style="background-color: rgb(122, 255, 180);"><b>Situação: </b>{{'Em Operação'}}</x-label>
      @elseif ($computadores->situacao == 'Manutenção') 
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" style="background-color: rgb(255, 149, 139);"><b>Situação: </b>{{'Em Manutenção'}}</x-label>
      @else <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t" style="background-color: aqua;"><b>Situação: </b>{{'Em Reserva'}}</x-label>
      @endif


      
</div>
<div style="margin-top: 30px">
<a href={{'/comp/edit/'. $computadores->id}} style="float:left"><img src="/img/edit.png"  title="Editar"></a>
</div>

</div>
</div>
</div>

</x-app-layout>
@endAuth
@endsection
@section('footer')
@endsection

  