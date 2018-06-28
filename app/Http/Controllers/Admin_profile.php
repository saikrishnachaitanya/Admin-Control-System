<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_profile extends Controller
{
 public function view_profile()
    {
        return view('layouts.admin_profile');
    }    
    //
}
