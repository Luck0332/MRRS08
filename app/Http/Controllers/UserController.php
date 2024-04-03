<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getReserve()
    {
        //
        return view('titles_User.reserve_room');
    }

    public function getFollow()
    {
        //
        return view('titles_User.follow');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_accout_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'image',
        ]);
        $user = new User();
        $user->title_id = $request->title_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        //เช็คไฟล์ภาพ

        $user->save();
        return redirect()->route('manage_account')->with('success', 'User has been added successfully!');
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
    $users = User::find($id);
    $users->delete();
    return redirect()->route('manage_account')->with('success', 'User has been deleted successfully.');

    }
}
