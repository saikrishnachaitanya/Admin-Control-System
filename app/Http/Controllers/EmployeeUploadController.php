<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeUpload;
use Illuminate\Support\Facades\Storage;

class EmployeeUploadController extends Controller
{
    public function fileStore(Request $request)
    {
    	$data = $request->all();

      if($request->hasFile('image'))
        {
            
           //$abc=$request->image->storeAs('public','deb.jpeg');
          
			     //data1=str_replace('public/','',$abc);
          
           // $data1= EmployeeUpload::create([$data1]);

            Storage::put('uploads/employee',$data['image']);

            return $request->image->extension();
             
        }

        /*$path = $request->file('avatar')->store('avatars');

        return $path;*/
    }
}
