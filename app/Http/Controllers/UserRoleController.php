<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissions;
use App\Models\Role;
use App\Models\RolePermissions;
use App\Models\UserRole;
use Validator;
use DB;

class UserRoleController extends Controller
{
     /**
   * Permission Blade File
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function assignRolePermission()
    {
      $roles = Role::all();
      $permissions = Permissions::all();
    	return view('layouts.create_role_permission')
              ->with('roles',$roles)
              ->with('permissions',$permissions);
    }

   //-------------------------------------------------------------------------


  /**
   * Insert Permission Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function rolePermissionInsert(Request $request)
    {
    	 $response = [];
	     $data = $request->all();
	     
	     

        //print_r($data); die('hi');
	     $validator = Validator::make($data, [
                  'role_id'                  => 'required|numeric|exists:roles,id',
                  'permission_id'            => 'required|numeric|exists:permissions,id|unique:role_permissions'
                  
                  ]);

           if ($validator->fails()) {
              $response = $validator->errors();
            }

         else {

           	   $response['data'] = RolePermissions::create($data);
                                                                 
                 //print_r( $response['data']); die('hi');

                return view('layouts.role_permission_insert_Success');

                 //return view('layouts.quotationSuccessMegg');
                }

                return response()->json($response);  
    }

    //-------------------------------------------------------------------------

  /**
   * Update Permission Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

    public function rolePermissionUpdate(Request $request)
    {

      $response = [];
      $data = $request->all();
      


       $messages = [
                  'id.exists'   => 'Please enter Existing RolePermission Id!',
                  ];

     $validator = Validator::make($data, [
                  'id'                       => 'required|exists:role_permissions,id'
                                  
                  ],$messages);

     if ($validator->fails()) {
           $response = $validator->errors();
      }
     else {
        $data = $request->all();

        foreach ($data as $key => $value) {
         $data[$key] = strtoupper($value);
     }
     
      $response['data'] = RolePermissions::where('id', $data['id'])
                         ->update($data);
                         
     $queryResult = RolePermissions::where('id', $data['id'])->first();
     
      if($response['data']){
      // $response['message'] = "Your record is updated successfully"; 
      // $response['data'] = $queryResult; 

      	die('hi');
      }
      
      }

      return response()->json($response);  
    }

    //-------------------------------------------------------------------------

  /**
   * Delete Permission Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */
   
   public function permissionDelete($id)
    {
      $response = [];
      $data['id'] = $id;
      $queryResult = Permissions::where('id', $data['id'])->first();
      $response['data'] = Permissions::where('id', $data['id'])->delete();

      // print_r($queryData); die();

      if($response['data']) {
            return view('layouts.delete_Success');
      }
      else {

      	   die('hi');

           // return view('layouts.delete_Success');
      }

     //return response()->json($response);
    } 

    //-------------------------------------------------------------------------

  /**
   * Get Permission Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  public function getRolePermissionReport()
  {
  	

      $response['data'] = DB::table('roles as r')
                              ->join('role_permissions as rp', 'rp.role_id', '=', 'r.id')
                              ->join('permissions as p', 'rp.permission_id', '=', 'p.id')
                              ->select('rp.id as RolePermissionId','r.name as rname','p.name as pname')
                              ->get();
                    //print_r($data); die('hi');
                               
        return view('layouts.role_permission_report')->with('rolepermission', $response['data']);
    
  }

  //---------------------------------------------------------------------------

  /**
   * Edit Permission Details
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  public function rolePermissionEdit($id)
    {
       $response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing RolePermission Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:role_permissions,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
      
      $response['data'] = DB::table('roles as r')
                              ->join('role_permissions as rp', 'rp.role_id', '=', 'r.id')
                              ->join('permissions as p', 'rp.permission_id', '=', 'p.id')
                              ->select('rp.id as RolePermissionId','r.id as roleId','p.id as permissionId','r.name as rname','p.name as pname')
                              ->where('rp.id','=',$id)
                              ->first();
         //print_r($data); die('hi');
        return view('layouts.role_permission_edit')->with('rolepermission',$response['data']);
     }

              return response()->json($response);
    }

    //-------------------------------------------------------------------------

  /**
   * Get Permission Details By ID
   *
   * @access public
   * @param  Illuminate\Http\Request $request
   * @return Response
   * @since 1.0.0
   * @version 1.0.0
   * @author Nprodax Technologies Pvt. Ltd. <>
   *
   */

  public function permissionGetDetailID($id)
  {
  	$response = [];
      $data['id'] = $id;

      $messages = [
                  'id.exists' => 'Please enter existing RolePermission Id!',
                  ];

      $validator = Validator::make($data, [
                  'id' => 'required|exists:role_permissions,id'
                   ],$messages);

      if ($validator->fails()) {
            $response = $validator->errors();
      }
      else {
          
               $response['data'] = DB::table('role_permissions')
                                        ->select('role_permissions.*')
                                        ->where('id','=',$id)
                                        ->first();

                // print_r($response); die('hi');
              return view('layouts.view_role_permission')
                      ->with('permission', $response['data']);
            }

              return response()->json($response);
    }
}
