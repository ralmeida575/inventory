<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faq;
use App\Models\descricoes_faq;
use Auth;

class ControleFaq extends Controller
{
       
    public function store(Request $request)
    {
        try{

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
            $faq = new faq();
            $descricoes = new descricoes_faq();
            $faq->titulo = $request->titulo;
            $faq->assunto = $request->assunto;
            $faq->arquivo = $request->arquivo;        
            $faq->agente = $agente;
            $faq->ult_alt = $datahora;        
            $faq->save();
            $descricoes->agente_faq = $agente;
            $descricoes->descricao_texto = $request->descricao;
            $descricoes->faq_id = $faq->id;
            $descricoes->data_comentario = $datahora;
            $descricoes->alteracoes = " Este Item Foi Cadastrado.";

            $descricoes->save();
            return redirect('/dashboard');
    /* $user = auth()->user(); // pega o usuario logado*/
        } else {
            return redirect('/login');
        }
    }
    catch (Exception $e) { echo($e); }
    }

    public function faqList()
    {
        if (Auth::check()) {
            $faq = faq::get();

            return view('inventario.faq_list', ['faq' => $faq]);
        } else {
            return redirect('/login');
        }
    }

    public function show()
    {
        if (Auth::check()) {
            $faq = faq::get();

            return view('inventario.faq_list', ['faq' => $faq]);
        } else {
            return redirect('/login');
        }
    }

    public function faqItem($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_faq::with('faq')->orderBy('data_comentario', 'DESC')->get();
            $faq = faq::findOrFail($id);

            return view('inventario.faq_item', ['faq' => $faq, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $descricoes = descricoes_faq::with('faq')->orderBy('data_comentario', 'DESC')->get();
            $faq = faq::findOrFail($id);
            return view('inventario.faq_edit', ['faq' => $faq, 'descricoes' => $descricoes]);
        } else {
            return redirect('/login');
        }
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            
            $faq = faq::where('titulo', 'LIKE', "%{$request->search}%")
            ->orWhere('assunto', 'LIKE', "%{$request->search}%")
            ->orWhere('ult_alt', 'LIKE', "%{$request->search}%")
            ->paginate();
            return view('inventario.faq_list', [ 'faq' => $faq]);
        } else {
            return redirect('/login');
        }
    }

}
