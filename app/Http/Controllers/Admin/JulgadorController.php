<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Julgador;
use App\Models\Candidato_julgador;
use App\Models\Avaliacao_julgador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

use function PHPUnit\Framework\isNull;

class JulgadorController extends Controller
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
      $julgador = DB::table('julgadors') 
                    ->leftJoin('statuses', 'statuses.id', '=', 'julgadors.status_id')
                    ->select('julgadors.*', 'statuses.status')
                    ->get();

      return view('admin.julgador.index', [
        'julgador' => $julgador,
      ]);
    }

    public function cadastro()
    {
      $candidato = DB::table('users')->select()->where('tipo_id', '=', 2)->get();

      return view('admin.julgador.cadastro', [
        'candidato' => $candidato,
        'name' => auth()->user()->name,
      ]);
    }

    public function form(Request $request)
    {
      $post = $request->all();

      $user = DB::table('users')->where('email', $post['email'])->first();

      if(empty($user->id))
      {
        $julgador_user =  User::create([
        'name' => $post['nome'],
        'email' => $post['email'],
        'status_id' => $post['status_id'],
        'tipo_id' => 3,
        'password' => Hash::make($post['senha']),
      ])->givePermissionTo('julgador');


        if($julgador_user->id)
        {
          $julgador['name'] = $request->nome;
          $julgador['email'] = $request->email;
          $julgador['email'] = $request->email;
          $julgador['status_id'] =  $request->status_id;
          $julgador['user_id'] =  $julgador_user->id;

          $result_julgador = Julgador::create($julgador);

          if ($result_julgador) 
          {

              
              foreach ($post['candidato'] as $value)
              {
                $insert['julgador_id'] = $result_julgador->id;
                $insert['candidato_id'] = $value;

                $candidato_julgador = Candidato_julgador::create($insert);
                
              }

              foreach ($post['avaliacao'] as $value)
              {
                $avaliacao['julgador_id'] = $result_julgador->id;
                $avaliacao['avaliacao'] = $value;

                $avaliacao_julgador = avaliacao_julgador::create($avaliacao);
                
              }

              if($candidato_julgador)
              {
                toastr()->success('Julgador cadastrado com sucesso', 'Sucesso');
                return redirect('/julgador/cadastro');
              }
              
           
          } else {
              toastr()->error('Erro ao cadastrar julgador', 'Erro');
              return redirect('/julgador/cadastro');
          }

        }else{
              toastr()->error('Erro ao cadastrar julgador', 'Erro');
              return redirect('/julgador/cadastro');
        }
     
    }else{
            toastr()->error('Email já Cadastrado', 'Erro');
            return redirect('/julgador/cadastro');
    }
  }

    public function edit(Julgador $julgador)
    {
      $candidato = DB::table('users')->select()->where('tipo_id', '=', 2)->get();

      $candidato_julgador = DB::table('users') 
                    ->leftJoin('candidato_julgadors', 'candidato_julgadors.candidato_id', '=', 'users.id')
                    ->select('users.*')
                    ->where('candidato_julgadors.julgador_id', '=', $julgador->id)
                    ->get();

      return view('admin.julgador.edit', [
        'candidato' => $candidato,
        'candidato_julgador' => $candidato_julgador,
        'julgador' => $julgador,
      ]);
    }

    public function formedit(Request $request)
    {
      $post = $request->all();
      
      $user = DB::table('users')->where('email', $post['email'])->first();
      
      if( isset($user->email) )
      {
        if($user->id == $post['user'])
        {
          $valida = 1;
        }else{
          toastr()->error('E-Mail já cadastrado', 'Erro');
          return redirect('/julgador/'.$post['julgador']);  
        }
      }else{
          $valida = 1;
      }

      if($post['nome'])
      {
        $campos['name'] = $post['nome'];
      }

      if($post['email'])
      {
        $campos['email'] = $post['email'];
      }

      if($post['status_id'])
      {
        $campos['status_id'] = $post['status_id'];
      }

      if(!empty($post['senha']))
      {
        $campos['password'] = Hash::make($post['senha']);
      }

      if($valida == 1)
      {
        $julgador_user =  User::where('id',$post['user'])->update($campos);

        if($julgador_user)
        {
          unset($campos['password']);

          $result_julgador = Julgador::where('id',$post['julgador'])->update($campos);

          if ($result_julgador) 
          {
              $deleted = Candidato_julgador::where('julgador_id', $post['julgador'])->delete();

              foreach ($post['candidato'] as $value)
              {
                $insert['julgador_id'] = $post['julgador'];
                $insert['candidato_id'] = $value;

                $candidato_julgador = Candidato_julgador::create($insert);
              }

              $deletedavaliacao = Avaliacao_julgador::where('julgador_id', $post['julgador'])->delete();

              foreach ($post['avaliacao'] as $value)
              {
                $insert['julgador_id'] = $post['julgador'];
                $insert['avaliacao'] = $value;

                $candidato_julgador = Avaliacao_julgador::create($insert);
              }

              if($candidato_julgador)
              {
                toastr()->success('Julgador cadastrado com sucesso', 'Sucesso');
                return redirect('/julgador/'.$post['julgador']);
              }
              
          } else {
              toastr()->error('Erro ao cadastrar julgador', 'Erro');
              return redirect('/julgador/'.$post['julgador']);
          }

        }else{
              toastr()->error('Erro ao cadastrar julgador', 'Erro');
              return redirect('/julgador/'.$post['julgador']);
        }
     
    }else{
            toastr()->error('Email já Cadastrado', 'Erro');
            return redirect('/julgador/cadastro');
    }
  }

    public static function buscacandidato($candidato_id,$julgador_id)
    {
        error_reporting(0);
        $candidato =  DB::table('candidato_julgadors')->where('candidato_id', $candidato_id)->where('julgador_id', '=', $julgador_id)->first();

        if ($candidato->candidato_id) {
            $return = 'selected';
        } else {
            $return = '';
        }
        return $return;
    }

    public static function buscaavaliacao($julgador_id,$avaliacao)
    {
        error_reporting(0);
        $avaliacao = DB::table('avaliacao_julgadors')->select()->where('avaliacao', '=', $avaliacao)->where('julgador_id', '=', $julgador_id)->first(); 

        if ($avaliacao->julgador_id) {
          $return = 'selected';
        } else {
          $return = '';
        }
        return $return;
    }
}
