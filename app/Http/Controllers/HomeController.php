<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function index() {
        $title = 'Trang chủ';
        $description = 'This is the homepage content.';
        $params = [
            'description' => $description,
            'hasuserlogin' => false
        ];
        $userlogin = Auth::user();
        if($userlogin) {
            $params['userlogin'] = $userlogin->name;
            $params['hasuserlogin'] = true;
        }
        return view('home')->with('title', $title)->with('data', $params);
    }
}
