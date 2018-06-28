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
				<h4 class="fontcolor"><u>Employee Creation</u></h4>
                            
                        </div>
                        <div class="ibox-content">
                        	<form action="employee_insert" method="post" enctype="multipart/form-data">
                        		<div class="row">
                        			<h4 class="fontcolor">Personal Details</h4>
                        			<div class="col-md-4 col-md-offset-1">
                        				<div class="form-group">
                        					<label>First Name </label>
                        					<input class="form-control" id="first_name" name="first_name" type="text" value="" minlength="1" maxlength="50" onblur="validate()" required autofocus="autofocus" placeholder="First Name">
 
                        				</div>  
                        			</div>
                        			<div class="col-md-4 col-md-offset-2">
                        				<div class="form-group">
                        					<label>Last Name</label>
                        					<input class="form-control" id="l_name" name="last_name" type="text" value="" minlength="1" maxlength="50" placeholder="Last Name">
                        				</div>            
                        			</div>
                        			<div class="col-md-4 col-md-offset-1">
                        				<div class="form-group">
                        					<label>Email</label>
                        					<input class="form-control" id="email" name="email" type="email" value="" required placeholder="Email">
                        				</div>            
                        			</div>
                        			<div class="col-md-4 col-md-offset-2">
                        				<div class="form-group">
                        					<label>Phone Number</label>
                        					<input class="form-control" id="mobile_no" name="phone_number" type="tel" value="" minlength="10" maxlength="10" required placeholder="Phone Number">
                        				</div>            
                        			</div>
                        			<div class="col-md-4 col-md-offset-1">
                        				<div class="form-group">
                        					<label>Pan Card</label>
                        					<input class="form-control" id="pan_no" name="pancard" type="text" value="" minlength="10" maxlength="10" required placeholder="Pan Card">
                        				</div>            
                        			</div>
                        			<div class="col-md-4 col-md-offset-2">
                        				<div class="form-group">
                        					<label>Alternate Phone Number</label>
                        					<input class="form-control" id="alt_mobile_no" name="alternative_phone_number" type="tel" value="" minlength="10" maxlength="10" placeholder="Alternate Phone Number">
                        				</div>            
                        			</div>
                        			<div class="col-md-4 col-md-offset-1">

                        				<div class="form-group">
                        					<label>Father's Name</label>
                        					<input class="form-control" id="fath_name" name="father_name" type="text" value="" minlength="1" maxlength="50" placeholder="Father Name">
                        				</div>            

                        			</div>
                        			<div class="col-md-4 col-md-offset-2">

                        				<div class="form-group">
                        					<label>Mother's Name</label>
                        					<input class="form-control" id="moth_name" name="mother_name" type="text" value="" minlength="1" maxlength="50" placeholder="Mother Name">
                        				</div>            

                        			</div>
                        			<div class="col-md-4 col-md-offset-1">

                        				<div class="form-group">
                        					<label>Date Of Birth</label>
                        					<input class="form-control dob" id="dob" name="dob" type="text" value="" placeholder="D.O.B.">
                        				</div>            

                        			</div>
                        			<div class="col-md-4 col-md-offset-2">

                        				<div class="form-group">
                        					<label>Gender</label>
                        					<select class="form-control btn btn-default" id="gender" name="gender" required>
                        						<option value="select">Select Gender</option>
                        						<option value="male">Male</option>
                        						<option value="female">Female</option>                                       
                        					</select>
                        				</div>            

                        			</div>
                        		</div>
                        		<div class="row">
                        			<h4 class="fontcolor">Contact Details</h4>
                        			<div class="col-md-4 col-md-offset-1">
                        				<h4>Current Address</h4>
                        				<div class="form-group">
                        					<label>Door No</label>
                        					<input class="form-control model" id="door_no" name="cur_door_number" type="text" value="" placeholder="Door Number">
                        				</div>  
                        				<div class="form-group">
                        					<label>Street Name</label>
                        					<input class="form-control model" id="str_name" name="cur_street_name" type="text" value="" required placeholder="Street Name">
                        				</div>
                        				<div class="form-group">
                        					<label>Area</label>
                        					<input class="form-control model" id="area" name="cur_area" type="text" value="" required  placeholder="Area">
                        				</div>
                        				<div class="form-group">
                        					<label>Country</label>
                        					<select class="form-control" id="country" name="cur_country_id" required>
                        						<option value="select">Select country</option>
                        						@foreach($countries as $country)
                        						<option value="{{$country->id}}">{{ $country->name }}</option>
                        						@endforeach                                        
                        					</select>
                        				</div>
                        				<div class="form-group">
                        					<label>State</label>
                        					<select class="form-control" id="state" name="cur_state_id" required>
                        						<option value="select">Select State</option>	                                       
                        					</select>
                        				</div>
                        				<div class="form-group">
                        					<label>City/Town</label>
                        					<select class="form-control" id="city" name="cur_city_id" required>
                        						<option value="select">Select city/town</option>
                        						                                       
                        					</select>
                        				</div>


                        				<input type="checkbox" id="billingtoo" name="" onclick="FillAddress(this.form)">
                        				<em>Check this box if both Address are the same.</em>
                        			</div>

                        			<div class="col-md-4 col-md-offset-2">
                        				<h4>Permenant Address</h4>
                        				<div class="form-group">
                        					<label>Door No</label>
                        					<input class="form-control model" id="door_no1" name="per_door_number" type="text" value="" placeholder="Door Number">
                        				</div>  
                        				<div class="form-group">
                        					<label>Street Name</label>
                        					<input class="form-control model" id="str_name1" name="per_street_name" type="text" value="" required placeholder="Street Name">
                        				</div>
                        				<div class="form-group">
                        					<label>Area</label>
                        					<input class="form-control model" id="area1" name="per_area" type="text" value="" required placeholder="Area">
                        				</div>
                        				<div class="form-group">
                        					<label>Country</label>
                        				
                        					<select class="form-control" id="country1" name="per_country_id" required>
                        						<option value="select">Select country</option>
                        						@foreach($countries as $country)
                        						<option value="{{$country->id}}">{{ $country->name }}</option>
                        						@endforeach                                       
                        					</select>
                        				</div> 
                        				<div class="form-group">
                        					<label>State</label>
                        					
                        					<select class="form-control" id="state1" name="per_state_id" required>
                        						<option value="select">Select State</option>
                        						                                       
                        					</select>
                        				</div>
                        				<div class="form-group">
                        					<label>City/Town</label>
                        					
                        					<select class="form-control" id="city1" name="per_city_id" required>
                        					<option value="select">Select city/town</option>	                                       
                        					</select>
                        				</div>



                        			</div>
                        		</div>
                        		<div class="row">
                        			<h4 class="fontcolor">Qualification Details</h4>
                        			<div class="col-md-4 col-md-offset-1">
                        				<div class="form-group">
                        					<label>Highest Qualification</label>
                        					<input class="form-control model" id="high_qual" name="highest_qualification" type="text" value="" placeholder="Qualification">
                        				</div>
                        				<div class="col-xs-6 col-md-6" style="padding-left:0px;">
                        					<div class="form-group">
                        						<label> Experience(years)</label>
                        						<input class="form-control model years" name="exp_year" type="text" value="0" placeholder="years" >
                        					</div>            
                        				</div>
                        				<div class="col-xs-6 col-md-6" style="padding-right:0px;">
                        					<div class="form-group">
                        						<label>Months</label>
                        						<select class="form-control" id="mnth" name="exp_month">
                        							<option value="0">Select months</option>
                        							<option value="0">0</option>
                        							<option value="1">1</option>
                        							<option value="2">2</option>
                        							<option value="3">3</option>
                        							<option value="4">4</option>    
                        							<option value="5">5</option>
                        							<option value="6">6</option>    
                        							<option value="7">7</option>
                        							<option value="8">8</option>    
                        							<option value="9">9</option>
                        							<option value="10">10</option>    
                        							<option value="11">11</option>

                        						</select>
                        					</div>            
                        				</div>
                        				<div class="fresher">
               <!--  <div class="form-group">
                  <label>Certificates Done</label>
                  <input class="form-control" id="certif" type="checkbox">
              </div> -->            


              <div class="form-group">
              	<label>Support Documents <br/>(Degree Certicates / Provisional)</label>

              	<input type="file" name="fresher_attachment" accept="image/*|media_type|rar/zip">
              </div>            

          </div>
      </div>
      <div class="col-md-4 col-md-offset-2">
      	<!-- <h4>Previous Company details</h4> -->

      	<div class="work_div">
      		<div class="form-group">
      			<label>Company Name</label>
      			<input class="form-control model" id="cmp_name" name="company_name" type="text" value="" placeholder="Company Name">
      		</div>            


      		<div class="form-group">
      			<label>Designation</label>
      			<input class="form-control model" id="designation" name="designation" type="text" value="" placeholder="Designation">
      		</div>            


      		<div class="form-group">
      			<label>Technologies Worked</label>
      			<input class="form-control model" id="tech_skills" name="skills" type="text" value="" placeholder="Enter Technologies">
      		</div>            


      		<div class="form-group">
      			<label>Support Documents <br/>(Payslip / Form 16 / Relieving Letter)</label>
      			<!-- <input class="form-control model" id="tech_skills" name="tech_skills" type="text" value="" > -->
      			<input type="file" name="exp_attachment" accept="image/*|media_type|rar/zip">
      		</div>            

      	</div>
      </div>
  </div>
  <div class="text-center">
  	<button class="btn btn-success" id="" name="">Submit</button>
  	<a href = {{url('create_employee')}} class= "btn btn-primary ">clear </a>
  </div>
