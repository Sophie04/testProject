<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    
    public function viewAll()
    {
        return view('user.profile');
    }
}
