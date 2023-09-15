@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="{{route('hardw_edit',['id'=>$hardware->id])}}" method="POST">
    @csrf 
    <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Editar PC TAG ".$hardware->tag ." De ".$hardware->proprietario}}</h1><br>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
      
    <div class="grid grid-cols-6 gap-6">
        
        <br>
<div>
<x-label style="color: rgb(192, 192, 192)"> TAG:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$hardware->tag}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Patrimônio:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$hardware->patrimonio}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Marca:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$hardware->marca}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Modelo:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="form-control"  placeholder="{{$hardware->modelo}}" disabled/><br><br>
<x-label style="color: rgb(192, 192, 192)">Processador:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></p></x-label><x-input type="text" class="form-control"  placeholder="{{$hardware->processador}}" disabled/><br><br>
</div>
<div>
<x-label>Nome:</x-label><x-input type="text" class="form-control" id="nome" name="nome" placeholder="{{$hardware->nome}}" /></a><br><br>
<x-label>Proprietário:</p></x-label><x-input type="text" class="form-control" id="proprietario" name="proprietario" placeholder="{{$hardware->proprietario}}"  /><br><br>
<x-label>Sistema Operacional:</p></x-label><x-input type="text" class="form-control" id="so" name="so"  placeholder="{{$hardware->so}}"/><br><br>
<x-label>Disco Rígido:</p></x-label><x-input type="text" class="form-control" id="discoRigido" name="discoRigido"  placeholder="{{$hardware->disco_rigido}}"/><br><br>
<x-label>Local:</p></x-label><x-input type="text" class="form-control" id="local" name="local"  placeholder="{{$hardware->local}}"/><br><br>
</div>
<div>
<x-label style="color: rgb(192, 192, 192)">Validade Da Garantia:<img src="/img/warning.jpg" title="Este Item Não É Editável!" style="width:20px; float:right; margin-right:100px;"></x-label><x-input type="text" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  placeholder="{{$hardware->garantia}}" disabled/><br><br>
<x-label>Placa de Rede Off Board?</x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="placaRede" id="placaRede"  >
    <option value={{$hardware->placa_rede}}>{{$hardware->placa_rede}}</option>
    <option  value="Não">Não</option>
    <option  value="Sim">Sim</option>
</select>
<x-label>Placa de Video Off Board?</x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="placaVideo" id="placaVideo" >
    <option value={{$hardware->placa_video}}>{{$hardware->placa_video}}</option>
    <option value="Não">Não</option>
    <option value="Sim">Sim</option>
</select>
<x-label>Memória RAM:</x-label>
<select name="memoria" id="memoria" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
    <option value={{$hardware->memoria}}>{{$hardware->memoria}}</option>
    <option value="1GB">1GB</option>
    <option value="2GB">2GB</option>
    <option value="4GB">4GB</option>
    <option value="8GB">8GB</option>
    <option value="10GB">10GB</option>
    <option value="12GB">12GB</option>
    <option value="16GB">16GB</option>
    <option value="32GB">32GB</option>
    <option value="64GB">64GB</option>
    <option value="128GB">128GB</option>
    <option value="256GB">256GB</option>
    <option value="512GB">512GB</option>
</select>
<x-label>Situação:</x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="situacao" id="situacao" >
    <option value="{{$hardware->situacao}}">{{$hardware->situacao}}</option>
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
        @if($hardware->status == 'on')<x-input id="status" title="Desativar Máquina" name="status" class="switch switch--shadow" onchange="verificarCheckBox()" type="checkbox" checked /><x-label for="status"></x-label>
        @else  <x-input id="status" title="Ativar Máquina"name="status" class="switch switch--shadow" onchange="verificarCheckBox()" type="checkbox" /><x-label for="status"></x-label>
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