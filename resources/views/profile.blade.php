@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please try again:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5" style="max-width: 500px;">
    <fieldset class="border p-4 rounded shadow-sm">
        
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            @if(auth()->user()->image)
                <div class="mb-3 text-center">
                    <img src="{{ asset(auth()->user()->image) }}" width="80" class="rounded border" />
                </div>
            @endif

            <div class="mb-3">
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" >
            </div>
            <div class="mb-3">
                <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control" >
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="New Password (optional)">
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="mb-3">
                <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">
                <label for="imageInput" class="btn btn-outline-primary">
                    Change Profile Picture
                </label>
            </div>
            
            <div class="d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </fieldset>
</div>
@endsection

