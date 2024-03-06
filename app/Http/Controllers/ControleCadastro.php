<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\computadores;
use App\Models\descricoes_computadores;
use App\Models\redes;
use App\Models\hardware;
use App\Models\infraestrutura;
use App\Models\faq;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class ControleCadastro extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $computadores = computadores::all();
            $descricoes = descricoes_computadores::all();
            $redes = redes::all();
            $inventario = inventario::all();
            return view('inventario.index', ['computadores' => $computadores, 'descricoes' => $descricoes, 'redes' => $redes, 'inventario' => $inventario]);
        } else {
            return redirect('/login');
        }
    }
   
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

            /*if(empty($request->nome) or empty($request->proprietario) or empty($request->so)  or empty($request->discoRigido) or empty($request->local)) {
                echo '<script>
                alert("Preencha todos os campos!");
                    </script>';
                        header("Refresh:0");
            }
            else{} */
            $computadores = new computadores();
            $descricoes = new descricoes_computadores();
            $computadores->tag = $request->tag;
            $computadores->nome = $request->nome;
            $computadores->marca = $request->marca;
            $computadores->modelo = $request->modelo;
            $computadores->proprietario = $request->proprietario;
            $computadores->so = $request->so;
            $computadores->processador = $request->processador;
            $computadores->memoria = $request->memoria;
            $computadores->disco_rigido = $request->discoRigido;
            $computadores->ult_alt = $datahora;
            $computadores->status = "on";
            $computadores->placa_video = $request->placaVideo;
            $computadores->placa_rede = $request->placaRede;
            $computadores->garantia = $request->dataGarantia;
            $computadores->patrimonio = $request->patrimonio;
            $computadores->agente = $agente;
            $computadores->local = $request->local;
            $computadores->situacao = $request->situacao;
            $computadores->save();
            $descricoes->agente_computadores = $agente;
            $descricoes->descricao_texto = $request->descricao;
            $descricoes->computadores_id = $computadores->id;
            $descricoes->data_comentario = $datahora;
            $descricoes->alteracoes = " Este Item Foi Cadastrado!";

            $descricoes->save();
            return redirect('/dashboard');
    /* $user = auth()->user(); // pega o usuario logado*/
        } else {
            return redirect('/login');
        }
    }

    public function compList()
    {
        if (Auth::check()) {
            $computadores = computadores::get();

            return view('inventario.comp_list', ['computadores' => $computadores]);
        } else {
            return redirect('/login');
        }
    }
    
    public function showHome()
    {
        if (Auth::check()) {
            $computadores = computadores::get();
            $redes = redes::get();
            $hardware = hardware::get();
            $infraestrutura = infraestrutura::get();
            $faq = faq::get();
            return view('inventario.home',['computadores' => $computadores, 'redes' => $redes, 'hardware' => $hardware, 'infraestrutura' => $infraestrutura, 'faq' => $faq] );
        } else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_computadores::with('computadores')->orderBy('data_comentario', 'DESC')->get();
            $computadores = computadores::findOrFail($id);
            return view('inventario.comp_edit', ['computadores' => $computadores, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function listComp($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_computadores::with('computadores')->orderBy('data_comentario', 'DESC')->get();
            $computadores = computadores::findOrFail($id);
            return view('inventario.comp_item', ['computadores' => $computadores, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    

    public function search(Request $request)
    {
        if (Auth::check()) {
            
            $computadores = computadores::where('proprietario', 'LIKE', "%{$request->search}%")
            ->orWhere('tag', 'LIKE', "%{$request->search}%")
            ->orWhere('memoria', 'LIKE', "%{$request->search}%")
            ->orWhere('processador', 'LIKE', "%{$request->search}%")
            ->orWhere('ult_alt', 'LIKE', "%{$request->search}%")
            ->paginate();
            return view('inventario.comp_list', [ 'computadores' => $computadores]);
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
            $computadores = computadores::findOrFail($id);


            if (empty($request->descricao)) {
                echo '<script>
                alert("Descreva O Motivo Da Alteração!");
                    </script>';
                        header("Refresh:0");
            }
            else{

            if ($computadores->nome != $request->nome) {
                if ($request->nome != null) {
                    $alteracoes = ' Alterou o nome de ' . $computadores->nome . ' Para ' . $request->nome;
                }
            }
            if ($computadores->proprietario != $request->proprietario) {
                if ($request->proprietario != null) {
                    $alteracoes = $alteracoes.' '.', Alterou o Proprietario de ' . $computadores->proprietario . ' Para ' . $request->proprietario;
                }
            }
            if ($computadores->so != $request->so) {
                if ($request->so != null) {
                    $alteracoes = $alteracoes.' '.', Atualizou o S.O de ' . $computadores->so . ' Para ' . $request->so;
                }
            }
            if ($computadores->memoria != $request->memoria) {
                if ($request->memoria != null) {
                    $alteracoes = $alteracoes.' '.', Alterou a RAM de ' . $computadores->memoria . ' Para ' . $request->memoria;
                }
            }
            if ($computadores->disco_rigido != $request->discoRigido) {
                if ($request->discoRigido != null) {
                    $alteracoes = $alteracoes.' '.', Alterou o Armazenamento de ' . $computadores->disco_rigido . ' Para ' . $request->discoRigido;
                }
            }
            if ($computadores->local != $request->local) {
                if ($request->local != null) {
                    $alteracoes = $alteracoes.' '.', Alterou o Local de ' . $computadores->local . ' Para ' . $request->local;
                }
            }
            if ($computadores->status != $request->status) {
                if ($request->status == null) {
                    $alteracoes = $alteracoes.' '.',  Desativou Essa Maquina! ';
                } elseif ($request->status == 'on') {
                    $alteracoes = $alteracoes.' '.', Reativou Essa Maquina! ';
                }
            }
            if($computadores->situacao != $request->situacao){
               if ($request->situacao == 'Manutenção') {            
                    $alteracoes = $alteracoes .' '.$computadores->nome.' Entrou em Manutenção ';}
                    elseif ($request->situacao == 'Operação'){
                        $alteracoes = $alteracoes.' '.$computadores->nome.' Entrou em Operação '; }
                         elseif ($request->situacao == 'Reserva'){
                        $alteracoes = $alteracoes.' '.$computadores->nome.' Entrou Em Reserva. ';}
                         }
                
                if ($computadores->placa_video != $request->placaVideo) {
                if ($request->placaVideo == 'Não') {
                    $alteracoes = $alteracoes.' '.', Removeu a Placa de Video. ';
                } elseif ($request->placaVideo == 'Sim') {
                    $alteracoes = $alteracoes.' '.', Adicionou uma Placa de Video. ';
                }
            }

            if ($computadores->placa_rede != $request->placaRede) {
                if ($request->placaRede == 'Sim') {
                    $alteracoes = $alteracoes.' '.', Adicionou uma Placa de Rede. ';
                } elseif ($request->placaRede == 'Não') {
                    $alteracoes = $alteracoes.' '.', Removeu a Placa de Rede. ';
                }
            }

            if ($request->nome == null) {
                $computadores->nome = $computadores->nome;
            } else {
                $computadores->nome = $request->nome;
            }

            if ($request->so == null) {
                $computadores->so = $computadores->so;
            } else {
                $computadores->so = $request->so;
            }
            if ($request->proprietario == null) {
                $computadores->proprietario = $computadores->proprietario;
            } else {
                $computadores->proprietario = $request->proprietario;
            }
            if ($request->memoria == null) {
                $computadores->memoria = $computadores->memoria;
            } else {
                $computadores->memoria = $request->memoria;
            }
            if ($request->discoRigido == null) {
                $computadores->disco_rigido = $computadores->disco_rigido;
            } else {
                $computadores->disco_rigido = $request->discoRigido;
            }
            if ($request->local == null) {
                $computadores->local = $computadores->local;
            } else {
                $computadores->local = $request->local;
            }

                $computadores->ult_alt = $datahora;
                $computadores->status = $request->status;
                $computadores->placa_video = $request->placaVideo;
                $computadores->placa_rede = $request->placaRede;
                $computadores->situacao = $request->situacao;
                $computadores->save();
                $descricoes = descricoes_computadores::create([
                'descricao_texto' => $request->descricao,
                'computadores_id' => $computadores->id,
                'data_comentario' => $datahora,
                'agente_computadores' => $agente,
                'alteracoes' => $alteracoes]);
                $descricoes->save();
                return redirect('/dashboard'); 
            }
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
