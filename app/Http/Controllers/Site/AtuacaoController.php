<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Atuacao;

class AtuacaoController extends Controller
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
        $atuacao = DB::table('atuacaos')
        ->select('atuacaos.id as idtabela','atuacaos.*', 'statuses.*' )
        ->leftJoin('statuses', 'statuses.id', '=', 'atuacaos.status_id')
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.atuacao.index', [
                'atuacao' => $atuacao
        ]);
    }

    public function cadastro()
    {
        return view('site.atuacao.cadastro');
    }

    public function form(Request $request)
    {
        $post = $request->all();
      
                $post = $request->all();
                $post['user_id'] = auth()->user()->id;
                $post['status_id'] = 3; //Status Análise
                $dados = Atuacao::create($post);

                if ($dados) {
                    toastr()->success('Tempo de Atuação Profissional no Âmbito da Certificação foi enviado com sucesso', 'Sucesso');
                    return redirect('/atuacao/cadastro');
                } else {
                    toastr()->error('Erro ao enviar Tempo de Atuação Profissional no Âmbito da Certificação', 'Erro');
                    return redirect('/atuacao/cadastro');
                }
    }

    public static function ponto()
    {
        error_reporting(0);
        $trabalho = DB::table('atuacaos')->select()->where('user_id', '=', auth()->user()->id)->get();

        if ($trabalho) {
            $valortotal = '';
            foreach ($trabalho as $ponto) {
                $valortotal += $ponto->previaponto;
            }

            if ($valortotal > 0) {
                    if($valortotal > 20)
                    {
                        $return = 20;
                    }else{
                        $return = $valortotal;
                    }
            } else {
                $return = 0;
            }
        } else {
            $return = 0;
        }
        return $return;
    }

}
