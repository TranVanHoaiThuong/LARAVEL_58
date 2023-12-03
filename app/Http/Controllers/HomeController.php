<?php

namespace App\Http\Controllers;

use App\UserCustom;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        $title = 'Trang chủ';
        $description = 'This is the homepage content.';
        return view('home')->with('title', $title)->with('description', $description);
    }
}
