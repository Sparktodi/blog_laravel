@extends('admin.layouts.admin')

@section('content')
    <h1 class="font-weight-bold">Users</h1>
    <div class="row">
        <div class="col-2">
            <a href="{{ route('admin.users.create') }}" type="button" class="btn btn-block bg-gradient-primary">New
                user</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-4">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('personal.users.show', $user->id) }}"
                                                class="far fa-eye"></a>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="text-success fas fa-pencil-alt ml-2"></a>
                                            <a class="ml-2">
                                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="sunmit" class="border-0 bg-transpatent">
                                                        <i class="text-danger fas fa-trash " role="button"></i>
                                                    </button>
                                                </form>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
