@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary col-4">
                <div class="card-header">
                    <h3 class="card-title">Edit</h3>
                </div>
                <form action="{{ route('admin.tags.update', $tag->id)}}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tag" name="title"
                                value="{{ $tag->title }}">

                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
