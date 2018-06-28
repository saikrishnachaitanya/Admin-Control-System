<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\RolePermissions;
use App\Models\Permissions;
use Auth;
use DB;

class LoginController extends Controller
{

  /**
   * Get login page
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function getlogin()
    {
       return view('layouts.login');
    }

  //---------------------------------------------------------------------------

  /**
   * Do login 
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function dologin(Request $request)
    {
        //die('hi');
        $data = $request->all();
        //$data['password'] = Hash::make('password');
         $validator = Validator::make($data, [
	                      'email' => 'required|email|exists:users',
	                      'password' => 'required'
	                      ]);

        if ($validator->fails()) {
          return redirect()->action('LoginController@getlogin');
        }
        else{
        	$userData = array('email' => $data['email'], 'password' => $data['password']);

        	if (Auth::attempt($userData)) {
           $userAuth = Auth::User();

           return redirect()->action('Controller@dashboard');
           }

           else {
            return redirect()->action('LoginController@getlogin');
           }
    
      } 	
     
  }
}
