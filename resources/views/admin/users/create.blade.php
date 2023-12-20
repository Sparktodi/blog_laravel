@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary col-4">
                <div class="card-header">
                    <h3 class="card-title text-dark">Add new User</h3>
                </div>
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email"  value="{{ old('email') }}">

                            @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name"  value="{{ old('name')}}">

                            @error('name')
                                <div class="text-danger">{{$message}}</div>
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
                        </div>
    
                        <input type="submit" class="btn btn-primary text-dark"  value="Create">
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
