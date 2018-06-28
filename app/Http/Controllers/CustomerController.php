<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;
use DB;

class CustomerController extends Controller
{

  /**
   * Customer Entry Form
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function customerEntry()
    {
        return view('layouts.customer_entry');
    }

    //-------------------------------------------------------------------------

  /**
   * Insert Customer Record
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  public function customerInsert(Request $request)
   {
         
	     $response = [];
	     $data = $request->all();
	   
	     foreach ($data as $key => $value) {
	       $data[$key] = strtoupper($value);
	     }
       
        
         $data['email_id'] = strtolower($data['email_id']);
 
    
      $validator = Validator::make($data, [
                  'customer_name'               => 'required|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  'mobile_no'                   => 'sometimes|numeric',
                  'address'                     => 'required|string',
                  'email_id'                    => 'required|unique:customers|email',
                  'tin_no'                      => 'sometimes|string',
                  'cst_no'                      => 'sometimes|string',
                  'gstin'                       => 'sometimes|string',
                  'contact_person'              => 'sometimes|string',
                  'pan_no'                      => 'required|alpha_num|unique:customers|between:1,10',
                  'pic'                         => 'sometimes|string',
                  'organization'                => 'sometimes|string'

                  ]);

          if ($validator->fails()) {
             $response = $validator->errors();
             }

          else {

            if($request->hasFile('pic'))
           {

            $orgname = $request->pic->getClientOriginalName();
        
             $filename = str_random(10).'-'.$orgname;
             
             Customer::create(['customer_name'  => $data['customer_name'],
                            'mobile_no'      => $data['mobile_no'],
                            'address'        => $data['address'],
                            'email_id'       => $data['email_id'],
                            'tin_no'         => $data['tin_no'],
                            'cst_no'         => $data['cst_no'],
                            'gstin'          => $data['gstin'],
                            'contact_person' => $data['contact_person'],
                            'pan_no'         => $data['pan_no'],
                            'pic'            => $filename,
                            'organization'   => $data['organization']
                            ]);
                                                         
             return view('layouts.customer_Success');
           }

           unset($data['pic']);

           Customer::create($data);

           return view('layouts.customer_Success');
           }

             return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   *  Update Customer Record
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 
   public function customerUpdate(Request $request)
   { 
      $response = [];
      $data = $request->all();
      


       $messages = [
                  'id.exists'   => 'Please enter Existing Customer Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'                  => 'required|exists:customers,id',
                  'customer_name'       => 'sometimes|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  
                  ]);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();

        foreach ($data as $key => $value) {
       $data[$key] = strtoupper($value);
     }
     
     if(isset($data['email_id'])) {
            $data['email_id'] = strtolower($data['email_id']);
          }
	         
      $response['data'] = Customer::where('id', $data['id'])
                         ->update($data);
                         
     $queryResult = Customer::where('id', $data['id'])->first();
     
      if($response['data']){
      // $response['message'] = "Your record is updated successfully"; 
      // $response['data'] = $queryResult;
      return view('layouts.customer_update_success'); 
      }
      
      }

      return response()->json($response);  
    }

    //-------------------------------------------------------------------------

  /**
   *  Delete Customer Record
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */
    public function customerDelete($id)
    {

      $response = [];
      $data['id'] = $id;
      $queryResult = Customer::where('id', $data['id'])->first();

      //print_r($queryData); die('ok');
      $response['data'] = Customer::where('id', $data['id'])->delete(); 

      if($response['data']) {
            // $response['message'] = "Your record is deleted successfully";
            // $response['data'] = $queryResult;
        return view('layouts.customer_delete_success');
      }
      else {
            return redirect('customer_report');
      }

     return response()->json($response);
    }




    //-------------------------------------------------------------------------

  /**
   * Customer Reports
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function customerReport()
    {

    	$response['data'] = Customer::all();
             

        return view('layouts.customer_report')->with('customer', $response['data']);

       
    }

    //-------------------------------------------------------------------------

  /**
   * Customer Get Detail
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function customerGetDetail(Request $request)
    {
     
     /*$users = DB::table('Country')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('customers')
             ->select('customers.*')
             ->get();

              return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Customer Get Detail By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function customerGetDetailID($id)
    {
     
     $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing Customer Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:customers,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
               $response['data'] = DB::table('customers')
                                        ->select('customers.*')
                                        ->where('id','=',$id)
                                        ->first();

                // print_r($response); die('hi');
              return view('layouts.view_customer')
                      ->with('customer', $response['data']);
            }

              return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Customer Get Detail By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function customerEdit($id)
    {
     
     $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing Customer Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:customers,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
               $response['data'] = DB::table('customers')
                                        ->select('customers.*')
                                        ->where('id','=',$id)
                                        ->first();

                // print_r($response); die('hi');
              return view('layouts.customer_edit')
                      ->with('customer', $response['data']);
            }

              return response()->json($response);
    }


}
