@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <fieldset class="border p-4 rounded shadow">
        <legend class="w-auto px-2 text-primary fw-bold">Login</legend>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </fieldset>
</div>
@endsection

