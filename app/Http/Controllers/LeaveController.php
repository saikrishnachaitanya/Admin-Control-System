<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Validator;
use DB;
use App\User;
use Auth;
use DateTime;
use App\Models\LeaveTypes;
use App\Models\Employee;

class LeaveController extends Controller
{

  /**
   * Leave Apply Blade File
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function applyLeave()
    {
      $data = LeaveTypes::all();

      $id = 36;
      $leavesDetail = [];
          $leaves = LeaveTypes::all();
          foreach($leaves as $key => $leave ) {
            $usedCount = DB::table('leaves')->select(DB::raw("SUM(no_of_leave_days) 
                                           as count"))->where([
                                                              ['emp_id','=',$id],
                                                              ['leave_type', '=',$leave->code]

                                                              ])->get();
          
            $leavesDetail[$key]['type'] = $leave->code;
            $leavesDetail[$key]['quota'] = $leave->quota;
            $leavesDetail[$key]['used'] = $usedCount[0]->count;
            $leavesDetail[$key]['balance'] = $leave->quota - $usedCount[0]->count;
           } 

           //print_r($leavesDetail); die('hi');

          return view('layouts.apply_leave')
                ->with('leaveTypes', $data)
                ->with('leavesDetails', $leavesDetail);

    }

    //-------------------------------------------------------------------------

 /**
   * Insert Leave Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  public function leaveInsert(Request $request)
   {
         
	     $response = [];
	     $data = $request->all();
	  
          
	     foreach ($data as $key => $value) {
	       $data[$key] = strtoupper($value);
	     }
       
        
            $validator = Validator::make($data, [
				                  'leave_type'              => 'required|string|between:1,50|regex:/^[a-zA-Z ]+$/',
				                  'reason'                  => 'sometimes|string',
				                  'no_of_leave_days'        => 'sometimes|string',
				                  'start_date'              => 'required|date',
				                  'end_date'                => 'sometimes|date',
				                  'lta'                     => 'sometimes|string',
				                  'halfday'                 => 'sometimes|string',
				                  'halfcheck'               => 'sometimes|string',
				                  'emp_id'                  => 'sometimes|string',
				                  'emp_name'                => 'sometimes|string'

				                  ]);

          if ($validator->fails()) {
             $response = $validator->errors();
             }

          else {

          	$userData = Auth::user();
            //print_r($userData['email']); die('hi');

            $emp = Employee::where('email','=',$userData['email'])->first();
            //print_r($emp['id']); die('hi');

            $leaves = LeaveTypes::where('code','=',$data['leave_type'])->first();
          //print_r($leaves['quota']); die('hi');
           
           $usedCount = DB::table('leaves')
                        ->where('emp_id', '=',$emp['id'])
                        ->where('leave_type','=', $data['leave_type'])
                        ->where('status','=','APPROVED')
                        ->select(DB::raw("SUM(no_of_leave_days) 
                                           as count"))
                        ->get();
             //print_r( $usedCount); die('hi');

              $balance = $leaves['quota'] - $usedCount[0]->count;
            
              $lastLevTp = Leave::all()->last();
              //print_r($lastLevTp['leave_type']); die('hi');
              
              $lastLevCount = DB::table('leaves')
                                  ->where('emp_id', '=',$emp['id'])
                                  ->where('leave_type','=', $lastLevTp['leave_type'])
                                  ->where('status','=','APPROVED')
                                  ->select(DB::raw("SUM(no_of_leave_days) 
                                                     as count"))
                                  ->get();

              $sdate = $request->start_date;
              $edate = $request->end_date;
              $start = new DateTime($sdate);
              $end = new DateTime($edate);
              $days = $start->diff($end, true)->days;

              $sundays = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);
              $data['emp_id'] = $userData['id'];
              $data['emp_name'] = $userData['name'];
               //print_r($sundays); die('hi');

            if(isset($data['halfday']) && $balance != 0){
              $data['no_of_leave_days'] = 0.5;
            }
            else {
              
              $fdate = $request->start_date;
              $tdate = $request->end_date;
              $datetime1 = new DateTime($fdate);
              $datetime2 = new DateTime($tdate);
              $interval = $datetime1->diff($datetime2);
              $days = $interval->format('%a');

              $leaveDays = $days+1;
              $data['no_of_leave_days'] = $leaveDays-$sundays;
              $data['halfday'] = 'null';
              //print_r($data['no_of_leave_days']); die('hi');
              if($data['no_of_leave_days'] > $balance)
              {
                return view('layouts.leave_balance_msg');
              }

              //print_r($lastLevCount[0]->count); die('hi');
              $lastbalance = $leaves['quota'] - $lastLevCount[0]->count;
              //print_r($lastbalance); die('hi');

              if($lastLevTp['leave_type'] == 'SL' && $data['leave_type'] == 'CL' && $lastbalance != 0)
              {
                return view('layouts.seek_leave_msg');
              }
           }

            
   	       $response['data'] = Leave::create(['leave_type'      => $data['leave_type'],
                                             'reason'           => $data['reason'],
                                             'no_of_leave_days' => $data['no_of_leave_days'],
                                             'start_date'       => $data['start_date'],
                                             'end_date'         => $data['end_date'],
                                             'halfday'          => $data['halfday'],
                                             'emp_id'           => $data['emp_id'],
                                             'emp_name'         => $data['emp_name'],
                                            'status'            => 'WAITING FOR APPROVAL'
                                            ]);
                                                         
          //print_r( $response['data']); die();

   	       return view('layouts.leave_Success');
 
           }

             return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   *  Update Leave Entry
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

   public function leaveUpdate(Request $request)
   { 
      $response = [];
      $data = $request->all();
      


       $messages = [
                  'id.exists'   => 'Please enter Existing leave Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'                  => 'required|exists:leaves,id',
                  
                  ]);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();

         if (isset($data['emp_id'])) {
          unset($data['emp_id']);
          }

          if (isset($data['emp_name'])) {
          unset($data['emp_name']);
          }

        foreach ($data as $key => $value) {
       $data[$key] = strtoupper($value);
     }
     
              
      $response['data'] = Leave::where('id', $data['id'])
                         ->update($data);
                         
     $queryResult = Leave::where('id', $data['id'])->first();
     
      if($response['data']){
      $response['message'] = "Your record is updated successfully"; 
      $response['data'] = $queryResult; 
      }
      
      }

      return response()->json($response);  
    }

    //-------------------------------------------------------------------------


  /**
   *  Delete Leave Entry
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */
    public function leaveDelete(Request $request)
    {
      $response = [];
      $data = $request->all();
      $queryResult = Leave::where('id', $data['id'])->first();
      $response['data'] = Leave::where('id', $data['id'])->delete();

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
   * Get Leave Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveHistory()
    {

    	$response['data'] = Leave::select('leaves.*')
                                 ->get();

        return view('layouts.leave_history')->with('leaves',$response['data']);
    }

    //-------------------------------------------------------------------------

  /**
   * Leave Approval
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveApproval()
    {
      // $response = [];
      // $data = $request->all();
      //  $response['data'] = Role::where('status', $data['status'])
      //                    ->update($data);


    	$response['data'] = Leave::select('leaves.*')
                         ->get();
         
        return view('layouts.leave_approval')->with('leave',$response['data']);
    }

    //-------------------------------------------------------------------------

    /**
   * Leave Approve
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveApprove($id)
    {
     
        $data = Leave::where('id', $id)
                          ->update(['status' => 'APPROVED'
                                            ]);
         
        return view('layouts.leave_approve_success');
    }

     //-------------------------------------------------------------------------

    /**
   * Leave Reject
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveReject($id)
    {
     
        $data = Leave::where('id', $id)
                          ->update(['status' => 'REJECTED'
                                            ]);
         
        return view('layouts.leave_reject_success');
    }

    //-------------------------------------------------------------------------

  /**
   * Leave Get Detail
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveGetDetail(Request $request)
    {
     
    
     $response['data'] = Leave::select('leaves.*')
                                ->get();

              return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Leave Get Detail By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function leaveGetDetailID($id)
    {
     
     $response = [];
      $data['emp_id'] = $id;

      $messages = [
                  'emp_id.exists' => 'Please enter existing Emp Id!',
                  ];

      $validator = Validator::make($data, [
                  'emp_id' => 'required|exists:leaves,emp_id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
         //------------------------
          $leavesDetail = [];
          $leaves = LeaveTypes::all();
          foreach($leaves as $key => $leave ) {
            $usedCount = DB::table('leaves')->select(DB::raw("SUM(no_of_leave_days) 
                                           as count"))->where([
                                                              ['emp_id','=',$id],
                                                              ['leave_type', '=',$leave->code]
                                                              ])->get();


            $leavesDetail[$key]['type'] = $leave->code;
            $leavesDetail[$key]['quota'] = $leave->quota;
            $leavesDetail[$key]['used'] = $usedCount[0]->count;
            $leavesDetail[$key]['balance'] = $leave->quota - $usedCount[0]->count;
          }

         
            $response['data'] =Leave::select('leaves.*')
                                         ->where([['emp_id','=',$id]])
                                         ->get();
             
               //print_r($response); die('hi');
              return view('layouts.view_leave')
                       ->with('leaves',$response['data'])
                       ->with('leavesDetails',$leavesDetail);
              
            }

              return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

     public function rmleaveReport()
    {

        $response['data'] = DB::table('leaves as l')
                            // ->join('users as u', 'l.emp_id', '=', 'u.id')
                             ->select('l.emp_id','l.emp_name')
                             ->groupBy('l.emp_id','l.emp_name')
                             ->get();

        return view('layouts.rmleave_report')->with('leaves',$response['data']);

    }

}
