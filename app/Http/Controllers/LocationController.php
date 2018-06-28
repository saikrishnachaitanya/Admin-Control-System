<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use DB;

class LocationController extends Controller
{
  // =====================Country Information Started =========================   


  /**
   * Insert Country
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function countryInsert(Request $request)
   {
     
     $response = [];
     $messages = [
                 'name.required' => 'Please Enter Country name!',
                 'code.required' => 'Please enter Country code' 
                 ];

     $validator = Validator::make($request->all(), [
                  'name' => 'required|unique:Country',
                  'code' => 'required|alpha|min:3|unique:Country'
                  ], $messages);

     if ($validator->fails()) {
        $response = $validator->errors();
      }
     else {
     $data = $request->only('name', 'code');

     $data['code'] = strtoupper($data['code']);

     $data['name'] = strtoupper($data['name']);
       
     $response['data'] = Country::create($data);

     //print_r( $response['data']); die();

     $response['message'] = 'Your Record is inserted Successfully';
        
    }

    return response()->json($response);
   }

   // -------------------------------------------------------------------------


  /**
   * Update Country
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function countryUpdate(Request $request)
   { 
      $response = [];
      $data = $request->all();
      


       $messages = [
                  'id.exists'   => 'Please enter Existing Country Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'   => 'sometimes|exists:Country,id',
                  'name' => 'sometimes|unique:Country',
                  'code' => 'sometimes|alpha|min:3|unique:Country'
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();
      
      if(isset($data['name'])) {
            $data['name'] = strtoupper($data['name']);
      }
      
      if(isset($data['code'])) {
            $data['code'] = strtoupper($data['code']);
      
      }
      
      $response['data'] = Country::where('id', $data['id'])
                         ->update($data);
                         
     $queryResult = Country::where('id', $data['id'])->first();
     
      if($response['data']){
      $response['message'] = "Your record is updated successfully"; 
      $response['data'] = $queryResult; 
      }
      }

      return response()->json($response);  
    }

   // -------------------------------------------------------------------------


  /**
   * Delete Country
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
     */

    public function countryDelete(Request $request)
    {
      $response = [];
      $data = $request->all();
      $queryResult = Country::where('id', $data['id'])->first();
      $response['data'] = Country::where('id', $data['id'])->delete();

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

   // -------------------------------------------------------------------------


  /**
   * Country Details
   *
   * @access public
   * @param Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <debasish.nprodax@gmail.com>
   *
   */

    public function countryGetDetail(Request $request)
    {
     
     /*$users = DB::table('Country')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('Country')
             ->select('Country.id as country_id','Country.name as country_name','Country.code as country_code')
             ->get();
              return response()->json($response);
    }

   // -------------------------------------------------------------------------


   /**
   * Country Detail By Id
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <debasish.nprodax@gmail.com>
   *
   */

    public function countryGetDetailId($id)
    {
      $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing Country Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:Country,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          $response['data'] = Country::findorFail($id);
      }

        return response()->json($response);
    }

   // ----------------------------Country End ---------------------------------   


   // ======================= State Information Started =======================


  /**
   * Insert State
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function stateInsert(Request $request)
   {
     
     $response = [];
     $messages = [
                 'name.required'       => 'Please Enter State name!',
                 'code.required'       => 'Please Enter State code',
                 'country_id.required' => 'Please Enter valid Country Id' 
                 ];

     $validator = Validator::make($request->all(), [
                  'name'       => 'required|unique:State',
                  'code'       => 'required|alpha|min:2|unique:State',
                  'country_id' => 'required|numeric|exists:Country,id'
                  ], $messages);

     if ($validator->fails()) {
            $response = $validator->errors();
      }
     else {
          $data = $request->all();
          $data['code'] = strtoupper($data['code']);
          $data['name'] = strtoupper($data['name']);
          $response['data'] = State::create($data);
          $response['message'] = 'Your Record is inserted Successfully';
        }

     return response()->json($response); 
    }

   // -------------------------------------------------------------------------


  /**
   * Update State
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function stateUpdate(Request $request)
   {
      $response = [];
      $data = $request->all();
       $messages = [
                  'id.exists' => 'Please enter valid State Id!',
                  ];

      $validator = Validator::make($data, [
                  'id'         => 'required|exists:State,id',
                  'name'       => 'sometimes|unique:State',
                  'code'       => 'sometimes|alpha|min:2|unique:State',
                  'country_id' => 'sometimes|numeric|exists:Country,id'
                  ],$messages);

     if ($validator->fails()) {
             $response = $validator->errors();
      }
     else {
       $data = $request->all();

       if(isset($data['name'])) {
           $data['name'] = strtoupper($data['name']);
       }
      if(isset($data['code'])) {
           $data['code'] = strtoupper($data['code']);
      }
     
      /*$conditionValue = $data['searchBy'];
      unset($data['searchBy']);*/

      $response['data'] = State::where('id', $data['id'])
                          ->update($data);
      $queryResult = State::where('id', $data['id'])->first();
      if( $response['data']){
      $response['data'] = $queryResult;
      $response['message'] = "Your record is updated successfully"; 
      }
      
      }

