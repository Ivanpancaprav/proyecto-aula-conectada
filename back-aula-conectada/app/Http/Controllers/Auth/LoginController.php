<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);  //no cogemos el token

         if (auth()->attempt($credentials)) {  //comprobación de autenticación

            //Comprobar si el usuario es administrador
            if(auth()->user()->role == "administrador"){

                return redirect()->route('home');  //nos redirije a la ruta 'admin'
            }
            else{

                Auth::logout(); // estamos logeados previamente, entonces nos deslogeamos

                session()->flash('message', 'Disabled User');
                return redirect()->back();
            }


        } else {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
