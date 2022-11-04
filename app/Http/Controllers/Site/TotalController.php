<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotalController extends Controller
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
        //
    }

    public function total()
    {
        error_reporting(0);
        $formacao = DB::table('formacaos')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();
        $divulgacao = DB::table('divulgacaos')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();
        $trabalho = DB::table('trabalhos')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();
        $premiado = DB::table('premiados')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();
        $docencia = DB::table('docencias')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();

        $total = $formacao->total + $divulgacao->total + $trabalho->total + $premiado->total + $docencia->total;

        if( $total >= 70 )
        {
            $retorna = 70;
        }else{
            $retorna = $total;
        }

        return $retorna;
    }

    public function totalcapacidade()
    {
        error_reporting(0);
        $atuacao = DB::table('atuacaos')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();
        $analise = DB::table('analises')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();
        $exercicio = DB::table('exercicios')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();
        $participacao = DB::table('participacaos')->select(DB::raw('SUM(previaponto) as total'))->where('user_id', '=', auth()->user()->id)->first();

        $total = ($atuacao->total > 20 ? 20 : $atuacao->total) + ($analise->total > 30 ? 30 : $analise->total) + ($exercicio->total > 10 ? 10 : $exercicio->total) + ($participacao->total > 30 ? 30 : $participacao->total);

        if( $total >= 90 )
        {
            $retorna = 90;
        }else{
            $retorna = $total;
        }
      
        return $retorna;
    }

}
