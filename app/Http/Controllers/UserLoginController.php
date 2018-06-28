<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LocationController;
use App\User;

class UserLoginController extends Controller
{
    public function docreatelogin(Request $request)
    {
    	$data = $request->all();
    	//print_r($data);die('hi');

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
