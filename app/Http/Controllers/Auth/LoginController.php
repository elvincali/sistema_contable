<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Bitacora;
use App\User;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginform(){
        return view('auth.login');
    }

    public function redirectPath(){
        $user = User::with('roles')
                    ->where('users.id', Auth::user()->id)
                    ->first();
        if ($user->roles[0]->name == 'cliente') {
            return '/principal';
        }
        return '/inicio';
    }

    public function logout(Request $request){
        Bitacora::register(
            'Cerrar Sesion', 'El usuario ' . Auth::user()->nombre . ' ha cerrado sesion', \Request::ip()
        );
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
