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

h1 {
margin-top: 0;
padding-top: 0;
}
.supercal {
width: 300px;
}
.supercal .supercal-header {
display: block;
line-height: 35px;
margin-bottom: 20px;
text-align: center;
position: relative;
background-color:#eee;
color:#000;
}
.supercal .supercal-header .prev-month {
float: left;
}
.supercal .supercal-header .next-month {
float: right;
}
.supercal-month {
position: relative;
z-index: 0;
overflow: hidden;
/*background-color:#000;*/
}
.supercal table {
width: 300px;
table-layout: fixed;
background: #fff;
}
.supercal td {
    cursor: pointer;
    padding: 6px;
    text-align: center;
}
.supercal td:hover {
background: #243847 !important;
color: #fff;
border-radius:5px;

}
.supercal td.month-prev, .supercal td.month-next {
background: #eee;
}
.supercal td.selected {
background: #243847;
color: #fff;
font-weight: normal;
border-radius:5px;
}
.supercal td.today {
font-weight: bold;
/*display:none;*/
}
/* Footer */
.supercal .supercal-footer {
width: 100%;
display:none;

}
.supercal .supercal-footer span.supercal-input {
display: table-cell;
width: 100%;
cursor: default;
}
 
</style>
<!-- <link rel="stylesheet" href="{{asset('assets/css/dzscalendar.css')}}"> -->
<script type="text/javascript">
function chk()
{
  var fd = new FormData(document.getElementById("apl"));

var jqxhr = $.ajax({
        url: '/leave/checkappliedleave',
        data:  fd,
        type: 'POST',
        processData: false,  
        contentType: false,
        global: false,
        async:false,
        success: function(response) {
          return response
        }
      }).responseText;

return jqxhr;
}

</script>


<script>

function validateForm()
{

flag=0;
dat ="";
var testchar=document.getElementById("leave_type").value;
if (testchar == "2"){
	testchar="On Duty";
}else if(testchar == "1"){
	testchar="Tour";
}
var a=chk();
var response = JSON.parse(a);

if(response.st_date=="Yes")
{
 bootbox.alert("Start Date is Holiday", function() {
           });
return false;
}

else if (response.en_date=="Yes")
{
bootbox.alert("End Date is Holiday", function() {
           });
return false;
}

else if(document.getElementById("leave_type").value=="SL")
{

if (response.total_days>3)
{
document.getElementById("docf").style.display="block";
if(document.getElementById("doc").value=="")
{
  return false;
}

else if(response.holidays.length >0)
{
  for(var i=0;i<response.holidays.length;i++)
  {
    dat=dat+response.holidays[i]["date"].substring(0, response.holidays[i]["date"].length- 13)+"\n";

}
  if (confirm("Holidays:\n"+dat+"\nAre you sure to continue?") == true) {
        if (confirm("Total number of "+ testchar +" days:"+response.total_days) == true) {
        	$('#no_of_leave_days').val(parseFloat(response.total_days));
       return true;
    } 
    else {
      return false;
    }
    } 
    else {
      return false;
    }

}

else
{
if (confirm("Total number of "+ testchar +" days:"+response.total_days) == true) {
	$('#no_of_leave_days').val(parseFloat(response.total_days));
       return true;
    } 
    else {
      return false;
    }


}



}


else if(response.holidays.length >0)
{
  for(var i=0;i<response.holidays.length;i++)
  {
    dat=dat+response.holidays[i]["date"].substring(0, response.holidays[i]["date"].length- 13)+"\n";

}
  if (confirm("Holidays:\n"+dat+"\nAre you sure to continue?") == true) {
  	console.log(testchar);
   if (confirm("Total number of "+ testchar +" days:"+response.total_days) == true) {
   	$('#no_of_leave_days').val(parseFloat(response.total_days));
       return true;
    } 
    else {
      return false;
    }
    } 
    else {
      return false;
    }

}

else
{

  if (confirm("Total number of "+ testchar +" days:"+response.total_days) == true) {
  	$('#no_of_leave_days').val(parseFloat(response.total_days));
       return true;
    } 
    else {
      return false;
    }

}






}


else if(response.holidays.length >0)
{
  for(var i=0;i<response.holidays.length;i++)
  {
    dat=dat+response.holidays[i]["date"].substring(0, response.holidays[i]["date"].length- 13)+"\n";

}



   if (confirm("Holidays:\n"+dat+"\nAre you sure to continue?") == true) {
    if (confirm("Total number of "+ testchar +" days:"+response.total_days) == true) {
    	$('#no_of_leave_days').val(parseFloat(response.total_days));
       return true;
    } 
    else {
      return false;
    }
    } 
    else {
      return false;
    }

}


else
{
  if (confirm("Total number of "+ testchar +" days:"+response.total_days) == true) {
  	$('#no_of_leave_days').val(parseFloat(response.total_days));
       return true;
    } 
    else {
      return false;
    }

 
}


}

