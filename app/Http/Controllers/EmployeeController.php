<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\Room;
use App\Models\User;
use App\Http\Controllers\Validator;
use App\Http\Controllers\UserController;
use App\Models\approves;
use App\Models\reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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
    $reservationsW = reservations::where('res_status', 'W')->orderBy("id", "asc")->paginate(5);
    $reservationsR = reservations::where('res_status', 'R')->orderBy("id", "asc")->paginate(2);
    return view('titles_Employee.petition', compact('reservationsW', 'reservationsR'));
}



    // หน้าสถิติการจอง
    public function statistics(){
        $smallRoomCount = Room::where('ro_size', 'S')->count();
        $mediumRoomCount = Room::where('ro_size', 'M')->count();
        $largeRoomCount = Room::where('ro_size', 'L')->count();
        $waitReservationCount = reservations::where('res_status', 'W')->count();
        $data = [
            'wait_reservation_count' => $waitReservationCount,
            'user_count' => User::count(),
            'room_count' => Room::count(),
            'room_sizes' => [
                'S' => $smallRoomCount,
                'M' => $mediumRoomCount,
                'L' => $largeRoomCount,
            ]
        ];
        return view('titles_Employee.statistics' , compact('data'));

    }

    public function getReservationsByMonth()
    {
        $dataA = reservations::selectRaw('COUNT(*) as count, MONTH(res_startdate) as month')
        ->where('res_status', 'A')
        ->groupBy(DB::raw('MONTH(res_startdate)'))
        ->orderBy(DB::raw('MONTH(res_startdate)'))
        ->get();

        $dataR = reservations::selectRaw('COUNT(*) as count, MONTH(res_startdate) as month')
                ->where('res_status', 'R')
                ->groupBy(DB::raw('MONTH(res_startdate)'))
                ->orderBy(DB::raw('MONTH(res_startdate)'))
                ->get();

        return response()->json([
        'dataA' => $dataA,
        'dataR' => $dataR
        ]);
    }
    

    public function accout($id)
    {
        // Retrieve user data by ID
        $user = User::findOrFail($id);

        // Pass user data to the 'accout' view
        return view('accout', ['user' => $user]);
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
    // Validate the form data
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,us_email', // Ensure email uniqueness in the users table
        'mobile' => ['required', 'numeric', 'digits:10', function ($attribute, $value, $fail) {
            // Custom validator to check if mobile number has exactly 10 digits
            if (strlen($value) !== 10) {
                $fail('The '.$attribute.' must be exactly 10 digits.');
            }
        }],
        'username' => 'required|unique:users,us_name', // Ensure username uniqueness in the users table
        'position' => 'required',
        'password' => 'required|min:8', // Minimum password length of 8 characters
        'confirm_password' => 'required|same:password', // Ensure confirm_password matches password
    ], [
        'email.unique' => 'Email address already exists.',
        'username.unique' => 'Username already exists.',
        'confirm_password.same' => 'Password and confirm password must match.',
    ]);

    // Create a new user instance
    $newUser = new User();
    $newUser->us_fname = $validatedData['first_name'];
    $newUser->us_lname = $validatedData['last_name'];
    $newUser->us_email = $validatedData['email'];
    $newUser->us_tel = $validatedData['mobile'];
    $newUser->us_name = $validatedData['username'];
    $newUser->roles = $validatedData['position'];
    $newUser->us_password = bcrypt($validatedData['password']);
    $newUser->save();

    return redirect()->route('titles_Employee.manage_account')->with('success', 'User account created successfully.');
}

    public function edit_user(User $user)
    {
        return view('titles_Employee.edit_account_user', ['user' => $user]);
    }

    public function update_user(Request $request, User $user)
{
    // Validate the incoming form data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:30',
        'mobile' => ['required', 'numeric', 'digits:10', function ($attribute, $value, $fail) {
            // Custom validator to check if mobile number has exactly 10 digits
            if (strlen($value) !== 10) {
                $fail('The '.$attribute.' must be exactly 10 digits.');
            }
        }],
        'username' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'password' => 'required|string|min:6', // Adjust the minimum length as needed
    ]);

    // Update the user model with validated data
    $user->update([
        'us_fname' => $validatedData['first_name'],
        'us_lname' => $validatedData['last_name'],
        'us_email' => $validatedData['email'],
        'us_tel' => $validatedData['mobile'],
        'us_name' => $validatedData['username'],
        'roles' => $validatedData['position'],
        'us_password' => Hash::make($validatedData['password']), // Hash the password
    ]);
    dd($user);

    // Redirect back to the user management page with success message
    return redirect()->route('titles_Employee.manage_account')->with('success', 'แก้ไขข้อมูลผู้ใช้สำเร็จ');
}

    public function destroy_user(User $user)
    {
        // ลบข้อมูลผู้ใช้ออกจากฐานข้อมูล
        $user->delete();

        return redirect(route('titles_Employee.manage_account'))->with('success', 'ลบข้อมูลผู้ใช้สำเร็จ');
    }

    public function updatePetitionW(Request $request, $id)
    {
        $request->validate([
            'newStatus' => 'required',
        ]);
        $reservation = reservations::findOrFail($id);
        $Approve = new approves();

        $reservation->res_status = $request->newStatus;
        $Approve->app_status_reserve = $request->newStatus;

        $reservation->save();
        $Approve->save();

        return redirect()->route('pageW')->with('success', 'Status updated successfully!');
    }
    public function updatePetitionR(Request $request, $id)
    {
        $request->validate([
            'newStatus' => 'required',
        ]);
        $reservation = reservations::findOrFail($id);
        $Approve = new approves();

        $reservation->res_status = $request->newStatus;
        $Approve->app_status_reserve = $request->newStatus;

        $reservation->save();
        $Approve->save();

        return redirect()->route('pageR
        ')->with('success', 'Status updated successfully!');
    }
    public function petition_reject()
    {
        $rejectR = reservations::where('res_status', 'R')->orderBy('id', 'asc')->paginate(2);
        return view('titles_Employee.petition_reject', compact('rejectR'));
    }

    }

