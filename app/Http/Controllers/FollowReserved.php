<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservations;
use App\Models\Room;
use App\Models\resinfo; // Import the resinfo model if it's not imported already
use Illuminate\Support\Facades\DB;

class FollowReserved extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $room = Room::all();
        $results = reservations::select('reservations.id', 'ro_pic1', 'res_serialcode', 'rooms.ro_name', 'reserver_information.reserver_fname', 'reserver_information.reserver_lname','res_status', 'res_startdate', 'res_enddate')
            ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->join('reserver_information', 'reservations.resinfo_id', '=', 'reserver_information.id')
            ->where('res_serialcode', $search)
            ->get();
        return view('titles_User.follow', compact('results', 'room'));
        return view('titles_User.follow', ['results' => $results]);
        return view('titles_User.follow', ['results' => $results]);
    }
     public function updatefollow(Request $request, $id)
    {
        $request->validate([
            'newStatus' => 'required',
        ]);
        //  dd($id);
        $reservation = reservations::find($id);
        $reservation->res_status = $request->newStatus;
        $reservation->save();


        return redirect()->route('follow.main')->with('success', 'Status updated successfully!');
    }
}
