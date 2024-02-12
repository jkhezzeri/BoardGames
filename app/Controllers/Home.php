<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function home() {
        return view('home');
    }

    public function addjs() {
        return view('addjs');
    }

    public function add() {     
        if (session()->has('login')){
            return view('add');
        } else {
            return redirect()->to('/');
        }
    }

    
}
