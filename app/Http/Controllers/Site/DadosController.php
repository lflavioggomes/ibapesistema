<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Dados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DadosController extends Controller
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
        $results = DB::table('dados')->where('user_id', auth()->user()->id)->first();
       // ddd($results->nacionalidade);
        return view('site.dados.index', [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'result' => $results
        ]);
    }

    public function form(Request $request)
    {
        $post = $request->all();
        $post['user_id'] = auth()->user()->id;
        $dados = Dados::create($post);
        ddd($dados);
    }
}
