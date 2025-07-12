@extends('layouts.app')

@section('content')
<div class="home-wrapper">
    <div class="overlay">
        <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-3 fw-bold">Welcome to CAMS</h1>
            <p class="lead">Delivering scalable, high-performance web solutions tailored for your business needs.</p>

            @guest
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg me-3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Register</a>
                </div>
            @endguest
        </div>
    </div>
</div>
@endsection
