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
        <h1> Record Deleted Successfully </h1>

        
        </div>
        </div><br><br>
       <a href="{{ url('quotation_report') }}"><button class="btn btn-primary" id="" name="">Back</button></a>
</div>

@endsection
