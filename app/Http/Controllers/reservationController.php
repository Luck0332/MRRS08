<?php

namespace App\Http\Controllers;
use App\Models\reservations;
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
}