       return response()->json($response);    
    }

   // -------------------------------------------------------------------------


  /**
   * Delete State
   *
   * @access public
   * @param Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function stateDelete(Request $request)
    {

      $response = [];
      $data = $request->all();
      $queryResult = State::where('id', $data['id'])->first();
      $response['data'] = State::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data'])  {
               $response['message'] = "Your record is deleted successfully";
               $response['data'] = $queryResult;
      }
       else {
           $response['message'] = "Your record does not exists";
      }
       return response()->json($response);
    } 

  // --------------------------------------------------------------------------

  /**
   * State Detail
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function stateGetDetail(Request $request)
   {
    /* $users = DB::table('State')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('State')
             ->join('Country', 'State.country_id', '=', 'Country.id')
             ->select('State.id as state_id','State.name as state_name','State.code as state_code','Country.name as country_name','Country.code as country_code','Country.id as country_id')
             ->get();
              return response()->json($response);
   }

  // --------------------------------------------------------------------------


  /**
   * State Detail By Id
   *
   * @access public
   * @param Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */
   
   public function stateGetDetailId($id)
    {
      $response = []; 
      $arrData['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing State Id!',
                  ];

      $validator = Validator::make($arrData, [
                  'id' => 'required|exists:State,id'
                   ],$messages);

      if ($validator->fails()) {
                 $response = $validator->errors();
      }
      else {
           $response['data'] = State::findorFail($id);
      }

      return response()->json($response);
    }

   //------------------------- State End -------------------------------------


   // ======================== City Information Started =======================


  /**
   * Insert City
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function cityInsert(Request $request)
   {
      $response = [];
      $messages = [
                  'name.required'     => 'Please Enter City name!',
                  'code.required'     => 'Please enter City code',
                  'state_id.required' => 'Please enter valid State Id' 
                   ];

      $validator = Validator::make($request->all(), [
                   'name'     => 'required|unique:City',
                   'code'     => 'required|alpha|min:3|unique:City',
                   
                   'state_id' => 'required|numeric|exists:State,id'
                   ], $messages);

      if ($validator->fails()) {
               $response = $validator->errors();
      }
      else {
        $data = $request->all();
        $data['code'] = strtoupper($data['code']);
        $data['name'] = strtoupper($data['name']);

        $response['data'] = City::create($data);

        if($response['data']) {
            $response['message'] = "Your Record is inserted Successfully"; 
        }
        else {
            $response['message'] = "Something went wrong, try after sometimes"; 
        }
      }

      return response()->json($response); 
   }

   // -------------------------------------------------------------------------


  /**
   * Update City
   *
   * @access public
   * @param   Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

   public function cityUpdate(Request $request)
   {

      $response = [];
      $data = $request->all();

       $messages = [
                  'id.exists' => 'Please enter valid City Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'       => 'required|exists:City,id',
                  'name'     => 'sometimes|unique:City',
                  'code'     => 'sometimes|alpha|min:3|unique:City',
                  'state_id' => 'sometimes|numeric|exists:State,id',
                  ],$messages);
      
      if ($validator->fails()) {
              $response = $validator->errors();
      }
      else {
            $data = $request->all();
      if(isset($data['code'])){
            $data['code'] = strtoupper($data['code']);  
      }
         
      if(isset($data['name'])) {
            $data['name'] = strtoupper($data['name']); 
      }

      $response['data'] = City::where('id', $data['id'])
                         ->update($data);
      $queryResult = City::where('id', $data['id'])->first();
                         
      if($response['data']) {
             $response['data'] = $queryResult;
             $response['message'] = "Your record is updated successfully"; 
      }           

      else {
           $response['message'] = "Something went wrong, try after sometimes"; 
      }

      }
      return response()->json($response);
    }

   // ------------------------------------------------------------------------  


  /**
   * Delete City
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function cityDelete(Request $request)
    { 

      $response = [];
      $data = $request->all();

       $queryResult = City::where('id',$data['id'])->first();

      $response['data'] = City::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data']) {
              $response['message'] = "Your record is deleted successfully";
              $response['data'] = $queryResult;
      }
      else {
            $response['message'] = "Your record is not deleted successfully";
      }
      return response()->json($response);
    }  

   // -------------------------------------------------------------------------


  /**
   * City Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function cityGetDetail(Request $request)
    {
    /* $users = DB::table('City')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('City')
             ->join('State', 'City.state_id', '=', 'State.id')
             ->select('City.id as city_id','City.name as city_name','City.code as city_code','State.name as state_name','State.code as state_code','State.id as state_id')
             ->get();
              return response()->json($response);

    }

   // -------------------------------------------------------------------------


  /**
   * City Detail By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function cityGetDetailId($id, Request $request)
    {
      
     $response = []; 
     $arrData['id'] = $id;

     $messages = [
                 'id.exists' => 'Please enter valid City Id!',
                 ];

     $validator = Validator::make($arrData, [
                 'id' => 'required|exists:City,id'
                  ],$messages);

     if ($validator->fails()) {
          $response = $validator->errors();
      }
     else {
         $response['data'] = City::findorFail($id);
      }

      return response()->json($response
          }
}
