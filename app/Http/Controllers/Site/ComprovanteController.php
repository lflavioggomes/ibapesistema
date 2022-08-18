<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comprovante;
use Illuminate\Support\Facades\DB;


class ComprovanteController extends Controller
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
        error_reporting(0);
        $results = DB::table('comprovantes')->where('user_id', auth()->user()->id)->first();
        return view('site.comprovante.index',[
                    'comprovante' => $results->comprovante
        ]);
    }

    public function form(Request $request)
    {
        $nameFile = null;
    
        if ($request->hasFile('comprovante') && $request->file('comprovante')->isValid())
         {
            $name = uniqid(date('HisYmd'));
    
            $extension = $request->comprovante->extension();
    
            $nameFile = "{$name}.{$extension}";
    
            $upload = $request->comprovante->storeAs('public/comprovante', $nameFile);
    
            if ( !$upload )
            {
                return redirect('/comprovante')
                ->back()
                ->with('error', 'Falha ao fazer upload')
                ->withInput();
            }else{
                $post = $request->all();
                $post['comprovante'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $dados = Comprovante::create($post);

                if($dados)
                {
                    return redirect('/comprovante');
                }else{
                    return redirect('/comprovante')
                    ->back()
                    ->with('error', 'Falha ao fazer armazenar')
                    ->withInput();
                }
            }
        }

    }

}
