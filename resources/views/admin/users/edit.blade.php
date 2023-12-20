@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary col-4">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <form action="{{ route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email"
                                value="{{ $user->email }}">

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                value="{{ $user->name }}">

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-25">
                            <select class="form-control" name="role">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id}}"
                                        {{ $id == old('role') ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
