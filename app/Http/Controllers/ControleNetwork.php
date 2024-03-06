<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\descricoes_redes;
use App\Models\redes;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;


class ControleNetwork extends Controller
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

          
            $redes = new redes();
            $descricoes = new descricoes_redes();
            $redes->tag = $request->tag;
            $redes->nome = $request->nome;
            $redes->marca = $request->marca;
            $redes->modelo = $request->modelo;
            $redes->end_rede = $request->endRede;
            $redes->patrimonio = $request->patrimonio;
            $redes->local = $request->local;
            $redes->status = "on";
            $redes->n_serie = $request->nSerie;
            $redes->gateway = $request->gateway;
            $redes->portas = $request->portas;
            $redes->dns = $request->dns;
            $redes->tipo = $request->tipo;
            $redes->agente = $agente;
            $redes->situacao = $request->situacao;
            $redes->ult_alt = $datahora;
            $redes->save();
            $descricoes->agente_redes = $agente;
            $descricoes->descricao_texto = $request->descricao;
            $descricoes->redes_id = $redes->id;
            $descricoes->data_comentario = $datahora;
            $descricoes->alteracoes = " Este Item Foi Cadastrado!";

            $descricoes->save();
            return redirect('/dashboard');
    /* $user = auth()->user(); // pega o usuario logado*/
        } else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_redes::with('redes')->orderBy('data_comentario', 'DESC')->get();
            $redes = redes::findOrFail($id);
            return view('inventario.netw_edit', ['redes' => $redes, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function netwItem($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_redes::with('redes')->orderBy('data_comentario', 'DESC')->get();
            $redes = redes::findOrFail($id);

            return view('inventario.netw_item', ['redes' => $redes, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function show()
    {
        if (Auth::check()) {
            $redes = redes::get();

            return view('inventario.netw_list', ['redes' => $redes]);
        } else {
            return redirect('/login');
        }
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            
            $redes = redes::where('nome', 'LIKE', "%{$request->search}%")
            ->orWhere('tag', 'LIKE', "%{$request->search}%")
            ->orWhere('marca', 'LIKE', "%{$request->search}%")
            ->orWhere('modelo', 'LIKE', "%{$request->search}%")
            ->orWhere('end_rede', 'LIKE', "%{$request->search}%")
            ->orWhere('local', 'LIKE', "%{$request->search}%")
            ->orWhere('ult_alt', 'LIKE', "%{$request->search}%")
            ->paginate();
            return view('inventario.netw_list', [ 'redes' => $redes]);
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

            $redes = redes::findOrFail($id);


            if(empty($request->descricao)) {
                echo '<script>
                alert("Descreva O Motivo Da Alteração!");
                    </script>';
                        header("Refresh:0");
            }
            else{

            if ($redes->nome != $request->nome) {
                if ($request->nome != null) {
                    $alteracoes = ' Alterou o nome de ' . $redes->nome . ' Para ' . $request->nome;
                }
            }

                       
            if ($redes->gateway != $request->gateway) {
                if ($request->gateway != null) {
                    $alteracoes = $alteracoes .' Alterou o Gateway de ' . $redes->gateway . ' Para ' . $request->gateway;
                }
            }

            if ($redes->dns != $request->dns) {
                if ($request->dns != null) {
                    $alteracoes = $alteracoes . ' Alterou o DNS de ' . $redes->dns . ' Para ' . $request->dns;
                }
            }

            if ($redes->local != $request->local) {
                if ($request->local != null) {
                    $alteracoes = $alteracoes.' '.', Alterou o Local de ' . $redes->local . ' Para ' . $request->local;
                }
            }

            if ($redes->end_rede != $request->endRede) {
                if ($request->endRede != null) {
                    $alteracoes = $alteracoes.' '.', Alterou o Endereço de Rede de ' . $redes->end_rede . ' Para ' . $request->endRede;
                }
            }


            if ($redes->status != $request->status) {
                if ($request->status == null) {
                    $alteracoes = $alteracoes.' '.',  Desativou Essa Maquina. ';
                } elseif ($request->status == 'on') {
                    $alteracoes = $alteracoes.' '.', Reativou Essa Maquina. ';
                }
            }
            if($redes->situacao != $request->situacao){
               if ($request->situacao == 'Manutenção') {            
                    $alteracoes = $alteracoes .' '.$redes->nome.' Entrou em Manutenção ';}
                    elseif ($request->situacao == 'Operação'){
                        $alteracoes = $alteracoes.' '.$redes->nome.' Entrou em Operação '; }
                         elseif ($request->situacao == 'Reserva'){
                        $alteracoes = $alteracoes.' '.$redes->nome.' Entrou Em Reserva. ';}
                         }   

            if ($request->nome == null) {
                $redes->nome = $redes->nome;
            } else {
                $redes->nome = $request->nome;
            }

            if ($request->gateway == null) {
                $redes->gateway = $redes->gateway;
            } else {
                $redes->gateway = $request->gateway;
            }

            if ($request->dns == null) {
                $redes->dns = $redes->dns;
            } else {
                $redes->dns = $request->dns;
            }

            if ($request->endRede == null) {
                $redes->end_rede = $redes->end_rede;
            } else {
                $redes->dns = $request->dns;
            }           

            if ($request->local == null) {
                $redes->local = $redes->local;
            } else {
                $redes->local = $request->local;
            }

                $redes->ult_alt = $datahora;
                $redes->status = $request->status;
                $redes->situacao = $request->situacao;
                $redes->save();
                $descricoes = descricoes_redes::create([
                'descricao_texto' => $request->descricao,
                'redes_id' => $redes->id,
                'data_comentario' => $datahora,
                'agente_redes' => $agente,
                'alteracoes' => $alteracoes]);
                $descricoes->save();
                return redirect('/dashboard'); }
        } else {
            return redirect('/login');
        }
    }

    
}

/*    if(empty($request->descricao)) {
                echo '<script>
                alert("Descreva O Motivo Da Alteração!");
                    </script>';
                        header("Refresh:0");
            }

          else { */






