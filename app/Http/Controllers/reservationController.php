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
            $data2 = reserver_information::all();
            $data= 'A';
            $data3 = Room::all();

            $reservations = reservations::where('res_status', $data)->orderBy("id", "desc")->paginate(5);
            return view('titles_Employee.reservation_list',['reservations' => $reservations, 'data' => $data, 'data2'=>$data2, 'data3'=>$data3]);

        // $reservation = reservations::where('res_status')->orderBy("id", "desc")->paginate(5);
        // return view('titles_Employee.reservation_list',['reservations' => $reservation]);
        //$data['reservations'] = reservations::all()->paginate(5);
        //return view('titles_Employee.reservation_list',$data);
    }

    public function updateReservation_Cancel(Request $request, $id){
        $reservation = reservations::findOrFail($id);
        $reservation->res_status = 'C'; // ตั้งค่าสถานะเป็น 'C' สำหรับยกเลิก
        $reservation->save();

    return redirect()->back()->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
    }

    public function getReservationDetails($id) {
        $data1 = reservations::find($id);
        // dd($data1);
        $data2 = Room::find($data1->room_id);
        $data3 = reserver_information::find($data1->resinfo_id);
        // ดึงข้อมูลผู้จองและข้อมูลอื่นๆ ที่เกี่ยวข้อง
        return response()->json([
            // 'html' => view('titles_Employee.reservation_list', ['data1' => $data1])->render()

            'html' => view('titles_Employee.reservation_list', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3])->render()
        ]);
    }

    // public function reserver_information()
    // {
    //     $reserver_information = reserver_information::all();
    //     return view('titles_Employee.reservation_list',compact('reserver_information'));
    // }

    // public function store_user(Request $request)
    // {
    //     // ทำการตรวจสอบและบันทึกข้อมูล
    //     $data = $request->validate([
    //         'first_name' => 'required',
    //         'last_name'  => 'required',
    //         'email' => 'required',
    //         'mobile' => 'required',
    //         'username' => 'required',
    //         'position' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $newUser = new User;
    //     $newUser->us_fname = $request->first_name;
    //     $newUser->us_lname = $request->last_name;
    //     $newUser->us_email = $request->email;
    //     $newUser->us_tel = $request->mobile;
    //     $newUser->us_name = $request->username;
    //     $newUser->roles = $request->position;
    //     $newUser->us_password = bcrypt($request->password);
    //     $newUser->save();

    //     return redirect()->route('titles_Employee.store');
    // }



}
