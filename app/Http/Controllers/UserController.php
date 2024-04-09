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
    public function Submission(Request $request){
        $roomSize = $request->input('room_size');
        $startDate = $request->input('date');
        $endDate = $request->input('end_date');

        ($request);
        if($roomSize != 'A'){
            $rooms = Room::where('ro_size', $roomSize)->get();
        }else{
            $rooms = Room::all();
        }
        return view('titles_User.search_room', compact('rooms','startDate', 'endDate', 'roomSize'));
    }

    public function getReserve()
    {
        $reserv_room = new reservations();
        return view('titles_User.reserve_room',['reserv_room' => $reserv_room]);
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
    public function submidreservation(Request $request)
    {


        $reservation = new reservations();
        $reservation->res_status = $request->newStatus;



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
