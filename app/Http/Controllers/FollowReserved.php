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

    $results = Reservations::where('res_serialcode', '=', "$search")
        ->join('reserver_information', 'reservations.resinfo_id', '=', 'reserver_information.id')
        ->join('rooms','reservations.room_id','=','rooms.id')
        ->get();

    //dd($results);
    //die;
    return view('titles_User.follow', ['results' => $results]);
     }
}
