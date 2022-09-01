<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class VerificaController extends Controller
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
        $dados = DB::table('dados')->where('user_id', auth()->user()->id)->first();
        $requerimento = DB::table('requerimentos')->where('user_id', auth()->user()->id)->first();
        $declaracao = DB::table('atestados')->where('user_id', auth()->user()->id)->first();
        $diploma = DB::table('diplomas')->where('user_id', auth()->user()->id)->first();
        $solicitacao = DB::table('solicitacao')->where('user_id', auth()->user()->id)->first();
        $comprovante = DB::table('comprovantes')->where('user_id', auth()->user()->id)->first();

        $file_contents = '{"dados":"'.$dados->status_id.'",
                           "requerimento":"'.$requerimento->status_id.'",
                           "declaracao":"'.$declaracao->status_id.'",
                           "diploma":"'.$diploma->status_id.'",
                           "solicitacao":"'.$solicitacao->status_id.'",
                           "comprovante":"'.$comprovante->status_id.'"
                        }';

        echo $file_contents;
        exit();
    }

}
