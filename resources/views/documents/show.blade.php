@extends('documents.layout')
@section('content')
<div class="card" style="margin:20px;">
</br></br></br>
<!-- <a href="{{ route('documents.index') }}" class="btn btn-secondary">Back</a> -->
<button class="btn btn-secondary" onclick="history.back()">Back</button>
  <div class="card-header">Documents Page</div>
  
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Doc Ref. Code : {{ $documents->doc_ref_code }}</h5>
        <p class="card-text">Document Title : {{ $documents->doc_title }}</p>
        <p class="card-text">DMT Incharged : {{ $documents->dmt_incharged }}</p>
        <p class="card-text">Division : {{ $documents->division }}</p>
        <p class="card-text">Process Owner : {{ $documents->process_owner }}</p>
        <p class="card-text">Status : {{ $documents->status }}</p>
        <p class="card-text">Document Type : {{ $documents->doc_type }}</p>
        <p class="card-text">Request Type : {{ $documents->request_type }}</p>
        <p class="card-text">Request Reason : {{ $documents->request_reason }}</p>
        <p class="card-text">Requester : {{ $documents->requester }}</p>
        <p class="card-text">Request Date  : {{ $documents->request_date }}</p>
        <p class="card-text">Revision Number : {{ $documents->revision_num }}</p>
        <p class="card-text">Effectivity Date : {{ $documents->effectivity_date }}</p>
        <p class="card-text">File : {{ $documents->file }}</p>
        <p class="card-text">Created at : {{ $documents->created_at }}</p>
        <p class="card-text">Updated at : {{ $documents->updated_at }}</p>
        <iframe width="900" height="900" src="{{ asset('storage/documents/' . $documents->file) }}"></iframe>

  </div>
  <!-- <a href="{{ route('documents.index') }}" class="btn btn-secondary">Back</a>         -->
  <button class="btn btn-secondary" onclick="history.back()">Back</button>
    </hr>
  </div>
</div>