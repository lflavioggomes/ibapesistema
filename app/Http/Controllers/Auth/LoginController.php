<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login()
    // {

    //     $user = DB::table('users')->where('email', $_POST['email'])->first();

    //     if($user->tipo_id == 1)
    //     {
    //         if (Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password']]))
    //         {
    //             return redirect()->intended('home');
    //         }else{
    //             return redirect('/login');
    //         }                      
    //     }else{
    //      return redirect('/login?error=candidato');
    //     }
    // }
}
