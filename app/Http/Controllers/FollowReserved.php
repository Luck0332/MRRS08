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
     public function reservation_cancel(Request $request, $res_serialcode)
    {
        // หาข้อมูลการจองด้วย res_serialcode
        $reservation = reservations::where('res_serialcode', $res_serialcode)->firstOrFail();

        // ทำการอัปเดตสถานะของการจองเป็น 'C' (ยกเลิก)
        $reservation->res_status = 'C';
        $reservation->save();

        return redirect()->route('titles_Employee.manage_account')->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
    }

    public function reservation_wait(Request $request, $res_serialcode)
    {
        // หาข้อมูลการจองด้วย res_serialcode
        $reservation = reservations::where('res_serialcode', $res_serialcode)->firstOrFail();

        // ทำการอัปเดตสถานะของการจองเป็น 'C' (ยกเลิก)
        $reservation->res_status = 'W';
        $reservation->save();

        return redirect()->route('titles_Employee.manage_account')->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
    }
}
