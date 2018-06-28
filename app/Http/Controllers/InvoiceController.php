<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use Validator;
use DB;

class InvoiceController extends Controller
{

	/**
   * Insert Invoice Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function invoiceInsert(Request $request)
    {
     
	     $response = [];
	     $data = $request->all();
	     
	     foreach ($data as $key => $value) {
	      $data[$key] = strtoupper($value);
	     }

	     $validator = Validator::make($data, [
                  'tin_number'               => 'required|string|between:1,50',
                  'cin'                      => 'required|string|between:1,50',
                  'pan_number'               => 'required|string',
                  'service_tax_number'       => 'required|string|between:1,50',
                  'gstin'                    => 'required|string|between:1,50',
                  'reverse_charge'           => 'sometimes',
                  'invoice_number'           => 'required|string|between:1,50',
                  'invoice_date'             => 'required|date',
                  'invoice_state_id'         => 'required|numeric|exists:state,id',
                  'invoice_city_id'          => 'required|numeric|exists:city,id',

                  'transportation_moc'       => 'sometimes|string',
                  'vehicle_number'           => 'sometimes|string',
                  'date_of_supply'           => 'required|date',
                  'place_of_supply'          => 'sometimes',
                  'billed_name'              => 'required|string',
                  'billed_door_number'       => 'sometimes|string',

                  'billed_street_name'       => 'required|string',
                  'billed_area'              => 'required|string',
                  'billed_state_id'          => 'required|numeric|exists:city,id',
                  'billed_city_id'           => 'required|numeric|exists:state,id',
                  'billed_pin_code'          => 'required|numeric',

                  'billed_phone_number'      => 'required|numeric',
                  'billed_gstin'             => 'sometimes|string',
                  'shipped_name'             => 'required|string',
                  'shipped_door_number'      => 'sometimes|string',
                  'shipped_street_name'      => 'required|string',
                  'shipped_area'             => 'required|string',
                  'shipped_city_id'          => 'required|numeric|exists:city,id',
                  'shipped_state_id'         => 'required|numeric|exists:state,id',
                  'shipped_pin_code'         => 'required|numeric',
                  'shipped_phone_number'     => 'sometimes|numeric',
                  'shipped_gstin'            => 'sometimes|string',
                  'bank_name'                => 'required|string', 
                  'bank_ac_number'           => 'required|string', 
                  'bank_ifsc'                => 'required|string',
                  'total_amount_before_tax'  => 'required|numeric',
                  'add_cgst_price'           => 'sometimes|numeric',
                  'add_cgst_percentage'      => 'required|numeric', 
                  'add_sgst_price'           => 'sometimes|numeric',

                  'add_sgst_percentage'      => 'required|numeric',
                  'add_cess_price'           => 'sometimes|numeric',
                  'add_cess_percentage'      => 'required|numeric',
                  'total_tax_amount'         => 'sometimes|numeric',
                  'total_amount_after_tax'   => 'sometimes|numeric',
                  'gst_reverse_charge'       => 'sometimes|string'

                  ]);

	     if ($validator->fails()) {
              $response = $validator->errors();
            }

           else {

           	     $data['add_cgst_price'] = ($data['total_amount_before_tax']*$data['add_cgst_percentage'])/100;

           	     $data['add_sgst_price'] = ($data['total_amount_before_tax']*$data['add_sgst_percentage'])/100;

           	     $data['add_cess_price'] = ($data['total_amount_before_tax']*$data['add_cess_percentage'])/100;

                $data['total_tax_amount'] = $data['add_cgst_price']+ $data['add_sgst_price']+$data['add_cess_price'];

                $data['total_amount_after_tax'] = $data['total_amount_before_tax']+$data['total_tax_amount'];

                //print_r($data); die('hi');
                 

                 $response['data'] = Invoice::create($data);
                                                                 
                 //print_r( $response['data']); die();

                 $response['message'] = 'Your Record is inserted Successfully';

                 //return view('layouts.quotationSuccessMegg');
                }

                 return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Update Invoice Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function invoiceUpdate(Request $request)
    {
    	
      $response = [];
      $data = $request->all();
      


     $messages = [
                  'id.exists'   => 'Please enter Existing Invoice Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'      => 'required|exists:invoices,id'
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {

        $data = $request->all();

        foreach ($data as $key => $value) {
	      $data[$key] = strtoupper($value);
	     }
      
      
       $response['data'] = Invoice::where('id', $data['id'])
                         ->update($data);
                         
       $queryResult = Invoice::where('id', $data['id'])->first();

       $response['data'] =  $queryResult;

       $response['message'] = "Your record is updated successfully"; 
      }

      return response()->json($response);  
    

    }

    //-------------------------------------------------------------------------

    /**
   * Delete Invoice Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */


