@extends('admin.layouts.admin')

@section('content')
    <h1 class="font-weight-bold">Posts</h1>
    <div class="row">
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane">
                    @foreach ($posts as $post)
                        <div class="post">
                            <div class="user-block">
                                <span class="username">
                                        <a class="float-right btn-tool ml-2">
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="sunmit">
                                                    <i class="fas fa-times" role="button"></i>
                                                </button>
                                            </form>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="float-right btn-tool">
                                            <i class="fas fa-pencil-alt fa-lg ml-2"></i>
                                        </a>
                                </span>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="user-block">  
                                        @if($post->user->photo)
                                            <img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/' . $post->user->photo) }}">
                                        @else
                                            <img class="img-circle img-bordered-sm"
                                                src="{{ asset('assets/images/defolt/defoltphoto.jpg') }}">
                                        @endif
                                        <span class="username">
                                            {{ $post->user->name }}
                                        </span>
                                        <span class="description">{{ $post->user->email }}</span>
                                    </div>
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
                    <div class="row">
                        <div class="mx-auto" style="margin-top: -5px"> {{ $posts->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
