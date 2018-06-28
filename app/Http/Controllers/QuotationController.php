<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LocationController;
use Validator;
use App\Models\Quotation;
use DB;
use App\Models\City;
use App\Models\State;
use App\Models\Country;

class QuotationController extends Controller
{

  /**
   * Quotation Blade File
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function getquotation()
    {
        $cities = City::all();
       $states = State::all();
       $countries = Country::all();
        return view('layouts.quotation')
                    ->with('cities', $cities)
                    ->with('states', $states)
                    ->with('countries', $countries);

    }

   //--------------------------------------------------------------------------
    

  /**
   * Insert Quotation
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

    public function quotationInsert(Request $request)
    {
     
     $response = [];
     $data = $request->all();
     
     foreach ($data as $key => $value) {
      $data[$key] = strtoupper($value);
     }
     
     
     $lastQtyNo = Quotation::all()->last();
     
     $year = substr($lastQtyNo->ref_number,2,4);

     $month = substr($lastQtyNo->ref_number,7,2);

     
     $number = substr($lastQtyNo->ref_number,10);
    
     
      if(date("Y")==$year){
        if((integer)$month == date("m"))
           {
             $number = (integer)$number; 
             $number = $number + 1;
             $number = (string)$number; 
           
              $data['ref_number'] = "P"."-".$year."-".$month."-".$number;
            }
        else{
             $month = date("m"); 
             //$month = $month +1;
             //$month = (string)$month; 
             $number = 1; 
             $number = $number;
             $number = (string)$number; 
             $data['ref_number'] = "P"."-".$year."-".$month."-".$number;
            }
          }
        else{
             $year = date('Y'); 
            // $year = $year + 1;
             //$year = (string)$year; 
             $month = date("m"); 
             $number = 1; 
             //$number = $number;
             //$number = (string)$number;
             $data['ref_number'] = "P"."-".$year."-".$month."-".$number;
           }
           
          
     

      $validator = Validator::make($data, [
                'date'                     => 'required|date',
                'name'                     => 'required|string|between:1,15|regex:/^[a-zA-Z ]+$/',
                'door_number'              => 'sometimes|string',
                'street_name'              => 'required|string',
                'area'                     => 'required|string',
                'city_id'                  => 'required|numeric|exists:city,id',
                'state_id'                 => 'required|numeric|exists:state,id',
                'country_id'               => 'required|numeric|exists:country,id',
                'phone_number'             => 'sometimes|numeric',
                'mobile_number'            => 'required|numeric',
                'description_1'            => 'required|string',
                'description_2'            => 'required|string', 
                'description_3'            => 'required|string',
                'ex_showroom_price'        => 'sometimes|numeric',
                'life_tax_qtrly_tax'       => 'sometimes|numeric',
                'insurance_approx'         => 'sometimes|numeric',
                'incidental_and_tr_charges' => 'sometimes|numeric',
                'extended_warranty'        => 'sometimes|numeric',
                'maxicare'                 => 'sometimes|numeric',
                'total'                    => 'sometimes|numeric',
                'delivery_date'            => 'sometimes|date'
                ]);
   

         if ($validator->fails()) {
              $response = $validator->errors();
            }
           else {
               
                if(isset($data['door_number'])){
                  $data['door_number'] = strtoupper($data['door_number']);
                 }  

                  $total = $data['ex_showroom_price']+$data['life_tax_qtrly_tax']+$data['insurance_approx']         +$data['incidental_and_tr_charges']+
                                          $data['maxicare']+$data['extended_warranty'];
                 // print_r($total); die('hi');

                // $response['data'] = Quotation::create($data);
                 $data['total'] = $total;

                 $response['data'] = Quotation::create($data);
                                                                 
                 //print_r( $response['data']); die();

                 //$response['message'] = 'Your Record is inserted Successfully';

                 return view('layouts.quotationSuccessMegg');
                }

                 return response()->json($response);
    }

   //--------------------------------------------------------------------------
   

   /**
   * Update Quotation Entry
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

   public function quotationUpdate(Request $request)
   { 
      $response = [];
      $data = $request->all();
    
       $messages = [
                  'id.exists'   => 'Please enter Existing Quotation Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'           => 'required|exists:quotation,id',
                  'quatation_no' => 'sometimes|unique:quotation|numeric',
                  'ref_number'   => 'sometimes|string|unique:quotation,id,:id'
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();

       foreach ($data as $key => $value) 
       {
         $data[$key] = strtoupper($value);
       }
      
      
      $response['data'] = Quotation::where('id', $data['id'])
                         ->update($data);
                         
     //$queryResult = Quotation::where('id', $data['id'])->first();
     
      if($response['data']){
      return view('layouts.quotation_update_success'); 
      }
      }

      return response()->json($response);  
    }

   //--------------------------------------------------------------------------
    

  /**
   * Delete Quotation Entry
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

    public function quotationDelete($id)
    {
      $response = [];
      $data['id'] = $id;
      $queryResult = Quotation::where('id', $data['id'])->first();
      $response['data'] = Quotation::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data']) {
            return view('layouts.quotation_delete');
      }
      else {
            return redirect('quotation_report');
      }

     return response()->json($response);
    }
    
    //-------------------------------------------------------------------------
    

   /**
   * Quotation Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

    public function quotationGetDetail(Request $request)
    {
     
     /*$users = DB::table('Country')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('quotation')
             ->select('quotation.*')
             ->get();

              return response()->json($response);
    } 

   //--------------------------------------------------------------------------
   
   /**
   * Quotation Detail By Id
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 
    public function quotationGetDetailId($id)
   {
      $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing Quotation Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:quotation,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
            //$response['data'] = Quotation::findorFail($id);

            $response['data'] = DB::table('quotation as q')
                             ->join('country as c', 'q.country_id', '=', 'c.id')
                             ->join('state as s', 'q.state_id', '=', 's.id')
                             ->join('city as ct', 'q.city_id', '=', 'ct.id')
                             ->select('q.*','c.name as c_country','s.name as s_state','ct.name as ct_city')
                             ->where('q.id', '=', $id)
                             ->first();
                  //print_r($response); die('hi');

            return view('layouts.view_quotation')
                      ->with('quotation', $response['data']);
           }

         return response()->json($response);
    } 

    //-------------------------------------------------------------------------

  /**
   * View Quotation
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 

    public function viewQuotation()
    {

      $response['data'] = Quotation::all();
            
        return view('layouts.quotation_report')->with('quotations', $response['data']);
    }

    //-------------------------------------------------------------------------

  /**
   * Edit Quotation Report By ID
   *
   * @access public
   * @param   1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>   
   * @return Response
   * @since 1.0.0
   * @version
   */   

    public function quotationEdit($id)
    {

       $cities = City::all();
       $states = State::all();
       $countries = Country::all(); 
       
       $response['data'] = DB::table('quotation as q')
                             ->join('country as c', 'q.country_id', '=', 'c.id')
                             ->join('state as s', 'q.state_id', '=', 's.id')
                             ->join('city as ct', 'q.city_id', '=', 'ct.id')
                             ->select('q.*','c.name as c_country','s.name as s_state','ct.name as ct_city')
                           ->where('q.id', '=', $id)
                           ->first();
        return view('layouts.quotation_edit')->with('quotation', $response['data'])
                                            ->with('countries', $countries)
                                            ->with('states', $states)
                                            ->with('cities',$cities);
        
    }

}