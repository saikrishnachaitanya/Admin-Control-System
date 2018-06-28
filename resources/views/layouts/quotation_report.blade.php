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
                     <h4 class="fontcolor"><u>Quotation Report</u></h4>
                       
                    </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Customer Name</th>
                            <th>Quotation Number</th>
                            <th>Total Price</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($quotations as $key =>$quotation)
                    <tr class="gradeX">
                        <td>{{ $key+1 }}</td>
                        <td> {{ $quotation->name }}</td>
                        <td>{{ $quotation->ref_number}}</td>
                        <td class="center">{{ $quotation->total }}</td>
                        <td class="center"><a href="{{ url('quotation_get_detail') }}/ {{ $quotation->id }}"><button class="btn btn-primary" id="" name="">View</button></a>
                        <a href="{{ url('quotation_edit') }}/ {{ $quotation->id }}"><button class="btn btn-primary" id="" name="">Edit</button></a>
                        <a href="{{ url('quotation_delete') }}/ {{ $quotation->id }}"> <button class="btn btn-primary" id="" name="">Delete</button></a></td>
                
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

@endsection