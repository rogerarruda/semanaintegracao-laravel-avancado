<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showFormLogin()
    {
        return view('auth.admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     if(strpos($request->session()->get('url.intended'), 'logout')){
    //         return redirect()->route('admin.index');
    //     }
    //
    //     return redirect()->intended($this->redirectTo);
    // }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->forget('url.intended');
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route('admin.login'));
    }
}
