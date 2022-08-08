<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Dados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        error_reporting(0);
        $results = DB::table('dados')->where('user_id', auth()->user()->id)->first();

        return view('site.dados.index', [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'result' => $results
        ]);
    }

    public function form(Request $request)
    {
        $results = DB::table('dados')->where('user_id', auth()->user()->id)->first();
        $post = $request->all();
        $post['user_id'] = auth()->user()->id;

        if($post['name'] != auth()->user()->name)
        {
            $affected = DB::table('users')
                ->where('id', $post['user_id'])
                ->update(['name' => $post['name']]);
        }

        if ($results) {
            $affected = DB::table('dados')
                ->where('user_id', $post['user_id'])
                ->update([
                    'nacionalidade' => $post['nacionalidade'],
                    'naturalidade'  => $post['naturalidade'],
                    'sexo'          => $post['sexo'],
                    'nascimento'    => date('Y-m-d', strtotime($post['nascimento'])),
                    'rg'            => $post['rg'],
                    'emissor'       => $post['emissor'],
                    'dataemissao'   => date('Y-m-d', strtotime($post['dataemissao'])), 
                    'cpf'           => $post['cpf'],
                    'pai'           => $post['pai'],
                    'mae'           => $post['mae'],
                    'endereco'      => $post['endereco'],
                    'numero'        => $post['numero'],
                    'bairro'        => $post['bairro'],
                    'cep'           => $post['cep'],
                    'cidade'        => $post['cidade'],
                    'estado'        => $post['estado'],
                    'pais'          => $post['pais'],
                    'telefone'      => $post['telefone'],
                    'fax'           => $post['fax'],
                    'homepage'      => $post['homepage']
                ]);
        } else {
             $exnascimento = explode('-', $post['nascimento']);
             $exemissao = explode('-', $post['dataemissao']);
             $post['nascimento'] = $exnascimento['2'].'-'.$exnascimento['1'].'-'.$exnascimento['0'];
             $post['dataemissao'] = $exemissao['2'].'-'.$exemissao['1'].'-'.$exemissao['0'];
             $dados = Dados::create($post);
        }

        return redirect('/dados');
    }
}
