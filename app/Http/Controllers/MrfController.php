<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MRF;
use Validator;
use DB;

class MrfController extends Controller
{

  /**
   * Insert MRF
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

   public function mrfInsert(Request $request)
   {

     $response = [];
     $data = $request->all();
     
     foreach ($data as $key => $value) {
      $data[$key] = strtoupper($value);
     }

     $validator = Validator::make($data, [
              'requested_by'                       => 'sometimes|string|between:1,50',
              'requested_person_designation'       => 'sometimes|string|between:1,50',
              'date_of_request'                    => 'sometimes|date',
              'authorized_by'                      => 'sometimes|string|between:1,50',
              'authorized_person_designation'      => 'sometimes|string|between:1,50',
              'date_of_authorization'              => 'sometimes|date',
              'roles_and_responsibilities'         => 'sometimes|string|between:1,50',
              'department'                         => 'sometimes|string',
              'job_title'                          => 'sometimes|string',
              'required_number'                    => 'sometimes|numeric',

              'location'                           => 'sometimes|string',
              'expected_hiring_date'               => 'sometimes|date',
              'nature_of_employment'               => 'sometimes|string',
              'additional_manpower'                => 'sometimes',
              'rep_to_existing_position'           => 'sometimes|string',
              'filled_by_internal'                 => 'sometimes|string',

              'filled_by_external'                 => 'sometimes|string',
              'qualification'                      => 'sometimes|string',
              'total_exp'                          => 'sometimes|string',
              'salary_range_p_m'                   => 'sometimes|numeric',
              'received_by_hod'                    => 'sometimes|string',

              'received_by_lob'                    => 'sometimes|string',
              'receiver_name'                      => 'sometimes|string',
              'receiver_signature'                 => 'sometimes|string',
              'received_date'                      => 'sometimes|date',
              'approved_by'                        => 'sometimes|string',
              'approval_name'                      => 'sometimes|string|regex:/^[a-zA-Z ]+$/',
              'approval_signature'                 => 'sometimes|string',
              'approval_date'                      => 'sometimes|date',
              'forwarded_for_approval'             => 'sometimes|string',
              'md_approval_on'                     => 'sometimes|date',
              'md_signature'                       => 'sometimes|string',
              'md_approval_date'                   => 'sometimes|date', 
              'recruiter'                          => 'sometimes|string', 
              'recruiter_name'                     => 'sometimes|string',
              'recruiter_signature'                => 'sometimes|string',
              'recruiter_date'                     => 'sometimes|date',
              'recruiter_start_date'               => 'sometimes|date', 
              'project_closing_date'               => 'sometimes|date',

              'reason_for_deviation'               => 'sometimes|string',
              'remarks'                            => 'sometimes|string'
              

              ]);

     if ($validator->fails()) {
          $response = $validator->errors();
        }

       else {
       	  $response['data'] = MRF::create($data);
                                                                 
          //print_r( $response['data']); die();

          $response['message'] = 'Your Record is inserted Successfully';

           //return view('layouts.quotationSuccessMegg');
          }

          return response()->json($response);
    }

   //--------------------------------------------------------------------------

   /**
   * Update MRF
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

   public function mrfUpdate(Request $request)
   {
   	 $response = [];
      $data = $request->all();
      


     $messages = [
                  'id.exists'   => 'Please enter Existing MRF Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'      => 'required|exists:mrf,id'
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {

        $data = $request->all();

        foreach ($data as $key => $value) {
	      $data[$key] = strtoupper($value);
	     }
      
      
       $response['data'] = MRF::where('id', $data['id'])
                         ->update($data);
                         
       $queryResult = MRF::where('id', $data['id'])->first();

       $response['data'] =  $queryResult;

       $response['message'] = "Your record is updated successfully"; 
      }

      return response()->json($response);  
   }

   //--------------------------------------------------------------------------

   /**
   * Delete MRF
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

   public function mrfDelete(Request $request)
   {
   	
      $response = [];
      $data = $request->all();
      $queryResult = MRF::where('id', $data['id'])->first();
      $response['data'] = MRF::where('id', $data['id'])->delete();

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

   //--------------------------------------------------------------------------

   /**
   * MRF Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

   public function mrfGetDetail()
   {

   	$response['data'] = DB::table('mrf')
             ->select('mrf.*')
             ->get();

              return response()->json($response);
   }

   //--------------------------------------------------------------------------

   /**
   * MRF Details By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

   public function mrfGetDetailID($id)
   {
   	 $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter Existing Invoice Items Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:mrf,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
             $response['data'] = DB::table('mrf')
                                ->select('mrf.*')
                                ->where('mrf.id', '=', $id)
                                ->first();
                //print_r($response); die('hi');

              /* return view('layouts.view_employee')
                          ->with('employee', $response['data']);*/
                          //$response['message'] = 'Your Record is inserted Successfully';
            }

            return response()->json($response);
    }  
   
}
