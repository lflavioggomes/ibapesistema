<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Docencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenciaController extends Controller
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
        $docencia = DB::table('docencias')
        ->leftJoin('statuses', 'statuses.id', '=', 'docencias.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.docencia.index', [
            'docencia' => $docencia
        ]);
    }

    public function cadastro()
    {
        return view('site.docencia.cadastro');
    }

    public function form(Request $request)
    {
        $post = $request->all();
        $nameFile = null;

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $request->arquivo->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->arquivo->storeAs('docencia', $nameFile, 'public');

            if (!$upload) {
                return redirect('/docencia')
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $post = $request->all();
                $post['arquivo'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $post['status_id'] = 3; //Status Análise
                $dados = Docencia::create($post);

                if ($dados) {
                    toastr()->success('Exercicio de Docência foi enviado com sucesso', 'Sucesso');
                    return redirect('/docencia/cadastro');
                } else {
                    toastr()->error('Erro ao enviar Exercicio de Docência', 'Erro');
                    return redirect('/docencia/cadastro');
                }
            }
        }
    }

    public static function ponto()
    {
        error_reporting(0);
        $trabalho = DB::table('docencias')->select()->where('user_id', '=', auth()->user()->id)->get();

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
