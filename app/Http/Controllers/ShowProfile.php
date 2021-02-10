<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class ShowProfile extends Controller
{
    public function viewProfile()
    {
        return view('user.profile', array('user' => Auth::user()));
    }
}
