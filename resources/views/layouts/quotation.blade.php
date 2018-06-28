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
/*textarea {
   resize: none;
}*/
</style>
<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4 class="fontcolor"><u>Quotation</u></h4>
                            
                </div>
                <div class="ibox-content">
                    <form action="quotation_insert" method="post">
                    	<div class="row">
					        <div class="col-md-4 col-md-offset-1">
						        <div class="form-group" id="data_1">
                                <label>Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="" name="date"  placeholder="Enter Date" >
                                </div>
                            </div>           
				            </div>
		                 	
		                </div>
		                <div class="row">
				            <div class="col-md-4 col-md-offset-1">
				                <div class="form-group">
				                    <label> Customer Name</label>
				                      <input class="form-control" id="name" name="name" type="text" value="" minlength="1" maxlength="50" required placeholder="Enter Customer Name">
				                </div>            
				            </div>
				            <div class="col-md-4 col-md-offset-2">
				             	<div class="form-group">
				                    <label>Door No</label>
				                      <input class="form-control model" id="door_no" name="door_number" type="text" value="" placeholder="Door Number">
				                    </div>            
				            </div>
				        </div>
				        <div class="row">
				            <div class="col-md-4 col-md-offset-1">
				                <div class="form-group">
				                    <label>Street Name</label>
				                      <input class="form-control model" id="str_name" name="street_name" type="text" value="" placeholder="Street Name">
				                  </div>            
				            </div>
				            <div class="col-md-4 col-md-offset-2">
				             	<div class="form-group">
				                  <label>Area</label>
				                  <input class="form-control model" id="area" name="area" type="text" value="" placeholder="Area">
				                </div>            
				            </div>
				        </div>
				        <div class="row">
				            <div class="col-md-4 col-md-offset-1">
				               <div class="form-group">
				                  <label>Country</label>
				                  
				                   <select class="form-control" id="country" name="country_id" required>
				                        <option value="select">Select country</option>
				                        @foreach($countries as $country)
				                          <option value="{{$country->id}}">{{ $country->name }}</option>
				                        @endforeach                                        
				                    </select>
				                </div>
				                          
				            </div>
				            <div class="col-md-4 col-md-offset-2">
				             	<div class="form-group">
				                  <label>State</label>
				                   <select class="form-control" id="state" name="state_id" required>
				                        <option value="select">Select State</option>
				                        @foreach($states as $state)
				                          <option value="{{$state->id}}">{{ $state->name }}</option>
				                        @endforeach                                        
				                    </select>
				                </div>            
				            </div>
				        </div>
				        <div class="row">
				            <div class="col-md-4 col-md-offset-1">
				                 <div class="form-group">
				                  <label>City/Town</label>
				                    <select class="form-control" id="city" name="city_id" required>
				                        <option value="select">Select city/town</option>
				                        @foreach($cities as $city)
				                          <option value="{{$city->id}}">{{ $city->name }}</option>
				                        @endforeach                                       
				                    </select>
				                </div>         
				            </div>
				            
				        </div>
				        <div class="row">
				            <div class="col-md-4 col-md-offset-1">
				                <div class="form-group">
				                    <label>Phone Number</label>
				                      <input class="form-control" id="phone_no" name="phone_number" type="tel" value="" maxlength="15" placeholder="Enter Contact Number">
				                </div>            
				            </div>
				            <div class="col-md-4 col-md-offset-2">
				                <div class="form-group">
				                    <label>Mobile Number</label>
				                      <input class="form-control" id="mobile_no" name="mobile_number" type="tel" value="" minlength="10" maxlength="10" required placeholder="Enter Mobile Number">
				                </div>            
				            </div>  
				        </div>
				        <div class="row">
					        <div class=" col-md-11 col-md-offset-1">
					        <div class="form-group">
					        <label>Description</label>
					        </div>
					        	<div class="form-group form-inline">					        		
					        		 MAHINDRA  <input class="form-control" type="text"  id="desc" name="description_1">  COMPLETE IN ALL RESPECTS WITH TOOLS AND ACCESSORIES AS SUPPLIED BY MANUFACTURERS.
 									 FITTED WITH <input style="margin-top:5px;" class="form-control" type="text"  id="txt" name="description_2">  ENGINE SEATING CAPACITY <input class="form-control" type="text" id="capacity" name="description_3">.
					        	</div>
					        </div>
				        </div>
				        <div class="row">
				        	<div class="col-md-4 col-md-offset-1">
				                <div class="form-group">
				                    <label>Ex.Show Room Price</label>
				                      <input class="form-control" id="ex_showroom_price" name="ex_showroom_price" type="tel" value="" maxlength="15" required onkeypress="return isNumberKey(event)" placeholder="Ex.Show Room Price">
				                </div>            
				            </div>
				            <div class="col-md-4 col-md-offset-2">
				                <div class="form-group">
				                    <label>Life Tax/Quarterly Tax</label>
				                      <input class="form-control" id="life_tax/qtrly_tax" name="life_tax_qtrly_tax" type="tel" value="" maxlength="15" required onkeypress="return isNumberKey(event)" placeholder="Life Tax/Quarterly Tax">
				                </div>            
				            </div>
				        </div>
				        <div class="row">
				        	<div class="col-md-4 col-md-offset-1">
				                <div class="form-group">
				                    <label>Insurance Approx</label>
				                      <input class="form-control" id="insurance_approx" name="insurance_approx" type="tel" value="" maxlength="15" required onkeypress="return isNumberKey(event)" placeholder="Insurance Approx">
				                </div>            
				            </div>
				            <div class="col-md-4 col-md-offset-2">
				                <div class="form-group">
				                    <label>Incidental & T/R charges</label>
				                      <input class="form-control" id="incidental_&_t/r_charges" name="incidental_and_tr_charges" type="tel" value="" maxlength="15" required onkeypress="return isNumberKey(event)" placeholder="Incidental & T/R charges">

				                </div>            
				            </div>
				        </div>
				        <div class="row">
				        	<div class="col-md-4 col-md-offset-1">
				                <div class="form-group">
				                    <label>Extended Warranty</label>
				                      <input class="form-control" id="extended_warranty" name="extended_warranty" type="tel" value="" maxlength="15" required onkeypress="return isNumberKey(event)" placeholder="Extended Warranty">
				                </div>            
				            </div>
				            <div class="col-md-4 col-md-offset-2">
				                <div class="form-group">
				                    <label>Maxi Care</label>
				                      <input class="form-control" id="maxicare" name="maxicare" type="tel" value="" maxlength="15" required onkeypress="return isNumberKey(event)" placeholder="Maxi Care">
				                </div>            
				            </div>
				        </div>
				        <div class="row">
				        	<div class="col-md-4 col-md-offset-1">
				        		
				        		<div class="form-group" id="data_2">
                                <label>Delivery Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="" name="delivery_date" placeholder="Delivery Date">
                                </div>
                            </div>
				        	</div>
				        	
				        </div>
				     	<div class="row">
				            <div class="text-center">
				              <button class="btn btn-success">Submit</button>
				              <a href= "{{url('create_quotation')}}" class="btn btn-primary">Clear</a>
				            </div>
			            </div>
				        </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('myScript')
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
<script type="text/javascript">
	function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
</script>

<!-- -------------- Ajax Request for Country, State , City----------------- -->

<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('state')}}?country_id="+countryID,
           success:function(res){               
            if(res){
              //console.log(res);
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();

    }
        
   });

    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('city')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $("#city").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();

    }
        
   });

</script>

@endsection