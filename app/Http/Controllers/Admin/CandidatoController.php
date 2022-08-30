<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        return view('admin.candidato.list',[
                    'dados' => $dados,
                    'requerimentos' => $requerimentos,
                    'declaracao' => $declaracao,
                    'diplomas' => $diplomas,
                    'solicitacao' => $solicitacao,
                    'comprovantes' => $comprovantes,
        ]);
    }

}
