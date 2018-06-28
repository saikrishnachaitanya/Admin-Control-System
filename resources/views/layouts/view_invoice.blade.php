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
.labelcolor
{
	color: #0086c4;
	font-size:13px;
}
.heading
{
  font-family:calibri-bold;
  color:#126567;
  font-size:15px;
  text-align:center;  
  text-decoration:underline;
}


</style>
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4 class="fontcolor"><u>Invoice Detail</u></h4>
                            
                </div>
                <div class="ibox-content">
                <div class="row">
                    <div class="text-right">
                        <button class="btn btn-primary" id="" name="" onclick="myFunction()">Print</button>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                        
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Tin Number :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->tin_number }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Cin Number :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->cin }} 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                <div class="row">
                        <div class="col-md-12">
                        
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Pan Number :</label>
                                </div>
                                <div class="col-md-6">
                                   {{ $invoice->pan_number }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Service Tax Number :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->service_tax_number }}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                    	<div class="col-md-12">
                        
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Reverse Charge :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->reverse_charge }} 
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Transportation Moc :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->transportation_moc }} 
                    			</div>
                    		</div>
                    		</div>
                    	</div>
                    </div><br>
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Invoice Number :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->invoice_number }} 
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Vehicle Number :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->vehicle_number }} 
                    			</div>
                    		</div>
                    		</div>
                    	</div>
                    </div><br>
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Invoice Date :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->invoice_date }} 
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Date Of Supply :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->date_of_supply }} 
                    			</div>
                    		</div>
                    		</div>
                    	</div>
                    </div><br>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">GSTIN :</label>
                                </div>
                                <div class="col-md-6">
                                  {{ $invoice->gstin }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Place Of Supply :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->place_of_supply }} 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="col-md-6">
                            <h4 text-align: center;">Billed Details</h4><br/>
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Name :</label>
                    			</div>
                    			<div class="col-md-6">

                    			{{ $invoice->billed_name }}   

                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                            <h4>Shipping Details</h4><br/>
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Name :</label>
                    			</div>
                    			<div class="col-md-6">

                    	          {{ $invoice->shipped_name }}    

                    			</div>
                    		</div>
                    		</div>
                    	</div>
                    </div><br>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Door No :</label>
                                </div>
                                <div class="col-md-6">

                              {{ $invoice->billed_door_number }} 

                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Door No :</label>
                                </div>
                                <div class="col-md-6">

                                  {{ $invoice->shipped_door_number }} 

                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                      <div class="row">
                    
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Street :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->billed_street_name }} 
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Street :</label>
                                </div>
                                <div class="col-md-6">
                                {{ $invoice->shipped_street_name }} 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                      <div class="row">
                    
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Area :</label>
                                </div>
                                <div class="col-md-6">
                                   {{ $invoice->billed_area }} 
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Area :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->shipped_area }} 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">City / Town :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->billed_city }} 
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">City / Town :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->shipped_city }} 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">State :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->billed_state }} 
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">State :</label>
                                </div>
                                <div class="col-md-6">
                                   {{ $invoice->shipped_state }} 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">PAN Number</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->pan_number }} 
                                </div>
                            </div>
                            </div>
                           <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Reserves Charge :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $invoice->reverse_charge }} 
                                </div>
                            </div>
                            </div>
                        </div> 
                    </div><br>
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">GSTIN Number :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->gstin }} 
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<!-- <div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">GSTIN Number :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $invoice->reverse_charge }} 
                    			</div>
                    		</div> -->
                    		</div>
                    	</div>
                    </div><br>
                    <div class="row">
                    <div class="col-md-12">
                    <table class="table" border="1px solid black">
                        <thead>
                          <tr>
                            <th rowspan="2">S.No</th>
                            <th rowspan="2">Product Description</th>
                            <th rowspan="2">HSN Code</th>
                            <th rowspan="2">UOM</th>
                            <th rowspan="2">Quantity</th>
                            <th rowspan="2">Rate</th>
                            <th rowspan="2">Amount</th>
                            <th rowspan="2">Discount</th>
                            <th rowspan="2">Taxable Value</th>
                            <th colspan="2">CGST</th>
                            <th colspan="2">SGST</th>
                            <th rowspan="2">Total Price</th>
                          </tr>
                          <tr>
                              <th>Rate</th>
                              <th>Amount</th>
                              <th>Rate</th>
                              <th>Amount</th>
                          </tr>

                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>{{ $invoice->product_description }}</td>
                            <td>{{ $invoice->hsn_code }}</td>
                            <td>{{ $invoice->uom }}</td>
                            <td>{{ $invoice->qty }}</td>
                            <td>{{ $invoice->amount }}</td>
                            <td>{{ $invoice->amount }}</td>
                            <td>{{ $invoice->discount }}</td>
                            <td>{{ $invoice->amount }}</td>
                            <td>{{ $invoice->add_cgst_percentage }}</td>
                            <td>{{ $invoice->add_cgst_price}}</td>
                            <td>{{ $invoice->add_sgst_percentage }}</td>
                            <td>{{ $invoice->add_sgst_price }}</td>
                            <td>{{ $invoice->total_amount_after_tax }}</td>
                             
                          </tr> 
                         
                        </tbody>
                    </table>
                    </div>
                    </div>
                    <div class="row">
                    <!-- <div class="col-md-12">
                        <p><b>Total Amount In Rupees :</b> One Laksh Twenty Eight thousand rupees Only</p>
                    </div> -->
                    </div><br><br><br><br>
                    <div class="row">
                    <div class="col-md-12">
                       <div class="col-md-6">
                        <p><b>Customer SIgnature</b></p>
                       </div>
                       <div class="text-right">
                        <p><b>Authority Signature</b></p>
                       </div>
                    </div>
                    </div>
                </div><br/>
                <a href="{{ url('invoice_report') }}" class="btn btn-primary" style="margin-left: 50px">Back</a>
            </div>

        </div>
       
    </div>
         

@endsection

@section('myScript')
<script>
function myFunction() {
    window.print();
}
</script>
	
@endsection