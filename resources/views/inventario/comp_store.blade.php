@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="/comp/store" method="POST">
    @csrf 
    <h2 class="font-semibold text-xl text-gray-800 " style="margin: 25px;">Cadastrar Computador/Servidor</h2>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
       
    <div class="grid grid-cols-6 gap-6">
        
        <br>
<div>
<x-label> TAG:<p style="color:red; float:right; width:230px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="tag" name="tag" placeholder="Ex: 0001" /><br><br>
<x-label>Nome:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: PC0001-SEDE" /><br><br>
<x-label>Marca:</x-label><x-input type="text" class="form-control" id="marca" name="marca" placeholder="Ex: Dell" /><br><br>
<x-label>Modelo:</x-label><x-input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex: Vostro" /><br><br>
<x-label>Proprietário:<p style="color:red; float:right; width:180px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="proprietario" name="proprietario" placeholder="Ex: Dr da Batata" /><br><br>
</div>
<div>    
<x-label>Processador:<p style="color:red; float:right; width:180px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="processador" name="processador" placeholder="Ex: Corei5" /><br><br>
<x-label>Sistema Operacional:<p style="color:red; float:right; width:128px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="so" name="so" placeholder="Ex: Windows 10" /><br><br>
<x-label>Disco Rígido:<p style="color:red; float:right; width:180px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="discoRigido" name="discoRigido" placeholder="Ex: 500GB HD/SSD" /><br><br>
<x-label>Patrimônio</x-label><x-input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Nº de Patrimônio" /><br><br>
<x-label>Local:<p style="color:red; float:right; width:225px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="local" name="local" placeholder="Ex: Virologia CEC" /><br><br>
</div>
<div>
<x-label>Validade Da Garantia:</x-label><x-input type="date" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="dataGarantia" name="dataGarantia" placeholder="Validade Da Garantia" /><br><br>
<x-label>Rede Off Board?</x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="placaRede" id="placaRede" >
    <option  value="Não">Não</option>
    <option  value="Sim">Sim</option>
</select>
<x-label>Video Off Board?</x-label>
<select class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="placaVideo" id="placaVideo">
    <option value="Não">Não</option>
    <option value="Sim">Sim</option>
</select>
<x-label>Memória RAM:<p style="color:red; float:right; width:170px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label>
<select name="memoria" id="memoria" class="select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
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
    <option value="Operação">Em Operação</option>
    <option value="Manutenção">Em Manutenção</option>
    <option value="Reserva">Em Reserva</option>
</select>
<br><br>
<x-label>Descrição:</x-label>
<textarea type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-input"  id="descricao" name="descricao" placeholder="Descrição" required></textarea><br><br>
</div>
<div >
    <x-button style="background-color: blue; margin-left:530px; margin-top:-90px" >
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