</script>
  <script>
     function readURL2(input) {
var fileName =input.value;
var fileExt = fileName.split('.').pop();
//alert(fileExt);
var arr = ['pdf'];
if( jQuery.inArray( fileExt, arr ) < 0 )
  {
    bootbox.alert("Please select a pdf file.", function() {
           });
    input.value="";
    return false;
  }


        }
  </script>

<script type="text/javascript">
  function hid()
  {
    document.getElementById("docf").style.display="none";
  }
</script>

	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <h4 class="fontcolor">Apply Leave</h4>
                  </div>
                <div class="ibox-content">
                    <form  action="leave_insert" method="POST" id="apl" enctype="multipart/form-data" onsubmit="return validateForm()">
                     <div class="row">
                     <div class="col-sm-4">
                       <!-- <div class="dzscalendar skin-green" id="tr1" style="">
                       </div>

                       </div> -->
                       <div class="example1" style="margin:0 auto"></div>
                      </div>
                     <div class="col-sm-4">
                     <div class="radio-inline">
                        <label>
                         <input type="radio" name="leave" id="leave1" value="1" checked="checked" onchange="leavetypefun(this.value);"> Leave
                        </label>         
                      </div>
    
                     <div class="form-group">    
                     <select class="form-control" id="leave_type" name="leave_type" required onchange="return hid();">
                     <option value="CL" selected>Casual leave</option>
                     <option value="SL">Sick leave</option>
                     <!-- <option value="LWP">Leave without pay</option>
                     <option value="EL">Earned leave</option> -->
                     </select>
                      </div>

                        <!--   <div class="radio-inline" id="multi_attdiv" style="display:none;margin-top:0px;padding-left:0px">
                          <div style="margin-top:-10px">
                             <label>
                        <input type="checkbox" name="multi_att" id="multi_att" value="3" > Attendance For More Than One Day
                      </label>
                      </div>
                      </div> -->

                     <div class="form-group">
                    	<input class="form-control" id="reason" name="reason" type="text" value="" placeholder="Leave Reason" required>
                      </div>

 
                     <input type="text" name="no_of_leave_days" id='no_of_leave_days' style="display:none">
                     <div class="form-group">
    
                     <input class="form-control dob" id="start_date" name="start_date" type="text" value="" placeholder="Start Date" required  >
                     </div>
                     <div class="form-group">
    
                     <input class="form-control" id="end_date" name="end_date" type="text" value="" placeholder="End Date" required disabled onchange="return hid();">
                     </div>
                     <div class="checkbox" id="display_lta" style="display:none">
                     <label>
                     <input type="checkbox" value="1" id="lta" name="lta">
                     LTA
                     </label>
                     </div>
    <div class="checkbox" id="half" style="display: none;">
  <label>
    <input type="checkbox" value="1" id="halfday" name="halfday">
    Half Day
  </label>
</div>
<div id="halfdaydiv" style="display:none;margin-left:19px;">

<label class="checkbox">
  <input type="checkbox" id="Checkbox2" name="halfcheck" value="2nd half"> <p id="chbx_label_s">2nd Half of  Day</p>
</label>
<label class="checkbox">
  <input type="checkbox" id="Checkbox1" name="halfcheck" value="1st half"> <p id="chbx_label_e">1st Half of  Day</p>
</label>

</div>
<div id="docf" style="display:none" >
<input type="file" data-buttonText="Choose Doc Certificate"  class="filestyle"  data-iconName="glyphicon glyphicon-inbox" data-buttonName="btn-warning" data-input="false" data-size="sm"  name="doc" data-badge="true"  id="doc" class="browse" onchange="readURL2(this);" />
</div>



    <input type=submit value="Apply" class="btn btn-primary btn-block" id="al"></div>
    <div class="col-sm-4">

