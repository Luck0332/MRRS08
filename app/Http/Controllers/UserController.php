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
    public function Submission(Request $request)
{
    $roomSize = $request->input('room_size');
    $startDate = $request->input('date');
    $endDate = $request->input('end_date');

    // แยกวันที่และเวลาเริ่มต้นและสิ้นสุด
    $startDateTimeParts = explode(' to ', $startDate);
    $startDate = explode(' ', $startDateTimeParts[0])[0];
    $endDate = explode(' ', $startDateTimeParts[1])[0];

    //code here
    $rooms = Room::select('rooms.id AS room_id', 'rooms.ro_name', 'rooms.ro_size', 'rooms.ro_price')
        ->leftJoin('reservations', function ($join) use ($startDate, $endDate) {
            $join->on('rooms.id', '=', 'reservations.room_id')
                ->where('reservations.res_startdate', '>=', $startDate)
                ->where('reservations.res_enddate', '<=', $endDate)
                ->whereIn('reservations.res_status', ['A', 'W']);
        })
        ->whereNull('reservations.id')
        ->where('rooms.ro_size', $roomSize)
        ->distinct()
        ->get();

    return view('titles_User.search_room', compact('rooms', 'startDate', 'endDate', 'roomSize'));
}





    public function getReserve()
    {
        //
        return view('titles_User.reserve_room');
    }

    public function getFollow(Request $req)
    {
        $reservation = reservations::findOrFail($req); //หาตำแหน่ง$req
        $roomid = Room::findOrFail($reservation->ro_id);
        $resinfo_id = User::findOdFail($reservation->id);


    }

    public function getInformation($id)
    {
        $id;
        return view('titles_User.fill_information',['id' => $id]);
    }
    public function getcalender()
    {
        //
        return view('titles_User.testcalender');
    }


    public function submidreservation(Request $request,$reserv_room)
    {
        $length = 10; // ความยาวของรหัสซีเรียลที่ต้องการ
        $serialCode = uniqid('', true);
        $serialCode = substr($serialCode, - $length);

        $reserv_info = new reserver_information;
        $reserv_info->reserver_fname = $request->us_fname;
        $reserv_info->reserver_lname = $request->us_lname;
        $reserv_info->reserver_tel = $request->us_tel;
        $reserv_info->save;

        $reserv_room->res_status = $request->newStatus;
        $reserv_room->agenda = $request->agenda;
        $reserv_room->resinfo_id = $reserv_info->id;
        $reserv_room->res_serialcode = $serialCode;

        $reserv_room->save;
    }


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
