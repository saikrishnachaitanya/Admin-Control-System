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
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                     <h4 class="fontcolor">Leave Report</h4>
                        
                    </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                            <th>Emp ID</th>
                            <th>Type</th>
                            <th>Leave Reason</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($leaves as $leave)
                    <tr class="gradeX">
                        <td>{{ $leave->emp_id }}</td>
                        <td>{{ $leave->leave_type }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>{{ $leave->start_date }}</td>
                        <td>{{ $leave->end_date }}</td>
                        
                        <td class="center">Applied</td>
                    </tr>  
                    
                    @endforeach
                     
                     
                     
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>

@endsection

@section('myScript')
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                bSort: false,
                paging: true,
                // bFilter: true,
                pageLength: 25,
                responsive: true,
                // dom: '<"html5buttons"B>lTfgitp',
                // buttons: [
                //     { extend: 'copy'},
                //     {extend: 'csv'},
                //     {extend: 'excel', title: 'ExampleFile'},
                //     {extend: 'pdf', title: 'ExampleFile'},

                //     {extend: 'print',
                //      customize: function (win){
                //             $(win.document.body).addClass('white-bg');
                //             $(win.document.body).css('font-size', '10px');

                //             $(win.document.body).find('table')
                //                     .addClass('compact')
                //                     .css('font-size', 'inherit');
                //     }
                //     }
                // ]

            });

        });

    </script>

@endsection