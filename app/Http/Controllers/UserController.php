<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

use Auth;
use Hash;
use Validator;
use DB;

class UserController extends Controller
{


    function Register(Request $request)
    {

        $rules = array(
            'name'      => 'required',
            'username'  => 'required|unique:users|min:5|max:15|alpha_num',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|confirmed|different:username|min:6|max:30'
        );

        $email = str_replace(array("%00", "  "), "", $request->email);
        $allowed_domain_email = array('gmail.com', 'yahoo.com', 'yahoo.co.id', 'umsida.ac.id');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('register-page')->with('error', 'Terjadi kesalahan!');
        }

        $email_domain = explode('@', $email)[1];

        if (!in_array($email_domain, $allowed_domain_email)) {
            return redirect()->route('register-page')->with('error', 'Kami hanya menerima email domain TLD umum');
        }


        $valid = Validator::make($request->post(), $rules);
        if ($valid->fails()) {
            $msg = $valid->errors()->first();
            return redirect()->route('register-page')->with('error', $msg);
        } else {

            $data_insert = [
                'name' =>  strtoupper($request->name),
                'username' => $request->username,
                'email' => $email,
                'password' => Hash::make($request->password),
            ];

            $insert = User::Create($data_insert);

            if ($insert) {
                return redirect()->route('login-page')->with('success', "Pendaftaran berhasil");
            } else {
                return redirect()->route('register-page')->with('error', "Pendaftaran gagal, hubungi admin!");
            }
        }
    }


    function Login(Request $request)
    {
        $user = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $data = array(
            $user => $request->user,
            "password" => $request->password
        );

        if (Auth::attempt($data)) {
            return redirect()->route('user-dashboard');
        } else {
            return redirect()->route('login-page')->with('error', 'Username atau password salah!');
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login-page')->with('success', 'Logout Berhasil!');
    }
}
