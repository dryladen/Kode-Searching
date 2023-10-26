<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        $data = array([
            'title' => 'Login'
        ]);
        return view('login',$data);
    }
}
