<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Requerimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequerimentoController extends Controller
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
        $requerimento = DB::table('requerimentos')->where('user_id', auth()->user()->id)->first();
         
        $valida = 0;

         if($results->endereco != '')
         {
            $valida = 1;
         }

         if($results->numero != '' && $valida > 0)
         {
            $valida = 1;
         }else{
            $valida = 0;
         }

         if($results->bairro != '' && $valida  > 0)
         {
            $valida = 1;
         }
         else{
            $valida = 0;
         }

         if($results->estado != '' && $valida > 0)
         {
            $valida = 1;
         }
         else{
            $valida = 0;
         }

         if($results->crea != '' && $valida > 0)
         {
            $valida = 1;
         }
         else{
            $valida = 0;
         }

         if($results->formacao != '' && $valida > 0)
         {
            $valida = 1;
         }
         else{
            $valida = 0;
         }


        return view('site.requerimento.index', [
                    'valida' => $valida,
                    'result' => $results,
                    'nome' => auth()->user()->name,
                    'requerimento' => $requerimento->id
                ]);
    }

    public function form(Request $request)
    {
       $post = $request->all();
       $post['user_id'] = auth()->user()->id;
       $dados = Requerimento::create($post);
       return redirect('/requerimento');
    }
}
