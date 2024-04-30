@extends('documents.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Documents</div>
  <div class="card-body">
       
      <form action="{{ url('document') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>
        <label>File</label></br>
        <input type="file" name="file" id="file" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop
