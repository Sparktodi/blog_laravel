@extends('personal.layouts.index')

@section('content')
<section class="content">
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row">
        @foreach ( $followings as $following  )
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-body pt-4">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>{{$following->name}}</b></h2>
                  <p class="text-muted text-sm"><b>{{$following->email}}</b></p>
                </div>
                <div class="col-5 text-center">
                  <img src="{{ asset('storage/' . $following->photo) }}" alt="user-avatar" class="img-circle img-fluid">                        </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="{{route('personal.users.show', $following->id)}}" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> View Profile
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
@endsection
