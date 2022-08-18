<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiplomaController extends Controller
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
        $results = DB::table('diplomas')->where('user_id', auth()->user()->id)->first();
        return view('site.diploma.index', [
                    'diploma' => $results->diploma
        ]);
    }

    public function form(Request $request)
    {
        $nameFile = null;
    
        if ($request->hasFile('diploma') && $request->file('diploma')->isValid())
         {
            $name = uniqid(date('HisYmd'));
    
            $extension = $request->diploma->extension();
    
            $nameFile = "{$name}.{$extension}";
    
            $upload = $request->diploma->storeAs('public/diploma', $nameFile);
    
            if ( !$upload )
            {
                return redirect('/diploma')
                ->back()
                ->with('error', 'Falha ao fazer upload')
                ->withInput();
            }else{
                $post = $request->all();
                $post['diploma'] = $nameFile;
                $post['user_id'] = auth()->user()->id;
                $dados = Diploma::create($post);

                if($dados)
                {
                    return redirect('/diploma');
                }else{
                    return redirect('/diploma')
                    ->back()
                    ->with('error', 'Falha ao fazer armazenar')
                    ->withInput();
                }
            }
        }
            
    }
}
