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
use App\Models\reservationR;

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

    // public function petition()
    // {
    //     $reservations = reservations::whereNotNull('res_status')->orderBy("id", "asc")->paginate(10);
    //     return view('titles_Employee.petition',['reservations' => $reservations]);
    // }
    // public function petition1()
    // {
    //     $test02 = 'R';
    //     $reservationRe = reservations::where('res_status', $test02)->orderBy("id", "desc")->paginate(5);
    //     dd($reservationRe);
    //     return view('titles_Employee.petition',['reservations' => $reservationRe, 'test02' => $test02]);
    // }

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

    public function manage_account()
    {
        //
        $users = User::orderBy('id','desc')->paginate(5);
        return view('titles_Employee.manage_account',['users' => $users]);
    }

    public function manage_rooms()
    {
        //
        $rooms = Room::orderBy('ro_id')->get();
        return view('titles_Employee.manage_rooms', ['rooms' => $rooms]);
    }

    public function accout()
    {
        //
        return view('titles_Employee.accout');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('titles_Employee.add_account_user');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'username' => 'required',
            'position' => 'required',
            'password' => 'required'
        ]);

        $newUser = User::find($user);
        $newUser->us_fname = $request->first_name;
        $newUser->us_lname = $request->last_name;
        $newUser->us_email = $request->email;
        $newUser->us_tel = $request->mobile;
        $newUser->us_name = $request->username;
        $newUser->roles = $request->position;
        $newUser->us_password = bcrypt($request->password);
        $newUser->save();
        return redirect()->route('titles_Employee.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('manage_account')->with('success', 'User has been deleted successfully.');

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

