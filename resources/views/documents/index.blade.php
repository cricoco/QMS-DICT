@extends('documents.layout')
@section('content')
    <style>
        th a {
            text-decoration: none;
            color: inherit;
        }

        th i.fa {
            margin-left: 5px;
        }
    </style>
    <div class="container">
        <br><br><br>
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    @if (session()->has('flash_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Success !</strong> {{ session('flash_message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Error!</strong> Please fix the following issues:
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('warning_message'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Warning!</strong> {{ session('warning_message') }}
                        </div>
                    @endif
                    <div class="alert alert-dark text-center"
                        style="margin-left: 20px; margin-right: 20px; margin-top: 20px; background-color: #0693e3; color: #ffffff;">
                        <h2>Document Masterlist</h2>
                    </div>
                    <div class="alert alert-light text-center">
                        <form action="{{ route('documents.index') }}" method="GET" class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Search" name="search">
                            <select name="type" class="form-select"
                                style="width: auto; min-width: 120px; margin-right: 5px;">
                                <option value="">All Types</option>
                                <option value="Internal" {{ request('type') == 'Internal' ? 'selected' : '' }}>Internal
                                </option>
                                <option value="External" {{ request('type') === 'External' ? 'selected' : '' }}>External
                                </option>
                            </select>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>

                        </form>
                    </div>
                    <div
                        style="display: flex; align-items: center; justify-content: space-between; margin-right: 20px; margin-left: 20px;">
                        <div>
                            <strong>IMPORTANT:</strong> Only the softcopy of documents available on the QMS portal is
                            considered the <strong>CONTROLLED COPY.</strong><br>
                            <span style="margin-left: 103px; display: block;">Any downloaded or printed copies of documents
                                are deemed <strong>UNCONTROLLED</strong>.</span>
                        </div>

                    </div>
                    <br>
                    <div class="card-body" style="height: 100vh; overflow-y: auto;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdzaeknsFlg6QE1HLExjnBSVr6ffPINNVuTzkgOpMz681Y2kQ/viewform"
                                target='blank" class="btn btn-success btn-sm" title="Add New Document" data-bs-toggle="modal"
                                style="background-color: #a141ca; border-color: #a141ca; color: black;">
                                <i class="fa fa-plus"></i> Submit New/Revision
                            </a>
                            <a href="#" class="btn btn-success btn-sm" title="Add New Document" data-bs-toggle="modal"
                                data-bs-target="#docCreateModal"
                                style="background-color: #45b3e0; border-color: #45b3e0; color: black;">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                            <a href="#" class="btn btn-success btn-sm" title="Add Document via CSV"
                                data-bs-toggle="modal" data-bs-target="#csvCreateModal"
                                style="background-color: #0fa65a; border-color: #45b3e0; color: black;">
                                <i class="fa fa-plus"></i> Add Document via CSV
                            </a>

                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: wrap;">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="{{ route('documents.index', array_merge(request()->query(), ['sort_by' => 'doc_ref_code', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}"
                                                style="text-decoration: none; color: inherit;">
                                                Document Reference Code
                                                @if (request('sort_by') == 'doc_ref_code')
@if (request('sort_dir') == 'asc')
<i class="fa fa-sort-up"></i>
@else
<i class="fa fa-sort-down"></i>
@endif
@else
<i class="fa fa-sort"></i>
@endif
                                            </a>
                                        </th>
                                        <th>
                                            <a href="{{ route('documents.index', array_merge(request()->query(), ['sort_by' => 'doc_title', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}"
                                                style="text-decoration: none; color: inherit;">
                                                Document Title
                                                @if (request('sort_by') == 'doc_title')
@if (request('sort_dir') == 'asc')
<i class="fa fa-sort-up"></i>
@else
<i class="fa fa-sort-down"></i>
@endif
@else
<i class="fa fa-sort"></i>
@endif
                                            </a>
                                        </th>
                                        <th style="text-align: center;">
                                            <a href="{{ route('documents.index', array_merge(request()->query(), ['sort_by' => 'revision_num', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}"
                                                style="text-decoration: none; color: inherit;">
                                                Revision Number
                                                @if (request('sort_by') == 'revision_num')
@if (request('sort_dir') == 'asc')
<i class="fa fa-sort-up"></i>
@else
<i class="fa fa-sort-down"></i>
@endif
@else
<i class="fa fa-sort"></i>
@endif
                                            </a>
                                        </th>
                                        <th style="text-align: center;">
                                            <a href="{{ route('documents.index', array_merge(request()->query(), ['sort_by' => 'effectivity_date', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}"
                                                style="text-decoration: none; color: inherit;">
                                                Effectivity Date
                                                @if (request('sort_by') == 'effectivity_date')
@if (request('sort_dir') == 'asc')
<i class="fa fa-sort-up"></i>
@else
<i class="fa fa-sort-down"></i>
@endif
@else
<i class="fa fa-sort"></i>
@endif
                                            </a>
                                        </th>
                                        <th>Owner</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $item)
<tr>
                                            <td>{{ $item->doc_ref_code }}</td>
                                            <td>{{ $item->doc_title }}</td>
                                            <td style="text-align: center;">{{ $item->revision_num }}</td>
                                            <td style="text-align: center;">{{ $item->effectivity_date }}</td>
                                            <td>{{ $item->process_owner }}</td>
                                            <td>{{ $item->type_intext }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td style="white-space: nowrap;">
                                                <a href="javascript:void(0)" id="show-document"
                                                    data-url="{{ route('documents.show', $item->id) }}"
                                                    title="View Document" class="btn btn-info btn-sm"
                                                    style="background-color: #a881af; border-color: #a881af;"><i
                                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                                <a href="{{ route('document.download', $item->file) }}"
                                                    title="Download Document" class="btn btn-info btn-sm"
                                                    style="background-color: #ffd450; border-color: #ffd450;"
                                                    onclick="return confirm('You
                                are about to download an uncontrolled copy. Do you want to proceed?');">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>



                            <button type="button" id="edit-document" value="{{ $item->id }}" title="Edit Document"
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></button>

                            <form method="POST" action="{{ url('/document' . '/' . $item->id) }}" accept-charset="UTF-8"
                                style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Document"
                                    onclick="return confirm('Are you sure you want to archive this document?')"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                <!-- Delete -->
                            </form>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="card-footer">{{ $documents->appends(['search' => request()->query('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    @include('documents.modal-view')
    @include('documents.modal-create')
    @include('documents.modal-create-csv')
    @include('documents.modal-edit')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            // AJAX setup for CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // View History Button
            $('body').on('click', '#view-history', function() {
                var docID = $(this).val();
                window.open("/document/history/" + docID, '_blank');
            });

            // Edit Document Button
            $('body').on('click', '#edit-document', function() {
                var doc_id = $(this).val();
                $('#docEditModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/edit-document/" + doc_id,
                    success: function(response) {
                        $('#docEditModal #doc_id').val(response.document.id);
                        $('#docEditModal #doc_ref_code').val(response.document.doc_ref_code);
                        $('#docEditModal #doc_title').val(response.document.doc_title);
                        $('#docEditModal #division').val(response.document.division);
                        $('#docEditModal #process_owner').val(response.document.process_owner);
                        $('#docEditModal #status').val(response.document.status);
                        $('#docEditModal #doc_type').val(response.document.doc_type);
                        $('#docEditModal #request_type').val(response.document.request_type);
                        $('#docEditModal #request_reason').val(response.document
                            .request_reason);
                        $('#docEditModal #request_date').val(response.document.request_date);
                        $('#docEditModal #revision_num').val(response.document.revision_num);
                        $('#docEditModal #effectivity_date').val(response.document
                            .effectivity_date);
                        $('#docEditModal #type_intext').val(response.document.type_intext);
                        $('#docEditModal #unit').val(response.document.unit);
                    }
                });
            });

            // Delete Document Button
            $('body').on('click', '#delete-document', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                if (confirm('Are you sure you want to archive this document?')) {
                    $.ajax({
                        type: "POST",
                        url: form.attr('action'),
                        data: form.serialize(),
                        success: function(response) {
                            // Handle success response (e.g., close modal, update UI, show message)
                            alert('Document archived successfully!');
                            // Optionally reload the page or remove the document from the list
                            location.reload();
                        },
                        error: function(response) {
                            // Handle error response (e.g., show error message)
                            alert('An error occurred while archiving the document.');
                        }
                    });
                }
            });

            // Download Document Button
            $('body').on('click', '#download-document', function(e) {
                if (!confirm('You are about to download an uncontrolled copy. Do you want to proceed?')) {
                    e.preventDefault();
                }
            });

            // Show Document Modal and Load Document
            $('body').on('click', '#show-document', function() {
                var docURL = $(this).data('url');
                var docID = docURL.substring(docURL.lastIndexOf('/') + 1);

                $.get(docURL, function(data) {
                    $('#docShowModal').modal('show');
                    $('#doc-ref-code').text(data.doc_ref_code);
                    $('#doc-title').text(data.doc_title);
                    $('#status').text(data.status);
                    $('#division').text(data.division);
                    $('#process-owner').text(data.process_owner);
                    $('#doc-type').text(data.doc_type);
                    $('#req-reason').text(data.request_reason);
                    $('#req-type').text(data.request_type);
                    $('#req-date').text(data.request_date);
                    $('#rev-num').text(data.revision_num);
                    $('#effic-date').text(data.effectivity_date);
                    $('#filename').text(data.file);
                    $('#type-intext').text(data.type_intext);
                    $('#unit-text').text(data.unit);

                    $('#view-history').val(docID);
                    var filePath = "{{ asset('storage/documents/') }}/" + data.file;
                    var fileExtension = data.file.split('.').pop().toLowerCase();

                    if (fileExtension === 'pdf') {
                        $('#document-iframe').attr('src', filePath).show();
                        $('#no-preview').hide();
                    } else {
                        $('#document-iframe').hide();
                        $('#no-preview').show();
                    }
                });
            });

        });
    </script>
@endsection
