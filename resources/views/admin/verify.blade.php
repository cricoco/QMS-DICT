@extends('documents.layout')

@section('content')
<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-header text-center">
                    <h1>Unverified Users</h1>
                </div>
                <div class="card-body">
                    <div class="alert alert-light text-center">
                        <form action="{{ route('admin.unverifiedusers') }}" method="GET" class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Search" name="search">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->designation }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.unverifiedusers.verify', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Verify</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer"> {{ $users->links() }}</div>
            </div>

        </div>
    </div>
</div>
<br><br><br><br>
@endsection