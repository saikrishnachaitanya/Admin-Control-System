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
                    <h4 class="fontcolor">Quotation Edit</h4>
                           
                </div>
                <div class="ibox-content">
                    <div class="row">
    					<div class="col-md-12">
     						<form method="POST" id="off_information" enctype="multipart/form-data" action = "{{ url('quotation_update') }}">
                <input type="hidden" name="id" value="{{ $quotation->id }}">
               <div class="col-md-6">
      							<div class="col-md-8 col-md-offset-2">
				                    <div  class="form-group">
				                          <label>Quotation Date</label>
				                          <input class="form-control dob" id="" name="date" value = "{{  $quotation->date }}">
				                         </div>     
				                    <div class="form-group">
                               <label>Reference No</label>
                               <input class="form-control" id="" name="ref_number"  value = "{{ $quotation->ref_number }}" type="text">
                            </div> 
                            </div>
                            </div>
                            <div class="col-md-6">
                    <div class="col-md-8 col-md-offset-2">
				                    <div class="form-group">
				                        <label>Customer Name</label>
				                            <input class="form-control" id=""     name="name"  value = "{{ $quotation->name }}" type="text" >
				                    </div>
				                    <div class="form-group">
				                          <label>Door No</label>
				                            <input type="text" class="form-control" id=""  name="door_number" value = "{{ $quotation->door_number }}" type="text">
				                    </div>             
      							</div>
     						
      					
    					 </div>
    					<div class="col-md-12" >
     
        <div class="row">
              <div class="col-md-6">
              <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                    <label>Street Name</label>
                      <input class="form-control model" id="door_no" name="street_name" value = "{{ $quotation->street_name }}" type="text">
                    </div>  
                  <div class="form-group">
                    <label>Area</label>
                      <input class="form-control model" id="str_name" name="name"  value = "{{ $quotation->area }}" type="text">
                  </div>
                  <div class="form-group">
                    <label>City/Town</label>
                    <select class="form-control" id="city" name="city_id" required>
                      <option value="select">Select</option>
                      @foreach($cities as $city)

                      @if($city->name == $quotation->ct_city)
                       <option value="{{$city->id}}" selected>{{ $city->name }}</option>
                      @else
                       <option value="{{$city->id}}">{{ $city->name }}</option>
                      @endif
                      @endforeach
                    </select>
                      
                </div>
                <div class="form-group">
                    <label>State</label>
                    <select class="form-control" id="cur_state_id" name="state_id" required>
                      <option value="select">Select</option>
                      @foreach($states as $state)

                      @if($state->name == $quotation->s_state)
                       <option value="{{$state->id}}" selected>{{ $state->name }}</option>
                      @else
                       <option value="{{$state->id}}">{{ $state->name }}</option>
                      @endif
                      @endforeach
                    </select>
                   
                 </div>
                <div class="form-group">
                    <label>Country</label>
                     <select class="form-control" id="counter" name="country_id" required>
                      <option value="select">Select</option>
                      @foreach($countries as $country)

                      @if($country->name == $quotation->c_country)
                       <option value="{{$country->id}}" selected>{{ $country->name }}</option>
                      @else
                       <option value="{{$country->id}}">{{ $country->name }}</option>
                      @endif
                      @endforeach
                    </select>
                      
              
              </div>
              </div>
              </div>
                 <div class="col-md-6">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                    <label>Mobile Number</label>
                      <input class="form-control model" id="door_no1" name="mobile_number" value = "{{ $quotation->mobile_number }}" type="text">
                    </div>  
                  <div class="form-group">
                    <label>Phone Number</label>
                      <input class="form-control model" id="str_name1" name="phone_number" value = "{{ $quotation->phone_number }}" type="text">
                  </div>
                  <div class="form-group">
                  <label>Description1</label>
                  <input class="form-control model" id="area1" name="description_1" value = "{{ $quotation->description_1 }}" type="text" >
                  </div>
                  <div class="form-group">
                  <label>Description2</label>
                  <input class="form-control model" id="area1" name="description_2" value = "{{ $quotation->description_2 }}" type="text" >
                  </div>
                  <div class="form-group">
                  <label>Description3</label>
                  <input class="form-control model" id="area1" name="description_3" value = "{{ $quotation->description_3 }}" type="text" >
                  </div>            
                  </div>
                 </div>
                  <div class="text-center">
              <button class="btn btn-primary" name="" id="personal_update" value="">Update</button>
              <a class="btn btn-primary" name="" href="{{url('quotation_report')}}">Back</a>
            </div> 
              </div>

    </form>
  </div>
    				</div>
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
<script type="text/javascript">  
  $(document).ready(function(){
  var counter = 1;
      $("#addevent").click(function () {
    if(counter>5){
              alert("A Maximum of 7 Dependencies are allowed to add.");
              return false;
                  }
    var newTextDiv2 = $(document.createElement('div'))
         .attr("id", 'TextDiv2' + counter);
    newTextDiv2.after().html('<div class="row mb-10"><div class="col-md-2"><label>Title</label><input type="text" class="form-control" id="" name=""></div><div class="col-md-2"><label>First Name</label><input type="text" class="form-control"  id="" name=""></div><div class="col-md-2"><label>Last Name</label><input type="text" class="form-control" id="" name=""></div><div class="col-md-2"><label>DOB</label><input type="text" class="form-control dob" id="" name=""></div><div class="col-md-2"><label>age</label><input type="text" class="form-control" id="" name=""></div><div class="col-md-2"><label>Relation</label><select class="form-control"  name="relation" required><option value="select">Select Relation</option><option value="Father">Father</option><option value="Mother">Mother</option><option value="Wife">Wife</option><option value="Son">Son</option><option value="Daughter">Daughter</option></select></div></div>');
    newTextDiv2.appendTo("#TextGroup2");
    counter++;

    $('.dob').datepicker({
    format: "dd-mm-yyyy",
    autoclose: true
   
       });
    });


      $("#removeevent").click(function(){
              if(counter==1)
              {
                 alert("No New Dependencies to remove");
                return false;
              }

            counter--;
            $("#TextDiv2" + counter).remove();

            return false;
            });
    });
