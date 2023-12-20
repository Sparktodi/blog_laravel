@extends('admin.layouts.admin')

@section('content')
    <h1 class="font-weight-bold">Tags</h1>
    <div class="row">
        <div class="col-2">
            <a href="{{ route('admin.tags.create') }}" type="button" class="btn btn-block bg-gradient-primary">New
                tag</a>
        </div>
    </div>
    <div class="row">
        <div class="col-5 mt-4">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $tag->title }}</td>
                                    <td>{{ $tag->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                                class="text-success fas fa-pencil-alt ml-2"></a>
                                            <a class="ml-2">
                                                <form action="{{ route('admin.tags.destroy', $tag->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="sunmit" class="border-0 bg-transpatent btn-dark">
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
