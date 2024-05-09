@extends('publicdocuments.layout')
@section('publiccontent')

<div class="container">
<br><br><br>
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="alert alert-dark text-center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px; background-color: #0693e3; color: #ffffff;">
                    <h2>Documents</h2>
                </div>
                <div class="alert alert-light text-center">
                    <form action="{{ route('publicdocuments.index') }}" method="GET" class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search" name="search">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>

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
                                <tr>
                                    <!-- <td>{{ $loop->iteration }}</td> -->
                                    <td>{{ $item->doc_ref_code }}</td>
                                    <td>{{ $item->doc_title }}</td>
                                    <td style="text-align: center;">{{ $item->dmt_incharged }}</td>
                                    <td style="text-align: center;">{{ $item->division }}</td>
                                    <td>{{ $item->process_owner }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td style="white-space: nowrap;">
                                        <a href="{{ url('/p/document/' . $item->id) }}" title="View Document" class="btn btn-info btn-sm" style="background-color: #a881af; border-color: #a881af;"><i class="fa fa-eye" aria-hidden="true"></i></a> <!-- View -->

                                        <a href="{{ route('document.download', $item->file) }}" title="Download Document" class="btn btn-info btn-sm" style="background-color: #ffd450; border-color: #ffd450;" onclick="return confirm('This document is a protected copy. Click ok to download.');">
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



@endsection