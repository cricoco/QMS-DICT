@extends('documents.layout')
@section('content')
  
<div class="card" style="margin:20px;">
</br>
  <div class="card-header">Edit Document</div>
  <div class="card-body">
       
      <form action="{{ url('document/' .$documents->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$documents->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$documents->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$documents->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$documents->mobile}}" class="form-control"></br>
        <label>File</label></br>
        <!-- <input type="file" name="file" id="file" value="{{$documents->file}}" class="form-control"></br> -->
        <label>Current File</label><br>
        <p>{{ $documents->file }}</p><br>
        <label>Replace with (if any)</label><br>
        <input type="file" name="file" id="file" value="{{$documents->file}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        <a href="{{ route('documents.index') }}" class="btn btn-secondary">Abort</a>
    </form>
    
  </div>
</div>
  
@stop