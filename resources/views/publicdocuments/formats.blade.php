@extends('publicdocuments.layout')
@section('publiccontent')
<div class="container">
<br><br><br>
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="alert alert-dark text-center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px; background-color: #0693e3; color: #ffffff;">
                    <h2>Forms</h2>
                </div>
                <div class="alert alert-light text-center">
                    <form action="{{ route('publicdocuments.formats') }}" method="GET" class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search" name="search"> <!-- WHERE WE LEFT --->
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="ml-auto" style="margin-right: 35px;">
                    <a href="{{ route('publicdocuments.formats', ['search' => request('search'), 'sort_by' => 'doc_title', 'sort_dir' => 'asc']) }}" class="btn btn-sm btn-info" style="background-color: #45b3e0;"><i class="fa fa-sort-alpha-down" aria-hidden="true"></i></a>
                    <a href="{{ route('publicdocuments.formats', ['search' => request('search'), 'sort_by' => 'revision_num', 'sort_dir' => 'desc']) }}" class="btn btn-sm btn-info" style="background-color: #45b3e0;"><i class="fa fa-sort-numeric-down" aria-hidden="true"></i></a>
                    <a href="{{ route('publicdocuments.formats', ['search' => request('search'), 'sort_by' => 'revision_num', 'sort_dir' => 'asc']) }}" class="btn btn-sm btn-info " style="background-color: #45b3e0;"><i class="fa fa-sort-numeric-up" aria-hidden="true"></i></a>
                </div>
                <br>
                <div class="card-body" style="height: 100vh; overflow-y: auto;">
                    
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" style="white-space: wrap;">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Doc Ref. Code</th>
                                    <th>Document Title</th>
                                    <th>DMT Incharged</th>
                                    <th>Division</th>
                                    <th>Process Owner</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $item)
                                    <!-- @if(in_array($item->doc_type, ['Quality Procedure Form', 'Corrective Action Request Form', 'Form/Template'])) -->
                                        <tr>
                                            <!-- <td>{{ $loop->iteration }}</td> -->
                                            <td>{{ $item->doc_ref_code }}</td>
                                            <td>{{ $item->doc_title }}</td>
                                            <td style="text-align: center;">{{ $item->dmt_incharged }}</td>
                                            <td style="text-align: center;">{{ $item->division }}</td>
                                            <td>{{ $item->process_owner }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td style="white-space: nowrap;">
                                            <a href="javascript:void(0)" id="pubshow-documents" data-url="{{ route('publicdocuments.show', $item->id) }}" title="View Document" class="btn btn-info btn-sm" style="background-color: #a881af; border-color: #a881af;"><i class="fa fa-eye" aria-hidden="true"></i></a> <!-- View -->

                                                <a href="{{ route('document.download', $item->file) }}" title="Download Document" class="btn btn-info btn-sm" style="background-color: #ffd450; border-color: #ffd450;" onclick="return confirm('This document is a protected copy. Click ok to download.');">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                </a>

                                        
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
@include('publicdocuments.modal-view')
@endsection

@section('pubscript')
<script type="text/javascript">
    $(document).ready(function() {

        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '#pubshow-documents', function() {
            var docURL = $(this).data('url');
            $.get(docURL, function(data) {
                $('#pubdocShowModal').modal('show');
                $('#pub-doc-ref-code').text(data.doc_ref_code);
                $('#pub-doc-title').text(data.doc_title);
                $('#pub-status').text(data.status);
                $('#pub-document-iframe').attr('src', "{{ asset('storage/documents/') }}/" + data.file);
                $('#pub-division').text(data.division);
                // $('#dmt-incharged').text(data.dmt_incharged);
                $('#pub-process-owner').text(data.process_owner);
                $('#pub-doc-type').text(data.doc_type);
                $('#pub-req-reason').text(data.request_reason);
                $('#pub-req-type').text(data.request_type);
                $('#pub-requester').text(data.requester);
                $('#pub-req-date').text(data.request_date);
                $('#pub-rev-num').text(data.revision_num);
                $('#pub-effic-date').text(data.efficitivity_date);
                $('#pub-filename').text(data.file);
                $('#pub-created-at').text(data.created_at);
            })
        });


    });
</script>
@endsection
