<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\infraestrutura;
use App\Models\descricoes_infraestrutura;
use Auth;

class ControleInfraestrutura extends Controller
{
    public function store(Request $request)
    {


        if (Auth::check()) {
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('d/m/Y');
            $hora = date('H:i:s');
            $dataC =  strval($data);
            $horaC = strval($hora);
            $datahora = $dataC . " - " . $horaC;
            $agente = auth()->user()->name . " - " . auth()->user()->email;

          
            $infraestrutura = new infraestrutura();
            $descricoes = new descricoes_infraestrutura();
            $infraestrutura->nome = $request->nome;
            $infraestrutura->marca = $request->marca;
            $infraestrutura->modelo = $request->modelo;
            $infraestrutura->local = $request->local;
            $infraestrutura->n_serie = $request->nSerie;           
            $infraestrutura->metros_total = $request->metrosTotal;
            $infraestrutura->metros_disponivel = $request->metrosTotal;
            $infraestrutura->agente = $agente;
            $infraestrutura->ult_alt = $datahora;
            $infraestrutura->status = "1";
            $infraestrutura->save();
            $descricoes->agente_infraestrutura = $agente;
            $descricoes->descricao_texto = $request->descricao;
            $descricoes->infraestrutura_id = $infraestrutura->id;
            $descricoes->data_comentario = $datahora;
            $descricoes->alteracoes = " Este Item Foi Cadastrado.";
            $descricoes->save();
            return redirect('/dashboard');
    /* $user = auth()->user(); // pega o usuario logado*/
        } else {
            return redirect('/login');
        }
    }

    public function show()
    {
        if (Auth::check()) {
            $infraestrutura = infraestrutura::get();

            return view('inventario.infra_list', ['infraestrutura' => $infraestrutura]);
        } else {
            return redirect('/login');
        }
    }

    public function infraItem($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_infraestrutura::with('infraestrutura')->orderBy('data_comentario', 'DESC')->get();
            $infraestrutura = infraestrutura::findOrFail($id);

            return view('inventario.infra_item', ['infraestrutura' => $infraestrutura, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_infraestrutura::with('infraestrutura')->orderBy('data_comentario', 'DESC')->get();
            $infraestrutura = infraestrutura::findOrFail($id);
            return view('inventario.infra_edit', ['infraestrutura' => $infraestrutura, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            
            $infraestrutura = infraestrutura::where('nome', 'LIKE', "%{$request->search}%")
            ->orWhere('marca', 'LIKE', "%{$request->search}%")
            ->orWhere('modelo', 'LIKE', "%{$request->search}%")
            ->orWhere('tipo', 'LIKE', "%{$request->search}%")
            ->orWhere('metros_disponivel', 'LIKE', "%{$request->search}%")
            ->orWhere('local', 'LIKE', "%{$request->search}%")
            ->paginate();
            return view('inventario.infra_list', [ 'infraestrutura' => $infraestrutura]);
        } else {
            return redirect('/login');
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('d/m/Y');
            $hora = date('H:i:s');
            $dataC =  strval($data);
            $horaC = strval($hora);
            $datahora = $dataC . " - " . $horaC;
            $agente = auth()->user()->name . " - " . auth()->user()->email;
            $alteracoes = "";
            $infraestrutura = infraestrutura::findOrFail($id);
            $idAux = $infraestrutura->id;
            $metrosDisponivel = $infraestrutura->metros_disponivel - $request->metrosQtdeUsado;
            $statusAux = "";
            
            

            if(empty($request->descricao)) {
                echo '<script>
                alert("Descreva O Motivo Da Alteração!");
                    </script>';
                        header("Refresh:0");
            }
            else{      

                if ($metrosDisponivel  < '30') {
                    $statusAux = '2';
                   }
                   elseif ($metrosDisponivel == '0'){
                    $statusAux = '0';
                    
                    }
                    else  {  $statusAux = '1';
                    } 

                if ($request->metrosQtdeUsado != null) {
                    $alteracoes  = $alteracoes. ' Utilizou ' . $request->metrosQtdeUsado. ' Metros Em: ' .$request->local;
                }     

            if ($request->nome == null) {
                $infraestrutura->nome = $infraestrutura->nome;
            } else {
                $infraestrutura->nome = $request->nome;
            }

            if ($request->local == null) {
                $infraestrutura->local = $infraestrutura->local;
            } else {
                $infraestrutura->local = $request->local;
            }
               
                $infraestrutura->ult_alt = $datahora;               
                $infraestrutura->metros_disponivel = $metrosDisponivel;  
                $infraestrutura->status = $statusAux;                         
                $infraestrutura->save();

                $descricoes = descricoes_infraestrutura::create([
                'descricao_texto' => $request->descricao,                
                'data_comentario' => $datahora,
                'agente_infraestrutura' => $agente,
                'alteracoes' => $alteracoes,
                'infraestrutura_id' => $infraestrutura->id]);
                $descricoes->save();                

                $descricoes->save();
                return redirect('/dashboard'); }
        } else {
            return redirect('/login');
        }
    }

    public function destroy() {

        infraestrutura::findOrFail($id)->delete();
        return redirect ('/dashboard')->with('msg', 'Item Excluído' );
    }

 

}
