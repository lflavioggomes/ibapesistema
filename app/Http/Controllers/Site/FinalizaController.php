<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Finaliza;

class FinalizaController extends Controller
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
    public function index(Request $request)
    {
        $post = $request->all();

        if(!empty($post))
        {
            $post['user_id'] = auth()->user()->id;
            $post['status_id'] = 5; //Status Análise
            $post['finaliza'] = $post['finaliza'];
            $dados = Finaliza::create($post);

            if ($dados) {
                toastr()->success('Documentação finalizada com sucesso', 'Sucesso');
                return redirect('/');
            } else {
                toastr()->error('Erro ao finalizar documentação', 'Erro');
                return redirect('/');
            }
        }
    }

    public function verifica()
    {
        error_reporting(0);
        $finaliza = DB::table('finalizas')
        ->leftJoin('statuses', 'statuses.id', '=', 'finalizas.status_id')
        ->select()
        ->where('user_id', '=', auth()->user()->id)->get()->first();

        return $finaliza->finaliza;
    }

    public function exclui(Request $request)
    {
        $post = $request->all();
        try {
            $deleted = DB::table($post['table'])->where('id', '=', $post['trabalhoid'])->delete();
            if ($deleted) {
                toastr()->success('Resgistro Excluído com Sucesso', 'Sucesso');
                return redirect($post['caminho']);
            } else {
                toastr()->error('Erro ao enviar Excluir Resgistro', 'Erro');
                return redirect($post['caminho']);
            }
         } catch (\Exception $e) {
            toastr()->error('Erro ao enviar Excluir Resgistroaa', 'Erro');
         }

    }
}
