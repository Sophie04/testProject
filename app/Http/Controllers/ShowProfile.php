<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class ShowProfile extends Controller
{
    
    public function viewProfile()
    {
        return view('user.profile', array('user' => Auth::user()));
    }

    public function updateProfile(Request $request)
    {
    	if($request->hasFile('photo')){
    		$photo = $request->file('photo');
    		$filename = time() . '.' . $photo->getClientOriginalExtension();
    		Image::make($photo)->resize(300,300)->save('/photos/' . $filename);

    		$user = Auth::user();
    		$user->photo = $filename;
    		$user->save();
    	}
    	
    	return view('user.profile', array('user' => Auth::user()));
    }
}
