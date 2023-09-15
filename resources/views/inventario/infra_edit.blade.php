@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
   
    <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Editar Item ".$infraestrutura->nome}}</h1><br>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
      
    <div class="grid grid-cols-6 gap-6">
        <div>
            <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Status:</b>
              @if ($infraestrutura->status=="1")<img style="margin-left: 60px; margin-top: -20px; width:20px;" src="/img/on.jpg" title="Disponível" style="width:20px;">
              @elseif($infraestrutura->status=="2") <img style="margin-right:160px; width:20px;" class="img" src="/img/orange.jpg" title="Restam Apenas {{$infraestrutura->metros_disponivel}} Metros!" >
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
<div >
<x-label style="color: rgb(192, 192, 192)">Nome:<img src="/img/warning.jpg" title="Este Campo Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$infraestrutura->nome}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Marca:<img src="/img/warning.jpg" title="Este Campo Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$infraestrutura->marca}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Modelo:<img src="/img/warning.jpg" title="Este Campo Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$infraestrutura->modelo}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Número de Série:<img src="/img/warning.jpg" title="Este Campo Não É Editável!" style="width:20px; float:right; margin-right:100px;"></p></x-label><x-input type="text" class="form-control" id="nSerie" name="nSerie"  placeholder="{{$infraestrutura->n_serie}}" disabled/><br><br>

</div>
<div>
<x-label style="color: rgb(192, 192, 192)">Metragem Total:<img src="/img/warning.jpg" title="Este Campo Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="number" class="form-control" id="metrosTotal" name="metrosTotal"  placeholder="{{$infraestrutura->metros_total}} Metros" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Metragem Disponível:<img src="/img/warning.jpg" title="Este Campo Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="number" class="form-control" id="metosDisponivel" name="metrosDisponivel"  placeholder="{{$infraestrutura->metros_disponivel}} Metros" disabled/><br><br>
<x-label>Metragem Usada:</x-label><x-input type="number" min="1" max="{{$infraestrutura->metros_disponivel}}" class="form-control" id="metrosQtdeUsado" name="metrosQtdeUsado"  placeholder="Ex: 100" style="width:100px;"/><br><br>
<x-label>Local de Uso:</x-label><x-input type="text" class="form-control" id="local" name="local"  placeholder="Ex: Virologia"/><br><br>
</div>
<div>
<br><br><br><br><br><br><br><br><br><br><br>
<x-label>Descrição:<img src="/img/obrigatorio.png" style=" width:15px; margin-left:80px; margin-top:-18px;" title="Campo Obrigatório!"></x-label>
<textarea type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-input"  id="descricao" name="descricao" ></textarea><br><br>

</div>
<div >
  <form action="{{route('infra_edit',['id'=>$infraestrutura->id])}}" method="POST">
    @csrf 
    <form action="/infra/{{$item->id}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon></button>

    </form>
    <x-button style="background-color:rgb(10, 0, 153); margin-left:200px; margin-top:-100px" >
        {{ ('Salvar') }}
    </x-button>
   
    </div>
    </form>
</div>   
</div> 
</div>
</x-app-layout>
@endAuth
@endsection
 @section('footer')
 @endsection


 <!-- <x-label>Status:<img src="/img/orange.jpg" style="float: right; margin-right:200px;"> <img src="/img/off.png" style="float: right; margin-right:200px;"></p></x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" id="status" >
    <option value="1">Em Atividade</option>
    <option value="0">Desativado</option>
    <option value="3">Em Manutenção / Estoque</option>
</select>