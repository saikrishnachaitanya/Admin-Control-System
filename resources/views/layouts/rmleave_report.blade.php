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
    <div>
            <div class="row">
                <div class="col-lg-12">

                  <div class="ibox float-e-margins">
                              <div class="ibox-title">
                              <h4 class="fontcolor">Rm Leave Reports</h4>   
                              </div>
                             <div class="ibox-content">
                             <div class="table-responsive">
                                 <table class="table table-striped table-bordered table-hover dataTables-example">
                                 <thead>
                                 <tr>
                                    <th>Emp ID</th>
                                    <th>Employee Name</th>
                                
                                    <th>Details</th>
                                 </tr>
                                 </thead>
                                    <tbody>
                                    @foreach($leaves as $key => $leave)
                                    <tr class="gradeX">
                                    <td>{{ $leave->emp_id }}</td>
                                    <td>{{ $leave->emp_name }}</td>
                                    <td class="center"><a href="{{ url('leave_get_detail') }}/{{ $leave->emp_id }}" class="btn btn-primary">View</a></td>
                                    </tr> 
                                    @endforeach
                                    </tfoot>
                                 </table>
                            </div>

               
                      </div>
               </div>
           </div>
   </div> 
@endsection

