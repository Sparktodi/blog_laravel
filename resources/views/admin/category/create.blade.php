@extends('admin.layouts.admin');

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary col-4">
                <div class="card-header" style="background-color: #f1ff29;">
                    <h3 class="card-title text-dark">Add new Country</h3>
                </div>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Country" name="title">

                            @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                    </div>
                    <input type="submit" class="btn btn-primary text-dark" style="background-color: #f1ff29;" value="Add">
            </form>
        </div>
    </div>
</div>
@endsection
