@extends('personal.layouts.index')

@section('content')
    <section class="content ">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$posts->count()}}</h3>

                            <p>My posts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-pen"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$user->comments->count()}}</h3>

                            <p>My coments</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$user->likedPosts->count()}}</h3>

                            <p>My likes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if ($user->photo)
                                    <img class=" rounded-circle g-mt-3 g-mr-15" style="width: 150px; height: 150px"
                                        src="{{ asset('storage/' . $user->photo) }}" alt="Add profile picture ">
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

                            <a href="{{ route('personal.main.edit', $user->id) }}"
                                class="btn btn-primary btn-block"><b>Edit profile</b></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-box mb-3">
                            <a class="btn btn-primary info-box-icon bg-warning elevation-1"
                                href="{{ route('personal.posts.create') }}">
                                <i class="fas fa-plus"></i></a>
                            <div class="info-box-content">
                                <span class="info-box-text">New Post</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4> My posts </h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    @foreach ($posts as $post)
                                        <div class="post">
                                            <div class="user-block mt-2">
                                                <span class="username">
                                                    @can('delete', $post)
                                                        <a class="float-right btn-tool ml-2">
                                                            <form action="{{ route('personal.posts.destroy', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="sunmit">
                                                                    <i class="fas fa-times" role="button"></i>
                                                                </button>
                                                            </form>
                                                        </a>
                                                    @endcan
                                                    @can('update', $post)
                                                        <a href="{{ route('personal.posts.edit', $post->id) }}"
                                                            class="float-right btn-tool">
                                                            <i class="fas fa-pencil-alt fa-lg ml-2"></i>
                                                        </a>
                                                    @endcan
                                                </span>
                                            </div>
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
