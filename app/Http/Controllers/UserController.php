<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\User;
use App\Models\Room;
use App\Models\reservations;
use App\Models\reserver_information;
use App\Models\resinfo;
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
        $reserv_room = new reservations;
        $reserv_room->res_startdate = $startDate;
        $reserv_room->res_enddate = $endDate;
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
        if ($roomSize != null) {
            $rooms = Room::where('ro_size', $roomSize)->get();
        } else {
            $rooms = Room::all();
        }
        return view('titles_User.search_room', compact('rooms', 'startDate', 'endDate', 'roomSize', 'reserv_room'));
    }
    public function ToSuccess(){
        return view('titles_User.Reserve_success');
    }

    public function StoreInfo(Request $request)
    {
        $length = 4; 
        $serialCode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2);
        $serialCode .= sprintf("%04d", mt_rand(0, 9999));

        $res_info = new reserver_information();
        $res_info->reserver_fname = $request->us_name;
        $res_info->reserver_lname = $request->us_fname;
        $res_info->reserver_tel = $request->us_tel;
        $res_info->save();

        $reservation = new reservations();
        $reservation->room_id = $request->id;
        $reservation->res_startdate = $request->start_date;
        $reservation->res_enddate = $request->end_date;
        $reservation->res_status = 'W';
        $reservation->res_serialcode = $serialCode;
        $reservation->agenda = $request->agenda;

        //$reservation->us_name = $request->us_name;
        //$reservation->us_fname = $request->us_fname;
        //$reservation->us_tel = $request->us_tel;
        //$reservation->agenda = $request->agenda;

        $reservation->save();

        return redirect()->route('Reserve_success');
    }


    public function getReserve()
    {
        return view('titles_User.reserve_room');
    }

    public function getFollow()
    {
        //
        return view('titles_User.follow');
    }

    public function getInformation($id, $start_date, $end_date)
    {
        // Do whatever you need with $id, $start_date, and $end_date
        return view('titles_User.fill_information', ['id' => $id, 'start_date' => $start_date, 'end_date' => $end_date]);
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
    public function show(string $id)
    {
        //
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
