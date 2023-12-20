@extends('personal.layouts.index')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <h1 class="font-weight-bold">Liked posts</h1>
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
                            <form action={{ route('post.like.store', $post->id) }} method="POST">
                                @csrf
    
                              
                                    @if (auth()->user()->likedPosts->contains($post->id))
                                        <button type="submit" class="btn btn-primary btn-xs">
                                            <i
                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count }}</i>
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-secondary btn-xs">
                                            <i
                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count }}</i>
                                        </button>
                                    @endif

    
                            </form>
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
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-2">
            <a href="{{ route('admin.posts.create') }}" type="button" class="btn btn-block bg-gradient-primary">New
                Post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8 mt-4">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('admin.posts.show', $post->id) }}"
                                                class="far fa-eye"></a>
                                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                class="text-success fas fa-pencil-alt ml-2"></a>
                                            <a class="ml-2">
                                                <form action="{{ route('admin.posts.destroy', $post->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="sunmit" class="border-0 bg-transpatent">
                                                        <i class="text-danger fas fa-trash " role="button"></i>
                                                    </button>
                                                </form>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div> --}}
@endsection
