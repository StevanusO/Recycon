<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function insert_data(Request $data) {

        $data->validate([
            'Username' => 'min:3|required',
            'Email_Address' => "required|unique:users,email",
            'Password' => 'required|min:6', 
            'Confirm_Password' => 'required|same:Password'
        ]);

        DB::table('users')->insert([
            'username' => $data->Username,
            'email' => $data->Email_Address,
            'password' => Hash::make($data->Password),
            'is_admin' => false,
            'created_at' => now()
        ]);
        
        return redirect()->route('display_login_form_view');
    }

    public function login_logic(Request $data) {
        $credentials = [
            'email' => $data->email,
            'password' => $data->password
        ];

        if(Auth::attempt($credentials, false) == true) {
            Cookie::queue(
                'User Logged In',
                Auth::user()->username,
                120
            );
            return redirect()->route('display_home_page');
        } else {
            //mgkin perlu referensi
            return redirect()->back()->withErrors(['error' => 'Wrong password or email!']);
        }

    }

    public function logout_logic(){
        Auth::logout();
        return view('home_user');
    }

}