<table class="table table-bordered table-hover">
  <tr class="active text-center">
    <th class="text-center">Type</th>
    <th>Quota</th>
    <th>Balance</th>
    <th>Used</th>
  </tr>
 @foreach($leavesDetails as $leavesDetail)
 <tr class="active text-center">
    <th class="text-center">{{ $leavesDetail['type'] }}</th>
    <th>{{ $leavesDetail['quota'] }}</th>
    <th>{{ $leavesDetail['balance'] }}</th>
    <th>{{ $leavesDetail['used'] }}</th>
  </tr>
  @endforeach
</table>


</div>
    </div>
</form>     
                </div>
            </div>
        </div>
    </div>

@endsection

@section('myScript')
<!-- 	<script type="text/javascript">
  		$(document).ready(function(){
    	$('.dob').datepicker({
    	format: "yyyy-mm-dd",

    	autoclose: true
			});
  		});
	</script> -->
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
today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

today = dd+'/'+mm+'/'+yyyy;




var dt = new Date();
dt.setDate(dt.getDate() + 3);
var dd1 = dt.getDate();
var mm1 = dt.getMonth()+1; //January is 0!
var yyyy1 = dt.getFullYear();

if(dd1<10) {
    dd='0'+dd
} 

if(mm1<10) {
    mm='0'+mm
} 

today1 = dd1+'/'+mm1+'/'+yyyy1;






$('#start_date').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true
});

var dis1 = document.getElementById("start_date");
dis1.onchange = function () {
  hid()
   if (this.value != "") {
      $('#end_date').datepicker('remove');
      // $("#half").hide();
      document.getElementById("end_date").value = '';
      document.getElementById("end_date").disabled = false;
      $('#end_date').datepicker({startDate:this.value,
    format: "yyyy-mm-dd",
    autoclose: true
});
      $("#half").show();
   }else{
    document.getElementById("end_date").value = '';
    document.getElementById("end_date").disabled = true;
    $('#end_date').datepicker('remove');
   $("#half").hide();
   }
}

$( "#leave_type" ).change(function() {

document.getElementById("start_date").value = ''

var a =document.getElementById("leave_type").value;
var b = $("input[name=leave]:checked").val();
	// alert(a+' - '+b);
if(b ==1){
  if(a == 'CL' || a == 'SL' || a == 'LWP'){
    document.getElementById("display_lta").style.display="none";
	document.getElementById("half").style.display="block";
$('#start_date').datepicker('remove');
$("#half").hide();
$('#start_date').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true
});}
else if (a == 'EL'){
  document.getElementById("display_lta").style.display="block";
  document.getElementById("half").style.display="none";
  $('#start_date').datepicker('remove');
 $('#start_date').datepicker({startDate: today1,
    format: "yyyy-mm-dd",
    autoclose: true
}); 
}
else{
  document.getElementById("display_lta").style.display="none";
   $('#start_date').datepicker('remove');
 $('#start_date').datepicker({startDate: today,
    format: "yyyy-mm-dd",
    autoclose: true
});  
}
}
else{
  $('#start_date').datepicker('remove');
 $('#start_date').datepicker({startDate: today,
    format: "yyyy-mm-dd",
    autoclose: true
});  
}

if (a==2){
 $('#end_date').hide();
 $('#end_date').attr('required',false);
 $('#selecttime').css('display','block');
  $('#multi_attdiv').css('display','block');
}
else if(a==1){
$('#end_date').show()
 $('#end_date').attr('required',true);
 $("#fromtime").removeAttr('required');
$("#totime").removeAttr('required');
 $('#selecttime').css('display','none');
  $('#multi_attdiv').css('display','none');
}


});

$('#halfday').click(function () {
    $("#halfdaydiv").toggle(this.checked);
});

