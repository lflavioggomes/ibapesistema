<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Atestado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AtestadoController extends Controller
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
        $atestado = DB::table('atestados')->where('user_id', auth()->user()->id)->first();

        return view('site.atestado.index', [
            'dados' => $dados,
            'nome' => auth()->user()->name,
            'result' => $atestado,
            'status' => $atestado->status_id
        ]);
    }

    public function form(Request $request)
    {
      $results = DB::table('atestados')->where('user_id', auth()->user()->id)->first();
       $post = $request->all();
       $post['user_id'] = auth()->user()->id;
      

       if ($results) {
         $affected = DB::table('atestados')
            ->where('user_id', $post['user_id'])
            ->update([
               'status_id'   => 3,
               'updated_at' => Carbon::now()
            ]);
      } else {
          $post['status_id'] = 3; //Status Análise
          $post['aceita'] = '0';
         $dados = Atestado::create($post);
      }

       return redirect('/atestado');
    }

}
