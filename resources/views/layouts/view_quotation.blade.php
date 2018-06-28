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
                    <h4 class="fontcolor"><u>Quotation Detail</u></h4>
                            
                </div>
                <div class="ibox-content">
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Quotation Date :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $quotation->date }}
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Reference No :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $quotation->ref_number }}
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
                                    <label class="labelcolor">Customer Name :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->name }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Door No :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->door_number }}
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
                    				<label class="labelcolor">Street Name:</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $quotation->street_name }}
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Area :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $quotation->area }}
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
                    				<label class="labelcolor">City/Town :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $quotation->ct_city }}
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">State :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $quotation->s_state }}
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
                                    <label class="labelcolor">Country :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->c_country }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Mobile Number :</label>
                                </div>
                                <div class="col-md-6">
                                   {{ $quotation->mobile_number }}
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
                                    <label class="labelcolor">Phone Number :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->phone_number }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Description1 :</label>
                                </div>
                                <div class="col-md-6">
                                   {{ $quotation->description_1 }}
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
                                    <label class="labelcolor">Description2 :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->description_2 }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Description3 :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->description_3 }}
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
                                    <label class="labelcolor">Ex.Show Room Price :</label>
                                </div>
                                <div class="col-md-6">
                                   {{ $quotation->ex_showroom_price }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Life Tax/Quarterly Tax:</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->life_tax_qtrly_tax }}
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
                                    <label class="labelcolor">Insurance Approx :</label>
                                </div>
                                <div class="col-md-6">
                                  {{ $quotation->insurance_approx }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Incidental & T/R charges :</label>
                                </div>
                                <div class="col-md-6">
                                  {{ $quotation->incidental_and_tr_charges }}
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
                    				<label class="labelcolor">Extended Warranty :</label>
                  			</div>
                    			<div class="col-md-6">
                    			{{ $quotation->extended_warranty }}
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Maxi Care :</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $quotation->maxicare }}
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
                                    <label class="labelcolor">Total Price :</label>
                                </div>
                                <div class="col-md-6">
                                    {{ $quotation->total }}
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="labelcolor">Delivery Date :</label>
                                </div>
                                <div class="col-md-6">
                                   {{ $quotation->delivery_date }} 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div><br/>
                <a href="{{url('quotation_report') }}" class = "btn btn-primary" style="margin-left: 80px">Back</a>
            </div>
        </div>
    </div>
         

@endsection

@section('myScript')

	
@endsection