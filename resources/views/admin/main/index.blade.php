@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$posts->count()}}</h3>
                <p>Posts</p>
            </div>
            <div class="icon">
                <i class="fas fa-flag fa-2xl"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$users->count()}}</h3>
                <p>Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-regular fa-users fa-2xl"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$tags->count()}}</h3>
                <p>Tags</p>
            </div>
            <div class="icon">
                <i class="far fa-map fa-lg"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$category->count()}}</h3>
                <p>Countries</p>
            </div>
            <div class="icon">
                <i class="fas fa-compass fa-spin fa-lg"></i>
            </div>
        </div>
    </div>
</div>
    
@endsection
