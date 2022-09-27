<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Divulgacao;

class DivulgacaoController extends Controller
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
        $divulgacao = DB::table('divulgacaos')
        ->leftJoin('statuses', 'statuses.id', '=', 'divulgacaos.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.divulgacao.index', [
                'divulgacao' => $divulgacao
        ]);
    }

    public function cadastro()
    {
        app('view')->prependNamespace('site', resource_path('views/site/divulgacao'));
        return view('site.divulgacao.cadastro');
    }

    public function form(Request $request)
    {
        
        $post = $request->all();
        $nameFile = null;

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid())
        {
           $name = uniqid(date('HisYmd'));
   
           $extension = $request->arquivo->extension();
   
           $nameFile = "{$name}.{$extension}";
   
           $upload = $request->arquivo->storeAs('divulgacao', $nameFile, 'public');
   
           if ( !$upload )
           {
               return redirect('/divulgacao')
               ->back()
               ->with('error', 'Falha ao fazer upload')
               ->withInput();
           }else{
                   $post = $request->all();
                   $post['arquivo'] = $nameFile;
                   $post['user_id'] = auth()->user()->id;
                   $post['status_id'] = 3; //Status Análise
                   $post['ano'] = Carbon::parse($post['ano'])->format('Y-m-d');
                   $dados = Divulgacao::create($post);

                   if($dados)
                   {
                      toastr()->success('Divulgação foi enviada com sucesso', 'Sucesso');
                      return redirect('/divulgacao/cadastro');
                   }else{
                      toastr()->error('Erro ao enviar Divulgação', 'Erro');
                      return redirect('/divulgacao/cadastro');
                   }
           }
       }

    }

    public static function ponto()
    {
        error_reporting(0);
        $divulgacao = DB::table('divulgacaos')->select()->where('user_id', '=', auth()->user()->id)->get();

        if (!empty($divulgacao)) {
            $valortotal = '';
            foreach($divulgacao as $ponto)
            {
                $valortotal += $ponto->previaponto;
            }

            if($valortotal > 0)
            {
                $return = $valortotal;
            }else{
                $return = 0;
            }
        } else {
            $return = 0;
        }
        return $return;
    }
}
