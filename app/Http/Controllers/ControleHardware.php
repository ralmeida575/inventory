<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hardware;
use App\Models\descricoes_hardware;
use Auth;

class ControleHardware extends Controller
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

          
            $hardware = new hardware();
            $descricoes = new descricoes_hardware();
            $hardware->tag = $request->tag;
            $hardware->marca = $request->marca;
            $hardware->modelo = $request->modelo;
            $hardware->patrimonio = $request->patrimonio;
            $hardware->local = $request->local;
            $hardware->status = "on";
            $hardware->n_serie = $request->nSerie;
            $hardware->tipo = $request->tipo;
            $hardware->agente = $agente;
            $hardware->situacao = $request->situacao;
            $hardware->ult_alt = $datahora;
            $hardware->save();
            $descricoes->agente_hardware = $agente;
            $descricoes->descricao_texto = $request->descricao;
            $descricoes->hardware_id = $hardware->id;
            $descricoes->data_comentario = $datahora;
            $descricoes->alteracoes = " Este Item Foi Cadastrado!";

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
            $hardware = hardware::get();

            return view('inventario.hardw_list', ['hardware' => $hardware]);
        } else {
            return redirect('/login');
        }
    }

    public function hardwItem($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_hardware::with('hardware')->orderBy('data_comentario', 'DESC')->get();
            $hardware = hardware::findOrFail($id);

            return view('inventario.hardw_item', ['hardware' => $hardware, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_hardware::with('hardware')->orderBy('data_comentario', 'DESC')->get();
            $hardware = hardware::findOrFail($id);
            return view('inventario.hardw_edit', ['hardware' => $hardware, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            
            $hardware = hardware::where('marca', 'LIKE', "%{$request->search}%")
            ->orWhere('tag', 'LIKE', "%{$request->search}%")
            ->orWhere('modelo', 'LIKE', "%{$request->search}%")
            ->orWhere('num_serie', 'LIKE', "%{$request->search}%")
            ->orWhere('tipo', 'LIKE', "%{$request->search}%")
            ->orWhere('data_instal', 'LIKE', "%{$request->search}%")
            ->orWhere('ult_alt', 'LIKE', "%{$request->search}%")
            ->paginate();
            return view('inventario.hardw_list', [ 'hardware' => $hardware]);
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
            $hardware = hardware::findOrFail($id);


            if(empty($request->descricao)) {
                echo '<script>
                alert("Descreva O Motivo Da Alteração!");
                    </script>';
                        header("Refresh:0");
            }
            else{

            if ($hardware->nome != $request->nome) {
                if ($request->nome != null) {
                    $alteracoes = ' , Alterou o nome de ' . $hardware->nome . ' Para ' . $request->nome;
                }
            }

                       
            if ($hardware->gateway != $request->gateway) {
                if ($request->gateway != null) {
                    $alteracoes = $alteracoes .' , Alterou o Gateway de ' . $hardware->gateway . ' Para ' . $request->gateway;
                }
            }

            if ($hardware->dns != $request->dns) {
                if ($request->dns != null) {
                    $alteracoes = $alteracoes . ' , Alterou o DNS de ' . $hardware->dns . ' Para ' . $request->dns;
                }
            }

            if ($hardware->local != $request->local) {
                if ($request->local != null) {
                    $alteracoes = $alteracoes.' '.', Alterou o Local de ' . $hardware->local . ' Para ' . $request->local;
                }
            }

            if ($hardware->end_rede != $request->endRede) {
                if ($request->endRede != null) {
                    $alteracoes = $alteracoes.' '.', Alterou o Endereço de Rede de ' . $hardware->end_rede . ' Para ' . $request->endRede;
                }
            }


            if ($hardware->status != $request->status) {
                if ($request->status == null) {
                    $alteracoes = $alteracoes.' '.',  Desativou Essa Maquina. ';
                } elseif ($request->status == 'on') {
                    $alteracoes = $alteracoes.' '.', Reativou Essa Maquina. ';
                }
            }
            if($hardware->situacao != $request->situacao){
               if ($request->situacao == 'Manutenção') {            
                    $alteracoes = $alteracoes .' '.$hardware->nome.' Entrou em Manutenção ';}
                    elseif ($request->situacao == 'Operação'){
                        $alteracoes = $alteracoes.' '.$hardware->nome.' Entrou em Operação '; }
                         elseif ($request->situacao == 'Reserva'){
                        $alteracoes = $alteracoes.' '.$hardware->nome.' Entrou Em Reserva. ';}
                         }   

            if ($request->nome == null) {
                $hardware->nome = $hardware->nome;
            } else {
                $hardware->nome = $request->nome;
            }

            if ($request->gateway == null) {
                $hardware->gateway = $hardware->gateway;
            } else {
                $hardware->gateway = $request->gateway;
            }

            if ($request->dns == null) {
                $hardware->dns = $hardware->dns;
            } else {
                $hardware->dns = $request->dns;
            }

            if ($request->endRede == null) {
                $hardware->end_rede = $hardware->end_rede;
            } else {
                $hardware->dns = $request->dns;
            }           

            if ($request->local == null) {
                $hardware->local = $hardware->local;
            } else {
                $hardware->local = $request->local;
            }

                $hardware->ult_alt = $datahora;
                $hardware->status = $request->status;
                $hardware->situacao = $request->situacao;
                $hardware->save();
                $descricoes = descricoes_hardware::create([
                'descricao_texto' => $request->descricao,
                'hardware_id' => $hardware->id,
                'data_comentario' => $datahora,
                'agente_hardware' => $agente,
                'alteracoes' => $alteracoes]);
                $descricoes->save();
                return redirect('/dashboard'); }
        } else {
            return redirect('/login');
        }
    }


}
