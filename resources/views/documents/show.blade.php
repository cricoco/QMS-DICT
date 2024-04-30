@extends('documents.layout')
@section('content')
  
<div class="card" style="margin:20px;">
<a href="{{ route('documents.index') }}" class="btn btn-secondary">Back</a>
  <div class="card-header">Documents Page</div>
  
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $documents->name }}</h5>
        <p class="card-text">Address : {{ $documents->address }}</p>
        <p class="card-text">Mobile : {{ $documents->mobile }}</p>
        <p class="card-text">File : {{ $documents->file }}</p>
        <iframe height="900" width="900" src="{{ public_path('storage/documents/' . $documents->file) }}"></iframe>
  </div>
  <a href="{{ route('documents.index') }}" class="btn btn-secondary">Back</a>        
    </hr>
  </div>
</div>