<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trabalho;

class TrabalhoController extends Controller
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
        $trabalho = DB::table('trabalhos')
        ->leftJoin('statuses', 'statuses.id', '=', 'trabalhos.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.trabalho.index', [
            'trabalho' => $trabalho
        ]);
    }

    public function cadastro()
    {
        return view('site.trabalho.cadastro');
    }

    public function form(Request $request)
    {
        $post = $request->all();
        $nameFile = null;

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $request->arquivo->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->arquivo->storeAs('trabalho', $nameFile, 'public');

            if (!$upload) {
                return redirect('/trabalho')
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $post = $request->all();
                $post['arquivo'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $post['status_id'] = 3; //Status Análise
                $dados = Trabalho::create($post);

                if ($dados) {
                    toastr()->success('Trabalho foi enviado com sucesso', 'Sucesso');
                    return redirect('/trabalho/cadastro');
                } else {
                    toastr()->error('Erro ao enviar Trabalho', 'Erro');
                    return redirect('/trabalho/cadastro');
                }
            }
        }
    }

    public static function ponto()
    {
        error_reporting(0);
        $trabalho = DB::table('trabalhos')->select()->where('user_id', '=', auth()->user()->id)->get();

        if ($trabalho) {
            $valortotal = '';
            foreach ($trabalho as $ponto) {
                $valortotal += $ponto->previaponto;
            }

            if ($valortotal > 0) {
                $return = $valortotal;
            } else {
                $return = 0;
            }
        } else {
            $return = 0;
        }
        return $return;
    }

}
