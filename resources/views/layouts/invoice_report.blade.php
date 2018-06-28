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
                     <h4 class="fontcolor"><u>Invoice Report</u></h4>
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

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                            <th>S.No</th>
                            <th>Tin Number</th>
                            <th>Invoice Number</th>
                            <th>Invoice Date</th>
                            <th>Item Description</th>
                            <th>Total Price</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $key =>$invoice)
                    <tr class="gradeX">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $invoice->tin_number }}</td>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td>{{ $invoice->product_description }}</td>
                        <td class="center">{{ $invoice->amount }}</td>
                        <td class="center"><a href="{{ url('invoice_detail_get') }}/ {{ $invoice->id }}"><button class="btn btn-primary" id="" name="">View</button></a>
                        <a href="{{ url('invoice_edit') }}/ {{ $invoice->id }}"><button class="btn btn-primary" id="" name="">Edit</button></a>
                        
                       <a href="{{ url('invoice_detail_delete') }}/ {{ $invoice->id }}"><button class="btn btn-primary" id="" name="">Delete</button></a></td>

                        
                       

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