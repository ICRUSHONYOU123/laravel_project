@extends('admin.layout')

@section('content')
    <div class="content-header">
        <h1>Active Key Page</h1>
    </div>
    <div class="container">
    <p class="fs-5">The Active Key page provides a clear overview of all license keys purchased by users. It displays each key along with important details such as the activation status, purchase date, and expiration date. Administrators can easily check whether a key is active or inactive, helping to track valid and expired licenses efficiently. This page ensures transparency and makes it simple to manage user access and license validation from a single, organized dashboard view.</p>
    <table class="table table-striped table-hover table-bordered table-responsive w-100 align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>🆔 ID</th>
                <th>🗝️ Key</th>
                <th>🎮 Status</th>
                <th>🔓 Buy at</th>
                <th>📅 Expiration date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-dark">
            @foreach($keys as $key)
            <tr>
                <td>{{ $key['id'] }}</td>
                <td>{{$key['key']}}</td>
                <td><span class="status-badge active">
                    <span class="status-dot"></span>Active</span>
                </td>
                <td>{{ $key['created_at'] }}</td>
                <td>10/11/25</td>
                <td>
                <form action="{{ route('deleteKey', ['id' => $key['id']]) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this license key?')">
                        Delete Key
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
