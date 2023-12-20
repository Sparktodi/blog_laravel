@extends('personal.layouts.index')

@section('content')

<div class="row ml-2">
    <div class="col-12">
        <div class="card card-primary col-4">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>
            </div>
            <form action="{{ route('personal.main.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{ $user->email }}">

                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name"
                            value="{{ $user->name }}">

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Photo</label>
                        <div class="w-50">
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="photo_image" class="w-50">
                        </div>
                        <div class="input-group mt-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
   
@endsection
