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
        <h1> Record Update Successfully </h1>  
        </div>
        <div>
        <a href="{{ url('invoice_report') }}" class="btn btn-primary" style="margin-left:40px">Back</a>	
        </div>
</div>

@endsection