@extends('personal.layouts.index')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane">
                        @foreach ($followingsposts as $followingspost)
                            <div class="post">
                                <div class="user-block mt-2">
                                    <div class="post">
                                        <div class="user-block">  
                                            @if($followingspost->user->photo)
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/' . $followingspost->user->photo) }}">
                                            @else
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('assets/images/defolt/defoltphoto.jpg') }}">
                                            @endif
                                            <span class="username">
                                                <a
                                                    href="{{ route('personal.users.show', $followingspost->user) }}">{{ $followingspost->user->name }}</a>
                                            </span>
                                            <span class="description">{{ $followingspost->user->email }}</span>
                                        </div>

                                        <span class="float-right">
                                            Creared {{ $followingspost->created_at }}
                                        </span>
                                        <h3>
                                            <a href="{{ route('posts.show', $followingspost) }}" class="link-success">
                                                {{ $followingspost->title }}</a>
                                        </h3>
                                        Tags:
                                        @foreach ($followingspost->tags as $tag)
                                            {{ $tag->title }}
                                        @endforeach

                                        <div>Country: {{ $followingspost->category->title }}</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <img class="img-fluid" src="{{ asset('storage/' . $followingspost->main_image) }}"
                                            height="300" width="300">
                                    </div>
                                    <div class="col-sm-6">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/' . $followingspost->preview_image) }}" height="300"
                                            width="300">
                                    </div>
                                </div>
                                <p> {{ strip_tags($followingspost->content) }}</p>
                                <p>
                                    <a  class="link-black text-sm">
                                        <i class="far fa-thumbs-up mr-1"></i>
                                        {{ $followingspost->liked_users_count }}
                                    </a>
                                    <span class="float-right">
                                        <a class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Comments
                                            ({{ $followingspost->comments->count() }})
                                        </a>
                                    </span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- @dd($followingsposts) --}}
    @endsection
