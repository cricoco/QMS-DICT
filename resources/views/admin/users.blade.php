@extends('documents.layout')

@section('content')
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header text-center">
                        <h1>Users</h1>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-light text-center">
                            <form action="{{ route('admin.users') }}" method="GET" class="d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search" name="search">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Add Upload CSV Form -->
                        <div class="alert alert-light text-center mb-3">
                            <form action="{{ route('admin.users.upload') }}" method="POST" enctype="multipart/form-data"
                                class="d-flex justify-content-center">
                                @csrf
                                <div class="input-group" style="max-width: 500px;">
                                    <input type="file" name="csv_file" class="form-control">
                                    <button type="submit" class="btn btn-primary">Upload CSV</button>
                                </div>
                            </form>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Role</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->designation }}</td>
                                        <td>{{ $user->role_id == 1 ? 'Admin' : 'User' }}</td>
                                        <td class="text-center">
                                            @if ($user->role_id == 0)
                                                <form action="{{ route('admin.users.promote', $user) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Promote to Admin</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.users.demote', $user) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Demote to User</button>
                                                </form>
                                            @endif
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
