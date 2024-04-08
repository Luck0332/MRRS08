<?php

namespace App\Http\Controllers;

use App\Models\M_titles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function handleFormSubmission(Request $request)
    {
        $dateData = $request->input('date');
    
        // Redirect to search page with data
        return redirect()->route('getsearch', ['date' => $dateData]);
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function getSearch(Request $request)
    {
        $dateData = $request->session()->get('dateData');
        return view('titles_User.search_room', compact('dateData'));
    }
    
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

    public function getInformation()
    {
        //
        return view('titles_User.fill_information');
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
