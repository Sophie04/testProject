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
}
