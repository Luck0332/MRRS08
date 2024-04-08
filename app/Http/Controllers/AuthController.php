<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\reservations;
use App\Models\reserver_information;
class AuthController extends Controller
{

	public function redirectToLine()
	{
    return Socialite::driver('line')->redirect();
	}


	public function handleLineCallback()
	{
    	$user = Socialite::driver('line')->user();
		dd($user);
		//$lineid = $user->getId();
		
		// $user->token;
	}
    //
	/***
	 * Create User information
	 */
	public function userInformation(Request $request){
		$data = $request->validate([
			'first_name' => 'required',
        	'last_name'=> 'required',
        	'telenum'=> 'required',
			'agenda'=> 'required'
		]);

		$newUser = new reserver_information;
		$newUser->reserver_fname = $request->first_name;
		$newUser->reserver_lname = $request->last_name;
		$newUser->reserver_tel = $request->telenum;
		$newUser->save();

		$newreserve = new reservations;
		$newreserve -> agenda = $request->agenda;
		$newreserve -> save();
		return redirect()->route('fill_Information.add');
	}
    //
}