<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






// Route::get('dashboard1','Controller@getDashboard1');

//Route::get('login','Controller@getlogin');






//Route::get('quotation_report','Controller@getquotation_report');

//Route::get('employee_report','Controller@getemployeereport');

//Route::get('view_employee','Controller@view_employee');

//Route::get('holiday_report','Controller@holiday_report');




//--------------- Login Information -------------------------------------------


Route::get('/', function () {
    return view('layouts.login');
});

Route::get('login','LoginController@getlogin')->name('login');
Route::post('login_page','LoginController@dologin');
Route::get('logout','EmployeeController@getLogout');
Route::get('logincreate','UserLoginController@showcreatelogin');
Route::post('logincreate','UserLoginController@docreatelogin');

//---------------- Forgot Password --------------------------------------------

Route::get('forgot_password','PasswordController@getForgotPassword');
Route::post('forgot_password','PasswordController@setForgotPasswordLink');

//----------------- Reset Password---------------------------------------------

Route::get('reset_password/{token}','PasswordController@setForgotPassword');
Route::post('reset_password/set_new_password','PasswordController@setNewPassword');
//Route::get('reset_password','PasswordController@resetPassword');

//Route::middleware(['auth'])->group(function () {

// ------------ Employees Information -----------------------------------------

//Route::get('employee_registration','employeeController@employeeRegistration');

/*    Route::get('create_employee','EmployeeController@getEmployee');
Route::post('employee_insert','EmployeeController@employeeInsert');
Route::post('employee_update','EmployeeController@employeeUpdate');
Route::get('employee_delete/{id}','EmployeeController@employeeDelete');
Route::get('employee_get_detail','EmployeeController@employeeGetDetail');
Route::get('employee_get_detail/{id}','EmployeeController@employeeGetDetailId');
Route::post('upload_files','EmployeeUploadController@fileStore');


Route::get('employee_report','EmployeeController@getEmployeeReport');
Route::get('employee_edit/{id}','EmployeeController@employeeEdit');


Route::get('state','EmployeeController@getStateList');
Route::get('city','EmployeeController@getCityList'); by chaitu  */

// ------------ Country Information -----------------------------------------

Route::post('country_insert','LocationController@countryInsert');
Route::post('country_update','LocationController@countryUpdate');
Route::post('country_delete','LocationController@countryDelete');
Route::get('country_get_detail','LocationController@countryGetDetail');
Route::get('country_get_detail/{id}','LocationController@countryGetDetailId');

// -------------State Information ------------------------------------------------------------

Route::post('state_insert','LocationController@stateInsert');
Route::post('state_update','LocationController@stateUpdate');
Route::post('state_delete','LocationController@stateDelete');
Route::get('state_get_detail','LocationController@stateGetDetail');
Route::get('state_get_detail/{id}','LocationController@stateGetDetailId');

// ----------------City Information ----------------------------------------------------------------------------

Route::post('city_insert','LocationController@cityInsert');
Route::post('city_update','LocationController@cityUpdate');
Route::post('city_delete','LocationController@cityDelete');
Route::get('city_get_detail','LocationController@cityGetDetail');
Route::get('city_get_detail/{id}','LocationController@cityGetDetailId');

// ------------ Quotation Information ----------------------------------------------------------

Route::get('create_quotation','QuotationController@getquotation');
Route::post('quotation_insert','QuotationController@quotationInsert');
Route::post('quotation_update','QuotationController@quotationUpdate');
Route::get('quotation_delete/{id}','QuotationController@quotationDelete');
Route::get('quotation_get_detail','QuotationController@quotationGetDetail');
Route::get('quotation_get_detail/{id}','QuotationController@quotationGetDetailId');

Route::get('quotation_report','QuotationController@viewQuotation');
Route::get('quotation_edit/{id}','QuotationController@quotationEdit');


//-------------------Invoice Information --------------------------------------

//Route::post('invoice_insert','InvoiceController@invoiceInsert');
//Route::post('invoice_update','InvoiceController@invoiceUpdate');
//Route::post('invoice_delete','InvoiceController@invoiceDelete');
//Route::get('invoice_get_detail','InvoiceController@invoiceGetDetail');
//Route::get('invoice_get_detail/{id}','InvoiceController@invoiceGetDetailID');

//------------------- Invoice Items Informations ------------------------------

//Route::post('invoice_items_insert','InvoiceController@invoiceItemsInsert');
//Route::post('invoice_items_update','InvoiceController@invoiceItemsUpdate');
//Route::post('invoice_items_delete','InvoiceController@invoiceItemsDelete');
//Route::get('invoice_items_get_detail','InvoiceController@invoiceItemsGetDetail');
//Route::get('invoice_items_get_detail/{id}','InvoiceController@invoiceItemsGetDetailID');

