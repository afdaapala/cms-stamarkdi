@extends('backend.layout.master')

@section('content')
    <div class="card pb-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible " role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-auto me-auto">
                    <h5 class="card-header">Table Tags</h5>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addModal">
                        <span class="tf-icons bx bxs-plus-square"></span>&nbsp; Add Tag
                    </button>
                </div>
            </div>
        </div>

        @php
            $count = count($tags);

        @endphp
        @if ($count == 0)
            <h4 class="my-4" style="text-align: center;">Data Not Found</h4>
        @else
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Keywords</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($tags as $key => $item)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->keywords }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{ $item->id }}">
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('tags.destroy', [$item->id]) }}"
                                    class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal-{{ $item->id }}" aria-labelledby="exampleModalLabel"
                            tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('tags.update', $item->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit Tags</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" name="name" id="name"
                                                        value="{{ $item->name }}" class="form-control"
                                                        placeholder="Name Tags" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="slug" class="form-label">Slug</label>
                                                    <input type="text" name="slug" id="slug"
                                                        value="{{ $item->slug }}" class="form-control" placeholder="Slug"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="keywords" class="form-label">Keywords</label>
                                                    <input type="text" name="keywords" id="keywords"
                                                        value="{{ $item->keywords }}" class="form-control"
                                                        placeholder="Keywords" required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="meta_desc" class="form-label">Meta Description</label>
                                                    <input type="text" name="meta_desc" id="meta_desc"
                                                        value="{{ $item->meta_desc }}" class="form-control"
                                                        placeholder="Meta Description" required />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" aria-labelledby="exampleModalLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Add Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Name Tag" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="keywords" class="form-label">Keywords</label>
                                <input type="text" name="keywords" id="keywords" class="form-control"
                                    placeholder="Keywords" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="meta_desc" class="form-label">Meta Description</label>
                                <input type="text" name="meta_desc" id="meta_desc" class="form-control"
                                    placeholder="Meta Description" required />
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
