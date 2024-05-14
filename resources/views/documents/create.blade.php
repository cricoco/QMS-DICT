@extends('documents.layout')
@section('content')
 <br><br> 
<div class="card" style="margin:20px;">
</br>
  <div class="card-header">Create New Documents</div>
  <div class="card-body" style="height: 100vh; overflow-y: auto;">
       
      <form action="{{ url('document') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
        <div class="col-md-2">
          <label>Doc Ref. Code *</label><br>
          <input type="text" name="doc_ref_code" id="doc_ref_code" class="form-control"></br>
        </div>
        <div class="col-md-6">
          <label>Document Title *</label><br>
          <input type="text" name="doc_title" id="doc_title" class="form-control"></br>
        </div>
        <!-- <div class="col-md-2">
          <label>DMT Incharged *</label><br>
          <input type="text" name="dmt_incharged" id="dmt_incharged" class="form-control"></br>
        </div> -->
        <div class="col-md-2">
          <label>Division *</label><br>
          <select name="division" id="division" class="form-control"></br>
            <option value="N/A">N/A</option>
            <option value="AFD">AFD</option>
            <option value="ORD">ORD</option>
            <option value="TOD">TOD</option>
        </select>
        </div>
        <div class="col-md-2">
          <label>Process Owner *</label><br>
          <input type="text" name="process_owner" id="process_owner" class="form-control"></br>
        </div><br>
        <div class="col-md-2">
          <label>Status *</label><br>
          <input type="text" name="status" id="status" class="form-control"></br>
        </div>
        <div class="col-md-4">
          <label>Document Type *</label><br>
          <select name="doc_type" id="doc_type" class="form-control"></br>
            <option value="Quality Manual">Quality Manual</option>
            <option value="Quality Procedure">Quality Procedure</option>
            <option value="Quality Procedure Form">Quality Procedure Form</option>
            <option value="Quality Policy">Quality Policy</option>
            <option value="Operations Manual">Operations Manual</option>
            <option value="Procedure Manual">Procedure Manual</option>
            <option value="Special Order">Special Order</option>
            <option value="Travel Order">Travel Order</option>
            <option value="Memorandum">Memorandum</option>
            <option value="Corrective Action Request Form">Corrective Action Request Form</option>
            <option value="Form/Template">Form/Template</option>
            <option value="Resolution">Resolution</option>
          </select>
        </div>
        <div class="col-md-2">
          <label>Request Type *</label><br>
          <input type="text" name="request_type" id="request_type" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Request Reason *</label><br>
          <input type="text" name="request_reason" id="request_reason" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Requester *</label><br>
          <input type="text" name="requester" id="requester" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Request Date *</label><br>
          <input type="date" name="request_date" id="request_date" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Revision Number *</label><br>
          <input type="text" name="revision_num" id="revision_num" class="form-control"></br>
        </div>
        <div class="col-md-2">
          <label>Effectivity Date *</label><br>
          <input type="date" name="effectivity_date" id="effectivity_date" class="form-control"></br>
        </div>
        <div class="col-md-4">
          <label>File *</label><br>
          <input type="file" name="file" id="file" class="form-control"></br>
        </div>
        </div>
        <input type="submit" value="Save" class="btn btn-success">
      </form>
      <button class="btn btn-secondary" style="background-color: #dc3545; border-color: #dc3545; margin-top: 10px;" onclick="history.back()">Abort</button>
  </div>
  
      
</div>   



@stop
