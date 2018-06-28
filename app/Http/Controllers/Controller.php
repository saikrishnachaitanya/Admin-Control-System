<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDashboard()
    {
        return view('layouts.dashboard');
    }    

    public function getDashboard1()
    {
        return view('layouts.dashboard1');
    }

     public function getlogin()
    {
        return view('layouts.login');
    }

     public function getemployee()
    {
        return view('layouts.create_employee');
    }

    

    public function getquotation_report()
    {
        return view('layouts.quotation_report');
    }

     public function getemployeereport()
    {
        return view('layouts.employee_report');
    }
     public function view_employee()
    {
        return view('layouts.view_employee');
    }
       public function view_quotation()
    {
        return view('layouts.view_quotation');
    }
     

     public function dashboard()
    {
        return view('layouts.dashboard');
    }
     public function invoice_report()
    {
        return view('layouts.invoice_report');
    }
     public function view_invoice()
    {
        return view('layouts.view_invoice');
    }
    
     
      
     public function payment_voucher_report()
    {
        return view('layouts.payment_voucher_report');
    }
     public function receipt_voucher_report()
    {
        return view('layouts.receipt_voucher_report');
    }
      
     public function view_payment()
    {
        return view('layouts.view_payment');
    }
     
    
     
    
     
    
    
    
    public function view_customer()
    {
        return view('layouts.view_customer');
    }
    public function employee_edit()
    {
        return view('layouts.employee_edit');
    }

    public function report()
    {
        return view('layouts.customer_Success');
    }
    
}
