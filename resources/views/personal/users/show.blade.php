@extends('personal.layouts.index')

@section('content')
    <section class="content">
        <div class="container-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if ($user->photo)
                                    <img class=" rounded-circle g-mt-3 g-mr-15" style="width: 150px; height: 150px"
                                        src="{{ asset('storage/' . $user->photo) }}">
                                @else
                                    <img class=" rounded-circle g-mt-3 g-mr-15" style="width: 150px; height: 150px"
                                        src="{{ asset('assets/images/defolt/defoltphoto.jpg') }}">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{ $user->email }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a href="{{ route('personal.followers.index', $user->id) }}"
                                        class="float-right">{{ $user->followers->count() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a href="{{ route('personal.followings.index', $user->id) }}"
                                        class="float-right">{{ $user->followings->count() }}</a>
                                </li>
                            </ul>

                            <strong><i class="far fa-file-alt mr-1"></i> Adoute me</strong>

                            <p class="text-muted">Some text</p>

                            @if (auth()->user()->id != $user->id)
                                @if (!auth()->user()->followings->contains($user))
                                    <form
                                        action="{{ route('personal.followings.store', ['user' => auth()->user(), 'id' => $user->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="sunmit" class="btn btn-primary btn-block">
                                            <b>Following</b>
                                        </button>
                                    </form>
                                @endif
                                @if (auth()->user()->followings->contains($user))
                                    <form
                                        action="{{ route('personal.followings.destroy', ['user' => auth()->user(), 'id' => $user->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="sunmit" class="btn btn-primary btn-block">
                                            <b>Unfollowing</b>
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    @foreach ($posts as $post)
                                        <div class="post">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <a href="{{ route('posts.show', $post->id) }}"
                                                        class="blog-post-permalink">
                                                        <h3>{{ $post->title }}</h3>
                                                    </a>
                                                    <h5> Category: {{ $post->category->title }}</h4>
                                                        <h6>Tags:
                                                            @foreach ($post->tags as $tag)
                                                                {{ $tag->title }};
                                                            @endforeach
                                                        </h6>
                                                </div>
                                                <div class="col" align="right">
                                                    <span class="description">
                                                        Creared {{ $post->created_at }}
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/' . $post->main_image) }}" height="300"
                                                        width="300">
                                                </div>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/' . $post->preview_image) }}" height="300"
                                                        width="300">
                                                </div>
                                            </div>
                                            <p> {{ strip_tags($post->content) }}</p>
                                            <p>
                                                <a class="link-black text-sm">
                                                    <i class="far fa-thumbs-up mr-1"></i>
                                                    {{ $post->liked_users_count }}
                                                </a>
                                                <span class="float-right">
                                                    <a class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments
                                                        ({{ $post->comments->count() }})
                                                    </a>
                                                </span>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
