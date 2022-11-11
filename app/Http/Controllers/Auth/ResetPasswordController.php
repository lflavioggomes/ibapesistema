<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Send;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function validatePasswordRequest(Request $request)
    {
        //You can add validation login here
        $user = DB::table('users')->where('email', '=', $request->email)->first();
        //Check if the user exists
        if (isset($user->id) < 1) {
            return redirect()->back()->withErrors(['email' => trans('Usuário não existe')]);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => Str::random(60),
        'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
        return redirect()->back()->with('status', trans('Um link de redefinição foi enviado para seu endereço de e-mail.'));
        } else {
        return redirect()->back()->withErrors(['error' => trans('Ocorreu um erro de rede. Por favor, tente novamente.')]);
        }

    }

    private function sendResetEmail($email, $token)
    {
    $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
    $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);

        $data['email'] = $user->email;
        $data['name'] = $user->name;
        $data['link'] = $link;
        $data['token'] = $token;

        try {
           $envio = Mail::to($user->email, $user->name)->send(new Send($data));
           toastr()->success('Enviamos as informações por email', 'Sucesso');
        } catch (\Exception $e) {
            toastr()->error('Erro ao enviar email', 'Erro');
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required' ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(['email' => 'Por favor coloque seu Email.']);
            }
            
            $password = $request->password;
            $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();

            if (!$tokenData) return view('auth.passwords.email');
            
            $user = User::where('email', $tokenData->email)->first();

            if (!$user) return redirect()->back()->withErrors(['email' => 'Email não encontrado']);
            $user->password = Hash::make($password);
            $user->update(); //or $user->save();

            //login the user immediately they change password successfully
           // Auth::login($user);

            //Delete the token
            $delete = DB::table('password_resets')->where('email', $user->email)
            ->delete();

            //Send Email Reset Success Email
            if ($delete) {
                 return redirect('login');
            } else {
                toastr()->error('Ocorreu um erro de rede. Por favor, tente novamente.', 'Erro');
                return redirect('password/reset');
            }
    }
    
}
