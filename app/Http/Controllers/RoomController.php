<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::orderBy('ro_id','desc')->paginate(5);
        return view('titles_Employee.manage_account',['rooms' => $rooms]);
    }

    public function manage_rooms()
    {
        $rooms = Room::orderBy('id','desc')->paginate(10);
        return view('titles_Employee.manage_rooms', ['rooms' => $rooms]);
    }

    public function create_rooms(){
        return view('titles_Employee.add_rooms');
    }

    public function store_rooms(Request $request ){
        $data = $request->validate([
            'room' => 'required',
            'price'  => 'required',
            'size_room' => 'required',
            'capacity' => 'required',
            'typeroom' => 'required',
            'status_room' => 'required',
            'typesplit' => 'required',
            'notation' => 'required'
        ]);

        $newRoom = new Room;
        $newRoom->ro_name= $request->room;
        $newRoom->ro_price = $request->price;
        $newRoom->ro_size = $request->size_room;
        $newRoom->ro_capacity = $request->capacity;
        $newRoom->ro_typeroom = $request->typeroom;
        $newRoom->ro_avaliable = $request->status_room;
        $newRoom->ro_cansplit = $request->typesplit;
        $newRoom->ro_description = $request->notation;

        $newRoom->save();

        // dd($request);
        if($request->image){
            $file = $request->image;

            $extension = strtolower($file->getClientOriginalExtension());
            $filename = $newRoom->id.'.'.$extension;
            $file->move('image/',$filename);

            $newRoom->ro_pic1 = $filename;
            $newRoom->save();
        }

        return redirect()->route('titles_Employee.store_rooms');
    }


    public function edit_rooms(Room $rooms)
    {
        return view('titles_Employee.edit_rooms', ['rooms' => $rooms]);
    }

    public function show($id,$reserv_room)
    {
        $room = Room::where('id', $id)->first();
        $reserv_room->room_id = $room->id;
        $diff_in_days = $reserv_room->res_startdate->diffInDays($reserv_room->res_enddate);
        $reserv_room->res_total = $diff_in_days * $room->ro_price;
        $type_rooom = '0';
        $reserv_room->res_typeroom = $type_rooom;
        $type_day = 'F';
        $reserv_room->res_daytype = $type_day;

        return view ('titles_User.room_info',['room' => $room, 'reserv_room' => $reserv_room]);
    }

    public function update_rooms(Request $request, Room $rooms)
{
    // Validate the incoming form data
    $validatedData = $request->validate([
        'room' => 'required|string|max:255',
        'price' => 'required|numeric',
        'size_room' => 'required|string|max:255',
        'capacity' => 'required|integer',
        'typeroom' => 'required|boolean',
        'status_room' => 'required|boolean',
        'typesplit' => 'required|boolean',
        'notation' => 'nullable|string|max:255',
    ]);
    // Update the room model with validated data
    $rooms->update([
        'ro_name' => $validatedData['room'],
        'ro_price' => $validatedData['price'],
        'ro_size' => $validatedData['size_room'],
        'ro_capacity' => $validatedData['capacity'],
        'ro_typeroom' => $validatedData['typeroom'],
        'ro_avaliable' => $validatedData['status_room'],
        'ro_cansplit' => $validatedData['typesplit'],
        'ro_description' => $validatedData['notation'],
    ]);

    // Redirect back to the room management page with success message
    return redirect()->route('titles_Employee.manage_rooms')->with('success', 'แก้ไขข้อมูลห้องสำเร็จ');
}

    public function destroy_rooms(Room $rooms)
    {
        // ลบข้อมูลผู้ใช้ออกจากฐานข้อมูล
        $rooms->delete();

        return redirect(route('titles_Employee.manage_rooms'))->with('success', 'ลบข้อมูลห้องสำเร็จ');
    }


}
