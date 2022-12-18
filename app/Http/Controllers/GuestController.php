<?php

namespace App\Http\Controllers;

class GuestController extends Controller
{
    public function display_regist_form(){
        return view('regist_form');
    }

    public function display_login_form(){
        return view('login_form');
    }
}
