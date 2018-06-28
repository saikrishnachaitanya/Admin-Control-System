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
th,td{
    text-align:center;
}
</style>

	       
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                     <h4 class="fontcolor">Leave Detail</h4>
                        
                    </div>
                     <table class="table table-bordered table-hover">
                      <tr class="active text-center">
                        <th class="text-center">Type</th>
                        <th>Quota</th>
                        <th>Used</th>
                        <th>Balance</th>
                        
                      </tr>
                     @foreach($leavesDetails as $leavesDetail)
                     <tr class="active text-center">
                        <th class="text-center">{{ $leavesDetail['type'] }}</th>
                        <th>{{ $leavesDetail['quota'] }}</th>
                        <th>{{ $leavesDetail['used'] }}</th>
                        <th>{{$leavesDetail['balance']}} </th>
                      </tr>
                      @endforeach
                    </table>

                    <div class="ibox-content">
                    <span id="leave_msg"></span>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Type</th>
                            <th>Leave Reason</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Half Day</th>
                           <th>Leave Days</th>
                            
                            
                        </tr>
                    </thead>
                   <tbody>
                   
                    @foreach($leaves as $leave)
                     <tr> 
                         <td> {{ $leave->emp_id}} </td>
                         <td> {{ $leave->emp_name}} </td>
                         <td> {{ $leave->leave_type}} </td>
                         <td> {{ $leave->reason}} </td>
                         <td> {{ $leave->start_date}} </td>
                         <td> {{ $leave->end_date}} </td>
                         <td> {{ $leave->halfday }} </td>
                         <td> {{ $leave->no_of_leave_days}} </td>
                              
                    </tr>
                     @endforeach
                    </tbody>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            <a href="{{ url('rmleave_report') }}"><button class="btn btn-primary" style="margin-left:40px" id="" name="">Back</button></a>
            </div>            
       

@endsection

@section('myScript')
<!-- <script>
function myFunction() {
    window.print();
}
</script> -->
@endsection