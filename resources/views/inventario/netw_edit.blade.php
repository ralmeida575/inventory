@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="{{route('netw_edit',['id'=>$redes->id])}}" method="POST">
    @csrf 
    <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Editar Equipamento TAG ".$redes->tag}}</h1><br>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
      
    <div class="grid grid-cols-6 gap-6">
        
        <br>
<div>
<x-label style="color: rgb(192, 192, 192)"> TAG:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$redes->tag}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Patrimônio:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$redes->patrimonio}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Marca:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$redes->marca}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Modelo:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$redes->modelo}}" disabled/><br><br>
    <x-label style="color: rgb(192, 192, 192)">Portas<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label>
    <select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="placaRede" id="placaRede" disabled >
        <option value="{{$redes->portas}}">{{$redes->portas}} Portas</option>    
    </select>
</div>
<div>
<x-label>Nome:</x-label><x-input type="text" class="form-control" id="nome" name="nome" placeholder="{{$redes->nome}}" /></a><br><br>
<x-label>Gateway:</p></x-label><x-input type="text" class="form-control" id="gateway" name="gateway" placeholder="{{$redes->gateway}}"  /><br><br>
<x-label>DNS:</p></x-label><x-input type="text" class="form-control" id="dns" name="dns"  placeholder="{{$redes->dns}}"/><br><br>
<x-label>Local:</p></x-label><x-input type="text" class="form-control" id="local" name="local"  placeholder="{{$redes->local}}"/><br><br>
<x-label>Endereço de Rede:</p></x-label><x-input type="text" class="form-control"  placeholder="{{$redes->end_rede}}"/><br><br>
</div>
<div>
<x-label style="color: rgb(192, 192, 192)">Validade Da Garantia:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  placeholder="{{$redes->garantia}}" disabled/><br><br>
<x-label>Situação:</x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="situacao" id="situacao" >
    <option value="{{$redes->situacao}}">{{$redes->situacao}}-----</option>
    <option value="Operação">Operação</option>
    <option value="Manutenção">Manutenção</option>
    <option value="Reserva">Reserva</option>
</select>

<br><br>
<x-label>Descrição:<img src="/img/obrigatorio.png" style="margin-left:80px; margin-top:-18px; width:15px;" title="Campo Obrigatório!"></x-label>
<textarea type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-input"  id="descricao" name="descricao" ></textarea><br><br>

</div>
<div >
    <div class="switch__container">
        <x-label>Status</x-label>
        @if($redes->status == 'on')<x-input id="status" name="status" class="switch switch--shadow" onchange="verificarCheckBox()" type="checkbox" checked /><x-label for="status"></x-label>
        @else  <x-input id="status" name="status" class="switch switch--shadow" onchange="verificarCheckBox()" type="checkbox" /><x-label for="status"></x-label>
        @endif     
        
      </div>
     
    <x-button style="background-color:rgb(10, 0, 153); margin-left:530px; margin-top:-170px" >
        {{ ('Salvar') }}
    </x-button>
   
    </div>
    </form>
</div>   
</div> 
</div>

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