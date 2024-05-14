@extends('documents.layout')
@section('content')

<br>
<div class="card" style="margin:20px;">
</br>
  <div class="card-header">Edit Document</div>
  <div class="card-body">
       
      <form action="{{ url('document/' .$documents->id) }}" method="post">
        {!! csrf_field() !!}
        

        <div class="row">
        <div class="col-md-2">
          <label>Doc Ref. Code *</label><br>
          <input type="text" name="doc_ref_code" id="doc_ref_code" value="{{$documents->doc_ref_code}}" class="form-control"></br>
        </div>
        <div class="col-md-6">
          <label>Document Title *</label><br>
          <input type="text" name="doc_title" id="doc_title" value="{{$documents->doc_title}}" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Division *</label><br>
          <select type="text" name="division" id="division" class="form-control">
            <option value="N/A" {{ $documents->division == "N/A" ? 'selected' : '' }}>N/A</option>
            <option value="AFD" {{ $documents->division == "AFD" ? 'selected' : '' }}>AFD</option>
            <option value="ORD" {{ $documents->division == "ORD" ? 'selected' : '' }}>ORD</option>
            <option value="TOD" {{ $documents->division == "TOD" ? 'selected' : '' }}>TOD</option>
        </select></br>
        </div>
        <div class="col-md-2">
          <label>Process Owner *</label><br>
          <input type="text" name="process_owner" id="process_owner" value="{{$documents->process_owner}}" class="form-control"></br>
        </div><br>
        <div class="col-md-2">
          <label>Status *</label><br>
          <input type="text" name="status" id="status" value="{{$documents->status}}" class="form-control"></br>
        </div>
        <div class="col-md-4">
          <label>Document Type *</label><br>
          <select type="text" name="doc_type" id="doc_type" class="form-control">
        <option value="Quality Manual" {{ $documents->doc_type == "Quality Manual" ? 'selected' : '' }}>Quality Manual</option>
            <option value="Quality Procedure" {{ $documents->doc_type == "Quality Procedure" ? 'selected' : '' }}>Quality Procedure</option>
            <option value="Quality Procedure Form" {{ $documents->doc_type == "Quality Procedure Form" ? 'selected' : '' }}>Quality Procedure Form</option>
            <option value="Quality Policy" {{ $documents->doc_type == "Quality Policy" ? 'selected' : '' }}>Quality Policy</option>
            <option value="Operations Manual" {{ $documents->doc_type == "Operations Manual" ? 'selected' : '' }}>Operations Manual</option>
            <option value="Procedure Manual" {{ $documents->doc_type == "Procedure Manual" ? 'selected' : '' }}>Procedure Manual</option>
            <option value="Special Order" {{ $documents->doc_type == "Special Order" ? 'selected' : '' }}>Special Order</option>
            <option value="Travel Order" {{ $documents->doc_type == "Travel Order" ? 'selected' : '' }}>Travel Order</option>
            <option value="Memorandum" {{ $documents->doc_type == "Memorandum" ? 'selected' : '' }}>Memorandum</option>
            <option value="Corrective Action Request Form" {{ $documents->doc_type == "Corrective Action Request Form" ? 'selected' : '' }}>Corrective Action Request Form</option>
            <option value="Form/Template" {{ $documents->doc_type == "Form/Template" ? 'selected' : '' }}>Form/Template</option>
            <option value="Resolution" {{ $documents->doc_type == "Resolution" ? 'selected' : '' }}>Resolution</option>
        </select></br>
        </div>
        <div class="col-md-2">
          <label>Request Type *</label><br>
          <input type="text" name="request_type" id="request_type" value="{{$documents->request_type}}" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Request Reason *</label><br>
          <input type="text" name="request_reason" id="request_reason" value="{{$documents->request_reason}}" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Requester *</label><br>
          <input type="text" name="requester" id="requester" value="{{$documents->requester}}" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Request Date *</label><br>
          <input type="date" name="request_date" id="request_date" value="{{$documents->request_date}}" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Revision Number *</label><br>
          <input type="text" name="revision_num" id="revision_num" value="{{$documents->revision_num}}" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Effectivity Date *</label><br>
          <input type="date" name="effectivity_date" id="effectivity_date" value="{{$documents->effectivity_date}}" class="form-control"></br>
        </div>

        </div>
        <input type="submit" value="Update" class="btn btn-success">
      </form>
      <a href="{{ route('documents.index') }}" class="btn btn-secondary" style="background-color: #dc3545; border-color: #dc3545; margin-top: 10px;">Abort</a>
      
  </div>
  
      
</div>   

@stop