    public function invoiceDelete(Request $request)
    {

      $response = [];
      $data = $request->all();
      $queryResult = Invoice::where('id', $data['id'])->first();
      $response['data'] = Invoice::where('id', $data['id'])->delete();

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
   * Get Invoice Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function invoiceGetDetail(Request $request)
    {
     
     /*$users = DB::table('Country')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('invoices')
             ->select('invoices.*')
             ->get();

              return response()->json($response);
    }

   //--------------------------------------------------------------------------

    /**
   * Get Invoice Details By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function invoiceGetDetailID($id)
   {
    die('hi');
      $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing User Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:invoices,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
             $response['data'] = DB::table('invoices as i')
		             ->join('state as is', 'i.invoice_state_id', '=', 'is.id')
		             ->join('city as ic', 'i.invoice_city_id', '=', 'ic.id')
		             ->join('state as bs', 'i.billed_state_id', '=', 'bs.id')
		             ->join('city as bc', 'i.billed_city_id', '=', 'bc.id')
		             ->join('state as ss', 'i.shipped_state_id', '=', 'ss.id')
		             ->join('city as sc', 'i.shipped_city_id', '=', 'sc.id')
		             ->select('i.*','is.name as invoice_state','ic.name as invoice_city','bs.name as billed_state','bc.name as billed_city','ss.name as shipped_state','sc.name as shipped_city')
		             ->where('i.id', '=', $id)
		             ->first();
		           print_r($response); die('hi');

		          /* return view('layouts.view_employee')
		                      ->with('employee', $response['data']);*/
		                      //$response['message'] = 'Your Record is inserted Successfully';
            }

             return response()->json($response);
    } 

    //-------------------------------------------------------------------------

  /**
   * Insert Invoice Items Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function invoiceItemsInsert(Request $request)
    {
       $response = [];
       $data = $request->all();
      
       foreach ($data as $key => $value) {
         $data[$key] = strtoupper($value);
       }

       $validator = Validator::make($data, [
                  'invoice_id'                => 'required|numeric|exists:invoices,id',
                  'product_description'       => 'sometimes|string',
                  'hsn_code'                  => 'required|string',
                  'uom'                       => 'required|string',
                  'qty'                       => 'required|numeric',
                  'rate'                      => 'sometimes|numeric',
                  'amount'                    => 'required|numeric',
                  'discount'                  => 'sometimes|numeric',
                  'taxable_value'             => 'sometimes|numeric',
                  'cgst_rate'                 => 'sometimes|numeric',

                  'cgst_amount'               => 'sometimes|numeric',
                  'sgst_rate'                 => 'sometimes|numeric',
                  'sgst_amount'               => 'sometimes|numeric',
                  'total'                     => 'required|numeric'
                  ]);

          if ($validator->fails()) {
            $response = $validator->errors();
          }
          else {
          $response['data'] = InvoiceItems::create($data);

          $response['message'] = "Your record Inserted Successfully";
                      
         }
         return response()->json($response);
    }

   //--------------------------------------------------------------------------

      /**
   * Update Invoice Items
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function invoiceItemsUpdate(Request $request)
    {
      
      $response = [];
      $data = $request->all();
      


     $messages = [
                  'id.exists'   => 'Please enter Existing Invoice Items Id!',
                  'invoice_id'  => 'Please enter Existing invoice id'
                  ];

     $validator = Validator::make($data, [
                  'id'          => 'required|exists:invoice_items,id',
                  'invoice_id'  => 'sometimes|exists:invoices,id'
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {

        $data = $request->all();

        foreach ($data as $key => $value) {
        $data[$key] = strtoupper($value);
       }
      
      
       $response['data'] = InvoiceItems::where('id', $data['id'])
                         ->update($data);
                         
       $queryResult = InvoiceItems::where('id', $data['id'])->first();

       $response['data'] =  $queryResult;

       $response['message'] = "Your record is updated successfully"; 
      }

      return response()->json($response);  
    }

   //--------------------------------------------------------------------------

    /**
   * Delete Invoice Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */


    public function invoiceItemsDelete(Request $request)
    {

      $response = [];
      $data = $request->all();
      $queryResult = InvoiceItems::where('id', $data['id'])->first();
      $response['data'] = InvoiceItems::where('id', $data['id'])->delete();

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
   * Get Invoice Items Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function invoiceItemsGetDetail(Request $request)
    {
     
     /*$users = DB::table('Country')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('invoice_items')
             ->select('invoice_items.*')
             ->get();

              return response()->json($response);
    }

   //--------------------------------------------------------------------------
   
   /**
   * Get Invoice Items Details By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function invoiceItemsGetDetailID($id)
    {
      $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter Existing Invoice Items Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:invoice_items,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
             $response['data'] = DB::table('invoice_items')
                                ->select('invoice_items.*')
                                ->where('invoice_items.id', '=', $id)
                                ->first();
                print_r($response); die('hi');

              /* return view('layouts.view_employee')
                          ->with('employee', $response['data']);*/
                          //$response['message'] = 'Your Record is inserted Successfully';
            }

             return response()->json($response);
    }  
}
