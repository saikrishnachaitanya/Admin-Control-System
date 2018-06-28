<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveTypes;
use Validator;

class LeaveTypesController extends Controller
{
   
  /**
   * Insert LeaveTypes Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  	public function leaveTypesInsert(Request $request)
    {
     
	     $response = [];
	     $data = $request->all();
	     
	     foreach ($data as $key => $value) {
	      $data[$key] = strtoupper($value);
	     }
        //print_r($data); die('hi');
	     $validator = Validator::make($data, [
	                  'leave_type'          => 'required|string|between:1,50',
	                  'code'                => 'required|string|between:1,20',
	                  'quota'               => 'required|numeric',
	                  'status'              => 'required|string|between:1,20'
	                  ]);

           if ($validator->fails()) {
              $response = $validator->errors();
            }

         else {

           	   $response['data'] = LeaveTypes::create($data);
                                                                 
               print_r( $response['data']); die('hi');

                //return view('layouts.vehicle_Success');

              
               }

                return response()->json($response);       
    }

    //-------------------------------------------------------------------------

  /**
   * Update LeaveTypes Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveTypesUpdate(Request $request)
    {
       $response = [];
      $data = $request->all();
      


       $messages = [
                  'id.exists'   => 'Please enter Existing LeaveTypes Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'                      => 'sometimes|exists:leave_types,id',
                           
                  ]);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();

        foreach ($data as $key => $value) {
       $data[$key] = strtoupper($value);
     }
     
	         
      $response['data'] = LeaveTypes::where('id', $data['id'])
                         ->update($data);
                         
     $queryResult = LeaveTypes::where('id', $data['id'])->first();
     
      if($response['data']){
      $response['message'] = "Your record is updated successfully"; 
      $response['data'] = $queryResult; 
        
      }
      
      }

      return response()->json($response); 
    }

    //-------------------------------------------------------------------------

  /**
   * Delete LeaveTypes Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveTypesDelete(Request $request)
    {
      $response = [];
      $data = $request->all();
      $queryResult = LeaveTypes::where('id', $data['id'])->first();
      $response['data'] = Holiday::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data']) {
            $response['message'] = "Your record is deleted successfully";
            $response['data'] = $queryResult;
      }
      else {
            $response['message'] = "Your record does not exists";
      }

     return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Get LeaveTypes Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveTypesGetDetail()
    {

    	$response['data'] = LeaveTypes::select('leave_types.*')
                                        ->get();

             return response()->json($response);

       // return view('layouts.vehicle_report')->with('vehicle', $response['data']);
      
    }

    //-------------------------------------------------------------------------

  /**
   * Get LeaveTypes Details By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveTypesGetDetailID($id)
    {
     
     $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing LeaveTypes ID'];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:leave_types,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
               $response['data'] = LeaveTypes::select('leave_types.*')
		                                        ->where('id','=',$id)
		                                        ->first();

               //print_r($response); die('hi');
               return response()->json($response);
            }

              return response()->json($response);
    }
}
