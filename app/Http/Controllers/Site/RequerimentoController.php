<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Requerimento;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
      $dados = DB::table('dados')->where('user_id', auth()->user()->id)->first();
      $requerimento = DB::table('requerimentos')->where('user_id', auth()->user()->id)->first();

      return view('site.requerimento.index', [
         'dados' => $dados,
         'nome' => auth()->user()->name,
         'result' => $requerimento->id,
         'status' => $requerimento->status_id
      ]);
   }

   public function form(Request $request)
   {
      $results = DB::table('requerimentos')->where('user_id', auth()->user()->id)->first();
      $post = $request->all();
      $post['user_id'] = auth()->user()->id;

      if ($results) {
         $affected = DB::table('requerimentos')
            ->where('user_id', $post['user_id'])
            ->update([
               'status_id'   => 3,
               'updated_at' => Carbon::now()
            ]);
      } else {
         $post['status_id'] = 3; //Status Análise
         $dados = Requerimento::create($post);
      }

      return redirect('/requerimento');
   }
}
