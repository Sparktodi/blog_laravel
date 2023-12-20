@extends('personal.layouts.index')

@section('content')
    <div class="row">
        <div class="col-4 mt-4">
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
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <div class="row">
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
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
