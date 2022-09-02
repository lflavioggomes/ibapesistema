<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        error_reporting(0);
        //tipo_id 1 é de Administrador
        //tipo_id 2 é de candidato
        //tipo_id 2 é de Julgador
        
        $tipo = auth()->user()->tipo_id;

        switch  ($tipo) {
            case 1:
                $candidato = DB::table('users')->select()->where('tipo_id', '=', 2)->get();
                $julgador = DB::table('users')->select()->where('tipo_id', '=', 3)->get();
                return view('site.home.index', [
                            'candidato' => $candidato,
                            'julgador' => $julgador,
                            'name' => auth()->user()->name,
                ]);
            break;

            case 2:
               
                $dados = DB::table('dados')->where('user_id', auth()->user()->id)->first();
                $requerimento = DB::table('requerimentos')->where('user_id', auth()->user()->id)->first();
                $declaracao = DB::table('atestados')->where('user_id', auth()->user()->id)->first();
                $diploma = DB::table('diplomas')->where('user_id', auth()->user()->id)->first();
                $solicitacao = DB::table('solicitacao')->where('user_id', auth()->user()->id)->first();
                $comprovante = DB::table('comprovantes')->where('user_id', auth()->user()->id)->first();
                
                return view('site.home.index', [
                            'dados' => $dados,
                            'requerimento' => $requerimento,
                            'declaracao' => $declaracao,
                            'diploma' => $diploma,
                            'solicitacao' => $solicitacao,
                            'comprovante' => $comprovante,
                ]);
            break;

            case 3:
                $candidato = DB::table('users')->select()->where('tipo_id', '=', 2)->get();
                $julgador = DB::table('users')->select()->where('tipo_id', '=', 3)->get();
                return view('site.home.index', [
                            'candidato' => $candidato,
                            'julgador' => $julgador,
                            'name' => auth()->user()->name,
                ]);
            break;
            
            default:
                return view('site.home.index');
            break;
        }
       
    }
}
