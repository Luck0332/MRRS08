<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\Reserver_info;
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

        $reserv_room = new reservations();
        $reserv_room->res_startdate  = $startDate;
        $reserv_room->res_enddate = $endDate;

        if($roomSize != null){
            $rooms = Room::where('ro_size', $roomSize)->get();
        }else{
            $rooms = Room::all();
        }
        return view('titles_User.search_room', compact('rooms','startDate', 'endDate', 'roomSize','reserv_room'));
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

    public function getInformation($id,$reserv_room)
    {
        $reserv_room;
        $id;
        return view('titles_User.fill_information',['id' => $id, 'reserv_room' => $reserv_room]);
    }
    public function getcalender()
    {
        //
        return view('titles_User.testcalender');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submidreservation(Request $request,$reserv_room)
    {

        $length = 10; // ความยาวของรหัสซีเรียลที่ต้องการ
        $serialCode = uniqid('', true);
        $serialCode = substr($serialCode, - $length);

        $reserv_info = new Reserver_info;
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
