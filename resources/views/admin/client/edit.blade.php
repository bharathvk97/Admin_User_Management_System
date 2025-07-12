@extends('layouts.app')

@section('content')
 @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please try again:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container mt-4">
    <h2>{{ $client->name }}</h2>

   <fieldset class="border p-4 rounded shadow-sm mt-4">
     
    <form action="{{ route('admin.client.update', $client->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')
        @if($client->image)
            <div class="mt-2 text-center">
                <img src="{{ asset($client->image) }}" alt="Profile Image" width="80" height="80" class="rounded-circle">
            </div>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Full Name:</label>
            <input type="text" name="name" value="{{ old('name', $client->name) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address:</label>
            <input type="email" name="email" value="{{ old('email', $client->email) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" value="{{ old('phone', $client->phone) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" class="form-select" required>
                <option value="active" {{ old('status', $client->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $client->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Profile Image (optional):</label>
            <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">
           <label for="imageInput" class="btn btn-outline-primary">
                Change Profile Picture
            </label>

        </div>
        <div class="d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('admin.client.list') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</fieldset>

</div>
@endsection
