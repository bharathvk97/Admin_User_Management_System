@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <legend class="mb-4 text-primary fw-bold">Manage Clients ({{ $clients->count() }})</legend>


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SI.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone ?? '-' }}</td>
                    <td>{{ ucfirst($client->type) }}</td>
                    <td>
                        <span class="fw-bold 
                            {{ $client->status === 'active' ? 'text-success' : 'text-danger' }}">
                            {{ ucfirst($client->status ?? 'active') }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.client.edit', $client->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form action="{{ route('admin.client.destroy', $client->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this client?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No clients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
