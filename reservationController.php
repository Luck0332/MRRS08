<?php

namespace App\Http\Controllers;

use App\Models\reservations;

use App\Models\reserver_information;
use App\Models\app;
use App\Models\Room;
use Illuminate\Http\Request;


class reservationController extends Controller
{
    public function reservation_list()
    {
        $reserver_information = reserver_information::all();
        $statuscheck = 'A';
        $room = Room::all();
        $reservation = reservations::all();

        $reservations = reservations::where('res_status', $statuscheck)->orderBy("id", "desc")->paginate(5);

        // return view('titles_Employee.reservation_list',['reservations' => $reservations, 'data' => $data, 'data2'=>$data2, 'data3'=>$data3]);
        return view('titles_Employee.reservation_list', compact('reserver_information', 'room', 'reservations'));
        // $reservation = reservations::where('res_status')->orderBy("id", "desc")->paginate(5);
        // return view('titles_Employee.reservation_list',['reservations' => $reservation]);
        //$data['reservations'] = reservations::all()->paginate(5);
        //return view('titles_Employee.reservation_list',$data);
    }

    public function updateReservation_Cancel(Request $request, $id)
    {
        $reservation = reservations::findOrFail($id);
        $reservation->res_status = 'C'; // ตั้งค่าสถานะเป็น 'C' สำหรับยกเลิก
        $reservation->save();

        return redirect()->back()->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
    }
    // public function getReservationDetails($id) {
    //     $data1 = reservations::find($id);
    //     dd($data1());
    //     $data2 = Room::find($id);
    //     dd($data2());
    //     $data3 = reserver_information::find($id);
    //     dd($data3());
    //     if ($data1 && $data2 && $data3) {
    //         // ดำเนินการเมื่อข้อมูลถูกต้อง
    //         return response()->json([
    //             'html' => view('titles_Employee.reservation_list')->with('data1', $data1)->with('data2', $data2)->with('data3', $data3)->render()
    //         ]);
    //     } else {
    //         // ไม่พบข้อมูลหรือข้อผิดพลาดในการค้นหา
    //         return response()->json(['error' => 'Data not found'], 404);
    //     }
    // }

    // public function getReservationDetails($id) {
    //     $data1 = reservations::find($id);
    //     $data2 = Room::find($data1->room_id);
    //     $data3 = reserver_information::find($data1->resinfo_id);

    //     // Check if data1 is not null before proceeding
    //     if ($data1) {
    //         return response()->json([
    //             'html' => view('titles_Employee.reservation_list', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3])->render()
    //         ]);
    //     } else {
    //         // Handle the case where the reservation with the given ID is not found
    //         return response()->json(['error' => 'Reservation not found'], 404);
    //     }
    // }
    public function getReservationDetails($id)
    {

        $data1 = reservations::find($id);
        $data2 = Room::find($data1->room_id);
        $data3 = reserver_information::find($data1->resinfo_id);

        /* $results = reservations::where('id', '=', "$id")




            ->join('reserver_information', 'reservations.resinfo_id', '=', 'reserver_information.id')
            ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->get(); */

    // public function getReservationDetails($id)
        // // ดึงข้อมูลผู้จองและข้อมูลอื่นๆ ที่เกี่ยวข้อง
        /* return view('titles_Employee.reservation_list', ['data3' => $data3,'data2' => $data2,'data1' => $data1])->render(); */

        return response()->json(['data1' => $data1, 'data2' => $data2, 'data3' => $data3]);

    }
}

    // public function reserver_information()
    // {
    //     $reserver_information = reserver_information::all();