</form>
</div>
</div>
</div>
</div>

@endsection

@section('myScript')




<!--------------Ajax Request for Current Address ---------------------->

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

 <!--------------Ajax Request for Permanenet Address ---------------------->

<script type="text/javascript">
    $('#country1').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('state')}}?country_id="+countryID,
           success:function(res){               
            if(res){
              //console.log(res);
                $("#state1").empty();
                $("#state1").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state1").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#state1").empty();
            }
           }
        });
    }else{
        $("#state1").empty();
        $("#city1").empty();

    }
        
   });

    $('#state1').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('city')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city1").empty();
                $("#city1").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#city1").append(?['<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#city1").empty();
            }
           }
        });
    }else{
        $("#city1").empty();

    }
        
   });

</script>


<script type="text/javascript">
      function FillAddress(f) {
            if(f.billingtoo.checked == true) {
                  f.door_no1.value = f.door_no.value;
                  f.str_name1.value = f.str_name.value;
                  f.area1.value = f.area.value;
                  f.city1.value = f.city.value;
                  f.state1.value = f.state.value;
                  f.country1.value = f.country.value;
            }
            else{
                  f.door_no1.value = "";
                  f.str_name1.value = "";
                  f.area1.value = "";
                  f.city1.value = "";
                  f.state1.value = "";
                  f.country1.value = "";
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
<script>

	$(document).ready(function(){
		$('.work_div').hide();
		$('.fresher').hide();
	});
	$(document).ready(function(){
		var $expe = $('.work_div');
		var $fresher = $('.fresher');
		$('.years').on('keyup',function(){
			console.log(this.value); 
			console.log(this.value+' - '+$('#mnth').val());  
			if(this.value === '0' && $('#mnth').val()==='0'){
				$fresher.show();
				$expe.hide();
			}
			else if(this.value != '0' && $('#mnth').val()==='0' && this.value != '' ){
				$expe.show();
				$fresher.hide();
			}
			else if(this.value != '0' && $('#mnth').val()!='0' && this.value != '' ){
				$expe.show();
				$fresher.hide();
			}
			else if(this.value ==='' && $('#mnth').val()==='0'){
				$expe.hide();
				$fresher.hide();
			}
			else {

				$expe.show();
				$fresher.hide();
            //alert("hello");
        }


    });


		$('#mnth').change(function(){ 
			 	// alert(this.value);
			  // console.log(this.value+' - '+$('.years').val()); 


			  if($('.years').val()!='0' && $('#mnth').val() != '0'){
			  	$('.work_div').show();
			  	$('.fresher').hide();
			  }     else 

			  if($('.years').val()=='0' && $('#mnth').val() != '0'){
			  	$expe.show();
			  	$fresher.hide();
			  }   
			  else 

			  	if($('.years').val()==='' && $('#mnth').val() != '0'){
			  		$expe.show();
			  		$fresher.hide();
			  	}   


			  	if($('.years').val()=='0' && $('#mnth').val() == '0'){
			  		$expe.hide();
			  		$fresher.show();
			  	}   
			  	else 

			  		if($('.years').val()==='' && $('#mnth').val() == '0'){
			  			$expe.hide();
			  			$fresher.hide();
			  		}   

			  	});




	});


</script>

@endsection