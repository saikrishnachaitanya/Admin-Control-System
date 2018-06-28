<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceDetails;
use Validator;
use DB;
use App\Models\City;
use App\Models\State;
use App\Models\Country;

class InvoicesDetailController extends Controller
{

  /**
   * Invoice Blade file
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  public function createInvoice()
    {
       $cities = City::all();
       $states = State::all();
       $countries = Country::all();
        return view('layouts.create_invoice')
                    ->with('cities', $cities)
                    ->with('states', $states)
                    ->with('countries', $countries);
    }

   //-------------------------------------------------------------------------

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
        //print_r($data); die('hi');
	     $validator = Validator::make($data, [
                  'tin_number'               => 'required|string|between:1,50',
                  'cin'                      => 'required|string|between:1,50',
                  'pan_number'               => 'required|alpha_num|unique:invoices_detail|between:1,10',
                  'service_tax_number'       => 'required|string|between:1,50',
                  'gstin'                    => 'required|string|between:1,50',
                  'reverse_charge'           => 'sometimes',
                  'invoice_number'           => 'required|string|between:1,50',
                  'invoice_date'             => 'required|date',
                  'invoice_state_id'         => 'required|exists:state,id',
                  'invoice_city_id'          => 'required|exists:city,id',

                  'transportation_moc'       => 'sometimes|string',
                  'vehicle_number'           => 'sometimes|string',
                  'date_of_supply'           => 'required|date',
                  'place_of_supply'          => 'sometimes',
                  'billed_name'              => 'required|string',
                  'billed_door_number'       => 'sometimes|string',

                  'billed_street_name'       => 'required|string',
                  'billed_area'              => 'required|string',
                  'billed_state_id'          => 'required|numeric|exists:state,id',
                  'billed_city_id'           => 'required|numeric|exists:city,id',
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
                  'total_amount_before_tax'  => 'sometimes|numeric',
                  'add_cgst_price'           => 'sometimes|numeric',
                  'add_cgst_percentage'      => 'required|numeric', 
                  'add_sgst_price'           => 'sometimes|numeric',

                  'add_sgst_percentage'      => 'required|numeric',
                  'add_cess_price'           => 'sometimes|numeric',
                  'add_cess_percentage'      => 'required|numeric',
                  'total_tax_amount'         => 'sometimes|numeric',

                  'total_amount_after_tax'   => 'sometimes|numeric',
                  'gst_reverse_charge'       => 'sometimes|string',
                  'product_description'       => 'sometimes|string',
                  'hsn_code'                  => 'required|string',
                  'uom'                       => 'required|string',
                  'qty'                       => 'required|numeric',
                  'amount'                    => 'required|numeric',
                  'discount'                  => 'sometimes|numeric',
                  'taxable_value'             => 'sometimes|numeric',
                  
                  'chasis_no'                 => 'sometimes|string',
                  'engine_no'                 => 'sometimes|string',
                  'color'                     => 'sometimes|string',
                  'key_no'                    => 'sometimes|string'

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
                 

                 $response['data'] = InvoiceDetails::create($data);
                                                                 
                 //print_r( $response['data']); die();

                 //$response['message'] = 'Your Record is inserted Successfully';

                 return view('layouts.quotationSuccessMegg');
                }

                 return response()->json($response);
    }

  //---------------------------------------------------------------------------

  /**
   * Update Invoice Entry
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
                  'id.exists'   => 'Please enter Existing InvoiceDetails Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'      => 'required|exists:invoices_detail,id'
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {

        $data = $request->all();

        foreach ($data as $key => $value) {
        $data[$key] = strtoupper($value);
       }
      
      
       $response['data'] = InvoiceDetails::where('id', $data['id'])
                         ->update($data);
                         
       $queryResult = InvoiceDetails::where('id', $data['id'])->first();

       return view('layouts.invoice_update_success');
      }

      return response()->json($response);  
    

    }

   //--------------------------------------------------------------------------

  /**
   * Delete Invoice Entry
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */


    public function invoiceDelete($id)
    {

      ///$response = [];
      $data['id'] = $id;
      $queryResult = InvoiceDetails::where('id', $data['id'])->first();
      $response['data'] = InvoiceDetails::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data']) {
            return view('layouts.invoice_delete_success');
      }
      else {
            return redirect('invoice_report');
      }

     return response()->json($response);
    }

   //-------------------------------------------------------------------------

 /**
   * Get All Invoice Details
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

     $response['data'] = DB::table('invoices_detail')
             ->select('invoices_detail.*')
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
      $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing User Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:invoices_detail,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
             $response['data'] = DB::table('invoices_detail as i')
                 ->join('state as is', 'i.invoice_state_id', '=', 'is.id')
                 ->join('city as ic', 'i.invoice_city_id', '=', 'ic.id')
                 ->join('state as bs', 'i.billed_state_id', '=', 'bs.id')
                 ->join('city as bc', 'i.billed_city_id', '=', 'bc.id')
                 ->join('state as ss', 'i.shipped_state_id', '=', 'ss.id')
                 ->join('city as sc', 'i.shipped_city_id', '=', 'sc.id')
                 ->select('i.*','is.name as invoice_state','ic.name as invoice_city','bs.name as billed_state','bc.name as billed_city','ss.name as shipped_state','sc.name as shipped_city')
                 ->where('i.id', '=', $id)
                 ->first();
                //print_r($response); die('hi');

              return view('layouts.view_invoice')
                      ->with('invoice', $response['data']);
            }

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

   public function invoiceEdit($id)
   {
      $cities = City::all();
      $states = State::all();
      $countries = Country::all();
      // return view('layouts.invoice_edit')
      //               ->with('cities', $cities)
      //               ->with('states', $states)
      //               ->with('countries', $countries);
      $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing User Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:invoices_detail,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
             $response['data'] = DB::table('invoices_detail as i')
                 ->join('state as is', 'i.invoice_state_id', '=', 'is.id')
                 ->join('city as ic', 'i.invoice_city_id', '=', 'ic.id')
                 ->join('state as bs', 'i.billed_state_id', '=', 'bs.id')
                 ->join('city as bc', 'i.billed_city_id', '=', 'bc.id')
                 ->join('state as ss', 'i.shipped_state_id', '=', 'ss.id')
                 ->join('city as sc', 'i.shipped_city_id', '=', 'sc.id')
                 ->select('i.*','is.name as invoice_state','ic.name as invoice_city','bs.name as billed_state','bc.name as billed_city','ss.name as shipped_state','sc.name as shipped_city')
                 ->where('i.id', '=', $id)
                 ->first();
                //print_r($response); die('hi');

              return view('layouts.invoice_edit')
                      ->with('invoice', $response['data'])
                      ->with('cities', $cities)
                    ->with('states', $states)
                    ->with('countries', $countries);;
            }

              return response()->json($response);
    } 

    //-------------------------------------------------------------------------

  /**
   * Get Invoice Reports
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */
   
   public function invoiceReport()
    {

       $response['data'] = InvoiceDetails::all();             
           
        return view('layouts.invoice_report')->with('invoices',$response['data']);
    }


    //-------------------------------------------------------------------------
    

    public function getStateList(Request $request)
    {
      //print_r($request->country_id); die('hi');
        $response = DB::table('state')
                           ->where("country_id",$request->country_id)
                           ->select('id','name')->get();

                    
        return response()->json($response);
    }

    public function getCityList(Request $request)
    {
        $response = DB::table("city")
                    ->where("state_id",$request->state_id)
                    ->select('id','name')->get();
                    
        return response()->json($response);
    }            
}
