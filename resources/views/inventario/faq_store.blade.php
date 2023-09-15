@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="/faq/store" method="POST">
    @csrf 
    <h2 class="font-semibold text-xl text-gray-800 " style="margin: 25px;">Cadastrar Artigo de FAQ</h2>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
       
    <div class="grid grid-cols-6 gap-6">
        
        <br>
        <div></div>
<div>
<x-label>Título:<p style="color:red; float:right; width:230px" title="Campo Obrigatório"><img src="/img/obrigatorio.png"></p></x-label><x-input type="text" class="form-control" id="titulo" name="titulo"  /><br><br>
<x-label>Assunto:</x-label><x-input type="text" class="form-control" id="assunto" name="assunto" placeholder="Ex: Dell" /><br><br>

</div>
<div>
<x-label for="filePicker">Escolha o Arquivo a ser Submetido:</x-label><x-input
  type="file"
  id="arquivo"
  ref="file"
  name="arquivo"
  accept=".doc,.docx,.pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
  <br><br>
<x-label for="descricao">Descrição:</x-label>
<textarea type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-input"  id="descricao" name="descricao" placeholder="Descrição" required></textarea><br><br>
</div>
</div>
<div >
    <x-button style="background-color: blue; margin-left:1800px; margin-top:-380px;" >
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
