<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LocationController;
use Validator;
use App\Models\Employee;
use App\User;
use DB;
use Mail;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Auth;
use App\Mail\EmployeeRegistered;
use Illuminate\Support\Facades\Storage;
use App\EmployeeUpload;

class EmployeeController extends Controller
{

  /**
   * Employee Blade File
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  public function getEmployee()
    {

      $cities = City::all();
       $states = State::all();
       $countries = Country::all();
        return view('layouts.create_employee')
                ->with('countries', $countries);
        
    }


   //--------------------------------------------------------------------------
  
  /**
   * Insert Employee Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */
    public function employeeInsert(Request $request)
   {
         
     $response = [];
     $data = $request->all();
    // print_r($data); die('hi');

     //unset($data['exp_attachment']);
     //unset($data['fresher_attachment']);

     foreach ($data as $key => $value) {
       $data[$key] = strtoupper($value);
     }
     
     $data['email'] = strtolower($data['email']);

     $messages = [
                 'first_name.required'  => 'Please Enter first_name!',
                 'email.required'       => 'Please enter your valid email id',
                 'pancard.required'     => 'Please enter your valid pancard number',
                 'father_name.required' => 'Please enter your father_name',
                 'mother_name.required' => 'Please enter your mother_name',
                 'dob.required'         => 'Please enter your date of birth',
                 'gender.required'      => 'Please enter your gender', 
                 ];

     $validator = Validator::make($data, [
                  'first_name'               => 'required|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  'last_name'                => 'sometimes|string|regex:/^[a-zA-Z ]+$/',
                  'email'                    => 'required|unique:employees|email',
                  'pancard'                  => 'required|alpha_num|unique:employees|between:1,15',
                  'phone_number'             => 'required|numeric',
                  'alternative_phone_number' => 'sometimes|numeric',
                  'father_name'              => 'required|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  'mother_name'              => 'required|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  'dob'                      => 'required|date',
                  'gender'                   => 'required|alpha|between:1,6',

                  'per_door_number'          => 'sometimes|string',
                  'per_street_name'          => 'required|string',
                  'per_area'                 => 'required|string',
                  'per_city_id'              => 'required|numeric|exists:city,id',
                  'per_state_id'             => 'required|numeric|exists:state,id',
                  'per_country_id'           => 'required|numeric|exists:country,id',

                  'cur_door_number'          => 'sometimes|string',
                  'cur_street_name'          => 'required|string',
                  'cur_area'                 => 'required|string',
                  'cur_city_id'              => 'required|numeric|exists:city,id',
                  'cur_state_id'             => 'required|numeric|exists:state,id',
                  'cur_country_id'           => 'required|numeric|exists:country,id',

                  'highest_qualification'    => 'required|string',
                  'company_name'             => 'sometimes|string',
                  'designation'              => 'sometimes|string',
                  'doj'                      => 'sometimes|date',
                  'exp_year'                 => 'sometimes|numeric|between:0,70',
                  'exp_month'                => 'sometimes|numeric|between:0,12',
                  'skills'                   => 'sometimes|string',
                  'exp_attachment'           => 'sometimes',
                  'fresher_attachment'       => 'sometimes'

                  ], $messages);

     
     if ($validator->fails()) {
        $response = $validator->errors();
      ///return view('layouts.create_employee');
      }

     else {


    //------------- Upload Employee files in employee_upload table ----------


     if($request->hasFile('exp_attachment'))

      {
        $orgname = $request->exp_attachment->getClientOriginalName();
        //print_r( $orgname); die('hi');

         
         //$fileRecord = Storage::put('uploads/employee',$data['exp_attachment']);

          //print_r($fileRecord); die('yes');

         $filename = str_random(10).'_'.$orgname;
         $fileRecord = $request->exp_attachment->storeAs('uploads', $filename);
        // print_r($filename); die('yes');


         EmployeeUpload::create(['email' => $data['email'],
                                'document_name' =>  $filename,
                                'document_type' => 'payslip'

                               ]);
      }

      if($request->hasFile('fresher_attachment'))
      {
        
         $orgname = $request->fresher_attachment->getClientOriginalName();
         //$fileRecord = $request->fresher_attachment->storeAs('uploads',$orgname);
         $filename = str_random(10).'_'.$orgname;

         $fileRecord = $request->fresher_attachment->storeAs('uploads', $filename);

         //$fileRecord = Storage::put('uploads/employee',$data['fresher_attachment']);

        // print_r($fileRecord); die('yes');

         EmployeeUpload::create(['email' => $data['email'],
                                'document_name' => $filename
                               ]);
      }

                                 
 

   unset($data['exp_attachment']);
   unset($data['fresher_attachment']);

    $response['data'] = Employee::create($data);
    $random = str_random(12);

   //------- name, email and password are stored users table-----------------

     $user = User::create([
                          "name"     => $data['first_name'].' '.$data['last_name'],
                          "email"    => $data['email'],
                          "password" => bcrypt($random) 
                         ]);

                         $user->password = $random;

  //-------- Send mail to Employee Mail ID ----------------------------------

     Mail::to($data['email'])->send(new EmployeeRegistered($user));

     //$response['message'] = 'Your Record is inserted Successfully';
     
     return view('employee.employeeRegistrationSuccess');
    }

    return response()->json($response);
   }

