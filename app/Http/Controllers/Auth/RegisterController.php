<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller {

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function loadFormRegister() {
        return view('forms.user.register')->with('title', 'Đăng ký tài khoản');
    }

    public function register(Request $request) {
        // Validate sẽ quăng lỗi ra màn hình
        $this->validator($request);
        // Không có lỗi thêm vào
        $fullname = explode(' ', trim($request->name));
        if(count($fullname) <= 1) {
            $firstname = '';
            $lastname = $fullname[0];
        } else {
            $lastname = array_pop($fullname);
            $firstname = implode(' ', $fullname);
        }
        $data = [
            'name' => trim($request->name),
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $this->create($data);
        return redirect('/')->with('success', 'Đăng ký thành công user ' . $data['name']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param Request $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request) {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        return User::create($data);
    }
}
