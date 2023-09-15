@extends('inventario.index')
@section('header')
@endsection
@section('content')
@Auth
<div>   
    <form action="{{route('faq_edit',['id'=>$faq->id])}}" method="POST">
    @csrf 
    <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Editar PC TAG ".$faq->tag ." De ".$faq->proprietario}}</h1><br>
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
      
    <div class="grid grid-cols-6 gap-6">
        
        <br>
<div>
<x-label> Título:</x-label><x-input type="text" class="form-control"  placeholder="{{$faq->titulo}}"/><br><br>
<x-label>Assunto:</x-label><x-input type="text" class="form-control"  placeholder="{{$faq->assunto}}"/><br><br>
</div>
<div>


<x-label>Anexo:</x-label><x-input type="file" class="form-control"  placeholder="{{$faq->arquivo}}"/><br><br>
<x-label>Descrição:<img src="/img/obrigatorio.png" style="margin-left:80px; margin-top:-18px; width:15px;" title="Campo Obrigatório!"></x-label>
<textarea type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-input"  id="descricao" name="descricao" ></textarea><br><br>

</div>
    <div>     
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
