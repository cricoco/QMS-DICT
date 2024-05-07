@extends('documents.layout')
@section('content')
<div class="container">
<br><br><br>
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="alert alert-dark text-center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px; background-color: #0693e3; color: #ffffff;">
                    <h2>Forms</h2>
                </div>
                <div class="alert alert-light text-center">
                    <form action="{{ route('documents.index') }}" method="GET" class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search" name="search">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="card-body" style="height: 100vh; overflow-y: auto;">
                    <a href="{{ url('/document/create') }}" class="btn btn-success btn-sm" title="Add New Document" style="background-color: #45b3e0; border-color: #45b3e0; color: black;"><i class="fa fa-plus"></i>Add New</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" style="white-space: wrap;">
                            <thead>
                                <tr>
                                    <th>#</th>
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
                                    @if(in_array($item->doc_type, ['Quality Procedure Form', 'Corrective Action Request Form', 'Form/Template']))
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->doc_ref_code }}</td>
                                            <td>{{ $item->doc_title }}</td>
                                            <td style="text-align: center;">{{ $item->dmt_incharged }}</td>
                                            <td style="text-align: center;">{{ $item->division }}</td>
                                            <td>{{ $item->process_owner }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td style="white-space: nowrap;">
                                                <a href="{{ url('/document/' . $item->id) }}" title="View Document" class="btn btn-info btn-sm" style="background-color: #a881af; border-color: #a881af;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('document.download', $item->file) }}" title="Download Document" class="btn btn-info btn-sm" style="background-color: #ffd450; border-color: #ffd450;"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                <a href="{{ url('/document/' . $item->id . '/edit') }}" title="Edit Document" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <form method="POST" action="{{ url('/document' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Document" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
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

@endsection
