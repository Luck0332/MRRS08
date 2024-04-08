<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\Room;
use App\Models\User;
use App\Http\Controllers\Validator;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\reservations;
use PHPUnit\Framework\Constraint\IsTrue;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getReserve()
    {
        //
        return view('titles_User.Reserve_room');
    }

    public function getFollow()
    {
        //
        return view('titles_User.follow');
    }

    public function mainpage()
    {
        //
        return view('titles_Employee.mainpage');
    }

    public function reserve()
    {
        //
        return view('titles_Employee.reserve_privet');
    }

    public function petition()
    {
        $test01 = 'W';
        $reservation = reservations::where('res_status', $test01)->orderBy("id", "desc")->paginate(5);
        return view('titles_Employee.petition',['reservations' => $reservation, 'test01' => $test01]);
    }
    public function petition1(Request $request)
    {
        $test01 = $request->input('test01'); // รับค่า test01 จากคำร้องขอ
        // ทำสิ่งที่ต้องการกับค่า test01 ได้ที่นี่

        $reservation = reservations::where('res_status', $test01)->orderBy("id", "desc")->paginate(5);
        return ['reservations' => $reservation, 'test01' => $test01];
    }

    public function petition2(Request $request)
    {
        $test01 = $request->input('test01'); // รับค่า test01 จากคำร้องขอ
        // ทำสิ่งที่ต้องการกับค่า test01 ได้ที่นี่

        $reservation = reservations::where('res_status', $test01)->orderBy("id", "desc")->paginate(5);
        return ['reservations' => $reservation, 'test01' => $test01];
    }

    public function reservation_list()
    {
        //
        return view('titles_Employee.reservation_list');
    }

    public function statistics()
    {
        //
        return view('titles_Employee.statistics');
    }

/*manage_account
    create_user
    store_user
    edit_user
    update_user
    destroy_user
    */
    public function manage_account()
    {
        // เรียกดูรายชื่อผู้ใช้ทั้งหมดจากฐานข้อมูล
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('titles_Employee.manage_account', ['users' => $users]);
    }

    public function create_user()
    {
        // แสดงหน้าฟอร์มสำหรับเพิ่มข้อมูล
        return view('titles_Employee.add_account_user');
    }

    public function store_user(Request $request)
    {
        // ตรวจสอบว่ารหัสผ่านและยืนยันรหัสผ่านตรงกันหรือไม่
        if ($request->password !== $request->confirm_password) {
            return redirect()->back()->withInput()->withErrors(['confirm_password' => 'รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน']);
        }

        // ทำการตรวจสอบและบันทึกข้อมูล
        $data = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'username' => 'required',
            'position' => 'required',
            'password' => 'required'
        ]);

        $newUser = new User;
        $newUser->us_fname = $request->first_name;
        $newUser->us_lname = $request->last_name;
        $newUser->us_email = $request->email;
        $newUser->us_tel = $request->mobile;
        $newUser->us_name = $request->username;
        $newUser->roles = $request->position;
        $newUser->us_password = bcrypt($request->password);
        $newUser->save();

        return redirect()->route('titles_Employee.store');
    }

    public function edit_user(User $user)
    {
        return view('titles_Employee.edit_account_user', ['user' => $user]);
    }

    public function update_user(Request $request, User $user)
    {
        // ทำการอัปเดตข้อมูล
        $data = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'username' => 'required',
            'position' => 'required',
            'password' => 'required'
        ]);

        $user->us_fname = $request->first_name;
        $user->us_lname = $request->last_name;
        $user->us_email = $request->email;
        $user->us_tel = $request->mobile;
        $user->us_name = $request->username;
        $user->roles = $request->position;
        $user->us_password = bcrypt($request->password);
        $user->save();

        return redirect(route('titles_Employee.manage_account'))->with('success', 'แก้ไขข้อมูลผู้ใช้สำเร็จ');
    }

    public function destroy_user(User $user)
    {
        // ลบข้อมูลผู้ใช้ออกจากฐานข้อมูล
        $user->delete();

        return redirect(route('titles_Employee.manage_account'))->with('success', 'ลบข้อมูลผู้ใช้สำเร็จ');
    }
    public function edit(User $user)
    {
        return view('titles_Employee.edit_account_user', compact('user'));
    }
    public function updatePetition(Request $request, $id)
    {
        $request->validate([
            'newStatus' => 'required',
        ]);
        $reservation = reservations::findOrFail($id);
        $reservation->res_status = $request->newStatus;
        $reservation->save();

        return redirect()->route('test')->with('success', 'Status updated successfully!');
    }

}

