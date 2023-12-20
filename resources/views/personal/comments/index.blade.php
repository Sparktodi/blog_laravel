@extends('personal.layouts.index')

@section('content')
    <h1 class="font-weight-bold ml-4">My Comments</h1>
    <div class="row">
        <div class="col-6 ml-4">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <section class="comment">
                        @foreach ($comments as $comment)
                            <div class="col-md-12">
                                <div class="media g-mb-30 media-comment mt-5">
                                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">       
                                        <a href="{{ route('posts.show', $comment->post_id) }}"><h5>{{ $comment->message }}</h5> </a>
                                        <a class="float-right btn-tool ml-2">
                                            <form action="{{ route('personal.comments.destroy', $comment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="sunmit">
                                                    <i class="fas fa-times" role="button"></i>
                                                </button>
                                            </form>
                                        </a>
                                        <a href="{{ route('personal.comments.edit', $comment->id) }}"
                                            class="float-right btn-tool">
                                            <i class="fas fa-pencil-alt fa-lg ml-2"></i>
                                        </a>
                                        <div>{{$comment->created_at}}</div>
                                    </div>
                                </div>
                            </div>
                     @endforeach
                </section>
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