</script>

<script>

function readURL1(input) {
var fileName = $( "#image_to_upload" ).val();
var fileExt = fileName.split('.').pop();
//alert(fileExt);
var arr = ['jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'];
if( jQuery.inArray( fileExt, arr ) < 0 )
  {
    bootbox.alert("Please select a jpg, jpeg, gif or png file.", function() {
           }); 
    input.value="";
    return false;
  }

else if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image1')
                        .attr('src', e.target.result)
                         $("#p").show();

                        
                
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

     
</script>
 <script type="text/javascript">
      
      formdata = new FormData();      
      $("#imagebutton").on("click", function() {

          var fil = document.login.myFile.files[0];
          
          if (formdata) {
              formdata.append("image", fil);
              $.ajax({
                  url: "/user/imgupload",
                  type: "POST",
                  data: formdata,
                  async: false,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(response) {
                         if(response.trim()=='0')
                              {
                           alert("Sucessfully Change your profile picture");
                           
                             $("#p").hide();

                          }

                  }
              });
          }                       
      });


  </script>'
  <script type="text/javascript">
  document.getElementById('id-2').className ="nav-parent nav-active active";
      document.getElementById("a").style.display = "block";
document.getElementById('id-2.2').className ="active";
    </script>
<script type="text/javascript">
$(document).ready(function() {
  $('#off_information').submit(function(){ 

    alert('form is submitted');

  });
})




$(document).ready(function() {
  $('#personal_information').submit(function(){ 

    alert('Personal form is submitted');

  });
})



</script>
<script type="text/javascript">
  function FillAddress(f) {
  if(f.billingtoo.checked == true) {
    f.door_no1.value = f.door_no.value;
    f.str_name1.value = f.str_name.value;
    f.area1.value = f.area.value;
    f.cito1.value = f.cito.value;
    f.state1.value = f.state.value;
    f.country1.value = f.country.value;
  }
  else{
    f.door_no1.value = "";
    f.str_name1.value = "";
    f.area1.value = "";
    f.cito1.value = "";
    f.state1.value = "";
    f.country1.value = "";
  }
}
</script>
@endsection