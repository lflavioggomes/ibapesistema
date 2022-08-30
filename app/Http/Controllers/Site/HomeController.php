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
        //tipo_id 2 é de candidato

        $candidato = DB::table('users')->select()->where('tipo_id', '=', 2)->get();
        $julgador = DB::table('users')->select()->where('tipo_id', '=', 3)->get();
        return view('site.home.index', [
                    'candidato' => $candidato,
                    'julgador' => $julgador,
                    'name' => auth()->user()->name,
        ]);
    }
}