  // --------------------------------------------------------------------------

  
   /**
   * Update Employee Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */ 
   public function employeeUpdate(Request $request)
   { 
      $response = [];
      $data = $request->all();
      


       $messages = [
                  'id.exists'   => 'Please enter Existing User Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'                       => 'required|exists:employees,id',
                  'email'                    => 'sometimes|unique:employees,id,:id',
                  'pancard'                  => 'sometimes|alpha_num|unique:employees,id,:id',
                  'first_name'               => 'sometimes|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  'last_name'                => 'sometimes|string|regex:/^[a-zA-Z ]+$/',
                  'father_name'              => 'sometimes|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  'mother_name'              => 'sometimes|string|between:1,50|regex:/^[a-zA-Z ]+$/',
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();

        foreach ($data as $key => $value) {
       $data[$key] = strtoupper($value);
     }
     
     if(isset($data['email'])) {
            $data['email'] = strtolower($data['email']);
          }
      
     

      $response['data'] = Employee::where('id', $data['id'])
                         ->update($data);
                         
     //$queryResult = Employee::where('id', $data['id'])->first();
     
      if($response['data']){
      return view('layouts.employee_update_success');
      }
      
      }

      return response()->json($response);  
    }

  //---------------------------------------------------------------------------


   /**
   * Delete Employee Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function employeeDelete($id)
    {
      $response = [];
      $data['id'] = $id;
      $queryResult = Employee::where('id', $data['id'])->first();
      $response['data'] = Employee::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data']) {
            return view('layouts.employee_delete');
      }
      else {

           return redirect('employee_report');

           // return view('layouts.delete_Success');
      }

     //return response()->json($response);
    }

  //---------------------------------------------------------------------------

   /**
   * Get All Employee Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */
    public function employeeGetDetail(Request $request)
    {
     
     /*$users = DB::table('Country')->get();

     return response()->json($users);*/

     $response['data'] = DB::table('employees')
             ->select('employees.*')
             ->get();

              return response()->json($response);
    }

  //---------------------------------------------------------------------------

   /**
   * Get Employee Details By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */   
   public function employeeGetDetailId($id)
   {
      $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing User Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:employees,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
              $response['data'] = DB::table('employees as e')
             ->join('country as pc', 'e.per_country_id', '=', 'pc.id')
             ->join('state as ps', 'e.per_state_id', '=', 'ps.id')
             ->join('city as pct', 'e.per_city_id', '=', 'pct.id')
             ->join('country as cc', 'e.cur_country_id', '=', 'cc.id')
             ->join('state as cs', 'e.cur_state_id', '=', 'cs.id')
             ->join('city as cct', 'e.cur_city_id', '=', 'cct.id')
             ->select('e.*','pc.name as pc_country','ps.name as ps_state','pct.name as pct_city','cc.name as cc_country','cs.name as cs_state','cct.name as cct_city')
             ->where('e.id', '=', $id)
             ->first();
            //print_r($response); die('hi');

           return view('layouts.view_employee')
                      ->with('employee', $response['data']);
                      
      }

        return response()->json($response);
    } 

   //--------------------------------------------------------------------------

  /**
   * logout Function
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */   
    public function getLogout(Request $request)
    {
        //die('hi');
       //$data = Auth::logout();
        //Session::flush();
       $request->session()->flush();
      //print_r($data); die('hi');
       return redirect('login');
    }

    //-------------------------------------------------------------------------

  /**
   * Get All Employee Report
   *
   * @access public
   * @param   1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version
   */   
    public function getEmployeeReport()
    {

       $response['data'] = Employee::all();
                               // ->select('employees.*')
                               // ->get();
                               
        return view('layouts.employee_report')->with('employees', $response['data']);
    }

    //-------------------------------------------------------------------------

  /**
   * Edit Employee Report By ID
   *
   * @access public
   * @param   1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>   
   * @return Response
   * @since 1.0.0
   * @version
   */   

    public function employeeEdit($id)
    {

       $cities = City::all();
       $states = State::all();
       $countries = Country::all(); 
       
       $response['data'] = DB::table('employees as e')
             ->join('country as pc', 'e.per_country_id', '=', 'pc.id')
             ->join('state as ps', 'e.per_state_id', '=', 'ps.id')
             ->join('city as pct', 'e.per_city_id', '=', 'pct.id')
             ->join('country as cc', 'e.cur_country_id', '=', 'cc.id')
             ->join('state as cs', 'e.cur_state_id', '=', 'cs.id')
             ->join('city as cct', 'e.cur_city_id', '=', 'cct.id')
             ->select('e.*','pc.name as pc_country','ps.name as ps_state',
              'pct.name as pct_city','cc.name as cc_country','cs.name as cs_state',
              'cct.name as cct_city')
             ->where('e.id', '=', $id)
             ->first();
        return view('layouts.employee_edit')->with('employee', $response['data'])
                                            ->with('countries', $countries)
                                            ->with('states', $states)
                                            ->with('cities',$cities);
        
    }

    //-------------------------------------------------------------------------
    
 
}
