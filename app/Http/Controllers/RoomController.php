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
        $rooms = Room::orderBy('id')->get();
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

    public function update_rooms(Request $request, Room $rooms)
    {
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
        $rooms->ro_name= $request->room;
        $rooms->ro_price = $request->price;
        $rooms->ro_size = $request->size_room;
        $rooms->ro_capacity = $request->capacity;
        $rooms->ro_typeroom = $request->typeroom;
        $rooms->ro_avaliable = $request->status_room;
        $rooms->ro_cansplit = $request->typesplit;
        $rooms->ro_description = $request->notation;
        $rooms->save();


        return redirect()->route('titles_Employee.manage_rooms')->with('success', 'แก้ไขข้อมูลห้องสำเร็จ');;
    }
    public function destroy_rooms(Room $rooms)
    {
        // ลบข้อมูลผู้ใช้ออกจากฐานข้อมูล
        $rooms->delete();

        return redirect(route('titles_Employee.manage_rooms'))->with('success', 'ลบข้อมูลห้องสำเร็จ');
    }


}