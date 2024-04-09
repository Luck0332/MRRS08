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

   public function login_process(Request $req)
    {
        $validatedData = $req->validate([
            'username' => 'required',
            'password' => 'required',

        ]);

        // รับค่า input ชื่อ username และ password จาก request
        $username = $req->input('username');
        $password = $req->input('password');

        // เรียกใช้งานโมเดล User เพื่อทำการเปรียบเทียบ
        $user = User::where('us_name', $username)->first();

        // ตรวจสอบว่ามีข้อมูล user ที่มี us_name ตรงกับ username ที่รับเข้ามาหรือไม่
        if ($user) {
            // ถ้าพบ user ในฐานข้อมูล
            if (password_verify($password, $user->us_password)) {
                // ถ้า password ที่รับเข้ามาตรงกับ password ในฐานข้อมูล
                // กำหนด session หรือตัวแปรอื่น ๆ ตามที่ต้องการเพื่อระบุการเข้าสู่ระบบ
                // สามารถ redirect หรือทำการส่ง response กลับไปยังหน้าอื่น ๆ ต่อจากนี้ได้
                return redirect()->intended('Employee');
            } else {
                // ถ้า password ไม่ตรงกับที่มีในฐานข้อมูล
                return redirect()->back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
            }
        } else {
            // ถ้าไม่พบ user ในฐานข้อมูล
            return redirect()->back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
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
