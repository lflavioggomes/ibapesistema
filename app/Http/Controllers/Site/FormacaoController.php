<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Formacao;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;
use phpDocumentor\Reflection\Types\Void_;
use Yoeunes\Toastr\ToastrServiceProvider;

class FormacaoController extends Controller
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
        $formacao = DB::table('formacaos')
            ->select('formacaos.id as idtabela','formacaos.*', 'statuses.*' )
            ->leftJoin('statuses', 'statuses.id', '=', 'formacaos.status_id')
            ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.formacao.index', [
            'formacao' => $formacao
        ]);
    }

    public function cadastro()
    {
        app('view')->prependNamespace('site', resource_path('views/site/formacao'));
        return view('site.formacao.cadastro');
    }

    public function form(Request $request)
    {

        $post = $request->all();
        $nameFile = null;

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $request->arquivo->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->arquivo->storeAs('formacao', $nameFile, 'public');

            if (!$upload) {
                return redirect('/formacao')
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $post = $request->all();
                $post['arquivo'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $post['inicio'] = Carbon::parse($post['inicio'])->format('Y-m-d');
                $post['termino'] = Carbon::parse($post['termino'])->format('Y-m-d');
                $post['status_id'] = 3; //Status Análise
                $dados = Formacao::create($post);

                if ($dados) {
                    toastr()->success('Formação foi enviado com sucesso', 'Sucesso');
                    return redirect('/formacao/cadastro');
                } else {
                    toastr()->error('Erro ao enviar Formação', 'Erro');
                    return redirect('/formacao/cadastro');
                }
            }
        }
    }

    public static function ponto()
    {
        error_reporting(0);
        $formacao = DB::table('formacaos')->select()->where('user_id', '=', auth()->user()->id)->get();

        if ($formacao) {
            $valortotal = '';
            foreach ($formacao as $ponto) {
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
