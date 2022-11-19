@extends('backend.layout.master')

@section('content')
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light"></span>Posts</h4>
    <div class="card pb-5">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary my-3">
                        <span class="tf-icons bx bxs-plus-square"></span>&nbsp; Add Post
                    </a>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @php
                        $count = count($posts);
                    @endphp

                    @if ($count == 0)
                        <h4 class="my-4" style="text-align: center;">Data Not Found</h4>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Desc</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ Str::limit(strip_tags($item->desc), 60) }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', $item->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <form method="POST" action="{{ route('posts.destroy', [$item->id]) }}"
                                                class="d-inline" onsubmit="return confirm('Move post to trash ?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
