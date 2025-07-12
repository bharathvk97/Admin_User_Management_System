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
        <legend class="w-auto px-3 text-primary fw-bold">New Client</legend>

        <form method="POST" action="{{ route('admin.client.submit') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" >
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Phone" >
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" >
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" >
            </div>
            <div class="d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.client.list') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </fieldset>
</div>
@endsection

