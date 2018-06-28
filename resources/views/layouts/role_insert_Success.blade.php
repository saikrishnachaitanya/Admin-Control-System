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
        <h1> Role Inserted Successfully </h1>

        </div><br/><br/>
        <a href="{{ url('assign_role') }}" class="btn btn-primary" id="" name="" style="margin-left:40px">Back</a> 
        </div>

@endsection
