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
        <h1> Congrats! Leave Apply Successfully </h1>

        
        </div>
        <a href="{{ url('apply_leave') }}" class="btn btn-primary" style="margin-left:40px">Back</a>	
</div>

@endsection
