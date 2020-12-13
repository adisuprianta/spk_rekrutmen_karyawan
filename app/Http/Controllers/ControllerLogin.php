<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerLogin extends Controller
{
    public function index(){
        return view('login');
    }
}
