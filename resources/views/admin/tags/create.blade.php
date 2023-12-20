@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary col-4">
                <div class="card-header">
                    <h3 class="card-title">Add new Tag</h3>
                </div>
                <form action="{{ route('admin.tags.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tag" name="title">

                            @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add">
            </form>
        </div>
    </div>
</div>
@endsection
