@extends('publicdocuments.layout')
@section('publiccontent')
  
<div class="card" style="margin:20px;">
</br>
  <div class="card-header">Create New Documents</div>
  <div class="card-body" style="height: 100vh; overflow-y: auto;">
       
      <form action="{{ url('document') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Doc Ref. Code</label></br>
        <input type="text" name="doc_ref_code" id="doc_ref_code" class="form-control"></br>
        <label>Document Title</label></br>
        <input type="text" name="doc_title" id="doc_title" class="form-control"></br>
        <label>DMT Incharged</label></br>
        <input type="text" name="dmt_incharged" id="dmt_incharged" class="form-control"></br>
        <label>Division</label><br>
        <select name="division" id="division" class="form-control">
            <option value="N/A">N/A</option>
            <option value="AFD">AFD</option>
            <option value="ORD">ORD</option>
            <option value="TOD">TOD</option>
        </select><br>
        <label>Process Owner</label></br>
        <input type="text" name="process_owner" id="process_owner" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control"></br>
        <label>Document Type</label></br>
        <select name="doc_type" id="doc_type" class="form-control">
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
        </select><br>
        <label>Request Type</label></br>
        <input type="text" name="request_type" id="request_type" class="form-control"></br>
        <label>Request Reason</label></br>
        <input type="text" name="request_reason" id="request_reason" class="form-control"></br>
        <label>Requester</label></br>
        <input type="text" name="requester" id="requester" class="form-control"></br>
        <label>Request Date</label></br>
        <input type="date" name="request_date" id="request_date" class="form-control"></br>
        <label>Revision Number</label></br>
        <input type="text" name="revision_num" id="revision_num" class="form-control"></br>
        <label>Effectivity Date</label></br>
        <input type="date" name="effectivity_date" id="effectivity_date" class="form-control"></br>
        <label>File</label></br>
        <input type="file" name="file" id="file" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <!-- <a href="{{ route('documents.index') }}" class="btn btn-secondary">Abort</a> -->
    </form>
    <button class="btn btn-secondary" style="background-color: #dc3545; border-color: #dc3545;" onclick="history.back()">Abort</button>
    
  </div>
</div>

@stop
