<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\User;
use App\Models\reserver_information;
use App\Models\Room;
use App\Models\reservations;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function handleFormSubmission(Request $request)
    {
        $dateData = $request->input('date');

        // Redirect to search page with data
        return redirect()->route('getsearch', ['date' => $dateData]);
    }


    /**
     * Display a listing of the resource.
     */
    public function getSearch(Request $request)
    {
        $dateData = $request->session()->get('dateData');
        return view('titles_User.search_room', compact('dateData'));
    }

    public function getReserve()
    {
        //
        return view('titles_User.reserve_room');
    }

    public function getFollow(Request $req)
    {
        $reservation = Reservation::findOrFail($req); //หาตำแหน่ง$req
        $roomid = Room::findOrFail($reservation->ro_id);
        $resinfo_id = User::findOdFail($reservation->id);


    }

    public function getInformation()
    {
        //
        return view('titles_User.fill_information');
    }
    public function getcalender()
    {
        //
        return view('titles_User.testcalender');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
{
    $resinfo_id = reserver_information::where('id', $id)->firstOrFail();
    // dd($resinfo);
        // Now $resinfo contains the first record that matches the column name and value // ดึงข้อมูล Reserver_info โดยใช้ id
    // $username = reservations::findOrFail($resinfo_id->id); // ดึงชื่อผู้จองจาก Reserver_info
    $username = reservations::where('resinfo_id', $id)->firstOrFail();

    $room = Room::where('id', $username->room_id)->firstOrFail();

    // dd($resinfo_id);
    // dd($username);
    // $room = Room::findOrFail($username->room_id); // ดึงข้อมูลห้องโดยใช้ room_id จาก Reserver_info

    return view('titles_User.reserve_bill', compact('username', 'resinfo_id', 'room'));
    }

public function showreservebill()
{

  return view('titles_User.reserve_bill');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    //
    }
}
