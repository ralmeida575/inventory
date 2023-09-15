@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="/infra/store" method="POST">
    @csrf 
    <h2 class="font-semibold text-xl text-gray-800 " style="margin: 25px;">Cadastrar Material de InfraEstrutura</h2>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
       
    <div class="grid grid-cols-6 gap-6">
        
        <br>
<div>
<x-label>Nome:<p style="color:red;  float:right; width:218px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: PRÉDIO-PRINCIPAL-2ANDAR" /><br><br>
<x-label>Marca:</x-label><x-input type="text" class="form-control" id="marca" name="marca" placeholder="Ex: Unifi" /><br><br>
<x-label>Modelo:</x-label><x-input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex: Ubiquiti" /><br><br>
</div>
<div>    
<x-label>Nº Série:</p></x-label><x-input type="text" class="form-control" id="nSerie" name="nSerie" placeholder="Ex: S/N ABCD123456789" /><br><br>
<x-label>Metragem:</x-label><x-input type="number" class="form-control" id="metrosTotal" name="metrosTotal" placeholder="Ex: 300" />
<br><br>
</div>
<div>
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
