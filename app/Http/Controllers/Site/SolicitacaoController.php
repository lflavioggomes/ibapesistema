<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SolicitacaoController extends Controller
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
        $solicitacao = DB::table('solicitacao')->where('user_id', auth()->user()->id)->first();

        return view('site.solicitacao.index',[
            'dados' => $dados,
            'result' => $solicitacao->id,
            'nome' => auth()->user()->name,
            'status' => $solicitacao->status_id
        ]);
    }

    public function form(Request $request)
    {
        $results = DB::table('solicitacao')->where('user_id', auth()->user()->id)->first();
        $post = $request->all();
        $post['user_id'] = auth()->user()->id;

        if ($results) {
         $affected = DB::table('solicitacao')
            ->where('user_id', $post['user_id'])
            ->update([
               'status_id'   => 3,
               'solicitacao'   => $post['solicitacao'],
               'aceita'   => $post['aceita'],
               'updated_at' => Carbon::now()
            ]);
      } else {
         $post['status_id'] = 3; //Status Análise
         $dados = Solicitacao::create($post);
      }

      return redirect('/solicitacao');
    }

}
