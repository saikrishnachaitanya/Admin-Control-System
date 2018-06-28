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
                    <h4 class="fontcolor">Add Holiday</h4>
                           
                </div>
                <div class="ibox-content">
                    <form action="holiday_insert" method="post" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <div class="form-group">
                                        <label>Date </label>
                                        <input class="form-control dob" id="holiday_date" name="holiday_date" type="text" placeholder="Enter Holiday Date " required>
                                    </div> 
                                    <div class="form-group">
                                        <label>Name </label>
                                        <input class="form-control" id="holiday_name" name="holiday_name" type="text" placeholder="Enter Holiday Name " required>
                                    </div> 
                                    <div class="form-group">
                                        <label>Type </label>
                                        <input class="form-control" id="holiday_type" name="holiday_type" type="text" placeholder="Enter Holiday Type">
                                    </div> 
                                    <div><br/>
                          <button class="btn btn-success" id="" name="">Add</button>
                          <a href = "{{url('create_holiday')}}" class="btn btn-primary" id="" name="">Clear</a>
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
      $(document).ready(function(){
      $('.dob').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true
      });
      });
  </script>
@endsection

