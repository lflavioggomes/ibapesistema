<?php

namespace App\Http\Controllers\julgador;

use App\Http\Controllers\Controller;
use App\Models\Laudo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_reporting(0);

        $dados = DB::table('users')
                    ->leftJoin('candidato_julgadors', 'candidato_julgadors.candidato_id', '=', 'users.id')
                    ->leftJoin('julgadors', 'julgadors.id', '=', 'candidato_julgadors.julgador_id')
                    ->select('users.name', 'users.id')
                    ->where('julgadors.user_id', '=', auth()->user()->id)
                    ->get();


        return view('julgador.listagem.index', [
            'dados' => $dados,
            'julgador' =>  auth()->user()->id,
        ]);

       return view('julgador.listagem.index');
    }

   public static function avaliacao($julgador,$avaliacao)
   {
        $dados = DB::table('julgadors')
                        ->leftJoin('avaliacao_julgadors', 'avaliacao_julgadors.julgador_id', '=', 'julgadors.id')
                        ->select()
                        ->where('julgadors.user_id', '=', auth()->user()->id)
                        ->where('avaliacao_julgadors.avaliacao', '=', $avaliacao)
                        ->first();

                        return $dados;
   }

   public function list()
   {
        $laudo = DB::table('laudos')
        ->select('laudos.id as idtabela','laudos.*', 'statuses.*' )
        ->leftJoin('statuses', 'statuses.id', '=', 'laudos.status_id')
        ->where('user_id', '=', $_GET['id'])->get();

        return view('julgador.listagem.trabalho', [
            'laudo' => $laudo
            ]);
   }

   public function listcurricular()
   {
    $analise = DB::table('analises')
    ->select('analises.id as idtabela','analises.*', 'statuses.*' )
    ->leftJoin('statuses', 'statuses.id', '=', 'analises.status_id')
    ->where('user_id', '=', $_GET['id'])->get();

    return view('julgador.listagem.curricular', [
            'analise' => $analise
    ]);
   }
}
