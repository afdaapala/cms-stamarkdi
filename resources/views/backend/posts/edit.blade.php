@extends('backend.layout.master')
@section('content')
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Post/</span> Create Posts</h4>
    <div class="col-xxl">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Basic Layout</h5>
                <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="cover">Vover</label>
                        <div class="col-sm-10">
                            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror"
                                id="cover" value="{{ old('cover') ? old('cover') : $post->cover }}">
                            @error('cover')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="title">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') ? old('title') : $post->title }}" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="slug">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                value="{{ old('slug') ? old('slug') : $post->slug }}" required>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="desc">Description</label>
                        <div class="col-sm-10">
                            <textarea name="desc" id="desc" cols="30" rows="10"
                                class="form-control @error('desc') is-invalid @enderror" required>{{ old('desc') ? old('desc') : $post->desc }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="category">Category</label>
                        <div class="col-sm-10">
                            <select name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror" required>
                                <option value="" disabled selected>Choose one</option>
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $post->category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tag">Tags</label>
                        <div class="col-sm-10">
                            <select name="tags[]" id="tag"
                                class="form-control select2 @error('tags') is-invalid @enderror" required multiple>
                                @foreach ($post->tags as $tag)
                                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                                {{-- @foreach ($tags as $tags)
                                    <option value="{{ $tags->id }}">{{ $tags->name }}</option>
                                @endforeach --}}
                            </select>
                            @error('tags')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="keywords">Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords"
                                class="form-control @error('keywords') is-invalid @enderror"
                                value="{{ old('keywords') ? old('keywords') : $post->keywords }}" required>
                            @error('keywords')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="meta_desc">Meta Desc</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_desc"
                                class="form-control @error('meta_desc') is-invalid @enderror"
                                value="{{ old('meta_desc') ? old('meta_desc') : $post->meta_desc }}" required>
                            @error('meta_desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
