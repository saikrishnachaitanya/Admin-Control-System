@extends('layouts.master')
@section('content')
<style type="text/css">
    .fontcolor
{
  font-family:calibri-bold;
  color:#0086c4;
  font-size:25px;
  text-align:center;
}

</style>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4 class="fontcolor"><u>Invoice Creation</u></h4>
                            
                </div>
                <div class="ibox-content">
                     <form action="{{ url('invoice_detail_update') }}" method="post" enctype="multipart/form-data">
                      <input type="hidden" value="{{ $invoice->id }}" name="id">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label>Tin No </label>
                                    <input class="form-control" id="tin_number" name="tin_number" type="text" value="{{ $invoice->tin_number }}" minlength="1" maxlength="50" required>
                                </div>            
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Cin No</label>
                                        <input class="form-control" id="cin" name="cin" type="text" value="{{ $invoice->cin }}" minlength="1" maxlength="50">
                                </div>            
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label>Pan Number</label>
                                      <input class="form-control" id="pan_number" name="pan_number" type="text" value="{{ $invoice->pan_number }}" minlength="10" maxlength="10" required>
                                </div>            
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Service Tax No</label>
                                     <input class="form-control" id="service_tax_number" name="service_tax_number" type="tel" value="{{ $invoice->service_tax_number }}" minlength="1" maxlength="50" required>
                                </div>            
                            </div>
                               <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label>GSTIN</label>
                                      <input class="form-control" id="gstin" name="gstin" type="text" value="{{ $invoice->gstin }}" minlength="1" maxlength="15" required>
                                </div>            
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Reverse Charge</label>
                                      <input class="form-control" id="reverse_charge" name="reverse_charge" type="text" value="{{ $invoice->reverse_charge }}">
                                </div>            
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                            
                                    <div class="form-group">
                                    <label>Invoice No</label>
                                      <input class="form-control" id="invoice_number" name="invoice_number" type="text" value="{{ $invoice->invoice_number }}" minlength="1" maxlength="50">
                                    </div>            
                                
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group" id="data_1">
                                <label>Invoice Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="{{ $invoice->invoice_date }}" name="invoice_date">
                                </div>
                            </div>           
                            </div>
                              <div class="col-md-4 col-md-offset-1">
                            
                                  <div class="form-group">
                                  <label>Invoice State</label>
                                  <select class="form-control" id="invoice_state_id" name="invoice_state_id" required>
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                        @if($state->name == $invoice->invoice_state)
                                          <option value="{{$state->id}}" selected>{{ $state->name }}</option>
                                        @else
                                          <option value="{{$state->id}}">{{ $state->name }}</option>
                                        @endif
                                        @endforeach
                                                                               
                                    </select>
                                    </div>            
                                
                                 </div>
                                 <div class="col-md-4 col-md-offset-2">
                                  
                                  <div class="form-group">
                                  <label>Invoice City</label>
                                  <select class="form-control" id="invoice_city_id" name="invoice_city_id" required>
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                    @if($city->name == $invoice->invoice_city)
                                        <option value="{{$city->id}}" selected>{{ $city->name }}</option>
                                    @else
                                    <option value="{{$city->id}}">{{ $city->name }}</option>
                                    @endif
                                    @endforeach                             
                                    </select>
                                    </div>            
                                  
                                 </div>
                                 <div class="col-md-4 col-md-offset-1">
                            
                                    <div class="form-group">
                                    <label>Transportation Moc</label>
                                      <input class="form-control" id="transportation_moc" name="transportation_moc" type="text" value="{{ $invoice->transportation_moc }}" minlength="1" maxlength="50">
                                    </div>            
                                
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                <label>Vehicle Number</label>
                   
                                <input type="text" class="form-control" value="{{ $invoice->vehicle_number }} " name="vehicle_number">
                                
                            </div>           
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                            
                                    <div class="form-group">
                                    <label>Place Of Supply</label>
                                      <input class="form-control" id="place_of_supply" name="place_of_supply" type="text" value="{{ $invoice->place_of_supply }}" minlength="1" maxlength="50">
                                    </div>            
                                
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <div class="form-group" id="data_2">
                                <label>Date Of Supply</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="{{ $invoice->date_of_supply }} " name="date_of_supply">
                                </div>
                            </div>           
                            </div>
                            </div>
                            <div class="row">
                              <h4 class="fontcolor">Contact Details</h4>
                              <div class="col-md-4 col-md-offset-1">
                              <h4>Billing Address</h4>
                                     <div class="form-group">
                                    <label>Biller Name</label>
                                      <input class="form-control model" id="billed_name" name="billed_name" type="text" value="{{ $invoice->billed_name }} ">
                                    </div> 
                                    <div class="form-group">
                                    <label>Door No</label>
                                      <input class="form-control model" id="billed_door_number" name="billed_door_number" type="text" value="{{ $invoice->billed_door_number }} ">
                                    </div>  
                                   <div class="form-group">
                                    <label>Street Name</label>
                                      <input class="form-control model" id="billed_street_name" name="billed_street_name" type="text" value="{{ $invoice->billed_street_name }} ">
                                    </div> 
                                  <div class="form-group">
                                  <label>Area</label>
                                  <input class="form-control model" id="billed_area" name="billed_area" type="text" value="{{ $invoice->billed_area }}" required >
                                  </div>
                                 <div class="form-group">
                                    <label>Pincode</label>
                                      <input class="form-control model" id="billed_pin_code" name="billed_pin_code" type="text" value="{{ $invoice->billed_pin_code }}">
                                    </div> 
                                 <div class="form-group">
                                  <label>State</label>
                                  <!-- <input class="form-control model" id="state" name="cur_state_id" type="text" value="" > -->
                                        
                                   <select class="form-control" id="billed_state_id" name="billed_state_id" required>
                                        <option value="select">Select Billed State</option>
                                        @foreach($states as $state)
                                        @if($state->name == $invoice->billed_state)
                                          <option value="{{$state->id}}" selected>{{ $state->name }}</option>
                                        @else
                                          <option value="{{$state->id}}">{{ $state->name }}</option>
                                        @endif
                                        @endforeach                                       
                                    </select>
                                </div>
                                  <div class="form-group">
                                  <label>City/Town</label>
                                  <!-- <input class="form-control model" id="cito" name="cur_city_id" type="text" value="" > -->
                                    <select class="form-control" id="billed_city_id" name="billed_city_id" required>
                                      <option value="">Select Billed City</option>
                                    @foreach($cities as $city)
                                    @if($city->name == $invoice->billed_city)
                                        <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                    @else
                                       <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                    @endif
                                    @endforeach                                           
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Billed GSTIN</label>
                                      <input class="form-control model" id="billed_gstin" name="billed_gstin" type="text" value="{{ $invoice->billed_gstin }}">
                                </div> 
                                  <div class="form-group">
                                    <label>Biller Phone Number</label>
                                      <input class="form-control model" id="billed_phone_number" name="billed_phone_number" type="text" value="{{ $invoice->billed_phone_number }}" minlength="10" maxlength="10">
                                </div> 
                                            
                                <input type="checkbox" id="billingtoo" name="" onclick="FillAddress(this.form)">
                                <em>Check this box if both Address are the same.</em>
                              </div>

                                 <div class="col-md-4 col-md-offset-2">
                                    <h4>Shipping Address</h4>
                                         <div class="form-group">
                                    <label>Shipper Name</label>
                                      <input class="form-control model" id="shipped_name" name="shipped_name" type="text" value="{{ $invoice->shipped_name }} ">
                                    </div> 
                                    <div class="form-group">
                                    <label>Door No</label>
                                      <input class="form-control model" id="shipped_door_number" name="shipped_door_number" type="text" value="{{ $invoice->shipped_door_number }} ">
                                    </div> 
                                     <div class="form-group">
                                    <label>Street Name</label>
                                      <input class="form-control model" id="shipped_street_name" name="shipped_street_name" type="text" value="{{ $invoice->shipped_street_name }} ">
                                    </div>  
                                  
                                  <div class="form-group">
                                  <label>Area</label>
                                  <input class="form-control model" id="shipped_area" name="shipped_area" type="text" value=" {{ $invoice->shipped_area }} " required >
                                  </div>
                                 <div class="form-group">
                                    <label>Pincode</label>
                                      <input class="form-control model" id="shipped_pin_code" name="shipped_pin_code" type="text" value="{{ $invoice->shipped_pin_code }}">
                                    </div> 
                                 <div class="form-group">
                                  <label>State</label>
                                  <!-- <input class="form-control model" id="state" name="cur_state_id" type="text" value="" > -->
                                   <select class="form-control" id="shipped_state_id" name="shipped_state_id" required>
                                        <option value="select">{{ $invoice->shipped_state }}</option>
                                        @foreach($states as $state)
                                        @if($state->name == $invoice->shipped_state)
                                          <option value="{{$state->id}}" selected>{{ $state->name }}</option>
                                        @else
                                        <option value="{{$state->id}}">{{ $state->name }}</option>
                                        @endif
                                        @endforeach                                       
                                    </select>
                                </div>
                                  <div class="form-group">
                                  <label>City/Town</label>
                                  <!-- <input class="form-control model" id="cito" name="cur_city_id" type="text" value="" > -->
                                    <select class="form-control" id="shipped_city_id" name="shipped_city_id" required>
                                    <option value="">Select Shipped City</option>
                                    @foreach($cities as $city)

                                    @if($city->name == $invoice->shipped_city)
                                    <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                       
                                    @else
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                     @endif
                                     @endforeach                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Shipping GSTIN</label>
                                      <input class="form-control model" id="shipped_gstin" name="shipped_gstin" type="text" value="{{ $invoice->shipped_gstin }}">
                                    </div> 
                                <div class="form-group">
                                    <label>Shipping Phone Number</label>
                                      <input class="form-control model" id="shipped_phone_number" name="shipped_phone_number" type="text" value="{{ $invoice->shipped_phone_number}}" minlength="10" maxlength="10">
                                    </div>
                                              
                                  
                                 </div>
                              </div>
                              <div class="row">
                              <h4 class="fontcolor">Bank Details</h4>
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Bank Name </label>
                                        <input class="form-control" id="bank_name" name="bank_name" type="text" value="{{ $invoice->bank_name }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Bank Account Name</label>
                                        <input class="form-control" id="bank_ac_number" name="bank_ac_number" type="text" value="{{ $invoice->bank_ac_number }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Bank Ifsc Code </label>
                                        <input class="form-control" id="bank_ifsc" name="bank_ifsc" type="text" value="{{ $invoice->bank_ifsc }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                
                              </div>
                              <div class="row">
                                <h4 class="fontcolor">Item Details</h4>
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Product Description </label>
                                        <input class="form-control" id="product_description" name="product_description" type="text" value="{{ $invoice->product_description }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>HSN Code</label>
                                        <input class="form-control" id="hsn_code" name="hsn_code" type="text" value="{{ $invoice->hsn_code }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>UOM </label>
                                        <input class="form-control" id="uom" name="uom" type="text" value="{{ $invoice->uom }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Quantity</label>
                                        <input class="form-control" id="qty" name="qty" type="text" value="{{ $invoice->qty }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Unit Price </label>
                                        <input class="form-control" id="unit_price" name="amount" type="text" value="{{ $invoice->amount }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Discount</label>
                                        <input class="form-control" id="discount" name="discount" type="text" value="{{ $invoice->discount }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Chasis No </label>
                                        <input class="form-control" id="chasis_no" name="chasis_no" type="text" value="{{ $invoice->chasis_no }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Engine No</label>
                                        <input class="form-control" id="engine_no" name="engine_no" type="text" value="{{ $invoice->engine_no }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Color </label>
                                        <input class="form-control" id="color" name="color" type="text" value="{{ $invoice->color }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Key No</label>
                                        <input class="form-control" id="key_no" name="key_no" type="text" value="{{ $invoice->key_no }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                              <h4 class="fontcolor">Price Details</h4>
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Total Amount Before Tax </label>
                                        <input class="form-control" id="" name="total_amount_before_tax" type="text" value="{{ $invoice->total_amount_before_tax }}" minlength="1" maxlength="50" required>
                                    </div> 
                                    <div class="form-group">
                                        <label>Mode Of Payment </label>
                                        <select class="form-control" id="mode_payment" name="mode_payment" required>
                                        <option value="select">{{ $invoice->mode_payment }}</option>
                                        <option value="1">CASH</option>
                                        <option value="2">CHEQUE</option>
                                        <option value="3">DD</option>
                                        <option value="4">NETBANKING</option>
                                        <option value="5">CREDIT CARD</option>
                                        <option value="6">DEBIT CARD</option>                                       
                                    </select>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>CGST Price</label>
                                        <input class="form-control" id="add_cgst_price" name="add_cgst_price" type="text" value="{{ $invoice->add_cgst_price }}" minlength="1" maxlength="50">
                                </div> 
                                <div class="form-group">
                                        <label>Payment Mode Details </label>
                                        <input class="form-control" id="" name="payment_details" type="text" value="{{ $invoice->payment_details }}" minlength="1" maxlength="50" required>
                                </div>            
                                </div>
                              </div>
                               <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>CGST Percentage </label>
                                        <input class="form-control" id="add_cgst_percentage" name="add_cgst_percentage" type="text" value="{{ $invoice->add_cgst_percentage }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>SGST Price</label>
                                        <input class="form-control" id="add_sgst_price" name="add_sgst_price" type="text" value="{{ $invoice->add_sgst_price }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>SGST Percentage </label>
                                        <input class="form-control" id="add_sgst_percentage" name="add_sgst_percentage" type="text" value="{{ $invoice->add_sgst_percentage }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>CESS Price</label>
                                        <input class="form-control" id="add_cess_price" name="add_cess_price" type="text" value="{{ $invoice->add_cess_price }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                                <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>CESS Percentage </label>
                                        <input class="form-control" id="add_cess_percentage" name="add_cess_percentage" type="text" value="{{ $invoice->add_cess_percentage }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>Total Tax Amount</label>
                                        <input class="form-control" id="total_tax_amount" name="total_tax_amount" type="text" value="{{ $invoice->total_tax_amount }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Total Amount After Tax </label>
                                        <input class="form-control" id="total_amount_after_tax" name="total_amount_after_tax" type="text" value="{{ $invoice->total_amount_after_tax }}" minlength="1" maxlength="50" required>
                                    </div>            
                                </div>
                                <div class="col-md-4 col-md-offset-2">
                                <div class="form-group">
                                    <label>GST Reverse Charge</label>
                                        <input class="form-control" id="gst_reverse_charge" name="gst_reverse_charge" type="text" value="{{ $invoice->gst_reverse_charge }}" minlength="1" maxlength="50">
                                </div>            
                                </div>
                              </div>
                              <div class="text-center">
                              <button class="btn btn-success" id="" name="">Update</button>
                              <a href = "{{url('invoice_report')}}"" class="btn btn-primary" id="" name="">Back</a>

                              </div>
                            </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('myScript')


    <script type="text/javascript">
          function FillAddress(f) {
          if(f.billingtoo.checked == true) {
            f.shipped_name.value = f.billed_name.value;
            f.shipped_door_number.value = f.billed_door_number.value;
            f.shipped_street_name.value = f.billed_street_name.value;
            f.shipped_area.value = f.billed_area.value;
            f.shipped_city_id.value = f.billed_city_id.value;
            f.shipped_state_id.value = f.billed_state_id.value;
            f.shipped_pin_code.value = f.billed_pin_code.value;
            f.shipped_phone_number.value = f.billed_phone_number.value;
            f.shipped_gstin.value = f.billed_gstin.value;
          }
          else{
            f.shipped_name.value = "";
            f.shipped_door_number.value = "";
            f.shipped_area = ""
            f.shipped_street_name = "";
            f.shipped_area.value = "";
            f.shipped_city_id.value = "";
            f.shipped_state_id.value = "";
            f.shipped_pin_code.value = "";
            f.shipped_phone_number.value = "";
            f.shipped_gstin.value = "";
          }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $('.dob').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
            });
        });
    </script>
    <script type="text/javascript">
    $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

    $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
    });
</script>
<!---------------------- Ajax Request forInvoice State and City --------------- -->

<script type="text/javascript">

    $('#invoice_state_id').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('city')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#invoice_city_id").empty();
                $("#invoice_city_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#invoice_city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#invoice_city_id").empty();
            }
           }
        });
    }else{
        $("#invoice_city_id").empty();

    }
        
   });

  
</script>

<!-- --------------  Ajax Request for Billed State and City ------------------>

<script type="text/javascript">

    $('#billed_state_id').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('city')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#billed_city_id").empty();
                $("#billed_city_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#billed_city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#billed_city_id").empty();
            }
           }
        });
    }else{
        $("#billed_city_id").empty();

    }
        
   });

  s
</script>

<!---------------Ajax Request for Shipped State and City-------------------- -->

<script type="text/javascript">

    $('#shipped_state_id').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('city')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#shipped_city_id").empty();
                $("#shipped_city_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#shipped_city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#shipped_city_id").empty();
            }
           }
        });
    }else{
        $("#shipped_city_id").empty();

    }
        
   });

  
</script>

@endsection