@extends('publicdocuments.layout')
@section('publiccontent')
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
                <div class="alert alert-dark text-center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px; background-color: #0693e3; color: #ffffff;">
                    <h2>Document Masterlist</h2>
                </div>
                <div class="alert alert-light text-center">
                    <form action="{{ route('publicdocuments.index') }}" method="GET" class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search" name="search">
                        <select name="type" class="form-select" style="width: auto; min-width: 120px; margin-right: 5px;">
                            <option value="">All Types</option>
                            <option value="Internal" {{ request('type') == 'Internal' ? 'selected' : '' }}>Internal</option>
                            <option value="External" {{ request('type') === 'External' ? 'selected' : '' }}>External</option>
                        </select>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-right: 20px; margin-left: 20px;">
                    <div>
                        <strong>NOTICE:</strong> Only the softcopy of documents available on the QMS portal is considered the <strong>CONTROLLED COPY.</strong><br>
                        <span style="margin-left: 67px; display: block;">Any downloaded or printed copies of documents are deemed <strong>UNCONTROLLED</strong>.</span>
                    </div>
                    <div>
                        <a href="{{ route('publicdocuments.index', ['search' => request('search'), 'sort_by' => 'doc_title', 'sort_dir' => 'asc']) }}" class="btn btn-sm btn-info" style="background-color: #45b3e0;"><i class="fa fa-sort-alpha-down" aria-hidden="true"></i></a>
                        <a href="{{ route('publicdocuments.index', ['search' => request('search'), 'sort_by' => 'revision_num', 'sort_dir' => 'asc']) }}" class="btn btn-sm btn-info" style="background-color: #45b3e0;"><i class="fa fa-sort-numeric-down" aria-hidden="true"></i></a>
                        <a href="{{ route('publicdocuments.index', ['search' => request('search'), 'sort_by' => 'revision_num', 'sort_dir' => 'desc']) }}" class="btn btn-sm btn-info " style="background-color: #45b3e0;"><i class="fa fa-sort-numeric-up" aria-hidden="true"></i></a>
                    </div>
                </div>
                <br>

                <div class="card-body" style="height: 100vh; overflow-y: auto;">

                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" style="white-space: wrap;">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="{{ route('publicdocuments.index', array_merge(request()->query(), ['sort_by' => 'doc_ref_code', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}" style="text-decoration: none; color: inherit;">
                                            Document Reference Code
                                            @if(request('sort_by') == 'doc_ref_code')
                                            @if(request('sort_dir') == 'asc')
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
                                        <a href="{{ route('publicdocuments.index', array_merge(request()->query(), ['sort_by' => 'doc_title', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}" style="text-decoration: none; color: inherit;">
                                            Document Title
                                            @if(request('sort_by') == 'doc_title')
                                            @if(request('sort_dir') == 'asc')
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
                                        <a href="{{ route('publicdocuments.index', array_merge(request()->query(), ['sort_by' => 'revision_num', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}" style="text-decoration: none; color: inherit;">
                                            Revision Number
                                            @if(request('sort_by') == 'revision_num')
                                            @if(request('sort_dir') == 'asc')
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
                                        <a href="{{ route('publicdocuments.index', array_merge(request()->query(), ['sort_by' => 'effectivity_date', 'sort_dir' => request('sort_dir') == 'asc' ? 'desc' : 'asc'])) }}" style="text-decoration: none; color: inherit;">
                                            Effectivity Date
                                            @if(request('sort_by') == 'effectivity_date')
                                            @if(request('sort_dir') == 'asc')
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
                                @foreach($documents as $item)
                                <tr>
                                    <td>{{ $item->doc_ref_code }}</td>
                                    <td>{{ $item->doc_title }}</td>
                                    <td style="text-align: center;">{{ $item->revision_num }}</td>
                                    <td style="text-align: center;">{{ $item->effectivity_date }}</td>
                                    <td>{{ $item->process_owner }}</td>
                                    <td>{{ $item->type_intext }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td style="white-space: nowrap;">
                                        <a href="javascript:void(0)" id="pubshow-documents" data-url="{{ route('publicdocuments.show', $item->id) }}" title="View Document" class="btn btn-info btn-sm" style="background-color: #a881af; border-color: #a881af;"><i class="fa fa-eye" aria-hidden="true"></i></a> <!-- View -->

                                        <a href="{{ route('document.download', $item->file) }}" title="Download Document" class="btn btn-info btn-sm" style="background-color: #ffd450; border-color: #ffd450;" onclick="return confirm('NOTICE: Only the softcopy of this document, available on the Regional Office IX and BASULTA QMS portal, is considered the CONTROLLED COPY. Any downloaded or printed copies of this document are deemed UNCONTROLLED.');">
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>


                                    </td>
                                </tr>
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
<!-- =============SCRIPTS================== -->
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
                //$('#pub-requester').text(data.requester);
                $('#pub-req-date').text(data.request_date);
                $('#pub-rev-num').text(data.revision_num);
                $('#pub-effic-date').text(data.effectivity_date);
                $('#pub-filename').text(data.file);
                $('#pub-created-at').text(data.created_at);
                $('#pub-type-intext').text(data.type_intext);
                $('#pub-unit-text').text(data.unit);
            })
        });


    });
</script>
@endsection