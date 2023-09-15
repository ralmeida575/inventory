@extends('inventario.index')
@section('header')
@endsection
@section('content') 
@Auth
<div >
  <h1 class="font-semibold text-xl text-gray-800 " style="margin: 25px;"> {{" Visualizando Item ".$faq->titulo}}</h1><br>
  <div  class="px-4 py-5  sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm  border-t"><b>Ultima Alteração: </b>{{$faq->ult_alt}}<b><br> Por: </b>{{ $faq->agente}}</x-label>

    <div class="grid grid-cols-6 gap-6">
      <div>
      
        <h2 class="font-semibold text-xl text-gray-800 ">Ultimas Atualizações:</h2>
        @foreach ($descricoes as $item )
      
        @if ($item->faq_id == $faq->id )
        <ul class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t">
          <li><b>{{$item->agente_faq}}</b>{{$item->alteracoes}}<br><b>Descrição:</b>{{" ".$item->descricao_texto }}<b><small><br />{{ $item->data_comentario}}</small></b><br></li>
        </ul>
        @endif
        @endforeach
  
      </div>

      
      <br>

        <div>    
          <br>    
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>TAG: </b>{{$faq->titulo}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Nome:</b> {{$faq->assunto}}</x-label>
      <x-label class="overflow-hidden shadow sm:rounded-lg mt-2 text-gray-600 text-sm p-6 border-t"><b>Marca: </b>{{$faq->arquivo}}</x-label>
        </div>
        <div>
          <br>  
   

      
</div>
<div style="margin-top: 30px">
<a href={{'/faq/edit/'. $faq->id}} style="float:left"><img src="/img/edit.png"  title="Editar"></a>
</div>

</div>
</div>
</div>


@endAuth
@endsection
@section('footer')
@endsection

  