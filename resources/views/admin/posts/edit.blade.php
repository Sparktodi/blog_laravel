@extends('admin.layouts.admin')

@section('content')
    <div class="container-fuid">
        <div class="row">
            <div class="col-12">
                <h1 class="font-weight-bold">Edit Post</h1>
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    <div class="form-group w-25">
                        <label>Country</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group w-25">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title" name="title"
                            value="{{ $post->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea id="summernote" name="content">
                        {{ $post->content }}
                    </textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group w-50">
                        <label for="exampleInputFile">Add preview image</label>
                        <div class="w-50 mb-2">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group w-50">
                        <label for="exampleInputFile">Add main image</label>
                        <div class="w-50 mb-2">
                            <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>

                        @error('main_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group w-50">
                        <label>Tags</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" data-placeholder="Select tags"
                                data-dropdown-css-class="select2-purple" style="width: 100%;" name="tag_ids[]">
                                @foreach ($tags as $tag)
                                    <option
                                        {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <input type="submit" class="btn-lg btn-primary " value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
