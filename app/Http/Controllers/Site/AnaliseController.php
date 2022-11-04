<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Analise;

class AnaliseController extends Controller
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
        $analise = DB::table('analises')
        ->leftJoin('statuses', 'statuses.id', '=', 'analises.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.analise.index', [
                'analise' => $analise
        ]);
    }

    public function cadastro()
    {
        return view('site.analise.cadastro');
    }

    public function form(Request $request)
    {
        $post = $request->all();
        $nameFile = null;

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $request->arquivo->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->arquivo->storeAs('analise', $nameFile, 'public');

            if (!$upload) {
                return redirect('/analise')
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $post = $request->all();
                $post['arquivo'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $post['status_id'] = 3; //Status Análise
                $dados = Analise::create($post);

                if ($dados) {
                    toastr()->success('Análise Curricular no âmbito da Certificação foi enviado com sucesso', 'Sucesso');
                    return redirect('/analise/cadastro');
                } else {
                    toastr()->error('Erro ao enviar Análise Curricular no âmbito da Certificação', 'Erro');
                    return redirect('/analise/cadastro');
                }
            }
        }
    }

    public static function ponto()
    {
        error_reporting(0);
        $trabalho = DB::table('analises')->select()->where('user_id', '=', auth()->user()->id)->get();

        if ($trabalho) {
            $valortotal = '';
            foreach ($trabalho as $ponto) {
                $valortotal += $ponto->previaponto;
            }

            if ($valortotal > 0) {
                if($valortotal > 30)
                {
                    $return = 30;
                }else{
                    $return = $valortotal;
                }
            } else {
                $return = 0;
            }
        } else {
            $return = 0;
        }
        return $return;
    }

}
