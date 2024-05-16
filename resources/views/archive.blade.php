<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Archives</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Document Reference Code</th>
                                <th>Document Title</th>
                                <th>Revision Number</th>
                                <th>Division</th>
                                <th>Process Owner</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $item)
                            <tr @if($item->status === 'Obsolete') style="background-color: #dddddd; "  @endif>
                                <td>{{ $item->doc_ref_code }}</td>
                                <td>{{ $item->doc_title }}</td>
                                <td style="text-align: center;">{{ $item->revision_num }}</td>
                                <td style="text-align: center;">{{ $item->division }}</td>
                                <td>{{ $item->process_owner }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer">{{ $documents->appends(['search' => request()->query('search')])->links() }}</div>
        </div>
    </div>
</div> -->