//------------------ MRF Information by chaitu------------------------------------------

Route::post('mrf_insert','MrfController@mrfInsert');
Route::post('mrf_update','MrfController@mrfUpdate');
Route::post('mrf_delete','MrfController@mrfDelete');
Route::get('mrf_get_detail','MrfController@mrfGetDetail');
Route::get('mrf_get_detail/{id}','MrfController@mrfGetDetailID');

//-------------------Invoice Items Informations--------------------------------

Route::get('create_invoice','InvoicesDetailController@createInvoice');
Route::post('invoice_detail_insert','InvoicesDetailController@invoiceInsert');
Route::post('invoice_detail_update','InvoicesDetailController@invoiceUpdate');
Route::get('invoice_detail_delete/{id}','InvoicesDetailController@invoiceDelete');
Route::get('invoice_detail_get','InvoicesDetailController@invoiceGetDetail');
Route::get('invoice_detail_get/{id}','InvoicesDetailController@invoiceGetDetailID');
Route::get('invoice_report','InvoicesDetailController@invoiceReport');
Route::get('invoice_edit/{id}','InvoicesDetailController@invoiceEdit');


Route::get('state','InvoicesDetailController@getStateList');
Route::get('city','InvoicesDetailController@getCityList');

//--------------------- Payment Informations ----------------------------------

/* Route::get('create_payment','PaymentController@paymentVoucher');
Route::post('payment_insert','PaymentController@paymentInsert');
Route::post('payment_update','PaymentController@paymentUpdate');
Route::get('payment_delete/{id}','PaymentController@paymentDelete');
Route::get('payment_get_detail','PaymentController@paymentGetDetail');
Route::get('payment_get_detail/{id}','PaymentController@paymentGetDetailID');
Route::get('payment_voucher_report','PaymentController@paymentVoucherReport');
Route::get('payment_edit/{id}','PaymentController@paymentEdit');

//----------------------- Vehicle Informations --------------------------------

Route::get('vehicle_entry','VehicleController@vehicleEntry');
Route::post('vehicle_insert','VehicleController@vehicleInsert');
Route::post('vehicle_update','VehicleController@vehicleUpdate');
Route::get('vehicle_delete/{id}','VehicleController@vehicleDelete');
Route::get('vehicle_report','VehicleController@vehicleReport');
Route::get('vehicle_get_detail','VehicleController@vehicleGetDetail');
Route::get('vehicle_get_detail/{id}','VehicleController@vehicleGetDetailID');
Route::get('vehicle_edit/{id}','VehicleController@vehicleEdit');

//----------------------- Receipt Informations --------------------------------

Route::get('receipt_report','ReceiptController@receiptReport');
Route::get('receipt_get_detail/{id}','ReceiptController@receiptGetDetailID');

// Route::get('receipt_voucher','ReceiptController@receiptVoucher');

// Route::post('receipt_insert','ReceiptController@receiptInsert');
// Route::post('receipt_update','ReceiptController@receiptUpdate');
// Route::post('receipt_delete','ReceiptController@receiptDelete');
// Route::get('receipt_voucher_report','ReceiptController@receiptVoucherReport');
// Route::get('view_receipt','ReceiptController@viewReceipt');
// Route::get('receipt_get_detail','ReceiptController@receiptGetDetail');


//---------------------- Customer Informations --------------------------------

Route::get('customer_entry','CustomerController@customerEntry');
Route::post('customer_insert','CustomerController@customerInsert');
Route::post('customer_update','CustomerController@customerUpdate');
Route::get('customer_delete/{id}','CustomerController@customerDelete');
Route::get('customer_report','CustomerController@customerReport');
Route::get('customer_get_detail','CustomerController@customerGetDetail');
Route::get('customer_get_detail/{id}','CustomerController@customerGetDetailID');
Route::get('customer_edit/{id}','CustomerController@customerEdit'); by chaitu */

//--------------------- Leave Information -------------------------------------

Route::get('apply_leave','LeaveController@applyLeave');
Route::post('leave_insert','LeaveController@leaveInsert');
Route::post('leave_update','LeaveController@leaveUpdate');
Route::post('leave_delete','LeaveController@leaveDelete');
Route::get('leave_history','LeaveController@leaveHistory');
Route::get('leave_approval','LeaveController@leaveApproval');
Route::get('leave_get_detail','LeaveController@leaveGetDetail');
Route::get('leave_get_detail/{id}','LeaveController@leaveGetDetailID');
Route::get('rmleave_report','LeaveController@rmleaveReport');
Route::get('leave_approve/{id}','LeaveController@leaveApprove');
Route::get('leave_reject/{id}','LeaveController@leaveReject');


