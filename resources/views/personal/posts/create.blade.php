@extends('personal.layouts.index')

@section('content')
    <div class="container-fuid">
        <div class="row ml-4">
            <div class="col-12">
                <h1 class="font-weight-bold">New Post</h1>
                <form action="{{ route('personal.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group w-25">
                        <label>Country</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? 'selected' : '' }}>
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
                            value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea id="summernote" name="content">
                            {{ old('content') }}
                        </textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group w-50">
                        <label for="exampleInputFile">Add preview image</label>
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
                                        {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <input type="submit" class="btn-lg btn-primary " value="Create">
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
