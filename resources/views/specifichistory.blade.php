@extends('documents.layout')

<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Revision History Tracking Log</h1>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Doc Ref. Code</th>
                                <th>Document Title</th>
                                <th>Description of Change</th>
                                <th>Revision Number</th>
                                <th>Effectivity Date</th>
                                <th>Owner</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                                <tr>
                                    <td>{{ $item->document->id }}</td>
                                    <td>{{ $item->document->doc_ref_code }}</td>
                                    <td>{{ $item->document->doc_title }}</td>
                                    <td>{{ $item->document->request_reason }}</td>
                                    <td>{{ $item->document->revision_num }}</td>
                                    <td>{{ $item->document->effectivity_date }}</td>
                                    <td>{{ $item->document->process_owner }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer"> {{ $history->links() }}</div>
            </div>

        </div>
    </div>
</div>
<br><br><br><br>
