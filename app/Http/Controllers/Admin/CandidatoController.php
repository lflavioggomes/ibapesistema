<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatoController extends Controller
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
        //tipo_id 2 é de candidato

        $candidato = DB::table('users')->select()->where('tipo_id', '=', 2)->get();
        return view('admin.candidato.index', [
            'candidato' => $candidato,
            'name' => auth()->user()->name,
        ]);
    }

    public function list()
    {
        $id = $_GET['id'];
        $dados = DB::table('dados')
            ->leftJoin('statuses', 'statuses.id', '=', 'dados.status_id')
            ->select('statuses.status', 'dados.id')
            ->where('dados.user_id', '=', $id)
            ->get();

        $requerimentos = DB::table('requerimentos')
            ->leftJoin('statuses', 'statuses.id', '=', 'requerimentos.status_id')
            ->select('statuses.status', 'requerimentos.id')
            ->where('requerimentos.user_id', '=', $id)
            ->get();

        $declaracao = DB::table('atestados')
            ->leftJoin('statuses', 'statuses.id', '=', 'atestados.status_id')
            ->select('statuses.status', 'atestados.id')
            ->where('atestados.user_id', '=', $id)
            ->get();

        $diplomas = DB::table('diplomas')
            ->leftJoin('statuses', 'statuses.id', '=', 'diplomas.status_id')
            ->select('statuses.status', 'diplomas.id')
            ->where('diplomas.user_id', '=', $id)
            ->get();

        $solicitacao = DB::table('solicitacao')
            ->leftJoin('statuses', 'statuses.id', '=', 'solicitacao.status_id')
            ->select('statuses.status', 'solicitacao.id')
            ->where('solicitacao.user_id', '=', $id)
            ->get();

        $comprovantes = DB::table('comprovantes')
            ->leftJoin('statuses', 'statuses.id', '=', 'comprovantes.status_id')
            ->select('statuses.status', 'comprovantes.id')
            ->where('comprovantes.user_id', '=', $id)
            ->get();

        return view('admin.candidato.list', [
            'dados' => $dados,
            'requerimentos' => $requerimentos,
            'declaracao' => $declaracao,
            'diplomas' => $diplomas,
            'solicitacao' => $solicitacao,
            'comprovantes' => $comprovantes,
        ]);
    }

    public function dado()
    {
        error_reporting(0);
        $id =  $_GET['id'];

        $dados = DB::table('dados')->where('id', $id)->first();

        if (empty($dados)) {
            return redirect('candidato');
        }

        $user = DB::table('users')->where('id', $dados->user_id)->first();

        return view('admin.candidato.dado', [
            'result' => $dados,
            'user' => $user
        ]);
    }

    public static function prequalificacao($id)
    {
        error_reporting(0);
        $dados = DB::table('dados')->where('user_id', $id)->first();
        $requerimento = DB::table('requerimentos')->where('user_id', $id)->first();
        $declaracao = DB::table('atestados')->where('user_id', $id)->first();
        $diploma = DB::table('diplomas')->where('user_id', $id)->first();
        $solicitacao = DB::table('solicitacao')->where('user_id', $id)->first();
        $comprovante = DB::table('comprovantes')->where('user_id', $id)->first();
        $confirm = DB::table('confirms')->where('user_id', $id)->first();

        if (!empty($dados) && !empty($requerimento) && !empty($declaracao) && !empty($diploma) && !empty($solicitacao) && !empty($comprovante)) {
            $valida = 'Completa';
        } else {
            $valida = 'Incompleta';
        }

        return $valida;
    }

    public static function profissao($id)
    {
        error_reporting(0);
        $profissao =  DB::table('dados')->where('user_id', $id)->first();

        if ($profissao->formacao) {
            $return = $profissao->formacao;
        } else {
            $return = '-';
        }
        return $return;
    }

    public function statusdado(Request $request)
    {
        $post = $request->all();

        switch ($post['tabela']) {
            case 'dado':
                $tabela = 'dados';
                break;

            case 'requerimento':
                $tabela = 'requerimentos';
                break;

            case 'atestado':
                $tabela = 'atestados';
                break;

            case 'diploma':
                $tabela = 'diplomas';
                break;

            case 'solicitacao':
                $tabela = 'solicitacao';
                break;

            case 'comprovante':
                $tabela = 'comprovantes';
                break;

            default:
                $tabela = '';
                break;
        }

        $results = DB::table($tabela)->where('id',  $post['id'])->first();

        if ($results) {
            $affected = DB::table($tabela)
                ->where('id', $post['id'])
                ->update([
                    'status_id'     => $post['status_id'],
                ]);
            return redirect('candidato/' . $post['tabela'] . '?id=' . $post['id']);
        } else {
            return redirect('candidato/' . $post['tabela'] . '?id=' . $post['id']);
        }
    }

    public function requerimento()
    {
        error_reporting(0);
        $requerimento = DB::table('requerimentos')->where('id', $_GET['id'])->first();
        $dados = DB::table('dados')->where('user_id', $requerimento->user_id)->first();
        $user = DB::table('users')->where('id', $requerimento->user_id)->first();

        return view('admin.candidato.requerimento', [
            'dados' => $dados,
            'nome' => $user->name,
            'result' => $requerimento,
            'status' => $requerimento->status_id
        ]);
    }

    public function atestado()
    {
        error_reporting(0);
        $atestado = DB::table('atestados')->where('id', $_GET['id'])->first();
        $dados = DB::table('dados')->where('user_id', $atestado->user_id)->first();
        $user = DB::table('users')->where('id', $atestado->user_id)->first();

        return view('admin.candidato.atestado', [
            'dados' => $dados,
            'nome' => $user->name,
            'result' => $atestado,
            'status' => $atestado->status_id
        ]);
    }

    public function diploma()
    {
        error_reporting(0);
        $diploma = DB::table('diplomas')->where('id', $_GET['id'])->first();
        $dados = DB::table('dados')->where('user_id', $diploma->user_id)->first();
        $user = DB::table('users')->where('id', $diploma->user_id)->first();

        return view('admin.candidato.diploma', [
            'dados' => $dados,
            'result' => $diploma,
            'status' => $diploma->status_id,
        ]);
    }

    public function solicitacao()
    {
        error_reporting(0);
        $solicitacao = DB::table('solicitacao')->where('id', $_GET['id'])->first();
        $dados = DB::table('dados')->where('user_id', $solicitacao->user_id)->first();
        $user = DB::table('users')->where('id', $solicitacao->user_id)->first();

        return view('admin.candidato.solicitacao', [
            'dados' => $dados,
            'result' => $solicitacao,
            'nome' => $user->name,
            'status' => $solicitacao->status_id
        ]);
    }

    public function comprovante()
    {
        error_reporting(0);
        $comprovante = DB::table('comprovantes')->where('id', $_GET['id'])->first();
        $dados = DB::table('dados')->where('user_id', $comprovante->user_id)->first();
        $user = DB::table('users')->where('id', $comprovante->user_id)->first();

        return view('admin.candidato.comprovante', [
            'dados' => $dados,
            'result' => $comprovante,
            'status' => $comprovante->status_id,
        ]);
    }

    public static function statusinclude($id)
    {
        error_reporting(0);
        $dados = DB::table('dados')->where('id', $id)->first();
        $requerimento = DB::table('requerimentos')->where('id',  $id)->first();
        $declaracao = DB::table('atestados')->where('id',  $id)->first();
        $diploma = DB::table('diplomas')->where('id',  $id)->first();
        $solicitacao = DB::table('solicitacao')->where('id',  $id)->first();
        $comprovante = DB::table('comprovantes')->where('id',  $id)->first();

        $array = [
            'dados' => $dados,
            'requerimento' => $requerimento,
            'declaracao' => $declaracao,
            'diploma' => $diploma,
            'solicitacao' => $solicitacao,
            'comprovante' => $comprovante,
        ];
        ddd($array);
        return $array;
    }
}
