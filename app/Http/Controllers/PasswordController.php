<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Validator;
use App\User;
use App\Models\PasswordReset;
use  App\Mail\ForgotPassword;



class PasswordController extends Controller
{

 /**
  * Forgot Password View Page
  *
  * @access public
  * @param  Illuminate\Http\Request $request
  * @return Response
  * @since 1.0.0
  * @version 1.0.0
  * @author Nprodax Technologies Pvt. Ltd. <>
  *
  */

   public function getForgotPassword()
   {
   	return view('layouts.forgotPassword');
   }

   //--------------------------------------------------------------------------

   /**
   * Forgot Password Link
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function setForgotPasswordLink(Request $request)
   {
	   	 $data = $request->all();
	     $validator = Validator::make($data, [
		                      'email' => 'required|email'	                      
		                      ]);

	    if ($validator->fails()) {
	      $response = $validator->errors();
	    }
	    else {

	    	$validator = Validator::make($data, [
	                      'email' => 'required|email|exists:users,email'
	                      ]);

	    	if ($validator->fails()) {
	          //$response = $validator->errors();

	    		return view('mail.forgotPasswordMessage');
	        }    	
			else {
				$token = str_random(25);

				PasswordReset::create(['email'=> $data['email'],'token' => $token]);

				Mail::to($data['email'])->send(new ForgotPassword($token));

				return view('layouts.forgotPasswordMessage');
			}
		} 	
     
       return response()->json($response);
   }

   //--------------------------------------------------------------------------

   /**
   * Forgot Password
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function setForgotPassword($token)
   {	   	 
	     $validator = Validator::make(['token' => $token], [
		                      'token' => 'required|exists:password_resets,token'	      
		                      ]);

	    if ($validator->fails()) {
	      	//return view('layouts.forgotPasswordMessage');
	      	return "Wrong token!";
	    }
	    else {	    	
	    	$user = PasswordReset::where('token',$token)->first();
			  return view('layouts.resetPassword')
						->with('token', $token)
						->with('email', $user->email);
		  }

       return response()->json($response);
   }
   //--------------------------------------------------------------------------

   /**
   * Set New Password
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */


   public function setNewPassword(Request $request, User $userData)
   {
   		$data = $request->all();
          //print_r($data); die('hi');
   		$validator = Validator::make($data, [
	                      //'email' => 'required|email',
	                      'password' => 'required|confirmed|min:6',
	                      //'confirm_password' =>'required|confirmed|min:8'
	                      ]);

        if ($validator->fails()) {
          return "Password Doesn't matched";
         }

        else {

		   		$user = PasswordReset::where('token',$data['token'])->first();
		         //print_r($user->email); die('hi');
		   		$queryResult = $userData->where('email',$user->email)
		   		                       ->update(['password'=> bcrypt($data['password'])]);
		   					          
		   		if($queryResult){
		   			$message = "Congrats! Password changed successfully";
		   		}
		   		else {
		   			//$message = "Oops! Someting went wrong wrong try after sometime";
		   			$message = view('layouts.login');
		   		}
		   		return view('layouts.passwordResetMessage')
		   		        ->with('message', $message);		          
   		  }
    }
}
