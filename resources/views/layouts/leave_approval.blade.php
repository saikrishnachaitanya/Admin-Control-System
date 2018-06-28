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
                     <h4 class="fontcolor">Leave Approvals</h4>
                        <!-- <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div> -->
                    </div>
                    <div class="ibox-content">
                    <span id="leave_msg"></span>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Type</th>
                            <th>Leave Reason</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Leave Days</th>
                            <th>Half Days</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($leave as $key => $leaves)
                    <tr class="gradeX">
                        <td> {{ $leaves->id}} </td>
                          <td>{{ $leaves->emp_id }}</td>
                            <td>{{ $leaves->emp_name }}</td>
                            <td>{{ $leaves->leave_type }}</td>
                            <td>{{ $leaves->reason }}</td>
                            <td>{{ $leaves->start_date }}</td>
                            <td>{{ $leaves->end_date }}</td>
                            <td>{{ $leaves->no_of_leave_days }}</td>
                            <td>{{ $leaves->halfday }}</td>

                            @if($leaves->status=='WAITING FOR APPROVAL' )
                            
                            <td style="padding:15px 5px 0px 5px;">
                                <button class="btn btn-success btn-xs approve" style="background-color:#4CAF50;border:1px solid #4CAF50;" data-placement="top"   data-toggle="modal" data-target="#approveModal{{ $leaves->id}}"><i class="fa fa-check" aria-hidden="true" ></i></button>
                                <button class="btn btn-danger btn-xs reject" style="float: right;" data-placement="top" id="reject" data-toggle="modal" data-target="#rejectModal{{ $leaves->id}}"><i class="fa fa-times" aria-hidden="true"></i></button>   
                            </td>
                            @elseif($leaves->status=='REJECTED' )
                            <td style="padding:15px 5px 0px 5px;">
                                <button class="btn btn-success btn-xs approve" style="background-color:#4CAF50;border:1px solid #4CAF50;" data-placement="top"   data-toggle="modal" data-target="#approveModal{{ $leaves->id}}"><i class="fa fa-check" aria-hidden="true" ></i></button>
                                <button class="btn btn-danger btn-xs reject" style="float: right;" data-placement="top" id="reject" data-toggle="modal" data-target="#rejectModal{{ $leaves->id}}" disabled><i class="fa fa-times" aria-hidden="true"></i></button>   
                            </td>
                            @else
                            <td style="padding:15px 5px 0px 5px;">
                                <button class="btn btn-success btn-xs approve" style="background-color:#4CAF50;border:1px solid #4CAF50;" data-placement="top"   data-toggle="modal" data-target="#approveModal{{ $leaves->id}}" disabled><i class="fa fa-check" aria-hidden="true" ></i></button>
                                <button class="btn btn-danger btn-xs reject" style="float: right;" data-placement="top" id="reject" data-toggle="modal" data-target="#rejectModal{{ $leaves->id}}" ><i class="fa fa-times" aria-hidden="true"></i></button>   
                            </td>
                            @endif

                            
                    </tr>
                     <!-- Modal -->
                          <div class="modal fade" id="approveModal{{ $leaves->id}}" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Aprove Leave</h4>
                                </div>
                                <div class="modal-body">
                                  <h4><strong>Are You Sure To Approve Leave?</strong></h4>
                                </div>
                                <div class="modal-footer">
                                  <a class="btn btn-primary" href="{{ url('leave_approve') }}/{{ $leaves->id }}">Aprove</a>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade" id="rejectModal{{ $leaves->id}}" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Reject Leave</h4>
                                </div>
                                <div class="modal-body">
                                  <h4><strong>Are You Sure To Reject Leave?</strong></h4>
                                </div>
                                <div class="modal-footer">
                                  <a class="btn btn-primary" href="{{ url('leave_reject') }}/{{ $leaves->id }}">Reject</a>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> 
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
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
   <!--  <script type="text/javascript">
$(document).ready(function(){

$('.approve').on('click', function (e, confirmed) {
   if (!confirmed) {
        e.preventDefault();
        bootbox.confirm("Are you sure you want to approve the leave as you cannot cancel the leave once approved?",function (response) {
            if (response) {
                $('.approve').trigger('click', true);
                $('#leave_msg').html('Leave of '+$(this).attr(id)+' Is Approved Sucessfully');
            }
        });
    }

  });


// $('#discuss').on('click', function (e, confirmed) {
//    if (!confirmed) {
//         e.preventDefault();
//         bootbox.confirm("Are you sure you want to discuss with Employee regarding this leave Employee?", function (response) {
//             if (response) {
//                 $('#discuss').trigger('click', true);
//             }
//         });
//     }

//   });


$('.reject').on('click', function (e, confirmed) {
   if (!confirmed) {
        e.preventDefault();
        bootbox.confirm("Are you sure you want to reject the leave?", function (response) {
            if (response) {
                $('.reject').trigger('click', true);
                $('#leave_msg').html('Leave of '+$(this).attr(id)+' Is Rejected Sucessfully');
            }
        });
    }

  });


 });

    </script> -->

@endsection