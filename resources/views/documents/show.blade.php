@extends('documents.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Documents Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $documents->name }}</h5>
        <p class="card-text">Address : {{ $documents->address }}</p>
        <p class="card-text">Mobile : {{ $documents->mobile }}</p>
        <p class="card-text">File : {{ $documents->file }}</p>
  </div>
    </hr>
  </div>
</div>