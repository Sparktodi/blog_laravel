@extends('personal.layouts.index')

@section('content')
    <h1 class="font-weight-bold">Posts</h1>
    <div class="row">
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
    </div>
@endsection
