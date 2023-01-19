<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function insert_data(Request $data)
    {

        $data->validate([
            'Username' => 'min:3|filled',
            'Email_Address' => "filled|unique:users,email|email:rfc,dns",
            'Password' => 'filled|min:6',
            'Confirm_Password' => 'filled|same:Password'
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

    public function login_logic(Request $data)
    {
        $credentials = [
            'email' => $data->email,
            'password' => $data->password
        ];

        if (Auth::attempt($credentials) == true) {
            Cookie::queue(
                'loggedUsername',
                Auth::user()->username,
                120
            );

            Cookie::queue(
                'loggedUsersecret',
                Auth::user()->password,
                120
            );
            return redirect()->route('display_home_page');
        } else {
            return redirect()->back()->withErrors(['error' => 'Wrong password or email!']);
        }
    }

    public function logout_logic()
    {
        Auth::logout();
        return view('home_user');
    }

    public function display_edit_profile()
    {
        return view('edit_profile');
    }

    public function edit_profile_logic(Request $data)
    {
        $data->validate([
            'data_username' => 'filled|min:3',
            'data_email' => 'filled|email:rfc,dns|unique:users,email,' . $data->data_email . ',email',
        ]);

        try {
            User::where('email', '=', Auth::user()->email)->update([
                'username' => $data->data_username,
                'email' => $data->data_email
            ]);
        } catch (QueryException) {
            return redirect()->back()->withErrors(['message' => 'Email has already been taken']);
        }
        return redirect()->back();
    }

    public function display_change_password()
    {
        return view('change_password');
    }

    public function change_password_logic(Request $data)
    {
        $data->validate([
            'old_password' => 'required',
            'new_password' => 'required|different:old_password|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user_temp = Auth::user();
        if (Hash::check($data->old_password, $user_temp->password)) {
            // Password Update Success
            $user = User::find($data->id);
            $user->password = Hash::make($data->new_password);
            $user->save();
            return redirect()->back()->with('message', 'Password Successfully Updated!');
        } else {
            // Fail
            return redirect()->back()->withErrors(['message' => "Old password does not match with database"]);
        }
    }
}
