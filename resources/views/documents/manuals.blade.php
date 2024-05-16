@extends('documents.layout')
@section('content')
<div class="container">
<br><br><br>
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <!-- <div class="card-header" style="text-align: center;"> -->
                <div class="alert alert-dark text-center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px; background-color: #0693e3; color: #ffffff;">
                    <h2>Manuals</h2>
                </div>
                <div class="alert alert-light text-center">
                    <form action="{{ route('documents.manuals') }}" method="GET" class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search" name="search">   <!-- WHERE WE LEFT --->
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="card-body" style="height: 100vh; overflow-y: auto;">
                    <a href="#" class="btn btn-success btn-sm" title="Add New Document" data-bs-toggle="modal" data-bs-target="#docCreateModal" style="background-color: #45b3e0; border-color: #45b3e0; color: black;"><i class="fa fa-plus"></i>Add New</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" style="white-space: wrap;">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Document Reference Code</th>
                                    <th>Document Title</th>
                                    <th>Revision Number</th>
                                    <th>Effectivity Date</th>
                                    <!-- <th>Process Owner</th> -->
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $item)
                                    <!-- @if(in_array($item->doc_type, ['Quality Manual', 'Operations Manual', 'Procedure Manual'])) -->
                                    <tr>
                                            <!-- <td>{{ $loop->iteration }}</td> -->
                                            <td>{{ $item->doc_ref_code }}</td>
                                            <td>{{ $item->doc_title }}</td>
                                            <td style="text-align: center;">{{ $item->revision_num }}</td>
                                            <td style="text-align: center;">{{ $item->division }}</td>
                                            <td>{{ $item->process_owner }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td style="white-space: nowrap;">
                                                <a href="javascript:void(0)" id="show-document" data-url="{{ route('documents.show', $item->id) }}" title="View Document" class="btn btn-info btn-sm" style="background-color: #a881af; border-color: #a881af;"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                <a href="{{ route('document.download', $item->file) }}" title="Download Document" class="btn btn-info btn-sm" style="background-color: #ffd450; border-color: #ffd450;" onclick="return confirm('This document is a protected copy. Click ok to download.');">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                </a>


                                                <!-- <a href="{{ route('document.download', $item->file) }}" title="Download Document" class="btn btn-info btn-sm" style="background-color: #ffd450; border-color: #ffd450;"><i class="fa fa-download" aria-hidden="true"></i></a> -->
                                                <button type="button" id="edit-document" value="{{ $item->id }}" title="Edit Document" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <form method="POST" action="{{ url('/document' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Document" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <!-- @endif -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>   
                        <!-- {{ $documents->appends(['search' => request()->query('search')])->links() }} -->
                    </div>
                    </div>
                    <div class="card-footer">{{ $documents->appends(['search' => request()->query('search')])->links() }}</div>
            </div>
        </div>
    </div>
</div>
<br>
@include('documents.modal-view')
@include('documents.modal-create')
@include('documents.modal-edit')
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '#show-document', function() {
            var docURL = $(this).data('url');
            $.get(docURL, function(data) {
                $('#docShowModal').modal('show');
                $('#doc-ref-code').text(data.doc_ref_code);
                $('#doc-title').text(data.doc_title);
                $('#status').text(data.status);
                $('#document-iframe').attr('src', "{{ asset('storage/documents/') }}/" + data.file);
                $('#division').text(data.division);
                // $('#dmt-incharged').text(data.dmt_incharged);
                $('#process-owner').text(data.process_owner);
                $('#doc-type').text(data.doc_type);
                $('#req-reason').text(data.request_reason);
                $('#req-type').text(data.request_type);
                $('#requester').text(data.requester);
                $('#req-date').text(data.request_date);
                $('#rev-num').text(data.revision_num);
                $('#effic-date').text(data.efficitivity_date);
                $('#filename').text(data.file);
                $('#created-at').text(data.created_at);
            })
        });

        $('body').on('click', '#edit-document', function() {
            var doc_id = $(this).val();
            
            //alert(doc_id);
            $('#docEditModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/edit-document/" + doc_id,
                // data: "data",
                // dataType: "dataTypes",
                success: function(response) {
                    console.log(response);
                    $('#docEditModal #doc_id').val(response.document.id);
                    $('#docEditModal #doc_ref_code').val(response.document.doc_ref_code);
                    $('#docEditModal #doc_title').val(response.document.doc_title);
                    $('#docEditModal #division').val(response.document.division);
                    $('#docEditModal #process_owner').val(response.document.process_owner);
                    $('#docEditModal #status').val(response.document.status);
                    $('#docEditModal #doc_type').val(response.document.doc_type);
                    $('#docEditModal #request_type').val(response.document.request_type);
                    $('#docEditModal #request_reason').val(response.document.request_reason);
                    $('#docEditModal #requester').val(response.document.requester);
                    $('#docEditModal #request_date').val(response.document.request_date);
                    $('#docEditModal #revision_num').val(response.document.revision_num);
                    $('#docEditModal #effectivity_date').val(response.document.effectivity_date);
                }

            });
        });

    });
</script>
@endsection