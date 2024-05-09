<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>History</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Operation</th>
                                <th>Document</th>
                                <th>Document title</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->operation }}</td>
                                <td>{{ $item->document->doc_ref_code }}</td> 
                                <td>{{ $item->document->doc_title }}</td> 
                                <td>{{ $item->created_at }}</td> 
                                <td>{{ $item->updated_at }}</td> 
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>