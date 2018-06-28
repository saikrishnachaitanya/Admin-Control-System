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
                    <h4 class="fontcolor">Holiday Detail</h4>
                            <!-- <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                
                            </div> -->
                </div>
                <div class="ibox-content">
                
                    <div class="row">
                    	<div class="col-md-12">
                        
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Date of Holiday:</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $holiday->holiday_date }}
                    			</div>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    		<div class="col-md-12">
                    			<div class="col-md-6">
                    				<label class="labelcolor">Name of Holiday:</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $holiday->holiday_name }}
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
                    				<label class="labelcolor">Type of Holiday:</label>
                    			</div>
                    			<div class="col-md-6">
                    				{{ $holiday->holiday_type }}
                    			</div>
                    		</div>
                    		</div>
                    	   
                        </div>
                    </div>
                   
                </div><br/>
                <a href="{{ url('holiday_report') }}" class="btn btn-primary" style="margin-left:40px">Back</a> 
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