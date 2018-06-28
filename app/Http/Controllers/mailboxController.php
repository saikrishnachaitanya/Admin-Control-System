<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailer;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mail;
class mailboxController extends Controller
{
   public function view_mailbox()
    {
        return view('layouts.mailbox');
    }    
    public function get_mail()
    {
$input = Input::only('email','subject','message');            
    // $user=array("email"=>$input['email'],"subject"=>$input['subject'],"");

        // $this->validate( ['email'=>'required|email',
        // 	'subject'=>'min:5', 
        // 	'message'=>'min:10']);
        $data= array('mail'=>$input['email'],
        	         'subject'=>$input['subject'],
        	         'message'=>$input['message'] );

        Mail::raw( "yhuygytgu", function($message) use ($data) {
        	$message->from('saichaitanya5960@gmail.com');
        	$message->to($data['mail']);
        	$message->subject($data['subject']);

        });
        return "dwd";
    }    
}