function leavetypefun(ltype){
if(ltype==1){
$('#leave_type').find('option').remove();
$('#leave_type').append('<option value="CL" selected>Casual leave</option>');
$('#leave_type').append('<option value="SL">Sick leave</option>');
// $('#leave_type').append('<option value="LWP">Leave without pay</option>');
// $('#leave_type').append('<option value="EL">Earned leave</option>');   
document.getElementById("reason").placeholder="Leave reason"; 
var emp = document.getElementById("selecttime");
emp.style.display = ltype != 1 ? "block" : "none";
$('#per_status').val('');             
}
else if(ltype==2){
$('#leave_type').find('option').remove();
$('#leave_type').append('<option value="1" >Tour</option>');
$('#leave_type').append('<option value="2" selected>On-Duty</option>');
document.getElementById("reason").placeholder="Attendance reason";
var emp = document.getElementById("selecttime");
$('#selecttime').css('display','block');
$('#start_date').datepicker('remove');
$('#start_date').datepicker({startDate: today,
    format: "yyyy-mm-dd",
    autoclose: true
}); 
$('#per_status').val('');

}
else if(ltype==3){
$('#leave_type').find('option').remove();
$('#leave_type').append('<option value="Permission" selected>Permission</option>');  
document.getElementById("reason").placeholder="Permission Reason"; 
var emp = document.getElementById("selecttime");
emp.style.display = ltype != 1 ? "block" : "none";

}
}
</script>
 <script type="text/javascript" src="{{asset('assets/js/jquery.supercal.js')}}"></script>
<script src="{{asset('assets/js/dzscalendar.js')}}"></script>
<script>
			$('.example1').supercal({
				transition: 'carousel-vertical'
			});
		</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#totime').change(function(){
		if ($("#per_status").val()=='yes'){ 
			console.log('applying permission');
			
		}else{
			console.log('Applying For Attendance');
		}
	});


	
    // $('input[type="radio"]').click(function(){
       //  if($(this).attr("id")=="leave1"){
       //      $("#fromtime").removeAttr('required');
       //      $("#totime").removeAttr('required');
       //      $('#end_date').show()
       //      $("#end_date").attr('required',true);
       // $('#multi_attdiv').css('display','none'); 
       // $("#start_date").attr("placeholder", "Start Date");
       // $('#half').css('display','block'); //displaying halfday checkbox

       //  	$('#fromtime').select2("val", null);   //making default value when the leave typeis changed.
	      //   $('#totime').select2("val", null);   //making default value when the leave typeis changed.
       //  }
        // if($(this).attr("id")=="leave2"){ //attendannce
        // 	 $('#half').css('display','none'); //removing halfday checkbox
        //     $("#fromtime").attr('required', true);
        //     $("#totime").attr('required', true);
        //     $('#end_date').hide();
        //      $("#start_date").attr("placeholder", "Select Date");
        //     $("#end_date").attr('required', false);
        //     $('#multi_attdiv').css('display','block');
        //     	if ($('#leave_type').val == 2){ //on duty
        //     		$('.selecttime').show();
		      //       $("#end_date").attr('required', false);
		      //       $('#end_date').hide();		           
		      //       $('#multi_attdiv').css('display','block');

	       //     }
	       //     else if($('#leave_type').val == 1){ //On tour
		      //      	$("#end_date").attr('required',true);
		      //       $('#end_date').show();
		      //       $("#fromtime").removeAttr('required');
        //     		$("#totime").removeAttr('required');
        //     		$("#start_date").attr("placeholder", "Start Date");

	       //     }
	       //  $('#fromtime').select2("val", null);
	       //  $('#totime').select2("val", null);

        // }
        // if($(this).attr("id")=="leave3"){
        // $('#per_status').val('yes');
        // $('#multi_attdiv').css('display','none'); 
        // $("#start_date").attr("placeholder", "Select Date");
        // $('#end_date').hide()
        // $("#end_date").removeAttr('required',true);
        // $('#half').css('display','none'); 
        // }
        
    // });



});


// $('#tr1').dzscalendar({
// 	start_month: '5' // you can define a custom start month and year
// ,start_year: '2014'
// });

</script>
<script>

    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });


    });

</script>
<!-- <script src="/static/js/select2.js"></script> -->
<script type="text/javascript">
	$(document).ready(function(){
		// if($("input[name=halfday]:checked"))
		// {
		// 	alert($(this).val());
		// }
		$("input[name=halfday]").click(function(){
			alert($(this).val());
			if($(this).val()=="1"){
				$("#chbx_label_e").html("1st Half of "+ $("#end_date").val());
				$("#chbx_label_s").html("2nd Half of "+ $("#start_date").val());
			}
		// {
		// 	alert($(this).val());
		// }
		})
	});
</script>

@endsection