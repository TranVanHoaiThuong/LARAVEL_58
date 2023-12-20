<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class LoginController extends Controller{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function loadLoginForm() {
        return view('forms.user.login')->with('title', 'Đăng nhập');
    }

    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)) {
            $userlogin = Auth::user();
            $user = User::find($userlogin->id);
            $user->last_access = now()->toDateTimeString();
            $user->save();
            return redirect('/');
        }
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'loginfail' => 'Thông tin đăng nhập chưa chính xác'
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
