<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class MyAuth extends Controller
{
    function login_view(){
        return view('titles_Employee.login');
    }

    function login_process(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $req->all();

        // ใช้ where() ให้ถูกต้องโดยการใส่ array ภายใน array เพื่อเป็นเงื่อนไขของคำสั่ง WHERE
        $login = User::where(['us_email' => $data['username'], 'us_password' => $data['password']])->first();
        $login_user = User::where(['us_name' => $data['username'], 'us_password' => $data['password']])->first();

        // ตรวจสอบว่ามีผู้ใช้ที่ถูกต้องหรือไม่
        if($login || $login_user){
            // ใช้ use Illuminate\Support\Facades\Redirect; ด้านบนเพื่อให้ Redirect::to() ทำงานได้
            return Redirect::to('Employee');
        }else{
            return Redirect::to('login');
        }
    }


    function logout_process(){
        Auth::logout();
        return Redirect::to('login');
    }

    function register_view(){
        return view('register');
    }
}
