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

    public function getSearch()
    {
        //
        return view('titles_User.search_room');
    }
    public function getInformation()
    {
        //
        return view('titles_User.fill_information');
    }

    public function getLineAuth()
    {
        //
        return view ('titles_User.lineAuth');
    }

    public function getSuccess()
    {
        return view('titles_User.success');
    }

    public function getcalender()
    {
        //
        return view('titles_User.testcalender');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    //
    }
}
