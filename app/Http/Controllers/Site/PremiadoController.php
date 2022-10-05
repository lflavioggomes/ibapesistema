<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Premiado;

class PremiadoController extends Controller
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
        $premiado = DB::table('premiados')
        ->leftJoin('statuses', 'statuses.id', '=', 'premiados.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get();

        return view('site.premiado.index', [
            'premiado' => $premiado
        ]);
    }

    public function cadastro()
    {
        return view('site.premiado.cadastro');
    }

    public function form(Request $request)
    {
        $post = $request->all();
        $nameFile = null;

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $request->arquivo->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->arquivo->storeAs('premiado', $nameFile, 'public');

            if (!$upload) {
                return redirect('/premiado')
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {
                $post = $request->all();
                $post['arquivo'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $post['status_id'] = 3; //Status Análise
                $dados = Premiado::create($post);

                if ($dados) {
                    toastr()->success('Trabalho Premiado foi enviado com sucesso', 'Sucesso');
                    return redirect('/premiado/cadastro');
                } else {
                    toastr()->error('Erro ao enviar Trabalho Premiado', 'Erro');
                    return redirect('/premiado/cadastro');
                }
            }
        }
    }

    public static function ponto()
    {
        error_reporting(0);
        $trabalho = DB::table('premiados')->select()->where('user_id', '=', auth()->user()->id)->get();

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
