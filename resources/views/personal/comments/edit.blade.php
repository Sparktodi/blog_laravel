@extends('personal.layouts.index')

@section('content')
    <div class="container-fuid">
        <div class="row">
            <div class="col-12 ml-4">
                <h1 class="font-weight-bold">Edit Comment</h1>
                <form action="{{ route('personal.comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group w-50">
                  
                        <textarea name="message" id="message" class="form-control" placeholder="Comment">{{$comment->message }}</textarea>
                        @error('message')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

    

                    <div class="form-group mt-4">
                        <input type="submit" class="btn-lg btn-primary " value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
