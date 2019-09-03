<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
    	//dd($request->all());

    	if (Auth::attempt([
    		'email' => $request->email,
    		'password'=> $request->password
    	])) 
    	{
    		$user = User::where('email', $request->email)->first();
            $users = Auth()->user();
    		if ($user->is_admin()) 
    			{
    				return redirect()->route('dashboard');
    			}	
    			return redirect()->route('dashboard');
    	}//ending if

    	// redirect()->back();
         return redirect('/login');
    }//function

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }

    public function coolText() {
    return 'NAPAKAGALING MO NA MAG LARAVEL BOY ';
    }

    public function countAccounts()
    {
        $count = User::count();
        return $count;
    }
}
