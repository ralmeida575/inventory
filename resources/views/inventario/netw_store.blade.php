@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="/netw/store" method="POST">
    @csrf 
    <h2 class="font-semibold text-xl text-gray-800 " style="margin: 25px;">Cadastrar Ativo de Redes</h2>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
       
    <div class="grid grid-cols-6 gap-6">
        
        <br>
<div>
<x-label> TAG:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="tag" name="tag" placeholder="Ex: 0001" /><br><br>
<x-label>Nome:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: PRÉDIO-PRINCIPAL-2ANDAR" /><br><br>
<x-label>Marca:</x-label><x-input type="text" class="form-control" id="marca" name="marca" placeholder="Ex: Unifi" /><br><br>
<x-label>Modelo:</x-label><x-input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex: Ubiquiti" /><br><br>
<x-label>Endereço de Rede:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="endRede" name="endRede" placeholder="Ex: 192.168.0.1" /><br><br>
</div>
<div>    
<x-label>Patrimônio</x-label><x-input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Nº de Patrimônio" /><br><br>
<x-label>Local de Instalação:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="local" name="local" placeholder="Ex: Prédio Principal SEDE" /><br><br>
<x-label>Nº Série:</p></x-label><x-input type="text" class="form-control" id="nSerie" name="nSerie" placeholder="Ex: S/N ABCD123456789" /><br><br>
<x-label>Tipo:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ex: Roteador, Switch..." /><br><br>
<x-label>Gateway:</p></x-label><x-input type="text" class="form-control" id="gateway" name="gateway" placeholder="Ex: 255.255.255.0" /><br><br>
</div>
<div>
<x-label>DNS:</x-label><x-input type="text" class="form-control" id="dns" name="dns" placeholder="Ex: 255.255.255.0" /><br><br>
<x-label>Validade Da Garantia:</x-label><x-input type="date" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="dataGarantia" name="dataGarantia" placeholder="Validade Da Garantia" /><br><br>
<x-label>Situação:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="situacao" id="situacao" >
    <option value="Operação">Em Operação</option>
    <option value="Reserva">Em Reserva</option>
</select>
<x-label>Portas:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="portas" id="portas" >
    <option value=""></option>
    <option value="8">8 Portas</option>
    <option value="16">16 Portas</option>
    <option value="24">24 Portas</option>
    <option value="48">48 Portas</option>
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
