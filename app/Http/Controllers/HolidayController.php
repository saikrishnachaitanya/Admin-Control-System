<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use Validator;
use DB;

class HolidayController extends Controller
{

  /**
   * Holiday Blade File
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function createHoliday()
    {
      
      return view('layouts.create_holiday');
                
    }

   
   //--------------------------------------------------------------------------

   /**
   * Insert Holiday Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  	public function holidayInsert(Request $request)
    {
     
	     $response = [];
	     $data = $request->all();
	     
	     foreach ($data as $key => $value) {
	      $data[$key] = strtoupper($value);
	     }
        //print_r($data); die('hi');
	     $validator = Validator::make($data, [
	                  'holiday_date'                => 'required|date|unique:holidays',
	                  'holiday_name'                => 'required|string',
	                  'holiday_type'                => 'required|string',
	                  
	                  ]);

           if ($validator->fails()) {
              return view('layouts.holiday_error_msg');
            }

         else {

           	   $response['data'] = Holiday::create($data);

               return view('layouts.holiday_insert_success');
              
              
               }

                return response()->json($response);       
    }

    //-------------------------------------------------------------------------

  /**
   * Update Holiday Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function holidayUpdate(Request $request)
    {
       $response = [];
      $data = $request->all();
      


       $messages = [
                  'id.exists'   => 'Please enter Existing Holiday Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'                      => 'sometimes|exists:holidays,id',
                           
                  ]);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();

        foreach ($data as $key => $value) {
       $data[$key] = strtoupper($value);
     }
     
	         
      $response['data'] = Holiday::where('id', $data['id'])
                         ->update($data);
                         
     $queryResult = Holiday::where('id', $data['id'])->first();
     
      if($response['data']){
      //$response['message'] = "Your record is updated successfully"; 
      //$response['data'] = $queryResult; 
        return view('layouts.holiday_update_success');
      }
      
      }

      return response()->json($response); 
    }

    //-------------------------------------------------------------------------

  /**
   * Delete Holiday Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function holidayDelete($id)
    {
      $response = [];
      //$data = $request->all();
      $data['id'] = $id;
      $queryResult = Holiday::where('id', $data['id'])->first();
      $response['data'] = Holiday::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data']) {
            return view('layouts.holiday_delete_success');
      }
      else {
            return redirect('holiday_report');
      }

     return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Get Holiday Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function holidayGetDetail()
    {

    	$response['data'] = Holiday::select('holidays.*')
                                  ->get();

             return response()->json($response);

       // return view('layouts.vehicle_report')->with('vehicle', $response['data']);
      
    }

    //-------------------------------------------------------------------------

  /**
   * Get Holiday Details By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function holidayGetDetailID($id)
    {
     
     $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing Holiday Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:holidays,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
               $response['data'] = Holiday::select('holidays.*')
                                            ->where('id','=',$id)
                                            ->first();

               //print_r($response); die('hi');
              return view('layouts.view_holiday')->with('holiday',$response['data']);
            }

              return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Holiday Report
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function holidayReport()
    {

    	
    	$response['data'] = Holiday::select('holidays.*')
                                  ->get();

        return view('layouts.holidays_report')->with('holiday',$response['data']);
    }

    //-------------------------------------------------------------------------

  /**
   * Holiday Report
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function holidayEdit($id)
    {
       $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing Holiday Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:holidays,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
      
      $response['data'] = Holiday::select('holidays.*')
                                  ->where('id','=',$id)
                                  ->first();

        return view('layouts.edit_holiday')->with('holiday',$response['data']);
     }

              return response()->json($response);
    }
}
