@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">View Users Page</h2>
    <table class="table table-striped table-hover table-bordered table-responsive w-100 align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-dark">
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
                <td>
                    <!-- Dynamic modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                        Edit
                    </button>
                    <a href="{{ route('delete', $item->id) }}" class="btn btn-danger">Delete</a>

                    <!-- Modal -->
                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-bold" id="editModalLabel{{ $item->id }}">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('edit', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="row g-3"> <!-- optional gap between fields -->
                                            <div class="form-group row col-12 align-items-center m-2">
                                                <label for="name{{ $item->id }}" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name{{ $item->id }}" name="name" value="{{ $item->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row col-12 align-items-center m-2">
                                                <label for="email{{ $item->id }}" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email{{ $item->id }}" name="email" value="{{ $item->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group row col-12 align-items-center m-2">
                                                <label for="password{{ $item->id }}" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password{{ $item->id }}" name="password" value="{{ $item->password }}">
                                                </div>
                                            </div>

                                            <div class="modal-footer col-12">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
