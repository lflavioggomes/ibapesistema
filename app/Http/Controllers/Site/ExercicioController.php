<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Exercicio;

class ExercicioController extends Controller
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
        $analise = DB::table('exercicios')
        ->leftJoin('statuses', 'statuses.id', '=', 'exercicios.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.exercicio.index', [
                'analise' => $analise
        ]);
    }

    public function cadastro()
    {
        return view('site.exercicio.cadastro');
    }

    public function form(Request $request)
    {
        $post = $request->all();
        $nameFile = null;

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $request->arquivo->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->arquivo->storeAs('exercicio', $nameFile, 'public');

            if (!$upload) {
                return redirect('/exercicio')
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $post = $request->all();
                $post['arquivo'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $post['status_id'] = 3; //Status Análise
                $dados = Exercicio::create($post);

                if ($dados) {
                    toastr()->success('Exercício Regular da Profissão no âmbito da Certificação foi enviado com sucesso', 'Sucesso');
                    return redirect('/exercicio/cadastro');
                } else {
                    toastr()->error('Erro ao enviar Exercício Regular da Profissão no âmbito da Certificação', 'Erro');
                    return redirect('/exercicio/cadastro');
                }
            }
        }
    }

    public static function ponto()
    {
        error_reporting(0);
        $trabalho = DB::table('exercicios')->select()->where('user_id', '=', auth()->user()->id)->get();

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
