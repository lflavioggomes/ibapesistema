<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Confirm;
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
        $confirm = DB::table('confirms')->where('user_id', auth()->user()->id)->first();

        if(empty($confirm))
        {
            if(!empty($dados) && !empty($requerimento) && !empty($declaracao) && !empty($diploma) && !empty($solicitacao) && !empty($comprovante))
            {
                $valida = 0;
            }else{
                $valida = 1;
            }
        }else{
            $valida = 1;
        }

        $file_contents = '{"valida":"'.$valida.'"}';
        echo $file_contents;
        exit();
    }

    public function confirma(Request $request)
    {
        if($request)
        {
            $post['confirma'] = $request['confirma'];
            $post['tipo_dado'] = 'pre_qualificacao';
            $post['user_id'] = auth()->user()->id;

            $dados = Confirm::create($post);

            if($dados)
            {
                return redirect('/');
            }

        }else{
            return redirect('/dados');
        }
    }

}
