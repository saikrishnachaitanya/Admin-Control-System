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
                    <h4 class="fontcolor">Edit Holiday</h4>
                            
                </div>
                <div class="ibox-content">
                    <div class="row">
    					<div class="col-md-12">
     						<form method="POST" action="{{ url('holiday_update') }}" id="off_information" enctype="multipart/form-data" >
                      <input name="id" value = "{{ $holiday->id }}" type="hidden" >
      							<div class="col-md-4 col-md-offset-3">
				                    <div  class="form-group">
				                          <label>Holiday Date</label>
				                          <input class="form-control dob" id="" name="holiday_date" value = "{{ $holiday->holiday_date }}" type="text" >
				                    </div>            
				                    <div  class="form-group">
				                          <label>Holiday Name</label>
				                            <input class="form-control" id="" name="holiday_name" type="text" value = "{{ $holiday->holiday_name }}">
				                    </div> 
				                    <div class="form-group">
				                        <label>Holiday Type</label>
				                            <input class="form-control" id=""  name="holiday_type"  value = "{{ $holiday->holiday_type }}">
				                    </div>
				                    
		                        <a href="{{ url('holiday_update') }}"><button class="btn btn-primary" id="" name="">Update</button></a> 
                            <a href="{{ url('holiday_report') }}" class="btn btn-primary">Back</a>  
                            </div>
            					</form>
      			  
              </div>
    
             </div>
    				</div>
                </div>
            </div>
        

@endsection
@section('myScript')
<script type="text/javascript">
      $(document).ready(function(){
      $('.dob').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true
      });
      });
  </script>

@endsection
