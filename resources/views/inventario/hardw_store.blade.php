@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="/hardw/store" method="POST">
    @csrf 
    <h2 class="font-semibold text-xl text-gray-800 " style="margin: 25px;">Cadastrar Hardware</h2>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
       
    <div class="grid grid-cols-6 gap-6">
        
        <br>
<div>
<x-label>TAG:</p></x-label><x-input type="text" class="form-control" id="tag" name="tag" placeholder="Ex: Unifi" /><br><br>
<x-label>Marca:</p></x-label><x-input type="text" class="form-control" id="marca" name="marca" placeholder="Ex: Unifi" /><br><br>
<x-label>Modelo:</p></x-label><x-input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex: Ubiquiti" /><br><br>
<x-label>Proprietario:</p></x-label><x-input type="text" class="form-control" id="proprietario" name="proprietario" placeholder="Ex: Dr." /><br><br>

</div>
<div>    
<x-label>Patrimônio</x-label><x-input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Nº de Patrimônio" /><br><br>
<x-label>Nº Série:</x-label><x-input type="text" class="form-control" id="nSerie" name="nSerie" placeholder="Ex: S/N ABCD123456789" /><br><br>
<x-label>Tipo:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></p></x-label><x-input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ex: Roteador, Switch..." /><br><br>
<x-label>Fornecedor:</x-label><x-input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Nº de Patrimônio" /><br><br>
</div>
<div>
<x-label>Local:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="local" name="local" placeholder="Local" /><br><br>
<x-label>Validade Da Garantia:</x-label><x-input type="date" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="dataGarantia" name="dataGarantia" placeholder="Validade Da Garantia" /><br><br>
<x-label>Data de Instalação:</x-label><x-input type="date" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="dataInstal" name="dataInstal" placeholder="Data de Instalação" /><br><br>
<x-label>Situação<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="situacao" id="situacao">
    <option value="Reserva">Reserva</option>
    <option value="Manutenção">Manutenção</option>
    <option value="Em Atividade">Em Atividade</option>
    
</select>
<br><br>
<x-label>Descrição:</x-label>
<textarea type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-input"  id="descricao" name="descricao" placeholder="Descrição"></textarea><br><br>

</div>
<div>
   
</div>
<div>
    <x-button style="background-color: blue; margin-left:120px; margin-top:-90px" >
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
