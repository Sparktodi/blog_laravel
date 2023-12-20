@extends('admin.layouts.admin')

@section('content')
    <h1 class="font-weight-bold">Countries</h1>
    <div class="row">
        <div class="col-2">
            <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-block bg-gradient-primary">New
                country</a>
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
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="text-success fas fa-pencil-alt ml-2"></a>
                                            <a class="ml-2">
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
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