//-------------------- Holidays Report ----------------------------------------

Route::get('create_holiday','HolidayController@createHoliday');
Route::get('holiday_report','HolidayController@holidayReport');
Route::post('holiday_insert','HolidayController@holidayInsert');
Route::post('holiday_update','HolidayController@holidayUpdate');
Route::get('holiday_delete/{id}','HolidayController@holidayDelete');
Route::get('holiday_get_detail','HolidayController@holidayGetDetail');
Route::get('holiday_get_detail/{id}','HolidayController@holidayGetDetailID');
Route::get('holiday_edit/{id}','HolidayController@holidayEdit');

//----------------------- Leave Reports ---------------------------------------

Route::post('leaveTypes_insert','LeaveTypesController@leaveTypesInsert');
Route::post('leaveTypes_update','LeaveTypesController@leaveTypesUpdate');
Route::post('leaveTypes_delete','LeaveTypesController@leaveTypesDelete');
Route::get('leaveTypes_get_detail','LeaveTypesController@leaveTypesGetDetail');

Route::get('leaveTypes_get_detail/{id}','LeaveTypesController@leaveTypesGetDetailID');

Route::get('leaveTypes_get_detail/{id}','LeaveTypesController@leaveTypesGetDetailID');


//------------------------ Role Reports ---------------------------------------

/* Route::get('assign_role','RoleController@assignRole');
Route::post('role_insert','RoleController@roleInsert');
Route::post('role_update','RoleController@roleUpdate');
Route::get('role_delete/{id}','RoleController@roleDelete');
Route::get('role_report','RoleController@getRoleReport');
Route::get('role_get_detail/{id}','RoleController@roleGetDetailID');
Route::get('role_edit/{id}','RoleController@roleEdit');

//------------------------- Permission Reports --------------------------------

Route::get('assign_permission','PermissionsController@assignPermission');
Route::post('permission_insert','PermissionsController@permissionInsert');
Route::post('permission_update','PermissionsController@permissionUpdate');
Route::get('permission_delete/{id}','PermissionsController@permissionDelete');
Route::get('permission_report','PermissionsController@getPermissionReport');
Route::get('permission_get_detail/{id}','PermissionsController@permissionGetDetailID');
Route::get('permission_edit/{id}','PermissionsController@permissionEdit');

//-------------------------- Role Permission Report ---------------------------

Route::get('assign_role_permission','RolePermissionController@assignRolePermission');
Route::post('role_permission_insert','RolePermissionController@rolePermissionInsert');
Route::post('role_permission_update','RolePermissionController@rolePermissionUpdate');
Route::get('role_permission_delete/{id}','RolePermissionController@rolePermissionDelete');
Route::get('role_permission_report','RolePermissionController@getRolePermissionReport');
Route::get('role_permission_get_detail/{id}','RolePermissionController@rolePermissionGetDetailID');
Route::get('role_permission_edit/{id}','RolePermissionController@rolePermissionEdit'); by chaitu */

//---------------------------User Role-----------------------------------------

Route::get('assign_user_role','UserRoleController@assignUserRole');
Route::post('role_permission_insert','RolePermissionController@rolePermissionInsert');
Route::post('role_permission_update/{id}','RolePermissionController@rolePermissionUpdate');
Route::get('role_permission_delete/{id}','RolePermissionController@rolePermissionDelete');
Route::get('role_permission_report','RolePermissionController@getRolePermissionReport');
Route::get('role_permission_get_detail/{id}','RolePermissionController@rolePermissionGetDetailID');
Route::get('role_permission_edit/{id}','RolePermissionController@rolePermissionEdit');
//-----------------------------------------------------------------------------

Route::get('dashboard1','Controller@getDashboard1');

//Route::get('report','Controller@report')->middleware('RoleBaseMiddleware');

Route::get('view_employee','Controller@view_employee');

Route::get('view_invoice','Controller@view_invoice');
Route::get('dashboard','Controller@dashboard');

Route::get('view_receipt','Controller@view_receipt');

Route::get('view_customer','Controller@view_customer');
//Route::get('employee_edit','Controller@employee_edit');
Route::get('admin_profile','Admin_profile@view_profile');
Route::get('mailbox','mailboxController@view_mailbox');
Route::post('mailbox','mailboxController@get_mail');

//});


