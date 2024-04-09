<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\User;
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



        $rooms = Room::select('rooms.id', 'rooms.ro_name', 'rooms.ro_size', 'rooms.ro_price')
            ->leftJoin('reservations', 'reservations.room_id', '=', 'rooms.id')
            ->where('rooms.ro_size', $roomSize)
            ->where(function ($query) {
                $query->where('reservations.res_status', '!=', 'A')
                      ->where('reservations.res_status', '!=', 'W')
                      ->orWhereNull('reservations.res_status');
            })
            ->where(function ($query) use ($endDate) {
                $query->where('reservations.res_enddate', '>', $endDate)->orWhereNull('reservations.res_enddate');
            })
            ->where(function ($query) use ($startDate) {
                $query->where('reservations.res_startdate', '>', $startDate)->orWhereNull('reservations.res_startdate');
            })
            ->distinct()
            ->get();

        return view('titles_User.search_room', compact('rooms', 'startDate', 'endDate', 'roomSize'));
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
