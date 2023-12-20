@extends('personal.layouts.index')

@section('content')
        <section class="content">
          <div class="card card-solid">
            <div class="card-body pb-0">
              <div class="row">
                @foreach ( $users as $user )
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-body pt-4">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>{{$user->name}}</b></h2>
                          <p class="text-muted text-sm"><b>{{$user->email}}</b></p>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('storage/' . $user->photo) }}" alt="user-avatar" class="img-circle img-fluid">                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="{{route('personal.users.show', $user->id)}}" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="row">
                <div class="mx-auto" style="margin-top: -5px"> {{ $users->links() }}</div>
            </div>
            </div>
        </section>
      </div>
    </div>
@endsection
