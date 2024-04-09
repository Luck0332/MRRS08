<?php

namespace App\Http\Controllers;
use App\Models\reservations;
use App\Models\Room;
use App\Models\reserver_information;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    public function reservation_list()
    {
        $data['reservations'] =  reservations::all();
        return view('titles_Employee.reservation_list',$data);
    }

    public function updateReservation_Cancel(Request $request, $id){
        $reservation = reservations::findOrFail($id);
        $reservation->res_status = 'C'; // ตั้งค่าสถานะเป็น 'C' สำหรับยกเลิก
        $reservation->save();

    return redirect()->back()->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
    }
    public function getReservationDetails($id)
    {

        $data1 = reservations::find($id);
        $data2 = Room::find($data1->room_id);
        $data3 = reserver_information::find($data1->resinfo_id);


        return response()->json(['data1' => $data1, 'data2' => $data2, 'data3' => $data3]);

    }
}
